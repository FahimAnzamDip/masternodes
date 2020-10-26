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
                            <h2 class="breadcrumb__title">contact us.</h2>
                            <ul class="breadcrumb__list">
                                <li class="active__list-item"><a href="{{ route('home.page') }}">home</a></li>
                                <li>contact</li>
                            </ul>
                        </div><!-- end breadcrumb-inner -->
                        <div class="text-outline">contact us</div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end hero-area -->
    <!-- ================================
        END BREADCRUMB AREA
    ================================= -->


    <!-- ================================
           START CONTACT AREA
    ================================= -->
    <section class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sec-heading">
                        <div class="heading-circle"></div>
                        <p class="sec__meta">get in touch</p>
                        <h2 class="sec__title">Feel Free to Write Us a Message.</h2>
                        <p class="sec__desc">
                            Lorem ipsum is simply free text dolor sit amett quie
                            adipiscing elit. When an unknown printer took a galley.
                            quiaies lipsum dolor sit atur adip scing
                        </p>
                    </div><!-- end sec-heading -->
                </div><!-- end col-lg-5 -->
                <div class="col-lg-8">
                    <div class="contact-form-action">
                        <!--Contact Form-->
                        <form method="POST" action="{{ route('messages.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6 col-sm-6 form-group">
                                    <label for="frist_name">Frist Name <span class="text-danger">*</span></label>
                                    <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" placeholder="Enter First Name" required>
                                    @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-6 col-sm-6 form-group">
                                    <label for="last_name">Last Name <span class="text-danger">*</span></label>
                                    <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" placeholder="Enter Last Name" required>
                                    @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-6 col-sm-6 form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Enter Your Email" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-6 col-sm-6 form-group">
                                    <label for="subject">Subject <span class="text-danger">*</span></label>
                                    <select id="subject" name="subject" class="form-control" required @error('subject') is-invalid @enderror>
                                        <option disabled selected>Select Subject</option>
                                        <option value="Technical">Technical</option>
                                        <option value="KYC">KYC</option>
                                        <option value="Transaction">Transaction</option>
                                        <option value="Masternodes">Masternodes</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    @error('subject')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-12 col-sm-12 form-group">
                                    <label for="attachment">Attachment (If Needed)</label>
                                    <input class="form-control" type="file" name="attachment" @error('attachment') is-invalid @enderror>
                                    @error('attachment')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-12 col-sm-12 form-group">
                                    <label for="message">Message <span class="text-danger">*</span></label>
                                    <textarea class="message-control form-control" name="message" placeholder="Write Your Message Here" required @error('message') is-invalid @enderror></textarea>
                                    @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-12 col-sm-12 col-xs-12 form-group">
                                    <button class="theme-btn" type="submit">Send Message</button>
                                </div><!-- end col-lg-12 -->
                            </div><!-- end row -->
                        </form>
                    </div><!-- end contact-form-action -->
                </div><!-- end col-lg-7 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end contact-area -->
    <!-- ================================
           START CONTACT AREA
    ================================= -->

    @include('page-sections.newsletter')
@endsection
