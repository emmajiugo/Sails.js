@extends('layouts.app')

@section('content')

<main>

    <!-- Slider Area Start-->
    <div class="slider-area ">
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.png">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-7 col-md-9 ">
                            <div class="hero__caption">
                                <h1 data-animation="fadeInLeft" data-delay=".4s">Tuition Payment<br> Made Easy</h1>
                                <h4 data-animation="fadeInLeft" data-delay=".6s">- A reliable and easy way for schools to accept school fees of all types from students.</h4>
                                <br>
                                <h4 data-animation="fadeInLeft" data-delay=".9s">- A simple and fast way for parents to pay their kids' tuition fee without being in a queue and saves time.</h4>
                                <br>
                                <!-- Hero-btn -->
                                <div class="hero__btn" data-animation="fadeInLeft" data-delay=".9s">
                                    <a href="{{ \App\WebSettings::find(1)->demo_link }}" target="blank" class="btn hero-btn">Watch Demo!</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="hero__img d-none d-lg-block" data-animation="fadeInRight" data-delay="1s">
                                <img src="{{ asset('assets/img/children.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider Area End-->

    <!-- Why You Should Choose Us start-->
    <div class="what-we-do we-padding">
        <div class="container">
            <!-- Section-tittle -->
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center">
                        <h2>Why You Should Choose Us</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-do active text-center mb-30">
                        <div class="do-icon">
                            <span class="flaticon-setup"></span>
                        </div>
                        <div class="do-caption">
                            <h4>No Setup Fee</h4>
                            <p>Zero setup or developer fee required. Our platform is designed so you can handle all processes yourself.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-do active text-center mb-30">
                        <div class="do-icon">
                            <span class="flaticon-password"></span>
                        </div>
                        <div class="do-caption">
                            <h4>Secured & Time Saver</h4>
                            <p>Highly secured for your transactions. Cuts time and expenses both on parents, guardians and school owners.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-do active text-center mb-30">
                        <div class="do-icon">
                            <span class="flaticon-money"></span>
                        </div>
                        <div class="do-caption">
                            <h4>Easy Payment Reconciliation</h4>
                            <p>The Skooleo dashboard gives you a view to manage all payments as they come through.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-do active text-center mb-30">
                        <div class="do-icon">
                            <span class="flaticon-wallet"></span>
                        </div>
                        <div class="do-caption">
                            <h4>Easy Payslip Setup</h4>
                            <p>Generate and manage payment slips for your schools, categorizing tution fee for different classes.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-do active text-center mb-30">
                        <div class="do-icon">
                            <span class="flaticon-dashboard"></span>
                        </div>
                        <div class="do-caption">
                            <h4>Report Analysis</h4>
                            <p>It provides a well designed report criteria for school administrators and payments channels.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-do active text-center mb-30">
                        <div class="do-icon">
                            <span class="flaticon-support"></span>
                        </div>
                        <div class="do-caption">
                            <h4>Excellent Support</h4>
                            <p>24/7 support to help if any need arise. <strong>Say Hello</strong> and every inquiry or issues will be resolved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Why You Should Choose Us End-->

    <!-- About Us Start -->
    <div class="we-create-area create-padding">
        <div class="container">
            <div class="row d-flex align-items-end">
                <div class="col-lg-6 col-md-12">
                    <div class="we-create-img">
                        <img src="assets/img/exams.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="we-create-cap">
                        <h3>What You Need To Know About Us.</h3>
                        <p>Skooleo is a platform that aids both school owners or proprietors, parents or guardians to collect or pay their students' tuition fees without any hassle with the bank. It saves time and energy for parents or guardians, and also gives the school easy way of reconciling payments made for each student without having the parents or guardian visiting the school. All detailed records of payments are made available on the dashboard.</p>
                        <a href="{{ route('register') }}" class="genric-btn primary radius">Signup as Parent</a> <a href="{{ route('school.register') }}" class="genric-btn info radius">Signup as School</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Us End -->

    <!-- How it works Start -->
    <div class="generating-area" id="how_it_works">
        <div class="container">
             <!-- Section-tittle -->
             <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center">
                        <h2>How It Works!</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="generating-cap text-center">
                        <h4>For Parents & Guardians</h4>
                        <hr class="horizontal-line">
                        <div class="space-10"></div>
                    </div>

                    <div class="single-generating d-flex mb-30 parents">
                        <div class="generating-cap">
                            <table class="generating-cap-table">
                                <tr>
                                    <td><i class="far fa-check-square"></i></td>
                                    <td class="text">Register or Login into your account.</td>
                                </tr>
                                <tr>
                                    <td><i class="far fa-check-square"></i></td>
                                    <td class="text">Search for your desired school using the search box.</td>
                                </tr>
                                <tr>
                                    <td><i class="far fa-check-square"></i></td>
                                    <td class="text">Select the section, class and term depending on the process. Fill in your child's details.</td>
                                </tr>
                                <tr>
                                    <td><i class="far fa-check-square"></i></td>
                                    <td class="text">View Invoice: pay immediately or pay later.</td>
                                </tr>
                                <tr>
                                    <td><i class="far fa-check-square"></i></td>
                                    <td class="text">Pay with Card or Bank option or Transfer.</td>
                                </tr>
                                <tr>
                                    <td><i class="far fa-check-square"></i></td>
                                    <td class="text">Once payment is made, invoice is sent to school and you have proof of payment on your app.</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="generating-cap text-center">
                        <h4>For Schools</h4>
                        <hr class="horizontal-line">
                        <div class="space-10"></div>
                    </div>

                    <div class="single-generating d-flex mb-30 schools">
                        <div class="generating-cap">
                            <table class="generating-cap-table">
                                <tr>
                                    <td><i class="far fa-check-circle"></i></td>
                                    <td class="text">Register or Login your school account.</td>
                                </tr>
                                <tr>
                                    <td><i class="far fa-check-circle"></i></td>
                                    <td class="text">Verification process before making your school visible to parents.</td>
                                </tr>
                                <tr>
                                    <td><i class="far fa-check-circle"></i></td>
                                    <td class="text">Set up your payment plans for each sections and classes.</td>
                                </tr>
                                <tr>
                                    <td><i class="far fa-check-circle"></i></td>
                                    <td class="text">Start receiving payments from students and parents.</td>
                                </tr>
                                <tr>
                                    <td><i class="far fa-check-circle"></i></td>
                                    <td class="text">Withdraw anytime to your bank account.</td>
                                </tr>
                                <tr>
                                    <td><i class="far fa-check-circle"></i></td>
                                    <td class="text">Available transactions report on your dashboard.</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- How it works End -->

    <div class="space-120"></div>

    <!-- Testimonial Start -->
    <div class="testimonial-area">
        <div class="container">
            <div class="testimonial-main">
                <!-- Section-tittle -->
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-5  col-md-8 pr-0">
                        <div class="section-tittle text-center">
                            <h2>What Client Say</h2>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                        <div class="col-lg-10 col-md-9">
                            <div class="h1-testimonial-active">
                                <!-- Single Testimonial -->
                                <div class="single-testimonial text-center">
                                    <div class="testimonial-caption ">
                                        <div class="testimonial-top-cap">
                                            <p>Skooleo is a wonderful platform. Using their platform has increased the number of students that pay their fees even before resumption.</p>
                                        </div>
                                        <!-- founder -->
                                        <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                            {{-- <div class="founder-img">
                                                <img src="assets/img/testmonial/testimonial.png" alt="">
                                            </div> --}}
                                            <div class="founder-text">
                                                <span>Rev. Fr. Charles Onwumelu</span>
                                                <p>All Hallows Seminary, Onitsha.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Single Testimonial -->
                                <div class="single-testimonial text-center">
                                    <div class="testimonial-caption ">
                                        <div class="testimonial-top-cap">
                                            <p>I love the way this platform makes it simple for our school to setup our fees and receive payments easily from parents and students.</p>
                                        </div>
                                        <!-- founder -->
                                        <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                            {{-- <div class="founder-img">
                                                <img src="assets/img/testmonial/testimonial.png" alt="">
                                            </div> --}}
                                            <div class="founder-text">
                                                <span>Mrs. Ajayi (Proprietor)</span>
                                                <p>Eternal Knowledge College, Ogun State.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
           </div>
        </div>
    </div>
    <!-- Testimonial End -->

</main>

@endsection
