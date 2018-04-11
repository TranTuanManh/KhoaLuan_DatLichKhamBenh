@extends('master')
@section('title-content')
	<title>Đặt lịch khám</title>
	<link rel="stylesheet" type="text/css" href="assets/dest/css/datlichkham.css">
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
							@if(Auth::user()->gioitinh=='nam')
								<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
								<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
							@else
								<input id="gender" type="radio" class="input-radio" name="gender" value="nam"" style="width: 10%"><span style="margin-right: 10%">Nam</span>
								<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" checked="checked" style="width: 10%"><span>Nữ</span>
							@endif
						@else
							<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
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
											<div class="form-block">
												<p class="font-large"><b style="font-size: 18px">Hẹn với:</b></p>
													<select class="form-control" id="thongtinbacsi" style="margin-left: 60px;" name="id_bacsi">
														<option value="{{$currentbacsi->id}}">{{$currentbacsi->hoten}}</option>
														@foreach($bacsi as $bs)
															<option value="{{$bs->id}}">{{$bs->hoten}}</option>
														@endforeach
													</select>											
											</div>
											<div class="clearfix"></div>
										</div>

										<div class="your-order-item">
											<div class="form-block">
												<p class="font-large"><b style="font-size: 18px">Thời gian:</b></p>
													<select class="form-control" style="margin-left: 50px;" name="time">
														<option value="1">Buổi sáng</option>
														<option value="2">Buổi chiều</option>
													</select>											
											</div>
											<div class="clearfix"></div>
										</div>

										<div class="your-order-item">
											<div class="form-block">
												<p class="font-large"><b style="font-size: 18px">Ngày hẹn:</b></p>
												<input class="form-control" type="date" name="ngayhen" style="margin-left: 50px;" required>		
											</div>
											<div class="clearfix"></div>
										</div>

										<div class="your-order-item" style="background-color: #e1e3e6">
											<div class="form-block">
												<p class="font-large"><b style="font-size: 18px">Địa chỉ:</b></p>
												<span style="margin-left: 75px;" id="address-doctor" name="address-doctor">
													<span style="font-size:16px">{{$bacsiinfo->diachi}}</span>
												</span>	
											</div>
											<div class="clearfix"></div>
										</div>

										<div class="your-order-item" style="background-color: #e1e3e6">
											<div class="form-block">
												<p class="font-large"><b style="font-size: 18px">Khoa:</b></p>
												<span style="margin-left: 95px;" id="department">
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
