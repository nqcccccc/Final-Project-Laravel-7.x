<!DOCTYPE html>
	<head>
		<title>Trang quản lý Admin Web</title>
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('public/frontend/images/logo-mini.png')}}">
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
		<link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
		<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
		<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet"> 
		<script src="js/jquery2.0.3.min.js"></script>
	</head>
	<body>
		<div class="log-w3">
		<div class="w3layouts-main">
			<h2>Đăng nhập</h2>
			<?php
			$message = Session::get('message');
			if($message){
				echo '<span class="text-alert">'.$message.'</span>';
				Session::put('message',null);
			}
			?>
				<form action="{{URL::to('/admin-dashboard')}}" method="post">
					{{ csrf_field() }}
					@foreach($errors->all() as $val)
					<ul>
						<li>{{$val}}</li>
					</ul>
					@endforeach
					<input type="text"  class="ggg" name="admin_email" placeholder="Điền email" >
					<input type="password" class="ggg" name="admin_password" placeholder="Điền password" >

					<h6><a href="#">Quên mật khẩu</a></h6>
						<div class="clearfix"></div>
						<input type="submit" value="Đăng nhập" name="login">
				</form>
		</div>
		</div>
		<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
		<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
		<script src="{{asset('public/backend/js/scripts.js')}}"></script>
		<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
		<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
		<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
	</body>
</html>
