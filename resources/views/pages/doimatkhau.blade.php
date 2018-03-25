@extends('layout.layout')

@section('content1')
<div class="container contain">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading" id="content-header"><b>Đổi mật khẩu</b></div>

                <div class="panel-body doimatkhau" id="content" style="padding: 30px; margin-top: 30px">
                    <form action="{{route('doimatkhau')}}" method="post">
                     <input type="hidden" name="_token" value="{{csrf_token()}}"> 
                        <b>Mật khẩu cũ</b>
                        <input class="form-control" type="password" name="old_password" placeholder="Nhập mật khẩu cũ">
                        <b>Mật khẩu mới</b>
                        <input class="form-control" type="password" name="new_password" placeholder="Nhập mật khẩu mới">
                        <b>Nhập lại mật khẩu mới</b>
                        <input class="form-control" type="password" name="confirm_password" placeholder="Nhập lại mật khẩu">
                        <input class="btn btn-primary" type="submit" name="submit" value="Đổi mật khẩu">
                    </form>
                </div>
            </div>
          </div>
        </div>
</div>
@endsection