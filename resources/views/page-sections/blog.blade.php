<!-- ================================
   START BLOG AREA
================================= -->
<section class="blog-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="sec-heading">
                    <div class="heading-circle"></div>
                    <p class="sec__meta">news feeds</p>
                    <h2 class="sec__title">
                        Let’s Read Latest <br />
                        Blog & News
                    </h2>
                </div>
                <!-- end sec-heading -->
            </div>
            <!-- end col-lg-8 -->
            <div class="col-lg-4">
                <div class="blog-btn">
                    <a href="{{ route('blog.page') }}" class="theme-btn">view all news</a>
                </div>
                <!-- end blog-btn -->
            </div>
            <!-- end col-lg-4 -->
        </div>
        <!-- end row -->
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
                    <div class="alert alert-warning">No Post Available.</div>
                </div>
            @endforelse
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- end blog-area -->
<!-- ================================
   START BLOG AREA
================================= -->
