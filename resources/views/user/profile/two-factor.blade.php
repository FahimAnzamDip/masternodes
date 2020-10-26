@extends('layouts.back-layout')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>2FA</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('home.page') }}">Home</a></div>
                <div class="breadcrumb-item"><a href="{{ route('user.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item">2FA Activation</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">2FA Activation</h2>
            <p class="section-lead">You can activate your two factor authentication by clicking the button below.</p>

            @include('profile.two-factor-authentication-form')
        </div>
    </section>
@endsection
