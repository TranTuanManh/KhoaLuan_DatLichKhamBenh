@extends('master')
@section('title-content')
	<title>Tin tức</title>
	<link rel="stylesheet" type="text/css" href="assets/dest/css/tintuc.css">
@endsection

@section('content')
	<div class="back-ground-color">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-1">
				<div class="left-bar">
					<div class="fixnav">
						<ul class="aside-menu aside-group-1">
							<br>
							<b style=" font-size: 20px">Chủ đề bạn theo dõi</b>
							<br>
						</ul>
						<ul class="aside-menu aside-group-2">
							<br>
							<li><a href="#"><i class="fa"><span style="font-size: 20px">Thông tin tài khoản</span></i></a></li>
							<li><a href="#"><i class="fa"><span  style="font-size: 20px">Đổi mật khẩu</span></i></a></li>
							<li><a href="{{route('dangxuat')}}"><i class="fa fa-sign-out"><span style="font-size: 20px">Đăng xuất</span></i></a></li>

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