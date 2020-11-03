@extends('layouts.back-layout')

@section('page-styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <style>
        .fc-title {
            font-weight: bold;
            color: #ffffff;
        }
        .fc-time {
            font-weight: bold;
            color: #ffffff;
            margin-right: 10px;
        }
    </style>
@endsection

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>Calendar</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item ">Calendar</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row mb-3">
                <div class="col-md-12 d-flex justify-content-end">
                    <a href="{{ route('events.index') }}" class="btn btn-primary mr-3"><i class="fas fa-calendar-alt"></i> All Events</a>
                    <a href="{{ route('events.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create Event</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    {!! $calendar->calendar() !!}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page-scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $calendar->script() !!}
@endsection
