<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    //
    public function schooldetail() {
        return $this->belongsTo('App\SchoolDetail');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function supportreplies() {
        return $this->hasMany('App\SupportReply');
    }
}
