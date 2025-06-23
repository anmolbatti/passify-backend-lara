<?php

namespace App\Http\Traits;

use Exception;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
// use Google\Auth\Credentials\ServiceAccountCredentials;
// use Google\Client as GoogleClient;
// use Google\Service\Walletobjects;
use Google\Service\Walletobjects\LoyaltyPointsBalance;
use Google\Service\Walletobjects\LoyaltyPoints;
use Google\Service\Walletobjects\LoyaltyObject;
use Google\Service\Walletobjects\LoyaltyClass;
use Google\Service\Walletobjects\LatLongPoint;
use Google\Service\Walletobjects\Barcode;
use Google\Service\Walletobjects\ImageModuleData;
use Google\Service\Walletobjects\LinksModuleData;
use Google\Service\Walletobjects\TextModuleData;
use Google\Service\Walletobjects\InfoModuleData;
use Google\Service\Walletobjects\TranslatedString;
use Google\Service\Walletobjects\LocalizedString;
use Google\Service\Walletobjects\ImageUri;
use Google\Service\Walletobjects\Image;
use Google\Service\Walletobjects\Message;
use Google\Service\Walletobjects\AddMessageRequest;
use Google\Service\Walletobjects\Uri;
use Illuminate\Support\Facades\Http;
use Google\Service\Walletobjects\LabelValue;
use Google\Service\Walletobjects\LabelValueRow;
use Throwable;
use Illuminate\Support\Str;
use App\Models\Location;
use App\Models\Pass;
use App\Models\PassUser;
use App\Models\User;
use App\Models\PassLocation;
use App\Models\PassReward;
use App\Http\Requests\API\GoogleWalletNotificationRequest;
use App\Models\PassImage;
use Illuminate\Support\Facades\Storage;

trait CreateGooglePass
{

