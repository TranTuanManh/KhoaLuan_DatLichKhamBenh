@extends('master')
@section('title-content')
	<title>Đặt lịch khám</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/dest/css/datlichkham.css') }}">
@endsection
@section('content')
	<div class="container" style="height:76vh">
		<div id="content">
			<form action="{{route('postdatlich')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}"> 
				<div class="row">@if(Session::has('thanhcong')) <div class="alert alert-success">{{Session::get('thanhcong')}}</div>@endif</div>
				<div class="row">
					<div class="col-sm-6">
						<h4 style="">Thông tin người bệnh</h4><br>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="name">Họ tên<span>*</span></label>
						@if(Auth::check())
						 	<input class="form-control" type="text" id="name" name="name"  value="{{Auth::user()->hoten}}" required>
						@else
							<input class="form-control" type="text" id="name" name="name" placeholder="Họ tên người bệnh" required>
						@endif
						</div><br>
						<div class="form-block">
							<label>Giới tính<span>*</span> </label>
						@if(Auth::check())
							@if(Auth::user()->gioitinh=='Nam')
								<input id="gender" type="radio" class="input-radio" name="gender" value="Nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
								<input id="gender" type="radio" class="input-radio" name="gender" value="Nữ" style="width: 10%"><span>Nữ</span>
							@else
								<input id="gender" type="radio" class="input-radio" name="gender" value="Nam"" style="width: 10%"><span style="margin-right: 10%">Nam</span>
								<input id="gender" type="radio" class="input-radio" name="gender" value="Nữ" checked="checked" style="width: 10%"><span>Nữ</span>
							@endif
						@else
							<input id="gender" type="radio" class="input-radio" name="gender" value="Nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="Nữ" style="width: 10%"><span>Nữ</span>
						@endif

						</div><br>

						<div class="form-block">
							<label for="email">Email<span>*</span></label>
						@if(Auth::check())
							<input class="form-control" type="email" id="email" name="email" required value="{{Auth::user()->email}}">
						@else
							<input class="form-control" type="email" id="email" name="email" required placeholder="Nhập địa chỉ email của bạn">
						@endif
						</div><br>

						<div class="form-block">
							<label for="adress">Địa chỉ<span>*</span></label>
						@if(Auth::check())
							<input class="form-control" type="text" id="address" name="address" value="{{Auth::user()->diachi}}" required>
						@else
							<input class="form-control" type="text" id="address" name="address" placeholder="Nhập địa chỉ của bạn" required>
						@endif
						</div><br>

						<div class="form-block">
							<label for="phone">Điện thoại<span>*</span></label>
						@if(Auth::check())
							<input class="form-control" type="text" id="phone" name="phone" value="{{Auth::user()->sodienthoai}}" required>
						@else
							<input class="form-control" type="text" id="phone" name="phone" required>
						@endif
						</div><br>
						<div class="form-block">
							<label for="phone">Lí do khám bệnh<span>*</span></label>
							<input class="form-control" type="text" id="lido" name="lido" value="" required>
						</div><br>
						<div class="form-block">
							<span style="color: red">Chú ý:
							Bạn cần khai đầy đủ và chính xác các thông tin bên trên để chúng tôi có thể tiện liên lạc lại.</span>
						</div>
						<br>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5 style="color: #0277b8">Đặt lịch khám</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
										<div class="your-order-item">
											<div class="col-md-3">
												<p class="font-large"><b style="font-size: 18px">Hẹn với:</b></p>
											</div>
											<div class="col-md-9">
												<select class="form-control selectpicker" id="thongtinbacsi" name="id_bacsi" data-live-search="true">
													@foreach($bacsi as $bs => $array)
													 	<optgroup label="Khoa {{$bs}}">
														    @foreach($array as $arr)
														    @if($arr->id_user == $currentbacsi->id)
														    	@if($arr->hocvi)
														    		<option selected value="{{$arr->id_user}}">{{$arr->hocvi}} {{$arr->bacsi->hoten}}</option>
														    	@else
														    		<option selected value="{{$arr->id_user}}">Bác sĩ {{$arr->bacsi->hoten}}</option>
														    	@endif
														    @else
														    	@if($arr->hocvi)
														    		<option value="{{$arr->id_user}}">{{$arr->hocvi}} {{$arr->bacsi->hoten}}</option>
														    	@else
														    		<option value="{{$arr->id_user}}">Bác sĩ {{$arr->bacsi->hoten}}</option>
														    	@endif
														    @endif
														   	@endforeach
													  	</optgroup>
													@endforeach
												</select>
											</div>
											<div class="clearfix"></div>
										</div>

										<div class="your-order-item">
											<div class="col-md-3">
												<p class="font-large"><b style="font-size: 18px">Thời gian:</b></p>
											</div>
											<div class="col-md-9">
												<select class="form-control selectpicker" name="time">
													<option value="1">Buổi sáng</option>
													<option value="2">Buổi chiều</option>
												</select>
											</div>
											<div class="clearfix"></div>
										</div>

										<div class="your-order-item">
											<div class="col-md-3">
												<p class="font-large"><b style="font-size: 18px">Ngày hẹn:</b></p>
											</div>
											<div class="col-md-9">
												<input class="form-control" type="date" name="ngayhen" required>
											</div>
											<div class="clearfix"></div>
										</div>

										<div class="your-order-item">
											<div id="avatar-doctor" style="text-align: center">
												<img src="{{$bacsiinfo->bacsi->avatar}}" width="150px">
											</div>
										</div>

										<div class="your-order-item" style="background-color: #e1e3e6">
											<div class="col-md-3">
												<p class="font-large"><b style="font-size: 18px">Địa chỉ:</b></p>
											</div>
											<div class="col-md-9">
												<span id="address-doctor" name="address-doctor">
													<span style="font-size:16px">{{$bacsiinfo->diachi}}</span>
												</span>
											</div>
											<div class="clearfix"></div>
										</div>

										<div class="your-order-item" style="background-color: #e1e3e6">
											<div class="col-md-3">
												<p class="font-large"><b style="font-size: 18px">Khoa:</b></p>
											</div>
											<div class="col-md-9">
												<span id="department">
													<span style="font-size:16px">{{$bacsiinfo->khoalamviec}}</span>
												</span>
											</div>
											<div class="clearfix"></div>
										</div>
							<div class="text-center" style="margin-top: 20px;"><button type="submit" class="btn btn-primary" href="#">Đặt lịch khám <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
