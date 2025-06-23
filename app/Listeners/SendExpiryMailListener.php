<?php

namespace App\Listeners;

use App\Events\SendExpiryMailEvent;
use App\Models\User;
use App\Notifications\PlanExpiryNotification;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SendExpiryMailListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendExpiryMailEvent $event): void
    {
        // $user = User::get();
        $oneDayFromNow = Carbon::now()->addDay();
        $expiringUsers = User::whereDate('plan_expiry', $oneDayFromNow->toDateString())->get();
        foreach($expiringUsers as $user){
            $user->notify(new PlanExpiryNotification($user));
            // Log::info('Custom event data: '.json_encode($user->email));
        }
    }
}
