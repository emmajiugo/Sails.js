<!-- Navigation for the user admin -->
<div id="list">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('user.dashboard') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}" >
                <i class="fa fa-tachometer-alt"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link {{ Request::is('home/savings-plan') ? 'active' : '' }}">
                <i class="fa fa-money-bill-alt"></i>Savings Plan
                <span class="badge badge-success"> coming soon!</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user.invoice') }}" class="nav-link {{ Request::is('home/invoices') || Request::is('home/invoice/*') ? 'active' : '' }}">
                <i class="fa fa-file-alt"></i> Invoices
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user.profile') }}" class="nav-link {{ Request::is('home/profile') ? 'active' : '' }}">
                <i class="fa fa-user"></i> Profile
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user.support') }}" class="nav-link {{ Request::is('home/support') || Request::is('home/support/*') ? 'active' : '' }}">
                <i class="fa fa-phone-alt"></i> Support
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fa fa-power-off"></i> {{  __('Logout')  }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>
