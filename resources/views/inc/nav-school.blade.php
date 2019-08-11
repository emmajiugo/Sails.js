<!-- Navigation for the school admin -->
<div id="list">
    <ul class="nav flex-column">
        <li class="nav-item"><a href="{{ route('school.dashboard') }}" class="nav-link {{ Request::is('school') ? 'active' : '' }}" ><i class="fa fa-adjust"></i>Dashboard</a></li>

        <!-- fee structure -->
        <li class="nav-item"><a href="#menu3" class="nav-link collapsed {{ Request::is('school/setup-fees') || Request::is('school/pay-staff') || Request::is('school/view-setup/*') || Request::is('school/advance-view') ? 'active' : '' }}" data-toggle="collapse"><i class="fa fa-fire"></i>Fees Structure<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
        <!-- start charts submenue -->
        <li class="sub collapse" id="menu3">
            <a href="/school/setup-fees" class="nav-link" data-parent="#menu3">Setup Fees</a>
            <a href="/school/pay-staff" class="nav-link" data-parent="#menu3">Pay Staff</a>
        </li>
        <!-- end charts submenue -->

        <!-- transactions -->
        <li class="nav-item"><a href="#menu4" class="nav-link collapsed {{ Request::is('school/report') || Request::is('school/history') ? 'active' : '' }}" data-toggle="collapse"><i class="fa fa-fire"></i>Transactions<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
        <!-- start charts submenue -->
        <li class="sub collapse" id="menu4">
            <a href="/school/report" class="nav-link" data-parent="#menu4">Report</a>
            <a href="/school/history" class="nav-link" data-parent="#menu4">History</a>
        </li>
        <!-- end charts submenue -->

        <li class="nav-item"><a href="/school/support-ticket" class="nav-link {{ Request::is('school/support-ticket') ? 'active' : '' }}"><i class="fa fa-money-bill-alt"></i>Support Ticket</a></li>

        <li class="nav-item"><a href="/school/settings" class="nav-link {{ Request::is('school/settings') ? 'active' : '' }}"><i class="fa fa-dollar-sign"></i>Settings</a></li>

        <li class="nav-item"><a href="/school/feedback" class="nav-link {{ Request::is('school/feedback') ? 'active' : '' }}"><i class="fa fa-life-ring"></i>Feedback</a></li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fa fa-power-off"></i> {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>
