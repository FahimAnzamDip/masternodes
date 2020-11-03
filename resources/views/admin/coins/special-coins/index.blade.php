@extends('layouts.back-layout')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>Special Coins</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item ">Special Coins</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row mb-3">
                <div class="col-md-12 d-flex justify-content-end">
                    <a href="{{ route('special-coins.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create Special Coin</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless text-center mb-0" id="datatable">
                            <thead>
                            <tr>
                                <th scope="col">Coin Name</th>
                                <th scope="col">Short Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Link</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coins as $key => $coin)
                                <tr>
                                    <td>{{ $coin->coin_name }}</td>
                                    <td>{{ $coin->coin_short_name }}</td>
                                    <td><img width="32" src="{{ asset('storage/special_coin_images') . '/' . $coin->coin_image }}" alt="special coin image"></td>
                                    <td>{{ $coin->coin_link }}</td>
                                    <td>{{ $coin->created_at->format('jS F Y') }}</td>
                                    <td>
                                        <a href="{{ route('special-coins.edit', $coin->id) }}" class="btn btn-primary mb-1"><i class="fas fa-edit"></i></a>

                                        <a href="{{ route('special-coins.delete', $coin->id) }}" id="delete" class="btn btn-danger mb-1"><i class="fas fa-trash"></i></a>
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
