@extends('layouts.back-layout')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>Users KYC</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item ">KYC</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row mb-3">
                <div class="col-md-12 d-flex justify-content-end">
                    <a href="{{ route('admin.users.kyc.rejected') }}" class="btn btn-danger mr-3">
                        <span class="badge badge-white">
                            {{ \App\Models\Customer::where('identity_status', 3)->where('location_status', 3)->where('account_status', 3)->count() }}
                        </span>
                        Rejected
                    </a>
                    <a href="{{ route('admin.users.kyc.approved') }}" class="btn btn-success mr-3">
                        <span class="badge badge-white">
                            {{ \App\Models\Customer::where('identity_status', 2)->where('location_status', 2)->where('account_status', 2)->count() }}
                        </span>
                        Approved
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless text-center mb-0" id="datatable">
                            <thead>
                            <tr>
                                <th scope="col">Username</th>
                                <th scope="col">Identity Verification</th>
                                <th scope="col">Location Verification</th>
                                <th scope="col">Account Verification</th>
                                <th scope="col">Received at</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as  $customer)
                                <tr>
                                    <td>{{ $customer->user->username }}</td>
                                    <td>
                                        @if($customer->identity_status == 1)
                                            <div class="badge badge-info" style="border-radius: 0.25rem;">
                                                Pending
                                            </div>
                                        @elseif($customer->identity_status == 2)
                                            <div class="badge badge-success" style="border-radius: 0.25rem;">
                                                Verified
                                            </div>
                                        @elseif($customer->identity_status == 3)
                                            <div class="badge badge-danger" style="border-radius: 0.25rem;">
                                                Rejected
                                            </div>
                                        @else
                                            <div class="badge badge-warning" style="border-radius: 0.25rem;">
                                                Not Verified
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($customer->location_status == 1)
                                            <div class="badge badge-info" style="border-radius: 0.25rem;">
                                                Pending
                                            </div>
                                        @elseif($customer->location_status == 2)
                                            <div class="badge badge-success" style="border-radius: 0.25rem;">
                                                Verified
                                            </div>
                                        @elseif($customer->location_status == 3)
                                            <div class="badge badge-danger" style="border-radius: 0.25rem;">
                                                Rejected
                                            </div>
                                        @else
                                            <div class="badge badge-warning" style="border-radius: 0.25rem;">
                                                Not Verified
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($customer->account_status == 1)
                                            <div class="badge badge-info" style="border-radius: 0.25rem;">
                                                Pending
                                            </div>
                                        @elseif($customer->account_status == 2)
                                            <div class="badge badge-success" style="border-radius: 0.25rem;">
                                                Verified
                                            </div>
                                        @elseif($customer->account_status == 3)
                                            <div class="badge badge-danger" style="border-radius: 0.25rem;">
                                                Rejected
                                            </div>
                                        @else
                                            <div class="badge badge-warning" style="border-radius: 0.25rem;">
                                                Not Verified
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $customer->created_at->format('jS F Y - h:i A') }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.kyc.show', $customer->id) }}" class="btn btn-primary mb-1"><i class="fas fa-eye"></i></a>

                                        <a href="#" id="delete" class="btn btn-danger mb-1"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
