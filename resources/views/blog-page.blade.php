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
                            <h2 class="breadcrumb__title">
                                @if(request()->has('category_id'))
                                    blog - {{ \App\Models\Category::find(request()->get('category_id'))->category_name }}
                                @else
                                    blog
                                @endif
                            </h2>
                            <ul class="breadcrumb__list">
                                @if(request()->has('category_id'))
                                    <li class="active__list-item"><a href="{{ route('home.page') }}">home</a></li>
                                    <li class="active__list-item"><a href="{{ route('blog.page') }}">blog</a></li>
                                    <li>{{ \App\Models\Category::find(request()->get('category_id'))->category_name }}</li>
                                @else
                                    <li class="active__list-item"><a href="{{ route('home.page') }}">home</a></li>
                                    <li>blog</li>
                                @endif
                            </ul>
                        </div><!-- end breadcrumb-inner -->
                        <div class="text-outline">
                            @if(request()->has('category_id'))
                                Category
                            @else
                                blog
                            @endif
                        </div>
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
                @forelse($posts as $post)
                    <div class="col-lg-4 col-sm-6">
                        <div class="blog-post-item">
                            <div class="blog-post-img">
                                <a href="blog-single.html">
                                    <img src="{{ asset('storage/post_images') . '/' . $post->post_thumbnail }}" alt="blog image" class="blog__img">
                                </a>
                                <div class="blog__date">
                                    <span>{{ $post->created_at->format('jS F Y') }}</span>
                                </div><!-- end blog__date -->
                            </div><!-- end blog-post-img -->
                            <div class="blog-post-body">
                                <div class="blog-title">
                                    <a href="{{ route('posts.show', $post->slug) }}" class="blog__title">
                                        {{ $post->post_title }}
                                    </a>
                                </div>
                                <ul class="blog__panel">
                                    <li><i class="fa fa-user"></i> By
                                        <a href="#" class="blog-admin-name">{{ $post->user->username }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('posts.show', $post->slug) }}" class="blog-admin-btn">
                                            Continue
                                        </a>
                                    </li>
                                </ul>
                            </div><!-- end blog-post-body -->
                        </div><!-- end blog-post-item -->
                    </div><!-- end col-lg-4 -->
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning text-center">No Posts Available.</div>
                    </div>
                @endforelse
            </div><!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="pagination-wrap text-center">
                        {{ $posts->links() }}
                        <!--<nav aria-label="Page navigation">
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
                        </nav>-->
                    </div><!-- end pagination-wrap -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end blog-area -->
    <!-- ================================
           END BLOG AREA
    ================================= -->
@endsection
