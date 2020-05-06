<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Traits\SchoolBase;
use App\Traits\PaymentGateway;

class FeedBackController extends Controller
{
    use SchoolBase; use PaymentGateway;

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
        $id = auth()->user()->id;
        $school = $this->getSchoolInUsed($id);

        if($school) {
            // get schools tied to the account & banks list
            $schools = $this->getSchoolsForTheAccount($id);
            $banknames = $this->getListOfBanks();

            //return contact view
            return view('school.feedback')->with(['schools' => $schools, 'banknames' => $banknames]);
        } else {
            return redirect(route('school.dashboard'));
        }
    }


    /**
     * send email from contact form
     */
    public function postFeedback(Request $request)
    {
        //validate the inputs
        $this->validate($request, [
            'subject' => 'required',
            'bodymessage' => 'required'
        ]);

        $id = auth()->user()->id;
        $school = $this->getSchoolInUsed($id);

        $data = array(
            'school' => strtoupper($school->schoolname),
            'subject' => $request->input('subject'),
            'bodymessage' => $request->input('bodymessage'),
        );

        Mail::send('emails.feedback', $data, function($message) use ($data) {
            // feedback email
            $feedback_email = env('FEEDBACK_EMAIL');

            $message->from('no-reply@skooleo.com');
            $message->to( $feedback_email );
            $message->subject($data['subject']);

        });

        return redirect(route('school.feedback'))->with('success', 'Feedback sent successfully.');

    }

}
