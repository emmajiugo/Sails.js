<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Traits\SchoolBase;
use App\Traits\PaymentGateway;

use App\WithdrawalHistory;

class WalletController extends Controller
{
    use SchoolBase; use PaymentGateway;

    public function __construct()
    {
        $this->middleware('auth:school');
    }

    public function history()
    {
        $id = auth()->user()->id;
        $school = $this->getSchoolInUsed($id);

        if($school) {
            // get schools tied to the account & banks list
            $schools = $this->getSchoolsForTheAccount($id);
            $banknames = $this->getListOfBanks();

            $history = $school->withdrawalhistory->sortByDesc('created_at')->values()->all();

            //get school wallet
            $totalAmount = $school->wallet->total_amount;

            return view('school.withdraw-history')->with(['school' => $school, 'history' => $history, 'wallet' => $totalAmount, 'schools' => $schools, 'banknames' => $banknames]);

        } else {
            return redirect(route('school.dashboard'));
        }
    }

    public function withdraw(Request $request)
    {
        $id = auth()->user()->id;
        $school = $this->getSchoolInUsed($id);
        // return $school;

        $wallet = $school->wallet;
        $fee = \App\WebSettings::find(1)->withdrawal_fee;
        $totalWithdrawal = $request->amount + $fee;

        if ($totalWithdrawal > $wallet->total_amount)
            return back()->with('error', 'Not a enough balance in your Available Funds');

        // generate reference
        $reference = $this->transferReference();

        // save withdrawal in History
        $history = new WithdrawalHistory;
        $history->school_detail_id = $school->id;
        $history->reference = $reference;
        $history->balance_before = $wallet->total_amount;
        $history->currency = "NGN";
        $history->amount = $totalWithdrawal;
        $history->account_number = $school->corporate_acctno;
        $history->fullname = $school->corporate_acctname;
        $history->bank_code = $school->bankname;
        $history->save();


        // deplete funds from wallet and add to history
        $wallet->total_amount -= $totalWithdrawal;

        if ($wallet->save()) {

            $payload = [
                "account_bank" => $school->bankname,
                "account_number" => $school->corporate_acctno,
                "amount" => $totalWithdrawal,
                "narration" => "Payout to ". $school->schoolname,
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
                $withdrawRecord->balance_after = $wallet->total_amount;
                $withdrawRecord->fee = "00";
                $withdrawRecord->bank_name = "FAILED";
                $withdrawRecord->status = "FAILED";
                $withdrawRecord->message = $response['message'];
                $withdrawRecord->save();

                return back()->with('error', 'Transfer error, please try again.');
            }

            // update withdrawal history record
            $withdrawRecord->gateway_id = $response['data']['id'];
            $withdrawRecord->balance_after = $wallet->total_amount;
            $withdrawRecord->fee = $response['data']['fee'];
            $withdrawRecord->bank_name = $response['data']['bank_name'];
            $withdrawRecord->save();

            return redirect(route('withdraw.history'))->with('success', 'Withdrawal is being processed.');

        }
    }
}
