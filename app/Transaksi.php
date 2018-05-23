<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public function Detail_transaksi(){
        return $this->hasMany('App\Detail_transaksi');
    }
}
