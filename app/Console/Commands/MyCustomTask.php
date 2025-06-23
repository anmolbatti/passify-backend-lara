<?php

namespace App\Console\Commands;

use App\Events\SendExpiryMailEvent;
use App\Notifications\SubscriptionActivationNotification;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MyCustomTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'confirmation mail for expiry.';

    /**
     * Execute the console command.
     */
    protected function schedule(Schedule $schedule)
    {
        // // $user = Auth::user();
        // $schedule->command($user->notify(new SubscriptionActivationNotification()))
        //         ->everyMinute()
        //         ->after(function () {
        //             sleep(30); // add 30 seconds delay
        //         });

        // $schedule->command(function () {
        //     DB::table('subscriptions')->delete();
        //     })->everyMinute()
        //     ->after(function () {
        //         sleep(30); // add 30 seconds delay
        // });

        $schedule->command('minute:update')
             ->everyMinute()
             ->after(function () {
                 sleep(30); // add 30 seconds delay
        });
    }

    public function handle()
    {
        $user = Auth::user();
        event(new SendExpiryMailEvent());
        echo "Event has been called.";

        // $user->sendEmailVerificationNotification();
        // $user->notify(new SubscriptionActivationNotification());
        // DB::table('subscriptions')->delete();
        // echo "Subscription table is deleted.";
    }
}
