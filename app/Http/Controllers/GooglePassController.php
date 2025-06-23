<?php

namespace App\Http\Controllers;

use App\Http\Traits\CreateGooglePass;
use App\Models\PassUser;
use Exception;
use Illuminate\Http\Request;
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
use Illuminate\Support\Facades\Http;
use Throwable;
use Illuminate\Support\Str;


class GooglePassController extends Controller
{
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

    public function test()
    {
        $client = new GoogleClient();

    }

    public function update()
    {
        $issuerId = config('app.google_issuer');

        $classSuffix = 'bhri';
        $objectSuffix = 'cvfT7Q';
        $id = "{$issuerId}.{$objectSuffix}";

        try {
            $updatedObject = $this->service->loyaltyobject->get("{$issuerId}.{$objectSuffix}");
        } catch (Google\Service\Exception $ex) {
            return $ex;
        }

        // Update the object by adding a link
        $newLink = new Uri([
            'uri' => 'https://developers.google.com/wallet',
            'description' => 'New link description'
        ]);

        $linksModuleData = $updatedObject->getLinksModuleData();
        if (is_null($linksModuleData)) {
            // LinksModuleData was not set on the original object
            $linksModuleData = new LinksModuleData([
                'uris' => []
            ]);
        }
        $uris = $linksModuleData->getUris();
        array_push(
            $uris,
            $newLink
        );
        $linksModuleData->setUris($uris);

        $updatedObject->setLinksModuleData($linksModuleData);

        $response = $this->service->loyaltyobject->update("{$issuerId}.{$objectSuffix}", $updatedObject);

        print "Object update response\n";
        print_r($response);

        return $response->id;
    }
}
