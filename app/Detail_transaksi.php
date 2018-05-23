<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_transaksi extends Model
{
    public function Transaksi(){
        return $this->belongsTo('App\Favorite', 'transaksi_id');
    }
}
