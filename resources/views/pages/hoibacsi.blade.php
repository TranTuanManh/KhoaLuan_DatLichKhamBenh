@extends('master')
@section('title-content')
	<title>Hỏi bác sĩ</title>
	<link rel="stylesheet" type="text/css" href="assets/dest/css/hoibacsi.css">
	<script src="assets/dest/js/ajaxupload.js"></script>
@endsection

@section('content')
	<div class="back-ground-color">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2">
				<div class="left-bar">
					<div class="fixnav">
						<ul class="aside-menu aside-group-1">
							<br>
							<b>Chủ đề đang theo dõi</b>
								<li><span>Xin chào</span><a href="#">{{Auth::user()->hoten}}</a></li>
							<br>
						</ul>
						<ul class="aside-menu aside-group-2">
							<br>
							<li><a href="#"><i class="fa fa-bookmark-o"><span>Đã tham gia</span></i></a></li>
							<li><a href="#"><i class="fa fa-user"><span>Người tôi theo dõi</span></i></a></li>
							<li><a href="#"><i class="fa fa-globe"><span>Toàn cộng đồng</span></i></a></li>
							<li><a href="#"><i class="fa fa-comment"><span>Chưa trả lời</span></i></a></li>
						</ul>
						<ul class="aside-menu aside-group-3">
							<br>
							<b>Có thể bạn quan tâm</b>
							<br>
							@foreach($chude as $cd)
							<li><a href="#">{{$cd->tenchude}}</a>
								<i class="fa fa-user">
									@if($cd->luotheodoi > 1000)
										{{$cd->luottheodoi}}
									@else
										{{number_format($cd->luottheodoi/1000)}}k
									@endif
								</i></li>
							@endforeach
							<br>
						</ul>
				</div>
			</div>
			</div>
			<div class="col-md-6 content1">
				<ul class="aside-menu aside-group-4">
					<div class="row">
						<div class="col-md-1">
							<img src="{{Auth::user()->avatar}}" width="50px">
						</div>
						<div class="col-md-11">
							<li><i class="fa fa-question-circle"><span>Đặt câu hỏi</span></i>
							</li>
					<form action="{{route('hoibacsi')}}" id="submit_form" method="post" enctype="multipart/form-data"> 
						<input type="hidden" name="_token" value="{{csrf_token()}}"> 
							<textarea style="height: 100px" placeholder="Bạn muốn hỏi bác sĩ điều gì?" name="noidung" wrap="physical"></textarea>
							<select class="selectpicker" name="id_chude">
								<option>Chọn chủ đề</option>
								@foreach($chude as $cd)
									<option value="{{$cd->id}}" style="color: #4267b2">{{$cd->tenchude}}</option>
								@endforeach
							</select>

							<select class="selectpicker" style=" font-size: 18px" name="id_nguoiduochoi" data-live-search="true">
								<option>Chọn bác sĩ để hỏi</option>
									@foreach($bacsi as $bs => $array)
										<optgroup label="Khoa {{$bs}}">
										@foreach($array as $arr)
											@if($arr->hocvi)
												<option value="{{$arr->id_user}}">{{$arr->hocvi}} {{$arr->bacsi->hoten}}</option>
											@else
												<option value="{{$arr->id_user}}">Bác sĩ {{$arr->bacsi->hoten}}</option>
											@endif
										@endforeach
										</optgroup>
									@endforeach
							</select>
							<div id="image_preview">
								<img src="" width="200px" id="image" name="image" style="margin-left: 0px; border: 1px solid #e1e3e6">
							</div>
							<div class="form-group">
								<input type="file"  onchange="showImage.call(this)" id="file-upload" name="file" style="visibility: hidden;" />
								<input type="button" class="btn btn-primary" id="button-upload" value="Ảnh đính kèm" name="file_upload" onclick="document.getElementById('file-upload').click()" 
									style="border-radius: 10px; position: absolute; margin-top: -20px; margin-left: 0px" />
							</div>
						</div>
					</div>
					<br>
				</ul>
						<ul class="aside-menu aside-group-5">
							<button type="submit" class="btn btn-md pull-right btnn" style="width: 90px">
								Gửi <!---->  <i aria-hidden="true" class="fa fa-send-o"></i></button>
							<li style="width: 100px"></li>
						</ul><br><br><br>
					</form>
			@foreach($baiviet as $bv)
				<ul class="aside-menu aside-group-6">
					<div class="row">
						<div class="col-md-1">
							<img src="{{$bv->nguoihoi->avatar}}" width="50px">
						</div>
						<div class="col-md-11">
							<li><a href="#"><i class="fa fa-user"><span>{{$bv->nguoihoi->hoten}}</span></i></a> đã hỏi<a href="#"><b>Bác sĩ {{$bv->nguoiduochoi->hoten}}</b></a>
								<br>
								<div class="ex-infor"><a href="#">{{ $bv->created_at->diffForHumans() }}</a></div>
							</li>
						</div>
					</div>
					<div class="row row2">
						<li>{!! nl2br($bv->noidung) !!}<li>
						<img src="{{$bv->url_anh}}">
					</div>
					<div class="row row3">
						<div class="col-md-12">
						<li class="theme">Chủ đề: <a href="#">{{$bv->chude->tenchude}}</a></li>
						</div>	
					</div>	
					<div class="row row4">
						<div class="col-md-12">
						<div class="row">
							<div class="col-md-2">
								<li><a href=""><i class="fa fa-heart-o"><span>Yêu thích</span></i></a></li>
							</div>	
							<div class="col-md-2">
								<li><a href=""><i class="fa fa-comment-o"><span>Trả lời</span></i></a></li>
							</div>	
							<div class="col-md-2">
								<li><a href=""><i class="fa fa-share"><span>Chia sẻ</span></i></a></li>
							</div>
						</div>
						</div>	
					</div>	
				</ul>	
								<ul class="aside-menu aside-group-7">
					<li><div class="row row5">
						<div class="col-md-1"></div>
						<div class="col-md-3" style="font-size: 14px"><i class="fa fa-share"><span>Đã có 0 lượt chia sẻ.</span></i></div>
					</div></li>
				@foreach($binhluan as $bl)
					@if($bl->id_baiviet == $bv->id)
						<div class="row">
	                        <div class="col-md-1">
	                            <img src="{{ $bl->nguoibinhluan->avatar }}" width="40px">
	                        </div>
	                        <div class="row name">
	                            <a href="#" style="margin-left: -10px"><b>{{$bl->nguoibinhluan->hoten }}</b></a><br><br>
	                            <div class="col-md-11 commenting">
	                                {{$bl->noidung}}
	                                <div class="ex-infor2"><a href="#">{{ $bl->created_at->diffForHumans()}} </a><a href="#"><i class="fa fa-heart-o"></i> Yêu thích</a></div>
	                            </div>

	                        </div>
	                    </div>
					@endif
				@endforeach
				<span class="display_comment{{$bv->id}}"></span>
					<div class="row">
						<div class="col-md-1">
							<img src="{{Auth::user()->avatar}}" width="40px">
						</div>				
						<div class="col-md-11">
							<form action="{{route('comment')}}" class="submitform{{$bv->id}}" method="post"> 
								<input type="hidden" name="_token" value="{{csrf_token()}}"> 
								<input type="hidden" name="id_baiviet" value="{{$bv->id}}">
								<input type="text" id="commentid" onclick="myfunction({{$bv->id}});" name="comment_content" placeholder="Viết bình luận của bạn..." autocomplete="off">
								<input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;" tabindex="-1" id="submit" />
							</form>
						</div>
					</div>
					<br>
				</ul>
				<ul class="aside-menu aside-group-5">
					<li style="width: 100px"></li>
				</ul><br><br>
			@endforeach
			<div class="row">{{$baiviet->links()}}</div>
			</div>
		</div>
	</div>
	<script>
		var textarea = document.querySelector('textarea');
		textarea.addEventListener('keydown', autosize);

		function autosize(){
  			var el = this;
  			setTimeout(function(){
    			el.style.cssText = 'height:100px; padding:5';
    			el.style.cssText = 'height:' + el.scrollHeight + 'px';
  			},0);
		}

		function showImage(){
			if(this.files && this.files[0]){
				var obj = new FileReader();
				obj.onload = function(data){
					var image = document.getElementById("image");
					image.src = data.target.result;
					image.style.display = "block";
				}
				obj.readAsDataURL(this.files[0]);
			}
		}

			function myfunction(id){
				$('.submitform' + id).on('submit', function (event) {
	            event.preventDefault();
	            var form_data = $(this).serialize();
	            $.ajax({
	                url: 'comment',
	                method: "POST",
	                datatype: 'json',
	                data: form_data,
	                //id: $("input[name='id_baiviet']").val(),
	                success:function(data){
	                	if(data.error != ''){
	                		$('.submitform' + id)[0].reset();
	                		}
	                	}

	            	});
	            load_comment(id);return;
	        	}); 
			}

			function load_comment(id){
				$.ajax({
					url: 'loadcomment',
					method: 'GET',
					success:function(data){
						$('.display_comment' + id).append(data);
					}
				});
			}

</script>
@endsection

