<?php
namespace App\Traits;

use Illuminate\Support\Facades\Log;

use App\Traits\PaymentGateway;

use App\SchoolDetail;
use App\Feesbreakdown;
use App\Invoice;
use App\Jobs\UpdateInvoiceWebhook;
use App\Jobs\UpdateTransferWebhook;
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
        $trxId = "";
        do {
            //generate 8 different random numbers and concat them
            for ($i = 0; $i < 8; $i++) {
                $trxId .= mt_rand(1, 9);
            }
        } while (!empty(Invoice::where('invoice_reference', $trxId)->first()));

        return $trxId;
    }

    //generate transaction id
    public function schoolNumber()
    {
        $schoolNumber = "";
        do {
            //generate 8 different random numbers and concat them
            for ($i = 0; $i < 8; $i++) {
                $schoolNumber .= mt_rand(1, 9);
            }
        } while (!empty(SchoolDetail::where('school_number', $schoolNumber)->first()));

        return $schoolNumber;
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

        // Log::info($txRef);
        //verify the transaction using transaction ref passed
        $res = $this->flutterwaveVerifyTransaction($transactionId);
        // $status = $res['data']['status'];

        if ($res['data']['status'] === 'successful'){

            UpdateInvoiceWebhook::dispatch($txRef, $res);

        } else {
            return false;
        }
    }

    // update transfer
    public function updateTransfer($reference, $status, $message) {

        // dispatch job
        UpdateTransferWebhook::dispatch($reference, $status, $message);

    }

}
