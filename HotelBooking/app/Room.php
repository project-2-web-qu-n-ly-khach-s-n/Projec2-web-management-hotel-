<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    protected $table = "room";

    public function room_type(){
    	return $this->belongsto('App\RoomType', 'id_type', "id");
    }

    public function reservation(){
    	return $this->hasMany('App\ReservationDetail', 'id_room', 'id');
    }
}
