@extends('layouts.frontend')

@section('content')

    <!--===================== Base Slider ========================-->
	<div class="base-slider owl-carousel owl-theme bg-gray">
		{{-- <div class="item">
			<img src="{{ asset('frontend/assets/images/bg-test.png') }}" alt="slider">
			<div class="inside">
				<h2>Best Web Hosting For Your Website</h2>
				<p>get best speed for your website. dont loose more clients.</p>
				<a href="service-page.html" class="custom-btn">Get Started Now</a>
			</div><!--inside-->
		</div> --}}
		<div class="item">
			<img src="{{ asset('frontend/assets/images/bg-test.png') }}" alt="slider">
			<div class="inside">
				<h2>TUITION PAYMENT MADE EASY.</h2>
				<p>a simple way to pay your kid's tuition fees without being in queue and save time.</p>
				{{-- <a href="service-page.html" class="custom-btn">Get Started Now</a> --}}
			</div><!--inside-->
		</div>
	</div>
	<!--===================== End of Base Slider ========================-->
	<section class="bg-gray">
		<div class="container">
			<!--===================== School Partners ========================-->
			<!--<div class="partner animatedParent">
				<h5>Trusted by 1,200+ schools</h5>
				<div class="partner-slider owl-carousel owl-theme">
					<div class="item animated bounceInLeft delay-250"><a href="#"><img src="{{ asset('frontend/assets/images/brand/brand.png') }}" alt="partner"></a></div>
					<div class="item animated bounceInLeft delay-500"><a href="#"><img src="{{ asset('frontend/assets/images/brand/brand.png') }}" alt="partner"></a></div>
					<div class="item animated bounceInLeft delay-750"><a href="#"><img src="{{ asset('frontend/assets/images/brand/brand.png') }}" alt="partner"></a></div>
					<div class="item animated bounceInLeft delay-1000"><a href="#"><img src="{{ asset('frontend/assets/images/brand/brand.png') }}" alt="partner"></a></div>
					<div class="item animated bounceInLeft delay-1250"><a href="#"><img src="{{ asset('frontend/assets/images/brand/brand.png') }}" alt="partner"></a></div>
				</div>
			</div>-->
			<!--===================== End of Partner ========================-->
			<!--===================== Why Choose ========================-->
			<div class="why-choose animatedParent">
				<h2 class="title-head">Why you should choose us</h2>
				<div class="row">
					<div class="col-md-3 col-xs-12 animated bounceInUp delay-250">
						<div class="inside">
							<img src="{{ asset('frontend/assets/images/optimised.svg') }}" alt="optimised">
							<a href="#">NO SETUP FEE</a>
							<p>Zero setup or developer fee required. Our platform is designed so you can handle all processes yourself</p>
						</div><!--inside-->
					</div>
					<div class="col-md-3 col-xs-12 animated bounceInUp delay-500">
						<div class="inside">
							<img src="{{ asset('frontend/assets/images/powerfull.svg') }}" alt="powerfull">
							<a href="#">EASY PAYMENT RECONCILIATION</a>
							<p>The schoolpay account provide a platform to view and manage the payments as they come through.</p>
						</div><!--inside-->
					</div>
					<div class="col-md-3 col-xs-12 animated bounceInUp delay-750">
						<div class="inside">
							<img src="{{ asset('frontend/assets/images/website.svg') }}" alt="website">
							<a href="#">EASY INTEGRATION</a>
							<p>Easy integration with your existing website using a line of code, i.e. our API </p>
						</div><!--inside-->
                    </div>
                    <div class="col-md-3 col-xs-12 animated bounceInUp delay-1000">
						<div class="inside">
							<img src="{{ asset('frontend/assets/images/website.svg') }}" alt="website">
							<a href="#">EASY PAYSLIP SETUP</a>
							<p>Generate and manage payment slips for your schools</p>
						</div><!--inside-->
					</div>
                </div>
                <div class="row">
					<div class="col-md-3 col-xs-12 animated bounceInUp delay-250">
						<div class="inside">
							<img src="{{ asset('frontend/assets/images/website.svg') }}" alt="website">
							<a href="#">SECURITY</a>
							<p>Highly secured for your transactions. We leverage on Flutterwave Technology for secure payment transactions</p>
						</div><!--inside-->
                    </div>
					<div class="col-md-3 col-xs-12 animated bounceInUp delay-500">
						<div class="inside">
							<img src="{{ asset('frontend/assets/images/optimised.svg') }}" alt="optimised">
							<a href="#">TIME SAVER</a>
							<p>Cuts time and expenses both on parents, guardians and school owners</p>
						</div><!--inside-->
					</div>
					<div class="col-md-3 col-xs-12 animated bounceInUp delay-750">
						<div class="inside">
							<img src="{{ asset('frontend/assets/images/powerfull.svg') }}" alt="powerfull">
							<a href="#">REPORT ANALYSIS</a>
							<p>It provides a well designed report criteria for school administrators and payments channels </p>
						</div><!--inside-->
					</div>
                    <div class="col-md-3 col-xs-12 animated bounceInUp delay-1000">
						<div class="inside">
							<img src="{{ asset('frontend/assets/images/website.svg') }}" alt="website">
							<a href="#">EXCELLENT SUPPORT</a>
							<p>24/7 support to help with if any arise</p>
						</div><!--inside-->
					</div>
				</div>
			</div>
			<!--===================== End of Why Choose ========================-->
			<!--===================== Traction ========================-->
			<div class="hosting-software">
				<h2 class="title-head">Traction</h2>
				<ul id="counter">
					<li>200+<span>verified schools</span></li>
					<li>2K+<span>Transactions per term</span></li>
					<li><b class="count" data-count="9">0</b><span>across states</span></li>
					{{-- <li><b class="count" data-count="3">0</b><span>countries to launch</span></li> --}}
				</ul>
			</div>
			<!--===================== End of Traction ========================-->
		</div>
	</section>
	<!--===================== About Schoolpay ========================-->
	<div id="How-It-Works" class="pricing-table">
		<div class="container">
			<h2 class="title-head">About Schoolpay</h2>
            <p>Schoolpay is a platform that aids both school owners and parents or guardians to collect and pay their students tuition fees without any hassle with the bank. It saves time and energy for parents or guardians, and also gives the school easy way of reconciling payments made for each student without having the parents or guardian visiting the school. <br>

            All detailed records of payments are made available on the dashboard.</p>

			<div class="info-pricing">
                <div class="row">
                    <h4>How it works?</h4>
                    <ul class="left">
                        <h6>For Schools.</h6>
                        <li>
                            <p>Register/Login your school with the correct information.</p>
                        </li>
                        <li>
                            <p>Verification process before making your school visible to audience.</p>
                        </li>
                        <li>
                            <p>Set up your payment plans for each sections and classes.</p>
                        </li>
                        <li>
                            <p>Start receiving payments from students and parents.</p>
                        </li>
                        <li>
                            <p>Withdraw anytime to your bank account.</p>
                        </li>
                        <li>
                            <p>Available update transaction reports on your dashboard.</p>
                        </li>
                    </ul>
                    <ul class="right">
                        <h6>For Parents/Guardians.</h6>
                        <li>
                            <p>Register/Login into your account.</p>
                        </li>
                        <li>
                            <p>Search for your desired school using the search box.</p>
                        </li>
                        <li>
                            <p> Select the section, class and term depending on the process. Fill in the necessary details.</p>
                        </li>
                        <li>
                            <p>View Invoice: Pay immediately or pay later.</p>
                        </li>
                        <li>
                            <p>Pay with Card or Bank option or Transfer.</p>
                        </li>
                        <li>
                            <p> Once payment is made, invoice is sent to school and you can have prove of payment on your app.</p>
                        </li>

                    </ul>
                </div>

                <div class="text-center">
                    <a href="{{ route('register') }}" class="custom-btn green">Get Started (Parents)</a>
                    <a href="{{ route('school.register') }}" class="custom-btn">Get Started (School)</a>
                </div>
			</div><!--info-pricing-->
		</div>
	</div>
	<!--===================== End of About ========================-->
	<!--===================== User Slider ========================-->
    <div class="user-slider">
        <div class="container">
            <div class="slider owl-carousel owl-theme">
                <div class="item">
                    <div class="inside">
                        <img src="{{ asset('frontend/assets/images/icon.svg') }}" class="icon" alt="icon">
                        <img src="{{ asset('frontend/assets/images/brand/brand.png') }}" alt="logo-tesla">
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
                        <img src="{{ asset('frontend/assets/images/brand/brand.png') }}" alt="logo-tesla">
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
