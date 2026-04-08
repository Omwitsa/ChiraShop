<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }

    // public function __construct($data)
    // {
    //     $this->data = $data;
    // }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.notify-order', // The Blade file path
            with: [
                'name' => "Wilson",
            ],
        );
    }

    // public function content(): Content
    // {
    //     return new Content(
    //         markdown: 'mails.notify-order',
    //     );
    // }

    // public function build()
    // {
    //     return $this->subject('Contact Form')
    //                 ->view('emails.contact')
    //                 ->with('data', $this->data);
    // }

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
