<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class WithdrawalRequestEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $school;
    public $wallet;
    public $amount;
    public $totalWithdrawal;
    public $reference;
    public $balanceBefore;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($school, $wallet, $amount, $totalWithdrawal, $reference, $balanceBefore)
    {
        $this->school = $school;
        $this->wallet = $wallet;
        $this->amount = $amount;
        $this->totalWithdrawal = $totalWithdrawal;
        $this->reference = $reference;
        $this->balanceBefore = $balanceBefore;
    }
}
