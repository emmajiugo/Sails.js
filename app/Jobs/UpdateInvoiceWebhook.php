<?php

namespace App\Jobs;

use App\Wallet;
use App\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateInvoiceWebhook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5;
    public $timeout = 30;

    private $txRef;
    private $res;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($txRef, $res)
    {
        $this->txRef = $txRef;
        $this->res = $res;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $transactionFee = \App\WebSettings::find(1)->transaction_fee;

        //explode the reference passed to be able to handle multiple payments
        $refs = explode("_", $this->txRef);

        //update
        foreach ($refs as $ref) {
            $invoice = Invoice::where('invoice_reference', $ref)->first();
            $invoice->status = 'PAID';
            $invoice->payment_reference = $this->res['data']['flw_ref'];
            $invoice->payment_id = $this->res['data']['id'];
            $invoice->fee = $this->res['data']['app_fee'];
            $invoice->skooleo_fee = $transactionFee;
            $invoice->save();

            if ($invoice->settled == 0) {
                // update wallet and settled to true
                $wallet = Wallet::where('school_detail_id', $invoice->school_detail_id)->first();
                $wallet->total_amount += $invoice->amount;
                $wallet->save();

                // mark transaction as settled
                $invoice->settled = true;
                $invoice->save();
            }
        }

        return true;
    }
}
