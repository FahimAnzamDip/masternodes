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
                            <h2 class="breadcrumb__title">blog details.</h2>
                            <ul class="breadcrumb__list">
                                <li class="active__list-item"><a href="{{ route('home.page') }}">home</a></li>
                                <li class="active__list-item"><a href="{{ route('blog.page') }}">blog</a></li>
                                <li>{{ Str::words($post->post_title, 2, '...') }}</li>
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
                                <img src="{{ asset('storage/post_images') . '/' . $post->post_thumbnail }}" alt="blog image" class="blog__img">
                                <div class="blog__date">
                                    <span>{{ $post->created_at->format('jS F Y') }}</span>
                                </div><!-- end blog__date -->
                            </div><!-- end blog-post-img -->
                            <div class="blog-post-body">
                                <ul class="post__meta">
                                    <li>By <a href="#">{{ $post->user->username }}</a></li>
                                    <li><i class="fa fa-comment-dots"></i><a href="#"> 6 Comments</a></li>
                                    @php
                                        $tags = explode(',', $post->post_tags);
                                    @endphp
                                    <li class="ml-1"><i class="fa fa-tags"></i></li>
                                    @foreach($tags as $tag)
                                        <li><a href="#"> {{ $tag }} |</a></li>
                                    @endforeach
                                </ul>
                                <a href="{{ route('posts.show', $post->slug) }}" class="blog__title">
                                    {{ $post->post_title }}
                                </a>

                                <div class="post-content">
                                    {!! $post->post_content !!}
                                </div>

                                <div class="tags-item">
                                    <ul class="tag__list d-flex flex-wrap">
                                        <li><span>Tags:</span></li>
                                        @foreach($tags as $tag)
                                            <li><a href="#"> {{ $tag }}</a></li>
                                        @endforeach
                                    </ul>
                                    <ul class="social__links">
                                        <li><span>Share:</span></li>
                                        <div class="addthis_inline_share_toolbox"></div>
                                    </ul>
                                </div><!-- end tags-item -->
                                <div class="comments-wrapper">
                                    <h3 class="comments-title mb-4">{{ $post->comments()->where('approved', 1)->count() }} Comments.</h3>
                                    @if(session('status'))
                                        {{ session('status') }}
                                    @endif

                                    @comments([
                                        'model' => $post,
                                        'approved' => true
                                    ])
                                </div><!-- end comments-wrapper -->
                            </div><!-- end blog-post-body -->
                        </div><!-- end blog-post-item -->
                    </div><!-- end blog-post-wrapper -->
                </div><!-- end col-lg-8-->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-widget category-widget">
                            <h3 class="widget__title">
                                Categories.
                                <span class="footer-title-shape"></span>
                                <span class="footer-title-shape"></span>
                                <span class="footer-title-shape"></span>
                            </h3>
                            <ul class="widget__list cat__list">
                                @foreach($categories as $category)
                                    <li><a href="{{ route('blog.page', ['category_id' => $category->id]) }}">{{ $category->category_name }} <span>{{ $category->posts()->count() }}</span></a></li>
                                @endforeach
                            </ul>
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget recent-widget">
                            <h3 class="widget__title">
                                Recent Posts.
                                <span class="footer-title-shape"></span>
                                <span class="footer-title-shape"></span>
                                <span class="footer-title-shape"></span>
                            </h3>
                            @forelse($recent_posts as $post)
                                <div class="recent-item">
                                    <div class="recent-img">
                                        <a href="{{ route('posts.show', $post->slug) }}">
                                            <img src="{{ asset('storage/post_images') . '/' . $post->post_thumbnail }}" alt="blog image">
                                        </a>
                                    </div><!-- end recent-img -->
                                    <div class="recentpost-body">
                                        <span class="recent__meta"> {{ $post->created_at->format('jS F Y') }} by <a href="#">{{ $post->user->username}}</a></span>
                                        <h4 class="recent__link">
                                            <a href="{{ route('posts.show', $post->slug) }}">{{ $post->post_title }}</a>
                                        </h4>
                                    </div><!-- end recent-img -->
                                </div><!-- end recent-item -->
                            @empty
                                <div class="alert alert-warning">No Recent Posts</div>
                            @endforelse
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
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end blog-area -->
    <!-- ================================
           START BLOG AREA
    ================================= -->
@endsection
