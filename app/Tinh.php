<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tinh extends Model
{
    protected $table = "tinh";

    public function Quan(){
    	$this->hasMany('App\Quan', 'provinceid', 'id');
    }
}
