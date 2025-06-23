<?php
namespace App\Http\Traits;

use App\Models\Location;
use App\Models\Pass;
use App\Models\PassUser;
use App\Models\PassLocation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use PKPass\PKPass;

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
        // return $merged_locations_search;

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
        // Information that is required for all passes.
        $data["passTypeIdentifier"] = "pass.passify.info";
        $data["formatVersion"] = 1;
        $data["organizationName"] = "Starbucks";
        $data["teamIdentifier"] = "5TW9332T4J";
        $data["serialNumber"] = $pass_user->serialNumber;
        $data["serialNumber"] = $pass_user->serialNumber;
        // $data["description"] = 'sncjdnsjncj';
        $data["description"] = $pass_temp->businessName ?? 'Your Business name';

        // Associated App Keys
        // Information about an app that is associated with a pass.
        // "appLaunchURL" => "", // string
        // "associatedStoreIdentifiers" => [], // array

        // Companion App Keys
        // Custom information about a pass provided for a companion app to use.
        // "userInfo" => {}, // json

        // Expiration Keys
        // Information about when a pass expires and whether it is still valid.
        // A pass is marked as expired if the current date is after the pass’s expiration date, or if the pass has been explicitly marked as voided.
        // "expirationDate" => "" // W3C date, as a string
        // "voided" => "" // Boolean

        // Relevance Keys
        // Information about where and when a pass is relevant.
        // "beacons" => "", // array of beacon dictionaries
        // "locations" => "", // array of location dictionaries
        // "maxDistance" => "", // number
        // "relevantDate" => $pass_temp->expiry_date, // W3C date, as a string

        // Style Keys
        // Keys that specify the pass style
        // Provide exactly one key—the key that corresponds with the pass’s type. The value of this key is a dictionary containing the keys in Pass Structure Dictionary Keys.
        // "boardingPass" => "" //pass-structure dictionary
        // "coupon" =>  //pass-structure dictionary
        // "eventTicket" => [ //pass-structure dictionary
        // "generic" => [ //pass-structure dictionary
        // "storeCard" => [ //pass-structure dictionary
        $data[$type] = [
            // "auxiliaryFields" => [ // array of field dictionaries - Optional. Additional fields to be displayed on the front of the pass.
            //     [
            //         "key" => "aux",
            //         "label" => "auxiliary",
            //         "value" => "aux val"
            //     ]
            // ],
            "headerFields" => [ // array of field dictionaries - Optional. Fields to be displayed in the header on the front of the pass. Use header fields sparingly; unlike all other fields, they remain visible when a stack of passes are displayed.
                [
                    "key" => "points",
                    "label" => json_decode($pass_temp->header_fields)[0]->label ?? '',
                    "value" => $pass_user->stamps_earned . "/" . $pass_user->stamps_required_for_reward,
                ]
            ],
            // "primaryFields" => [ // array of field dictionaries - Optional. Fields to be displayed prominently on the front of the pass.
            //     [
            //         "key" => "cus",
            //         "label" => "Customer",
            //         "value" => $pass_user->name,
            //     ]
            // ],
            "secondaryFields" => [
                [
                    "key" => "id",
                    "label" => json_decode($pass_temp->secondary_fields)[0]->label ?? '',
                    "value" => str($pass_user->stamps_required_for_reward),
                    // "value" => str($pass_user->stamps_required_for_reward),
                ],
                [
                    // "key" => "unqieuestId",
                    "key" => "unqieuestId",
                    "label" => json_decode($pass_temp->secondary_fields)[1]->label ?? '',
                    "value" => json_decode($pass_temp->secondary_fields)[1]->value ?? '',
                ]
            ],
            "backFields" => [ // array of field dictionaries - Optional. Fields to be on the back of the pass.
                // [
                //     "key" => "id",
                //     "label" => "Card Number",
                //     "value" => $pass_user->serialNumber
                // ],
                [
                    "key" => "id1",
                    "label" => "How to collect stamps",
                    // "value" => $pass_temp->howToCollectStamps
                    "value" => $pass_temp->howToCollectStamps ?? 'Collect your stamp'
                ],
                [
                    "key" => "id2",
                    "label" => "Reward Details",
                    "value" => $pass_temp->rewardDetail ?? 'Your reward details'
                    // "value" => $pass_temp->rewardDetail
                    // "value" => 'snjsnjsnj'
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
                    // "value" => implode(',', $userLocation)
                    // "value" => json_decode($pass_temp->pass_locations) ?? 'Your Locations details'
                    // "value" => json_decode($pass_temp->passLocations)?? ''
                    // "value" => 'hfg378298'
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
                    // "value" => $pass_temp->termsAndConditions
                    // "value" => 'shdsjdhjshj'
                ],
                [
                    "key" => "id8",
                    "label" => "Powered by",
                    "value" => $pass_temp->poweredBy ?? 'Your brand'
                    // "value" => $pass_temp->poweredBy
                    // "value" => 'sjdnsj'
                ]
            ],

            // "transitType" => "", // string - Required for boarding passes; otherwise not allowed. Type of transit. Must be one of the following values: PKTransitTypeAir, PKTransitTypeBoat, PKTransitTypeBus, PKTransitTypeGeneric,PKTransitTypeTrain.


        ];

        // Visual Appearance Keys
        // Keys that define the visual style and appearance of the pass.
        // With the release of iOS 9, there are two ways to display a barcode:
        // The barcodes key (new and required for iOS 9 and later)
        // The barcode key (for iOS 8 and earlier)
        // To support older versions of iOS, use both keys. The system automatically selects the barcodes array for iOS 9 and later and uses the barcode dictionary for iOS 8 and earlier.
        // "barcodes" => "" // array of barcode dictionaries
        $data["barcode"] = [
            "format" =>  $code_format,
            "message" => $pass_user->serialNumber,
            "messageEncoding" => "iso-8859-1",
            "altText" => $pass_user->serialNumber
        ];
        $data["backgroundColor"] = $pass_temp->card_bg_color; // color, as a string
        $data["foregroundColor"] = $pass_temp->card_txt_color; // color, as a string
        // "groupingIdentifier" => "" , // string - Optional for event tickets and boarding passes; otherwise not allowed.
        $data["labelColor"] = $pass_temp->card_txt_color; // color, as a string
        // $data["suppressStripShine"] = ""; // Boolean - Optional. If true, the strip image is displayed without a shine effect.

        // Web Service Keys
        // Information used to update passes using the web service.
        // If a web service URL is provided, an authentication token is required; otherwise, these keys are not allowed.
        $data["authenticationToken"] = $pass_user->auth_token; // string
        $data["webServiceURL"] = $serviceUrl; // string


        // NFC-Enabled Pass Keys
        // NFC-enabled pass keys support sending reward card information as part of an Apple Pay transaction.
        // Important: NFC-enabled pass keys are only supported in passes that contain an Enhanced Passbook/NFC certificate. For more information, contact merchant support at https://developer.apple.com/contact/passkit/.
        // Passes can send reward card information to a terminal as part of an Apple Pay transaction. This feature requires a payment terminal that supports NFC-entitled passes. Specifically, the terminal must implement the Value Added Services Protocol.
        // Passes provide the required information using the nfc key. The value of this key is a dictionary containing the keys described in NFC Dictionary Keys. This functionality allows passes to act as the user’s credentials in the context of the NFC Value Added Service Protocol. It is available only for storeCard style passes.
        // "nfc" => "", // nfc dictionary - Optional. Information used for Value Added Service Protocol transactions. For this dictionary’s keys, see NFC Dictionary Keys (https://developer.apple.com/library/archive/documentation/UserExperience/Reference/PassKit_Bundle/Chapters/LowerLevel.html#//apple_ref/doc/uid/TP40012026-CH3-SW5).

        $pass->setData($data);

        // Add files to the pass
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

            // auto download
            return $pass_file = $pass->create(true);
        }
        else{

            // save to the directory and return access url
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
