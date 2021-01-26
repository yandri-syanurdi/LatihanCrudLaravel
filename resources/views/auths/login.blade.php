<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <!-- <title>Login | Klorofil - Free Bootstrap Dashboard Template</title> -->
    <title>Login | YPI Raudhatul Jannah</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('admin/assets/img/favicon.png')}}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<!-- <div class="logo text-center"><img src="{{asset('admin/assets/img/logo-dark.png')}}" alt="Klorofil Logo"></div> -->
								<div class="logo text-center"><img src="{{asset('admin/logo.png')}}" alt="Klorofil Logo" width="150px" height="100px"></div>
								<p class="lead">Login to your account</p>
							</div>
                            <!-- <form class="form-auth-small" action="/postlogin" method="POST"> -->
                            <form class="form-auth-small" action="{{ URL::to('/postlogin') }}" method="POST">
                                {{csrf_field()}}
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input name="email" type="email" class="form-control" id="signin-email" placeholder="Email">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input name="password" type="password" class="form-control" id="signin-password" placeholder="Password">
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Remember me</span>
									</label>
								</div>
								
								<div class="form-group">
								<div class="container">
									<div class="form-group row">
										<div class="form-group col-md-3">
											<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
											<div class="bottom">
												<!-- <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span> -->
												<span class="helper-text"></i> <button type="submit" class="btn btn-primary btn-lg btn-block"><a href="{{ URL::to('/register') }}">REGISTER</a></button></span>
												<br>
											</div>
										</div>
										<div class="form-group col-md-3">
											<img src="{{url('assets/qrku.jpg')}}" style="max-width:100%; max-height:100%;">
                    						<br>
                    						<h6 class="atas">Cek Verifikasi Pembayaran</h6>
										</div>
									</div>
								</div>
								</div>
								
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<!-- <h1 class="heading">TURBO (Tunarungu Belajar Online)</h1>
							<p>Dibuat Oleh : Yandri Syanurdi</p> -->
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
