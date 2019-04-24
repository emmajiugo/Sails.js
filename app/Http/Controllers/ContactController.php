<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return contact view
        return view('pages.contact');
    }

    
    /**
     * send email from contact form
     */
    public function postContact(Request $request)
    {
        //validate the inputs
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'bodymessage' => 'required'
        ]);

        $data = array(
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'subject' => $request->input('subject'),
            'bodymessage' => $request->input('bodymessage')
        );

        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('hello@schoolpay.ng');
            $message->subject($data['subject']);
        });

        return redirect('/contact')->with('success', 'Message sent successfully.');
    }
    
}
