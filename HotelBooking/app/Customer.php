<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table = "customer";

    protected $fillable = [
        'name', 'email','id_user','phone_number','address','note'
    ];


    public function reservation(){
    	return $this->hasMany('App\Reservation','id_customer', 'id');
    }
}
