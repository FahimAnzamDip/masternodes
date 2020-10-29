@extends('layouts.back-layout')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>Support</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('home.page') }}">Home</a></div>
                <div class="breadcrumb-item"><a href="{{ route('user.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Support</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Support</h2>
            <p class="section-lead">You can contact with us from here.</p>

            <div class="card">
                <div class="card-body">
                    <p class="text-primary">If you want to chat with a live support person. Please click on Live Support.</p>
                    <a href="{{ route('chats') }}" class="btn btn-primary">Live Support</a>
                </div>
            </div>
        </div>
    </section>
@endsection
