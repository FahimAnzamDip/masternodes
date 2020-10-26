@extends('layouts.back-layout')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $message->first_name }}'s Message</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item "><a href="{{ route('messages.index') }}">Messages</a></div>
                <div class="breadcrumb-item ">Details</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <tbody>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Received at</th>
                            </tr>
                            <tr>
                                <td>{{ $message->first_name }}</td>
                                <td>{{ $message->last_name }}</td>
                                <td>{{ $message->created_at->format('h:i a \/ jS F Y ') }}</td>
                            </tr>
                            <tr>
                                <th colspan="2">Email</th>
                                <th colspan="2">Subject</th>
                            </tr>
                            <tr>
                                <td colspan="2">{{ $message->email }}</td>
                                <td colspan="2">{{ $message->subject }}</td>
                            </tr>
                            <tr>
                                <th colspan="4">Message</th>
                            </tr>
                            <tr>
                                <td colspan="4">{{ $message->message }}</td>
                            </tr>
                            @if($message->attachment)
                                <tr>
                                    <th colspan="4">Attachment</th>
                                </tr>
                                <tr>
                                    <td colspan="4"><img style="width: 100%;" src="{{ asset('storage/message_attachments') . '/' . $message->attachment }}" alt="attachment"></td>
                                </tr>
                            @endif

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="float-right btn btn-primary" href="{{ route('messages.index') }}"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
    </section>
@endsection
