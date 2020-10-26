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
                            <h2 class="breadcrumb__title">sign up.</h2>
                            <ul class="breadcrumb__list">
                                <li class="active__list-item"><a href="{{ route('home.page') }}">home</a></li>
                                <li>sign up</li>
                            </ul>
                        </div><!-- end breadcrumb-inner -->
                        <div class="text-outline">sign up</div>
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
                <div class="col-md-12">
                    @include('user.includes.alerts')
                    <div class="contact-form-action">
                        <div class="form-heading text-center">
                            <h3 class="form__title">Create an account!</h3>
                        </div>
                        <!--Contact Form-->
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-lg-4 form-group">
                                    <label for="">Frist Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="first_name" placeholder="Enter First Name" required value="{{ old('first_name')  }}">
                                    @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-md-6 col-lg-4 form-group">
                                    <label for="">Last Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="last_name" placeholder="Enter Last Name" required value="{{ old('last_name') }}">
                                    @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-md-6 col-lg-4 form-group">
                                    <label for="">User Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="username" placeholder="Enter Username" required value="{{ old('username') }}">
                                    @error('username')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-md-6 col-lg-4 form-group">
                                    <label for="">Email <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" placeholder="Email Address" required value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-md-6 col-lg-4 form-group">
                                    <label for="">Address Line 1 <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="address_line_one" placeholder="Address Line 1" required value="{{ old('address_line_one') }}">
                                    @error('address_line_one')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-md-6 col-lg-4 form-group">
                                    <label for="">Address Line 2</label>
                                    <input class="form-control" type="text" name="address_line_two" placeholder="Address Line 2" value="{{ old('address_line_two') }}">
                                    @error('address_line_two')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-4 col-md-6 form-group">
                                    <label for="">Zip Code <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="zip_code" placeholder="Enter Zip Code" required value="{{ old('zip_code') }}">
                                    @error('zip_code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-4 col-md-6 form-group">
                                    <label for="">City <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="city" placeholder="Enter City" required value="{{ old('city') }}">
                                    @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-4 col-md-6 form-group">
                                    <label for="country">Country <span class="text-danger">*</span></label>
                                    @include('page-sections.country')
                                    @error('country')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-6 form-group">
                                    <label for="">Phone Number <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="phone" placeholder="Enter Phone Number" required value="{{ old('phone') }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-6 form-group">
                                    <label for="">Referrer ID</label>
                                    <input class="form-control" type="text" name="referrer_id" placeholder="You don't have referrer ID" value="{{ request()->query('ref') ?? '' }}" readonly>
                                    @error('referrer_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-6 form-group">
                                    <label for="">Password <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" name="password" placeholder="Enter Password" required>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-6 form-group">
                                    <label for="">Confirm Password <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" name="password_confirmation" placeholder="Enter Password Again" required>
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-12 col-sm-12 col-xs-12 form-condition">
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="chb1" name="newsletter" value="1">
                                        <label for="chb1">Send me daily newsletters!</label>
                                    </div>
                                    @error('newsletter')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="chb2" required name="terms" value="1">
                                        <label for="chb2">I agree to MPP's <a href="#">Terms & Rules</a></label>
                                    </div>
                                    @error('terms')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-12 col-sm-12 col-xs-12 form-group">
                                    <button class="theme-btn register-btn" type="submit">Register Account</button>
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-12 col-sm-12 col-xs-12 account-assist">
                                    <p class="account__desc">Already have an account?<a href="login.html"> Login</a></p>
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
