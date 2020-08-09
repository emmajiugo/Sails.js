<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Skooleo - Tuition made easy</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

</head>

<body>

    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('assets/img/logo/skooleo-logo.png') }}" alt="Skooleo Logo">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

    <header>
        <!-- Header Start -->
       <div class="header-area header-transparrent ">
            <div class="main-header header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <a href="{{ route('index') }}"><img src="{{ asset('assets/img/logo/skooleo-logo.png') }}" alt="Skooleo Logo"></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{ route('index') }}">Home</a></li>
                                        <li><a href="{{ url('/#how_it_works') }}">How It Works</a></li>
                                        <li><a href="{{ route('pricing') }}">Pricing</a></li>
                                        <li><a href="{{ route('contact') }}">Contact Us</a></li>

                                        @if(Auth::guard('web')->check())
                                            <li>
                                                <a href="{{ route('user.dashboard') }}">
                                                    <span class="signup-btn">User Dashboard</span>
                                                </a>
                                            </li>
                                        @elseif(Auth::guard('school')->check())
                                            <li>
                                                <a href="{{ route('school.dashboard') }}">
                                                    <span class="signup-btn">School Dashboard</span>
                                                </a>
                                            </li>
                                        @else
                                            <li><a href="#"><span class="login-btn">Login</span></a>
                                                <ul class="submenu">
                                                    <li><a href="{{ route('login') }}">Parents/Guardian</a></li>
                                                    <li><a href="{{ route('school.login') }}">Schools</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#"><span class="signup-btn">Sign Up</span></a>
                                                <ul class="submenu">
                                                    <li><a href="{{ route('register') }}">Parents/Guardian</a></li>
                                                    <li><a href="{{ route('school.register') }}">Schools</a></li>
                                                </ul>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
        <!-- Header End -->
    </header>

    <!-- body content -->
    @yield('content')

    <div class="space-60"></div>

    <!-- Mobile download Start-->
    <div class="have-project">
        <div class="container">
            <div class="haveAproject"  data-background="assets/img/team/have.jpg">
                <div class="row d-flex align-items-center">
                    <div class="col-12">
                        <div class="wantToWork-caption text-center">
                            <h2>Download our mobile app.</h2>
                            <p>Available on both Play-store and Apple-store.</p>
                            <a href="{{ \App\WebSettings::find(1)->playstore_link }}" target="blank"><img src="{{ asset('assets/img/playstore.png') }}" class="img-responsive" alt="Play Store"></a>
                            <a href="{{ \App\WebSettings::find(1)->appstore_link }}" target="blank"><img src="{{ asset('assets/img/applestore.png') }}" class="img-responsive" alt="App Store"></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Mobile download End -->

    <footer>

        <!-- Footer Start-->
        <div class="footer-main" data-background="{{ asset('assets/img/shape/footer_bg.png') }}">
            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-3 col-md-4 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img src="{{ asset('assets/img/logo/skooleo-logo-footer.png') }}" alt="Skooleo"></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p class="info1">{{ \App\WebSettings::find(1)->address }}</p>
                                        <p class="info2">{{ \App\WebSettings::find(1)->email }}</p>
                                    </div>
                                </div>
                                <div class="footer-social">
                                    <a href="{{ \App\WebSettings::find(1)->facebook_link }}" target="blank"><i class="fab fa-facebook-f"></i></a>
                                    <a href="{{ \App\WebSettings::find(1)->twitter_link }}" target="blank"><i class="fab fa-twitter"></i></a>
                                    <a href="{{ \App\WebSettings::find(1)->instagram_link }}" target="blank"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Navigation</h4>
                                    <ul>
                                        <li><a href="about.html">How It Works</a></li>
                                        <li><a href="single-blog.html">Pricing</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-7">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Quick Links</h4>
                                    <ul>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Terms & Conditions</a></li>
                                        <li><a href="#">FAQs</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Mobile Apps</h4>
                                    <ul>
                                    <li><a href="{{ \App\WebSettings::find(1)->playstore_link }}" target="blank"><img src="{{ asset('assets/img/playstore.png') }}" class="img-responsive" alt="Playstore"></a></li>
                                    <li><a href="{{ \App\WebSettings::find(1)->appstore_link }}" target="blank"><img src="{{ asset('assets/img/applestore.png') }}" class="img-responsive" alt="Appstore"></a></li>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer-bottom aera -->
            <div class="footer-bottom-area footer-bg">
                <div class="container">
                    <div class="footer-border">
                        <div class="row d-flex align-items-center">
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right text-center">
                                    <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Product of <a href="https://seamaco.com" target="_blank">Seamaco Technologies</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->

   </footer>

	<!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <!-- Date Picker -->
    <script src="{{ asset('assets/js/gijgo.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/animated.headline.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('assets/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('assets/js/contact.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.form.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/mail-script.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
