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
            <h1>Event Calendar</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('home.page') }}">Home</a></div>
                <div class="breadcrumb-item"><a href="{{ route('user.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item ">Event Calendar</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        {!! $calendar->calendar() !!}
                    </div>
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
