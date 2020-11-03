@extends('layouts.back-layout')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>Events</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item ">Events</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row mb-3">
                <div class="col-md-12 d-flex justify-content-end">
                    <a href="{{ route('admin.calendar') }}" class="btn btn-primary mr-3"><i class="fas fa-calendar-alt"></i> View Calendar</a>
                    <a href="{{ route('events.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create Event</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless text-center mb-0" id="datatable">
                            <thead>
                            <tr>
                                <th scope="col">Event Title</th>
                                <th scope="col">Color</th>
                                <th scope="col">Start Date/Time</th>
                                <th scope="col">End Date/Time</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($events as $key => $event)
                                <tr>
                                    <td>{{ $event->title }}</td>
                                    <td><div style="background: {{ $event->color }}; width: 20px; height: 20px;border-radius: 3px;"></div></td>
                                    <td>{{ \Carbon\Carbon::parse($event->start)->format('jS F Y \| h:i A') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($event->end)->format('jS F Y \| h:i A') }}</td>
                                    <td>{{ $event->created_at->format('jS F Y') }}</td>
                                    <td>
                                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary mb-1"><i class="fas fa-edit"></i></a>

                                        <a href="{{ route('events.delete', $event->id) }}" id="delete" class="btn btn-danger mb-1"><i class="fas fa-trash"></i></a>
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
