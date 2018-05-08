<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layanan_tersedia extends Model
{
    public function Printing(){
    	return $this->belongsTo('App\Printing', 'printing_id');
    }
    public function Detail_print(){
    	return $this->belongsTo('App\Detail_print', 'detail__print_id');
    }
}
