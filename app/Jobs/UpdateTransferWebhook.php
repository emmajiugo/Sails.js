<?php

namespace App\Jobs;

use App\Wallet;
use App\WithdrawalHistory;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateTransferWebhook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $reference;
    private $status;
    private $message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($reference, $status, $message)
    {
        $this->reference = $reference;
        $this->status = $status;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $history = WithdrawalHistory::where('reference', $this->reference)->first();

        // refund user if transfer fails/ update balance_after
        if ($this->status === "FAILED" && $history->status !== "FAILED") {
            $wallet = Wallet::where('school_detail_id', $history->school_detail_id)->first();

            $fee = $history->skooleo_fee;
            $amount = $history->amount;
            $totalWithdrawn = $fee + $amount;

            // refund
            $wallet->total_amount += $totalWithdrawn;
            $wallet->save();

            // update balance_after
            $history->balance_after = $history->balance_before;
        }

        // update record
        $history->status = strtoupper($this->status);
        $history->message = $this->message;
        $history->save();
    }
}
