<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class ApplicationRejected extends Mailable
{
    use Queueable, SerializesModels;

    public $applicant; 
    public function __construct($applicant)
    {
        $this->applicant = $applicant;
    }

    public function build()
    {
        return $this->subject('Application Rejected')
                    ->view('emails.application_rejected')
                    ->with([
                        'applicant' => $this->applicant,
                    ])
                    ->attach(public_path('images/cl.png'), [
                        'as' => 'logo.png',
                        'mime' => 'image/png',
                    ]);
    }
    
    
}
