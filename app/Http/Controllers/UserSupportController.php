<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

use App\SupportTicket;
use App\SupportReply;

class UserSupportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get user id
        $id = auth()->user()->id;

        //get support ticket
        $tickets = SupportTicket::where('user_id', $id)->orderBy('created_at', 'DESC')->paginate(10);

        //return contact view
        return view('user.support')->with(['tickets' => $tickets]);
    }

    // save tickets submitted
    public function store(Request $request)
    {
        // get user id
        $id = auth()->user()->id;

        //validate data
        $this->validate($request, [
            'subject' => 'required',
            'department' => 'required',
            'supportbody' => 'required',
        ]);

        //save
        $ticket = new SupportTicket;
        $ticket->user_id = $id;
        $ticket->tickettype = $request->department;
        $ticket->subject = $request->subject;
        $ticket->body = $request->supportbody;
        $ticket->msg_hash = Hash::make($id."-user-ticket");
        $ticket->save();

        //send email to the user
        try {
            $data = array(
                'user' => strtoupper(auth()->user()->fullname),
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
        //get user id
        $id = auth()->user()->id;

        //get the viewed ticket
        $ticket = SupportTicket::where('msg_hash', $msgHash)->first();

        if ($ticket) {
            //return
            return view('user.support-replies')->with(['ticket' => $ticket]);
        }
    }

    public function supportReplyPost(Request $request, $ticket_id)
    {
        $reply = new SupportReply;
        $reply->support_ticket_id = $ticket_id;
        $reply->body = $request->reply_body;
        $reply->reply_type = 'user';
        $reply->save();

        return redirect(route('user.ticket.show', $request->msg_hash));
    }
}
