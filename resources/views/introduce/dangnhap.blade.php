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
			<h3 class="form-title">Hệ thống đặt lịch khám bệnh</h3>
			<form action="{{route('login')}}" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}"> 
				<p>Email</p>
				<input type="text" name="email" placeholder="Nhập email của bạn">
				<p>Mật khẩu</p>
				<input type="password" name="password" placeholder="Nhập mật khẩu của bạn">
				<input type="submit" name="submit" value="Đăng nhập">
				<a href="#">Quên mật khẩu?</a><br><br>
				<a href="{{route('dangki')}}">Chưa có tài khoản? Đăng kí ngay!</a>
			</form>
		</div>
	</div>
</body>
</html>