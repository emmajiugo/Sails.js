<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\School;

class FeedBackController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:school');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return contact view
        return view('school.feedback');
    }

    
    /**
     * send email from contact form
     */
    public function postFeedback(Request $request)
    {
        //get the shool logged in
        $schoolid = auth()->user()->id;
        $school = School::find($schoolid);

        //validate the inputs
        $this->validate($request, [
            'subject' => 'required',
            'bodymessage' => 'required'
        ]);

        $data = array(
            'subject' => $request->input('subject'),
            'bodymessage' => $request->input('bodymessage'),
            'school' => $school->schoolname,
        );

        Mail::send('emails.feedback', $data, function($message) {
            $message->from('no-reply@schoolpay.ng');
            $message->to('hello@schoolpay.ng'); //hello@schoolpay.ng
            $message->subject('FEEDBACK NOTE');
        });

        return redirect(route('school.feedback'))->with('success', 'Feedback sent successfully.');
    }
    
}
