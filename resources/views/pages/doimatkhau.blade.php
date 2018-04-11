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
                     @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}
                            @endforeach
                    </div>
                    @endif
                    @if(Session::has('thanhcong'))
                        <div class="alert alert-success" style="font-size: 18px">{{Session::get('thanhcong')}}</div>
                    @endif
                    @if(Session::has('thatbai'))
                        <div class="alert alert-danger" style="font-size: 18px">{{Session::get('thatbai')}}</div>
                    @endif
                        <b>Mật khẩu cũ</b>
                        <input class="form-control" type="password" name="old_password" placeholder="Nhập mật khẩu cũ">
                        <b>Mật khẩu mới</b>
                        <input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu mới">
                        <b>Nhập lại mật khẩu mới</b>
                        <input class="form-control" type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu">
                        <input class="btn btn-primary" type="submit" name="submit" value="Đổi mật khẩu">
                    </form>
                </div>
            </div>
          </div>
        </div>
</div>
@endsection