<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis_printing extends Model
{
    public function Detail_print(){
    	return $this->hasMany('App\Detail_print');
    }
}
