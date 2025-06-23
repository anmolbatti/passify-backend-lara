<?php

namespace App\Repositories;

use App\Interfaces\PaymentTransactionRepositoryInterface;
use App\Interfaces\PlanRepositoryInterface;
use App\Interfaces\SubscriptionRepositoryInterface;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PlanRepository implements PlanRepositoryInterface
{
    private $plan;
    private $subscriptionRepository;
    private $paymentTransactionRepository;
    
    public function __construct(Plan $plan, SubscriptionRepositoryInterface $subscriptionRepository, PaymentTransactionRepositoryInterface $paymentTransactionRepository)
    {
        $this->plan = $plan;
        $this->subscriptionRepository = $subscriptionRepository;
        $this->paymentTransactionRepository = $paymentTransactionRepository;
    }

    public function getAllPlans(){
        return Plan::all()->groupBy('plan_type');
    }

    public function getPlanById($id){
        return Plan::find($id);
    }

    public function payment(array $data){
        $paytab_baseurl = env("PAYTAB_BASEURL");
        $paytab_server_key = env("PAYTAB_SERVER_KEY");
        $paytab_profile_id = env("PAYTAB_PROFILE_ID");
        $user = Auth::user();
        try {
            $plan = $this->plan->find($data['plan_id']);
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
                    'cart_id' => "'".$plan->id."'",
                    'cart_description' => $plan->plan_name,
                    'cart_currency' => $plan->currency_symbol,
                    'cart_amount' => $plan->price,
                    // 'callback' => route('plan.callback'),
                    'return' => route('plan.sub',['plan'=> $plan,'user' => $user]),
                ],
            ]);
            $status_code = $response->getStatusCode();
            if($status_code == 200){
                $body = $response->getBody()->getContents();
                $responseData = json_decode($body);
                $subscription = $this->subscriptionRepository->createSubscription($user->id, $plan->id);
                $this->paymentTransactionRepository->createTransaction($responseData->tran_ref, $responseData->cart_id, $user->id, $subscription->id, $responseData->tran_type);
                if ($responseData && isset($responseData->redirect_url) && !empty($responseData->redirect_url)) {
                    return ['status' => true, 'data' => $responseData->redirect_url];
                }
                else {
                return ['status' => false,  'error' => 'Something went wrong!'];
                }
            }
            else{
                return ['status' => false,  'error' => 'Error: There is error in your request!'];
            }
        }
        catch (RequestException $e) {
            $response = $e->getResponse();

            if ($response) {
                $statusCode = $response->getStatusCode();
                $errorMessage = $response->getBody()->getContents();
                return ['status' => false,  'error' => json_decode($errorMessage)->message];
            } else {
                $errorMessage = $e->getMessage();
                Log::error("Guzzle Request Exception: " . $errorMessage);
                return ['status' => false,  'error' => 'An error occurred while processing the request'];
            }
        }
    }

    public function refund_check(){
        $user = Auth::user();
        $user = User::where('id',$user->id)->with('subscription')->with('subscription.payment_transactions')->first();
        if($user->subscription == null && $user->subscription == ""){
            return ['status' => false,  'error' => 'Error: No subscription found!'];
        }
        $plan = $user->subscription->plan;
        $payment_transaction = $user->subscription->payment_transactions->where('tran_type','Sale')->first();

        $paytab_baseurl = env("PAYTAB_BASEURL");
        $paytab_payment_query = env("PAYTAB_PAYMENT_QUERY");
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
                    'tran_type' => 'refund',
                    'tran_class' => 'ecom',
                    'cart_id' => "'".$plan->id."'",
                    'cart_description' => "refund from web",
                    'cart_currency' => $plan->currency_symbol,
                    'cart_amount' => $plan->price,
                    // 'callback' => route('plan.callback'),
                    'return' => route('plan.refund_callback',['subscription'=> $user->subscription,'user' => $user]),
                    "tran_ref" => $payment_transaction->tran_ref
                ],
            ]);
            $status_code = $response->getStatusCode();
            if($status_code == 200){
                $body = $response->getBody()->getContents();
                $responseData = json_decode($body);
                $this->subscriptionRepository->deactivateStatus($user->id, $plan->id);
                $this->paymentTransactionRepository->createTransaction($responseData->tran_ref, $responseData->cart_id, $user->id, $user->subscription->id, $responseData->tran_type);
                if ($responseData) {
                    return ['status' => true, 'data' => 'Success: Your request is sent.'];
                }
                else {
                return ['status' => false,  'error' => 'Something went wrong!'];
                }
            }
            else{
                return ['status' => false,  'error' => 'Error: Soory your request is not verified!'];
            }
        }
        catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response) {
                $statusCode = $response->getStatusCode();
                $errorMessage = $response->getBody()->getContents();
                return ['status' => false,  'error' => 'Error: '.json_decode($errorMessage)->message];
            } else {
                $errorMessage = $e->getMessage();
                Log::error("Guzzle Request Exception: " . $errorMessage);
                return ['status' => false,  'error' => 'An error occurred while processing the request'];
            }
        }
    }
}
