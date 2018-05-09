@extends('layout.layout')

@section('content1')
<div class="container contain">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading" id="content-header"><b>Thông tin tài khoản</b><button class="btn btn-link" id="btn-edit" style="color: blue; font-size: 18px; margin-right: 20px;"><u>Sửa thông tin</u></button></div>
                @if(Session::has('thanhcong'))
                  <div class="alert alert-success" style="font-size: 18px">{{Session::get('thanhcong')}}</div>
                @endif
                <div class="panel-body" id="content">

                  <div class="row">
                    <div class="column">
                      <div class="col-md-2">
                        <div class="row">
                          <img style="margin-left: 30px; border: 1px solid #e1e3e6" src="assets/dest/css/avatar.jpg" >
                        </div>
                        <div class="row">
                          <input style="margin-left: 50px; visibility: hidden; position: absolute;" type="file" name="">
                          <button class="btn btn-primary" style="margin-left: 55px; margin-top: 10px; font-size: 16px">Thay đổi ảnh</button>
                        </div>
                      </div>
                    </div>

                    <div class="column">
                      <div class="col-md-6" style="margin-left: 50px; font-size: 20px;">
                        <div class="row" style="margin-bottom: 35px"><b>Họ và tên</b>: <i>{{Auth::user()->hoten}}</i></div>
                        <div class="row" style="margin-bottom: 35px"><b>Giới tính</b>: <i>
                          @if(Auth::user()->gioitinh)
                            {{Auth::user()->gioitinh}}
                          @else
                            Chưa cung cấp
                          @endif
                        </i></div>
                        <div class="row" style="margin-bottom: 35px"><b>Email</b>: <i>{{Auth::user()->email}}</i></div>
                        <div class="row" style="margin-bottom: 35px"><b>Ngày sinh</b>: <i>
                          @if(Auth::user()->ngaysinh)
                            {{date('d-m-Y', strtotime(Auth::user()->ngaysinh))}}
                          @else
                            Chưa cung cấp
                          @endif
                        </i></div>
                        <div class="row" style="margin-bottom: 35px"><b>Số điện thoại</b>: <i>
                          @if(Auth::user()->dienthoai)
                            {{Auth::user()->dienthoai}}
                          @else
                            Chưa cung cấp
                          @endif
                        </i></div>
                      @if(Auth::user()->role == 2)
                        <div class="row" style="margin-bottom: 35px"><b>Học vị</b>: <i>
                          @if(Auth::user()->bacsi->hocvi)
                            {{Auth::user()->bacsi->hocvi}}
                          @else
                            Chưa cung cấp
                          @endif
                        </i></div>
                        <div class="row" style="margin-bottom: 35px"><b>Kinh nghiệm</b>: <i style="line-height: 1.6;">
                          @if(Auth::user()->bacsi->kinhnghiem)
                            {{Auth::user()->bacsi->kinhnghiem}}
                          @else
                            Chưa cung cấp
                          @endif
                        </i></div>
                        <div class="row" style="margin-bottom: 35px"><b>Địa chỉ làm việc</b>: <i style="line-height: 1.6;">
                          @if(Auth::user()->bacsi->diachi)
                            {{Auth::user()->bacsi->diachi}}
                          @else
                            Chưa cung cấp
                          @endif
                        </i></div>
                        <div class="row" style="margin-bottom: 35px"><b>Chuyên khoa</b>: <i>
                          @if(Auth::user()->bacsi->khoalamviec)
                            {{Auth::user()->bacsi->khoalamviec}}
                          @else
                            Chưa cung cấp
                          @endif
                        </i></div>
                      @endif
                        <div class="row" style="margin-bottom: 35px"><b>Tỉnh Thành</b>: <i>
                          @if(Auth::user()->tinh)
                            {{$usertinh->ten}}
                          @else
                            Chưa cung cấp
                          @endif
                        </i></div>
                        <div class="row" style="margin-bottom: 35px"><b>Loại tài khoản</b>:
                        @if(Auth::user()->role == 1)
                          <i>Bệnh nhân</i>
                        @else
                          <i>Bác sĩ</i>
                        @endif
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
</div>
      <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" style="color: #428bca">Sửa thông tin cá nhân</h4>
          </div>
        <div class="modal-body">
        <form action="{{route('thongtintaikhoan')}}" method="post" name="frmSinhVien" class="form-horizontal">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Họ và tên</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="hoten" name="hoten" value="{{Auth::user()->hoten}}" />
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Giới tính</label>
            <div class="col-sm-9">
              <select class="form-control" name="gioitinh">
                @if(Auth::user()->gioitinh == "Nữ")
                  <option value="Nữ">Nữ</option>
                  <option value="Nam">Nam</option>
                @else
                  <option value="Nam">Nam</option>
                  <option value="Nữ">Nữ</option>
                @endif
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}" />
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Ngày sinh</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" id="date" name="ngaysinh" value="{{date('d-m-Y', strtotime(Auth::user()->ngaysinh))}}" />
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Số điện thoại</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="dienthoai" value="{{Auth::user()->dienthoai}}" />
            </div>
          </div>
          @if(Auth::user()->role == 2)
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Học vị</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="hocvi" value="{{Auth::user()->bacsi->hocvi}}" />
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Kinh nghiệm</label>
              <div class="col-sm-9">
                <textarea type="text" class="form-control" name="kinhnghiem" rows="3">{{Auth::user()->bacsi->kinhnghiem}}</textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Địa chỉ</label>
              <div class="col-sm-9">
                <textarea type="text" class="form-control" name="diachi" rows="3">{{Auth::user()->bacsi->diachi}}</textarea>
              </div>
            </div>
            <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Khoa làm việc</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="khoalamviec" value="{{Auth::user()->bacsi->khoalamviec}}" />
            </div>
          </div>
          @endif

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Tỉnh Thành</label>
            <div class="col-sm-9">
              <select class="form-control selectpicker" name="tinh" data-live-search="true" data-dropup-auto="false">
                @if(Auth::user()->tinh)
                  <option value="{{$usertinh->id}}">{{$usertinh->ten}}</option>
                @endif
                  @foreach($tinh as $ti)
                    <option value="{{$ti->id}}">{{$ti->ten}}</option>
                  @endforeach
              </select>
            </div>
          </div>
            <div class="modal-footer">
              <button id='btn_save' class="btn btn-primary btn-flat" type="submit"><i class="fa fa-save"> Lưu</i></button>
              <button type="input" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"> Thoát</i></button>
            </div>   
        </form>
        </div>
      </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  </div>
@endsection