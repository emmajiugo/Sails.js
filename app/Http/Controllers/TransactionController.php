<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Traits\SchoolBase;
use App\Traits\PaymentGateway;

use App\School;
use App\Invoice;

class TransactionController extends Controller
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
     * Show the transaction history.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get user_id & user
        $id = auth()->user()->id;
        $school = $this->getSchoolInUsed($id);

        if($school) {
            // get schools tied to the account & banks list
            $schools = $this->getSchoolsForTheAccount($id);
            $banknames = $this->getListOfBanks();

            //get the latest payments for the user
            $invoices = Invoice::where([
                ['school_detail_id', '=', $school->id],
                ['status', '=', 'PAID'],
            ])->orderBy('updated_at', 'DESC')->get();

            return view('school.history')->with(['school' => $school, 'invoices' => $invoices, 'schools' => $schools, 'banknames' => $banknames]);
        } else {
            return redirect(route('school.dashboard'));
        }


    }
}
