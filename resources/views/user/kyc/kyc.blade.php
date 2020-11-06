@extends('layouts.back-layout')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>KYC</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('home.page') }}">Home</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('user.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item">KYC</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                            <div class="card-header">
                                <h4>Verification</h4>
                            </div>
                            <div class="card-body">
                                @include('user.includes.alerts')
                                <ul class="nav nav-pills mb-3" id="pills-tab">
                                    <li class="nav-item mb-2 mb-md-0">
                                        <a class="nav-link active btn-sm" id="pills-home-tab" data-toggle="pill" href="#pills-home">
                                            <strong>1. Verify Indentity</strong>
                                        </a>
                                    </li>
                                    <li class="nav-item mb-2 mb-md-0">
                                        <a class="nav-link btn-sm" id="pills-profile-tab" data-toggle="pill" href="#pills-profile">
                                            <strong>2. Verify Your Location</strong>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn-sm" id="pills-contact-tab" data-toggle="pill" href="#pills-contact">
                                            <strong>3. Verify It's You</strong>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home">
                                        @if(Auth::user()->customer->identity_status  == 1)
                                            <div class="alert alert-primary">
                                                You already have a Identity verification request!
                                            </div>
                                        @elseif(Auth::user()->customer->identity_status == 2)
                                            <div class="alert alert-success">
                                                Your Identity verification is done!
                                            </div>
                                        @else
                                            @if(Auth::user()->customer->identity_status == 3)
                                                <div class="alert alert-danger">
                                                    Your Identity verification is rejected! Please contact support before sending another request.
                                                </div>
                                            @endif
                                            <form action="{{ route('user.kyc.identity.submit') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="identity_file_type">Select Type<span class="text-danger">*</span></label>
                                                            <select name="identity_file_type" id="identity_file_type" class="form-control" required>
                                                                <option value="NID Card">NID Card</option>
                                                                <option value="Passport">Passport</option>
                                                                <option value="Driving Lisence">Driving Lisence</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="identity_file">Image<span class="text-danger">*</span></label>
                                                            <input id="identity_file" class="form-control" type="file" required name="identity_file">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group d-flex justify-content-end mb-0">
                                                    <button class="btn btn-primary" type="submit"><i class="fas fa-paper-plane"></i> Submit</button>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile">
                                        @if(Auth::user()->customer->location_status == 1)
                                            <div class="alert alert-primary">
                                                You already have a Location verification request!
                                            </div>
                                        @elseif(Auth::user()->customer->location_status == 2)
                                            <div class="alert alert-success">
                                                Your Location verification is done!
                                            </div>
                                        @else
                                            @if(Auth::user()->customer->location_status == 3)
                                                <div class="alert alert-danger">
                                                    Your Location verification is rejected! Please contact support before sending another request.
                                                </div>
                                            @endif
                                            <form action="{{ route('user.kyc.location.submit') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="location_file_type">Select Type<span class="text-danger">*</span></label>
                                                        <select name="location_file_type" id="file_type" class="form-control" required>
                                                            <option value="Bank Statement">Bank Statement</option>
                                                            <option value="Utility Bill">Utility Bill</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="location_file">Image <span class="text-danger">*</span></label>
                                                        <input id="location_file" class="form-control" type="file" required name="location_file">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex justify-content-end mb-0">
                                                <button class="btn btn-primary" type="submit"><i class="fas fa-paper-plane"></i> Submit</button>
                                            </div>
                                        </form>
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="pills-contact">
                                        @if(Auth::user()->customer->account_status == 1)
                                            <div class="alert alert-primary">
                                                You already have a Account verification request!
                                            </div>
                                        @elseif(Auth::user()->customer->account_status == 2)
                                            <div class="alert alert-success">
                                                Your Account verification is done!
                                            </div>
                                        @else
                                            @if(Auth::user()->customer->account_status == 3)
                                                <div class="alert alert-danger">
                                                    We can't verify it's you! Please contact support before sending another request.
                                                </div>
                                            @endif
                                            <form action="{{ route('user.kyc.account.submit') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="verify_code">Code<span class="text-danger">*</span></label>
                                                        <input id="verify_code" class="form-control" type="text" value="" required name="verify_code" placeholder="Enter the code you received">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="customer_image">Your Photo<span class="text-danger">*</span></label>
                                                        <input id="customer_image" class="form-control" type="file" required name="customer_image">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex justify-content-end mb-0">
                                                <button class="btn btn-primary" type="submit"><i class="fas fa-paper-plane"></i> Submit</button>
                                            </div>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Verification Status</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 mb-3">
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
                                            <div class="badge badge-danger" style="border-radius: 0.25rem;">
                                                Rejected
                                            </div>
                                        @else
                                            <div class="badge badge-warning" style="border-radius: 0.25rem;">
                                                Not Verified
                                            </div>
                                        @endif
                                </div>
                                <div class="col-6 mb-3">
                                    <p class="mb-0 font-weight-bold">Email</p>
                                    @if(Auth::user()->email_verified_at)
                                        <div class="badge badge-success" style="border-radius: 0.25rem;">
                                            Verified
                                        </div>
                                    @else
                                        <div class="badge badge-warning" style="border-radius: 0.25rem;">
                                            Not Verified
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-6 col-6 mb-2">
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
                                        <div class="badge badge-danger" style="border-radius: 0.25rem;">
                                            Rejected
                                        </div>
                                    @else
                                        <div class="badge badge-warning" style="border-radius: 0.25rem;">
                                            Not Verified
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-6 col-6">
                                    <p class="mb-0 font-weight-bold">Phone Number</p>
                                    @if(Auth::user()->customer->location_status == 1)
                                        <div class="badge badge-info" style="border-radius: 0.25rem;">
                                            Pending
                                        </div>
                                    @elseif(Auth::user()->customer->location_status == 2)
                                        <div class="badge badge-success" style="border-radius: 0.25rem;">
                                            Verified
                                        </div>
                                    @elseif(Auth::user()->customer->location_status == 3)
                                        <div class="badge badge-danger" style="border-radius: 0.25rem;">
                                            Rejected
                                        </div>
                                    @else
                                        <div class="badge badge-warning" style="border-radius: 0.25rem;">
                                            Not Verified
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
