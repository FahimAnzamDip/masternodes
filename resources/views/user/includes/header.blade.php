<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <div class="mr-auto">
        <ul class="navbar-nav mr-3 d-block d-lg-none">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </div>
    <ul class="navbar-nav navbar-right">
        <li class="mr-4 mt-1 d-none d-md-block">
            <a href="" class="text-white"><strong>Coin A to BTC</strong></a>
        </li>
        <li class="mr-4 mt-1 d-none d-md-block">
            <a href="" class="text-white"><strong>Coin A to ETH</strong></a>
        </li>
        <li class="mr-4 mt-1 d-none d-md-block">
            <a href="" class="text-white"><strong>Coin A to MPC</strong></a>
        </li>
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
                <strong><i class="fab fa-bitcoin"></i> Balance: 1,000$</strong>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item border-bottom border-light" href="#">MPC</a>
                <a class="dropdown-item border-bottom border-light" href="#">BTC</a>
                <a class="dropdown-item border-bottom border-light" href="#">ETH</a>
                <a class="dropdown-item border-bottom border-light" href="#">LTC</a>
                <a class="dropdown-item border-bottom border-light" href="#">XRP</a>
                <a class="dropdown-item border-bottom border-light" href="#">USDT</a>
            </div>
        </li>

        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
                <i class="fas fa-user"></i> {{ Auth::user()->username }}
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('user.profile') }}" class="dropdown-item has-icon">
                    <i class="fas fa-user"></i> My Profile
                </a>

                <a href="{{ route('user.twofactor') }}" class="dropdown-item has-icon">
                    <i class="fas fa-bolt"></i> 2FA Activation
                </a>

                <a href="" class="dropdown-item has-icon">
                    <i class="fas fa-cogs"></i> KYC
                </a>

                <a href="{{ route('user.account.setting') }}" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Account Settings
                </a>

                <a href="" class="dropdown-item has-icon">
                    <i class="fas fa-bell"></i> Notification Settings
                </a>

                <a href="" class="dropdown-item has-icon">
                    <i class="fas fa-at"></i> Social Networks
                </a>

                <a href="" class="dropdown-item has-icon">
                    <i class="fas fa-dollar-sign"></i> Payment Method
                </a>

                <a href="" class="dropdown-item has-icon">
                    <i class="fas fa-check"></i> Security & Login
                </a>

                <div class="dropdown-divider"></div>

                <a href="" class="dropdown-item has-icon">
                    <i class="fas fa-credit-card"></i> View Balance
                </a>

                <a href="" class="dropdown-item has-icon">
                    <i class="fas fa-money-bill-alt"></i> Deposit
                </a>

                <a href="" class="dropdown-item has-icon">
                    <i class="fas fa-money-bill-wave"></i> Withdraw
                </a>

                <div class="dropdown-divider"></div>

                <a href="{{ route('user.support') }}" class="dropdown-item has-icon">
                    <i class="fas fa-hands-helping"></i> Support
                </a>

                <div class="dropdown-divider"></div>

                <a id="logout" href="#" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                    <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">
                        @csrf
                    </form>
                </a>
            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home.page') }}">
                <img class="my-2" style="width: 70px;" src="{{ asset('backend/assets/img/site_logo.png') }}" alt="site logo">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home.page') }}">MPP</a>
        </div>
        <ul class="sidebar-menu mt-2">
            <li class="menu-header">Calculator</li>
            <li class="nav-item border border-light {{ request()->is('user/calculator') ? 'active' : '' }}">
                <a href="{{ route('user.calculator') }}">
                    <i class="fas fa-money-check-alt"></i> Calculator
                </a>
            </li>

            <li class="menu-header">Masternodes</li>
            <li class="nav-item border border-light" data-toggle="tooltip" data-placement="top" title="Coming Soon">
                <a class="disabled btn" href="">
                    <i class="fas fa-calculator"></i> Available Masternodes
                </a>
            </li>
            <li class="nav-item border border-light" data-toggle="tooltip" data-placement="top" title="Coming Soon">
                <a class="disabled btn" href="">
                    <i class="fas fa-calculator"></i> My Masternodes
                </a>
            </li>
            <li class="nav-item border border-light" data-toggle="tooltip" data-placement="top" title="Coming Soon">
                <a class="disabled btn" href="">
                    <i class="fas fa-calculator"></i> Pending to Start
                </a>
            </li>

            <li class="menu-header">Offer/Bounties</li>
            <li class="nav-item border border-light">
                <a href="">
                    <i class="fas fa-box-open"></i> Live Bounties
                </a>
            </li>
            <li class="nav-item border border-light">
                <a href="">
                    <i class="fas fa-box-open"></i> Expired
                </a>
            </li>

            <li class="menu-header">Event Calender</li>
            <li class="nav-item border border-light" data-toggle="tooltip" data-placement="top" title="Coming Soon">
                <a class="disabled btn" href="">
                    <i class="fas fa-calendar-alt"></i> IEO
                </a>
            </li>
            <li class="nav-item border border-light {{ request()->is('user/event/calendar') ? 'active' : '' }}">
                <a href="{{ route('user.event.calendar') }}">
                    <i class="fas fa-calendar-alt"></i> Event
                </a>
            </li>
            <li class="nav-item border border-light" data-toggle="tooltip" data-placement="top" title="Coming Soon">
                <a class="disabled btn" href="">
                    <i class="fas fa-calendar-alt"></i> Program
                </a>
            </li>

            <li class="menu-header">News</li>
            <li class="nav-item border border-light">
                <a href="{{ route('blog.page') }}">
                    <i class="fas fa-newspaper"></i> Blog
                </a>
            </li>
        </ul>

    </aside>
</div>
