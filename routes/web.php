<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
	return redirect('trang-chu');
});

Route::get('trang-chu',[
	'as' => 'trangchu',
	'uses' => 'PageController@getTrangChu'
]);

Route::get('dang-nhap',[
	'as' => 'dangnhap',
	'uses' => 'PageController@getDangNhap'
]);

Route::post('dang-nhap',[
	'as' => 'dangnhap',
	'uses' => 'PageController@postDangNhap'
]);

Route::get('dang-ki',[
	'as' => 'dangki',
	'uses' => 'PageController@getDangKi'
]);

Route::post('dang-ki',[
	'as' => 'dangki',
	'uses' => 'PageController@postDangKi'
]);

Route::get('dang-xuat',[
	'as' => 'dangxuat',
	'uses' => 'PageController@getDangXuat'
]);

Route::get('hoi-bac-si',[
	'as' => 'hoibacsi',
	'uses' => 'PageController@getHoiBacSi'
]);

Route::post('hoi-bac-si',[
	'as' => 'hoibacsi',
	'uses' => 'PageController@postHoiBacSi'
]);

Route::get('gioi-thieu',[
	'as' => 'gioithieu',
	'uses' => 'PageController@getGioiThieu'
]);

Route::get('thong-tin-tai-khoan',[
	'as' => 'thongtintaikhoan',
	'uses' => 'PageController@getThongTin'
]);

Route::post('thong-tin-tai-khoan',[
	'as' => 'thongtintaikhoan',
	'uses' => 'PageController@postThongTin'
]);

Route::get('doi-mat-khau',[
	'as' => 'doimatkhau',
	'uses' => 'PageController@getMatKhau'
]);

Route::post('doi-mat-khau',[
	'as' => 'doimatkhau',
	'uses' => 'PageController@postMatKhau'
]);

Route::get('tin-tuc',[
	'as' => 'tintuc',
	'uses' => 'PageController@getTinTuc'
]);

Route::get('tin-tuc/{id_chude}',[
	'as' => 'pl_tintuc',
	'uses' => 'PageController@getPhanLoaiTinTuc'
]);

Route::get('tra-cuu',[
	'as' => 'tracuu',
	'uses' => 'PageController@getTraCuu'
]);

Route::get('dat-lich-kham',[
	'as' => 'datlichkham',
	'uses' => 'PageController@getDatLichKham'
]);

Route::get('dat-lich-kham-ngay/{id}',[
	'as' => 'datlich',
	'uses' => 'PageController@getDatLich'
]);

Route::post('dat-lich-kham-ngay',[
	'as' => 'postdatlich',
	'uses' => 'PageController@postDatLichKham'
]);

Route::post('dat-lich-kham',[
	'as' => 'datlichkham',
	'uses' => 'PageController@postDatLichKham'
]);

Route::get('quan-ly-lich-kham',[
	'as' => 'quanlylichkham',
	'uses' => 'PageController@getQuanLyLichKham'
]);

Route::post('ajax-subinfor',[
	'as' => 'ajax',
	'uses' => 'PageController@getAjax'
 ]);

Route::post('/loadList', 'PageController@loadList');
Route::post('/add', 'PageController@add');
Route::post('/lichkham_add', 'PageController@lichkham_add');
Route::post('/edit', 'PageController@edit');
Route::post('/update', 'PageController@update');
Route::post('/delete', 'PageController@delete');
Route::get('/danh-sach/bac-si', 'PageController@getDanhSachBacSi')->name('danhsachbacsi');
Route::post('/danh-sach/LoadBacSi', 'PageController@loadDanhSachBacSi');

Route::post('comment',[
	'as' => 'comment',
	'uses' => 'PageController@storecomment'
]);

Route::get('loadcomment',[
	'as' => 'loadcomment',
	'uses' => 'PageController@loadcomment'
]);

Route::get('lichkhambenh',[
	'as' => 'lichkhambenh',
	'uses' => 'PageController@lichkhambenh'
]);

Route::get('pllichkhambenh/{id}',[
	'as' => 'pllichkhambenh',
	'uses' => 'PageController@pllichkhambenh'
]);

Route::get('chapnhan/{id}',[
	'as' => 'chapnhan',
	'uses' => 'PageController@chapnhan'
]);

Route::get('huy/{id}',[
	'as' => 'huy',
	'uses' => 'PageController@huy'
]);