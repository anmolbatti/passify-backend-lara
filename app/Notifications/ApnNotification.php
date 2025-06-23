<?php
namespace App\Notifications;

use Illuminate\Notifications\Notification;
use NotificationChannels\Apn\ApnChannel;
use NotificationChannels\Apn\ApnMessage;

class ApnNotification extends Notification
{
    public function via($notifiable)
    {
        return [ApnChannel::class];
    }

    public function toApn($notifiable)
    {
        return ApnMessage::create()
            ->title('Notification Title')
            ->body('Notification Body')
            ->custom('customData', 'Your custom data here');
    }
}
