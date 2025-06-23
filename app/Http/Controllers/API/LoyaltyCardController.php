<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StorePassAPIRequest;
use App\Http\Requests\API\UpdateCardDetailsRequest;
use App\Models\Pass;
use App\Models\PassUser;
use Illuminate\Http\Request;
use App\Notifications\ApnNotification;

use Exception;
use Firebase\JWT\JWT;
use Google\Auth\Credentials\ServiceAccountCredentials;
use Google\Client as GoogleClient;
use Google\Service\Walletobjects;
use Google\Service\Walletobjects\LoyaltyPointsBalance;
use Google\Service\Walletobjects\LoyaltyPoints;
use Google\Service\Walletobjects\LoyaltyObject;
use Google\Service\Walletobjects\LoyaltyClass;
use Google\Service\Walletobjects\LatLongPoint;
use Google\Service\Walletobjects\Barcode;
use Google\Service\Walletobjects\ImageModuleData;
use Google\Service\Walletobjects\LinksModuleData;
use Google\Service\Walletobjects\TextModuleData;
use Google\Service\Walletobjects\TranslatedString;
use Google\Service\Walletobjects\LocalizedString;
use Google\Service\Walletobjects\ImageUri;
use Google\Service\Walletobjects\Image;
use Google\Service\Walletobjects\Message;
use Google\Service\Walletobjects\AddMessageRequest;
use Google\Service\Walletobjects\Uri;


class LoyaltyCardController extends Controller
{
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

    public function __construct()
    {
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

    public function getCardDetails($customerId){
        $customer = PassUser::where('id',$customerId)->with('pass')->first();
        if(!$customer){
            return response(['message' => "customer not found"],404);
        }
        // return base_path('public/certificate.pem');

        $reward_history = [
            // TODO: dummy data
        ];
        $data = [
            'customer_id' => $customerId,
            'name' => $customer->name,
            'icon' => $customer->pass->picked_stamps_icon,
            'icon_filled' => $customer->pass->un_stamps_icon,
            'stamps_earned' => $customer->stamps_earned ?? 0,
            'reward_available' => $customer->reward_available ?? 0,
            'stamps_required_for_reward' => $customer->stamps_required_for_reward ?? 0,
            'reward_history' => $reward_history
        ];
        return response($data,200);
    }

    public function getCardDetailsBySerialNumber($serialNumber){
        $customer = PassUser::where('serialNumber',$serialNumber)->with('pass')->with('pass.pass_images')->first();
        if(!$customer){
            return response(['message' => "customer not found"],404);
        }
        $reward_history = [
            // TODO: dummy data
        ];
        $data = [
            'customer_id' => $customer->id,
            'name' => $customer->name,
            'icon' => $customer->pass->picked_stamps_icon,
            'icon_filled' => $customer->pass->un_stamps_icon,
            'stamps_earned' => $customer->stamps_earned ?? 0,
            'image' => $customer->pass->pass_images->where('stamp_earned',$customer->stamps_earned)->first()->image_path ?? null,
            'reward_available' => $customer->reward_available ?? 0,
            'stamps_required_for_reward' => $customer->stamps_required_for_reward ?? 0,
            'reward_history' => $reward_history
        ];
        return response($data,200);
    }

    public function updateCardDetails(UpdateCardDetailsRequest $request, $customerId){
        $customer = PassUser::where('id',$customerId)->first();

        if(!$customer){
            return response(['message' => "customer not found"],404);
        }

        $stamps_earned = $customer->stamps_earned;

        if($request->reset_stamps == 'true'){
            $stamps_earned = 0;
        }

        $stamps_earned = $stamps_earned + $request->award_stamps;
        $stamps_earned = $stamps_earned + $request->adjustment;

        $customer->update([
            'stamps_earned' => $stamps_earned
        ]);

        $customer = PassUser::where('id',$customerId)->first();

        $data = [
            'customer_id' => $customerId,
            'name' => $customer->name,
            'stamps_earned' => $customer->stamps_earned,
            'reward_available' => $customer->reward_available,
            'stamps_required_for_reward' => $customer->stamps_required_for_reward,
            'success' => true,
            'message' => "Stamps updated successfully",
        ];

        $apnNotification = new ApnNotification();
        $customer->notify($apnNotification);


        return response($data,200);
    }

}
