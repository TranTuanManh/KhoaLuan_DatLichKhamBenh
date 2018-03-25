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

Route::get('trang-chu',[
	'as' => 'trangchu',
	'uses' => 'PageController@getTrangChu'
]);

Auth::routes();

Route::get('dang-nhap',[
	'as' => 'dangnhap',
	'uses' => 'PageController@getDangNhap'
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