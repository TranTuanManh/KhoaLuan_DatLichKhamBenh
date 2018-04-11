<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Chude;
use App\Tinh;
use App\Bacsi;
use App\Thongtinkhambenh;
use App\Baiviet;
use App\Tintuc;
use App\Binhluan;
use Hash;
use Auth;

class PageController extends Controller
{
    public function getTrangChu(){
        $tintuc = Tintuc::orderBy('created_at', 'DESC')->paginate(4);
    	return view('pages.trangchu', compact('tintuc'));
    }

    public function getDangNhap(){
    	return view('introduce.dangnhap');
    }

    public function postDangNhap(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu không dưới 6 kí tự',
                'email.email'=>'Không đúng định dạng email'
            ]);
        $credentials = array('email'=>$req->email, 'password'=>$req->password);
        if(Auth::attempt($credentials)){
            return redirect('trang-chu');
        }
        else{
            return redirect()->back()->with('danger', 'Tài khoản hoặc mật khẩu chưa chính xác');
        }
    }


    public function getDangKi(){
    	return view('introduce.dangki');
    }

    public function postDangKi(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu không dưới 6 kí tự',
                'email.email'=>'Không đúng định dạng email'
            ]);
        $user = new User();
        $user->email = $req->email;
        $user->hoten = $req->hoten;
        $user->role = $req->role;
        $user->gioitinh = $req->gioitinh;
        if($user->gioitinh == "Nam"){
            $user->avatar = "images/nguoidung/nam.png";
        }
        else{
            $user->avatar = "images/nguoidung/nu.png";
        }
        $user->remember_token = $req->_token;
        $user->password = bcrypt($req->password);
        $exist_user = User::where('email', $req->email)->first();
        if($exist_user){
            return redirect()->back()->with('tontai', 'Tài khoản này đã tồn tại');
        }
        $user->save();
        if($req->role == 2){
            $bacsi = new Bacsi();
            $bacsi->id_user = $user->id;
            $bacsi->save();
        }
        return redirect('dang-nhap')->with('thanhcong', 'Tạo tài khoản thành công');
    }

    public function getHoiBacSi(){
        $chude = Chude::all();
        $baiviet = Baiviet::orderBy('created_at', 'DESC')->paginate(8);
        $bacsi = User::where('role', 2)->get(); 
        $binhluan = Binhluan::orderBy('created_at', 'ASC')->get();
    	return view('pages.hoibacsi', compact('chude', 'bacsi', 'baiviet', 'binhluan'));
    }

    public function postHoiBacSi(Request $req){
        $nguoihoi = Auth::user()->id;
        $baiviet = new Baiviet();
        $baiviet->id_nguoihoi = $nguoihoi;
        $baiviet->id_nguoiduochoi = $req->id_nguoiduochoi;
        $baiviet->noidung = $req->noidung;
        $baiviet->id_chude = $req->id_chude;

        $file = $req->file;
        if($file){  
            $filename = $file->getClientOriginalName();          
            $req->file->move(base_path('public/images/baiviet'), $filename);
            $baiviet->url_anh = 'images/baiviet/'.$filename;
        }
        $baiviet->save();
        return redirect()->back();
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
        if(Auth::user()->role==2){
            $bacsi = Bacsi::where('id_user', Auth::user()->id)->first();
            if($bacsi){
                $bacsi->diachi = $req->diachi;
                $bacsi->khoalamviec = $req->khoalamviec;
            }
            else{
                $bacsi = new Bacsi();
                $bacsi->id_user = Auth::user()->id;
                $bacsi->diachi = $req->diachi;
                $bacsi->khoalamviec = $req->khoalamviec;
            }
            $bacsi->save();
        }
        $user = User::find(Auth::user()->id);
        $user->hoten = $req->hoten;
        $user->gioitinh = $req->gioitinh;
        $user->email = $req->email;
        $user->ngaysinh = $req->ngaysinh;
        $user->dienthoai = $req->dienthoai;
        $user->tinh = $req->tinh;
        $user->save();
        return redirect()->back()->with('thanhcong', 'Đổi thông tin thành công');
    }

    public function getMatKhau(){
        return view('pages.doimatkhau');
    }

    public function postMatKhau(Request $req){
        $this->validate($req,
            [
                'password'=>'required|min:6|max:20|confirmed'
            ],
            [
                'password.max'=>'Mật khẩu không quá 20 kí tự',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu không dưới 6 kí tự',
                'password.confirmed'=>'Mật khẩu xác nhận không trùng nhau'
            ]);
        $user = User::find(Auth::user()->id);
        if (Hash::check($req->old_password, $user->password)){
            $user->password = bcrypt($req->password);
            $user->save();
        }
        else{
            return redirect()->back()->with('thatbai', 'Mật khẩu cũ không chính xác');
        }
        return redirect()->back()->with('thanhcong', 'Đổi mật khẩu thành công');
    }

    public function getTinTuc(){
        $chude = Chude::all();
        $tintuc = Tintuc::orderBy('created_at', 'DESC')->paginate(10);
        return view('pages.tintuc', compact('chude', 'tintuc'));
    }

    public function getTraCuu(){
        $tintuc = Tintuc::orderBy('created_at', 'DESC')->paginate(4);
        return view('pages.tracuu', compact('tintuc'));
    }

    public function getDatLichKham(){
        $bacsi = User::where('role', 2)->get();
        return view('pages.datlichkham', compact('bacsi'));
    }

    public function getDatLich($id){
        $currentbacsi = User::find($id);
        $bacsi = User::where('role', 2)->where('id', '<>', $id)->get();
        $bacsiinfo = Bacsi::where('id_user', $id)->first();
        return view('pages.datlichkhamnhanh', compact('bacsi', 'currentbacsi', 'bacsiinfo'));
    }

    public function postDatLich(Request $req){
        $thongtinkhambenh = new Thongtinkhambenh();
        $thongtinkhambenh->hotenbenhnhan = $req->name;
        $thongtinkhambenh->gioitinh = $req->gender;
        $thongtinkhambenh->email = $req->email;
        $thongtinkhambenh->diachi = $req->address;
        $thongtinkhambenh->dienthoai = $req->phone;
        $thongtinkhambenh->thoigian = $req->time;
        $thongtinkhambenh->ngayhen = $req->ngayhen;
        $thongtinkhambenh->id_bacsi = $req->id_bacsi;
        $thongtinkhambenh->lido = $req->lido;
        $thongtinkhambenh->id_nguoigui = Auth::user()->id;
        $thongtinkhambenh->save();
        return redirect()->back()->with('thanhcong', 'Đặt lịch khám bệnh thành công');
    }


    public function postDatLichKham(Request $req){
        $thongtinkhambenh = new Thongtinkhambenh();
        $thongtinkhambenh->hotenbenhnhan = $req->name;
        $thongtinkhambenh->gioitinh = $req->gender;
        $thongtinkhambenh->email = $req->email;
        $thongtinkhambenh->diachi = $req->address;
        $thongtinkhambenh->dienthoai = $req->phone;
        $thongtinkhambenh->thoigian = $req->time;
        $thongtinkhambenh->ngayhen = $req->ngayhen;
        $thongtinkhambenh->id_bacsi = $req->id_bacsi;
        $thongtinkhambenh->lido = $req->lido;
        $thongtinkhambenh->id_nguoigui = Auth::user()->id;
        $thongtinkhambenh->save();
        return redirect()->back()->with('thanhcong', 'Đặt lịch khám bệnh thành công');
    }

    public function getAjax(){
        $bacsi_id = Input::get('id_bacsi');
        $bacsi = Bacsi::where('id_user', $bacsi_id)->first();
        return Response::json($bacsi);
    }

    public function storecomment(Request $request){
        if($request->comment_content == null){
            $error = '<p class="text-danger">Bạn chưa nhập bình luận</p>';
        }
        else{
            $comment = Binhluan::where('id_baiviet', $request->id_baiviet); 
            $comment = new Binhluan();
            $comment->noidung = $request->comment_content;
            $comment->id_nguoibinhluan = Auth::user()->id;
            $comment->id_baiviet = $request->id_baiviet;
            $comment->save();
        }
    }

    public function loadcomment(){
        $comment = Binhluan::orderBy('created_at', 'DESC')->first(); 
        $output = '';
            $output .= '
                <div class="row">
                        <div class="col-md-1">
                            <img src="'. $comment->nguoibinhluan->avatar .'" width="40px">
                        </div>              
                        <div class="row name">
                            <a href="#" style="margin-left: -10px"><b>'. $comment->nguoibinhluan->hoten .'</b></a><br><br>
                            <div class="col-md-11 commenting">'.
                                $comment->noidung
                                .'<div class="ex-infor2"><a href="#">'. $comment->created_at->diffForHumans() .'</a><a href="#"><i class="fa fa-heart-o"></i> Yêu thích</a></div>
                            </div>

                        </div>
                    </div>
            ';
        echo $output;
    }

    public function lichkhambenh(){
        if(Auth::user()->role == 1){
            $thongtinkhambenh = Thongtinkhambenh::orderBy('created_at', 'DESC')->where('id_nguoigui', Auth::user()->id)->paginate(10);
        }
        if(Auth::user()->role == 2){
            $thongtinkhambenh = Thongtinkhambenh::orderBy('created_at', 'DESC')->where('id_bacsi', Auth::user()->id)->paginate(10);
        }
        return view('pages.lichkhambenh', compact('thongtinkhambenh'));
    }

    public function chapnhan($id){
        $thongtinkhambenh = Thongtinkhambenh::find($id)->update(array('trangthai' => 1));
        return redirect()->back();
    }

    public function huy($id){
        $thongtinkhambenh = Thongtinkhambenh::find($id)->update(array('trangthai' => 3));
        return redirect()->back();
    }

    public function pllichkhambenh($id){
        if(Auth::user()->role == 1){
            if($id == 1){
                $thongtinkhambenh = Thongtinkhambenh::orderBy('created_at', 'DESC')->where('trangthai', 1)->where('id_nguoigui', Auth::user()->id)->paginate(10);
            }

            else if($id == 2){
                $thongtinkhambenh = Thongtinkhambenh::orderBy('created_at', 'DESC')->where('trangthai', 2)->where('id_nguoigui', Auth::user()->id)->paginate(10);
            }
            else{
                $thongtinkhambenh = Thongtinkhambenh::orderBy('created_at', 'DESC')->where('trangthai', 3)->where('id_nguoigui', Auth::user()->id)->paginate(10);
            }
            
        }
        if(Auth::user()->role == 2){
            if($id == 1){
                $thongtinkhambenh = Thongtinkhambenh::orderBy('created_at', 'DESC')->where('trangthai', 1)->where('id_bacsi', Auth::user()->id)->paginate(10);
            }

            else if($id == 2){
                $thongtinkhambenh = Thongtinkhambenh::orderBy('created_at', 'DESC')->where('trangthai', 2)->where('id_bacsi', Auth::user()->id)->paginate(10);
            }
            else{
                $thongtinkhambenh = Thongtinkhambenh::orderBy('created_at', 'DESC')->where('trangthai', 3)->where('id_bacsi', Auth::user()->id)->paginate(10);
            }
        }
        return view('pages.lichkhambenh', compact('thongtinkhambenh'));
    }
}
