<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Modules\Contact\Entities\Contact;

//Enables us to output flash messaging
use Session;

class ContactController extends Controller {

    public function show(Request $request, Contact $contact)
    {
        return View::make('frontend.contact.show', ['contact' => $contact]);
    }

    public function postForm(Contact $contact){

        $name = \Request::get('name');
        $email = \Request::get('email');
        $subject = \Request::get('subject');
        $detail = \Request::get('message');

        if ($email) {

            Mail::to($contact->contact_form_to_email,  \Setting::get('site.general.title'))->send(new ContactMail($name, $email, $subject, $detail));

            return Redirect::back()->with('message', 'We have successfully received your message and will get back to you as soon as possible.')->with("form_submit", "success");
        }
        return Redirect::back()->with('message', 'An error occured! Please try again.');
    }

}
