<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Chude;
use Auth;

class PageController extends Controller
{
    public function getTrangChu(){
    	return view('pages.trangchu');
    }

    public function getDangNhap(){
    	return view('introduce.dangnhap');
    }

    public function postDangNhap(Request $req){
        $credential = array('email' => $req->email, 'password' => $req->password);
        if(Auth::attempt($credential)){
            return redirect('trang-chu');
        }
        else{
            return redirect()->back();
        }
    }

    public function getDangKi(){
    	return view('introduce.dangki');
    }

    public function postDangKi(Request $req){
        $user = new User();
        $user->email = $req->email;
        $user->hoten = $req->hoten;
        $user->role = $req->role;
        $user->remember_token = $req->_token;
        $user->password = bcrypt($req->password);
        $user->save();
        return redirect('dang-nhap')->with('thanhcong', 'Tạo tài khoản thành công');
    }

    public function getHoiBacSi(){
        $chude = Chude::all();
    	return view('pages.hoibacsi', compact('chude'));
    }

    public function getGioiThieu(){
        return view('introduce.intro');
    }

    public function getDangXuat(){
        Auth::logout();
        return redirect()->route('gioithieu');
    }
}
