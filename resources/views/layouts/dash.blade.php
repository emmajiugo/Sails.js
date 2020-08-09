<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Skooleo - Dashboard</title>

    <!-- icon -->
    <link rel="icon" href="{{asset('favicon.png') }}">

    <!-- start linking  -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.11.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('user_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('user_assets/css/app.css') }}">
    <link rel="stylesheet" href="{{asset('user_assets/css/custom.css') }}">

    {{-- select2 css --}}
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css">

    <!-- jquery script -->
    <script src="{{asset('user_assets/js/jquery.min.js') }}"></script>

</head>
<body>
<!-- start admin -->
<section id="admin">
    <!-- start sidebar -->
    <div class="sidebar">
        <!-- start with head -->
        <div class="head">
            <div class="logo">
                <img src="{{ asset('user_assets/img/skooleo-admin-logo.png') }}" alt="Skooleo Logo">
            </div>
            <br><br>

            @if(Auth::guard('school')->check())
                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#switchModal">Switch/Add School</a>
            @endif
        </div>
        <!-- end with head -->

        <!-- navbar -->
        @if(Auth::guard('web')->check())
            @include('inc.nav-user')
        @elseif(Auth::guard('school')->check())
            @include('inc.nav-school')
        @endif
        <!-- end navbar -->
    </div>
    <!-- end sidebar -->

    <!-- start content -->
    <div class="content">
        <!-- start content head -->
        <div class="head">
            <!-- head top -->
            <div class="top">
                <div class="left">
                    <button id="on" class="btn btn-info"><i class="fa fa-bars"></i></button>
                    <button id="off" class="btn btn-info hide"><i class="fa fa-align-left"></i></button>
                    <button class="btn btn-info hidden-xs-down"><i class="fa fa-expand-arrows-alt"></i></button>
                </div>
                <div class="right">
                    <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if(Auth::guard('web')->check())
                                {{ Auth::user()->fullname }}
                            @else
                                @php
                                    $schoolDetail = App\SchoolDetail::where([
                                        ['school_id', '=',  Auth::id()],
                                        ['is_used', '=', 1],
                                    ])->first();
                                @endphp
                                {{ ($schoolDetail) ? $schoolDetail->schoolname : ""}}
                            @endif

                        </button>
                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ Auth::guard('web')->check() ? '/home/profile' : '/school/settings' }}">Profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end head top -->

            <!-- start head bottom -->
            <div class="bottom">
                <div class="left">
                    <h1>dashboard</h1>
                </div>
            </div>
            <!-- end head bottom -->
        </div>
        <!-- end content head -->

        <!-- include flash messages -->
        @include('inc.messages')

        @yield('content')

        @if(!Auth::guard('web')->check() && Request::is('school/report') == "")
            @include('school.modal')
        @endif

    </div>
    <!-- end content -->
</section>
<!-- end admin -->

<!-- start scripting -->
<!-- code for the Flip feature -->
<!-- <script src="{{asset('user_assets/js/jquery.min.js') }}"></script> -->
<script src="{{asset('user_assets/js/jquery.flip.js') }}"></script>

<!-- chart scripts -->
<script src="{{asset('user_assets/js/tether.min.js') }}"></script>
<script src="{{asset('user_assets/js/bootstrap.min.js') }}"></script>
<script src="{{asset('user_assets/js/highcharts.js') }}"></script>
<script src="{{asset('user_assets/js/chart.js') }}"></script>

<!-- theme js code -->
<script src="{{asset('user_assets/js/app.js') }}"></script>

{{-- select2 script --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

{{-- custom js code --}}
<script src="{{asset('user_assets/js/customjs.js') }}"></script>
<!-- end scripting -->

</body>
</html>
