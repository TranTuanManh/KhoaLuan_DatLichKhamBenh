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
					<ul class="top-details menu-beta l-inline">
						<li style="width: 250px">
							<a href="#">
								<img src="assets/dest/css/avatar.jpg" width="40px" style="position: absolute;"></img>
								<b style="font-size: 18px; margin-left: 50px">{{Auth::user()->hoten}} </b>
							</a>
						</li>
						<li>
							<a href="{{route('dangxuat')}}" style="font-size: 18px; ">
								<i class="fa fa-sign-out"></i>
								<span>Đăng xuất</span>
							</a>
						</li>
					</ul>
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
								<i class="fa fa-book"></i>
								<span>Bản tin</span>
							</a>
						</li>
						<li>
							<a href="{{route('hoibacsi')}}">
								<i class="fa fa-question-circle"></i>
								<span>Hỏi bác sĩ</span>
							</a>
						</li>
						<li>
							<a href="index.html">
								<i class="fa fa-search"></i>
								<span>Tra cứu</span>
							</a>
						</li>
						<li>
							<a href="index.html">
								<i class="fa fa-envelope-o"></i>
								<span>Tin nhắn</span>
								<span class="span-mail">10</span>
							</a>
						</li>
						<li>
							<a href="index.html">
								<i class="fa fa-tint"></i>
								<span>Xét nghiệm</span>
							</a>
						</li>
					</ul>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->