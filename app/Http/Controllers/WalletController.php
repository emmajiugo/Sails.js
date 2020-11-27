<?php

namespace App\Http\Controllers;

use App\Traits\SchoolBase;
use App\WithdrawalHistory;

use Illuminate\Http\Request;
use App\Traits\PaymentGateway;
use App\Events\WithdrawalRequestEvent;

class WalletController extends Controller
{
    use SchoolBase; use PaymentGateway;

    private $withdrawalFee;
    private $userId;
    private $school;

    public function __construct()
    {
        $this->middleware('auth:school');

        $this->middleware(function ($request, $next) {
            $this->userId = auth()->user()->id;
            $this->withdrawalFee = \App\WebSettings::find(1)->withdrawal_fee;
            $this->school = $this->getSchoolInUsed($this->userId);

            return $next($request);
        });
    }

    public function history()
    {

        if($this->school) {
            // get schools tied to the account & banks list
            $schools = $this->getSchoolsForTheAccount($this->userId);
            $banknames = $this->getListOfBanks();

            $history = $this->school->withdrawalhistory->sortByDesc('created_at')->values()->all();

            //get school wallet
            $totalAmount = $this->school->wallet->total_amount;

            return view('school.withdraw-history')->with(['school' => $this->school, 'history' => $history, 'wallet' => $totalAmount, 'schools' => $schools, 'banknames' => $banknames]);

        } else {
            return redirect(route('school.dashboard'));
        }
    }

    public function withdraw(Request $request)
    {

        if ($request->amount < 100) return back()->with('error', 'Sorry! Amount is less than 100');

        $wallet = $this->school->wallet;
        $amount = $request->amount;
        $totalWithdrawal = $amount + $this->withdrawalFee;

        if ($totalWithdrawal > $wallet->total_amount)
            return back()->with('error', 'Not a enough balance in your Available Funds. Fee should be included.');

        // generate reference
        $reference = $this->transferReference(); //."_PMCKDU_1";

        // save withdrawal in History
        $history = new WithdrawalHistory;
        $history->school_detail_id = $this->school->id;
        $history->reference = $reference;
        $history->balance_before = $wallet->total_amount;
        $history->balance_after = ($wallet->total_amount - $totalWithdrawal);
        $history->currency = "NGN";
        $history->amount = $amount;
        $history->skooleo_fee = $this->withdrawalFee;
        $history->account_number = $this->school->corporate_acctno;
        $history->fullname = $this->school->corporate_acctname;
        $history->bank_code = $this->school->bankname;
        $history->save();

        // withdrawal event WithdrawalRequestEvent
        event(new WithdrawalRequestEvent($this->school, $wallet, $amount, $totalWithdrawal, $reference, $history->balance_before));

        return redirect(route('withdraw.history'))->with('success', 'Withdrawal is being processed.');
    }
}
