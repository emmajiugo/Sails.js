<?php
namespace App\Traits;

use App\SchoolDetail;
use App\Feesbreakdown;
use App\Invoice;

/**
 * Methods that are used across all controllers are put here
 */
trait SchoolBase
{

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
            //generate 10 different random numbers and concat them
            for ($i=0; $i < 10; $i++) {
                $trxid .= mt_rand(0, 9);
            }
        } while (!empty(Invoice::where('invoice_reference', $trxid)->first()));

        return $trxid;
    }

}
