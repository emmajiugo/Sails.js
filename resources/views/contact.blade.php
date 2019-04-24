@extends('layouts.frontend')

@section('content')

    <!--===================== Bg Form ========================-->
	<div class="bg-form">
		<div class="container">
			<h2 class="text-center">Contact Us</h2>
			<p class="text-center">We’re here to help.</p>
			<div class="info-block-contact animatedParent">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12 animated bounceInLeft">
						<div class="inside left">
							<div class="images"><img src="{{ asset('frontend/assets/images/phone.png') }}" alt="phone"></div>
							<h4>Have questions? Call Us.</h4>
							<a href="#">+1 888 231 1211</a>
						</div><!--inside-->
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12 animated bounceInRight">
						<div class="inside right">
							<div class="images"><img src="{{ asset('frontend/assets/images/mail.svg') }}" alt="mail"></div>
							<h4>Email Us</h4>
							<a href="#">hello@enginehosting.com</a>
						</div><!--inside-->
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12 animated bounceInLeft">
						<div class="inside left">
							<div class="images"><img src="{{ asset('frontend/assets/images/address.svg') }}" alt="address"></div>
							<h4>Address</h4>
							<span>514 S. Magnolia St.<br>Orlando, FL 32806</span>
						</div><!--inside-->
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12 animated bounceInRight">
						<div class="inside right">
							<div class="images"><img src="{{ asset('frontend/assets/images/like.svg') }}" alt="like"></div>
							<h4>Follow Us</h4>
							<ul class="social-icon">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-youtube"></i></a></li>
							</ul>
						</div><!--inside-->
					</div>
				</div>
			</div><!--info-block-contact-->
		</div>
	</div>
	<!--===================== End of Bg Form ========================-->
	<!--===================== Form Contact ========================-->
	<div class="form-contact animatedParent">
		<h3>Send Message</h3>
		<form class="animated growIn">
			<div class="form-group">
				<input type="text" placeholder="Your Name">
			</div>
			<div class="form-group">
				<input type="text" placeholder="Email">
			</div>
			<div class="form-group">
				<label for="message">Message:</label>
				<textarea id="message" name="Message"></textarea>
			</div>
			<div class="form-group text-right">
				<button>Send</button>
			</div>
		</form>
	</div>
    <!--===================== End of Form Contact ========================-->
    
@endsection