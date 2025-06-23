<?php

namespace App\Http\Controllers;

use App\Events\CustomerDownloadFileEvent;
use App\Http\Controllers\Admin\LibraryController;
use App\Http\Requests\CreatePassRequest;
use App\Http\Traits\CreateApplePass;
use App\Http\Traits\CreateGooglePass;
use App\Interfaces\UserRepositoryInterface;
use App\Models\AppleData;
use App\Models\AppleErrorLog;
use App\Models\Pass;
use App\Models\PassUser;
use App\Models\PassImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PKPass\PKPass;
use Illuminate\Support\Str;
use stdClass;
use Google\Client as GoogleClient;
use Google\Auth\Credentials\ServiceAccountCredentials;
use Google\Service\Walletobjects;


class LoyalityController extends Controller
{
    use CreateApplePass;

    use CreateGooglePass;

    public GoogleClient $client;

    /**
     * Path to service account key file from Google Cloud Console. Environment
     * variable: GOOGLE_APPLICATION_CREDENTIALS.
     */
    public string $keyFilePath;

    /**
     * Service account credentials for Google Wallet APIs.
     */
    public ServiceAccountCredentials $credentials;

    /**
     * Google Wallet service client.
     */
    public Walletobjects $service;


    public function __construct(UserRepositoryInterface $userRepository)
    {

        $this->userRepository = $userRepository;
        $this->middleware('auth')->only([
            'create',
            'viewSingle'
        ]);

        $this->middleware(['check_card_design_count'])->only(['start_design']);

        $this->keyFilePath =  public_path('google_passify.json');

        $this->auth();
    }



    public function auth()
    {
        $this->credentials = new ServiceAccountCredentials(
            Walletobjects::WALLET_OBJECT_ISSUER,
            $this->keyFilePath
        );

        $this->client = new GoogleClient();
        $this->client->setApplicationName('APPLICATION_NAME');
        $this->client->setScopes(Walletobjects::WALLET_OBJECT_ISSUER);
        $this->client->setAuthConfig($this->keyFilePath);

        $this->service = new Walletobjects($this->client);
    }


    public function create($type = 'coffee')
    {
        return view('loyality.design', compact('type'));
    }

    public function viewSingle()
    {
        $cst = auth()->user()->customers;
        return view('loyality.singleView', compact('cst'));
    }


    public function generateRandomString($length = 7)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function createPass(CreatePassRequest $request, $id) // demo working fine
    {
        $serialNumber = $this->generateRandomString();
        $authToken = Str::random(32);
        $name = $request->name;

        $pass = Pass::find($id);

        if (!$pass) {
            return redirect()->back()->withErrors(['error' => 'Pass is not found.']);
        }

        $pass_user = PassUser::create([
            'serialNumber' => $serialNumber,
            'auth_token' => $authToken,
            'name' => $name,
            'phone' => $request->phone,
            'email' => $request->email,
            'pass_id' => $id,
            'stamps_earned' => 0,
            'stamps_required_for_reward' => $pass->no_of_stamps,
        ]);

        $passImages = PassImage::where('pass_id', $id)->get();
        if (count($passImages) > 0) {
            $userAgent = $request->header('User-Agent');
            // Check if user agent contains specific strings to identify browser or device
            if (strpos($userAgent, 'Safari') !== false && strpos($userAgent, 'iPhone') !== false) {
                $pass_user->update(["deviceType" => "apple"]);
                return $this->create_apple_pass('storeCard', $pass_user->id, true);
            } elseif (strpos($userAgent, 'Safari') !== false && strpos($userAgent, 'iPad') !== false) {
                $pass_user->update(["deviceType" => "apple"]);
                return $this->create_apple_pass('storeCard', $pass_user->id, true);
            } else {
                $pass_user->update(["deviceType" => "android"]);
                // return $this->create_Google_pass('storeCard', $pass_user->id, true);
                return $this->createGoggleWallet($pass_user, $pass);
            }
        } else {
            return redirect()->back()->withErrors(['error' => 'Pass is not completed.']);
        }
    }

    public function start()
    {
        $passes = Pass::where('is_temp', true)->get();
        return view('loyality.start')->with('passes', $passes);
    }

    public function start_design($type)
    {
        $pass = Pass::where('pass_name', $type)->first();
        if (!$pass) {
            $pass = new stdClass();
            $pass->logo_image = null;
            $pass->hero_image = null;
            $pass->barcode_image = null;
            $pass->first_label_value = null;
            $pass->second_label_value = null;
            $pass->is_expiry_date = null;
        }
        return view('loyality.create', compact('pass'));
    }

    public function pass_update($id)
    {
        Log::info("pass update called");
        return $this->create_apple_pass('storeCard', $id, true);
    }

    public function pass_update_with_deviceId($deviceLibraryIdentifier, $passTypeIdentifier)
    {
        $pass_users = PassUser::where('deviceLibraryIdentifier', $deviceLibraryIdentifier)->get();

        $serialNumbers = $pass_users->pluck('serialNumber')->toArray();

        return response()->json([
            'lastUpdated' => (string) time(),
            'serialNumbers' => $serialNumbers
        ]);
    }

    public function get_updated_data($passTypeIdentifier, $serialNumber, Request $request)
    {
        $pass_user = PassUser::where('serialNumber', $serialNumber)->first();
        return $this->create_apple_pass('storeCard', $pass_user->id, true);
    }

    public function register_pass($deviceLibraryIdentifier, $passTypeIdentifier, $serialNumber, Request $request)
    {
        $authorizationHeader = $request->header();
        foreach ($authorizationHeader['authorization'] as $header) {
            $parts = explode(' ', $header);
            if ($parts[0] == 'ApplePass') {
                Log::info("Device Registeration: ", [
                    "deviceLibraryIdentifier" => $deviceLibraryIdentifier,
                    "passTypeIdentifier" => $passTypeIdentifier,
                    "serialNumber" => $serialNumber,
                    "pushToken" => $request->pushToken
                ]);
                $pass_user = PassUser::where('auth_token', $parts[1])->first();
                $pass_user->deviceLibraryIdentifier = $deviceLibraryIdentifier;
                $pass_user->passTypeIdentifier = $passTypeIdentifier;
                $pass_user->serialNumber = $serialNumber;
                $pass_user->pushToken = $request->pushToken;
                if ($pass_user->save()) {
                    return response(["message" => "device registered"], 201);
                } else {
                    return response(['message' => 'registeration failed'], 200);
                }
            }
        }
    }

    public function log_error(Request $request, $version = null)
    {
        AppleErrorLog::create([
            'errors' => json_encode($request->logs),
            'version' => $version
        ]);

        return true;
    }

    public function walletUrl(Request $request, $segments = null)
    {

        if ($segments) {

            $segmentArray = explode('/', $segments);

            foreach ($segmentArray as $segmentValue) {
                AppleData::create(['data' => $segmentValue]);
            }

            $data = $request->all();

            if (isset($data)) {
                AppleErrorLog::create([
                    'errors' => json_encode($data),
                ]);
            }

            return response()->json(['message' => 'Segments stored successfully']);
        }
    }
}
