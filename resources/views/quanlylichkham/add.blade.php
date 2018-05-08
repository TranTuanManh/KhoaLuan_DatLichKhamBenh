<form id="frmAddStudent" role="form" action="" method="POST" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input class="form-control" name="id" type="hidden" value="">
<div class="modal-dialog modal-lg full-modal">
	  <!-- Modal content-->
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  	@if($arrLichKham)
		  		<h4 class="modal-title">Sửa lịch khám</h4>
		  	@else
		  		<h4 class="modal-title">Thêm lịch khám</h4>
		  	@endif

		</div>
		<div class="modal-body">
			<div class="main-tab">
		    	<!-- Tab panes -->
		        <!-- Tab panes -->
		    		<!-- Thong tin co ban cua nguoi dung -->
			        <div role="tabpanel" class="tab-pane active" id="infor">
				    	<div class="row form-group">
				    		<label class="col-md-3 control-label required">Tên bệnh nhân:</label>
				    		<div class="col-md-8">
				    		@if($arrLichKham)
				    			<input class="form-control input-lg" type="text" id="hotenbenhnhan" name="hotenbenhnhan" value="{{$arrLichKham['hotenbenhnhan']}}">
				    		@else
				    			<input class="form-control input-lg" type="text" id="hotenbenhnhan" name="hotenbenhnhan" value="">
				    		@endif
				    		</div>
				    	</div>

				    	<div class="row form-group">
				    		<label class="col-md-3 control-label required">Giới tính:</label>
				    		<div class="col-md-8">
				    			<label class="radio-inline"><input type="radio" name="gioitinh" value="Nam" @if($arrLichKham['gioitinh']=='Nam') checked @endif>Nam</label>
		              			<label class="radio-inline"><input type="radio" name="gioitinh" value="Nữ" @if($arrLichKham['gioitinh']=='Nữ') checked @endif>Nữ</label>
				    		</div>
				    	</div><br>

				    	<div class="row form-group">
				    		<label class="col-md-3 control-label">Email:</label>
				    		<div class="col-md-8">
				    		@if($arrLichKham)
				    			<input class="form-control input-lg" type="text" id="email" name="email" value="{{$arrLichKham['email']}}"></input>
				    		@else
				    			<input class="form-control input-lg" type="text" id="email" name="email" value=""></input>
				    		@endif
				    		</div>
				    	</div><br>

				    	<div class="row form-group">
				    		<label class="col-md-3 control-label required">Địa chỉ:</label>
				    		<div class="col-md-8">
				    		@if($arrLichKham)
				    			<input class="form-control input-lg" type="text" id="diachi" name="diachi" value="{{$arrLichKham['diachi']}}">
				    		@else
				    			<input class="form-control input-lg" type="text" id="diachi" name="diachi" value="">
				    		@endif
				    		</div>
				    	</div><br>

				    	<div class="row form-group">
				    		<label class="col-md-3 control-label required">Số điện thoại:</label>
				    		<div class="col-md-8">
				    		@if($arrLichKham)
				    			<input class="form-control input-lg" type="text" id="dienthoai" name="dienthoai" value="{{$arrLichKham['dienthoai']}}"></input>
				    		@else
				    			<input class="form-control input-lg" type="text" id="dienthoai" name="dienthoai" value=""></input>
				    		@endif
				    		</div>
				    	</div><br>

				    	<div class="row form-group">
				    		<label class="col-md-3 control-label required">Lí do khám bệnh:</label>
				    		<div class="col-md-8">
				    		@if($arrLichKham)
				    			<input class="form-control input-lg" type="text" id="lido" name="lido" value="{{$arrLichKham['lido']}}">
				    		@else
				    			<input class="form-control input-lg" type="text" id="lido" name="lido" value="">
				    		@endif
				    		</div>
				    	</div><br>

				    	<div class="row form-group">
				    		<label class="col-md-3 control-label required">Thời gian:</label>
				    		<div class="col-md-8">
				                <select id="thoigian" name="thoigian" class="form-control chzn-select input-sm" message="">
	                                <option value="1">Buổi sáng</option>
	                                <option value="2">Buổi chiều</option>
	                            </select>
				    		</div>
				    	</div><br>

				    	<div class="row form-group">
				    		<label class="col-md-3 control-label required">Ngày hẹn:</label>
				    		<div class="col-md-8">
				    		@if($arrLichKham)
				    			<input class="form-control input-lg" type="date" id="ngayhen" name="ngayhen" value="{{$arrLichKham['ngayhen']}}"></input>
				    		@else
				    			<input class="form-control input-lg" type="date" id="ngayhen" name="ngayhen" value=""></input>
				    		@endif
				    		</div>
				    	</div><br>

				    	<div class="row form-group">
				    		<label class="col-md-3 control-label">Trạng thái:</label>
				    		<div class="col-md-8">
			                <select id="trangthai" name="trangthai" class="form-control chzn-select input-sm" message="">
			                	<option value="2" @if($arrLichKham['trangthai']=='2') selected @endif>Đang chờ xử lí</option>
                                <option value="1" @if($arrLichKham['trangthai']=='1') selected @endif>Đã chấp nhận</option>
                                <option value="3" @if($arrLichKham['trangthai']=='3') selected @endif>Đã hủy</option>
                            </select>
                        	</div>
			            </div><br>
			            <div class="row form-group">
			            <label class="col-md-8 control-label" style="color: red">Lưu ý: những mục đánh dấu (*) bắt buộc phải điền</label>
			        	</div>
				</div>
			</div>
		</div>
	<div class="modal-footer">
		<button id='btn_update' class="btn btn-primary btn-flat" type="button"><i class="fa fa-save" style="width: 80px; height: 25px; font-size: 20px"> Ghi</i></button>
		<button id='btn_save' class="btn btn-primary btn-flat" type="button"><i class="fa fa-save" style="width: 80px; height: 25px; font-size: 20px"> Lưu</i></button>
		<button type="input" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove" style="width: 80px; height: 25px; font-size: 20px"> Thoát</i></button>
	 </div>
  </div>
</div>
</form>
<style>
.radio-container label.error{
	float: right;
}
</style>
<script>
	function checkallper(obj, name) {
        if (obj.checked) {
            $('input[name="' + name + '"]').prop('checked', true);
        } else {
            $('input[name="' + name + '"]').prop('checked', false);
        }
    }
</script>