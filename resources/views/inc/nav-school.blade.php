<!-- Navigation for the school admin -->
<div id="list">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('school.dashboard') }}" class="nav-link {{ Request::is('school') ? 'active' : '' }}" >
                <i class="fa fa-tachometer-alt"></i> Dashboard
            </a>
        </li>

        <!-- fee structure -->
        <li class="nav-item">
            <a href="#menu3" class="nav-link collapsed {{ Request::is('school/setup-fees') || Request::is('school/view-setup/*') || Request::is('school/advance-view') ? 'active' : '' }}" data-toggle="collapse">
                <i class="fa fa-fill"></i> Fees Structure
                <span class="sub-ico">
                    <i class="fa fa-angle-down"></i>
                </span>
            </a>
        </li>
        <!-- start submenu -->
        <li class="sub collapse" id="menu3">
            <a href="{{ route('school.setup.fees') }}" class="nav-link" data-parent="#menu3">Setup Fees</a>
            <a href="{{ route('school.advance.view') }}" class="nav-link" data-parent="#menu3">Advance View</a>
        </li>
        <!-- end submenu -->

        <!-- transactions -->
        <li class="nav-item">
            <a href="#menu4" class="nav-link collapsed {{ Request::is('school/report') || Request::is('school/history') || Request::is('school/withdraw-history') ? 'active' : '' }}" data-toggle="collapse">
                <i class="fa fa-chart-bar"></i> Transactions
                <span class="sub-ico">
                    <i class="fa fa-angle-down"></i>
                </span>
            </a>
        </li>
        <!-- start submenu -->
        <li class="sub collapse" id="menu4">
            <a href="/school/report" class="nav-link" data-parent="#menu4">Report</a>
            <a href="{{ route('school.transaction.history') }}" class="nav-link" data-parent="#menu4">History</a>
            <a href="{{ route('withdraw.history') }}" class="nav-link" data-parent="#menu4">Withdraw History</a>
        </li>
        <!-- end submenu -->


        <li class="nav-item">
            <a href="{{ route('school.support.ticket') }}" class="nav-link {{ Request::is('school/support-ticket') || Request::is('school/support-ticket/*') ? 'active' : '' }}">
                <i class="fa fa-phone-alt"></i> Support Ticket
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('school.feedback') }}" class="nav-link {{ Request::is('school/feedback') ? 'active' : '' }}">
                <i class="fa fa-comment-dots"></i> Feedback
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('school.settings') }}" class="nav-link {{ Request::is('school/settings') ? 'active' : '' }}">
                <i class="fa fa-cogs"></i> Settings
            </a>
        </li>

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
