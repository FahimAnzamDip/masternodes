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
                            <h2 class="breadcrumb__title">Reset password.</h2>
                            <ul class="breadcrumb__list">
                                <li class="active__list-item"><a href="{{ route('home.page') }}">home</a></li>
                                <li class="active__list-item"><a href="{{ route('login') }}">login</a></li>
                                <li>reset password</li>
                            </ul>
                        </div><!-- end breadcrumb-inner -->
                        <div class="text-outline">reset</div>
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
                            <h3 class="form__title">Reset Password!</h3>
                        </div>
                        <!--Contact Form-->
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="row">
                                <div class="col-lg-12 col-sm-12 form-group">
                                    @if (session('status'))
                                        <div class="alert alert-info">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Enter email address" required value="{{ old('email', $request->email) }}">

                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-12 col-sm-12 form-group">
                                    <label for="password">Password <span class="text-danger">*</span></label>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Enter new password" required value="{{ old('password') }}">

                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-12 col-sm-12 form-group">
                                    <label for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                                    <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" placeholder="Enter new password again" required value="{{ old('password_confirmation') }}">

                                    @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-12 col-sm-12 col-xs-12 form-group">
                                    <button class="theme-btn reset__btn" type="submit">reset password</button>
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
