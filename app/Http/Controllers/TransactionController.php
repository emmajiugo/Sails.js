<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\School;
use App\Invoice;

class TransactionController extends Controller
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
     * Show the transaction history.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get user_id & user
        $schoolid = auth()->user()->id;
        //$user = User::find($userid);

        //get the latest payments for the user
        $invoices = Invoice::where([
            ['school_id', '=', $schoolid],
            ['status', '=', 'PAID'],
        ])->orderBy('updated_at', 'DESC')->get();

        return view('school.history')->with(['invoices' => $invoices]);
    }
}
