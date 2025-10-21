<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GuideWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $lead;
    public $downloadLink;
    public $unsubscribeLink;

    /**
     * Create a new message instance.
     */
    public function __construct($lead)
    {
        $this->lead = $lead;
        $this->downloadLink = url('/guide-download');
        $this->unsubscribeLink = url('/email/unsubscribe?email=' . urlencode($lead->email) . '&token=' . $lead->unsubscribe_token);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Seu guia está aqui 🚀',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.guide-welcome',
            with: [
                'lead' => $this->lead,
                'downloadLink' => $this->downloadLink,
                'unsubscribeLink' => $this->unsubscribeLink,
            ]
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
