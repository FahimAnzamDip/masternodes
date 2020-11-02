<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="TechyDevs" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ $title ?? config('app.name', 'MPP') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('frontend') }}/images/favicon.png" />

    <!-- Google fonts -->
    <link href="//fonts.googleapis.com/css?family=Fira+Sans:100,200,300,400,500,600,700,800&amp;display=swap"
          rel="stylesheet" />

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/font-awesome.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/flaticon.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css" />
</head>

<body>
<!-- start per-loader -->
<div class="loader-container">
    <div class="loader-ripple">
        <div></div>
        <div></div>
    </div>
</div>
<!-- end per-loader -->

@include('page-sections.header')

@yield('content')

@include('page-sections.footer')

<div class="cookie-container text-center">
    <p>
        We use cookies in this website to give you the best experience on our
        website. To find out more, read our
        <a class="text-primary" href="#">privacy policy</a> and <a class="text-primary" href="#">cookie policy</a>.
    </p>

    <button class="cookie-btn">
        Allow Cookies
    </button>
</div>

<!-- start back-to-top -->
<div id="back-to-top">
    <i class="fas fa-angle-up" title="Go top"></i>
</div>
<!-- end back-to-top -->

@include('sweetalert::alert')
<!-- Template JS Files -->
<script src="{{ asset('frontend') }}/js/jquery.min.js"></script>
<script src="{{ asset('frontend') }}/js/popper.min.js"></script>
<script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('frontend') }}/js/owl.carousel.min.js"></script>
<script src="{{ asset('frontend') }}/js/waypoint.min.js"></script>
<script src="{{ asset('frontend') }}/js/jquery.counterup.min.js"></script>
<script src="{{ asset('frontend') }}/js/smooth-scrolling.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f8c896b1c1f1e22"></script>
<script src="{{ asset('frontend') }}/js/main.js"></script>
<script>
    $(document).on("click", "#logout", function (e) {
        e.preventDefault();
        Swal.fire({
            icon: "warning",
            title: "Are you sure?",
            type: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonClass: "btn btn-danger btn-lg mr-3",
            confirmButtonText: "Yes, Log out!",
            cancelButtonClass: "btn btn-secondary btn-lg",
            allowOutsideClick: true
        }).then((willLogout) => {
            if (willLogout.value) {
                $('#logout-form').submit();
            }
        });
    });
</script>
</body>

</html>
