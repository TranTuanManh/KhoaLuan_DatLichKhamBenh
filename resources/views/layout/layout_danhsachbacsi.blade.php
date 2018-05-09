@extends('master')
@section('title-content')
	<title>Lịch khám bệnh</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/dest/css/tintuc.css') }}">
@endsection

@section('content')
	<div class="back-ground-color">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10 content1">
				@yield('content1')<br><br>
			</div>
		</div>
	</div>
@endsection