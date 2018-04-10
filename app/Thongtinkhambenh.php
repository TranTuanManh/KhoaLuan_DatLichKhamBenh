<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thongtinkhambenh extends Model
{
    protected $table = "thongtinkhambenh";

     protected $fillable = ['trangthai'];

    public function thongtinkham(){
    	return $this->belongsTo('App\User', 'id_nguoigui', 'id');
    }

    public function bacsi_lichkham(){
    	return $this->belongsTo('App\Bacsi', 'id_bacsi', 'id');
    }
}
