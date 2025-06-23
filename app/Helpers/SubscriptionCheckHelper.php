<?php

use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

function isSubscribed(){
    $user = Auth::user();
    if($user->parent_user != null && $user->parent_user != ""){
        $user_id = $user->parent_user;
    }
    else{
        $user_id = $user->id;
    }
    $currentTime = Carbon::now();
    $subscription = Subscription::where('status',1)->where('expire_at','>=',$currentTime)->where('user_id',$user_id)->first();
    if($subscription){
        return true;
    }
    else{
        return false;
    }
}

function subscription(){
    $user = Auth::user();
    if($user->parent_user != null && $user->parent_user != ""){
        $user_id = $user->parent_user;
    }
    else{
        $user_id = $user->id;
    }
    $currentTime = Carbon::now();
    $subscription = Subscription::where('status',1)->where('expire_at','>=',$currentTime)->where('user_id',$user_id)->first();
    if($subscription){
        $date = Carbon::parse($subscription->created_at);
        $now = Carbon::now();
        $diff = $date->diffInDays($now);

        $trial_days_left = $subscription->plan->trial_period_in_days - $diff;
        $status = true;
    }
    else{
        $user = User::find($user_id);
        $date = Carbon::parse($user->created_at);
        $now = Carbon::now();
        $diff = $date->diffInDays($now);

        $trial_days_left = 30 - $diff;
        $status = false;
    }

    return [
        "trial_days_left" => $trial_days_left,
        "status" => $status
    ];
}
