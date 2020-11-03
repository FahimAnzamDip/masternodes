<section class="about-area" style="background-color: #F6F8F9;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="sec-heading text-center">
                    <div class="heading-circle m-x-auto"></div>
                    <p class="sec__meta">Special Coins</p>
                    <h2 class="sec__title">MPP Special Coins</h2>
                </div><!-- end sec-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row mt-2">
            @forelse($special_coins as $special_coin)
                <div class="col-lg-2 col-md-3 col-sm-4 mb-3">
                    <a href="{{ $special_coin->coin_link }}" class="text-dark">
                        <div class="card">
                            <div class="card-body text-center">
                                <img width="64" src="{{ asset('storage/special_coin_images') . '/' . $special_coin->coin_image }}" alt="special coin" class="rounded-circle mb-3">
                                <h5 class="font-weight-normal text-uppercase">{{ $special_coin->coin_name }}</h5>
                                <p class="text-uppercase">({{ $special_coin->coin_short_name }})</p>
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
<!--MPP COINS-->

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
                <div class="col-lg-2 col-md-3 col-sm-4 mb-3">
                    <a href="{{ $normal_coin->coin_link }}" class="text-dark">
                        <div class="card">
                            <div class="card-body text-center">
                                <img width="64" src="{{ asset('storage/normal_coin_images') . '/' . $normal_coin->coin_image }}" alt="logo" class="rounded-circle mb-3">
                                <h5 class="font-weight-normal text-uppercase">{{ $normal_coin->coin_name }}</h5>
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

