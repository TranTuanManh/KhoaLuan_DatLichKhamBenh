<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@yield('title-content')
	<base href="{{asset('')}}">
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="assets/dest/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" title="style" href="assets/dest/css/app.css">
	<link rel="stylesheet" title="style" href="css/bootstrap-select.min.css">
	<link rel="stylesheet" href="assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" title="style" href="assets/dest/css/style.css">
</head>
<body>

	@include('header')
	<div class="rev-slider">
		@yield('content')
	</div>

	@include('footer')


	<!-- include js files -->
	<script src="assets/dest/js/jquery-3.1.1.js"></script>
	<script src="assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="assets/dest/js/bootstrap.min.js"></script>
	<script src="js/chosen.jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="assets/dest/rs-plugin/js/jquery.themepunch.revolution.js"></script>
	<script src="assets/dest/js/wow.min.js"></script>
	<script src="assets/dest/js/custom2.js"></script>
	<script>
		$.ajaxSetup({
  			headers: {
    			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  			}
		});
	</script>
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
      		var data = '';
      		data += '&id_bacsi=' + id_bacsi;
      		$.ajax({
      			url: "/ajax-subinfor",
      			type: "POST",
      			dataType: "JSON",
      			data: data,
      			success: function(arrResult){
      				$('#address-doctor').empty();
      				$('#avatar-doctor').empty();
      				$('#department').empty();
	      				if(arrResult['diachi']){
	      					var $html = '';
	      					$html += '<span style="font-size:16px">' + arrResult['diachi'] + '</span>';
	      					$('#address-doctor').html($html);
	      				}

	      				if(arrResult['avatar']){
	      					var $html = '';
	      					$html += '<img src="' + arrResult['avatar'] + '" width="150px">';
	      					$('#avatar-doctor').html($html);
	      				}

	      				if(arrResult['khoalamviec']){
	      					var $html = '';
	      					$html += '<span style="font-size:16px">' + arrResult['khoalamviec'] + '</span>';
	      					$('#department').html($html);
	      			}
      			}
      		});
		});
	});
	</script>
</body>
</html>
