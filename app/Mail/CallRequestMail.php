<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CallRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $phone;

    public function __construct($phone)
    {

        $this->subject = \Setting::get('site.general.title') . " - " . "Arama Talebi";

        $this->phone = $phone;
    }

    public function build()
    {

        return $this->view('emails.callrequest');

    }
}
