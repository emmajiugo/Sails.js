@extends('layouts.frontend')

@section('content')

    <!--===================== Choice Plan ========================-->
	<div class="choice-plan animatedParent">
		<div class="container">
			<h2 class="text-center">Managed VPS Service</h2>
			<!--===================== Nav Tabs ========================-->
			<ul class="nav nav-tabs" role="tablist">
				<li class="active"><a href="#monthly" aria-controls="monthly" role="tab" data-toggle="tab">Billed monthly</a></li>
				<li><a href="#yearly" aria-controls="yearly" role="tab" data-toggle="tab">Billed yearly</a></li>
			</ul>
			<!--===================== End of Nav Tabs ========================-->
			<div class="tab-content">
				<!--===================== Tab Monthly ========================-->
				<div role="tabpanel" class="tab-pane active" id="monthly">
					<ul class="pricing-list">
						<li class="animated bounceInLeft delay-250">
							<div class="images"><img src="{{ asset('frontend/assets/images/basic-plan.svg') }}" alt="basic-plan"></div>
							<h5>Basic Plan</h5>
							<ul>
								<li>2GB RAM</li>
								<li>1 Cores</li>
								<li>2.5GHz per Core</li>
								<li>25GB SSD Storag</li>
								<li>50GB SAS Secondary</li>
								<li>1TB Bandwidth</li>
							</ul>
							<span><b>Price</b></span>
							<div class="price">80$<span>/month</span></div>
							<a href="sign-up.html" class="custom-btn">Get Started Now</a>
						</li>
						<li class="animated bounceInLeft delay-500">
							<div class="images"><img src="{{ asset('frontend/assets/images/star-plan.png') }}" alt="star-plan"></div>
							<h5>Premium Plan</h5>
							<ul>
								<li>2GB RAM</li>
								<li>1 Cores</li>
								<li>2.5GHz per Core</li>
								<li>25GB SSD Storag</li>
								<li>50GB SAS Secondary</li>
								<li>1TB Bandwidth</li>
							</ul>
							<span><b>Price</b></span>
							<div class="price">90$<span>/month</span></div>
							<a href="sign-up.html" class="custom-btn">Get Started Now</a>
						</li>
						<li class="animated bounceInLeft delay-750">
							<div class="images"><img src="{{ asset('frontend/assets/images/hosting.svg') }}" alt="hosting"></div>
							<h5>Reseller Plan</h5>
							<ul>
								<li>2GB RAM</li>
								<li>1 Cores</li>
								<li>2.5GHz per Core</li>
								<li>25GB SSD Storag</li>
								<li>50GB SAS Secondary</li>
								<li>1TB Bandwidth</li>
							</ul>
							<span><b>Price</b></span>
							<div class="price">120$<span>/month</span></div>
							<a href="sign-up.html" class="custom-btn">Get Started Now</a>
						</li>
					</ul><!--pricing-list-->
				</div>
				<!--===================== End of Tab Monthly ========================-->
				<!--===================== Yearly ========================-->
				<div role="tabpanel" class="tab-pane" id="yearly">
					<ul class="pricing-list">
						<li class="animated bounceInLeft delay-250">
							<div class="images"><img src="{{ asset('frontend/assets/images/basic-plan.svg') }}" alt="basic-plan"></div>
							<h5>Basic Plan</h5>
							<ul>
								<li>2GB RAM</li>
								<li>1 Cores</li>
								<li>2.5GHz per Core</li>
								<li>25GB SSD Storag</li>
								<li>50GB SAS Secondary</li>
								<li>1TB Bandwidth</li>
							</ul>
							<span><b>Price</b></span>
							<div class="price">90$<span>/month</span></div>
							<a href="#" class="custom-btn">Get Started Now</a>
						</li>
						<li class="animated bounceInLeft delay-500">
							<div class="images"><img src="{{ asset('frontend/assets/images/star-plan.png') }}" alt="star-plan"></div>
							<h5>Premium Plan</h5>
							<ul>
								<li>2GB RAM</li>
								<li>1 Cores</li>
								<li>2.5GHz per Core</li>
								<li>25GB SSD Storag</li>
								<li>50GB SAS Secondary</li>
								<li>1TB Bandwidth</li>
							</ul>
							<span><b>Price</b></span>
							<div class="price">110$<span>/month</span></div>
							<a href="#" class="custom-btn">Get Started Now</a>
						</li>
						<li class="animated bounceInLeft delay-750">
							<div class="images"><img src="{{ asset('frontend/assets/images/hosting.svg') }}" alt="line-plan"></div>
							<h5>Reseller Plan</h5>
							<ul>
								<li>2GB RAM</li>
								<li>1 Cores</li>
								<li>2.5GHz per Core</li>
								<li>25GB SSD Storag</li>
								<li>50GB SAS Secondary</li>
								<li>1TB Bandwidth</li>
							</ul>
							<span><b>Price</b></span>
							<div class="price">150$<span>/month</span></div>
							<a href="#" class="custom-btn">Get Started Now</a>
						</li>
					</ul><!--pricing-list-->
				</div>
				<!--===================== End of Tab Yearly ========================-->
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
	<!--===================== Info Plans ========================-->
	<div class="info-plans animatedParent">
		<div class="container">
			<h2 class="title-head">Compare Plans</h2>
			<p>There are many variations of passages of Lorem Ipsum available.</p>
			<table class="animated growIn">
				<thead>
					<tr>
						<td class="text-left">Features</td>
						<td>Basic</td>
						<td>Premium</td>
						<td>Reseller</td>
					</tr>
				</thead>
				<tr>
					<td class="text-left background">RAM</td>
					<td class="background">8 GB</td>
					<td class="background">12 GB</td>
					<td class="background">24 GB</td>
				</tr>
				<tr>
					<td class="text-left">Storage SSD</td>
					<td>25 GB</td>
					<td>55 GB</td>
					<td>100 GB</td>
				</tr>
				<tr>
					<td class="text-left background">SAS Storage</td>
					<td class="background">50 GB</td>
					<td class="background">132 GB</td>
					<td class="background">200 GB</td>
				</tr>
				<tr>
					<td class="text-left">CPU Cores</td>
					<td>2</td>
					<td>4</td>
					<td>16</td>
				</tr>
				<tr>
					<td class="text-left background">Brandwidth</td>
					<td class="background">2 TB</td>
					<td class="background">8 TB</td>
					<td class="background">12 TB</td>
				</tr>
				<tr class="offset-inside">
					<td class="text-left"><b>Available OS</b></td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="text-left background">Ubuntu</td>
					<td class="background"><img src="{{ asset('frontend/assets/images/done.png') }}" alt="done"></td>
					<td class="background"><img src="{{ asset('frontend/assets/images/done.png') }}" alt="done"></td>
					<td class="background"><img src="{{ asset('frontend/assets/images/done.png') }}" alt="done"></td>
				</tr>
				<tr>
					<td class="text-left">Windows Server 2008</td>
					<td><img src="{{ asset('frontend/assets/images/done.png') }}" alt="done"></td>
					<td><img src="{{ asset('frontend/assets/images/done.png') }}" alt="done"></td>
					<td><img src="{{ asset('frontend/assets/images/done.png') }}" alt="done"></td>
				</tr>
				<tr class="offset-inside">
					<td class="text-left"><b>Support</b></td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="text-left background">Phone Support</td>
					<td class="background">-</td>
					<td class="background"><img src="{{ asset('frontend/assets/images/done.png') }}" alt="done"></td>
					<td class="background"><img src="{{ asset('frontend/assets/images/done.png') }}" alt="done"></td>
				</tr>
				<tr>
					<td class="text-left">Live Chat</td>
					<td><img src="{{ asset('frontend/assets/images/done.png') }}" alt="done"></td>
					<td><img src="{{ asset('frontend/assets/images/done.png') }}" alt="done"></td>
					<td><img src="{{ asset('frontend/assets/images/done.png') }}" alt="done"></td>
				</tr>
				<tr class="offset-inside">
					<td class="text-left"><b>More Features</b></td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="text-left background">Some Feature 1</td>
					<td class="background">100 Mbps</td>
					<td class="background">100 Mbps</td>
					<td class="background">100 Mbps</td>
				</tr>
				<tr>
					<td class="text-left">Some Feature 2</td>
					<td>-</td>
					<td>-</td>
					<td><img src="{{ asset('frontend/assets/images/done.png') }}" alt="done"></td>
				</tr>
				<tr class="offset-inside">
					<td class="text-left"><b>Price</b></td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="text-left background">Monthly</td>
					<td class="background">80$/Month</td>
					<td class="background">80$/Month</td>
					<td class="background">80$/Month</td>
				</tr>
				<tr>
					<td class="text-left">Yearly</td>
					<td>50$/Month</td>
					<td>50$/Month</td>
					<td>50$/Month</td>
				</tr>
			</table>
		</div>
	</div>
	<!--===================== End of Info Plans ========================-->
	<!--===================== Bottom Info Plans ========================-->
	<div class="bottom-info-plans animatedParent">
		<div class="container">
			<h2 class="title-head">Ready to Get Started?</h2>
			<p>High Performance cPanel WHM Reseller Hosting in Europe</p>
			<div class="text-center">
				<a href="#" class="custom-btn green">Choose your plan</a>
			</div>
			<div class="partner-slider owl-carousel owl-theme">
				<div class="item animated bounceInLeft delay-250">
					<a href="#"><img src="{{ asset('frontend/assets/images/brand.png') }}" alt="microsoft-white"></a>
				</div>
				<div class="item animated bounceInLeft delay-550">
					<a href="#"><img src="{{ asset('frontend/assets/images/brand.png') }}" alt="microsoft-white"></a>
				</div>
				<div class="item animated bounceInLeft delay-750">
					<a href="#"><img src="{{ asset('frontend/assets/images/brand.png') }}" alt="microsoft-white"></a>
				</div>
				<div class="item animated bounceInLeft delay-1000">
					<a href="#"><img src="{{ asset('frontend/assets/images/brand.png') }}" alt="microsoft-white"></a>
				</div>
				<div class="item animated bounceInLeft delay-1250">
					<a href="#"><img src="{{ asset('frontend/assets/images/brand.png') }}" alt="microsoft-white"></a>
				</div>
			</div>
		</div>
	</div>
	<!--===================== End of Bottom Info Plans ========================-->
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