@extends('layouts.front-layout')

@section('content')
<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">
                    <div class="breadcrumb-inner">
                        <h2 class="breadcrumb__title">about us.</h2>
                        <ul class="breadcrumb__list">
                            <li class="active__list-item"><a href="{{ route('home.page') }}">home</a></li>
                            <li>about us</li>
                        </ul>
                    </div><!-- end breadcrumb-inner -->
                    <div class="text-outline">about us</div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end hero-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
       START ABOUT AREA
================================= -->
<section class="about-area about-area3">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-item">
                    <div class="sec-heading">
                        <div class="heading-circle"></div>
                        <p class="sec__meta">learn about us</p>
                        <h2 class="sec__title">Awards Winning Digital Cryptocurrency Platform.</h2>
                        <p class="sec__desc sec__desc2">
                            <span class="sec-year-time">30</span> Years of experience in digital cryptocurrency
                            business Lorem ipsum dolor sit amet
                        </p>
                        <p class="sec__desc">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Aliquid at cquie consequatur deserunt dignissimos excepturi illo ipsa ipsum minima,
                            obcaecati officiis qui quidem quos, sunt unde, voluptas.
                        </p>
                        <p class="sec__desc">
                            Sed ut perspiciatis unde omnis iste natus error
                            sit voluptatem accu santium doloreque laudantum.
                        </p>
                    </div><!-- end sec-heading -->
                </div><!-- end about-item -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-5 ml-auto">
                <div class="about-img-box">
                    <img src="{{ asset('frontend') }}/images/about-img.jpg" alt="about-us" class="about-img">
                    <img src="{{ asset('frontend') }}/images/about-img2.jpg" alt="about-us" class="about-img">
                    <a class="mfp-iframe video-play-btn" href="https://www.youtube.com/watch?v=GmOzih6I1zs" title="Play Video">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <span class="heboo-text">BITCON</span>
                </div><!-- end about-img-box -->
            </div><!-- end col-lg-5 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end about-area -->
<!-- ================================
       START ABOUT AREA
================================= -->


<!-- ================================
       START TEAM AREA
================================= -->
<section class="team-area text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="sec-heading">
                    <div class="heading-circle m-x-auto"></div>
                    <p class="sec__meta">our team member</p>
                    <h2 class="sec__title m-x-auto">Meet Our Awesome Bitcoin Experts.</h2>
                </div><!-- end sec-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row team-experts-wrapper">
            <div class="col-lg-3 col-sm-6">
                <div class="team-item">
                    <div class="team-img-box">
                        <img src="{{ asset('frontend') }}/images/team1.jpg" alt="team image" class="team__img">
                    </div>
                    <div class="team-content">
                        <h3 class="team__title"><a href="team-single.html">adam smith</a></h3>
                        <span class="team__meta">cEO & founder</span>
                        <ul class="team__social">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div><!-- end team-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 col-sm-6">
                <div class="team-item">
                    <div class="team-img-box">
                        <img src="{{ asset('frontend') }}/images/team2.jpg" alt="team image" class="team__img">
                    </div>
                    <div class="team-content">
                        <h3 class="team__title"><a href="team-single.html">pam sharon</a></h3>
                        <span class="team__meta">director</span>
                        <ul class="team__social">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div><!-- end team-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 col-sm-6">
                <div class="team-item">
                    <div class="team-img-box">
                        <img src="{{ asset('frontend') }}/images/team3.jpg" alt="team image" class="team__img">
                    </div>
                    <div class="team-content">
                        <h3 class="team__title"><a href="team-single.html">richard pam</a></h3>
                        <span class="team__meta">bitcoin consultant</span>
                        <ul class="team__social">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div><!-- end team-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 col-sm-6">
                <div class="team-item">
                    <div class="team-img-box">
                        <img src="{{ asset('frontend') }}/images/team4.jpg" alt="team image" class="team__img">
                    </div>
                    <div class="team-content">
                        <h3 class="team__title"><a href="team-single.html">marco wise</a></h3>
                        <span class="team__meta">bitcoin developer</span>
                        <ul class="team__social">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div><!-- end team-item -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end team-area -->
<!-- ================================
       START TEAM AREA
================================= -->

<!-- ================================
       START CLIENTLOGO AREA
================================= -->
<section class="clientlogo-area clientlogo-area2">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="sec-heading">
                    <div class="heading-circle"></div>
                    <p class="sec__meta">they trust us</p>
                    <h2 class="sec__title">Trusted by Bitcoin Business.</h2>
                </div><!-- end sec-heading -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-7">
                <div class="client-logo2">
                    <div class="client-logo-item">
                        <img src="{{ asset('frontend') }}/images/client1.png" alt="brand image">
                    </div><!-- end client-logo-item -->
                    <div class="client-logo-item">
                        <img src="{{ asset('frontend') }}/images/client2.png" alt="brand image">
                    </div><!-- end client-logo-item -->
                    <div class="client-logo-item">
                        <img src="{{ asset('frontend') }}/images/client3.png" alt="brand image">
                    </div><!-- end client-logo-item -->
                    <div class="client-logo-item">
                        <img src="{{ asset('frontend') }}/images/client4.png" alt="brand image">
                    </div><!-- end client-logo-item -->
                    <div class="client-logo-item">
                        <img src="{{ asset('frontend') }}/images/client5.png" alt="brand image">
                    </div><!-- end client-logo-item -->
                </div><!-- end client-logo -->
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end clientlogo-area -->
<!-- ================================
       START CLIENTLOGO AREA
================================= -->

    @include('page-sections.newsletter')
@endsection
