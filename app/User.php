<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	//Fillable adalah variable yang menentukan data dari field mana yang dapat disimpan ke model/database
    protected $fillable = ['username', 'email', 'password'];
}
