<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>REGISTER USER PANEL | CASH WE CAN </title>

	<!-- Global stylesheets -->
    <link rel="shortcut icon" type="image/png" href="{{asset('front/image/favicon.png')}}">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
    <link href="{{asset('user_asset/assets/css/toastr.css')}}" rel="stylesheet" type="text/css">

	<!-- Core JS files -->
	<script src="{{asset('user_asset/global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset('user_asset/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

	<script src="{{asset('user_asset/assets/js/app.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/demo_pages/login.js')}}"></script>
	<!-- /theme JS files -->

</head>

<body class="bg-slate-800">

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login card -->
				<form class="login-form" method="POST" action="{{route('user.register')}}" enctype="multipart/form-data">
                    @csrf
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								{{-- <i class="icon-people icon-2x text-warning-400 border-warning-400 border-3 rounded-round p-3 mb-3 mt-1"></i> --}}
								@if(@$user)
								<h5 class="mb-0">Refer By</h5>
								<a href="#"><img src="{{asset($user->image)}}" width="150" height="150" class="rounded-circle" alt=""></a>
                                <span class="d-block text-muted">{{$user->name}}</span>
                                @endif
								<h5 class="mb-0">Register Yourself</h5>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="text" id="name" class="form-control" value="{{old('name')}}" placeholder="username" name="name" required>
                                <input type="hidden" value="{{$code ?? ''}}" name="code">
                                <div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="text" id="email" class="form-control"  value="{{old('email')}}" placeholder="Enter your email" name="email" required>
								<div class="form-control-feedback">
									<i class="icon-mail5 text-muted"></i>
								</div>
							</div>
							<div class="form-group form-group-feedback form-group-feedback-left">
                                <input id="pwd" minlength="4" class="form-control" value="{{old('password')}}" onkeyup="validatePassword(this.value);" type="password" name="password" placeholder="Enter password" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
                                <span id="msg"></span>
							</div>
							<div class="form-group form-group-feedback form-group-feedback-left">
                                <input id="confirmpwd" minlength="4" class="form-control" value="{{old('confirm_password')}}" onkeyup="confirmPassword(this.value);" type="password" name="confirm_password" placeholder="Enter confirm password" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
                                <span id="confirmmsg"></span>
							</div>
							<div class="form-group form-group-feedback form-group-feedback-left">
                                <input class="form-control" type="file" name="image" placeholder="Enter password" required>
								<div class="form-control-feedback">
									<i class="icon-file-picture text-muted"></i>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" onclick="$('.btn').text('Please Wait!!!').attr('disabled',true)" class="btn btn-primary btn-block">Sign Up <i class="icon-circle-right2 ml-2"></i></button>
							</div>
							<p  class="text-center">OR</p>
							
							<a href="{{route('user.login')}}"><button type="button" class="btn btn-primary btn-block">Sign In <i class="icon-circle-right2 ml-2"></i></button></a>
						</div>
					</div>
				</form>
				<!-- /login card -->

			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
    <script src="{{asset('user_asset/assets/js/toastr.js')}}"></script>
	@toastr_render
    <script>
        function validatePassword(password) {
            
            // Do not show anything when the length of password is zero.
            if (password.length === 0) {
                document.getElementById("msg").innerHTML = "";
                return;
            }
            // Create an array and push all possible values that you want in password
            var matchedCase = new Array();
            matchedCase.push("[$@$!%*#?&]"); // Special Charector
            matchedCase.push("[A-Z]");      // Uppercase Alpabates
            matchedCase.push("[0-9]");      // Numbers
            matchedCase.push("[a-z]");     // Lowercase Alphabates

            // Check the conditions
            var ctr = 0;
            for (var i = 0; i < matchedCase.length; i++) {
                if (new RegExp(matchedCase[i]).test(password)) {
                    ctr++;
                }
            }
            // Display it
            var color = "";
            var strength = "";
            switch (ctr) {
                case 0:
                case 1:
                case 2:
                    strength = "Very Weak";
                    color = "red";
                    break;
                case 3:
                    strength = "Medium";
                    color = "orange";
                    break;
                case 4:
                    strength = "Strong";
                    color = "green";
                    break;
            }
            document.getElementById("msg").innerHTML = strength;
            document.getElementById("msg").style.color = color;
        }
		function confirmPassword(password) {
            
            // Do not show anything when the length of password is zero.
            if (password.length === 0) {
                document.getElementById("confirmmsg").innerHTML = "";
                return;
            }
			// new_password = document.getElementById("pwd").val();
			new_password =  $('#pwd').val();
			if(new_password == password)
			{
				var strength = "Password Matched";
				var color = "green";
			}else{
				var strength = "Password dont Matched";
				var color = "red";
			}

            document.getElementById("confirmmsg").innerHTML = strength;
            document.getElementById("confirmmsg").style.color = color;
        }
    </script>

</body>
</html>
