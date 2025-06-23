<?php

namespace App\Listeners;

use App\Events\CustomerDownloadFileEvent;
use App\Models\PassUser;
use App\Notifications\CustomerDownloadFileNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class CustomerDownloadFileListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     */
    public function handle(CustomerDownloadFileEvent $event): void
    {
       $user = PassUser::where('email',$event->data['email'])->first();
       $event->data['user'] = $user;
       $user->notify(new CustomerDownloadFileNotification($event->data));
    }
}
