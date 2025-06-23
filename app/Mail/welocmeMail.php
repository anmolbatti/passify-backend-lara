<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class welocmeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name, $lang;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $lang)
    {
        $this->name = $name;
        $this->lang = $lang;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = $this->lang == 'ara' ? 'مرحبًا بك في باسيفاي - تم التسجيل بنجاح' : "Welcome to Passify - Registration Successful!";
        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $template = $this->lang == 'ara' ? 'emails.welcome-ar' : 'emails.welcome';
        return new Content(
            markdown: $template,
            with: [$this->name]
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
