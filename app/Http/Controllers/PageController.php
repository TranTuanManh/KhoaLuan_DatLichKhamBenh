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
use App\Slide;
use Hash;
use Auth;
use Carbon\Carbon;

class PageController extends Controller
{
    public function getTrangChu(){
        $tintuc = Tintuc::orderBy('created_at', 'DESC')->paginate(4);
        $bacsi = User::where('role', 2)->paginate(4);
        $slide = Slide::all();
    	return view('pages.trangchu', compact('tintuc', 'bacsi', 'slide'));
    }

    public function loadList(Request $request){
        $thongtinkhambenh  = new Thongtinkhambenh();
        $currentPage = $request->currentPage;
        $perPage = $request->perPage;
        $search = $request->search;
        $params = array(
                'searchString' => $request->search_string,
                'find_ngayhen' => $request->find_ngayhen,
                'find_trangthai' => $request->find_trangthai,
                'currentPage'  => $request->currentPage,
                'perPage'      => $request->perPage,
            );
        $id_bacsi = Auth::user()->id;
        $objResult = $thongtinkhambenh->_getAll($params, $id_bacsi);
        $arrResult = $objResult->toArray();
        $data = $arrResult['data'];
        if($data) {
            for($i = 0; $i < count($data); $i++) {
                if($data[$i]['trangthai'] == 1){
                    $data[$i]['trangthai'] = "Đã chấp nhận";
                }
                else if($data[$i]['trangthai'] == 2){
                    $data[$i]['trangthai'] = "Đang chờ xử lí";
                }
                else{
                    $data[$i]['trangthai'] = "Đã hủy";
                }

                if($data[$i]['thoigian'] == 1){
                    $data[$i]['thoigian'] = "Buổi sáng";
                }
                else{
                    $data[$i]['thoigian'] = "Buổi chiều";
                }
                $data[$i]['ngayhen'] = date('d/m/Y', strtotime($data[$i]['ngayhen']));
            }
        }
        return \Response::JSON(array(
               'Dataloadlist'  => $data,
               'pagination' => (string) $objResult->links('quanlylichkham.pagination'),
               'perPage' => $perPage,
        ));
    }

    public function add(Request $request){
        $data['arrLichKham'] = null;
        return view('quanlylichkham.add', $data);
    }

    public function edit(Request $request){
        $itemid = $request->input('itemId');
        $thongtinkhambenh = Thongtinkhambenh::find($itemid);
        $arrLichKham['hotenbenhnhan']  = $thongtinkhambenh->hotenbenhnhan;
        $arrLichKham['gioitinh']  = $thongtinkhambenh->gioitinh;
        $arrLichKham['email']  = $thongtinkhambenh->email;
        $arrLichKham['dienthoai']  = $thongtinkhambenh->dienthoai;
        $arrLichKham['lido']  = $thongtinkhambenh->lido;
        $arrLichKham['diachi']  = $thongtinkhambenh->diachi;
        $arrLichKham['thoigian']  = $thongtinkhambenh->thoigian;
        $arrLichKham['ngayhen']  = $thongtinkhambenh->ngayhen;
        $arrLichKham['trangthai']  = $thongtinkhambenh->trangthai;
        $data['arrLichKham'] = $arrLichKham;
        return view('quanlylichkham.add', $data);
    }

    public function lichkham_add(Request $request){
        $thongtinkhambenh = new Thongtinkhambenh();
        $id_bacsi = Auth::user()->id;
        $thongtinkhambenh->hotenbenhnhan = $request->hotenbenhnhan;
        $thongtinkhambenh->id_bacsi = $id_bacsi;
        $thongtinkhambenh->gioitinh = $request->gioitinh;
        if($request->email){
            $thongtinkhambenh->email = $request->email;
        }
        else{
            $thongtinkhambenh->email = null;
        }
        $thongtinkhambenh->dienthoai = $request->dienthoai;
        $thongtinkhambenh->lido = $request->lido;
        $thongtinkhambenh->diachi = $request->diachi;
        $thongtinkhambenh->thoigian = $request->thoigian;
        $thongtinkhambenh->ngayhen = $request->ngayhen;
        $thongtinkhambenh->trangthai = $request->trangthai;
        $thongtinkhambenh->save();
        return array('success' => true, 'message' => 'Cập nhật thành công');
    }

