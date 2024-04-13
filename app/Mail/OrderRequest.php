<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $mailMessage;
    public $subject;
    public $sender;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message, $subject, $sender)
    {
        $this->mailMessage = $message;
        $this->subject = $subject;
        $this->sender = $sender;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address($this->sender, 'Client'),
            replyTo: [
                new Address($this->sender, 'Client'),
            ],
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'Mail.order-request',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
