<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubscriptionConfirmMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data, $lang;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->lang = $data['lang'];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = $this->data['lang'] == 'ara' ? 'مرحبًا بك في باسيفي! تم تأكيد اشتراكك' : 'Welcome to Passify! Your subscription is confirmed.';
        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $template = $this->data['lang'] == 'ara' ? 'emails.subscriptionSuccess-ar' : 'emails.subscriptionSuccess';
        return new Content(
            markdown: $template,
            with: [$this->data]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
