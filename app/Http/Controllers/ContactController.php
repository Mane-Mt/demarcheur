<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Mail\ContactMessageCreate;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $contact;
    public function index()
    {
        //
        $contacts = Contact::all();
        return view('adminLte.contacts')->with('contacts', $contacts);
    }

    public function savecontact(Request $request)
    {
        //
        $this->validate($request,[
            "name"=>'required|min:3',
            "email"=>'required|email',
            "message"=>'required|min:10',

        ]);

        $contact = new Contact;
        $contact->name = $request->input('name');
        $contact->email  = $request->input('email');
        $contact->message  = $request->input('message');
        $contact->save();
        $mailable = new ContactMessageCreate($request->input('name'), $request->input('email'), $request->input('message'));
        Mail::to('koledziabel@gmail.com')->send($mailable);

        /*foreach (['koledziabel@gmail.com', 'netvalley2021@gmail.com'] as $recipient) {
            Mail::to('koledziabel@gmail.com')->send($mailable);
        }*/
        flash('Votre message a ete envoye les admins vous repondront plutard');
        return redirect()->to('/' . '#' . 'message');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(contact $contact)
    {
        //
    }
}
