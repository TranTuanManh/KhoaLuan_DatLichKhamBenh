<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập</title>
	<base href="{{asset('')}}">
	<link rel="stylesheet" title="style" href="assets/dest/css/login.css">
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" title="style" href="assets/dest/css/style.css">
	<link rel="stylesheet" title="style" href="assets/dest/css/app.css">
</head>
<body>
	@include('headerLogin')
	<div class="back-ground">
		<div class="form-area">
			<h3 class="form-title">Hệ thống quản lí lịch khám bác sĩ</h3>
			<form action="{{route('dangnhap')}}" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}"> 
				@if(count($errors)>0)
					<div class="alert alert-danger" style="font-size: 18px">
						@foreach($errors->all() as $err)
							{{$err}}
						@endforeach
					</div>
				@endif
				@if(Session::has('danger'))
					<div class="alert alert-danger" style="font-size: 18px">{{Session::get('danger')}}</div>
				@endif
				@if(Session::has('thanhcong'))
					<div class="alert alert-success" style="font-size: 18px">{{Session::get('thanhcong')}}</div>
				@endif
				<p>Email</p>
				<input type="text" name="email" placeholder="Nhập email của bạn" required>
				<p>Mật khẩu</p>
				<input type="password" name="password" placeholder="Nhập mật khẩu của bạn" required>
				<input type="submit" name="submit" value="Đăng nhập">
				<a href="#">Quên mật khẩu?</a><br><br>
				<a href="{{route('dangki')}}">Chưa có tài khoản? Đăng kí ngay!</a>
			</form>
		</div>
	</div>
</body>
</html>