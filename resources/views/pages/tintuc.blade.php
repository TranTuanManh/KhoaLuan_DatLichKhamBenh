@extends('layout.layouttintuc')
@section('title-content')
<title>Tin Tức</title>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dest/css/tintuc.css') }}">
@endsection

@section('content1')
	<div class="container contain">
		@foreach($tintuc as $tt)
	    <div class="row">
	        <div class="panel panel-default">
				<div class="content-body">
					<div class="row">
						<div class="title">
							<a href="{{$tt->duongdan}}"><b style="font-size: 18px"> {{$tt->tieude}} </b></a><br>
							<i style="font-size: 14px">{{$tt->created_at->format('H:i:s d/m/y')}}</i>
						</div>
					</div>
					<div class="row row1">
						<div class="col-md-2"><a href=""><img src="{{$tt->anhchinh}}" width="150px" height="150px"></a></div>
						<div class="col-md-10">
							<span>
								{{$tt->ychinh}}
							</span><br>
							<a href="{{$tt->duongdan}}" class="btn btn-primary" type="button" name="" style="margin-top: 20px; float: ">>> Xem thêm</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		<div class="row">{{$tintuc->links()}}</div>
	</div>

@endsection