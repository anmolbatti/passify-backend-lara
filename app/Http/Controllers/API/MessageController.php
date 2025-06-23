<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PassUser;
use App\Models\Pass;
use App\Models\MessageHistory;
use App\Notifications\ApnNotification;
use App\Http\Requests\API\Message\SendMessageRequest;
use App\Interfaces\API\MessageRepositoryInterface;
use App\Http\Traits\ApiResponse;
use Illuminate\Support\Facades\Notification;
use App\Http\Traits\CreateGooglePass;
use Google\Client as GoogleClient;
use Google\Auth\Credentials\ServiceAccountCredentials;
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

class MessageController extends Controller
{

    use ApiResponse;

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


    public function __construct(MessageRepositoryInterface $message_repository)
    {
        $this->message_repository = $message_repository;


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

    // ------  Send Message ------------
    public function sendMessage(SendMessageRequest $request)
    {
        $passId  = $request->passId;
        $customer_type = $request->customer_type;
        $type =  $request->type;
        $message = $request->message;
        $customerId = $request->customerId;
        $pass = Pass::where('id',$passId)->first();
        if(!$pass){
            return response(['message' => "Pass Id not found"],404);
        }   


        $messageHistory = new MessageHistory();
        $messageHistory->message = $message;
        $messageHistory->segment = $type;
        $messageHistory->user_id = auth()->id(); 
        $messageHistory->pass_id = $passId; 
            

        if(!empty($customer_type)){
            // ---- Send Message All Users -----
            if($customer_type == 1){
                $passUser = PassUser::where('pass_id',$passId)->where('deviceType', 'apple') ->get();

                $applecount = count($passUser);

                if(!empty($passUser)){
                    $passId = PassUser::where('pass_id', $passId)->update([
                        'message_sent' => $message,
                        'update_sent' => 1,
                    ]);
                    
                    Notification::send($passUser, new ApnNotification());
                }

                $passUserAndroid = PassUser::where('pass_id',$passId)->where('deviceType', 'android') ->get();

                $androidCount = count($passUserAndroid);


                if(!empty($passUserAndroid)){
                    foreach($passUserAndroid as $key => $singlePassUser){
                        $passId = PassUser::where('id', $singlePassUser->id)->update([
                            'message_sent' => $message,
                            'update_sent' => 1,
                        ]);

                        $classSuffix = $singlePassUser->classSuffix;
                        $objectSuffix =$singlePassUser->objectSuffix;    

                        $this->update_google_wallet($message, $classSuffix, $objectSuffix);

                    }
                }

                $addcount = $applecount + $androidCount;
                $messageHistory->reach = $addcount;
                $messageHistory->save();
                
            }  
            
            return response(json_encode(["status"=> true , "message"=> "send sucessfully"]),200);
        }

        // ---- According to select one by one Customer -----
        if(!empty($customerId)){
            $messageHistory->reach = count($customerId);
            $messageHistory->save();
            foreach($customerId as $item)
            {
                $passdetails = PassUser::where('id', $item)->where('pass_id',$passId)->first();

                if($passdetails){
                    $passdetails->update([
                        'update_sent' => 1,
                        'message_sent' => $message,
                    ]);

                    $classSuffix = $passdetails->classSuffix;
                    $objectSuffix =$passdetails->objectSuffix;

                    if($passdetails->deviceType == "apple"){
                        $apnNotification = new ApnNotification();
                        $passdetails->notify($apnNotification);
                    }else{
                        $this->update_google_wallet($message, $classSuffix, $objectSuffix);
                    }
                }
            }

            return response(json_encode(["status"=> true , "message"=> "send sucessfully"]),200);
        }
    }


    public function messageHistory()
    {
        $messageHistory = $this->message_repository->getMessageHistory();

        if ($messageHistory['status']) {
            $data = $messageHistory['data'];
            $message = "Get Message History Successfully.";
            return $this->success_response($data, $message);
        } else {
            $error = $user['error'];
            $message = "Something went wrong";
            return $this->fail_response($message);
        }
    }


    public function passUserList(Request $request, $id)
    {
        $passUserList = $this->message_repository->passUserList($id);

        if ($passUserList['status']) {
            $data = $passUserList['data'];
            $message = "Pass User List Get Successfully.";
            return $this->success_response($data, $message);
        } else {
            $error = $user['error'];
            $message = "Something went wrong";
            return $this->fail_response($message);
        }
    }
}
