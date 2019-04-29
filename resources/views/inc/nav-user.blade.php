<!-- Navigation for the user admin -->
<div id="list">
    <ul class="nav flex-column">
    <li class="nav-item"><a href="{{ route('user.dashboard') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}" ><i class="fa fa-adjust"></i>Dashboard</a></li>
    <li class="nav-item"><a href="#" class="nav-link {{ Request::is('home/savings-plan') ? 'active' : '' }}"><i class="fa fa-money-bill-alt"></i>Savings Plan <span class="badge badge-success">coming soon!</span></a></li>
    <li class="nav-item"><a href="{{ route('user.transaction') }}" class="nav-link {{ Request::is('home/transactions') ? 'active' : '' }}"><i class="fa fa-table"></i>Transactions</a></li>
    <li class="nav-item"><a href="{{ route('user.profile') }}" class="nav-link {{ Request::is('home/profile') ? 'active' : '' }}"><i class="fa fa-users"></i>profile</a></li>
    <li class="nav-item"><a href="{{ route('user.support') }}" class="nav-link {{ Request::is('home/support') ? 'active' : '' }}"><i class="fa fa-life-ring"></i>support</a></li>
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