@extends('layouts.back-layout')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $user->username }}'s Details</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></div>
                <div class="breadcrumb-item ">User Details</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <tr>
                                <th colspan="4">Registered at</th>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    @if($user->created_at)
                                        {{ $user->created_at->format('h:i A - jS F Y') }}
                                    @else
                                        {{ 'N/A' }}
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>User Name</th>
                                <th>Email</th>
                            </tr>
                            <tr>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>

                            <tr>
                                <th colspan="2">Address Line 1</th>
                                <th colspan="2">Address Line 2</th>
                            </tr>
                            <tr>
                                <td colspan="2">{{ $user->address_line_one }}</td>
                                <td colspan="2">{{ $user->address_line_two ?? 'N/A'}}</td>
                            </tr>

                            <tr>
                                <th>Phone Number</th>
                                <th>Zip Code</th>
                                <th>City</th>
                                <th>Country</th>
                            </tr>
                            <tr>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->zip_code }}</td>
                                <td>{{ $user->city }}</td>
                                <td>{{ $user->country }}</td>
                            </tr>

                            @if($user->role != 1)
                            <tr>
                                <th>Identity Status</th>
                                <th>Account Status</th>
                                <th>Location Status</th>
                                <th>Phone Status</th>
                            </tr>
                            <tr>
                                <td>
                                    @if($user->customer->identity_status == 1)
                                        <div class="badge badge-info" style="border-radius: 0.25rem;">
                                            Pending
                                        </div>
                                    @elseif($user->customer->identity_status == 2)
                                        <div class="badge badge-success" style="border-radius: 0.25rem;">
                                            Verified
                                        </div>
                                    @elseif($user->customer->identity_status == 3)
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
                                    @if($user->customer->account_status == 1)
                                        <div class="badge badge-info" style="border-radius: 0.25rem;">
                                            Pending
                                        </div>
                                    @elseif($user->customer->account_status == 2)
                                        <div class="badge badge-success" style="border-radius: 0.25rem;">
                                            Verified
                                        </div>
                                    @elseif($user->customer->account_status == 3)
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
                                    @if($user->customer->location_status == 1)
                                        <div class="badge badge-info" style="border-radius: 0.25rem;">
                                            Pending
                                        </div>
                                    @elseif($user->customer->location_status == 2)
                                        <div class="badge badge-success" style="border-radius: 0.25rem;">
                                            Verified
                                        </div>
                                    @elseif($user->customer->location_status == 3)
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
                                    @if($user->customer->location_status == 1)
                                        <div class="badge badge-info" style="border-radius: 0.25rem;">
                                            Pending
                                        </div>
                                    @elseif($user->customer->location_status == 2)
                                        <div class="badge badge-success" style="border-radius: 0.25rem;">
                                            Verified
                                        </div>
                                    @elseif($user->customer->location_status == 3)
                                        <div class="badge badge-danger" style="border-radius: 0.25rem;">
                                            Rejected
                                        </div>
                                    @else
                                        <div class="badge badge-warning" style="border-radius: 0.25rem;">
                                            Not Verified
                                        </div>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th colspan="2">Total Referred Users </th>
                                <th colspan="2">Transactions</th>
                            </tr>
                            <tr>
                                <td colspan="2">{{ \App\Models\User::where('referrer_id', $user->id)->count() }}</td>
                                <td colspan="2">N/A</td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
