<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\School;
use App\Invoice;

class SchoolController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get school_id & school
        $schoolid = auth()->user()->id;
        $school = School::find($schoolid);

        //get the verification status
        $verifyStatus = $school->verifystatus;

        //get bank detail
        $bankdetail = $school->bankdetail;

        //get list of banks from API
        $banknames = $this->getBanks();

        //get total amount remitted for the school
        $totalAmount = Invoice::where([
            ['school_id', '=', $schoolid],
            ['status', '=', 'PAID'],
        ])->sum('amount');

        //get the latest payments for the school
        $invoices = Invoice::where([
            ['school_id', '=', $schoolid],
            ['status', '=', 'PAID'],
        ])->orderBy('updated_at', 'DESC')->take(8)->get();

        return view('school.index')->with(['payments' => $invoices, 'bank' => $bankdetail, 'amount' => $totalAmount, 'banknames' => $banknames, 'verify_status' => $verifyStatus]);
    }

    //get banks
    public function getBanks()
    {
        //curl verification
        $result = array();
        //url to pull banks
        $url = 'https://api.paystack.co/bank';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt(
        $ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer sk_test_f6eb701b8147f37248dbd8c0a5e467ab66a551c0']
        );
        $request = curl_exec($ch);
        curl_close($ch);

        if ($request) {
            $result = json_decode($request, true);
            if($result['data']){
                //something came in
                return $result['data'];
            }
        }
    }
}
