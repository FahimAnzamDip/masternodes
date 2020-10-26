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
                            <h2 class="breadcrumb__title">Authorize.</h2>
                            <ul class="breadcrumb__list">
                                <li class="active__list-item"><a href="{{ route('home.page') }}">home</a></li>
                                <li>Authorize Device</li>
                            </ul>
                        </div><!-- end breadcrumb-inner -->
                        <div class="text-outline">Authorize</div>
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
                    @if (session('status'))
                        <div class="alert alert-info">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-shared-content">
                        <div class="login-box">
                            <div style="font-size: 1.2rem;" class="mb-3">
                                    <h3>Authorize New Device</h3>

                                    <p class="mb-1 text-white">It looks like you're signing in to <a href="{{ url('/') }}">{{ url('/') }}</a> from a computer or device we haven't seen before, or for some time.</p>
                                    <p class="mb-1 text-white">
                                        Please <strong>click the confirmation link in the email we just sent you.</strong> This is a process that protects the security of your account.
                                    </p>
                                    <p class="text-white">Note that you need to access this email with the same device that you are confirming.</p>
                            </div>

                            <div class="d-flex flex-wrap justify-content-center">
                                <form action="{{ route('authorize.resend') }}" method="POST" class="mr-4">
                                    {{ csrf_field() }}

                                    <button type="submit" class="theme-btn login-btn">Email didn't arrive?</button>
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
