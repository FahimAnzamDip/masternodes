@extends('layouts.back-layout')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $customer->user->username }}'s KYC Details</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.users.kyc') }}">Users KYC</a></div>
                <div class="breadcrumb-item ">KYC Details</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $customer->user->username }}'s Details From Registration</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $customer->user->first_name }}</td>
                                        <td>{{ $customer->user->last_name }}</td>
                                        <td>{{ $customer->user->username }}</td>
                                        <td>{{ $customer->user->email }}</td>
                                    </tr>

                                    <tr>
                                        <th colspan="2">Address Line 1</th>
                                        <th colspan="2">Address Line 2</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">{{ $customer->user->address_line_one }}</td>
                                        <td colspan="2">{{ $customer->user->address_line_two ?? 'N/A'}}</td>
                                    </tr>

                                    <tr>
                                        <th>Phone Number</th>
                                        <th>Zip Code</th>
                                        <th>City</th>
                                        <th>Country</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $customer->user->phone }}</td>
                                        <td>{{ $customer->user->zip_code }}</td>
                                        <td>{{ $customer->user->city }}</td>
                                        <td>{{ $customer->user->country }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $customer->user->username }}'s Details From KYC Submission</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <tr>
                                        <th class="text-danger">Identity Verification Information <i class="fas fa-arrow-alt-circle-down"></i></th>
                                    </tr>
                                    @if($customer->identity_file)
                                        <tr>
                                            <th>File Type</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="badge badge-primary">
                                                    {{ $customer->identity_file_type }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Image</th>
                                        </tr>
                                        <tr>
                                            <td class="py-4">
                                                <img class="w-auto h-auto"
                                                     src="{{ asset('storage/identity_files') . '/' . $customer->identity_file }}"
                                                     alt="File">
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td class="py-3">
                                                <div class="alert alert-danger">Didn't receive Identity Information Yet From This User.
                                                </div>
                                            </td>
                                        </tr>
                                    @endif

                                    <tr>
                                        <th class="text-danger">Location Verification Information <i class="fas fa-arrow-alt-circle-down"></i></th>
                                    </tr>
                                    @if($customer->location_file)
                                        <tr>
                                            <th>File Type</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="badge badge-primary">
                                                    {{ $customer->location_file_type }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Image</th>
                                        </tr>
                                        <tr>
                                            <td class="py-4">
                                                <img class="w-auto h-auto"
                                                     src="{{ asset('storage/location_files') . '/' . $customer->location_file }}"
                                                     alt="File">
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td class="py-3">
                                                <div class="alert alert-danger">Didn't receive Location Information Yet From This User.
                                                </div>
                                            </td>
                                        </tr>
                                    @endif

                                    <tr>
                                        <th class="text-danger">Account Verification Information <i class="fas fa-arrow-alt-circle-down"></i></th>
                                    </tr>
                                    @if($customer->customer_image)
                                        <tr>
                                            <th>Secret Code</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="badge badge-primary">
                                                    {{ $customer->verify_code }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>User Image</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img class="w-auto h-auto"
                                                     src="{{ asset('storage/customer_images') . '/' . $customer->customer_image }}"
                                                     alt="File">
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td class="py-3">
                                                <div class="alert alert-danger">Didn't receive Final Information Yet From This User.
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Send Secret Code to {{ $customer->user->username }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.users.kyc.send-code') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="admin_verify_code">Code<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="admin_verify_code" name="admin_verify_code" required placeholder="Enter Code">
                                </div>
                                <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                                <div class="form-group mb-0 d-flex justify-content-end">
                                    <button class="btn btn-primary" type="submit">Send Code</button>
                                </div>
                            </form>
                            @if($customer->admin_verify_code)
                                <div class="alert alert-info" style="margin-top: 28px;">
                                    <strong>Sent Code: {{ $customer->admin_verify_code }}</strong>
                                </div>
                            @endif
                            @if($customer->admin_verify_code == $customer->verify_code)
                                <div class="alert alert-success mt-3">
                                    <strong>Matched with the code provide by {{ $customer->user->username }}: {{ $customer->admin_verify_code }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Verification Status</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.users.kyc.verify') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="identity_status">Identity Verification Status<span class="text-danger">*</span></label>
                                            <select name="identity_status" id="identity_status" required class="form-control">
                                                <option value="" disabled selected>Select Status</option>
                                                <option value="2" {{ $customer->identity_status == 2 ? 'selected' : '' }}>Approve</option>
                                                <option value="3" {{ $customer->identity_status == 3 ? 'selected' : '' }}>Reject</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="location_status">Location Verification Status<span class="text-danger">*</span></label>
                                            <select name="location_status" id="location_status" required class="form-control">
                                                <option value="" disabled selected>Select Status</option>
                                                <option value="2" {{ $customer->location_status == 2 ? 'selected' : '' }}>Approve</option>
                                                <option value="3" {{ $customer->location_status == 3 ? 'selected' : '' }}>Reject</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account_status">Account Verification Status<span class="text-danger">*</span></label>
                                            <select name="account_status" id="account_status" required class="form-control">
                                                <option value="" disabled selected>Select Status</option>
                                                <option value="2" {{ $customer->account_status == 2 ? 'selected' : '' }}>Approve</option>
                                                <option value="3" {{ $customer->account_status == 3 ? 'selected' : '' }}>Reject</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="{{ $customer->id }}" name="customer_id">

                                <div class="form-group mb-0 d-flex justify-content-end">
                                    <button class="btn btn-primary" type="submit">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
