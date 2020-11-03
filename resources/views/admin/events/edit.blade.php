@extends('layouts.back-layout')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Event</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('events.index') }}">Events</a></div>
                <div class="breadcrumb-item">Edit Event</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    @include('admin.includes.alerts')
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Event</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('events.update', $event->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Title<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" required name="title" value="{{ $event->title }}" placeholder="Enter event title">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Color<span class="text-danger">*</span></label>
                                            <input type="color" class="form-control" required name="color" value="{{ $event->color }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Start Date/Time<span class="text-danger">*</span></label>
                                            <input type="datetime-local" class="form-control" required name="start" value="{{ $event->start }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>End Date/Time<span class="text-danger">*</span></label>
                                            <input type="datetime-local" class="form-control" required name="end" value="{{ $event->end }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group d-flex justify-content-end">
                                    <button class="btn btn-primary" type="submit">Update Event</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
