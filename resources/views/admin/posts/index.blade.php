@extends('layouts.back-layout')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>All Posts</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item ">Posts</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row mb-3">
                <div class="col-md-12 d-flex justify-content-end">
                    <a href="{{ route('posts.draft') }}" class="btn btn-primary mr-3"><span class="badge badge-white">{{ $posts->where('post_status', 2)->count() }}</span> Draft Posts</a>
                    <a href="{{ route('posts.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create Post</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless text-center mb-0" id="datatable">
                            <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Author</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $key => $post)
                                <tr>
                                    <td>{{ Str::words($post->post_title, 7, '...') }}</td>
                                    <td>{{ $post->category->category_name }}</td>
                                    <td>{{ $post->user->username }}</td>
                                    <td>{{ $post->created_at->format('jS F Y') }}</td>
                                    <td>
                                        @if($post->post_status == 1)
                                            <span class="badge badge-primary">Published</span>
                                        @else
                                            <span class="badge badge-warning">Draft</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary mb-1"><i class="fas fa-edit"></i></a>

                                        <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-info mb-1"><i class="fas fa-eye"></i></a>

                                        <a href="{{ route('posts.delete', $post->id) }}" id="delete" class="btn btn-danger mb-1"><i class="fas fa-trash"></i></a>
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
