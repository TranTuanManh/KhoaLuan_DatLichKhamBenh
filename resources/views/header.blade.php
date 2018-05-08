	<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> 144 Xuân Thủy, Cầu Giấy, Hà Nội</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 0121 585 9237</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					@if(Auth::check())
					<div class="dropdown">
  						<button class="dropbtn"><img src="{{Auth::user()->avatar}}" width="35px"><span>{{Auth::user()->hoten}}</span></button>
  						<div class="dropdown-content">
					    	<a href="{{route('thongtintaikhoan')}}"><i class="fa fa-question-circle-o" style="color: #666666"></i>Thông tin tài khoản</a>
					    	<a href="{{route('doimatkhau')}}"><i class="fa fa-gear" style="color: #666666"></i>Đổi mật khẩu</a>
					    	<a href="{{route('dangxuat')}}"><i class="fa fa-sign-out" style="color: #666666"></i>Đăng xuất</a>
					  </div>
					</div>
  					@else
  						<ul class="top-menu menu-beta l-inline">
							<li><a href="{{route('dangnhap')}}" class="btn" style="font-size: 16px; color: #4267b2"><i class="fa fa-sign-in" style="color: #4267b2"></i>Đăng nhập ngay</a></li>
						</ul>
  					@endif
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="index.html" id="logo"><img src="assets/dest/images/logo.png" width="70px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="/">
					        <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit" style="color: #4c4c4c;"></button>
						</form>
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li>
							<a href="{{route('trangchu')}}">
								<i class="fa fa-home"></i>
								<span>Trang chủ</span>
							</a>
						</li>
						<li>
							<a href="{{route('tintuc')}}">
								<i class="fa fa-newspaper-o"></i>
								<span>Tin tức</span>
							</a>
						</li>
						@if(Auth::check())
						<li>
							<a href="{{route('hoibacsi')}}">
								<i class="fa fa-question-circle"></i>
								<span>Hỏi bác sĩ</span>
							</a>
						</li>
						@endif
						<li>
							<a href="{{route('tracuu')}}">
								<i class="fa fa-search"></i>
								<span>Tra cứu</span>
							</a>
						</li>
						@if(Auth::check())
						<li>
							<a href="{{route('lichkhambenh')}}">
								<i class="fa fa-envelope-o"></i>
								<span>Lịch khám bệnh</span>
								<span class="span-mail">{{$count}}</span>
							</a>
						</li>
						@endif
						@if(Auth::check())
							@if(Auth::user()->role == 1)
							<li>
								<a href="{{route('datlichkham')}}">
									<i class="fa fa-tint"></i>
									<span>Đặt lịch khám</span>
								</a>
							</li>
							@else
							<li>
								<a href="{{route('quanlylichkham')}}">
									<i class="fa fa-calendar"></i>
									<span>Quản lí lịch khám</span>
									<span class="span-mail">{{$count}}</span>
								</a>
							</li>
							@endif
						@else
							<li>
								<a href="{{route('datlichkham')}}">
									<i class="fa fa-tint"></i>
									<span>Đặt lịch khám</span>
								</a>
							</li>
						@endif
					</ul>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->