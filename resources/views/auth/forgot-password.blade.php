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
                            <h2 class="breadcrumb__title">recover password.</h2>
                            <ul class="breadcrumb__list">
                                <li class="active__list-item"><a href="{{ route('home.page') }}">home</a></li>
                                <li class="active__list-item"><a href="{{ route('login') }}">login</a></li>
                                <li>recover password</li>
                            </ul>
                        </div><!-- end breadcrumb-inner -->
                        <div class="text-outline">recover</div>
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
                            <h3 class="form__title">Recover Password!</h3>
                            <p class="form__desc reset__desc">
                                Enter the email of your account to reset password.
                                Then you will receive a link to email to reset the password.If
                                you have any issue about reset password
                                <a href="{{ route('contact.page') }}">contact us</a>
                            </p>
                        </div>
                        <!--Contact Form-->
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="row">
                                <div class="col-lg-12 col-sm-12 form-group">
                                    @if (session('status'))
                                        <div class="alert alert-info">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Enter email address" required value="{{ old('email') }}">

                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-12 col-sm-12 col-xs-12 form-group">
                                    <button class="theme-btn reset__btn" type="submit">reset password</button>
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-6 col-sm-6 col-xs-12 account-assist">
                                    <p class="account__desc">
                                        <a href="{{ route('login') }}">Login</a>
                                    </p>
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-6 col-sm-6 col-xs-12 account-assist">
                                    <p class="account__desc text-right">
                                        Not a member?<a href="{{ route('register') }}"> Register</a>
                                    </p>
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
