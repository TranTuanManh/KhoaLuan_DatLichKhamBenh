@extends('master')
@section('title-content')
	<title>Trang chủ</title>
	<style type="text/css">
		.single-item a:hover{
			color: #00bfbf;
		}
	</style>
@endsection

@section('content')
<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
								<ul>
								@foreach($slide as $sl)
									<!-- THE FIRST SLIDE -->
									<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						            	<div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
											<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="images/slide/{{$sl->image}}" data-src="images/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('images/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
											</div>
										</div>
									</li>
								@endforeach
								</ul>
							</div>
						</div>

						<div class="tp-bannertimer"></div>
					</div>
    </div>

	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<b style="font-size: 25px">Bác sĩ uy tín</b>
							<div class="beta-products-details">
								<br>
								<div class="clearfix"></div>
							</div>

							<div class="row">
							@foreach($bacsi as $bs)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('datlich', $bs->id)}}"><img src="{{$bs->avatar}}" alt="" width="270px" height="320px"></a>
										</div>
										<div class="single-item-body">
											<a href="{{route('datlich', $bs->id)}}"></a><p class="single-item-title" style="font-size: 18px;"><i class="fa fa-graduation-cap" style="color: black"></i>Bác sĩ <b style="color: #00a2a2">{{$bs->hoten}}</b></p>
										</div>
										<div class="single-item-body" style="margin-top: 10px;">
											<p class="single-item-title" style="font-size: 18px;"><i class="fa fa-stethoscope" style="color: black"></i>Khoa: <b style="color: #00a2a2">{{$bs->bacsi->khoalamviec}}</b></p>
										</div>
										<div class="single-item-body" style="margin-top: 10px;">
											<p class="single-item-title" style="font-size: 18px;"><i class="fa fa-hospital-o" style="color: black"></i>Nơi công tác: <b style="color: #00a2a2">{{$bs->bacsi->diachi}}</b></p>
										</div>
										<div class="single-item-caption">
											<a style="font-size: 18px" class="btn btn-primary" href="{{route('datlich', $bs->id)}}">Đặt lịch hẹn ngay <i class="fa fa-chevron-right"></i></a>
										</div>

									</div>
								</div>
							@endforeach
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<b style="font-size: 25px">Cơ sở y tế</b>
							<div class="beta-products-details">
								<br>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="product.html"><img src="assets/dest/images/products/1.jpg" alt=""></a>
										</div>
										<div class="single-item-body">
											<a href="product.html"><p class="single-item-title" style="font-size: 16px">Đang cập nhât...</p></a>
										</div>

									</div>
								</div>
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="product.html"><img src="assets/dest/images/products/1.jpg" alt=""></a>
										</div>
										<div class="single-item-body">
											<a href="product.html"><p class="single-item-title" style="font-size: 16px">Đang cập nhât...</p></a>
										</div>

									</div>
								</div>
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="product.html"><img src="assets/dest/images/products/1.jpg" alt=""></a>
										</div>
										<div class="single-item-body">
											<a href="product.html"><p class="single-item-title" style="font-size: 16px">Đang cập nhât...</p></a>
										</div>

									</div>
								</div>
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="product.html"><img src="assets/dest/images/products/1.jpg" alt=""></a>
										</div>
										<div class="single-item-body">
											<a href="product.html"><p class="single-item-title" style="font-size: 16px">Đang cập nhât...</p></a>
										</div>

									</div>
								</div>
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<b style="font-size: 25px">TIN TỨC MỚI NHẤT</b>
							<div class="beta-products-details">
								<br>
								<div class="clearfix"></div>
							</div>

							<div class="row">
							@foreach($tintuc as $tt)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{$tt->duongdan}}"><img src="{{$tt->anhchinh}}" height="320" width="270"></a>
										</div>
										<div class="single-item-body">
											<a href="{{$tt->duongdan}}"><b class="single-item-title" style="font-size: 16px">{{$tt->tieude}}</b></a>
										</div>

									</div>
								</div>
							@endforeach
							</div>
						</div>
					</div>
				</div>


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> 
@endsection
