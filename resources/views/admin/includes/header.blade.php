<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Notifications
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-icon bg-primary text-white">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            Template update is available now!
                            <div class="time text-primary">2 Min Ago</div>
                        </div>
                    </a>
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <i class="fas fa-user"></i> {{ Auth::user()->username }}
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('admin.profile') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> My Profile
                </a>

                <a href="{{ route('admin.account.setting') }}" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Account Settings
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
                <img class="mt-2" style="width: 70px;" src="{{ asset('backend/assets/img/site_logo.png') }}" alt="site logo">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home.page') }}">
                <img style="width: 40px;" src="{{ asset('backend/assets/img/site_logo.png') }}" alt="site logo">
            </a>
        </div>
        <ul class="sidebar-menu mt-2">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item {{ request()->is('admin/home') ? 'active' : '' }}">
                <a href="{{ route('admin.home') }}" class="nav-link">
                    <i class="fas fa-fire"></i><span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">User Management</li>
            <li class="nav-item {{ request()->is('admins*') ? 'active' : '' }}">
                <a href="{{ route('admins.index') }}" class="nav-link">
                    <i class="fas fa-user-astronaut"></i><span>Admins</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('users*') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="fas fa-users"></i><span>Users</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/users/kyc*') ? 'active' : '' }}">
                <a href="{{ route('admin.users.kyc') }}" class="nav-link">
                    <i class="fas fa-users-cog"></i><span>User KYC</span>
                </a>
            </li>

            <li class="menu-header">Coins</li>
            <li class="nav-item {{ request()->is('special-coins*') ? 'active' : '' }}">
                <a href="{{ route('special-coins.index') }}" class="nav-link">
                    <i class="fas fa-coins"></i> <span>Special Coins</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('normal-coins*') ? 'active' : '' }}">
                <a href="{{ route('normal-coins.index') }}" class="nav-link">
                    <i class="fab fa-bitcoin"></i> <span>Masternode Coins</span>
                </a>
            </li>

            <li class="menu-header">Blog</li>
            <li class="nav-item {{ request()->is('categories*') ? 'active' : '' }}">
                <a href="{{ route('categories.index') }}" class="nav-link">
                    <i class="fas fa-newspaper"></i> <span>Post Categories</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('posts*') ? 'active' : '' }}">
                <a href="{{ route('posts.index') }}" class="nav-link">
                    <i class="fas fa-newspaper"></i> <span>Posts</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('comments*') ? 'active' : '' }}">
                <a href="{{ route('comments.index') }}" class="nav-link">
                    <i class="fas fa-comment-alt"></i> <span>Comments <span class="badge badge-primary" style="width: 2rem;">{{ \Laravelista\Comments\Comment::where('approved', 0)->count() }}</span></span>
                </a>
            </li>

            <li class="menu-header">Contact</li>
            <li class="nav-item {{ request()->is('admin/contact-page*') ? 'active' : '' }}">
                <a href="{{ route('admin.contact-page') }}" class="nav-link">
                    <i class="fas fa-file-alt"></i> <span>Contact Page</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('messages*') ? 'active' : '' }}">
                <a href="{{ route('messages.index') }}" class="nav-link">
                    <i class="fas fa-envelope"></i> <span>Messages <span class="badge badge-primary" style="width: 2rem;">{{ \App\Models\Message::where('read', 0)->count() }}</span></span>
                </a>
            </li>

            <li class="menu-header">Event</li>
            <li class="nav-item {{ request()->is('admin/calendar') ? 'active' : '' }}">
                <a href="{{ route('admin.calendar') }}" class="nav-link">
                    <i class="fas fa-calendar-alt"></i> <span>Calendar</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('events*') ? 'active' : '' }}">
                <a href="{{ route('events.index') }}" class="nav-link">
                    <i class="fas fa-calendar-plus"></i> <span>Events</span>
                </a>
            </li>

            <li class="menu-header">Email List</li>
            <li class="nav-item {{ request()->is('newsletters*') ? 'active' : '' }}">
                <a href="{{ route('newsletters.index') }}" class="nav-link">
                    <i class="fas fa-envelope-square"></i> <span>Newsletters</span>
                </a>
            </li>

            <li class="menu-header">Stats</li>
            <li class="nav-item {{ request()->is('admin/stats*') ? 'active' : '' }}">
                <a href="{{ route('stats.index') }}" class="nav-link">
                    <i class="fas fa-chart-bar"></i> <span>Stats</span>
                </a>
            </li>

            <li class="menu-header">Clock</li>
            <li class="nav-item {{ request()->is('admin/countdown') ? 'active' : '' }}">
                <a href="{{ route('admin.countdown') }}" class="nav-link">
                    <i class="fas fa-clock"></i> <span>Countdown</span>
                </a>
            </li>
        </ul>

    </aside>
</div>
