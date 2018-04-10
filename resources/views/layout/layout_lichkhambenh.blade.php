@extends('master')
@section('title-content')
	<title>Lịch khám bệnh</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/dest/css/tintuc.css') }}">
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
							<b style=" font-size: 20px">Phân loại lịch khám</b>
							<br>
						</ul>
						<ul class="aside-menu aside-group-2">
							<br>
							<li><a href="{{route('lichkhambenh')}}"><i class="fa fa-globe" style="color: gray"><span style="font-size: 20px; color: gray">Tất cả lịch khám</span></i></a></li>
							<li><a href="{{route('pllichkhambenh', 2)}}"><i class="fa fa-refresh" style="color: #428bca"><span style="font-size: 20px; color: #428bca">Đang chờ xử lí</span></i></a></li>
							<li><a href="{{route('pllichkhambenh', 1)}}"><i class="fa fa-check-square-o" style="color: #5cb85c"><span style="font-size: 20px; color: #5cb85c">Đã chấp nhận</span></i></a></li>
							<li><a href="{{route('pllichkhambenh', 3)}}"><i class="fa fa-close" style="color: red"><span style="font-size: 20px; color: red">Đã hủy</span></i></a></li>
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