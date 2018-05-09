<!DOCTYPE html>
<html>
<head>
    <title>Quản lý lịch khám</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <base href="{{asset('')}}">
    <link rel="stylesheet" type="text/css" href="assets/dest/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-chosen.css">
	<link rel="stylesheet" title="style" href="assets/dest/css/style.css">
	<link rel="stylesheet" title="style" href="assets/dest/css/app.css">
    <link rel="stylesheet" type="text/css" href="assets/dest/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.min.css">
    <link rel="stylesheet" title="style" href="css/bootstrap-select.min.css">
</head>
<body>
@include('header')
	<div class="back-ground-color" style="background-color: #e1e3e6">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10 content1">
				@if($count==0)
					<div class="container contain" style="height: 75vh">
				@else
					<div class="container contain">
				@endif
				<form action="index" method="POST" id="frm_index">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
					<div class="row">
					    <div class="panel panel-default" style="background-color: white">
							<div class="content-body">
								<div class="row" style="height: 20px"></div>
								<div class="row" style="margin-left: 10px">
									<div class="col-md-3 text-left">
					                    <select id="find_tinh" name="find_tinh" class="form-control selectpicker" style="font-size: 18px; height: 37px; padding: 0px 10px" data-live-search="true">
					                    	<option value="" style="font-size: 18px">Tỉnh/Thành phố </option>
					                    	@foreach($tinh as $ti)
				                            	<option value="{{$ti->id}}" style="font-size: 18px">{{$ti->ten}}</option>
				                            @endforeach
				                        </select>
					                </div>
					                <div class="col-md-3 text-left">
					                    <select id="find_chuyenkhoa" name="find_chuyenkhoa" class="form-control selectpicker" style="font-size: 18px; height: 37px; padding: 0px 10px">
					                    	<option value="" style="font-size: 18px">Chuyên khoa -- </option>
				                            	<option value="Da liễu" style="font-size: 18px">Da liễu</option>
				                            	<option value="Nam khoa" style="font-size: 18px">Nam khoa</option>
				                            	<option value="Đa khoa" style="font-size: 18px">Đa khoa</option>
				                            	<option value="Y học cổ truyền" style="font-size: 18px">Y học cổ truyền</option>
				                            	<option value="Nội Cơ Xương Khớp" style="font-size: 18px">Nội Cơ Xương Khớp</option>
				                            	<option value="Thần kinh" style="font-size: 18px">Tâm thần</option>
				                            	<option value="Nội Tiêu hoá - Gan mật" style="font-size: 18px">Nội Tiêu hoá - Gan mật</option>
				                            	<option value="Tai - Mũi - Họng" style="font-size: 18px">Tai - Mũi - Họng</option>
				                            	<option value="Cơ Xương Khớp" style="font-size: 18px">Cơ Xương Khớp</option>
				                        </select>
					                </div>

					               <div class="col-md-3 text-left">
					                    <select id="find_hocvi" name="find_hocvi" class="form-control selectpicker" style="font-size: 18px; height: 37px; padding: 0px 10px">
					                    	<option value="" style="font-size: 18px">Học vị -- </option>
					                    	@foreach($hocvi as $hv => $arr)
				                            	<option value="{{$hv}}" style="font-size: 18px">{{$hv}}</option>
				                            @endforeach
				                        </select>
					                </div>

					                <div class="col-md-3 text-left">
					                    <input name="searchstring" class="form-control input-sm" placeholder="Nhập từ khóa tìm kiếm..." type="text">
					                </div>
								</div>
								<div class="row" style="height: 20px">
								</div>
							</div>
						</div>
					</div>
						<div id="content-list"></div>
						<div class="row" id="pagination" style="background-color: white; height: 50px"></div>
					</div>
				</form>
			</div>
		</div>
	</div>
<script src="assets/dest/js/jquery-3.1.1.js"></script>
<script src="js/jquery-comfirm.js"></script>
<script src="assets/dest/js/bootstrap.min.js"></script>
<script src="js/bootstrap-confirmation.js"></script>
<script src="js/chosen.jquery.min.js"></script>
<script src="js/app.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/shortcut.js"></script>
<script src="js/danhsachbacsi.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        loadIndex();
});
</script>

<style>
	.xuli{
		float: right;
		margin-right: 20px;
	}

    label.title_info {
        /* color: #973226;
        color: rgb(0, 65, 104); */
        font-weight: 600 !important;
    }
    input[type="text"]{
    	font-size: 18px;
    }
	input::-webkit-input-placeholder {
	    font-size: 18px;
	}

	.input-sm{
		padding: 0px 15px;
		font-size: 18px;
	}

	select.input-sm{
		height: 40px;
	}

	.chosen-container{
		font-size: 18px;
	}
	.chosen-container-single .chosen-single{
		height: 37px;
		line-height: 35px;
		padding: 0px 15px
	}

	.list-bacsi{
		background-color: white;
		border: 1px solid black;
	}
	.list-bacsi:hover{
		background-color: #d4ffaa;
	}

	.content-body{
		padding: 10px;
	}

</style>
</body>
</html>