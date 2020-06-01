<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\PaymentGateway;
use App\Traits\SchoolBase;

use App\Invoice;
use App\SchoolDetail;
use App\Feesbreakdown;

class InvoiceController extends Controller
{
    use PaymentGateway; use SchoolBase;

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
        $invoices = Invoice::where('user_id', auth()->user()->id)->orderBy("created_at", "desc")->paginate(10);

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
            "type" => "required",
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

        if ($this->updateInvoice($txref, $flwref)) {
            //return to invoice page
            return \redirect(route("user.invoice"))->with("success", "Payment successful.");

        } else {
            //Payment failure, return with an error
            return \redirect(route("user.invoice"))->with("error", "Payment failed. \nIf you were debited, please reach out to us with the Invoice ID and we will sort out immediately.");
        }

    }

}
