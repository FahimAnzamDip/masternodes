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
                            <h2 class="breadcrumb__title">blog.</h2>
                            <ul class="breadcrumb__list">
                                <li class="active__list-item"><a href="{{ route('home.page') }}">home</a></li>
                                <li>blog</li>
                            </ul>
                        </div><!-- end breadcrumb-inner -->
                        <div class="text-outline">blog</div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end hero-area -->
    <!-- ================================
        END BREADCRUMB AREA
    ================================= -->

    <!-- ================================
           START BLOG AREA
    ================================= -->
    <section class="blog-area blog-grid">
        <div class="container">
            <div class="row blog-post-wrapper">
                <div class="col-lg-4 col-sm-6">
                    <div class="blog-post-item">
                        <div class="blog-post-img">
                            <a href="blog-single.html">
                                <img src="{{ asset('frontend') }}/images/blog-img1.jpg" alt="blog image" class="blog__img">
                            </a>
                            <div class="blog__date">
                                <span>01 jan 2019</span>
                            </div><!-- end blog__date -->
                        </div><!-- end blog-post-img -->
                        <div class="blog-post-body">
                            <div class="blog-title">
                                <a href="blog-single.html" class="blog__title">
                                    How Cryptocurrency Begun and Its Impact To Financial
                                </a>
                            </div>
                            <ul class="blog__panel">
                                <li><i class="fa fa-user"></i> By
                                    <a href="#" class="blog-admin-name">David wayse</a>
                                </li>
                                <li>
                                    <a href="blog-single.html" class="blog-admin-btn">
                                        Continue
                                    </a>
                                </li>
                            </ul>
                        </div><!-- end blog-post-body -->
                    </div><!-- end blog-post-item -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4 col-sm-6">
                    <div class="blog-post-item">
                        <div class="blog-post-img">
                            <a href="blog-single.html">
                                <img src="{{ asset('frontend') }}/images/blog-img2.jpg" alt="blog image" class="blog__img">
                            </a>
                            <div class="blog__date">
                                <span>09 feb 2019</span>
                            </div><!-- end blog__date -->
                        </div><!-- end blog-post-img -->
                        <div class="blog-post-body">
                            <div class="blog-title">
                                <a href="blog-single.html" class="blog__title">
                                    Cryptocurrency - Who Are Involved With It?
                                </a>
                            </div>
                            <ul class="blog__panel">
                                <li><i class="fa fa-user"></i> By
                                    <a href="#" class="blog-admin-name">Mike doe</a>
                                </li>
                                <li>
                                    <a href="blog-single.html" class="blog-admin-btn">
                                        Continue
                                    </a>
                                </li>
                            </ul>
                        </div><!-- end blog-post-body -->
                    </div><!-- end blog-post-item -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4 col-sm-6">
                    <div class="blog-post-item">
                        <div class="blog-post-img">
                            <a href="blog-single.html">
                                <img src="{{ asset('frontend') }}/images/blog-img3.jpg" alt="blog image" class="blog__img">
                            </a>
                            <div class="blog__date">
                                <span>25 mar 2019</span>
                            </div><!-- end blog__date -->
                        </div><!-- end blog-post-img -->
                        <div class="blog-post-body">
                            <div class="blog-title">
                                <a href="blog-single.html" class="blog__title">
                                    Risks & Rewards Of Investing In Bitcoin. Pros and Cons
                                </a>
                            </div>
                            <ul class="blog__panel">
                                <li><i class="fa fa-user"></i> By
                                    <a href="#" class="blog-admin-name">Jhon doe</a>
                                </li>
                                <li>
                                    <a href="blog-single.html" class="blog-admin-btn">
                                        Continue
                                    </a>
                                </li>
                            </ul>
                        </div><!-- end blog-post-body -->
                    </div><!-- end blog-post-item -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4 col-sm-6">
                    <div class="blog-post-item">
                        <div class="blog-post-img">
                            <a href="blog-single.html">
                                <img src="{{ asset('frontend') }}/images/blog-img3.jpg" alt="blog image" class="blog__img">
                            </a>
                            <div class="blog__date">
                                <span>01 jan 2019</span>
                            </div><!-- end blog__date -->
                        </div><!-- end blog-post-img -->
                        <div class="blog-post-body">
                            <div class="blog-title">
                                <a href="blog-single.html" class="blog__title">
                                    How Cryptocurrency Begun and Its Impact To Financial
                                </a>
                            </div>
                            <ul class="blog__panel">
                                <li><i class="fa fa-user"></i> By
                                    <a href="#" class="blog-admin-name">David wayse</a>
                                </li>
                                <li>
                                    <a href="blog-single.html" class="blog-admin-btn">
                                        Continue
                                    </a>
                                </li>
                            </ul>
                        </div><!-- end blog-post-body -->
                    </div><!-- end blog-post-item -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4 col-sm-6">
                    <div class="blog-post-item">
                        <div class="blog-post-img">
                            <a href="blog-single.html">
                                <img src="{{ asset('frontend') }}/images/blog-img2.jpg" alt="blog image" class="blog__img">
                            </a>
                            <div class="blog__date">
                                <span>09 feb 2019</span>
                            </div><!-- end blog__date -->
                        </div><!-- end blog-post-img -->
                        <div class="blog-post-body">
                            <div class="blog-title">
                                <a href="blog-single.html" class="blog__title">
                                    Cryptocurrency - Who Are Involved With It?
                                </a>
                            </div>
                            <ul class="blog__panel">
                                <li><i class="fa fa-user"></i> By
                                    <a href="#" class="blog-admin-name">Mike doe</a>
                                </li>
                                <li>
                                    <a href="blog-single.html" class="blog-admin-btn">
                                        Continue
                                    </a>
                                </li>
                            </ul>
                        </div><!-- end blog-post-body -->
                    </div><!-- end blog-post-item -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4 col-sm-6">
                    <div class="blog-post-item">
                        <div class="blog-post-img">
                            <a href="blog-single.html">
                                <img src="{{ asset('frontend') }}/images/blog-img1.jpg" alt="blog image" class="blog__img">
                            </a>
                            <div class="blog__date">
                                <span>25 mar 2019</span>
                            </div><!-- end blog__date -->
                        </div><!-- end blog-post-img -->
                        <div class="blog-post-body">
                            <div class="blog-title">
                                <a href="blog-single.html" class="blog__title">
                                    Risks & Rewards Of Investing In Bitcoin. Pros and Cons
                                </a>
                            </div>
                            <ul class="blog__panel">
                                <li><i class="fa fa-user"></i> By
                                    <a href="#" class="blog-admin-name">Jhon doe</a>
                                </li>
                                <li>
                                    <a href="blog-single.html" class="blog-admin-btn">
                                        Continue
                                    </a>
                                </li>
                            </ul>
                        </div><!-- end blog-post-body -->
                    </div><!-- end blog-post-item -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="pagination-wrap text-center">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- end pagination-wrap -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end blog-area -->
    <!-- ================================
           END BLOG AREA
    ================================= -->
@endsection
