<!-- Top Bar Start -->
<div class="topbar" id="topnav">

    <!-- Top navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="">
                        <a href="/school" class="logo">
                            <img src="{{asset('dashboard/assets/images/logo.png')}}" alt="logo" class="logo-lg" />
                            <img src="{{asset('dashboard/assets/images/logo_sm.png')}}" alt="logo" class="logo-sm hidden" />
                        </a>
                    </div>
                </div>

                <div class="navbar-custom navbar-left">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
                            <li>
                                <a href="/school"><span><i class="ti-home"></i></span><span> Dashboard </span> </a>
                            </li>

                            <li class="has-submenu">
                                <a href="#"> <span><i class="mdi mdi-cash-multiple"></i></span><span> Fee Structure </span> </a>
                                <ul class="submenu">
                                    <li><a href="/school/setup-fees">Setup Fees</a></li>
                                    <li><a href="/school/pay-staff">Pay Staff</a></li>
                                    <li><a href="/school/pay-bills">Pay Bills</a></li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"> <span><i class="mdi mdi-chart-areaspline"></i></span><span> Transactions </span> </a>
                                <ul class="submenu">
                                    <li><a href="/school/report">Reports</a></li>
                                    <li><a href="/school/history">History</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="/school/support-ticket"><span><i class="mdi mdi-headset"></i></span><span> Support Ticket </span> </a>
                            </li>

                            <li>
                                <a href="/school/settings"><span><i class="ti-settings m-r-10"></i></span><span> Settings </span> </a>
                            </li>

                            <li>
                                <a href="/school/feedback"><span><i class="mdi mdi-comment-multiple-outline"></i></span><span> Feedback </span> </a>
                            </li>

                        </ul>
                        <!-- End navigation menu  -->
                    </div>
                </div>

                <!-- Top nav Right menu -->
                <ul class="nav navbar-nav navbar-right top-navbar-items-right pull-right">
                    <li class="top-menu-item-xs">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>
                    {{-- <li class="dropdown top-menu-item-xs">
                        <a href="#" data-target="#" class="dropdown-toggle menu-right-item" data-toggle="dropdown" aria-expanded="true">
                            <i class="mdi mdi-bell"></i> <span class="label label-danger">3</span>
                        </a>
                        <ul class="dropdown-menu p-0 dropdown-menu-lg">
                            <!--<li class="notifi-title"><span class="label label-default pull-right">New 3</span>Notification</li>-->
                            <li class="list-group notification-list" style="height: 267px;">
                                <div class="slimscroll">
                                    <!-- list item-->
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="media-left p-r-10">
                                            <em class="fa fa-diamond bg-primary"></em>
                                            </div>
                                            <div class="media-body">
                                            <h5 class="media-heading">A new order has been placed A new order has been placed</h5>
                                            <p class="m-0">
                                                <small>There are new settings available</small>
                                            </p>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- list item-->
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="media-left p-r-10">
                                            <em class="fa fa-cog bg-warning"></em>
                                            </div>
                                            <div class="media-body">
                                            <h5 class="media-heading">New settings</h5>
                                            <p class="m-0">
                                                <small>There are new settings available</small>
                                            </p>
                                            </div>
                                        </div>
                                    </a>                                    
                                </div>
                            </li>
                        </ul>
                    </li> --}}

                    <li class="dropdown top-menu-item-xs">
                        <a href="" class="dropdown-toggle menu-right-item profile" data-toggle="dropdown" aria-expanded="true"><span><i class="mdi mdi-account-circle"></i></span> </a>
                        <ul class="dropdown-menu">
                            {{-- <li><a href="/school/feedback"><i class="ti-user m-r-10"></i> Feedback</a></li> --}}
                            <li><a href="/school/settings"><i class="ti-settings m-r-10"></i> Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="ti-power-off m-r-10"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div> <!-- end container -->
    </div> <!-- end navbar -->
</div>
<!-- Top Bar End -->