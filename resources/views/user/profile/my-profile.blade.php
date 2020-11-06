@extends('layouts.back-layout')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>My Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('home.page') }}">Home</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('user.home') }}">Dashboard</a></div>
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
                        <div class="card-header">
                            <h4>Your Referral Link (You can share it with others). <br>
                                Total Referred Users: {{ \App\Models\User::where('referrer_id', Auth::user()->referral_id)->count() }}</h4>
                        </div>
                        <div class="card-body">
                            <input class="form-control font-weight-bold" type="text" readonly="readonly" value="{{url('/register').'?ref='.Auth::user()->referral_id}}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Verification Status</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-6 mb-3 mb-md-0">
                                    <p class="mb-0 font-weight-bold">Account</p>
                                        @if(Auth::user()->customer->account_status == 1)
                                            <div class="badge badge-info" style="border-radius: 0.25rem;">
                                                Pending
                                            </div>
                                        @elseif(Auth::user()->customer->account_status == 2)
                                            <div class="badge badge-success" style="border-radius: 0.25rem;">
                                                Verified
                                            </div>
                                        @elseif(Auth::user()->customer->account_status == 3)
                                            <a href="{{ route('user.kyc') }}" data-toggle="tooltip" data-title="Click to Verify" data-position="top">
                                                <div class="badge badge-danger" style="border-radius: 0.25rem;">
                                                    Rejected
                                                </div>
                                            </a>
                                        @else
                                            <a href="{{ route('user.kyc') }}" data-toggle="tooltip" data-title="Click to Verify" data-position="top">
                                                <div class="badge badge-warning" style="border-radius: 0.25rem;">
                                                    Not Verified
                                                </div>
                                            </a>
                                        @endif
                                </div>
                                <div class="col-md-3 col-sm-6 col-6 mb-3 mb-md-0">
                                    <p class="mb-0 font-weight-bold">Email</p>
                                    @if(Auth::user()->email_verified_at)
                                        <div class="badge badge-success" style="border-radius: 0.25rem;">
                                            <strong>Verified</strong>
                                        </div>
                                    @else
                                        <a href="{{ route('user.kyc') }}" data-toggle="tooltip" data-title="Click to Verify" data-position="top">
                                            <div class="badge badge-warning" style="border-radius: 0.25rem;">
                                                <strong>Not Verified</strong>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                                <div class="col-md-3 col-sm-6 col-6">
                                    <p class="mb-0 font-weight-bold">Address</p>
                                        @if(Auth::user()->customer->location_status == 1)
                                            <div class="badge badge-info" style="border-radius: 0.25rem;">
                                                Pending
                                            </div>
                                        @elseif(Auth::user()->customer->location_status == 2)
                                            <div class="badge badge-success" style="border-radius: 0.25rem;">
                                                Verified
                                            </div>
                                        @elseif(Auth::user()->customer->location_status == 3)
                                            <a href="{{ route('user.kyc') }}" data-toggle="tooltip" data-title="Click to Verify" data-position="top">
                                                <div class="badge badge-danger" style="border-radius: 0.25rem;">
                                                    Rejected
                                                </div>
                                            </a>
                                        @else
                                            <a href="{{ route('user.kyc') }}" data-toggle="tooltip" data-title="Click to Verify" data-position="top">
                                                <div class="badge badge-warning" style="border-radius: 0.25rem;">
                                                    Not Verified
                                                </div>
                                            </a>
                                        @endif
                                </div>
                                <div class="col-md-3 col-sm-6 col-6">
                                    <p class="mb-0 font-weight-bold">Phone Number</p>
                                    <a href="{{ route('user.kyc') }}" data-toggle="tooltip" data-title="Click to Verify" data-position="top">
                                        @if(Auth::user()->customer->location_status == 1)
                                            <div class="badge badge-info" style="border-radius: 0.25rem;">
                                                Pending
                                            </div>
                                        @elseif(Auth::user()->customer->location_status == 2)
                                            <div class="badge badge-success" style="border-radius: 0.25rem;">
                                                Verified
                                            </div>
                                        @elseif(Auth::user()->customer->location_status == 3)
                                            <a href="{{ route('user.kyc') }}" data-toggle="tooltip" data-title="Click to Verify" data-position="top">
                                                <div class="badge badge-danger" style="border-radius: 0.25rem;">
                                                    Rejected
                                                </div>
                                            </a>
                                        @else
                                            <a href="{{ route('user.kyc') }}" data-toggle="tooltip" data-title="Click to Verify" data-position="top">
                                                <div class="badge badge-warning" style="border-radius: 0.25rem;">
                                                    Not Verified
                                                </div>
                                            </a>
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form method="POST" action="{{ route('user.profile.update') }}" class="needs-validation" novalidate>
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
