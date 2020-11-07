<!-- ================================
   START NEWSLETTER AREA
================================= -->
<section class="newsleller-area" id="newsleller-area">
    <div class="container">
        @include('user.includes.alerts')
        <div class="subscriber-box">
            <div class="row">
                <div class="col-lg-7">
                    <div class="sec-heading">
                        <div class="heading-circle"></div>
                        <p class="sec__meta">Get in touch</p>
                        <h2 class="sec__title">Subscribe to Our Newsletter</h2>
                    </div>
                    <!-- end sec-heading -->
                </div>
                <!-- end col-lg-7 -->
                <div class="col-lg-5">
                    <div class="subscriber-wrap">
                        <form action="{{ route('newsletters.store') }}" method="POST">
                            @csrf
                            <div class="subscriber-form">
                                <input type="email" class="form-control" placeholder="Enter your email" required name="email"/>
                                <i class="fa fa-envelope"></i>
                                <button class="theme-btn">subscribe</button>
                            </div>
                        </form>
                    </div>
                    <!-- end subscriber-wrap -->
                </div>
                <!-- end col-lg-5 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end subscriber-box -->
    </div>
    <!-- end container -->
</section>
<!-- end app-area -->
<!-- ================================
   START NEWSLETTER AREA
================================= -->
