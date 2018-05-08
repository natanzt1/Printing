<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_Print extends Model
{
    public function Ukuran_kertas(){
    	return $this->belongsTo('App\Ukuran_kertas', 'ukuran_kertas_id');
    }
    public function Jenis_kertas(){
    	return $this->belongsTo('App\Jenis_kertas', 'jenis_kertas_id');
    }
    public function Jenis_printing(){
    	return $this->belongsTo('App\Jenis_printing', 'jenis_printing_id');
    }
}
