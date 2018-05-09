@extends('master')
@section('title-content')
<link rel="stylesheet" type="text/css" href="assets/dest/css/tracuu.css">
<title>Tra cứu thông tin</title>
@endsection

@section('content')
<div class="row">
			<div class="col-xs-10 col-md-8 col-md-offset-2">
				<div class="row">
					<div class="col-xs-6 col-sm-4 text-center">
						<a href="{{route('danhsachbacsi')}}">
						<div class="bg-white grid-item">
							<div class="item-content">
								<i class="fa fa-user-md" aria-hidden="true"></i><br>
								<span>{{$count}}</span>
								<h4>Bác sĩ</h4>
							</div>
						</div>
						</a>
					</div>

					<div class="col-xs-6 col-sm-4 text-center">
						<a href="https://vicare.vn/danh-sach/bac-si/">
						<div class="bg-white grid-item">
							<div class="item-content">
								<i class="fa fa-hospital-o" aria-hidden="true"></i><br>
								<span>200</span>
								<h4>Cơ sở y tế</h4>
							</div>
						</div>
						</a>
					</div>

					<div class="col-xs-6 col-sm-4 text-center">
						<a href="https://vicare.vn/danh-sach/bac-si/">
						<div class="bg-white grid-item">
							<div class="item-content">
								<i class="fa fa-bed" aria-hidden="true"></i><br>
								<span>563</span>
								<h4>Các loại bệnh</h4>
							</div>
						</div>
						</a>
					</div>

					<div class="col-xs-6 col-sm-4 text-center">
						<a href="https://vicare.vn/danh-sach/bac-si/">
						<div class="bg-white grid-item">
							<div class="item-content">
								<i class="fa fa-user-md" aria-hidden="true"></i><br>
								<span>0</span>
								<h4>Đang cập nhật...</h4>
							</div>						
						</div>
						</a>
					</div>

					<div class="col-xs-6 col-sm-4 text-center">
						<a href="https://vicare.vn/danh-sach/bac-si/">
						<div class="bg-white grid-item">
							<div class="item-content">
								<i class="fa fa-user-md" aria-hidden="true"></i><br>
								<span>0</span>
								<h4>Đang cập nhật...</h4>
							</div>						
						</div>
						</a>
					</div>

					<div class="col-xs-6 col-sm-4 text-center">
						<a href="https://vicare.vn/danh-sach/bac-si/">
						<div class="bg-white grid-item">
							<div class="item-content">
								<i class="fa fa-user-md" aria-hidden="true"></i><br>
								<span>0</span>
								<h4>Đang cập nhật...</h4>
							</div>						
						</div>
						</a>
					</div>

					<div class="col-xs-11">
						<div class="bg-white full-item">
							<div class="item-header col-xs-12">
								<i class="fa fa-newspaper-o" aria-hidden="true"></i>
								<b>BÀI VIẾT - TIN TỨC</b>
							</div>

							<div class="item-body">
								<ul class="list-unstyled">
								@foreach($tintuc as $tt)
									<li class="col-xs-6 col-md-3">
										<a href="{{$tt->duongdan}}"><img src="{{$tt->anhchinh}}" width="270px" height="320px"></a>

										<b><a href="{{$tt->duongdan}}">{{$tt->tieude}}</a></b>
									</li>
								@endforeach					
								</ul>

								<div class="col-xs-12">
									<a href="{{route('tintuc')}}" class="view-more" style="float: right; font-size: 18px; margin-bottom: 20px; margin-top: 20px; color: #007fff"><b>Xem thêm</b></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection