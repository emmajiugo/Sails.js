<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Invoice;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = auth()->user()->id;

        //unpaid invoice count
        $unpaidInvoices = Invoice::where(['user_id' => $userId, 'status' => 'UNPAID'])
                                    ->orderBy('created_at', 'desc')
                                    ->limit(2)
                                    ->get(['studentname', 'invoice_reference', 'amount']);

        //invoice latest transaction limit 5
        $latestInvoices = Invoice::where(['user_id' => $userId, 'status' => 'PAID'])
                                    ->orderBy('updated_at', 'desc')
                                    ->limit(3)
                                    ->get(['studentname', 'invoice_reference', 'amount']);

        return view('user.index')->with(['unpaidInvoices' => $unpaidInvoices, 'latestInvoices' => $latestInvoices]);
    }
}
