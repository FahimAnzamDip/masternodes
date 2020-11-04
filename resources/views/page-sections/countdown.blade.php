@if(\Carbon\Carbon::now() <= \Carbon\Carbon::parse($timer->countdown))

    @section('front-page-styles')
        <style>
            .count-down-section {
                padding: 100px 0;
            }

            .count-down-section h2 {
                font-size: 60px;
                color: #333333;
                margin: 0;
            }

            @media (max-width: 1199px) {
                .count-down-section h2 {
                    font-size: 36px;
                    font-size: 3.44444rem;
                }
            }

            @media (max-width: 767px) {
                .count-down-section h2 {
                    font-size: 30px;
                    font-size: 2.77778rem;
                }
            }

            .count-down-section h2>span {
                font-size: 18px;
                display: block;
                margin-bottom: 0.6em;
                margin: 20px 0;

            }

            .count-down-item2 h2>span {
                font-size: 18px;
                display: block;
                margin-bottom: 0.6em;
            }

            @media (max-width: 1199px) {
                .count-down-section h2>span {
                    font-size: 25px;
                    font-size: 1.38889rem;
                }
            }

            @media (max-width: 767px) {
                .count-down-section h2>span {
                    font-size: 14px;
                }
            }


            .count-down-section #clock {
                color: #5e9a8e;
                overflow: hidden;
            }

            .count-down-section #clock>div {
                width: 18%;
                float: left;
                text-align: center;
                border: 1px solid rgba(150, 150, 150, 0.5);
                border-bottom-left-radius: 50px;
                border-top-right-radius: 50px;
                color: #283A5E;
                padding: 20px 0;
                margin-top: 30px;
            }

            @media (max-width: 767px) {
                .count-down-section #clock>div {
                    width: calc(50% - 5px);
                }
            }

            .count-down-section #clock>div+div {
                margin-left: 2%;
            }

            @media (max-width: 767px) {
                .count-down-section #clock {
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: space-between;
                }
                .count-down-section #clock>div {
                    flex-basis: calc(100% * (1/2) - 15px);
                    margin-bottom: 30px;
                }
            }

            .count-down-section #clock .box>div {
                font-size: 60px;
                font-weight: 600;
                line-height: 1em;
            }

            @media (max-width: 1199px) {
                .count-down-section #clock .box>div {
                    font-size: 36px;
                }
            }

            @media (max-width: 991px) {
                .count-down-section #clock .box>div {
                    font-size: 40px;
                    line-height: 1.3em;
                }
            }

            .count-down-section #clock .box span {
                font-size: 14px;
                text-transform: uppercase;
            }
        </style>
    @endsection

    <section class="about-area count-down-section" style="background-color: #FDFDFD;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="sec-heading text-center">
                        <div class="heading-circle m-x-auto"></div>
                        <p class="sec__meta">Next Event</p>
                        <h2 class="sec__title">Event Coming Soon</h2>
                    </div><!-- end sec-heading -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row mt-2">
                <div class="col-12 col-lg-12 text-center">
                    <div class="count-down-clock text-center">
                        <div id="clock">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--COUNTDOWN-->

    @section('front-page-scripts')
        <script>
            if ($("#clock").length) {
                $('#clock').countdown('{{ $timer->countdown }}', function(event) {
                    var $this = $(this).html(event.strftime('' +
                        '<div class="box"><div>%D</div> <span>month</span> </div>' +
                        '<div class="box"><div>%D</div> <span>Days</span> </div>' +
                        '<div class="box"><div>%H</div> <span>Hours</span> </div>' +
                        '<div class="box"><div>%M</div> <span>Mins</span> </div>' +
                        '<div class="box"><div>%S</div> <span>Secs</span> </div>'
                    ));
                });
            }
        </script>
    @endsection

@endif
