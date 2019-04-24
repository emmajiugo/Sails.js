<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Session;
use App\Feesetup;
use App\Feesbreakdown;
use App\Invoice;

class IndexSearchController extends Controller
{
    //ajax search method
    public function ajaxSearch(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = User::where([
                ['schoolname', 'LIKE', '%'.$query.'%'], 
                ['verifystatus', '=', 1]
            ])->get();

            $output = '<ul id="list" style="display:block; position:relative; padding: 5px 10px 5px 10px">';
            foreach($data as $row) {
                $output .= '<li ><a href="#">'.$row->schoolname.'</a><hr>';
            }
            $output .= '</ul>';

            echo $output;
        }
    }

    //posting search to get school
    public function postSearch(Request $request)
    {
        //get sessions
        $sessiondetails = Session::all();

        //get the school searched
        $user = User::where('schoolname', 'LIKE', '%'.$request->schoolname.'%')->get();
        
        return redirect('/search/school')->with(['schools' => $user, 'sessiondetails' => $sessiondetails]);
    }

    //post school to fill in details for invoice
    public function postSchool(Request $request)
    {
        // return $request->all();
        //get setup for the option chosen
        $feesetup = Feesetup::where([
            'user_id' => $request->userid,
            'section' => $request->section,
            'session' => $request->session,
            'term' => $request->term,
            'class' => $request->class,
        ])->first();
        
        //check with the record in db
        if (count($feesetup) > 0) {
            //feesetup id
            $feesetupid = $feesetup->id;

            //get the sum of the feesbreakdown for the particular setup
            $feesum = $feesetup->feesbreakdown->sum('amount');

            return redirect('/search/school-continue')->with(['data' => $request->all(), 'feesum' => $feesum, 'feesetupid' => $feesetupid]);
        } else {
            //get user
            $user = User::where('id', $request->userid)->get();
            //get session
            $sessiondetails = Session::all();

            return redirect('/search/school')->with(['schools' => $user, 'sessiondetails' => $sessiondetails, 'no_record' => 'No record found for the search index. Contact the school to setup the fee structure for the search index.']);
        }

    }

    //post to generate invoice for payment
    public function postForInvoice(Request $request)
    {
        $this->validate($request, [
            'studentname' => 'required',
            'payername' => 'required',
            'payeremail' => 'required|email',
            'payerphone' => 'required',
        ]);

        //insert into invoice tbl
        $invoice = new Invoice;
        $invoice->trx_id = $this->generateTrxId();
        $invoice->user_id = $request->userid;
        $invoice->feesetup_id = $request->feesetupid;
        $invoice->section = $request->section;
        $invoice->class = $request->studentclass;
        $invoice->session = $request->session;
        $invoice->term = $request->term;
        $invoice->studentname = $request->studentname;
        $invoice->payername = $request->payername;
        $invoice->payeremail = $request->payeremail;
        $invoice->payerphone = $request->payerphone;
        $invoice->amount = $request->amount;
        $invoice->save();

        //get the invoice id submitted
        $invoiceid = $invoice->id;
        //get the invoice details
        $invoicedetails = Invoice::find($invoiceid);
        //get school details also
        $school = User::find($invoicedetails->user_id);
        //get the breakdown for the fee setup
        $feesbreakdown = Feesbreakdown::where('feesetup_id', $invoicedetails->feesetup_id)->get();
        //get the sum of all feesbrakdown
        $feesum = $feesbreakdown->sum('amount');

        //redirect to the invoice page
        return redirect('/school/invoice')->with(['invoice' => $invoicedetails, 'feesbreakdown' => $feesbreakdown, 'school' => $school, 'feesum' => $feesum]);

    }

    //get unpaid invoice
    public function postIndexInvoice(Request $request)
    {
        $this->validate($request, [
            'invoiceno' => 'required',
        ]);

        //invoice id
        $invoiceid = $request->invoiceno;
        //get the invoice details
        $invoicedetails = Invoice::where('trx_id', $invoiceid)->first();

        if (count($invoicedetails) > 0) {
            //get school details also
            $school = User::find($invoicedetails->user_id);
            //get the breakdown for the fee setup
            $feesbreakdown = Feesbreakdown::where('feesetup_id', $invoicedetails->feesetup_id)->get();
            //get the sum of all feesbrakdown
            $feesum = $feesbreakdown->sum('amount');

            //redirect to the invoice page
            return redirect('/school/invoice')->with(['invoice' => $invoicedetails, 'feesbreakdown' => $feesbreakdown, 'school' => $school, 'feesum' => $feesum]);
        } else {
            //redirect to the invoice page
            return redirect('/')->with('error', 'Invoice number did not match!');
        }

    }

    //generate transaction id
    public function generateTrxId()
    {
        $trxid = "";
        
        do {
            //generate 6 different random numbers and concat them
            for ($i=0; $i < 6; $i++) { 
                $trxid .= mt_rand(0, 9);
            }
        } while (!empty(Invoice::where('trx_id', $trxid)->first()));

        return $trxid;
    }

    //change the unpaid to paid
    public function paidInvoice(Request $request)
    {
        // echo json_encode($request->all());

        $invoiceid = $request->invoiceid;
        $trxref = $request->trxref;

        //verify the transaction using transaction ref passed
        $status = $this->verifyTransaction($trxref);

        if($status['status'] == 'success'){
            // the transaction was successful, you can deliver value
            //update
            $invoice = Invoice::where('trx_id', $invoiceid)->first();
            $invoice->status = 'PAID';
            $invoice->trxref = $trxref;
            $invoice->save();
            
            //return the invoice id
            echo $invoiceid;

            /* 
            @ also remember that if this was a card transaction, you can store the 
            @ card authorization to enable you charge the customer subsequently. 
            @ The card authorization is in: 
            @ $result['data']['authorization']['authorization_code'];
            @ PS: Store the authorization with this email address used for this transaction. 
            @ The authorization will only work with this particular email.
            @ If the user changes his email on your system, it will be unusable
            */

        }else{
            // the transaction was not successful, do not deliver value'
            // print_r($result);  //uncomment this line to inspect the result, to check why it failed.
            // echo "Transaction was not successful: Last gateway response was: ".$result['data']['gateway_response'];
            echo 400; //Invalid request
        }
        
    }

    //get successful payment page
    public function successPayment($trxid)
    {
        return view('pages.payment.success')->with('trxid', $trxid);
    }

    //verify the transaction via cURL
    public function verifyTransaction($trxref)
    {
        //curl verification
        $result = array();
        //The parameter after verify/ is the transaction reference to be verified
        $url = 'https://api.paystack.co/transaction/verify/'.$trxref;

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
            // print_r($result);
            if($result){
                if($result['data']){
                    //something came in
                    return $result['data'];
                }else{
                    return $result['message'];
                }

            }else{
                //print_r($result);
                die("Something went wrong while trying to convert the request variable to json. Uncomment the print_r command to see what is in the result variable.");
                
            }
        }else{
            //var_dump($request);
            die("Something went wrong while executing curl. Uncomment the var_dump line above this line to see what the issue is. Please check your CURL command to make sure everything is ok");
            
        }

    }
}