    public function update(Request $request){
        $id = $request->input('itemId');
        $thongtinkhambenh = Thongtinkhambenh::find($id);
        $id_bacsi = Auth::user()->id;
        $thongtinkhambenh->id_bacsi = $id_bacsi;
        $thongtinkhambenh->hotenbenhnhan = $request->hotenbenhnhan;
        $thongtinkhambenh->gioitinh = $request->gioitinh;
        if($request->email){
            $thongtinkhambenh->email = $request->email;
        }
        else{
            $thongtinkhambenh->email = null;
        }
        $thongtinkhambenh->dienthoai = $request->dienthoai;
        $thongtinkhambenh->lido = $request->lido;
        $thongtinkhambenh->diachi = $request->diachi;
        $thongtinkhambenh->thoigian = $request->thoigian;
        $thongtinkhambenh->ngayhen = $request->ngayhen;
        $thongtinkhambenh->trangthai = $request->trangthai;
        $thongtinkhambenh->save();
        return array('success' => true, 'message' => 'Cập nhật thành công');
    }

    public function delete(Request $request){
        $thongtinkhambenh = new Thongtinkhambenh;
        $listitem = $request->input('listitem');
        $arrResult = $thongtinkhambenh->_delete($listitem);

        return \Response::JSON($arrResult);
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
        $bacsi = Bacsi::all()->groupBy('khoalamviec');
        $binhluan = Binhluan::orderBy('created_at', 'ASC')->get();
    	return view('pages.hoibacsi', compact('chude', 'bacsi', 'baiviet', 'binhluan'));
    }

    public function postHoiBacSi(Request $req){
        $this->validate($req,
            [
                'id_nguoiduochoi'=>'required',
                'noidung'=>'required',
                'id_chude'=>'required'
            ],
            [
                'id_nguoiduochoi'=>'Hãy chọn người để hỏi',
                'noidung.required'=>'Nội dung không được để trống',
                'id_chude.required'=>'Hãy chọn chủ đề để hỏi',
            ]);
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
        return redirect()->route('trangchu');
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
                $bacsi->hocvi = $req->hocvi;
                $bacsi->kinhnghiem = $req->kinhnghiem;
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
        $count = count($tintuc);
        return view('pages.tintuc', compact('chude', 'tintuc', 'count'));
    }

    public function getPhanLoaiTinTuc($id_chude){
        $chude = Chude::all();
        $tintuc = Tintuc::orderBy('created_at', 'DESC')->where('id_chude', $id_chude)->paginate(10);
        $count = count($tintuc);
        return view('pages.tintuc', compact('chude', 'tintuc', 'count'));
    }

    public function getTraCuu(){
        $bacsi = Bacsi::all();
        $count = count($bacsi);
        $tintuc = Tintuc::orderBy('created_at', 'DESC')->paginate(4);
        return view('pages.tracuu', compact('tintuc', 'count'));
    }

    public function getDatLichKham(){
        $bacsi = Bacsi::all()->groupBy('khoalamviec');
        return view('pages.datlichkham', compact('bacsi'));
    }

    public function getQuanLyLichKham(){
        return view('quanlylichkham.quanlylichkham');
    }

    public function getDatLich($id){
        $currentbacsi = User::find($id);
        $bacsi = Bacsi::all()->groupBy('khoalamviec')->where('id_user','<>', $id);
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
        if(Auth::check()){
            $thongtinkhambenh->id_nguoigui = Auth::user()->id;
        }
        else{
            $thongtinkhambenh->id_nguoigui = null;
        }

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
        if(Auth::check()){
            $thongtinkhambenh->id_nguoigui = Auth::user()->id;
        }
        else{
            $thongtinkhambenh->id_nguoigui = null;
        }
        $thongtinkhambenh->save();
        return redirect()->back()->with('thanhcong', 'Đặt lịch khám bệnh thành công');
    }

