@extends('layouts.back-layout')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>My Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, {{ Auth::user()->username }}!</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>
            
            <div class="row mt-sm-4">
                <div class="col-12">
                    <div class="card">
                        <form method="POST" action="{{ route('admin.profile.update') }}" class="needs-validation" novalidate>
                            @csrf
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                @include('user.includes.alerts')
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first_name">First Name <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" value="{{ Auth::user()->first_name }}" required name="first_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="last_name">Last Name <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" value="{{ Auth::user()->last_name }}" required name="last_name">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address_line_one">Address Line 1 <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" value="{{ Auth::user()->address_line_one }}" required name="address_line_one">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address_line_two">Address Line 2</label>
                                            <input class="form-control" type="text" value="{{ Auth::user()->address_line_two }}" name="address_line_two">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="zip_code">Zip Code <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" value="{{ Auth::user()->zip_code }}" required name="zip_code">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="first_name">City <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" value="{{ Auth::user()->city }}" required name="city">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="country">Country <span class="text-danger">*</span></label>
                                            @include('page-sections.country')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right pt-0">
                                <button class="btn btn-primary" type="submit">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
