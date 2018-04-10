<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chude extends Model
{
    protected $table = "chude";

    public function chude(){
    	return $this->hasOne('App\Baiviet', 'id_chude', 'id');
    }
}
