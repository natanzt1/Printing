<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public function Detail_transaksi(){
        return $this->hasMany('App\Detail_transaksi');
    }

    public function User(){
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function Printing(){
    	return $this->belongsTo('App\Printing', 'printing_id');
    }
}
