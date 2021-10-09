<?php

namespace Modules\Contact\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use Intervention\Image\Facades\Image;
use Modules\Contact\Entities\Contact;
use View;

class ContactController extends Controller
{
  
    public function index()
    {

        View::share('page_title', Lang::get('contact::contact.contacts'));

        $contacts = Contact::orderBy("created_at", "DESC")->get();
        return view('contact::backend.contact.index', ['contacts' => $contacts]);
    }

    public function create(Contact $contact)
    {
        View::share('page_title', Lang::get('contact::contact.create_edit'));
        return view('contact::backend.contact.create_edit');
    }

    public function store(Request $request, Contact $contact)
    {
        $this->validate($request, [
            'title'=>'required',
        ]);

        $contact = new Contact();
        $contact->phone = $request->get('phone');
        $contact->fax = $request->get('fax');
        $contact->email = $request->get('email');
        $contact->address = $request->get('address');
        $contact->longitude = $request->get('longitude');
        $contact->latitude = $request->get('latitude');
        $contact->contact_form_to_email = $request->get('contact_form_to_email');
        $contact->save();

        foreach (\Loc::getLocales() as $locale){

            if($request->input('title.'.$locale->code) == ""){
                continue;
            }

            $contact->setActiveLocale($locale->code);
            $contact->title = $request->input('title.'.$locale->code);
            $contact->slug = str_slug($request->input('title.'.$locale->code));
            $contact->save();
        }

        return redirect()->route("backend.contact.edit", ['contact' => $contact->id])->withSuccess( __('backend.save_success') );
    }

    public function edit(Contact $contact)
    {
        View::share('page_title', Lang::get('contact::contact.create_edit'));
        return view('contact::backend.contact.create_edit', ['contact' => $contact]);
    }

    public function update(Request $request, Contact $contact)
    {
        $this->validate($request, [
            'title'=>'required',
        ]);

        $contact->phone = $request->get('phone');
        $contact->fax = $request->get('fax');
        $contact->email = $request->get('email');
        $contact->address = $request->get('address');
        $contact->longitude = $request->get('longitude');
        $contact->latitude = $request->get('latitude');
        $contact->contact_form_to_email = $request->get('contact_form_to_email');
        $contact->save();

        foreach (\Loc::getLocales() as $locale){

            if($request->input('title.'.$locale->code) == ""){
                continue;
            }

            $contact->setActiveLocale($locale->code);
            $contact->title = $request->input('title.'.$locale->code);
            $contact->slug = str_slug($request->input('title.'.$locale->code));
            $contact->save();
        }


        
        return redirect()->route("backend.contact.edit", ['contact' => $contact->id])->withSuccess( __('backend.save_success') );
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route("backend.contact.index", [$contact->id])->withSuccess( __('backend.delete_success') );
    }

}
