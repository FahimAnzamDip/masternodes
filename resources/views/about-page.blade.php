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
                    <span class="heboo-text">POS</span>
                </div><!-- end about-img-box -->
            </div><!-- end col-lg-5 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end about-area -->
<!-- ================================
       END ABOUT AREA
================================= -->

    @include('page-sections.newsletter')
@endsection
