<?php

namespace App\Repositories;

use App\Interfaces\SubscriptionRepositoryInterface;
use App\Models\Plan;
use App\Models\User;
use App\Models\Subscription;
use Carbon\Carbon;

class SubscriptionRepository implements SubscriptionRepositoryInterface
{
    public function createSubscription($user_id, $plan_id){
        $plan = Plan::find($plan_id);

        if($plan->plan_type = 'monthly'){
            $expire_at = Carbon::now()->addDays($plan->trial_period_in_days)->addMonth();
        }
        else if($plan->plan_type = 'annual'){
            $expire_at = Carbon::now()->addDays($plan->trial_period_in_days)->addYear();
        }

        return Subscription::create([
            'user_id' => $user_id,
            'plan_id' => $plan_id,
            'expire_at' => $expire_at,
            'status' => false
        ]);
    }

    public function activateStatus($user_id, $plan_id){

        $plan = Plan::find($plan_id);
        if($plan->plan_type = 'monthly'){
            $expire_at = Carbon::now()->addDays($plan->trial_period_in_days)->addMonth();
        }
        else if($plan->plan_type = 'annual'){
            $expire_at = Carbon::now()->addDays($plan->trial_period_in_days)->addYear();
        }

        $Subscription = Subscription::where('user_id',$user_id)->where('plan_id',$plan_id)->where('status',false)->first();

        $user = User::where('id',$user_id)->first();

        $user->update([
            'plan_activated' => Carbon::now(),
            'plan_expiry' => $expire_at,
            'trail_expiry' => null
        ]);
        return $Subscription->update([
            'status' => true
        ]);
    }

    public function deactivateStatus($user_id, $plan_id){
        $plan = Plan::find($plan_id);
        if($plan->plan_type = 'monthly'){
            $expire_at = Carbon::now()->addDays($plan->trial_period_in_days)->addMonth();
        }
        else if($plan->plan_type = 'annual'){
            $expire_at = Carbon::now()->addDays($plan->trial_period_in_days)->addYear();
        }

        $Subscription = Subscription::where('user_id',$user_id)->where('plan_id',$plan_id)->where('status',true)->first();

        $user->update([
            'plan_activated' => null,
            'plan_expiry' => null,
            'trail_expiry' => Carbon::now(),
        ]);

        return $Subscription->update([
            'status' => false
        ]);
    }
}
