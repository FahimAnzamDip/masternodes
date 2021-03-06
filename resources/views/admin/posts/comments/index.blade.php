@extends('layouts.back-layout')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>Comments</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item ">Comments</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row mb-3">
                <div class="col-md-12 d-flex justify-content-end">
                    <a href="{{ route('comments.approved') }}" class="btn btn-primary mr-3"><span class="badge badge-white">{{ \Laravelista\Comments\Comment::where('approved', 1)->count() }}</span> Approved</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless text-center mb-0" id="datatable">
                            <thead>
                            <tr>
                                <th scope="col">Comment</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Commented at</th>
                                <th scope="col">Post</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $key => $comment)
                                <tr>
                                    <td>{{ Str::words($comment->comment, 7, '...') }}</td>
                                    <td>
                                        @if($comment->commenter_type)
                                            {{ $comment->commenter->username }}
                                        @else
                                            {{ $comment->guest_name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($comment->commenter_type)
                                            {{ $comment->commenter->email }}
                                        @else
                                            {{ $comment->guest_email }}
                                        @endif
                                    </td>
                                    <td>{{ $comment->created_at->format('jS F Y') }}</td>
                                    <td><a href="{{ route('posts.show', $comment->commentable->slug) }}">View</a></td>
                                    <td>
                                        @if($comment->approved == 1)
                                            <span class="badge badge-primary">Approved</span>
                                        @else
                                            <span class="badge badge-warning">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('comments.approve', $comment->id) }}" class="btn btn-info mb-1"><i class="fas fa-check-square"></i></a>

                                        <a href="{{ route('comments.delete', $comment->id) }}" id="delete" class="btn btn-danger mb-1"><i class="fas fa-trash"></i></a>
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
