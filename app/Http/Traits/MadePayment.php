<?php
namespace App\Http\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

trait MadePayment{

    public function paytab_payment($plan, $user){
        $paytab_baseurl = env("PAYTAB_BASEURL");
        $paytab_server_key = env("PAYTAB_SERVER_KEY");
        $paytab_profile_id = env("PAYTAB_PROFILE_ID");

        try {

            $client = new Client();

            $response = $client->post($paytab_baseurl, [
                'headers' => [
                    'Authorization' => $paytab_server_key,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'profile_id' => $paytab_profile_id,
                    'tran_type' => 'sale',
                    'tran_class' => 'ecom',
                    'cart_id' => "plan_id_".$plan->id."",
                    'cart_description' => $plan->plan_name,
                    'cart_currency' => $plan->currency_symbol,
                    'cart_amount' => $plan->price,
                    // 'callback' => 'https://yourdomain.com/yourcallback',
                    'return' => route('plan.sub',['plan'=> $plan,'user' => $user]),
                ],
            ]);

            // Get the response body
            $body = $response->getBody()->getContents();
            return $responseData = json_decode($body);

            if ($responseData && isset($responseData->redirect_url) && !empty($responseData->redirect_url)) {
                return redirect($responseData->redirect_url);
            } else {
                // Handle the case when there is no redirect_url or it's empty
                // You might want to log this or handle it in a way that fits your application logic
                return redirect()->back()->with('danger','something went wrong!');
            }
        }
        catch (RequestException $e) {
            // Guzzle request exception handling
            $response = $e->getResponse();

            if ($response) {
                // Get the response body or other information
                $statusCode = $response->getStatusCode();
                $errorMessage = $response->getBody()->getContents();
                // Return or handle the response as needed
                return $errorMessage;
            } else {
                // Handle other Guzzle exceptions
                $errorMessage = $e->getMessage();
                // Log the error or return a generic error response
                Log::error("Guzzle Request Exception: " . $errorMessage);
                return 'An error occurred while processing the request';
            }
        }
    }

    public function is_valid_redirect($post_values)
    {
        if (empty($post_values) || !array_key_exists('signature', $post_values)) {
            return false;
        }

        $serverKey = env("PAYTAB_SERVER_KEY");

        // Request body include a signature post Form URL encoded field
        // 'signature' (hexadecimal encoding for hmac of sorted post form fields)
        $requestSignature = $post_values["signature"];
        unset($post_values["signature"]);
        $fields = array_filter($post_values);

        // Sort form fields
        ksort($fields);

        // Generate URL-encoded query string of Post fields except signature field.
        $query = http_build_query($fields);

        return $this->is_genuine($query, $requestSignature, $serverKey);
    }


    private function is_genuine($data, $requestSignature, $serverKey)
    {
        $signature = hash_hmac('sha256', $data, $serverKey);

        if (hash_equals($signature, $requestSignature) === TRUE) {
            // VALID Redirect
            return true;
        } else {
            // INVALID Redirect
            return false;
        }
    }
}
