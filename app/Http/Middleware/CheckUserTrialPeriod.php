<?php

namespace App\Http\Middleware;

use App\Http\Traits\ApiResponse;
use App\Models\Subscription;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserTrialPeriod
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    use ApiResponse;

    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        // Check User Free Trial
        if ($user && $user->created_at) {
            $createdAt = Carbon::parse($user->created_at);
            $currentDate = Carbon::now();
            if ($createdAt->diffInDays($currentDate) >= 30) {
                $freeTrialStatus = false;
            }
            else{
                $freeTrialStatus = true;
            }

            $subscription = Subscription::with('plan')->where('user_id' , $user->id)->where('status' , true)->first();
            if($subscription!= null || $subscription!=""){
                $plan_no_of_days = $subscription->plan->trial_period_in_days;
                $subscriptionDate = Carbon::parse($subscription->created_at);
                if ($subscriptionDate->diffInDays($currentDate) >= $plan_no_of_days) {
                    $subscriptionStatus = false;
                }
                else{
                    $subscriptionStatus = true;
                }
            }
            else{
                $subscriptionStatus = false;
            }
        }

        if(!$freeTrialStatus && !$subscriptionStatus){
            $error = 'error';
            $message = "Free trial or Plan time has been expired.";
            return $this->fail_response($message);
        }
        else{
            return $next($request);
        }

    }

    
}
