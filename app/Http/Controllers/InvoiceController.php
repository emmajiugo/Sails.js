<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Invoice;
use App\SchoolDetail;
use App\Feesbreakdown;

class InvoiceController extends Controller
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
        $invoices = Invoice::where('user_id', auth()->user()->id)->get();

        return view('user.transaction')->with('invoices', $invoices);
    }


    //open invoice to view full details
    public function getInvoice($reference)
    {
        //get the invoice details
        $invoicedetails = Invoice::where([
            'invoice_reference'=> $reference,
            'user_id'=> auth()->user()->id]
        )->first();

        if ($invoicedetails) {
            //get school details also
            $school = SchoolDetail::find($invoicedetails->school_detail_id);
            //get the breakdown for the fee setup
            $feesbreakdown = Feesbreakdown::where('feesetup_id', $invoicedetails->feesetup_id)->get();
            //get the sum of all feesbrakdown
            $feesum = $feesbreakdown->sum('amount');

            //redirect to the invoice page
            return view('user.invoice')->with(['invoice' => $invoicedetails, 'feesbreakdown' => $feesbreakdown, 'school' => $school, 'feesum' => $feesum, 'transaction_fee'=>300]);
        } else {
            //redirect to the invoice page
            return redirect(route('user.invoice'))->with('error', 'Invoice reference not found for this user!');
        }

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
