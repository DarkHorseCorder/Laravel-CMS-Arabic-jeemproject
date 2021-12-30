<?php

namespace App\Http\Controllers\Web;

use App\Contact;
use App\Events\ContactCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Mail\ContactAdminMail;
use App\Mail\ContactMail;
use App\WebSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        $web_setting = WebSetting::first();

        return view('pages.contact', compact('web_setting'));
    }

    public function store(StoreContactRequest $request)
    {
        // return $request->all();

        $contact = Contact::create($request->all());

        // event(new ContactCreated($contact));
        $emails = [$contact->email, config('mail.from.address')];

        // Mail::send( new ContactMail($contact), [],
        // function($message) use ($emails){
        //     $message->to($emails)->subject('This is test e-mail');
        // });

        // var_dump( Mail:: failures() );

        // Send mail to user
        Mail::to($contact->email)->send(new ContactMail($contact));

        // Send mail to admin
        // Mail::to(config('mail.from.address'))->send(new ContactAdminMail($contact));

        return redirect()->back()->withSuccess('Thank you for showing your intrest, We\'ve receive your query successfully.');
    }
}
