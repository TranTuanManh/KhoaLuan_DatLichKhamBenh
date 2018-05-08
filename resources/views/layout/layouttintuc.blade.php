@extends('master')
@section('title-content')
	<title>Tin tức</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/dest/css/tintuc.css') }}">
@endsection

@section('content')
	<div class="back-ground-color">
		@if($count >3)
			<div class="row">
		@else
			<div class="row" style="height: 76vh">
		@endif
			<div class="col-md-1" style="margin-left: 60px;">
				<div class="left-bar">
					<div class="fixnav">
						<ul class="aside-menu aside-group-1">
							<br>
							<b style=" font-size: 20px">Chủ đề bạn theo dõi</b>
							<br>
						</ul>
						<ul class="aside-menu aside-group-2">
							<br>
							@foreach($chude as $cd)
								<li><a href="{{route('pl_tintuc', $cd->id)}}"><i class="fa"><span style="font-size: 20px">{{$cd->tenchude}}</span></i></a></li>
							@endforeach
						</ul>
				</div>
			</div>
			</div>
			<div class="col-md-9 content1">
				@yield('content1')
			</div>
		</div>
	</div>
@endsection