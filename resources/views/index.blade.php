@extends('layouts.frontend')

@section('content')

    <!--===================== Base Slider ========================-->
	<div class="base-slider owl-carousel owl-theme bg-gray">
		<div class="item">
			<img src="{{ asset('frontend/assets/images/bg-test.png') }}" alt="slider">
			<div class="inside">
				<h2>Best Web Hosting For Your Website</h2>
				<p>get best speed for your website. dont loose more clients.</p>
				<a href="service-page.html" class="custom-btn">Get Started Now</a>
			</div><!--inside-->
		</div>
		<div class="item">
			<img src="{{ asset('frontend/assets/images/bg-test.png') }}" alt="slider">
			<div class="inside">
				<h2>Best Web Hosting For Your Website</h2>
				<p>get best speed for your website. dont loose more clients.</p>
				<a href="service-page.html" class="custom-btn">Get Started Now</a>
			</div><!--inside-->
		</div>
	</div>
	<!--===================== End of Base Slider ========================-->
	<section class="bg-gray">
		<div class="container">
			<!--===================== Partner ========================-->
			<div class="partner animatedParent">
				<h5>Trusted by 150,000+ happy customers worldwide</h5>
				<div class="partner-slider owl-carousel owl-theme">
					<div class="item animated bounceInLeft delay-250"><a href="#"><img src="{{ asset('frontend/assets/images/brand.png') }}" alt="partner"></a></div>
					<div class="item animated bounceInLeft delay-500"><a href="#"><img src="{{ asset('frontend/assets/images/brand.png') }}" alt="partner"></a></div>
					<div class="item animated bounceInLeft delay-750"><a href="#"><img src="{{ asset('frontend/assets/images/brand.png') }}" alt="partner"></a></div>
					<div class="item animated bounceInLeft delay-1000"><a href="#"><img src="{{ asset('frontend/assets/images/brand.png') }}" alt="partner"></a></div>
					<div class="item animated bounceInLeft delay-1250"><a href="#"><img src="{{ asset('frontend/assets/images/brand.png') }}" alt="partner"></a></div>
				</div>
			</div>
			<!--===================== End of Partner ========================-->
			<!--===================== Why Choose ========================-->
			<div class="why-choose animatedParent">
				<h2 class="title-head">Why you should choose us</h2>
				<div class="row">
					<div class="col-md-4 col-xs-12 animated bounceInUp delay-250">
						<div class="inside">
							<img src="{{ asset('frontend/assets/images/optimised.svg') }}" alt="optimised">
							<a href="#">Totaly Optimised</a>
							<p>Our wordpress theme is totaly optimised for you needs. Very fast and responsive website convert your traffic to new customers.</p>
							<a href="#" class="read-more">Learn More <img src="{{ asset('frontend/assets/images/right.png') }}" alt="right"></a>
						</div><!--inside-->
					</div>
					<div class="col-md-4 col-xs-12 animated bounceInUp delay-500">
						<div class="inside">
							<img src="{{ asset('frontend/assets/images/powerfull.svg') }}" alt="powerfull">
							<a href="#">Powerful Features</a>
							<p>Our theme get everything you need to work with your hosting website. Its fresh, brandly new and with awesome customizing features. </p>
							<a href="#" class="read-more">Learn More <img src="{{ asset('frontend/assets/images/right.png') }}" alt="right"></a>
						</div><!--inside-->
					</div>
					<div class="col-md-4 col-xs-12 animated bounceInUp delay-750">
						<div class="inside">
							<img src="{{ asset('frontend/assets/images/website.svg') }}" alt="website">
							<a href="#">Worldwide Support</a>
							<p>We will do suppor to your theme almost 24/7. If you get some bugs or have some problems - just simply write to us. </p>
							<a href="#" class="read-more">Learn More <img src="{{ asset('frontend/assets/images/right.png') }}" alt="right"></a>
						</div><!--inside-->
					</div>
				</div>
			</div>
			<!--===================== End of Why Choose ========================-->
			<!--===================== Hosting Software ========================-->
			<div class="hosting-software">
				<h2 class="title-head">Powerful Hosting Software</h2>
				<ul id="counter">
					<li><b class="count" data-count="244">0</b><span>servers</span></li>
					<li>1M+<span>TB total space</span></li>
					<li><b class="count" data-count="5">0</b><span>color schemes</span></li>
					<li><b class="count" data-count="10">0</b><span>faster</span></li>
				</ul>
			</div>
			<!--===================== End of Hosting Software ========================-->
		</div>
	</section>
	<!--===================== Pricing Table ========================-->
	<div class="pricing-table animatedParent">
		<div class="container">
			<h2 class="title-head">Linux Reseller Hosting</h2>
			<p>High Performance cPanel WHM Reseller Hosting in Europe</p>
			<ul class="pricing-list">
				<li class="animated bounceInLeft delay-250">
					<div class="images"><img src="{{ asset('frontend/assets/images/server.svg') }}" alt="server"></div>
					<h5>Dedicated Server</h5>
					<p>There are many variations of passages of Lorem Ipsum available.</p>
					<span><b>From</b></span>
					<div class="price">80$<span>/month</span></div>
					<a href="service-page.html" class="custom-btn">Get Started Now</a>
				</li>
				<li class="animated bounceInLeft delay-500">
					<div class="images"><img src="{{ asset('frontend/assets/images/hosting.svg') }}" alt="hosting"></div>
					<h5>Reseller Hosting</h5>
					<p>There are many variations of passages of Lorem Ipsum available.</p>
					<span><b>From</b></span>
					<div class="price">160$<span>/month</span></div>
					<a href="service-page.html" class="custom-btn">Get Started Now</a>
				</li>
				<li class="animated bounceInLeft delay-750">
					<div class="images"><img src="{{ asset('frontend/assets/images/hosting2.svg') }}" alt="hosting2"></div>
					<h5>Shared Hosting</h5>
					<p>There are many variations of passages of Lorem Ipsum available.</p>
					<span><b>From</b></span>
					<div class="price">9$<span>/month</span></div>
					<a href="service-page.html" class="custom-btn">Get Started Now</a>
				</li>
				<li class="animated bounceInLeft delay-1000">
					<div class="images"><img src="{{ asset('frontend/assets/images/vps.svg') }}" alt="vpn"></div>
					<h5>VPS Hosting</h5>
					<p>There are many variations of passages of Lorem Ipsum available.</p>
					<span><b>From</b></span>
					<div class="price">82$<span>/month</span></div>
					<a href="service-page.html" class="custom-btn">Get Started Now</a>
				</li>
			</ul><!--pricing-list-->
			<div class="info-pricing animated bounceInRight delay-250">
				<h4>Why you need a HOSTING?</h4>
				<ul>
					<li>
						<h6>Easy to Customize</h6>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
					</li>
					<li class="right">
						<h6>Powerful Security</h6>
						<p>Letraset sheets containing Lorem Ipsum passages, and more recently with desktop.</p>
					</li>
				</ul>
				<ul class="right">
					<li>
						<h6>Market Performance</h6>
						<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered.</p>
					</li>
					<li class="button right">
						<a href="service-page.html" class="custom-btn">Get Started Now</a>
					</li>
				</ul>
			</div><!--info-pricing-->
		</div>
	</div>
	<!--===================== End of Pricing Table ========================-->
	<!--===================== User Slider ========================-->
