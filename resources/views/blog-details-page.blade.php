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
                            <h2 class="breadcrumb__title">blog detail.</h2>
                            <ul class="breadcrumb__list">
                                <li class="active__list-item"><a href="{{ route('home.page') }}">home</a></li>
                                <li class="active__list-item"><a href="{{ route('blog.page') }}">blog</a></li>
                                <li>blog detail</li>
                            </ul>
                        </div><!-- end breadcrumb-inner -->
                        <div class="text-outline">blog detail</div>
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
    <section class="blog-area blog-single-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-post-wrapper">
                        <div class="blog-post-item">
                            <div class="blog-post-img">
                                <img src="{{ asset('frontend') }}/images/blog-img8.jpg" alt="blog image" class="blog__img">
                                <div class="blog__date">
                                    <span>22</span>
                                    <span>jan, 2019</span>
                                </div><!-- end blog__date -->
                            </div><!-- end blog-post-img -->
                            <div class="blog-post-body">
                                <ul class="post__meta">
                                    <li>By <a href="#">Techydevs</a></li>
                                    <li><i class="fa fa-comment-dots"></i><a href="#"> 6 Comments</a></li>
                                    <li><i class="fa fa-tags"></i><a href="#"> market,</a></li>
                                    <li><a href="#">cryptocurrency,</a></li>
                                    <li><a href="#">trading</a></li>
                                </ul>
                                <a href="blog-single.html" class="blog__title">
                                    How Cryptocurrency Begun and Its Impact to financial transactions.
                                </a>
                                <p class="blog__desc">
                                    Investig ationes demons trave runt lectores legere liusry quod ii
                                    legunt saepius claritas Investig ationes. Pharetra dui,
                                    nec tincidunt ante mauris eu diam. Phasellus viverra nisl
                                    vitae cursus aei uismod suspendisse saepius claritas investig.
                                    Lorem ipsum dolor sit amet, consectet adipiscing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magnag aliqua.
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                    laborinu aliquip ex ea commodo consequat. Du aute irure dolor
                                    in reprehenderit inlore voluptate velit esse cillum dolore.
                                </p>
                                <p class="blog__desc">
                                    Mauris nunc leo, sollicitudin a ligula ut, iaculis bibendum lorem.
                                    Duis gravida suscipit purus, at consequat de diam sagittis sit amet.
                                    Mauris sed nisl vel urna egestas elementum eget quis ipsum. Nulla
                                    a enim et justoed facilisis ornare.
                                </p>
                                <blockquote class="blockquote-box">
                                    <h4>Amand Seyfried<span> Founder & CEO, Arcade Systems</span></h4>
                                    <i class="fa fa-quote-left"></i>
                                    <p>
                                        There are no secrets to success. It is the result of preparation,
                                        hard work, and learning from failure. Lorem ipsum dolor sit amet,
                                        consectetur adipisicing elit. Alias dignissimos dolorem ipsam
                                        maiores odio perferendis rem sed
                                    </p>
                                </blockquote>
                                <p class="blog__desc">
                                    Cras eget sollicitudin lorem. Etiam commodo ultricies luctus.
                                    Integer porttitor ligula eget quam blandit finibus. Suspendisse potenti. Nulla blandit augue orci,
                                    eget tristique massa fermentum sed. Duis ac maximus nulla, et pharetra turpis.
                                </p>
                                <div class="tags-item">
                                    <ul class="tag__list">
                                        <li><span>Tags:</span></li>
                                        <li><a href="#">coin</a></li>
                                        <li><a href="#">security</a></li>
                                        <li><a href="#">wallet</a></li>
                                    </ul>
                                    <ul class="social__links">
                                        <li><span>Share:</span></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div><!-- end tags-item -->
                                <div class="comments-wrapper">
                                    <h3 class="comments-title">3 Comments.</h3>
                                    <ul class="comments-list">
                                        <li>
                                            <div class="comment">
                                                <img class="avatar__img" alt="" src="{{ asset('frontend') }}/images/small-team1.jpg">
                                                <div class="comment-body">
                                                    <div class="meta-data">
                                                        <span class="comment__author">adam smith</span>
                                                        <span class="comment__date">17 Dec, 2018 - 4:00 pm</span>
                                                    </div>
                                                    <p class="comment-content">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                        Ut enim ad minim veniam, quis nostrud exercitation.
                                                    </p>
                                                    <div class="comment-reply">
                                                        <a class="comment__btn" href="#">Reply</a>
                                                        <p class="helpful__box">
                                                            Was this review helpful...?
                                                            <span><i class="fa fa-smile"></i> yes</span>
                                                            <span><i class="fa fa-thumbs-down"></i> no</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div><!-- end comment -->
                                            <ul class="comments-reply">
                                                <li>
                                                    <div class="comment">
                                                        <img class="avatar__img" alt="" src="{{ asset('frontend') }}/images/small-team2.jpg">
                                                        <div class="comment-body">
                                                            <div class="meta-data">
                                                                <span class="comment__author">Mark doe</span>
                                                                <span class="comment__date">20 Mar, 2018 -3:00 pm</span>
                                                            </div>
                                                            <p class="comment-content">
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                                Ut enim ad minim veniam.
                                                            </p>
                                                            <div class="comment-reply">
                                                                <a class="comment__btn" href="#">Reply</a>
                                                                <p class="helpful__box">
                                                                    Was this review helpful...?
                                                                    <span><i class="fa fa-smile"></i> yes</span>
                                                                    <span><i class="fa fa-thumbs-down"></i> no</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul><!-- end comment -->
                                            <div class="comment">
                                                <img class="avatar__img" alt="" src="{{ asset('frontend') }}/images/small-team3.jpg">
                                                <div class="comment-body">
                                                    <div class="meta-data">
                                                        <span class="comment__author">alex smith</span>
                                                        <span class="comment__date">10 Jan, 2019 - 6:00 pm</span>
                                                    </div>
                                                    <p class="comment-content">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                        Ut enim ad minim veniam, quis nostrud exercitation.
                                                    </p>
                                                    <div class="comment-reply">
                                                        <a class="comment__btn" href="#">Reply</a>
                                                        <p class="helpful__box">
                                                            Was this review helpful...?
                                                            <span><i class="fa fa-smile"></i> yes</span>
                                                            <span><i class="fa fa-thumbs-down"></i> no</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div><!-- end comment -->
                                        </li>
                                    </ul>
                                    <div class="contact-form-action">
                                        <h3 class="comments-title leave-title">Leave Your Comment.</h3>
                                        <p class="leave-desc">Your email address will not be published. Required fields are marked *</p>
                                        <!--Contact Form-->
                                        <form method="post">
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-12 form-group">
                                                    <input class="form-control" type="text" name="name" placeholder="Name" required="">
                                                </div><!-- end col-lg-12 -->

                                                <div class="col-lg-6 col-sm-12 form-group">
                                                    <input class="form-control" type="email" name="email" placeholder="Email" required="">
                                                </div><!-- end col-lg-12 -->
                                                <div class="col-lg-12 col-sm-12 form-group">
                                                    <input class="form-control" type="text" name="text" placeholder="Website">
                                                </div><!-- end col-lg-12 -->
                                                <div class="col-lg-12 col-sm-12 form-group">
                                                    <textarea class="message-control form-control" name="message" placeholder="Write Message"></textarea>
                                                </div><!-- end col-lg-12 -->
                                                <div class="col-lg-12 col-sm-12 col-xs-12 form-group">
                                                    <div class="custom-checkbox">
                                                        <input type="checkbox" id="chb1">
                                                        <label for="chb1">Save my name, and email in this browser for the next time I comment.</label>
                                                    </div>
                                                </div><!-- end col-lg-12 -->
                                                <div class="col-lg-12 col-sm-12 col-xs-12 form-group">
                                                    <button class="theme-btn" type="submit">Submit Comment</button>
                                                </div><!-- end col-lg-12 -->
                                            </div><!-- end row -->
                                        </form>
                                    </div><!-- end contact-form-action -->
                                </div><!-- end comments-wrapper -->
                            </div><!-- end blog-post-body -->
                        </div><!-- end blog-post-item -->
                    </div><!-- end blog-post-wrapper -->
                </div><!-- end col-lg-8-->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-widget contact-form-action">
                            <form method="post">
                                <div class="form-group">
                                    <input class="form-control" type="search" name="name-field" placeholder="Search here">
                                    <button type="button" class="search__btn"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget category-widget">
                            <h3 class="widget__title">
                                Categories.
                                <span class="footer-title-shape"></span>
                                <span class="footer-title-shape"></span>
                                <span class="footer-title-shape"></span>
                            </h3>
                            <ul class="widget__list cat__list">
                                <li><a href="#">All topics & tips <span>08</span></a></li>
                                <li><a href="#">Bitcoin <span>10</span></a></li>
                                <li><a href="#">Banking <span>21</span></a></li>
                                <li><a href="#">Security <span>11</span></a></li>
                                <li><a href="#">merchant service <span>14</span></a></li>
                                <li><a href="#">trader service<span>05</span></a></li>
                                <li><a href="#">account assistance <span>17</span></a></li>
                            </ul>
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget archive-widget">
                            <h3 class="widget__title">
                                Archives.
                                <span class="footer-title-shape"></span>
                                <span class="footer-title-shape"></span>
                                <span class="footer-title-shape"></span>
                            </h3>
                            <ul class="widget__list arc__list">
                                <li><a href="#">January 2018</a></li>
                                <li><a href="#">December 2017</a></li>
                                <li><a href="#">November 2017</a></li>
                                <li><a href="#">October 2017</a></li>
                                <li><a href="#">September 2017</a></li>
                            </ul>
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget recent-widget">
                            <h3 class="widget__title">
                                Recent Posts.
                                <span class="footer-title-shape"></span>
                                <span class="footer-title-shape"></span>
                                <span class="footer-title-shape"></span>
                            </h3>
                            <div class="recent-item">
                                <div class="recent-img">
                                    <a href="blog-single.html">
                                        <img src="{{ asset('frontend') }}/images/blog-img15.jpg" alt="blog image">
                                    </a>
                                </div><!-- end recent-img -->
                                <div class="recentpost-body">
                                    <span class="recent__meta"> 12 Jan, 2019 by <a href="#">Techydevs</a></span>
                                    <h4 class="recent__link">
                                        <a href="blog-single.html">Risks & Rewards Of Investing In Bitcoin</a>
                                    </h4>
                                </div><!-- end recent-img -->
                            </div><!-- end recent-item -->
                            <div class="recent-item">
                                <div class="recent-img">
                                    <a href="blog-single.html">
                                        <img src="{{ asset('frontend') }}/images/blog-img16.jpg" alt="blog image">
                                    </a>
                                </div><!-- end recent-img -->
                                <div class="recentpost-body">
                                    <span class="recent__meta"> 14 Jan, 2019 by <a href="#">Techydevs</a></span>
                                    <h4 class="recent__link">
                                        <a href="blog-single.html">Cryptocurrency - Who Are Involved With It?</a>
                                    </h4>
                                </div><!-- end recent-img -->
                            </div><!-- end recent-item -->
                            <div class="recent-item">
                                <div class="recent-img">
                                    <a href="blog-single.html">
                                        <img src="{{ asset('frontend') }}/images/blog-img17.jpg" alt="blog image">
                                    </a>
                                </div><!-- end recent-img -->
                                <div class="recentpost-body">
                                    <span class="recent__meta"> 15 Jan, 2019 by <a href="#">Techydevs</a></span>
                                    <h4 class="recent__link">
                                        <a href="blog-single.html">How Cryptocurrency Begun and Its Impact</a>
                                    </h4>
                                </div><!-- end recent-img -->
                            </div><!-- end recent-item -->
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget tag-widget">
                            <h3 class="widget__title">
                                tag cloud.
                                <span class="footer-title-shape"></span>
                                <span class="footer-title-shape"></span>
                                <span class="footer-title-shape"></span>
                            </h3>
                            <ul class="widget__list tag__list">
                                <li><a href="#">currency</a></li>
                                <li><a href="#">crypto</a></li>
                                <li><a href="#">trading</a></li>
                                <li><a href="#">wallet</a></li>
                                <li><a href="#">mining</a></li>
                                <li><a href="#">market</a></li>
                                <li><a href="#">transaction</a></li>
                                <li><a href="#">financial</a></li>
                                <li><a href="#">security</a></li>
                            </ul>
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget contact-form-action subscribe-form">
                            <h3 class="widget__title">
                                Stay Updated.
                                <span class="footer-title-shape"></span>
                                <span class="footer-title-shape"></span>
                                <span class="footer-title-shape"></span>
                            </h3>
                            <form method="post">
                                <div class="form-group">
                                    <input class="form-control" type="email" name="email" placeholder="Enter email address">
                                    <button type="button" class="theme-btn">Subscribe</button>
                                </div>
                            </form>
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget social-widget">
                            <h3 class="widget__title">
                                connect with us.
                                <span class="footer-title-shape"></span>
                                <span class="footer-title-shape"></span>
                                <span class="footer-title-shape"></span>
                            </h3>
                            <ul class="social__links">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Google Plus"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div><!-- end sidebar-widget -->
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end blog-area -->
    <!-- ================================
           START BLOG AREA
    ================================= -->
@endsection
