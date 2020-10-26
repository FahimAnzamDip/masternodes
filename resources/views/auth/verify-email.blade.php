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
                            <h2 class="breadcrumb__title">Verify.</h2>
                            <ul class="breadcrumb__list">
                                <li class="active__list-item"><a href="{{ route('home.page') }}">home</a></li>
                                <li>Verify</li>
                            </ul>
                        </div><!-- end breadcrumb-inner -->
                        <div class="text-outline">Verify</div>
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
    <section class="form-shared">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if (session('status') == 'verification-link-sent')
                        <div class="alert alert-info">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </div>
                    @endif
                    <div class="form-shared-content">
                        <div class="login-box">
                            <div style="font-size: 1.2rem;" class="mb-3">
                                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                            </div>

                            <div class="d-flex flex-wrap justify-content-center">
                                <form method="POST" action="{{ route('verification.send') }}" class="mr-4">
                                    @csrf

                                    <button type="submit" class="theme-btn login-btn">
                                        {{ __('Resend Verification Email') }}
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('logout') }}" class="mr-4">
                                    @csrf

                                    <button type="submit" class="theme-btn login-btn">
                                        {{ __('Logout') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div><!-- end form-shared-content-->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end form-shared -->
    <!-- ================================
           START FORM AREA
    ================================= -->
@endsection
