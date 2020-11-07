@extends('layouts.front-layout')

@section('content')
    <!-- ================================
    START BREADCRUMB AREA
================================= -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <div class="breadcrumb-inner">
                            <h2 class="breadcrumb__title">Masternodes.</h2>
                            <ul class="breadcrumb__list">
                                <li class="active__list-item"><a href="{{ route('home.page') }}">home</a></li>
                                <li>Masternodes</li>
                            </ul>
                        </div><!-- end breadcrumb-inner -->
                        <div class="text-outline">Masternodes</div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end hero-area -->
    <!-- ================================
        END BREADCRUMB AREA
    ================================= -->


    <!-- ================================
       START masternodes AREA
================================= -->
    <section class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="sec-heading text-center">
                        <div class="heading-circle m-x-auto"></div>
                        <p class="sec__meta">Some Coins</p>
                        <h2 class="sec__title">Masternode Coins</h2>
                    </div><!-- end sec-heading -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row mt-2">
                @forelse($normal_coins as $normal_coin)
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-3">
                        <a href="{{ $normal_coin->coin_link }}" class="text-dark">
                            <div class="card coin">
                                <div class="card-body text-center">
                                    <img width="64" src="{{ asset('storage/normal_coin_images') . '/' . $normal_coin->coin_image }}" alt="logo" class="mb-3">
                                    <h6 class="font-weight-normal text-uppercase">{{ $normal_coin->coin_name }}</h6>
                                    <p class="text-uppercase">({{ $normal_coin->coin_short_name }})</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning text-center">No Coins Available</div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!--MASTERNODE COINS-->
    <!-- ================================
       END masternodes AREA
    ================================= -->
@endsection
