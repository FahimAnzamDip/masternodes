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
                            <h2 class="breadcrumb__title">Enter 2FA Code.</h2>
                            <ul class="breadcrumb__list">
                                <li class="active__list-item"><a href="{{ route('home.page') }}">home</a></li>
                                <li class="active__list-item"><a href="{{ route('login') }}">login</a></li>
                                <li>2FA</li>
                            </ul>
                        </div><!-- end breadcrumb-inner -->
                        <div class="text-outline">2FA</div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end hero-area -->
    <!-- ================================
        END BREADCRUMB AREA
    ================================= -->

    <!-- ================================
           START FORM AREA
    ================================= -->
    <section class="form-shared reset-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="contact-form-action">
                        <div class="form-heading">
                            <h3 class="form__title">Enter 2FA Code!</h3>
                        </div>
                        <!--Contact Form-->
                        <form method="POST" action="{{ url('/two-factor-challenge') }}">
                            @csrf

                            <div class="row">
                                <div class="col-lg-12 col-sm-12 form-group">
                                    @if (session('status'))
                                        <div class="alert alert-info">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <div class="mb-2">
                                        {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
                                    </div>

                                    <label for="email">Code <span class="text-danger">*</span></label>
                                    <input class="form-control @error('code') is-invalid @enderror" type="text" name="code" autofocus autocomplete="one-time-code">

                                    @error('code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <hr>
                                    <div class="col-12 text-center text-danger">
                                        {{ 'OR' }}
                                    </div>
                                <hr>

                                <div class="col-lg-12 col-sm-12 form-group">
                                    <div class="mb-2">
                                        {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
                                    </div>

                                    <label for="recovery_code">Recovery Code <span class="text-danger">*</span></label>
                                    <input class="form-control @error('recovery_code') is-invalid @enderror" type="text" name="recovery_code" autocomplete="one-time-code">

                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-12 col-sm-12 col-xs-12 form-group">
                                    <button class="theme-btn reset__btn" type="submit">Login</button>
                                </div><!-- end col-lg-12 -->

                            </div><!-- end row -->
                        </form>
                    </div><!-- end contact-form -->
                </div><!-- end col-lg-7 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end form-shared -->
    <!-- ================================
           START FORM AREA
    ================================= -->
@endsection
