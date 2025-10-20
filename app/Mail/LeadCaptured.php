<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LeadCaptured extends Mailable
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
        return $this->subject('🔥 Novo Lead Capturado - DevStarter Kit')
                    ->view('emails.lead-captured')
                    ->with([
                        'leadData' => $this->leadData
                    ]);
    }
}
