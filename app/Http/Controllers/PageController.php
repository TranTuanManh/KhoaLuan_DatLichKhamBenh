<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Chude;
use App\Tinh;
use Hash;
use Auth;

class PageController extends Controller
{
    public function getTrangChu(){
    	return view('pages.trangchu');
    }

    public function getDangNhap(){
    	return view('introduce.dangnhap');
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

    public function getThongTin(){
        $user_tinh = Auth::user()->tinh;
        $usertinh = Tinh::where('id',$user_tinh)->first();
        $tinh = Tinh::where('id', '<>', $user_tinh)->get();
        return view('pages.thongtintaikhoan', compact('tinh', 'usertinh'));
    }

    public function postThongTin(Request $req){
        $user = User::find(Auth::user()->id);
        $user->hoten = $req->hoten;
        $user->gioitinh = $req->gioitinh;
        $user->email = $req->email;
        $user->ngaysinh = $req->ngaysinh;
        $user->dienthoai = $req->dienthoai;
        $user->tinh = $req->tinh;
        $user->save();
        return redirect()->back();
    }

    public function getMatKhau(){
        return view('pages.doimatkhau');
    }

    public function postMatKhau(Request $req){
        $user = User::find(Auth::user()->id);
        if (Hash::check($req->old_password, $user->password)){
            $user->password = bcrypt($req->new_password);
            $user->save();
        }
        else{
            return redirect()->back()->with('Doimatkhauthatbai');
        }
        return redirect()->back();
    }

    public function getTinTuc(){
        return view('pages.tintuc');
    }
}