    public function create_Google_pass($type, $pass_user_id, $return = false)
    {
        $issuerId = config('app.google_issuer');

        $pass_user = PassUser::where('id', $pass_user_id)->first();
        $userLocation = Location::where('user_id', $pass_user->id)->pluck('location_search');
        $pass_temp = Pass::where('id', $pass_user->pass_id)->with('pass_images', 'passLocations')->first();
        $passLocations = PassLocation::with('location')->where('pass_id', $pass_temp->id)->get();
        $locations_searches = $passLocations->pluck('location.location_search');
        $merged_locations_search = $locations_searches->implode(' + ');
        $userdetails = User::where('id', $pass_temp->vendor_id)->first();
        $deteail = $pass_temp->pass_images->where('stamp_earned', $pass_user->stamps_earned)->first();
        // $logo_URL =  Storage::url($pass_temp->logo_image);
        $logo_URL = 'http://farm4.staticflickr.com/3738/12440799783_3dc3c20606_b.jpg';

        $urlsArr = array();

        // dd($pass_temp);

        if ($userdetails->phone && !empty($userdetails->phone)) {
            $urlsArr[] = new Uri([
                'uri' => 'tel:' . $userdetails->phone,
                'description' => 'Link module tel description',
                'id' => 'LINK_MODULE_TEL_ID'
            ]);
        }

        $lat = "";
        $long = "";

        if ($passLocations && !empty($passLocations)) {
            foreach ($passLocations as $key => $singleLocation) {
                if ($singleLocation->location->latitude) {

                    $lat = $singleLocation->location->latitude;
                    $long = $singleLocation->location->longitude;
                    $des = $singleLocation->location->location_description;

                    $urlsArr[] = new Uri([
                        'uri' => 'https://maps.google.com/maps/?q=loc:' . $lat . "," . $long . "(" . $des . ")",
                        'description' => $des,
                        'id' => 'location_uri_id_' . $singleLocation->location->id
                    ]);
                }
            }
        }

        // See link below for more information on required properties
        $classSuffix = Str::random(4);
        $objectSuffix = Str::random(6);

        $pass_user->update([
            "classSuffix" => $classSuffix,
            "objectSuffix" => $objectSuffix
        ]);

        switch ($pass_temp->qr_type) {
            case 'qr_code':
                $code_format = "QR_CODE";
                break;
            case 'aztec':
                $code_format = "AZTEC";
                break;
            case 'pdf_417':
                $code_format = "PDF_417";
                break;
            case 'code_128':
                $code_format = "CODE_128";
                break;
        }


        $newClass = new LoyaltyClass([
            'id' => "{$issuerId}.{$classSuffix}",
            'issuerName' => $pass_temp->businessName ?? 'Your organization Name',
            'reviewStatus' => 'UNDER_REVIEW',
            'programName' => $pass_temp->businessName ?? 'Your organization Name',
            'programLogo' => new Image([
                'sourceUri' => new ImageUri([
                    'uri' => $logo_URL
                ]),
                'contentDescription' => new LocalizedString([
                    'defaultValue' => new TranslatedString([
                        'language' => 'en-US',
                        'value' => 'Logo description'
                    ])
                ])
            ])
        ]);

        // See link below for more information on required properties
        // https://developers.google.com/wallet/retail/loyalty-cards/rest/v1/loyaltyobject
        $newObject = new LoyaltyObject([
            'id' => "{$issuerId}.{$objectSuffix}",
            'classId' => "{$issuerId}.{$classSuffix}",
            'state' => 'ACTIVE',
            'heroImage' => new Image([
                'sourceUri' => new ImageUri([
                    'uri' => $logo_URL
                ]),
                'contentDescription' => new LocalizedString([
                    'defaultValue' => new TranslatedString([
                        'language' => 'en-US',
                        'value' => 'Hero image description'
                    ])
                ])
            ]),
            'infoModuleData' => new InfoModuleData([
                'labelValueRows' => [
                    new LabelValueRow([
                        'columns' => [
                            new LabelValue([
                                'label' => "LATEST UPDATE",
                                'value' => '.'
                            ])
                        ]
                    ]),
                    new LabelValueRow([
                        'columns' => [
                            new LabelValue([
                                'label' => "How your customers earn 1 stamp",
                                'value' => $pass_temp->how_can_earn
                            ])
                        ]
                    ]),
                    new LabelValueRow([
                        'columns' => [
                            new LabelValue([
                                'label' => "Business Name",
                                'value' => $pass_temp->businessName
                            ])
                        ]
                    ]),
                    new LabelValueRow([
                        'columns' => [
                            new LabelValue([
                                'label' => "How to Collect Stamps",
                                'value' => $pass_temp->howToCollectStamps
                            ])
                        ]
                    ]),
                    new LabelValueRow([
                        'columns' => [
                            new LabelValue([
                                'label' => "Reward Details",
                                'value' => $pass_temp->rewardDetail
                            ])
                        ]
                    ]),
                    new LabelValueRow([
                        'columns' => [
                            new LabelValue([
                                'label' => "Reward Name",
                                'value' => $pass_temp->reward_name
                            ])
                        ]
                    ]),
                    new LabelValueRow([
                        'columns' => [
                            new LabelValue([
                                'label' => "Reward Description",
                                'value' => $pass_temp->reward_description
                            ])
                        ]
                    ]),
                    new LabelValueRow([
                        'columns' => [
                            new LabelValue([
                                'label' => "Reward Success",
                                'value' => $pass_temp->reward_success_message
                            ])
                        ]
                    ]),
                    new LabelValueRow([
                        'columns' => [
                            new LabelValue([
                                'label' => "Stamp Success",
                                'value' => $pass_temp->stamp_success_message
                            ])
                        ]
                    ]),
                    new LabelValueRow([
                        'columns' => [
                            new LabelValue([
                                'label' => "Expiry Date",
                                'value' => $pass_temp->expiry_date
                            ])
                        ]
                    ]),
                    new LabelValueRow([
                        'columns' => [
                            new LabelValue([
                                'label' => "Terms & Conditions",
                                'value' => $pass_temp->termsAndConditions
                            ])
                        ]
                    ]),
                    new LabelValueRow([
                        'columns' => [
                            new LabelValue([
                                'label' => "Powered By",
                                'value' => $pass_temp->poweredBy
                            ])
                        ]
                    ])
                ]
            ]),
            'textModulesData' => [
                new TextModuleData([
                    'header' => 'How to collect stamps',
                    'body' => $pass_temp->howToCollectStamps ?? 'Collect your stamp',
                    'id' => 'id1'
                ])
            ],
            'linksModuleData' => new LinksModuleData([
                'uris' => $urlsArr
            ]),

            'imageModulesData' => [
                new ImageModuleData([
                    'mainImage' => new Image([
                        'sourceUri' => new ImageUri([
                            'uri' => 'http://farm4.staticflickr.com/3738/12440799783_3dc3c20606_b.jpg'
                        ]),
                        'contentDescription' => new LocalizedString([
                            'defaultValue' => new TranslatedString([
                                'language' => 'en-US',
                                'value' => 'Image module description'
                            ])
                        ])
                    ]),
                    'id' => 'IMAGE_MODULE_ID'
                ])
            ],

            'barcode' => new Barcode([
                'type' => $code_format,
                'value' => $pass_user->serialNumber
            ]),
            'message' => new Message([
                'header' => 'header',
                'body' => 'body',
                'id' => 'id12',
                'messageType' => 'TEXT'
            ]),
            'locations' => [
                new LatLongPoint([
                    'latitude' => $lat,
                    'longitude' =>  $long
                ])
            ],
            'accountId' => $pass_user->serialNumber,
            // 'accountName' => 'Account name',
            'loyaltyPoints' => new LoyaltyPoints([
                'balance' => new LoyaltyPointsBalance([
                    'value' => $pass_user->stamps_earned . "/" . $pass_user->stamps_required_for_reward
                ])
            ])
        ]);

        // The service account credentials are used to sign the JWT
        $serviceAccount = json_decode(file_get_contents($this->keyFilePath), true);
        // dd($serviceAccount);
        // Create the JWT as an array of key/value pairs
        $claims = [
            'iss' => $serviceAccount['client_email'],
            'aud' => 'google',
            'origins' => ['www.passify.info'],
            'typ' => 'savetowallet',
            'payload' => [
                'loyaltyClasses' => [
                    $newClass
                ],
                'loyaltyObjects' => [
                    $newObject
                ]
            ]
        ];
        $token = JWT::encode(
            $claims,
            $serviceAccount['private_key'],
            'RS256'
        );


        return redirect()->away("https://pay.google.com/gp/v/save/{$token}");
    }




