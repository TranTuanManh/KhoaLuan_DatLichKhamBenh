<!DOCTYPE html>
<html>
<head>
	<title>Giới thiệu</title>
	<base href="{{asset('')}}">
	<link rel="stylesheet" title="style" href="assets/dest/css/signin.css">
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" title="style" href="assets/dest/css/style.css">
	<link rel="stylesheet" title="style" href="assets/dest/css/app.css">

</head>
<body>
	@include('headerLogin')
	<div class="row r1" style="height: 100vh">
		<div class="back-ground">
			<div class="button-login">
				<a href="index.html" id="logo"><img src="assets/dest/images/logo.png" width="200px" alt=""></a><br><br>
				<b>TẤT CẢ VÌ SỨC KHỎE CỦA MỌI NGƯỜI<b>
				<b>SỨC KHỎE CỦA MỌI NGƯỜI LÀ NIỀM VUI CỦA CHÚNG TÔI<b>
				<a href="{{route('dangnhap')}}" class="btn btn-success">Đăng nhập</a>
				<a class="btn btn-primary">Đăng nhập bằng Facebook</a>
			</div>
		</div>
	</div>
</body>
</html>