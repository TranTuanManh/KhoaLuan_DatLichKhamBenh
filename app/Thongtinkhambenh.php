<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use DB;
use Carbon\Carbon;

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

    public function _getAll($params, $id_bacsi) {
          $query       = $this->query();
          $currentPage = $params['currentPage'];
          $perPage     = $params['perPage'];
          $searchString = $params['searchString'];
          Paginator::currentPageResolver(function() use ($currentPage) {
               return $currentPage;
          });
          $query->select('id', 'thoigian', 'ngayhen', 'hotenbenhnhan','gioitinh', 'email', 'diachi', 'lido', 'dienthoai', 'trangthai', 'id_bacsi')->where('id_bacsi', $id_bacsi);

          if($params['find_ngayhen'] == 1) {
            $query;
          }

          if($params['find_trangthai'] == 0) {
            $query;
          }

          if($params['find_trangthai'] == 1) {
            $query->where('trangthai', 1);
          }

          if($params['find_trangthai'] == 2) {
            $query->where('trangthai', 2);
          }

          if($params['find_trangthai'] == 3) {
            $query->where('trangthai', 3);
          }
          $mytime = Carbon::now()->format('Y-m-d');
          if($params['find_ngayhen'] == 2) {
            $query->where('ngayhen','=' ,$mytime);
          }

          if($params['find_ngayhen'] == 3) {
            $query->where('ngayhen','<' ,$mytime);
          }

          if($params['searchString']) {
            $query->where(function ($query1) use($searchString) {
              $query1->where('hotenbenhnhan', 'LIKE','%' . $searchString .'%');
            });
          }
          $query->orderBy('ngayhen');
          return $query->paginate($perPage);
    }

    public function _delete($listitem){
        $arrListitem = explode(',', $listitem);
        DB::beginTransaction();
        try {
            $this->whereIn('id',$arrListitem)->delete();
            DB::commit();
            return array('success'=> true,'message' =>'Thành công');
        } catch (\Exception $e) {
            DB::rollback();
            return array('success'=> false,'message' => (string) $e->getMessage());
        }
    }
}
