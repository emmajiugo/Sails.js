<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class School extends Authenticatable
{
    use Notifiable;

    protected $guard = 'school';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'schoolname', 'schooladdr', 'schoolphone', 'schoolemail', 'registeredby', 'registrarstatus',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function bankdetail() {
        return $this->hasOne('App\BankDetail');
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

    public function supportticket() {
        return $this->hasMany('App\SupportTicket');
    }

    public function invoice() {
        return $this->hasMany('App\Invoice');
    }
}
