@extends('layouts.frontend')

@section('content')

    <!--===================== Choice Plan ========================-->
	<div class="choice-plan animatedParent">
		<div class="container">
			<h2 class="text-center">Pricing</h2>
			<div class="tab-content">
				<!--===================== Tab Monthly ========================-->
				<div role="tabpanel" class="tab-pane active" id="monthly">
					<ul class="pricing-list">
						<li class="animated bounceInLeft delay-500">
							<div class="images"><img src="{{ asset('frontend/assets/images/star-plan.png') }}" alt="star-plan"></div>
							<h5>Student Plan</h5>
							<ul>
								<li>2GB RAM</li>
								<li>1 Cores</li>
								<li>2.5GHz per Core</li>
								<li>25GB SSD Storag</li>
								<li>50GB SAS Secondary</li>
								<li>1TB Bandwidth</li>
							</ul>
							<span><b>Price</b></span>
							<div class="price">&#8358;500<span>/transaction</span></div>
							<a href="{{ route('register') }}" class="custom-btn">Get Started Now</a>
                        </li>
                        <li class="animated bounceInLeft delay-500">
                                <div class="images"><img src="{{ asset('frontend/assets/images/star-plan.png') }}" alt="star-plan"></div>
                                <h5>School Plan</h5>
                                <ul>
                                    <li>2GB RAM</li>
                                    <li>1 Cores</li>
                                    <li>2.5GHz per Core</li>
                                    <li>25GB SSD Storag</li>
                                    <li>50GB SAS Secondary</li>
                                    <li>1TB Bandwidth</li>
                                </ul>
                                <span><b>Price</b></span>
                                <div class="price">&#8358;100<span>/withdrawal</span></div>
                                <a href="{{ route('school.register') }}" class="custom-btn">Get Started Now</a>
                            </li>
					</ul><!--pricing-list-->
				</div>
				<!--===================== End of Tab Monthly ========================-->
			</div><!--tab-content-->
		</div><!--container-->
		<!--===================== Info Plan ========================-->
		<div class="info-plan">
			<div class="container">
				<div class="row">
					<div class="col-md-6 animated bounceInLeft">
						<img src="{{ asset('frontend/assets/images/improving.png') }}" alt="improving">
						<h5>Always Improving</h5>
						<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
					</div>
					<div class="col-md-6 animated bounceInRight">
						<img src="{{ asset('frontend/assets/images/secured.png') }}" alt="improving">
						<h5>100% Secured</h5>
						<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
					</div>
				</div>
			</div>
		</div>
		<!--===================== End of Info Plan ========================-->
	</div>
	<!--===================== End of Choice Plan ========================-->
	<!--===================== Block Features ========================-->
	<div class="container-fluid block-features animatedParent">
		<div class="row">
			<div class="col-md-6 col-5">
				<h3 class="animated bounceInUp delay-250">Some Feature</h3>
				<p class="animated bounceInUp delay-250">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
				<h3 class="animated bounceInUp delay-750">Integrations</h3>
				<p class="animated bounceInUp delay-750">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
			</div>
			<div class="col-md-5 text-left animated bounceInRight">
				<img src="{{ asset('frontend/assets/images/server-block.svg') }}" alt="server-block">
			</div>
		</div>
	</div>
	<!--===================== End of Block Features ========================-->

@endsection
