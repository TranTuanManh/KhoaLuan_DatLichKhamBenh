<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baiviet extends Model
{
    protected $table = "baiviet";

    public function nguoihoi(){
    	return $this->belongsTo('App\User', 'id_nguoihoi', 'id');
    }

    public function nguoiduochoi(){
    	return $this->belongsTo('App\User', 'id_nguoiduochoi', 'id');
    }

    public function chude(){
    	return $this->belongsTo('App\Chude', 'id_chude', 'id');
    }

    public function binhluans(){
        return $this->hasMany('App\Binhluan', 'id_baiviet', 'id');
    }
}
