@extends('layouts.back-layout')

@section('page-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
@endsection

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>Countdown</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Countdown</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    @include('admin.includes.alerts')
                    <div class="card">
                        <div class="card-header">
                            <h4>Timer</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('countdown.update', $countdown->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Pick End Date / Time<span class="text-danger">*</span></label>
                                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2" required name="countdown" placeholder="Pick End Date / Time" value="{{ $countdown->countdown }}"/>
                                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fas fa-calendar-alt text-primary"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group d-flex justify-content-end">
                                    <button class="btn btn-primary" type="submit">Update Timer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <script>
        $(function() {
            $('#datetimepicker1').datetimepicker({
                format: "YYYY-MM-DD HH:mm:ss",
                icons: {
                    time: "fas fa-clock",
                    date: "fas fa-calendar",
                    up: "fas fa-arrow-up",
                    down: "fas fa-arrow-down",
                    previous: "fas fa-chevron-left",
                    next: "fas fa-chevron-right",
                    today: "fas fa-clock-o",
                    clear: "fas fa-trash-o"
                }
            });
        });
    </script>
@endsection
