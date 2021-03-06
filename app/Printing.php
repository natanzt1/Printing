<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Printing extends Authenticatable
{
    use Notifiable;

    protected $guard = 'printing';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Favorite(){
        return $this->hasMany('App\Favorite');
    }
    
    public function Transaksi(){
        return $this->hasMany('App\Transaksi');
    }
}