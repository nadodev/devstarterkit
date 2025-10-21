<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PurchaseConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $purchaseCode;
    public $customerName;
    public $customerEmail;
    public $purchaseDate;
    public $productValue;

    /**
     * Create a new message instance.
     */
    public function __construct($purchaseCode, $customerName = null, $customerEmail = null, $productValue = 197.00)
    {
        $this->purchaseCode = $purchaseCode;
        $this->customerName = $customerName ?? 'Cliente';
        $this->customerEmail = $customerEmail;
        $this->purchaseDate = now()->format('d/m/Y H:i');
        $this->productValue = $productValue;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🎉 Compra Confirmada - DevStarter Kit - Código de Acesso Incluído',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.purchase-confirmation',
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
