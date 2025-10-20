<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LeadConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $leadData;

    /**
     * Create a new message instance.
     */
    public function __construct($leadData)
    {
        $this->leadData = $leadData;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('🎉 Bem-vindo ao DevStarter Kit! Seu guia está aqui')
                    ->view('emails.lead-confirmation')
                    ->with([
                        'leadData' => $this->leadData
                    ]);
    }
}
