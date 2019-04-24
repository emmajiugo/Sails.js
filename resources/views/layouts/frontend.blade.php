<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>EngineHosting</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.5">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
	<!-- Framework Css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/lib/bootstrap.min.css') }}">
	<!-- Font Awesome / Icon Fonts -->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/lib/font-awesome.min.css') }}">
	<!-- Owl Carousel / Carousel- Slider -->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/lib/owl.carousel.min.css') }}">
	<!-- Animations -->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/lib/animations.min.css') }}">
	<!-- Style Theme -->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css') }}">
	<!-- Responsive Theme -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/responsive.css') }}">
    
</head>

<body class="
<?php
// set the class based on routes
if ( Request::is('contact') ) {
    echo 'contact';
} elseif ( Request::is('pricing') ) {
    echo 'service-page';
} elseif ( Request::is('login') || Request::is('school/login') || Request::is('register') || Request::is('school/register') ) {
    echo 'login-page';
}
?>
"> <!---body open tag -->

<div class="wrapper">

<!--===================== Header ========================-->
<header class="{{ Request::is('login') || Request::is('school/login') || Request::is('register') || Request::is('school/register') ? '' : 'transparent' }}">
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<div class="logo"><a href="{{ route('index') }}"><img src="{{ asset('frontend/assets/images/logo.svg') }}" alt="logo"></a></div>
			</div>
			<div class="col-md-10">
				<ul class="menu">
					<li><a href="{{ route('index') }}">Home</a></li>
					<li><a href="{{ url('/#How-It-Works') }}">How It Works</a></li>
					<li><a href="{{ route('pricing') }}">Pricing</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    
                    @if(Auth::guard('web')->check())
                        <li class="children button-header">
                            <a href="{{ route('user.dashboard') }}" class="btn btn-success"> User Dashboard</a>
                        </li>
                    @elseif(Auth::guard('school')->check())
                        <li class="children button-header">
                            <a href="{{ route('school.dashboard') }}" class="btn btn-success"> School Dashboard</a>
                        </li>
                    @else
                        <li class="children button-header">
                            <a href="#" class="custom-btn login">Login</a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('login') }}">Parents/Guardian</a></li>
                                <li><a href="{{ route('school.login') }}">School</a></li>
                            </ul><!--sub-menu-->
                        </li>
                        <li class="children button-header">
                            <a href="#" class="custom-btn">Sign Up</a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('register') }}">Parents/Guardian</a></li>
                                <li><a href="{{ route('school.register') }}">School</a></li>
                            </ul><!--sub-menu-->
                        </li>
                    @endif
                    
				</ul>
			</div>
			<!-- <div class="col-md-3">
				<div class="button-header">
					<a href="#" class="custom-btn login" data-toggle="modal" data-target="#login">Login</a>
					<a href="#" class="custom-btn" data-toggle="modal" data-target="#signup">Sign Up</a>
				</div>
			</div> -->
		</div>
	</div>
	<div class="mobile-block">
		<div class="logo-mobile">
            <a href="{{ route('index') }}">
                <img src="{{ asset('frontend/assets/images/logo.svg') }}" alt="logo">
            </a>
        </div>
		<a href="#" class="mobile-menu-btn"><span></span></a>
		<div class="mobile-menu">
			<div class="inside">
				<div class="logo">
					<a href="{{ route('index') }}"><img src="{{ asset('frontend/assets/images/logo.svg') }}" alt="logo"></a>
				</div><!--logo-->
				<ul class="menu panel-group" id="accordion" aria-multiselectable="true">
                    <li><a href="{{ route('index') }}">Home</a></li>
					<li><a href="{{ url('/#How-It-Works') }}">How It Works</a></li>
					<li><a href="{{ route('pricing') }}">Pricing</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    <li class="children">
                        <a href="#">Login</a>
                        <ul class="sub-menu">
							<li><a href="{{ route('login') }}">Parents/Guardian</a></li>
							<li><a href="{{ route('school.login') }}">School</a></li>
						</ul><!--sub-menu-->
                    </li>
                    <li class="children">
                        <a href="#">Sign Up</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('register') }}">Parents/Guardian</a></li>
							<li><a href="{{ route('school.register') }}">School</a></li>
						</ul><!--sub-menu-->
                    </li>
				</ul><!--menu-->
				<!-- <div class="button-header">
					<a href="#" class="custom-btn login" data-toggle="modal" data-target="#login">Login</a>
					<a href="#" class="custom-btn" data-toggle="modal" data-target="#signup">Sign Up</a>
				</div>button-header -->
			</div><!--inside-->
		</div><!--mobile-menu-->
	</div>
</header>
<!--===================== End of Header ========================-->
    
<!-- body content -->
@yield('content')

<div class="pre-footer"><img src="{{ asset('frontend/assets/images/line-prefoter.svg') }}" alt="bg-prefooter"></div> 
<!--===================== Search Domain ========================-->
<div class="search-domain animatedParent">
	<div class="container animated fadeInUpShort">
		<div class="row">
			<div class="col-md-4 col-xs-12">
				<h3>Search Your Domain</h3>
			</div>
			<div class="col-md-8 col-xs-12">
				<form>
					<div class="form-group">
						<input type="text" placeholder="Domain Name">
						<select>
							<option value=".com">.com</option>
							<option value=".ua">.ua</option>
							<option value=".nu">.nu</option>
						</select>
					</div>
					<button class="custom-btn green">Search</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!--===================== End of Search Domain ========================-->

<!--===================== Footer ========================-->
<footer>
	<div class="container">
		<div class="widget-footer">
			<h4>About</h4>
			<p>Schoolpay is your seamless payment system for your school and students</p>
		</div><!--widget-footer -->
		<div class="widget-footer">
			<h4>Company</h4>
			<ul>
				<li><a href="{{ url('/#How-It-Works') }}">How It Works</a></li>
				<li><a href="{{ route('pricing') }}">Pricing</a></li>
				<li><a href="{{ route('contact') }}">Contact</a></li>
			</ul>
		</div><!--widget-footer-->
		<div class="widget-footer">
			<h4>Support</h4>
			<ul>
				<li><a href="{{ url('/pricing#FAQ') }}">FAQ</a></li>
				<li><a href="{{ route('contact') }}">Contact Us</a></li>
			</ul>
		</div><!--widget-footer-->
		<div class="widget-footer">
			<h4>Contact Us</h4>
			<ul>
				<li><a href="#">+123-333-123</a></li>
				<li><a href="#">support@enginehosting.com</a></li>
			</ul>
		</div><!--widget-footer-->
		<div class="widget-footer last">
			<a href="{{ route('index') }}"><img src="{{ asset('frontend/assets/images/logo.svg') }}" alt="logo"></a>
			<p>Social Media</p>
			<ul class="social-icon">
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
			</ul>
		</div><!--widget-footer-->
		<div class="copyright">
			<p>&copy; Copyright 2019 Schoolpay. All Rights Reserved.</p>
		</div><!--copyright-->
	</div>
</footer>
<!--===================== End of Footer ========================-->

</div><!--wrapper-->

<script src="{{ asset('frontend/assets/js/lib/jquery.js') }}"></script>
<script src="{{ asset('frontend/assets/js/lib/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/lib/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/lib/css3-animate-it.js') }}"></script>
<script src="{{ asset('frontend/assets/js/lib/counter.js') }}"></script>
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>

</body>
</html>