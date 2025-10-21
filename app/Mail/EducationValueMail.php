<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EducationValueMail extends Mailable
{
    use Queueable, SerializesModels;

    public $lead;
    public $demoLink;
    public $unsubscribeLink;

    /**
     * Create a new message instance.
     */
    public function __construct($lead)
    {
        $this->lead = $lead;
        $this->demoLink = url('/products');
        $this->unsubscribeLink = url('/email/unsubscribe?email=' . urlencode($lead->email) . '&token=' . $lead->unsubscribe_token);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Como eu economizo 40h por projeto (sem começar do zero)',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.education-value',
            with: [
                'lead' => $this->lead,
                'demoLink' => $this->demoLink,
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
