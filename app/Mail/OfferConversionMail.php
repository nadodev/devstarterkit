<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OfferConversionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $lead;
    public $offerLink;
    public $unsubscribeLink;

    /**
     * Create a new message instance.
     */
    public function __construct($lead)
    {
        $this->lead = $lead;
        $this->offerLink = url('/products');
        $this->unsubscribeLink = url('/email/unsubscribe?email=' . urlencode($lead->email) . '&token=' . $lead->unsubscribe_token);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🎁 Seu bônus R$197 liberado (só hoje)',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.offer-conversion',
            with: [
                'lead' => $this->lead,
                'offerLink' => $this->offerLink,
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
