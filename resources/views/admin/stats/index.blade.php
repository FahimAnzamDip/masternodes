@extends('layouts.back-layout')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>Stats</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item ">Stats</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Stats</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('stats.update') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="transaction_count">Transaction Count</label>
                                    <input type="number" id="transaction_count" value="{{ $stat->transaction_count }}" name="transaction_count" required class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="masternodes_count">Masternodes Count</label>
                                    <input type="number" id="masternodes_count" value="{{ $stat->masternodes_count }}" name="masternodes_count" required class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="community_count">Community Count</label>
                                    <input type="number" id="community_count" value="{{ $stat->community_count }}" name="community_count" required class="form-control">
                                </div>

                                <input type="hidden" value="{{ $stat->id }}" name="id">

                                <div class="form-group mb-0 d-flex justify-content-end">
                                    <button class="btn btn-primary" type="submit">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
