<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ukuran_kertas extends Model
{
    public function Detail_print(){
    	return $this->hasMany('App\Detail_print');
    }
}
