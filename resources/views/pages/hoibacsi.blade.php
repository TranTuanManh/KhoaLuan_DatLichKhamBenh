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
							<img src="assets/dest/css/avatar.jpg" width="50px">
						</div>
						<div class="col-md-11">
							<li><i class="fa fa-question-circle"><span>Đặt câu hỏi</span></i>
							</li>
						<form id="submit_form" method="post"> 
							<textarea style="height: 100px" placeholder="Bạn muốn hỏi bác sĩ điều gì?"></textarea>
							<select style="width: 20%; height: 30px; font-size: 15px">
								<option>Chọn chủ đề</option>
								@foreach($chude as $cd)
									<option value="{{$cd->id}}" style="color: #4267b2">{{$cd->tenchude}}</option>
								@endforeach
							</select>

							<select style="width: 20%; height: 30px; font-size: 15px">
								<option>Chọn đối tượng hỏi</option>
							</select>
							<div id="image_preview"><img src="" width="200px" id="image" style="margin-left: 0px"></div>
							<div class="form-group">
								<input type="file"  onchange="showImage.call(this)" id="file-upload" style="visibility: hidden;" />
								<input type="button" class="btn btn-primary" value="Ảnh đính kèm" onclick="document.getElementById('file-upload').click()" 
									style="border-radius: 10px; position: absolute; margin-top: -20px; margin-left: 0px" 
								></button>
							</div>
						</form>
						</div>					
					</div>
					<br>

				</ul>
				<ul class="aside-menu aside-group-5">
						<button type="submit" class="btn btn-md pull-right btnn" style="width: 90px">
							Gửi <!---->  <i aria-hidden="true" class="fa fa-send-o"></i></button>
					<li style="width: 100px"></li>
				</ul><br><br><br>
				<ul class="aside-menu aside-group-6">
					<div class="row">
						<div class="col-md-1">
							<img src="assets/dest/css/avatar.jpg" width="50px">
						</div>
						<div class="col-md-11">
							<li><a href="#"><i class="fa fa-user"><span>Mạnh Mạnhh Sama</span></i></a> đã hỏi <a href="#"><b>Phòng khám đa khoa - ABC</b></a>
								<br>
								<div class="ex-infor"><a href="#">15 phút trước<i class="fa fa-circle"></i> Nam <i class="fa fa-circle"></i> 22 tuổi <i class="fa fa-circle"></i> Hải Phòng</a></div>
							</li>
						</div>
					</div>
					<div class="row row2">
						<li> Hoa thân mến,<br><br>
							Tôi là Đô-rê-mon, robot tư vấn sức khỏe. Trong lúc chờ đợi Phòng khám Sản phụ khoa - Bác sĩ Đỗ Thị Ngọc Lan trả lời câu hỏi của bạn, tôi vừa tìm thấy những nội dung sau đây từ kho tàng các câu hỏi đáp và bài viết của ViCare. Bạn đọc thử xem nhé:</li>
					</div>
					<div class="row row3">
						<div class="col-md-12">
						<li class="theme">Chủ đề: <a href="#">Đa khoa</a><a href="#">Trẻ em</a><a href="#">Thần kinh</a></li>
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
					<div class="row">
						<div class="col-md-1">
							<img src="assets/dest/css/avatar.jpg" width="40px">
						</div>				
						<div class="row name">
							<a href="#" style="margin-left: -10px"><b>Đô-rê-mon - robot tư vấn sức khỏe</b></a><br><br>
							<div class="col-md-11 commenting">
								Thu thân mến,
								Tôi là Đô-rê-mon, robot tư vấn sức khỏe. Trong khi đợi các bác sĩ, chuyên gia và thành viên Cộng đồng ViCare trả lời câu hỏi của bạn, tôi vừa tìm thấy những nội dung sau đây từ kho tàng các câu hỏi đáp và bài viết của ViCare. Bạn đọc thử xem nhé:
								<div class="ex-infor2"><a href="#">15 phút trước</a><a href="#"><i class="fa fa-heart-o"></i> Yêu thích</a></div>
							</div>

						</div>
					</div>

					<div class="row">
						<div class="col-md-1">
							<img src="assets/dest/css/avatar.jpg" width="40px">
						</div>				
						<div class="row name">
							<a href="#" style="margin-left: -10px"><b>Đô-rê-mon - robot tư vấn sức khỏe</b></a><br><br>
							<div class="col-md-11 commenting">
								Thu thân mến,
								Tôi là Đô-rê-mon, robot tư vấn sức khỏe. Trong khi đợi các bác sĩ, chuyên gia và thành viên Cộng đồng ViCare trả lời câu hỏi của bạn, tôi vừa tìm thấy những nội dung sau đây từ kho tàng các câu hỏi đáp và bài viết của ViCare. Bạn đọc thử xem nhé:
								<div class="ex-infor2"><a href="#">15 phút trước</a><a href="#"><i class="fa fa-heart-o"></i> Yêu thích</a></div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-1">
							<img src="assets/dest/css/avatar.jpg" width="40px">
						</div>				
						<div class="col-md-11">
							<input type="text" name="comment" placeholder="Viết bình luận của bạn...">
							<button type="submit" id="searchsubmit" onclick="HandleBrowseClick();" style="margin-right: 40px; margin-top: 10px; color: #4c4c4c"></button>
							<input type="file" id="browse" name="fileupload" style="display: none" onChange="Handlechange();"/>
							<input type="hidden" id="filename" readonly="true"/>
						</div>
					</div>
					<br>
				</ul>
				<ul class="aside-menu aside-group-5">
					<li style="width: 100px"></li>
				</ul><br><br>
				<ul class="aside-menu aside-group-6">
					<div class="row">
						<div class="col-md-1">
							<img src="assets/dest/css/avatar.jpg" width="50px">
						</div>
						<div class="col-md-11">
							<li><a href="#"><i class="fa fa-user"><span>Mạnh Mạnhh Sama</span></i></a> đã hỏi <a href="#"><b>Phòng khám đa khoa - ABC</b></a>
								<br>
								<div class="ex-infor"><a href="#">15 phút trước<i class="fa fa-circle"></i> Nam <i class="fa fa-circle"></i> 22 tuổi <i class="fa fa-circle"></i> Hải Phòng</a></div>
							</li>
						</div>
					</div>
					<div class="row row2">
						<li> Hoa thân mến,<br><br>
							Tôi là Đô-rê-mon, robot tư vấn sức khỏe. Trong lúc chờ đợi Phòng khám Sản phụ khoa - Bác sĩ Đỗ Thị Ngọc Lan trả lời câu hỏi của bạn, tôi vừa tìm thấy những nội dung sau đây từ kho tàng các câu hỏi đáp và bài viết của ViCare. Bạn đọc thử xem nhé:</li>
					</div>
					<div class="row row3">
						<div class="col-md-12">
						<li class="theme">Chủ đề: <a href="#">Đa khoa</a><a href="#">Trẻ em</a><a href="#">Thần kinh</a></li>
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
					<div class="row">
						<div class="col-md-1">
							<img src="assets/dest/css/avatar.jpg" width="40px">
						</div>				
						<div class="row name">
							<a href="#" style="margin-left: -10px"><b>Đô-rê-mon - robot tư vấn sức khỏe</b></a><br><br>
							<div class="col-md-11 commenting">
								Thu thân mến,
								Tôi là Đô-rê-mon, robot tư vấn sức khỏe. Trong khi đợi các bác sĩ, chuyên gia và thành viên Cộng đồng ViCare trả lời câu hỏi của bạn, tôi vừa tìm thấy những nội dung sau đây từ kho tàng các câu hỏi đáp và bài viết của ViCare. Bạn đọc thử xem nhé:
								<div class="ex-infor2"><a href="#">21 phút trước</a><a href="#"><i class="fa fa-heart-o"></i> Yêu thích</a></div>
							</div>

						</div>
					</div>

					<div class="row">
						<div class="col-md-1">
							<img src="assets/dest/css/avatar.jpg" width="40px">
						</div>				
						<div class="row name">
							<a href="#" style="margin-left: -10px"><b>Đô-rê-mon - robot tư vấn sức khỏe</b></a><br><br>
							<div class="col-md-11 commenting">
								Thu thân mến,
								Tôi là Đô-rê-mon, robot tư vấn sức khỏe. Trong khi đợi các bác sĩ, chuyên gia và thành viên Cộng đồng ViCare trả lời câu hỏi của bạn, tôi vừa tìm thấy những nội dung sau đây từ kho tàng các câu hỏi đáp và bài viết của ViCare. Bạn đọc thử xem nhé:
								<div class="ex-infor2"><a href="#">21 phút trước</a><a href="#"><i class="fa fa-heart-o"></i> Yêu thích</a></div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-1">
							<img src="assets/dest/css/avatar.jpg" width="40px">
						</div>				
						<div class="col-md-11">
							<input type="text" name="comment" placeholder="Viết bình luận của bạn...">
							<button type="submit" id="searchsubmit" onclick="HandleBrowseClick();" style="margin-right: 40px; margin-top: 10px; color: #4c4c4c"></button>
							<input type="file" id="browse" name="fileupload" style="display: none" onChange="Handlechange();"/>
							<input type="hidden" id="filename" readonly="true"/>
						</div>
					</div>
					<br>
				</ul>

				<ul class="aside-menu aside-group-5">
					<li style="width: 100px"></li>
				</ul><br><br>
				
				<ul class="aside-menu aside-group-6">
					<div class="row">
						<div class="col-md-1">
							<img src="assets/dest/css/avatar.jpg" width="50px">
						</div>
						<div class="col-md-11">
							<li><a href="#"><i class="fa fa-user"><span>Mạnh Mạnhh Sama</span></i></a> đã hỏi <a href="#"><b>Phòng khám đa khoa - ABC</b></a>
								<br>
								<div class="ex-infor"><a href="#">15 phút trước<i class="fa fa-circle"></i> Nam <i class="fa fa-circle"></i> 22 tuổi <i class="fa fa-circle"></i> Hải Phòng</a></div>
							</li>
						</div>
					</div>
					<div class="row row2">
						<li> Hoa thân mến,<br><br>
							Tôi là Đô-rê-mon, robot tư vấn sức khỏe. Trong lúc chờ đợi Phòng khám Sản phụ khoa - Bác sĩ Đỗ Thị Ngọc Lan trả lời câu hỏi của bạn, tôi vừa tìm thấy những nội dung sau đây từ kho tàng các câu hỏi đáp và bài viết của ViCare. Bạn đọc thử xem nhé:</li>
					</div>
					<div class="row row3">
						<div class="col-md-12">
						<li class="theme">Chủ đề: <a href="#">Đa khoa</a><a href="#">Trẻ em</a><a href="#">Thần kinh</a></li>
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
					<div class="row">
						<div class="col-md-1">
							<img src="assets/dest/css/avatar.jpg" width="40px">
						</div>				
						<div class="row name">
							<a href="#" style="margin-left: -10px"><b>Đô-rê-mon - robot tư vấn sức khỏe</b></a><br><br>
							<div class="col-md-11 commenting">
								Thu thân mến,
								Tôi là Đô-rê-mon, robot tư vấn sức khỏe. Trong khi đợi các bác sĩ, chuyên gia và thành viên Cộng đồng ViCare trả lời câu hỏi của bạn, tôi vừa tìm thấy những nội dung sau đây từ kho tàng các câu hỏi đáp và bài viết của ViCare. Bạn đọc thử xem nhé:
								<div class="ex-infor2"><a href="#">21 phút trước</a><a href="#"><i class="fa fa-heart-o"></i> Yêu thích</a></div>
							</div>

						</div>
					</div>

					<div class="row">
						<div class="col-md-1">
							<img src="assets/dest/css/avatar.jpg" width="40px">
						</div>				
						<div class="row name">
							<a href="#" style="margin-left: -10px"><b>Đô-rê-mon - robot tư vấn sức khỏe</b></a><br><br>
							<div class="col-md-11 commenting">
								Thu thân mến,
								Tôi là Đô-rê-mon, robot tư vấn sức khỏe. Trong khi đợi các bác sĩ, chuyên gia và thành viên Cộng đồng ViCare trả lời câu hỏi của bạn, tôi vừa tìm thấy những nội dung sau đây từ kho tàng các câu hỏi đáp và bài viết của ViCare. Bạn đọc thử xem nhé:
								<div class="ex-infor2"><a href="#">21 phút trước</a><a href="#"><i class="fa fa-heart-o"></i> Yêu thích</a></div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-1">
							<img src="assets/dest/css/avatar.jpg" width="40px">
						</div>				
						<div class="col-md-11">
							<input type="text" name="comment" placeholder="Viết bình luận của bạn...">
							<button type="submit" id="searchsubmit" onclick="HandleBrowseClick();" style="margin-right: 40px; margin-top: 10px; color: #4c4c4c"></button>
							<input type="file" id="browse" name="fileupload" style="display: none" onChange="Handlechange();"/>
							<input type="hidden" id="filename" readonly="true"/>
						</div>
					</div>
					<br>
				</ul>

				<ul class="aside-menu aside-group-5">
					<li style="width: 100px"></li>
				</ul><br><br>
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

		$('#button-upload').click(function(){
   			 $('#file-upload').click();
		});
	</script>
@endsection

