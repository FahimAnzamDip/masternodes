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
                            <h2 class="breadcrumb__title">login.</h2>
                            <ul class="breadcrumb__list">
                                <li class="active__list-item"><a href="{{ route('home.page') }}">home</a></li>
                                <li>login</li>
                            </ul>
                        </div><!-- end breadcrumb-inner -->
                        <div class="text-outline">login</div>
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
                <div class="col-lg-6">
                    <div class="form-shared-content">
                        <div class="login-box">
                            <h3>If You Are New to MPP.</h3>
                            <p>
                                Please sign up from the link below!
                            </p>
                            <a href="{{ route('register') }}" class="theme-btn">sign up now</a>
                        </div>
                    </div><!-- end form-shared-content-->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="contact-form-action">
                        <div class="form-heading text-center">
                            <h3 class="form__title">Login to your account!</h3>
                        </div>
                        <!--Contact Form-->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 form-group">
                                    @if(session('status'))
                                        <div class="alert alert-info">
                                            <strong>{{ session('status') }}</strong>
                                        </div>
                                    @endif
                                    <label for="">User Name <span class="text-danger">*</span></label>
                                    <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" placeholder="Enter Username" required value="{{ old('username') }}" autofocus>

                                    @error('username')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-12 col-sm-12 form-group">
                                    <label for="">Password <span class="text-danger">*</span></label>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Enter Password" required>

                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-12 col-sm-12 col-xs-12 form-condition">
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="chb1" name="remember" {{ old('remember') ? 'checked' : '' }}/>
                                        <label for="chb1">Remember Me</label>
                                        <a href="{{ route('password.request') }}" class="pass__desc float-right"> Forgot your password?</a>
                                    </div>
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-12 col-sm-12 col-xs-12 form-group">
                                    <button class="theme-btn login-btn" type="submit">Login now</button>
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-12 col-sm-12 col-xs-12 account-assist">
                                    <p class="account__desc">Not a member?<a href="{{ route('register') }}"> Register</a></p>
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
