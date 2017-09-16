<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function property(){
        return $this->hasMany('App\Property');
    }

    public function getPhone(){
        // substr_replace(string, replacement, start)
        $phone = $this->phone;
        return "+".substr($phone,0, 1)."(".substr($phone,1, 3).")".substr($phone, 4, 3)."-".substr($phone,7, 4);
        // return "+".$this->phone;
    }

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
