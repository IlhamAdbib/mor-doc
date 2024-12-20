<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeathCertificateRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
        // No data needed
    }

    public function build()
    {
        return $this->subject('تأكيد طلب شهادة وفاة')
                    ->view('emails.death_certificate_request');
    }
}
