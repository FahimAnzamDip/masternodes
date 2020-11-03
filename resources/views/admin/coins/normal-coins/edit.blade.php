@extends('layouts.back-layout')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Special Coin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('special-coins.index') }}">Normal Coins</a></div>
                <div class="breadcrumb-item">Edit Normal Coin</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    @include('admin.includes.alerts')
                    <div class="card">
                        <div class="card-header">
                            <h4>Normal Coin</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('normal-coins.update', $coin->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Coin Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" required name="coin_name" value="{{ $coin->coin_name }}" placeholder="Enter coin name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Coin Short Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" required name="coin_short_name" value="{{ $coin->coin_short_name }}" placeholder="Enter coin short name">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Coin Link<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required name="coin_link" value="{{ $coin->coin_link }}" placeholder="Enter coin link">
                                </div>

                                <div class="form-group">
                                    <label>Coin Image</label>
                                    <div class="my-2">
                                        <img src="{{ asset('storage/special_coin_images') . '/' . $coin->coin_image }}" alt="Special Coin Image">
                                    </div>
                                    <input type="file" class="form-control" name="coin_image">
                                </div>

                                <div class="form-group d-flex justify-content-end">
                                    <button class="btn btn-primary" type="submit">Update Normal Coins</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