    public function update_google_wallet($message, $classSuffix, $objectSuffix)
    {
        $issuerId = config('app.google_issuer');
        $id = "{$issuerId}.{$objectSuffix}";

        try {
            $updatedObject = $this->service->loyaltyobject->get($id);
        } catch (Throwable $ex) {
            return $ex;
        }

        $moduleData = $updatedObject->getInfoModuleData();
        $getInfoModuleData =  $moduleData->getLabelValueRows();
        unset($getInfoModuleData[0]);

        $latestUpdate = [new LabelValueRow([
            'columns' => [
                new LabelValue([
                    'label' => "LATEST UPDATE",
                    'value' => $message
                ])
            ]
        ])];

        $labelValueAdd = array_merge($latestUpdate, $getInfoModuleData);

        $infoModuleData =   new InfoModuleData([
            'labelValueRows' => $labelValueAdd
        ]);

        $updatedObject->setInfoModuleData($infoModuleData);

        $newMessage = new Message([
            'header' => 'LATEST UPDATE',
            'body' => $message,
            'messageType' => 'TEXT',
        ]);

        $updatedObject->setMessages($newMessage);

        $response = $this->service->loyaltyobject->update("{$issuerId}.{$objectSuffix}", $updatedObject);
    }

    public function createGoggleWallet($passUser, $pass)
    {
        $url = config('app.url');
        $issuerId = config('app.google_issuer');
        $logo = $url . $pass->logo_image;
        $passImages = PassImage::select("image_path as image")->where('pass_id', $pass->id)->where("stamp_earned", 0)->first()->image;
        if (!$passImages) {
            return false;
        }

        $passImages = $url . $passImages;

        $classSuffix = Str::random(4);
        $objectSuffix = Str::random(6);

        $qr_type = $pass->qr_type ?? 'qr_code';
        $serialNumber = $passUser->serialNumber ?? 'TestMode';
        $userdetails = User::find($pass->vendor_id);

        PassUser::where('id', $passUser->id)
            ->update([
                'classSuffix' => $classSuffix,
                'objectSuffix' => $objectSuffix
            ]);
        switch ($qr_type) {
            case 'qr_code':
                $code_format = "QR_CODE";
                break;
            case 'aztec':
                $code_format = "AZTEC";
                break;
            case 'pdf_417':
                $code_format = "PDF_417";
                break;
            case 'code_128':
                $code_format = "CODE_128";
                break;
            default:
                $code_format = "QR_CODE";
                break;
        }

        $newClass = new LoyaltyClass([
            'id' => "{$issuerId}.{$classSuffix}",
            'issuerName' => !is_null($userdetails->organization_name) ? $userdetails->organization_name : 'Passify',
            'reviewStatus' => 'UNDER_REVIEW',
            'programName' => !is_null($pass->business_name) ? $pass->business_name : $userdetails->organization_name,
            'hexBackgroundColor' => '#ffc5a5',
            'programLogo' => new Image([
                'sourceUri' => new ImageUri([
                    'uri' => $logo
                ]),
            ])
        ]);

        $newObject = new LoyaltyObject([
            'id' => "{$issuerId}.{$objectSuffix}",
            'classId' => "{$issuerId}.{$classSuffix}",
            'state' => 'ACTIVE',
            'heroImage' => new Image([
                'sourceUri' => new ImageUri([
                    'uri' => $passImages
                ]),
                'contentDescription' => new LocalizedString([
                    'defaultValue' => new TranslatedString([
                        'language' => 'en-US',
                        'value' => '_'
                    ])
                ])
            ]),
            'infoModuleData' => new InfoModuleData([
                'labelValueRows' => [
                    new LabelValueRow([
                        'columns' => [
                            new LabelValue([
                                'label' => "LATEST UPDATE",
                                'value' => '_'
                            ])
                        ]
                    ]),
                    new LabelValueRow([
                        'columns' => [
                            new LabelValue([
                                'label' => "How your customers earn 1 stamp",
                                'value' => $pass->how_can_earn ?? '_'
                            ])
                        ]
                    ]),
                    new LabelValueRow([
                        'columns' => [
                            new LabelValue([
                                'label' => "Business Name",
                                'value' => $pass->businessName ?? '_'
                            ])
                        ]
                    ]),
                    new LabelValueRow([
                        'columns' => [
                            new LabelValue([
                                'label' => "How to Collect Stamps",
                                'value' => $pass->howToCollectStamps ?? '_'
                            ])
                        ]
                    ]),
                    new LabelValueRow([
                        'columns' => [
                            new LabelValue([
                                'label' => "Reward Details",
                                'value' => $pass->rewardDetail ?? '_'
                            ])
                        ]
                    ]),
                    new LabelValueRow([
                        'columns' => [
                            new LabelValue([
                                'label' => "Reward Name",
                                'value' => $pass->reward_name ?? '_'
                            ])
                        ]
                    ]),
                    new LabelValueRow([
                        'columns' => [
                            new LabelValue([
                                'label' => "Reward Description",
                                'value' => $pass->reward_description ?? '_'
                            ])
                        ]
                    ]),
                    new LabelValueRow([
                        'columns' => [
                            new LabelValue([
                                'label' => "Reward Success",
                                'value' => $pass->reward_success_message ?? '_'
                            ])
                        ]
                    ]),
                    new LabelValueRow([
                        'columns' => [
                            new LabelValue([
                                'label' => "Stamp Success",
                                'value' => $pass->stamp_success_message ?? '_'
                            ])
                        ]
                    ]),
                    new LabelValueRow([
                        'columns' => [
                            new LabelValue([
                                'label' => "Expiry Date",
                                'value' => $pass->expiry_date ?? '_'
                            ])
                        ]
                    ]),
                    new LabelValueRow([
                        'columns' => [
                            new LabelValue([
                                'label' => "Terms & Conditions",
                                'value' => $pass->termsAndConditions ?? '_'
                            ])
                        ]
                    ]),
                    new LabelValueRow([
                        'columns' => [
                            new LabelValue([
                                'label' => "Powered By",
                                'value' => $pass->poweredBy ?? '_'
                            ])
                        ]
                    ])
                ]
            ]),
            'imageModulesData' => [
                new ImageModuleData([
                    'mainImage' => new Image([
                        'sourceUri' => new ImageUri([
                            'uri' => $passImages
                        ]),
                        'contentDescription' => new LocalizedString([
                            'defaultValue' => new TranslatedString([
                                'language' => 'en-US',
                                'value' => 'Image module description'
                            ])
                        ])
                    ]),
                    'id' => "mAImg_" . $objectSuffix
                ])
            ],
            'barcode' => new Barcode([
                'type' => $code_format,
                'value' => $serialNumber
            ]),
            'locations' => [
                new LatLongPoint([
                    'latitude' => 37.424015499999996,
                    'longitude' =>  -122.09259560000001
                ])
            ],
            'accountId' => $serialNumber,
            'accountName' => "FY00" . $passUser->id,
            'loyaltyPoints' => new LoyaltyPoints([
                'balance' => new LoyaltyPointsBalance([
                    'string' =>  "0/" . $passUser->stamps_required_for_reward
                ]),
                "label" => "STAMP",
            ])

        ]);

        $passLocations = PassLocation::with('location')->where('pass_id', $pass->id)->get();
        $urlsArr = [];

        if ($passLocations && !empty($passLocations)) {
            foreach ($passLocations as $key => $singleLocation) {
                if ($singleLocation->location->latitude) {
                    $lat = $singleLocation->location->latitude;
                    $long = $singleLocation->location->longitude;
                    $des = $singleLocation->location->location_description;

                    $urlsArr[] = new Uri([
                        'uri' => 'https://maps.google.com/maps/?q=loc:' . $lat . "," . $long . "(" . $des . ")",
                        'description' => $des,
                        'id' => 'location_uri_id_' . $singleLocation->location->id
                    ]);
                }
            }
        }


        if ($userdetails) {
            if ($userdetails->phone && !empty($userdetails->phone)) {

                $urlsArr[] = new Uri([
                    'uri' => 'tel:' . $userdetails->phone,
                    'description' => 'Kindly Contact us if you have any qery',
                    'id' => 'Phone' . $objectSuffix
                ]);
            }

            if ($userdetails->organization_phone && !empty($userdetails->organization_phone)) {

                $urlsArr[] = new Uri([
                    'uri' => 'tel:' . $userdetails->organization_phone,
                    'description' => 'Kindly Contact us if you have any qery',
                    'id' => 'OrgPhone' . $objectSuffix
                ]);
            }
        }

        if (count($urlsArr) > 0) {
            $newObject->linksModuleData = new LinksModuleData([
                'uris' => $urlsArr
            ]);
        }
        // The service account credentials are used to sign the JWT
        $serviceAccount = json_decode(file_get_contents($this->keyFilePath), true);

        // Create the JWT as an array of key/value pairs
        $claims = [
            'iss' => $serviceAccount['client_email'],
            'aud' => 'google',
            'origins' => ['www.example.com'],
            'typ' => 'savetowallet',
            'payload' => [
                'loyaltyClasses' => [
                    $newClass
                ],
                'loyaltyObjects' => [
                    $newObject
                ]
            ]
        ];

        $token = JWT::encode(
            $claims,
            $serviceAccount['private_key'],
            'RS256'
        );

        return redirect()->away("https://pay.google.com/gp/v/save/{$token}");
    }
}
