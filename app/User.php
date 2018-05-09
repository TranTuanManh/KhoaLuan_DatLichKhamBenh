<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function nguoihoi(){
        return $this->hasOne('App\Baiviet', 'id_nguoihoi', 'id');
    }

    public function nguoiduochoi(){
        return $this->hasOne('App\Baiviet', 'id_nguoiduochoi', 'id');
    }

    public function nguoibinhluan(){
        return $this->hasMany('App\Binhluan', 'id_nguoibinhluan', 'id');
    }

    public function thongtinkham(){
        return $this->hasMany('App\Thongtinkhambenh', 'id_nguoigui', 'id');
    }

    public function bacsi(){
        return $this->hasOne('App\Bacsi', 'id_user', 'id');
    }

}
