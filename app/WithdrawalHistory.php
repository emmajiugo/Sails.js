<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WithdrawalHistory extends Model
{
    //
    public function schooldetail() {
        return $this->belongsTo('App\SchoolDetail');
    }
}
