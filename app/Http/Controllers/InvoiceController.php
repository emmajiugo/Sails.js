<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\PaymentGateway;

use App\Invoice;
use App\SchoolDetail;
use App\Feesbreakdown;

class InvoiceController extends Controller
{
    use PaymentGateway;

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

    //direct user to payment checkout form
    public function invoicePayment(Request $request)
    {
        $this->validate($request, [
            "grand_total" => "required",
            "invoice_reference" => "required",
            "school" => "required",
            "user_name" => "required",
            "user_phone" => "required"
        ]);

        $email = auth()->user()->email;

        //send to payment gateway to charge
        $paymentLink = $this->flutterwaveCheckoutForm($request, $email);

        return redirect($paymentLink['data']['link']);
    }

    /**
     * Verify payment and give value
     *
     * @return status
     */
    public function invoiceStatus(Request $request)
    {
        $txref = $request->txref;
        $flwref = $request->flwref;

        //verify the transaction using transaction ref passed
        $status = $this->flutterwaveVerifyTransaction($txref);
        return $status;

        if($status['data']['status'] == 'successful' && $status['data']['chargecode'] == '00'){
            // the transaction was successful, you can deliver value
            //update
            $invoice = Invoice::where('invoice_reference', $txref)->first();
            $invoice->status = 'PAID';
            $invoice->payment_reference = $flwref;
            $invoice->save();

            //return to invoice page
            echo $invoiceid;

        }else{
            //Invalid request, return with an error
        }

    }

}
