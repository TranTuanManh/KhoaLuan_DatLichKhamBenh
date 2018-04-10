<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Binhluan extends Model
{
    protected $table = "binhluan";

    public function binhluans(){
    	return $this->belongsTo('App\Baiviet', 'id_baiviet', 'id');
    }

    public function nguoibinhluan(){
    	return $this->belongsTo('App\User', 'id_nguoibinhluan', 'id');
    }
}
