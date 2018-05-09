<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use DB;

class Bacsi extends Model
{
    protected $table = "bacsi";

    public function bacsi(){
    	return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function bacsi_lichkham(){
    	return $this->hasMany('App\Thongtinkhambenh', 'id_bacsi', 'id');
    }

    public function _getDanhSachBacSi($params){
        $query       = $this->query();
        $currentPage = $params['currentPage'];
        $perPage     = $params['perPage'];
        $searchString = $params['searchString'];
        Paginator::currentPageResolver(function() use ($currentPage) {
               return $currentPage;
          });
        $query->select('users.id', 'users.hoten', 'users.ngaysinh', 'users.gioitinh','users.avatar', 'users.dienthoai', 'users.tinh', 'bacsi.diachi', 'bacsi.khoalamviec', 'bacsi.kinhnghiem', 'bacsi.hocvi')
            ->join('users', 'bacsi.id_user', '=', 'users.id');

          if($params['searchString']) {
            $query->where(function ($query1) use($searchString) {
              $query1->where('users.hoten', 'LIKE','%' . $searchString .'%');
            });
          }

          if($params['find_chuyenkhoa']) {
            $query->where('khoalamviec', 'LIKE', '%' . $params['find_chuyenkhoa'] .'%');
          }

          if($params['find_hocvi']) {
            $query->where('hocvi', $params['find_hocvi']);
          }

          if($params['find_tinh']) {
            $query->where('users.tinh', $params['find_tinh']);
          }

          return $query->paginate($perPage);
    }
}
