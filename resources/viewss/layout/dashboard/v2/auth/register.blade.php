<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
    <link rel="icon" href="{{asset('public/images/favicon/favicon.ico')}}" type="image/x-icon">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/login/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/login/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('public/login/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/login/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/login/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/login/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>

    <div class="limiter">
		<div class="container-login100" style="background-image: url('public/login/images/img-01.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form" action="{{url('/rstore')}}" method="POST">
					@csrf
					<div class="login100-form-avatar">
						<img src="{{asset('public/images/logo/rsjsh-logo.png')}}" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						RSJSH - Keuangan
					</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Name is required">
						<input class="input100" type="text" name="name" placeholder="name" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Email is required">
						<input class="input100" type="email" name="email" placeholder="email" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button type="submit" class="login100-form-btn">
							Register
						</button>
					</div>

					<div class="text-center w-full p-t-25 p-b-230">
						{{-- <a href="#" class="txt1">
							Forgot Username / Password?
						</a> --}}
					</div>

					<div class="text-center w-full">
						{{-- <a class="txt1" href="#">
							Create new account
							<i class="fa fa-long-arrow-right"></i>						
						</a> --}}
					</div>
				</form>
			</div>
		</div>
	</div>
                                    
<!--===============================================================================================-->	
	<script src="{{asset('public/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('public/login/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('public/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('public/login/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('public/login/js/main.js')}}"></script>

</body>
</html>