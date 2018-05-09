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
</head>
<body>
@include('header')
<div class="rev-slider" style="margin-left: 30px; margin-right: 30px">
	<form action="index" method="POST" id="frm_index">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<section class="content-wrapper" style="font-size: 18px">
	    <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-calendar" style="color: #777"></i></a></li>
	        <li class="active">Quản lí lịch khám bệnh</li>
	    </ol>
	    <br>
	    <div class="panel panel-default">
	        <div class="panel-body">
	            <div class="form-horizontal">
	                <div class="row form-group">
	                    <div class="col-md-4">
	                        <div class="row ">
	                            <br><label class="control-label col-md-3">Ngày hẹn</label>
	                            <div class="col-md-8 text-left">
	                                <select id="find_ngayhen" name="find_ngayhen" class="form-control chzn-select" message="">
                                    	<option value="1" style="font-size: 18px">Tất cả lịch hẹn</option>
                                    	<option value="2" style="font-size: 18px">Lịch hẹn trong ngày</option>
                                    	<option value="3" style="font-size: 18px">Lịch hẹn hết hạn</option>
                                	</select>
	                            </div>
	                        </div>
	                    </div>
	                </div>

	                <div class="row form-group">
	                    <div class="col-md-4">
	                        <div class="row ">
	                            <br><label class="control-label col-md-3">Trạng thái</label>
	                            <div class="col-md-8 text-left">
	                                <select id="find_trangthai" name="find_trangthai" class="form-control chzn-select" message="">
	                                	<option value="0" style="font-size: 18px">Tất cả</option>
                                    	<option value="2" style="font-size: 18px">Đang chờ xử lí</option>
                                    	<option value="3" style="font-size: 18px">Đã hủy</option>
                                    	<option value="1" style="font-size: 18px">Đã chấp nhận</option>
                                	</select>
	                            </div>
	                        </div>
	                    </div>

	                    <div class="col-md-4">
	                        <div class="row ">
	                            <br><label class="control-label col-md-3">Tìm kiếm</label>
	                           	<div class="col-md-8 text-right">
	                                <input name="search_string" class="form-control input-sm" placeholder="Nhập từ khóa tìm kiếm..." type="text">
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="row form-group input-group-index">
	                <div class="pull-left">
	                </div><br>
	                <div class="pull-right">
	                    <button class="btn btn-primary btn-flat" id="btn_add" type="button" data-toggle="tooltip"  data-original-title="Thêm lịch khám"><i class="fa fa-plus" style="width: 30px; height: 30px; font-size: 30px"></i></button>
	                    <button class="btn btn-success btn-flat" id="btn_edit" type="button" data-toggle="tooltip"  data-original-title="Sửa lịch khám"><i class="fa fa-pencil" style="width: 30px; height: 30px; font-size: 30px"></i></button>

	                    <button class="btn btn-danger" id="btn_delete" type="button" data-toggle="confirmation" data-btn-ok-label="Xóa" data-btn-ok-icon="" data-btn-ok-class="btn-danger" data-btn-cancel-label="Hủy bỏ" data-btn-cancel-icon="" data-btn-cancel-class="btn-default" data-placement="left" data-original-title="Bạn có chắc chắn muốn xóa không?"><i class="fa fa-trash-o" style="width: 30px; height: 30px; font-size: 30px"></i></button>
	                    </button>
	                </div>
	            </div>
	            <!-- Màn hình bảng làm việc -->
	            <div class="row" id="table-container"></div>
	            <div id="table-list"></div>
	            <!-- Màn hình danh sách -->
	            <div class="row" id="table-container"></div>
	                <table class="table table-striped table-bordered dataTable no-footer" align="center" id="table-data">
	                    <col width="5%">
	                    <col width="5%">
	                    <col width="15%">
	                    <col width="5%">
	                    <col width="15%">
	                    <col width="8%">
	                    <col width="20%">
	                    <col width="12%">
	                    <col width="8%">
	                    <col width="12%">
	                    <thead class="thead-inverse" style="background-color: #ddd">
	                    <tr class="header" style="">
	                    <td style="text-align: center;"><b><input name="chk_all_item_id" onclick="checkbox_all_item_id(document.forms[0].chk_item_id);" type="checkbox"></b></td>
	                        <td style="text-align: center;"><b>STT</b></td>
	                        <td style="text-align: center;"><b>Tên bệnh nhân</b></td>
	                        <td style="text-align: center;"><b>Giới tính</b></td>
	                        <td style="text-align: center;"><b>Địa chỉ</b></td>
	                        <td style="text-align: center;"><b>Số điện thoại</b></td>
	                        <td style="text-align: center;"><b>Lí do khám bệnh</b></td>
	                        <td style="text-align: center;"><b>Thời gian</b></td>
	                        <td style="text-align: center;"><b>Ngày hẹn</b></td>
	                        <td style="text-align: center;"><b>Trạng thái</b></td>
	                    </tr>
	                    </thead>
	                    <tbody></tbody>
	                </table>
	            <!-- Phân trang dữ liệu -->
	            <div class="row" id="pagination"></div>
	        </div>
	    </div>
	</section>
	</form>
	<!-- Hien thi modal -->
	<div class="modal fade" id="addModal" role="dialog" data-backdrop="static" data-keyboard="false">
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
<script src="js/quanlylichkham.js"></script>
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

</style>
</body>
</html>