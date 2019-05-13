<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    protected $table = "reservation";

    public function reservation(){
    	return $this->hasMany('App\ReservationDetail','id_reservation', 'id');
    }

    public function customer(){
    	return $this->belongsto('App\Customer','id_customer', 'id');
    }

    public $timestamps = false;
}
