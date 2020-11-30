<?php

namespace App\Listeners;

use App\WithdrawalHistory;
use App\Traits\PaymentGateway;
use App\Events\WithdrawalRequestEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class WithdrawalRequestListener implements ShouldQueue
{
    use PaymentGateway;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 5;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 30;

    /**
     * Handle the event.
     *
     * @param  WithdrawalRequestEvent  $event
     * @return void
     */
    public function handle($event)
    {
        // init
        $school = $event->school;
        $wallet = $event->wallet;
        $reference = $event->reference;
        $amount = $event->amount;
        $totalWithdrawal = $event->totalWithdrawal;
        $balanceBefore = $event->balanceBefore;

        // deplete funds from wallet and add to history
        $wallet->total_amount -= $totalWithdrawal;

        if ($wallet->save()) {

            // send request to gateway
            $payload = [
                "account_bank" => $school->bankcode,
                "account_number" => $school->corporate_acctno,
                "amount" => $amount,
                "narration" => "Payout to " . $school->schoolname,
                "currency" => "NGN",
                "reference" => $reference,
                "callback_url" => "",
                "debit_currency" => "NGN"
            ];

            $response = $this->flutterwaveTransfer($payload);

            // get record from db
            $withdrawRecord = WithdrawalHistory::where('reference', $reference)->first();

            if ($response['status'] === 'error') {
                //refund user
                $wallet->total_amount += $totalWithdrawal;
                $wallet->save();

                // update record
                $withdrawRecord->gateway_id = "000000";
                $withdrawRecord->balance_after = $balanceBefore;
                $withdrawRecord->fee = "00";
                $withdrawRecord->bank_name = "FAILED";
                $withdrawRecord->status = "FAILED";
                $withdrawRecord->message = $response['message'];
                $withdrawRecord->save();

            } else {

                // update withdrawal history record
                $withdrawRecord->gateway_id = $response['data']['id'];
                $withdrawRecord->balance_after = ($balanceBefore - $totalWithdrawal);
                $withdrawRecord->fee = $response['data']['fee'];
                $withdrawRecord->bank_name = $response['data']['bank_name'];
                $withdrawRecord->save();

            }
        }
    }
}
