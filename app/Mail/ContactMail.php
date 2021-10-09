<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $messageSubject;
    public $detail;

    public function __construct($name, $email, $subject, $detail)
    {

        $this->subject = \Setting::get('site.general.title') . " - " . $subject;

        $this->name = $name;
        $this->email = $email;
        $this->messageSubject = $subject;
        $this->detail = $detail;
    }

    public function build()
    {

        return $this->view('emails.contact');

    }
}
