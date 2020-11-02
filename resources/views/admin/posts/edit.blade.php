@extends('layouts.back-layout')

@section('page-styles')
    <link href="//cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/tagsinput.css') }}" rel="stylesheet">
@endsection

@section('main-content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('posts.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit Post</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></div>
                <div class="breadcrumb-item">Edit Post</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @include('admin.includes.alerts')
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Your Post</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('posts.update', $post->id) }}" id="post-form" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Post Title<span class="text-danger">*</span></label>
                                            <input id="post_title" type="text" class="form-control" required name="post_title" value="{{ $post->post_title }}" placeholder="Enter post title">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Slug<span class="text-danger">*</span></label>
                                            <input id="slug" type="text" class="form-control" required name="slug" value="{{ $post->slug }}" placeholder="Enter post slug">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category<span class="text-danger">*</span></label>
                                            <select class="form-control" name="category_id" required>
                                                <option disabled selected>Select category</option>
                                                @foreach(\App\Models\Category::all() as $category)
                                                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status<span class="text-danger">*</span></label>
                                            <select class="form-control selectric" required name="post_status">
                                                <option disabled selected>Select status</option>
                                                <option value="1" {{ $post->post_status == 1 ? 'selected' : '' }}>
                                                    Publish
                                                </option>
                                                <option value="2" {{ $post->post_status == 2 ? 'selected' : '' }}>
                                                    Draft
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Content<span class="text-danger">*</span></label>
                                    <textarea id="editor" name="post_content">{{ $post->post_content }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Tags (press comma "," after every tag or click)<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control inputtags" name="post_tags" value="{{ $post->post_tags }}" placeholder="Enter post tags">
                                </div>
                                <div class="form-group">
                                    <label>Post Thumbnail<span class="text-danger">*</span></label>
                                    <div class="my-2">
                                        <img width="300" src="{{ asset('storage/post_images') . '/' . $post->post_thumbnail }}" alt="old post thumbnail">
                                    </div>
                                    <input type="file" class="form-control" name="post_thumbnail">
                                </div>

                                <div class="form-group d-flex justify-content-end">
                                    <button class="btn btn-primary" type="submit">Update Post</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page-scripts')
    <script src="{{ asset('backend/assets/js/page/tagsinput.min.js') }}"></script>
    <script src="//cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function () {
            $(".inputtags").tagsinput(['items']);
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                    heading: {
                        options: [
                            {model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph'},
                            {model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1'},
                            {model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2'}
                        ]
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('#post_title').on('input', function (e) {
                $.get('{{ route('posts.check.slug') }}',
                    {'post_title': $(this).val()},
                    function (data) {
                        $('#slug').val(data.slug);
                    }
                );
            });
        });
    </script>
@endsection
