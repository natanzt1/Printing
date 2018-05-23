<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_layanan extends Model
{
    public function Layanan_tersedia(){
    	return $this->belongsTo('App\Layanan_tersedia','layanan_tersedia_id');
    }
}
