<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BirthCertificateRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $recipient_name;

    public function __construct($recipient_name)
    {
        $this->recipient_name = $recipient_name;
    }

    public function build()
    {
        return $this->subject('تأكيد طلب شهادة ميلاد')
                    ->view('emails.birth_certificate_request') // Define the view for the email content
                    ->with([
                        'recipient_name' => $this->recipient_name,
                    ]);
    }
}
