@extends('layouts.back-layout')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>Contact Page</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Contact Page Content</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form method="POST" action="{{ route('admin.contact-page.update', $contact->id) }}">
                            @csrf
                            <div class="card-header">
                                <h4>Edit Contact Page</h4>
                            </div>
                            <div class="card-body">
                                @include('admin.includes.alerts')
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="top_title">Top Title <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" value="{{ $contact->top_title }}" required name="top_title">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="main_title">Main Title <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" value="{{ $contact->main_title }}" required name="main_title">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="page_content">Page Content <span class="text-danger">*</span></label>
                                    <textarea class="form-control" type="text" required name="page_content" style="height: 150px;">{{ $contact->page_content }}</textarea>
                                </div>
                            </div>
                            <div class="card-footer text-right pt-0">
                                <button class="btn btn-primary" type="submit">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
