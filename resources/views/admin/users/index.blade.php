@extends('layouts.back-layout')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>Users</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item ">Users</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row mb-3">
                <div class="col-md-12 d-flex justify-content-end">
                    <a href="{{ route('users.banned') }}" class="btn btn-warning"><span class="badge badge-white">{{ \App\Models\User::where('banned', 1)->count() }}</span> <strong>Banned Users</strong></a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless text-center mb-0" id="datatable">
                            <thead>
                            <tr>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Joined at</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as  $user)
                                <tr>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="badge badge-info" style="border-radius: 0.25rem;">
                                             {{ $user->role == 1 ? 'Admin' : 'User' }}
                                        </span>
                                    </td>
                                    <td>{{ $user->created_at->format('jS F Y - h:i A') }}</td>
                                    <td>
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary mb-1"><i class="fas fa-eye"></i></a>

                                        <a href="{{ route('users.ban', $user->id) }}" class="btn btn-warning mb-1"><i class="fas fa-ban"></i></a>

                                        <a href="{{ route('users.delete', $user->id) }}" id="delete" class="btn btn-danger mb-1"><i class="fas fa-trash"></i></a>
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
