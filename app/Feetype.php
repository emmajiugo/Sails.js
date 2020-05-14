<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feetype extends Model
{
    //
    public function feesetup() {
        return $this->hasMany('App\Feesetup');
    }

    public function schooldetail() {
        return $this->belongsTo('App\SchoolDetail');
    }
}
