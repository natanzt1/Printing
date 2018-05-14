<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function User(){
    	return $this->belongsTo('App\User', 'user_id');
    }
    public function Printing(){
    	return $this->belongsTo('App\Printing', 'printing_id');
    }
}
