<?php
namespace App\Traits;

use Illuminate\Support\Facades\Log;

use App\Traits\PaymentGateway;
use App\SchoolDetail;
use App\Feesbreakdown;
use App\Invoice;
use App\WithdrawalHistory;

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
        $trxid = "";
        do {
            //generate 8 different random numbers and concat them
            for ($i = 0; $i < 8; $i++) {
                $trxid .= mt_rand(1, 9);
            }
        } while (!empty(Invoice::where('invoice_reference', $trxid)->first()));

        return $trxid;
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
    public function updateInvoice($txref, $flwref)
    {
        // Log::info($txref .' '. $flwref);
        //verify the transaction using transaction ref passed
        $status = $this->flutterwaveVerifyTransaction($txref);
        // return $status;

        if($status['data']['status'] == 'successful' && $status['data']['chargecode'] == '00'){
            // the transaction was successful, you can deliver value
            //explode the reference passed to be able to handle multiple payments
            $refs = explode("_", $txref);

            //update
            foreach($refs as $ref) {
                $invoice = Invoice::where('invoice_reference', $ref)->first();
                $invoice->status = 'PAID';
                $invoice->payment_reference = $flwref;
                $invoice->save();
            }

            return true;
        } else {
            return false;
        }
    }

    // update transfer
    public function updateTransfer($response) {

        $history = WithdrawalHistory::where('reference', $response->reference)->first();
        $history->status = $response->status;
        $history->message = $response->complete_message;
        $history->save();
    }

}
