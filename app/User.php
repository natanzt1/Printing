<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	//Fillable adalah variable yang menentukan data dari field mana yang dapat disimpan ke model/database
    protected $fillable = ['username', 'email', 'password'];

	public function Favorite(){
    	return $this->hasMany('App\Favorite');
    }

    public function Transaksi(){
    	return $this->hasMany('App\Transaksi');
    }
}
