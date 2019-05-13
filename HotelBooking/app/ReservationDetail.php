<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservation_detail extends Model
{
    protected $table = "reservation_detail";

    public function room(){
    	return $this->belongsto('App\Room','id_room', 'id');
    }

    public function reservation_detail(){
    	return $this->belongsto('App\Reservation','id_reservation', 'id');
    }


}
