<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Traits\SchoolBase;
use App\Traits\PaymentGateway;

use App\User;
use App\SupportTicket;
use App\SupportReply;

class SupportTicketController extends Controller
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

    //index finction
    public function index()
    {
        //get school and the support ticket relation
        $id = auth()->user()->id;
        $school = $this->getSchoolInUsed($id);

        //get support ticket
        $tickets = SupportTicket::where('school_detail_id', $school->id)->orderBy('created_at', 'DESC')->paginate(10);

        if($school) {
            // get schools tied to the account & banks list
            $schools = $this->getSchoolsForTheAccount($id);
            $banknames = $this->getListOfBanks();

            //return contact view
            return view('school.support-ticket')->with(['tickets' => $tickets, 'schools' => $schools, 'banknames' => $banknames]);
        } else {
            return redirect(route('school.dashboard'));
        }

    }

    //store the ticket in db
    public function store(Request $request)
    {
        // get the user and the school in use
        $id = auth()->user()->id;
        $school = $this->getSchoolInUsed($id);

        //validate data
        $this->validate($request, [
            'subject' => 'required',
            'department' => 'required',
            'supportbody' => 'required',
        ]);

        //save
        $ticket = new SupportTicket;
        $ticket->school_detail_id = $school->id;
        $ticket->tickettype = $request->department;
        $ticket->subject = $request->subject;
        $ticket->body = $request->supportbody;
        $ticket->msg_hash = Hash::make($school->id."-school-ticket");
        $ticket->save();

        //send email to the user
        try {
            $data = array(
                'school' => strtoupper($school->schoolname),
                'subject' => $request->subject,
                'department' => $request->department,
                'bodymessage' => $request->supportbody,
            );

            Mail::send('emails.support', $data, function($message) use ($data) {
                // support email
                $support_email = env('SUPPORT_EMAIL');

                $message->from(auth()->user()->email);
                $message->to( $support_email );
                $message->subject($data['subject']);

            });
        } catch (\Throwable $th) {
            return back()->with('success', 'We will respond to your request within the hour');
        }


        return back()->with('success', 'We will respond to your request within the hour');
    }

    // show ticket and replies
    public function show($msgHash)
    {
        //get school and the support ticket relation
        $id = auth()->user()->id;
        $school = $this->getSchoolInUsed($id);

        if($school) {
            // get schools tied to the account & banks list
            $schools = $this->getSchoolsForTheAccount($id);
            $banknames = $this->getListOfBanks();

            //get the viewed ticket
            $ticket = SupportTicket::where('msg_hash', $msgHash)->first();

            // return $ticket->supportreplies;

            if ($ticket) {
                //return
                return view('school.support-replies')->with(['ticket' => $ticket, 'schools' => $schools, 'banknames' => $banknames]);
            } else {
                return redirect(route('school.support.ticket'));
            }

        } else {
            return redirect(route('school.dashboard'));
        }
    }

    public function supportReplyPost(Request $request, $ticket_id)
    {
        $reply = new SupportReply;
        $reply->support_ticket_id = $ticket_id;
        $reply->body = $request->reply_body;
        $reply->reply_type = 'user';
        $reply->save();

        return redirect(route('school.ticket.show', $request->msg_hash));
    }
}
