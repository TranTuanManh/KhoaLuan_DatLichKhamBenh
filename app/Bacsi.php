<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bacsi extends Model
{
    protected $table = "bacsi";

    public function bacsi(){
    	return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function bacsi_lichkham(){
    	return $this->hasMany('App\Thongtinkhambenh', 'id_bacsi', 'id');
    }
}
