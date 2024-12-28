<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BirthCertificateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $documentPath;

    public function __construct($documentPath)
    {
        $this->documentPath = $documentPath;
    }

    public function build()
    {
        return $this->subject('Acte de Naissance')
                    ->view('emails.birth_certificate')
                    ->attach($this->documentPath);
    }
}
