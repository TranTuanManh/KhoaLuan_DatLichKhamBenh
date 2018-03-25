@extends('master')
@section('title-content')
	<title>Thông tin cá nhân</title>
	<link rel="stylesheet" type="text/css" href="assets/dest/css/thongtintaikhoan.css">
	<script src="assets/dest/js/ajaxupload.js"></script>
@endsection

@section('content')
	<div class="back-ground-color">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2">
				<div class="left-bar">
					<div class="fixnav">
						<ul class="aside-menu aside-group-1" style="width: 150%">
							<br>
							<b style="margin-left: 20px; font-size: 20px">Xin chào,</b>
								<li><a href="#" style="margin-left: 60px; font-size: 20px">{{Auth::user()->hoten}}</a></li>
							<br>
						</ul>
						<ul class="aside-menu aside-group-2" style="width: 150%">
							<br>
							<li><a href="{{route('thongtintaikhoan')}}"><i class="fa fa-question-circle-o"><span style="font-size: 20px">Thông tin tài khoản</span></i></a></li>
							<li><a href="{{route('doimatkhau')}}"><i class="fa fa-gear"><span  style="font-size: 20px">Đổi mật khẩu</span></i></a></li>
							<li><a href="{{route('dangxuat')}}"><i class="fa fa-sign-out"><span  style="font-size: 20px">Đăng xuất</span></i></a></li>

						</ul>
				</div>
			</div>
			</div>
			<div class="col-md-8 content1">
				@yield('content1')
			</div>
		</div>
	</div>
@endsection

