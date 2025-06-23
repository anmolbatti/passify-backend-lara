<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentTransactionInfoNotification extends Notification
{
    use Queueable;

    public $transactionData;

    /**
     * Create a new notification instance.
     */
    public function __construct($data)
    {
        $this->transactionData = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                ->subject('Transaction Alert')
                ->line('Congratulations!')
                ->line('Your transaction has been placed successfully.')
                ->line('Your transaction reference is : '.$this->transactionData->tran_ref)
                ->line('Your transaction amount is : '.$this->transactionData->amount)
                // ->action('Notification Action', url('/'))
                ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
