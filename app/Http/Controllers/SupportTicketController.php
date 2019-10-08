<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\SupportTicket;
use App\SupportReply;

class SupportTicketController extends Controller
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

    //index finction
    public function index()
    {
        //gwet user and the support ticket relation
        $schoolid = auth()->user()->id;
        // $user = User::find($userid);

        //get support ticket
        // $tickets = $user->supportticket->paginate(1);
        $tickets = SupportTicket::where('school_id', $schoolid)->orderBy('created_at', 'DESC')->paginate(10);

        return view('school.support-ticket')->with(['tickets' => $tickets]);
    }

    //store the ticket in db
    public function store(Request $request)
    {
        // get the user
        $schoolid = auth()->user()->id;

        //validate data
        $this->validate($request, [
            'subject' => 'required',
            'department' => 'required',
            'supportbody' => 'required',
        ]);

        //save
        $ticket = new SupportTicket;
        $ticket->school_id = $schoolid;
        $ticket->tickettype = $request->department;
        $ticket->subject = $request->subject;
        $ticket->body = $request->supportbody;
        $ticket->save();

        return back()->with('success', 'We will respond to your request within the hour');
    }
}
