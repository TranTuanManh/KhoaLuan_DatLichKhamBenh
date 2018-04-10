<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@yield('title-content')
	<base href="{{asset('')}}">
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" title="style" href="assets/dest/css/style.css">
	<link rel="stylesheet" title="style" href="assets/dest/css/app.css">
</head>
<body>

	@include('header')
	<div class="rev-slider">
		@yield('content')
	</div>

	@include('footer')
	<div class="copyright">
		<div class="container">
			<p class="pull-left">Privacy policy. (&copy;) 2017</p>
			<p class="pull-right pay-options">
			</p>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .copyright -->


	<!-- include js files -->
	<script src="assets/dest/js/jquery.js"></script>
	<script src="assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<!--customjs-->
	<script src="assets/dest/js/custom2.js"></script>
	<script>
	$(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav');
			}else{
				$(".header-bottom").removeClass('fixNav');
			}}
		)

		$("#btn-edit").click(function () {
      		$('#myModal').modal('show');
      	});

      	$('#thongtinbacsi').change(function(){
      		id_bacsi = $(this).val();
      		$.get('/ajax-subinfor?id_bacsi=' + id_bacsi, function(data){
      			$.each(data, function(index, object){
      				if(index == 'diachi'){
      					var $html = '';
      					$html += '<span style="font-size:16px">' + object + '</span>';
      					$('#address-doctor').empty();
      					$('#address-doctor').html($html);	
      				}

      				if(index == 'khoalamviec'){
      					var $html = '';
      					$html += '<span style="font-size:16px">' + object + '</span>';
      					$('#department').html($html);	
      				}
      			});
      		});
      	});
	});
	</script>
</body>
</html>
