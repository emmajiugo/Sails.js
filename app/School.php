<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\SchoolResetPasswordNotification;

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
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new SchoolResetPasswordNotification($token));
    }

    public function schooldetails() {
        return $this->hasMany('App\SchoolDetail');
    }
}
