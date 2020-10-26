@extends('layouts.back-layout')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>All Messages</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item ">Messages</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless text-center mb-0" id="datatable">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Message</th>
                                <th scope="col">Received at</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $key => $message)
                                <tr class="{{ $message->read == 0 ? 'bg-light' : ''}}">
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $message->first_name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ Str::words($message->message, 5, '...') }}</td>
                                    <td>{{ $message->created_at->format('jS F Y') }}</td>
                                    <td>
                                        <a href="{{ route('messages.show', $message->id) }}" class="btn btn-primary mb-1"><i class="fas fa-eye"></i></a>

                                        <a href="{{ route('messages.delete', $message->id) }}" id="delete" class="btn btn-danger mb-1"><i class="fas fa-trash"></i></a>
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
