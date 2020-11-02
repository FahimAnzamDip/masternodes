@extends('layouts.back-layout')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>All Categories</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item ">Categories</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row mb-3">
                <div class="col-md-12 d-flex justify-content-end">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create Category</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless text-center mb-0" id="datatable">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $key => $category)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->user->username }}</td>
                                    <td>{{ $category->created_at->format('jS F Y') }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary mb-1"><i class="fas fa-edit"></i></a>

                                        <a href="{{ route('categories.delete', $category->id) }}" id="delete" class="btn btn-danger mb-1"><i class="fas fa-trash"></i></a>
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
