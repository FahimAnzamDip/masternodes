@extends('layouts.back-layout')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>Live Chat</h1>
            <div class="section-header-breadcrumb">
                @if(Auth::user()->role == 2)
                    <div class="breadcrumb-item active"><a href="{{ route('home.page') }}">Home</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('user.support') }}">Support</a></div>
                    <div class="breadcrumb-item">Live Chat</div>
                @else
                    <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Live Chat</div>
                @endif
            </div>
        </div>

        <div class="section-body" id="app">
            <chat-component :role="{{ Auth::user() }}"/>
        </div>
    </section>
@endsection

@section('page-scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
