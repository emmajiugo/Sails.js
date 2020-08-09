<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Traits\SchoolBase;
use App\Traits\PaymentGateway;

use App\School;
use App\SchoolDetail;
use App\Invoice;

class SchoolController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //define arrays
        $invoices = []; $totalAmount = []; $bankNames = []; $verifyStatus = []; $schools = [];

        $id = auth()->user()->id;
        $school = $this->getSchoolInUsed($id);

        //get list of banks from API
        $bankNames = $this->getListOfBanks();

        // get all school details if there is one
        if ($school) {

            // return schools tied to this account
            $schools = $this->getSchoolsForTheAccount($id);

            //get the verification status
            $verifyStatus = $school->verifystatus;

            //get school wallet
            $totalAmount = $school->wallet->total_amount;

            //get the latest payments for the school
            $invoices = Invoice::where([
                ['school_detail_id', '=', $school->id],
                ['status', '=', 'PAID'],
            ])->orderBy('updated_at', 'DESC')->take(8)->get(["invoice_reference", "studentname", "class"]);
        }

        return view('school.index')->with(['schools' => $schools, 'payments' => $invoices, 'wallet' => $totalAmount, 'banknames' => $bankNames, 'verify_status' => $verifyStatus]);
    }
}
