<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolDetail extends Model
{
    //
    public function school() {
        return $this->belongsTo('App\School');
    }

    public function wallet() {
        return $this->hasOne('App\Wallet');
    }

    public function feesetup() {
        return $this->hasMany('App\Feesetup');
    }

    public function feetype() {
        return $this->hasMany('App\Feetype');
    }

    public function paymenthistory() {
        return $this->hasMany('App\PaymentHistory');
    }
    public function withdrawalhistory() {
        return $this->hasMany('App\WithdrawalHistory');
    }

    public function invoices() {
        return $this->hasMany('App\Invoice');
    }
}
