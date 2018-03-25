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

Route::get('gioi-thieu',[
	'as' => 'gioithieu',
	'uses' => 'PageController@getGioiThieu'
]);