<div class="user-slider">
	<div class="container">
		<div class="slider owl-carousel owl-theme">
			<div class="item">
				<div class="inside">
					<img src="{{ asset('frontend/assets/images/icon.svg') }}" class="icon" alt="icon">
					<img src="{{ asset('frontend/assets/images/brand.png') }}" alt="logo-tesla">
					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.</p>
					<div class="user">
						<a href="#">
							<img src="{{ asset('frontend/assets/images/user.png') }}" alt="user">
							Oliver Mitchell
							<span>Manager at Lorem Ipsum</span>
						</a>
					</div><!--user-->
				</div><!--inside-->
			</div>
			<div class="item">
				<div class="inside">
					<img src="{{ asset('frontend/assets/images/icon.svg') }}" class="icon" alt="icon">
					<img src="{{ asset('frontend/assets/images/brand.png') }}" alt="logo-tesla">
					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.</p>
					<div class="user">
						<a href="#">
							<img src="{{ asset('frontend/assets/images/user.png') }}" alt="user">
							Oliver Mitchell
							<span>Manager at Lorem Ipsum</span>
						</a>
					</div><!--user-->
				</div><!--inside-->
			</div>
		</div><!--slider-->
	</div>
</div>
<!--===================== End of User Slider ========================-->

@endsection