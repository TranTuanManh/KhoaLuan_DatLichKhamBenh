<!DOCTYPE html>
<html>
<head>
	<title>Đăng kí</title>
	<base href="{{asset('')}}">
	<link rel="stylesheet" title="style" href="assets/dest/css/signin.css">
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" title="style" href="assets/dest/css/style.css">
	<link rel="stylesheet" title="style" href="assets/dest/css/app.css">

</head>
<body>
	@include('headerLogin')
	<div class="back-ground">
		<div class="form-area">
			<h3 class="form-title">Tạo mới tài khoản</h3>
			<form action="{{route('dangki')}}" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<p>Email</p>
				<input type="text" name="email" placeholder="Nhập email của bạn">
				<p>Họ và tên</p>
				<input type="text" name="hoten" placeholder="Nhập tên của bạn">
				<div>
					<p>Loại tài khoản</p>
						<select class="" id="select" name="role">
							<option value="">
								Chọn loại tài khoản
							</option>
							<option value="1">Người dùng</option>
							<option value="2">Bác sĩ</option>
						</select>
				</div><br>
				<p>Mật khẩu</p>
				<input type="password" name="password" placeholder="Nhập mật khẩu của bạn">
				<p>Nhập lại mật khẩu</p>
				<input type="password" name="password" placeholder="Nhập lại mật khẩu">
				<input type="submit" name="submit" value="Đăng kí">
				<a href="{{route('dangnhap')}}">Đã có tài khoản? Đăng nhập ngay</a>
			</form>
		</div>
	</div>
</body>
</html>