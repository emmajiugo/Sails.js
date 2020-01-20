<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\SchoolBase;

use App\SchoolDetail;
use App\Session;
use App\Feesetup;
use App\Feesbreakdown;
use App\Invoice;

class UserSearchController extends Controller
{
    use SchoolBase;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //ajax search method
    public function ajaxSearch(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = SchoolDetail::where([
                ['schoolname', 'LIKE', '%'.$query.'%'],
                ['verifystatus', '=', 1]
            ])->take(5)->get();

            // $output = '<ul id="list" style="display:block; position:relative; padding: 5px 10px 5px 10px">';
            $output = '';
            foreach($data as $row) {
                // $output .= '<li ><a href="#">'.$row->schoolname.'</a><hr>';
                $output .= '<option value="'.$row->schoolname.'">';
            }
            // $output .= '</ul>';

            echo $output;
        }
    }

    //posting search to get school
    public function postSearch(Request $request)
    {
        // check for empty search
        if ($request->schoolname == '') {
            // return "Working Fine";
            return back()->with('error', 'Field is empty.');
        }

        //get sessions
        $sessiondetails = Session::all();

        //get the school searched
        $school = SchoolDetail::where('schoolname', 'LIKE', '%'.$request->schoolname.'%')->get();

        return view('user.school')->with(['schools' => $school, 'sessiondetails' => $sessiondetails]);
    }

    //post school to fill in details for invoice
    public function postSchool(Request $request)
    {

        //get setup for the option chosen
        $feesetup = Feesetup::where([
            'school_detail_id' => $request->schoolid,
            'section' => $request->section,
            'session' => $request->session,
            'term' => $request->term,
            'class' => $request->class,
        ])->first();

        //check with the record in db
        if ($feesetup) {
            // get the school
            $school = SchoolDetail::findOrFail($request->schoolid);

            //feesetup id
            $feesetupid = $feesetup->id;

            //get the sum of the feesbreakdown for the particular setup
            $feesum = $feesetup->feesbreakdown->sum('amount');

            return view('user.data-collect')->with(['data' => $request->all(), 'feesum' => $feesum, 'feesetupid' => $feesetupid, 'school'=>$school]);
        } else {
            //get user
            $user = School::where('id', $request->userid)->get();
            //get session
            $sessiondetails = Session::all();

            return redirect(route('user.search.school'))->with(['schools' => $user, 'sessiondetails' => $sessiondetails, 'no_record' => 'No record found for the search index. Contact the school to setup the fee structure for the search index.']);
        }

    }

    //post to generate invoice for payment
    public function postForInvoice(Request $request)
    {
        $this->validate($request, [
            'studentname' => 'required|string'
        ]);

        //insert into invoice tbl
        $invoice = new Invoice;
        $invoice->invoice_reference = $this->generateTrxId();
        $invoice->school_detail_id = $request->schoolid;
        $invoice->feesetup_id = $request->feesetupid;
        $invoice->section = $request->section;
        $invoice->class = $request->studentclass;
        $invoice->session = $request->session;
        $invoice->term = $request->term;
        $invoice->studentname = $request->studentname;
        $invoice->user_id = auth()->user()->id;
        $invoice->payername = auth()->user()->fullname;
        $invoice->payeremail = auth()->user()->email;
        $invoice->payerphone = auth()->user()->phone;
        $invoice->amount = $request->amount;
        $invoice->save();

        return redirect(route('user.invoice'));

    }
}
