@extends('layout.layout_lichkhambenh')
@section('title-content')
<title>Danh sách lịch khám</title>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dest/css/tintuc.css') }}">
<style type="text/css">
	.xuli{
		float: right;
		margin-right: 20px;
	}
</style>
@endsection

@section('content1')
@if(Auth::user()->role == 2)
	<div class="container contain">
		@foreach($thongtinkhambenh as $thongtin)
	    <div class="row">
	    	@if($thongtin->trangthai == 2)
	        	<div class="panel panel-default" style="background-color: #00bfbf">
	        @else
	        	<div class="panel panel-default" style="background-color: white">
	        @endif
				<div class="content-body">
					<div class="row">
						<div class="title">
							<b style="font-size: 18px"> {{$thongtin->hotenbenhnhan}} muốn đặt lịch hẹn khám bệnh</b><br>
							<i style="font-size: 14px">{{$thongtin->created_at->format('H:i:s d/m/y')}}</i>
						</div>
					</div>
					<div class="row row1">
						<div class="col-md-2">
						<a>
							@if($thongtin->gioitinh == "nữ")
								<img src="images/nguoidung/nu.png" width="150px" height="150px">
							@else
								<img src="images/nguoidung/nam.png" width="150px" height="150px">
							@endif
						</a>
					</div>
						<div class="col-md-10">
							<span>
								<b>{{$thongtin->hotenbenhnhan}}</b> muốn đặt lịch khám bệnh vào 
									<b>@if($thongtin->thoigian == 1) 
										buổi sáng
									@else
										buổi chiều
									@endif
								ngày {{date('d-m-Y', strtotime($thongtin->ngayhen))}}</b><br><br>
								Lý do: <b>{{$thongtin->lido}}</b>
							</span><br>
							@if($thongtin->trangthai == 2)					
							<a href="{{route('huy', $thongtin->id)}}" class="btn btn-danger xuli" type="button" name="" style="margin-top: 70px; "><i class="fa fa-close"></i> 
								Hủy lịch hẹn
							</a>
							<a href="{{route('chapnhan', $thongtin->id)}}" class="btn btn-success xuli" type="button" name="" style="margin-top: 70px; "><i class="fa fa-check"></i>
								Xác nhận lịch hẹn
							</a>
							@elseif($thongtin->trangthai == 1)
								<a class="btn btn-success xuli" type="button" name="" style="margin-top: 70px;"><i class="fa fa-check-square-o"></i> 
								Đã được chấp nhận
								</a>
							@else
								<a class="btn btn-danger xuli" type="button" name="" style="margin-top: 70px;"><i class="fa fa-close"></i> 
								Đã bị hủy
								</a>
							@endif
						</div>	
					</div>
				</div>
			</div>
		</div>	
		@endforeach	
		<div class="row">{{$thongtinkhambenh->links()}}</div>
	</div>
@else
	<div class="container contain">
		@foreach($thongtinkhambenh as $thongtin)
	    <div class="row">
	    	@if($thongtin->trangthai == 2)
	        	<div class="panel panel-default" style="background-color: #00bfbf">
	        @elseif($thongtin->trangthai == 1)
	        	<div class="panel panel-default" style="background-color: white">
	        @else
	        	<div class="panel panel-default" style="background-color: #ffaad4">
	        @endif
				<div class="content-body">
					<div class="row">
						<div class="title">
							<span style="font-size: 18px"> Bạn đã đặt lịch hẹn khám bệnh với <b>bác sĩ {{$thongtin->bacsi_lichkham->bacsi->hoten}}</b></span><br>
							<i style="font-size: 14px">{{$thongtin->created_at->format('H:i:s d/m/y')}}</i>
						</div>
					</div>
					<div class="row row1">
						<div class="col-md-2">
						<a>
							@if($thongtin->gioitinh == "nữ")
								<img src="images/nguoidung/nu.png" width="150px" height="150px">
							@else
								<img src="images/nguoidung/nam.png" width="150px" height="150px">
							@endif
						</a>
					</div>
						<div class="col-md-10">
							<span>
								Bạn muốn đặt lịch khám bệnh vào 
									<b>@if($thongtin->thoigian == 1) 
										buổi sáng
									@else
										buổi chiều
									@endif
								ngày {{date('d-m-Y', strtotime($thongtin->ngayhen))}}</b><br><br>
								Lý do: <b>{{$thongtin->lido}}</b>
							</span><br>
							@if($thongtin->trangthai == 2)					
							<a class="btn btn-primary xuli" type="button" name="" style="margin-top: 70px; "><i class="fa fa-refresh"></i>
								Đang chờ xử lí
							</a>
							@elseif($thongtin->trangthai == 1)
								<a class="btn btn-success xuli" type="button" name="" style="margin-top: 70px;"><i class="fa fa-check-square-o"></i> 
								Đã được chấp nhận
								</a>
							@else
								<a class="btn btn-danger xuli" type="button" name="" style="margin-top: 70px;"><i class="fa fa-close"></i>
								Đã bị hủy
								</a>
							@endif
						</div>	
					</div>
				</div>
			</div>
		</div>	
		@endforeach	
	</div>
	<div class="row">{{$thongtinkhambenh->links()}}</div>
@endif
@endsection