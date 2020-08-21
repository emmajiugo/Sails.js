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

    private $transactionFee;
    private $userId;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            $this->userId = auth()->user()->id;
            $this->transactionFee = \App\WebSettings::find(1)->transaction_fee;

            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::where('user_id', $this->userId)->orderBy("created_at", "desc")->paginate(10);

        return view('user.transaction')->with('invoices', $invoices);
    }


    //open invoice to view full details
    public function getInvoice(Request $request, $reference)
    {
        //$reference = $request->tx_ref ?? $reference;

        //get the invoice details
        $invoiceDetails = Invoice::where([
            'invoice_reference'=> $reference,
            'user_id'=> $this->userId]
        )->first();

        if ($invoiceDetails) {
            //get school details also
            $school = SchoolDetail::find($invoiceDetails->school_detail_id);
            //get the breakdown for the fee setup
            $feesbreakdown = Feesbreakdown::where('feesetup_id', $invoiceDetails->feesetup_id)->get();
            //get the sum of all fees breakdown
            $feesum = $feesbreakdown->sum('amount');

            //redirect to the invoice page
            return view('user.invoice')->with(['invoice' => $invoiceDetails, 'feesbreakdown' => $feesbreakdown, 'school' => $school, 'feesum' => $feesum, 'transaction_fee'=> $this->transactionFee]);

        } else {
            //redirect to the invoice page
            return redirect(route('user.invoice'))->with('error', 'Invoice reference not found for this user!');
        }

    }

    //direct user to payment checkout form
    public function invoicePayment(Request $request)
    {
        if ($request->type === 'single') {
            $this->validate($request, [
                "type" => "required",
                "invoice_id" => "required"
            ]);

            $invoice = Invoice::findOrFail($request->invoice_id);
            $grandTotal = ($invoice->amount + $this->transactionFee);
            $reference = $invoice->invoice_reference;

        } else {
            $this->validate($request, [
                "type" => "required",
            ]);

            $invoices = Invoice::where('user_id', $this->userId)->where('status', 'UNPAID')->get(['amount', 'invoice_reference']);
            $grandTotal = ($invoices->sum('amount') + (count($invoices) * $this->transactionFee));
            $reference = $invoices->implode('invoice_reference', '_');
        }

        $payload = [
            'type'      =>  $request->type,
            'reference' =>  $reference,
            'amount'    =>  $grandTotal,
            'email'     =>  auth()->user()->email,
            'user_phone'=>  auth()->user()->phone,
            'user_name' =>  auth()->user()->fullname
        ];

        //send to payment gateway to charge
        $paymentLink = $this->flutterwaveCheckoutForm($payload);
        // return $paymentLink;

        if ($paymentLink['status'] === 'success') {
            return redirect($paymentLink['data']['link']);
        } else {
            return \redirect(route("user.invoice"))->with("error", $paymentLink['message']);
        }
    }

    /**
     * Verify payment and give value
     *
     * @return status
     */
    public function invoiceStatus(Request $request)
    {
        #http://127.0.0.1:8001/home/callback?status=successful&tx_ref=54257367&transaction_id=1480705

        if ($request->status == "cancelled") return redirect(route('user.invoice'));

        $txRef = $request->tx_ref;
        $transactionId = $request->transaction_id;

        $status = $this->updateInvoice($txRef, $transactionId);
        // return $status;

        if ($status) {
            //return to invoice page
            return \redirect(route("user.invoice"))->with("success", "Payment successful.");

        } else {
            //Payment failure, return with an error
            return \redirect(route("user.invoice"))->with("error", "Payment failed. \nIf you were debited, please reach out to us with the Invoice ID and we'll sort it out immediately.");
        }

    }

}