    public function getAjax(){
        $bacsi_id = Input::get('id_bacsi');
        $bacsi = Bacsi::where('id_user', $bacsi_id)->first();
        $avatar = User::where('id', $bacsi_id)->first()->avatar;
        $bacsi['avatar'] = $avatar;
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
            $count = count($thongtinkhambenh); 
        }
        if(Auth::user()->role == 2){
            $thongtinkhambenh = Thongtinkhambenh::orderBy('created_at', 'DESC')->where('id_bacsi', Auth::user()->id)->paginate(10);
            $count = count($thongtinkhambenh); 
        }
        return view('pages.lichkhambenh', compact('thongtinkhambenh', 'count'));
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
                $count = count($thongtinkhambenh);  
            }

            else if($id == 2){
                $thongtinkhambenh = Thongtinkhambenh::orderBy('created_at', 'DESC')->where('trangthai', 2)->where('id_nguoigui', Auth::user()->id)->paginate(10);
                $count = count($thongtinkhambenh);  
            }
            else{
                $thongtinkhambenh = Thongtinkhambenh::orderBy('created_at', 'DESC')->where('trangthai', 3)->where('id_nguoigui', Auth::user()->id)->paginate(10);
                $count = count($thongtinkhambenh); 
            }
        }
        if(Auth::user()->role == 2){
            if($id == 1){
                $thongtinkhambenh = Thongtinkhambenh::orderBy('created_at', 'DESC')->where('trangthai', 1)->where('id_bacsi', Auth::user()->id)->paginate(10);
                $count = count($thongtinkhambenh); 
            }

            else if($id == 2){
                $thongtinkhambenh = Thongtinkhambenh::orderBy('created_at', 'DESC')->where('trangthai', 2)->where('id_bacsi', Auth::user()->id)->paginate(10);
                $count = count($thongtinkhambenh); 
            }
            else{
                $thongtinkhambenh = Thongtinkhambenh::orderBy('created_at', 'DESC')->where('trangthai', 3)->where('id_bacsi', Auth::user()->id)->paginate(10);
                $count = count($thongtinkhambenh);
            }
        }
        return view('pages.lichkhambenh', compact('thongtinkhambenh', 'count'));
    }

    public function getDanhSachBacSi(){
        $chuyenkhoa = Bacsi::all()->groupBy('khoalamviec')->toArray();
        $hocvi = Bacsi::all()->groupBy('hocvi')->toArray();
        $tinh = Tinh::all();
        $count = 0;
        return view('danhsachbacsi.danhsachbacsi', compact('count', 'bacsi', 'chuyenkhoa', 'hocvi', 'tinh'));
    }

    public function loadDanhSachBacSi(Request $request){
        $user_bacsi = new Bacsi();
        $currentPage = $request->currentPage;
        $perPage = $request->perPage;
        // $search = $request->search;
        $params = array(
                'find_chuyenkhoa'  => $request->find_chuyenkhoa,
                'find_hocvi'      => $request->find_hocvi,
                'find_tinh' => $request->find_tinh,
                'searchString' => $request->searchstring,
                'currentPage'  => $request->currentPage,
                'perPage'      => $request->perPage,
            );
        $objResult = $user_bacsi->_getDanhSachBacSi($params);
        $arrResult = $objResult->toArray();
        $data = $arrResult['data'];
        if($data) {
            for($i = 0; $i < count($data); $i++) {
                if($data[$i]['dienthoai'] == null) {
                    $data[$i]['dienthoai'] = "Không có";
                }
            }
        }
        return \Response::JSON(array(
               'Dataloadlist'  => $data,
               'pagination' => (string) $objResult->links('danhsachbacsi.pagination'),
               'perPage' => $perPage,
        ));
    }
}
