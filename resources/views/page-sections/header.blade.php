<!-- ================================
        START HEADER AREA
================================= -->
<header class="header-area">
    <div class="header-menu-wrapper">
        <div class="container">
            <div class="row header-menu-row">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="{{ route('home.page') }}">
                            <img style="width: 50px" src="{{ asset('frontend/images/site_logo.png') }}" alt="site logo">
                        </a>
                    </div>
                    <!-- end logo -->
                </div>
                <!-- end col-lg-3-->
                <div class="col-lg-9 main-menu-wrapper">
                    <div class="main-menu-content">
                        <nav>
                            <ul>
                                <li>
                                    <a href="{{ route('home.page') }}">home</a>
                                </li>
                                <li>
                                    <a href="{{ route('masternodes.page') }}">masternodes</a>
                                </li>
                                <li>
                                    <a href="{{ route('transactions.page') }}">transactions</a>
                                </li>
                                <li>
                                    <a href="{{ route('about.page') }}">about</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact.page') }}">contact us</a>
                                </li>
                                <li><a href="{{ route('blog.page') }}">Blog</a></li>
                                @guest
                                    <li>
                                        <a href="{{ route('login') }}"><i class="fa fa-sign-in-alt"></i> Login</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('register') }}"><i class="fa fa-user-plus"></i> Sign up</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ Auth::user()->role == 1 ? route('admin.home') : route('user.home') }}"><i class="fa fa-user"></i> {{ Auth::user()->username }}</a>
                                    </li>
                                    <li>
                                        <a id="logout" href="#"><i class="fa fa-sign-out-alt"></i> Logout</a>

                                        <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                @endguest
                            </ul>
                        </nav>
                        <div class="logo-right-button">
                            <div class="side-menu-open">
                                <span class="menu__bar"></span>
                                <span class="menu__bar"></span>
                                <span class="menu__bar"></span>
                            </div>
                            <!-- end side-menu-open -->
                        </div>
                        <!-- end logo-right-button -->
                    </div>
                    <!-- end main-menu-content -->
                </div>
                <!-- end col-lg-9 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end header-menu-wrapper -->
    <div class="side-nav-container">
        <div class="humburger-menu">
            <div class="humburger-menu-lines side-menu-close"></div>
            <!-- end humburger-menu-lines -->
        </div>
        <!-- end humburger-menu -->
        <div class="side-menu-wrap">
            <ul class="side-menu-ul">
                <li class="sidenav__item">
                    <a href="{{ route('home.page') }}">home</a>
                </li>
                <li class="sidenav__item">
                    <a href="{{ route('masternodes.page') }}">masternodes</a>
                </li>
                <li class="sidenav__item">
                    <a href="{{ route('transactions.page') }}">transactions</a>
                </li>
                <li class="sidenav__item">
                    <a href="{{ route('about.page') }}">about</a>
                </li>
                <li class="sidenav__item">
                    <a href="{{ route('contact.page') }}">contact us</a>
                </li>
                <li class="sidenav__item">
                    <a href="{{ route('blog.page') }}">blog</a>
                </li>
                @guest
                    <li class="sidenav__item sidenav__item2 text-center">
                        <a href="{{ route('login') }}"><i class="fa fa-sign-in-alt"></i> Log In</a>
                    </li>
                    <li class="sidenav__item sidenav__item2 text-center">
                        <a href="{{ route('register') }}"><i class="fa fa-user-plus"></i> Sign Up</a>
                    </li>
                @else
                    <li class="sidenav__item sidenav__item2 text-center">
                        <a href="{{ Auth::user()->role == 1 ? route('admin.home') : route('user.home')}}"><i class="fa fa-user"></i> {{ Auth::user()->username }}</a>
                    </li>
                    <li class="sidenav__item sidenav__item2 text-center">
                        <a id="logout" href="#"><i class="fa fa-sign-out-alt"></i> Logout</a>
                        <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
        <!-- end side-menu-wrap -->
    </div>
    <!-- end side-nav-container -->
</header>
<!-- ================================
     END HEADER AREA
================================= -->
