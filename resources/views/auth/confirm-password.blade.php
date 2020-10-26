<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $title ?? config('app.name', 'MPP') }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('frontend') }}/images/favicon.png" />
    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/style.css">
</head>

<body>

<div id="app">
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 90vh;">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h6 class="text-primary mb-0">Please Verify With Your Password</h6>
                    </div>
                    <div class="card-body">
                        @include('user.includes.alerts')

                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <div class="form-group">
                                <label>{{ __('Password') }} <span class="text-danger">*</span></label>
                                <input class="form-control" type="password" name="password" required autocomplete="current-password"/>
                            </div>

                            <div class="form-group d-inline">
                                <button type="submit" class="btn btn-primary mr-2 mb-2">
                                    {{ __('Confirm Password') }}
                                </button>

                                <a href="{{ route('user.twofactor') }}" class="btn btn-primary mb-2">
                                    {{ __('Go Back') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

