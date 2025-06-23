<?php
namespace App\Http\Traits;

use App\Models\Location;
use App\Models\Pass;
use App\Models\PassUser;
use App\Models\User;
use App\Models\PassLocation;
use App\Models\PassReward;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use PKPass\PKPass;
use Illuminate\Support\Facades\Log;

trait CreateApplePass{

    public function create_apple_pass($type,$pass_user_id, $return = false)
    {

        // $serviceUrl = "https://passify.info/api/update_pass/$serialNumber";wallet-update
        // $serviceUrl = "https://passify.info/wallet-update";
        $pass_user = PassUser::where('id',$pass_user_id)->first();
        $userLocation = Location::where('user_id',$pass_user->id)->pluck('location_search');
        $pass_temp = Pass::where('id',$pass_user->pass_id)->with('pass_images','passLocations')->first();
        $passLocations = PassLocation::with('location')->where('pass_id', $pass_temp->id)->get();
        $locations_searches = $passLocations->pluck('location.location_search');
        $merged_locations_search = $locations_searches->implode(' + ');
        $userdetails = User::where('id', $pass_user->id)->first();

        // Log::info("pass update called", $type);
        // return false;
        // $passReward = PassReward::where('pass_id', $pass_user->pass_id)->where('stamp_no' , $pass_user->stamps_earned)->first();
        // if($passReward){
        //     $message = $passReward->reward_success_message;
        // }
        // else{
            
        // }

        $serviceUrl = route('pass_update');

        switch($pass_temp->qr_type){
            case 'qr_code':
                $code_format = "PKBarcodeFormatQR";
                break;
            case 'aztec':
                $code_format = "PKBarcodeFormatAztec";
                break;
            case 'pdf_417':
                $code_format = "PKBarcodeFormatPDF417";
                break;
            case 'code_128':
                $code_format = "PKBarcodeFormatCode128";
                break;
        }

        $pass = new PKPass('Certificates.p12', 'passify786weak');

      
        // Standard Keys
        $data["passTypeIdentifier"] = "pass.passify.info";
        $data["formatVersion"] = 1;
        $data["organizationName"] = $pass_temp->businessName ?? 'Your organization Name';
        $data["teamIdentifier"] = "5TW9332T4J";
        $data["serialNumber"] = $pass_user->serialNumber;
        $data["serialNumber"] = $pass_user->serialNumber;
        $data["description"] = $pass_temp->businessName ?? 'Your Business name';

        $message = "";
        $updateStatus = 0;
        if($pass_user->update_sent == 1){
            $message = $pass_user->message_sent;
            $updateStatus = 1;
              $pass_user->update([
                'message_sent' => null,
                'update_sent' => 0,
            ]);
        }else{
            $message = 1;
        }

        $data[$type] = [
            "headerFields" => [ // array of field dictionaries - Optional. Fields to be displayed in the header on the front of the pass. Use header fields sparingly; unlike all other fields, they remain visible when a stack of passes are displayed.
                [
                    "changeMessage" => "Your Stamps updated to %@",
                    "key" => "points",
                    "label" => json_decode($pass_temp->header_fields)[0]->label ?? '',
                    "value" => $pass_user->stamps_earned . "/" . $pass_user->stamps_required_for_reward,
                ]
            ],
            
            "secondaryFields" => [
                [
                    "key" => "id",
                    "label" => json_decode($pass_temp->secondary_fields)[0]->label ?? '',
                    "value" => str($pass_user->stamps_required_for_reward),
                ],
                [
                    "key" => "unqieuestId",
                    "label" => json_decode($pass_temp->secondary_fields)[1]->label ?? '',
                    "value" => json_decode($pass_temp->secondary_fields)[1]->value ?? '',
                ]
            ],
        ];

        if ($updateStatus == 1) {
            $data[$type]["backFields"] = [
                [
                    "key" => "id1",
                    "label" => "LATEST UPDATE",
                    "value" => $message,
                    "changeMessage" => "%@"
                ],
                [
                    "key" => "id2",
                    "label" => "How to collect stamps",
                    "value" => $pass_temp->howToCollectStamps ?? 'Collect your stamp'
                ],
                [
                    "key" => "id3",
                    "label" => "Reward Details",
                    "value" => $pass_temp->rewardDetail ?? 'Your reward details'
                ],
                [
                    "key" => "id4",
                    "label" => "Stamps Required Until Next Reward",
                    "value" => "10"
                ],
                [
                    "key" => "id5",
                    "label" => "Reward Earned",
                    "value" => ""
                ],
                [
                    "key" => "id6",
                    "label" => "Locations",
                    "value" => $merged_locations_search ?? 'Pass Location here.'
                ],
                [
                    "key" => "id7",
                    "label" => "Useful Links",
                    "value" => "<a href='".$serviceUrl."'>Visit this link to update</a>"
                ],
                [
                    "key" => "id8",
                    "label" => "Terms and Conditions",
                    "value" => $pass_temp->termsAndConditions ?? 'Your reward details'
                ],
                [
                    "key" => "id9",
                    "label" => "Powered by",
                    "value" => $pass_temp->poweredBy ?? 'Your brand'
                ]
            ];
        }else{
            $data[$type]["backFields"] = [
                [
                    "key" => "id1",
                    "label" => "How to collect stamps",
                    "value" => $pass_temp->howToCollectStamps ?? 'Collect your stamp'
                ],
                [
                    "key" => "id2",
                    "label" => "Reward Details",
                    "value" => $pass_temp->rewardDetail ?? 'Your reward details'
                ],
                [
                    "key" => "id3",
                    "label" => "Stamps Required Until Next Reward",
                    "value" => "10"
                ],
                [
                    "key" => "id4",
                    "label" => "Reward Earned",
                    "value" => ""
                ],
                [
                    "key" => "id5",
                    "label" => "Locations",
                    "value" => $merged_locations_search ?? 'Pass Location here.'
                ],
                [
                    "key" => "id6",
                    "label" => "Useful Links",
                    "value" => "<a href='".$serviceUrl."'>Visit this link to update</a>"
                ],
                [
                    "key" => "id7",
                    "label" => "Terms and Conditions",
                    "value" => $pass_temp->termsAndConditions ?? 'Your reward details'
                ],
                [
                    "key" => "id8",
                    "label" => "Powered by",
                    "value" => $pass_temp->poweredBy ?? 'Your brand'
                ]
            ];
        }

        $data["barcode"] = [
            "format" =>  $code_format,
            "message" => $pass_user->serialNumber,
            "messageEncoding" => "iso-8859-1",
            "altText" => $pass_user->serialNumber
        ];
        $data["backgroundColor"] = $pass_temp->card_bg_color; // color, as a string
        $data["foregroundColor"] = $pass_temp->card_txt_color; // color, as a string
        $data["labelColor"] = $pass_temp->card_txt_color; // color, as a string

        $data["authenticationToken"] = $pass_user->auth_token; // string
        $data["webServiceURL"] = $serviceUrl; // string

        $pass->setData($data);

        if(isset($pass_temp->logo_image)){
            copy($pass_temp->logo_image, 'Event.pass/icon.png') or die('Failed to copy logo image');
        }
        $pass->addFile('Event.pass/icon.png');

        if(isset($pass_temp->logo_image)){
            copy($pass_temp->logo_image, 'Event.pass/icon@2x.png') or die('Failed to copy logo image');
        }
        $pass->addFile('Event.pass/icon@2x.png');

        if(isset($pass_temp->logo_image)){
            copy($pass_temp->logo_image, 'Event.pass/logo.png') or die('Failed to copy logo image');
        }
        $pass->addFile('Event.pass/logo.png');

        $strip_bg_path = $pass_temp->pass_images->where('stamp_earned',$pass_user->stamps_earned)->first();
        $strip_bg_path = $strip_bg_path->image;

        if(isset($strip_bg_path)){
            copy($strip_bg_path, 'Event.pass/background.png') or die('Failed to copy logo image');
        }
        $pass->addFile('Event.pass/background.png');

        if(isset($strip_bg_path)){
            copy($strip_bg_path, 'Event.pass/strip.png') or die('Failed to copy logo image');
        }
        $pass->addFile('Event.pass/strip.png');

        $pass->setName('My_Passify_Card');

        if($return){
            return $pass_file = $pass->create(true);
        }
        else{
            $pass_file = $pass->create(true);
            $storagePath = public_path('storage/passes');

            if (!file_exists($storagePath)) {
                mkdir($storagePath, 0755, true);
            }

            $storage_path = 'passes/pass_' .($pass_user->serialNumber) . '.pkpass';


            Storage::disk('public')->put($storage_path, $pass_file);
            return URL::to('/') . Storage::url($storage_path);

        }

    }
}
