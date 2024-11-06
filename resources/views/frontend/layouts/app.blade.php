<!DOCTYPE html>
<html class="no-js" lang="en">
@php $headers = App\Models\Header::all() @endphp

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hridoye 88</title>

    <meta name="description" content="Hridoye88">
    <meta name="keywords" content="Hridoye88">
    <meta name="author" content="Hridoye88">

    {{-- <!-- icons & favicons --> --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('uploads/images/icons/favicon.jpg') }}">

    {{-- <!-- GOOGLE FONT --> --}}
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/navbar/bootstrap-4-navbar.css') }}">

    {{-- <!--Animate css --> --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/animate/animate.css') }}" media="all">

    {{-- <!-- FONT AWESOME CSS --> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/fontawesome/css/font-awesome.min.css') }}">

    {{-- <!--owl carousel css --> --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/owl-carousel/owl.carousel.css') }}" media="all">

    {{-- <!--Magnific Popup css --> --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/magnific/magnific-popup.css') }}" media="all">

    {{-- <!--Nice Select css --> --}}
    {{-- <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/nice-select/nice-select.css') }}" media="all"> --}}

    {{-- <!--Offcanvas css --> --}}
    {{-- <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/js-offcanvas/css/js-offcanvas.css') }}" media="all"> --}}

    {{-- <!-- MODERNIZER  --> --}}
    <script src="{{ asset('frontend/assets/vendor/modernizr/modernizr-custom.js') }}"></script>

    {{-- <!-- Main Master Style  CSS  --> --}}
    <link id="cbx-style" data-layout="1" rel="stylesheet"
        href="{{ asset('frontend/assets/css/style-default.min.css') }}" media="all">
    <link id="cbx-style" rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}">
</head>

<body>
    @include('frontend.layouts.includes.navigation')
    @yield('content')
    @include('frontend.layouts.includes.footer')

    <!--== Scroll Top ==-->
    <a href="#" class="scroll-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!--== Scroll Top ==-->

    <!-- SITE SCRIPT  -->

    {{-- <!-- Jquery JS  --> --}}
    <script src="{{ asset('frontend/assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/navbar/bootstrap-4-navbar.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/waypoint/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/magnific/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/smooth-scroll/jquery.smooth-scroll.min.js') }}"></script>
    {{-- <script src="{{ asset('frontend/assets/vendor/jquery-easing/jquery.easing.1.3.min.js') }}"></script> --}}
    <script src="{{ asset('frontend/assets/vendor/nice-select/jquery.nice-select.js') }}"></script>
    {{-- <script src="{{ asset('frontend/assets/vendor/validation/jquery.validate.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('frontend/assets/vendor/validation/additional-methods.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('frontend/assets/vendor/js-offcanvas/js/js-offcanvas.pkgd.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('frontend/assets/vendor/jquery.countdown/jquery.countdown.min.js') }}"></script> --}}
    <script src="{{ asset('frontend/assets/js/theme.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>

    @include('include.alert')
    @include('sweetalert::alert')
    @stack('custom_scripts')
</body>

</html>
