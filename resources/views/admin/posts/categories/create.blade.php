@extends('layouts.back-layout')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>Create Category</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></div>
                <div class="breadcrumb-item">Create New Category</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    @include('admin.includes.alerts')
                    <div class="card">
                        <div class="card-header">
                            <h4>Post Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('categories.store') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Category Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" required name="category_name" value="{{ old('category_name') }}" placeholder="Enter category name">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group d-flex justify-content-end">
                                    <button class="btn btn-primary" type="submit">Create Category</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
