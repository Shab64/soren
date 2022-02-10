<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>adSearch - Login </title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('assets/src/css/vendors_css.css') }}">

	<!-- Style-->
	<link rel="stylesheet" href="{{ asset('assets/src/css/horizontal-menu.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/src/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/src/css/skin_color.css') }}">


</head>
<style>
	@import url("{{url('assets/vendor_components/bootstrap/dist/css/bootstrap.css')}}");
	@import url("{{url('assets/icons/font-awesome/css/font-awesome.css')}}");

	body {
		background-image: linear-gradient(to right, #37d5d6, #36096d);
	}
</style>

<body class="hold-transition theme-primary bg-img">

	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">

			<div class="col-12">
				<div class="row justify-content-center g-0">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="bg-white rounded10 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
								<img style="width: 200px;" src="{{url('assets/images/logo.png')}}" alt="logo">

							</div>
							<div class="p-40">
								<form action="{{ route('employee.check') }}" method="post">
									@csrf
									@if(Session::get('fail'))
									<div class="alert alert-danger">
										{{Session::get('fail')}}
									</div>
									@endif
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="fa fa-user"></i></span>
											<input type="email" name="email" required class="form-control ps-15 bg-transparent" placeholder="Email">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text  bg-transparent"><i class="fa fa-lock"></i></span>
											<input type="password" name="password" required class="form-control ps-15 bg-transparent" placeholder="Password">
										</div>
									</div>
									<div class="row">
										<div class="col-6">
											<div class="checkbox">
												<input type="checkbox" id="basic_checkbox_1">
												<label for="basic_checkbox_1">Remember Me</label>
											</div>
										</div>
										<!-- /.col -->

										<!-- /.col -->
										<div class="col-12">
											<button type="submit" style="padding: 5px 50px;" class="btn btn-primary text-white mt-10">SIGN IN</button>
										</div>
										<!-- /.col -->

										<div class="col-12" style="margin-top: 12px;">
											<div class="checkbox">
												<!-- <input type="checkbox" id="basic_checkbox_1"> -->
												<a href="{{ Route('employee.forgot_password') }}">Forgot Password!</a>
											</div>
										</div>
									</div>
								</form>

							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="{{ asset('assets/src/js/vendors.min.js')}}"></script>
	<script src="{{ asset('assets/src/js/pages/chat-popup.js') }}"></script>
	<script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>

</body>

</html>