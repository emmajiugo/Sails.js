<?php
namespace App\Traits;

use Illuminate\Support\Facades\Log;

use App\Traits\PaymentGateway;

use App\SchoolDetail;
use App\Feesbreakdown;
use App\Invoice;
use App\WithdrawalHistory;
use App\Wallet;

/**
 * Methods that are used across all controllers are put here
 */
trait SchoolBase
{
    use PaymentGateway;

    /**
     * @param id  school account id
     * @return response
     */
    public function getSchoolInUsed($id)
    {
        $response = SchoolDetail::where([
            ['school_id', '=', $id],
            ['is_used', '=', 1],
        ])->first();

        return $response;
    }

    /**
     * @return schools registered under the account id $id
     */
    public function getSchoolsForTheAccount($id)
    {
        $response = SchoolDetail::where('school_id', $id)->get();
        return $response;
    }

    /**
     * @param
     */
    public function insertFeeBreakdownTrait($feesetupid, $descriptiontitle, $amountvalue)
    {
        //insert
        $feebreakdown = new Feesbreakdown;
        $feebreakdown->feesetup_id = $feesetupid;
        $feebreakdown->description = $descriptiontitle;
        $feebreakdown->amount = $amountvalue;
        $feebreakdown->save();
    }

    //generate transaction id
    public function generateTrxId()
    {
        $trxId = "";
        do {
            //generate 8 different random numbers and concat them
            for ($i = 0; $i < 8; $i++) {
                $trxId .= mt_rand(1, 9);
            }
        } while (!empty(Invoice::where('invoice_reference', $trxId)->first()));

        return $trxId;
    }

    //generate transfer reference
    public function transferReference()
    {
        $reference = "";
        do {
            //generate 8 different random numbers and concat them
            for ($i = 0; $i < 8; $i++) {
                $reference .= mt_rand(1, 9);
            }
        } while (!empty(WithdrawalHistory::where('reference', $reference)->first()));

        return $reference;
    }

    //update invoice transaction
    public function updateInvoice($txRef, $transactionId)
    {
        $transactionFee = \App\WebSettings::find(1)->transaction_fee;

        // Log::info($txRef);
        //verify the transaction using transaction ref passed
        $status = $this->flutterwaveVerifyTransaction($transactionId);

        if($status['data']['status'] === 'successful'){
            //explode the reference passed to be able to handle multiple payments
            $refs = explode("_", $txRef);

            //update
            foreach($refs as $ref) {
                $invoice = Invoice::where('invoice_reference', $ref)->first();
                $invoice->status = 'PAID';
                $invoice->payment_reference = $status['data']['flw_ref'];
                $invoice->payment_id = $status['data']['id'];
                $invoice->fee = $status['data']['app_fee'];
                $invoice->skooleo_fee = $transactionFee;
                $invoice->save();

                if ($invoice->settled === 0) {
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
        } else {
            return false;
        }
    }

    // update transfer
    public function updateTransfer($reference, $status, $message) {

        $history = WithdrawalHistory::where('reference', $reference)->first();

        // refund user if transfer fails/ update balance_after
        if ($status === "FAILED" && $history->status !== "FAILED") {
            $wallet = Wallet::where('school_detail_id', $history->school_detail_id)->first();

            $fee = $history->skooleo_fee;
            $amount = $history->amount;
            $totalWithdrawn = $fee + $amount;

            // refund
            $wallet->total_amount += $totalWithdrawn;
            $wallet->save();

            // update balance_after
            $history->balance_after = $wallet->total_amount;

        }

        // update record
        $history->status = $status;
        $history->message = $message;
        $history->save();

    }

}
