<?php

namespace App\Http\Controllers;

use App\Http\Traits\MadePayment;
use App\Interfaces\PaymentTransactionRepositoryInterface;
use App\Interfaces\SubscriptionRepositoryInterface;
use App\Mail\MadaPolicyMail;
use App\Mail\SubscriptionConfirmMail;
use App\Models\PaymentTransaction;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use App\Notifications\PaymentTransactionInfoNotification;
use App\Notifications\SubscriptionActivationNotification;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SubscriptionController extends Controller
{
    use MadePayment;

    private $paymentTransactionRepository;
    private $subscriptionRepository;

    public function __construct(
        PaymentTransactionRepositoryInterface $paymentTransactionRepositoryInterface,
        SubscriptionRepositoryInterface $subscriptionRepositoryInterface
    ) {
        $this->middleware('auth')->except(['subscribe', 'paytabs_callback']);
        $this->middleware('setLanguage');
        $this->middleware('localLang');

        $this->paymentTransactionRepository = $paymentTransactionRepositoryInterface;
        $this->subscriptionRepository = $subscriptionRepositoryInterface;
    }

    public function show()
    {

        $plans = Plan::all();
        $plan = Subscription::where('user_id', Auth::user()->id)->where('status', true)->with('plan')->first();
        return view('subscriptions.create')->with('plans', $plans)->with('plan', $plan->plan ?? false);
    }

    public function refund()
    {

        $user = User::with(['subscription' => function ($query) {
            $query->with('payment_transactions');
        }])->find(Auth::user()->id);

        $plan = optional($user->subscription)->plan;

        if ($plan) {
            $refunded = false;
        } else {
            $plan = false;
            $refunded = true;
        }

        return view('subscriptions.refund', compact('plan', 'refunded'));
    }

    public function fail()
    {
        return view('fail');
    }

    public function detail(Request $request)
    {
        // dd($request->all());
        $plan = Plan::findOrFail($request->plan_id);
        $plans = Plan::all();
        $is_user_sub = Subscription::where('user_id', Auth::user()->id)->first();
        return view('subscriptions.plan_detail')->with('plans', $plans)->with('plan', $plan)->with('is_user_sub', $is_user_sub);
    }

    public function refund_callback(Subscription $subscription, User $user, Request $request)
    {

        // $is_paid = $this->paymentTransactionRepository->checkIsPaid($plan->id,$user->id);
        $is_valid = $this->is_valid_redirect($request->all());
        if ($is_valid) {
            $user_id = $user->id;

            // $this->paymentTransactionRepository->makePaid($plan->id,$user->id);

            // $this->subscriptionRepository->activateStatus($user_id, $plan->id);

            $message['type'] = 'success';
            $message['body'] = 'Refund successful';
            return view('success');
        } else {
            return view('fail');
        }
        // return redirect()->route('plan.show')->with($message['type'],$message['body']);
    }

    public function subscribe(Plan $plan, User $user, Request $request)
    {
        // dd($request);
        // $is_paid = $this->paymentTransactionRepository->checkIsPaid($plan->id,$user->id);
        $is_valid = $this->is_valid_redirect($request->all());
        if (true) {
            $user_id = $user->id;

            $this->paymentTransactionRepository->makePaid($plan->id, $user->id);

            $this->subscriptionRepository->activateStatus($user_id, $plan->id);

            $message['type'] = 'success';
            $message['body'] = 'Subscription successful';
            $transactionInfo = PaymentTransaction::with('plan')->where('user_id', $user->id)->first();
            $renewDate = $transactionInfo->plan->plan_type == 'monthly' ? now()->addDays(30)->format('Y-m-d') : now()->addYear(1)->format('Y-m-d');

            $mailData = [
                'name' => $user->name,
                'planName' => $transactionInfo->plan->plan_name ?? 'Na',
                'date' => now()->format('Y-m-d'),
                'lang' => $user->language,
                'renewDate' => $renewDate,
                'trans_ref' => $transactionInfo->tran_ref,
                'amount' => $transactionInfo->amount,
                'currency' => $transactionInfo->currency,
                'plan_type' => $transactionInfo->plan->plan_type ?? 'Na',
                'unique_id' => "PSY2025" . $transactionInfo->id,
            ];

            // Mail::to($user->email)->send(new SubscriptionConfirmMail($mailData));
            // Mail::to($user->email)->send(new MadaPolicyMail($mailData));
            // $user->notify(new SubscriptionActivationNotification());
            // $user->notify(new PaymentTransactionInfoNotification($transactionInfo));
            return view('success');
        } else {
            return view('fail');
        }
        // return redirect()->route('plan.show')->with($message['type'],$message['body']);
    }

    public function paytabs_callback(Request $request)
    {
        Log::info("Call back called:");
        Log::info("Request:");
        Log::info('Request:', [
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'input' => $request->all(),
        ]);
        if (1 == 0) {
            $user_id = $user->id;

            if ($plan->plan_type == "monthly") {
                $expire_at = Carbon::now()->addMonths(1);
            } else if ($plan->plan_type == "annual") {
                $expire_at = Carbon::now()->addYears(1);
            }

            $subscription = Subscription::where('user_id', $user_id)->where('status', true)->first();

            if (!$subscription) {
                Subscription::create([
                    'user_id' => $user_id,
                    'plan_id' => $plan->id,
                    'expire_at' => $expire_at
                ]);
            } else {
                $subscription->update([
                    'user_id' => $user_id,
                    'plan_id' => $plan->id,
                    'expire_at' => $expire_at
                ]);
            }

            $message['type'] = 'success';
            $message['body'] = 'Subscription successful';
            //
        } else {
            return true;
        }
        return true;
    }
    public function payment(Plan $plan)
    {

        $paytab_baseurl = env("PAYTAB_BASEURL");
        $paytab_server_key = env("PAYTAB_SERVER_KEY");
        $paytab_profile_id = env("PAYTAB_PROFILE_ID");
        $user = Auth::user();

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
                    'cart_id' => "'" . $plan->id . "'",
                    'cart_description' => $plan->plan_name,
                    'cart_currency' => $plan->currency_symbol,
                    'cart_amount' => $plan->price,
                    // 'callback' => route('plan.callback'),
                    'return' => route('plan.sub', ['plan' => $plan, 'user' => $user]),
                ],
            ]);

            // Get the response body
            $body = $response->getBody()->getContents();
            $responseData = json_decode($body);
            // dd($responseData);

            // create subscriptions
            $subscription = $this->subscriptionRepository->createSubscription($user->id, $plan->id);

            // create transaction
            $this->paymentTransactionRepository->createTransaction($responseData->tran_ref, $responseData->cart_id, $user->id, $subscription->id, $responseData->tran_type);

            if ($responseData && isset($responseData->redirect_url) && !empty($responseData->redirect_url)) {
                return redirect($responseData->redirect_url);
            } else {
                // Handle the case when there is no redirect_url or it's empty
                // You might want to log this or handle it in a way that fits your application logic
                return redirect()->back()->with('danger', 'something went wrong!');
            }
        } catch (RequestException $e) {
            // Guzzle request exception handling
            $response = $e->getResponse();

            if ($response) {
                // Get the response body or other information
                $statusCode = $response->getStatusCode();
                $errorMessage = $response->getBody()->getContents();
                // Return or handle the response as needed
                return redirect()->route('plan.show')->with('danger', json_decode($errorMessage)->message);
            } else {
                // Handle other Guzzle exceptions
                $errorMessage = $e->getMessage();
                // Log the error or return a generic error response
                Log::error("Guzzle Request Exception: " . $errorMessage);
                return 'An error occurred while processing the request';
            }
        }
    }
    public function refund_check()
    {

        $user = Auth::user();
        $user = User::where('id', $user->id)->with('subscription')->with('subscription.payment_transactions')->first();
        $plan = $user->subscription->plan;
        $payment_transaction = $user->subscription->payment_transactions->where('tran_type', 'Sale')->first();

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
                    'cart_id' => "'" . $plan->id . "'",
                    'cart_description' => "refund from web",
                    'cart_currency' => $plan->currency_symbol,
                    'cart_amount' => $plan->price,
                    // 'callback' => route('plan.callback'),
                    'return' => route('plan.refund_callback', ['subscription' => $user->subscription, 'user' => $user]),
                    "tran_ref" => $payment_transaction->tran_ref
                ],
            ]);

            // Get the response body
            $body = $response->getBody()->getContents();
            $responseData = json_decode($body);

            // deactivateStatus subscription
            $this->subscriptionRepository->deactivateStatus($user->id, $plan->id);

            // create transaction
            $this->paymentTransactionRepository->createTransaction($responseData->tran_ref, $responseData->cart_id, $user->id, $user->subscription->id, $responseData->tran_type);

            if ($responseData) {
                return redirect()->back()->with('success', 'Successul');
            } else {
                // Handle the case when there is no redirect_url or it's empty
                // You might want to log this or handle it in a way that fits your application logic
                return redirect()->back()->with('danger', 'something went wrong!');
            }
        } catch (RequestException $e) {
            // Guzzle request exception handling
            $response = $e->getResponse();

            if ($response) {
                // Get the response body or other information
                $statusCode = $response->getStatusCode();
                $errorMessage = $response->getBody()->getContents();
                // Return or handle the response as needed
                return redirect()->route('plan.show')->with('danger', json_decode($errorMessage)->message);
            } else {
                // Handle other Guzzle exceptions
                $errorMessage = $e->getMessage();
                // Log the error or return a generic error response
                Log::error("Guzzle Request Exception: " . $errorMessage);
                return 'An error occurred while processing the request';
            }
        }
    }
}
