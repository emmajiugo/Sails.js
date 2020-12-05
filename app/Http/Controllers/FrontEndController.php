<?php

namespace App\Http\Controllers;

use App\WebSettings;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontEndController extends Controller
{

    /**
     * NOTE: Data sent to the front pages are coming form App\Http\ViewComposers
     */

    // return the index age
    public function index()
    {
        return view('index');
    }

    //return the pricing page
    public function pricing()
    {
        return view('pricing');
    }

    //return the contact page
    public function contact()
    {
        return view('contact');
    }

    public function contactPost(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // send mail to skooleo support
        $supportEmail = env('SUPPORT_EMAIL');
        
        Mail::to($supportEmail)->send(new ContactMail($request->subject, $request->name, $request->email, $request->message));

        return back()->with('message', 'Email sent successfully. We will reach out to you within the hour.');
    }
}
