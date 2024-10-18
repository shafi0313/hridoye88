<!DOCTYPE html>
<html class="no-js" lang="zxx">
    @php $headers = App\Models\Header::all() @endphp
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hridoye88</title>

    <meta name="description" content="Hridoye88">
    <meta name="keywords" content="Hridoye88">
    <meta name="author" content="Hridoye88">

    {{-- <!-- twitter card starts from here, if you don't need remove this section --> --}}
    {{-- <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@yourtwitterusername">
    <meta name="twitter:creator" content="@yourtwitterusername">
    <meta name="twitter:url" content="http://twitter.com">
    <meta name="twitter:title" content="Your home page title, max 140 char"> <!-- maximum 140 char -->
    <meta name="twitter:description" content="Your site description, maximum 140 char "> <!-- maximum 140 char -->
    <meta name="twitter:image" content="assets/img/twittercardimg/twittercard-144-144.png"> --}}
    <!-- when you post this page url in twitter , this image will be shown -->
    {{-- <!-- twitter card ends here --> --}}

    {{-- <!-- facebook open graph starts from here, if you don't need then delete open graph related  --> --}}
    {{-- <meta property="og:title" content="Your home page title">
    <meta property="og:url" content="http://your domain here.com">
    <meta property="og:locale" content="en_US">
    <meta property="og:site_name" content="Your site name here"> --}}
    {{-- <!--meta property="fb:admins" content="" /-->  <!-- use this if you have  --> --}}
    {{-- <meta property="og:type" content="website"> <!-- 'article' for single page  -->
    <meta property="og:image" content="{{ asset('frontend/assets/img/opengraph/fbphoto-476-476.png') }}"> --}}
    <!-- when you post this page url in facebook , this image will be shown -->
    {{-- <!-- facebook open graph ends here --> --}}

    {{-- <!-- desktop bookmark --> --}}
    {{-- <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('frontend/assets/img/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff"> --}}

    {{-- <!-- icons & favicons --> --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('uploads/images/icons/favicon.jpg') }}">
    {{-- <!-- this icon shows in browser toolbar -->
    <link rel="icon" type="image/x-icon" href="{{ asset('uploads/images/icons/favicon.jpg') }}">
    <!-- this icon shows in browser toolbar -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('frontend/assets/img/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('frontend/assets/img/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('frontend/assets/img/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('frontend/assets/img/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114"
        href="{{ asset('frontend/assets/img/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120"
        href="{{ asset('frontend/assets/img/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144"
        href="{{ asset('frontend/assets/img/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152"
        href="{{ asset('frontend/assets/img/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('frontend/assets/img/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('frontend/assets/img/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/assets/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('frontend/assets/img/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/assets/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('frontend/assets/img/favicon/manifest.json') }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/img/favicon.ico') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/img/favicon.ico') }}"> --}}

    {{-- <!-- Fallback For IE 9 [ Media Query and html5 Shim] -->
<!--[if lt IE 9]>
<script src="assets/vendor/css3-mediaqueries-js/css3-mediaqueries.js"></script>
<![endif]--> --}}

    {{-- <!-- GOOGLE FONT --> --}}
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    {{-- <!-- BOOTSTRAP CSS --> --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/navbar/bootstrap-4-navbar.css') }}">

    {{-- <!--Animate css --> --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/animate/animate.css') }}" media="all">

    {{-- <!-- FONT AWESOME CSS --> --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/fontawesome/css/font-awesome.min.css') }}">

    {{-- <!--owl carousel css --> --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/owl-carousel/owl.carousel.css') }}" media="all">

    {{-- <!--Magnific Popup css --> --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/magnific/magnific-popup.css') }}" media="all">

    {{-- <!--Nice Select css --> --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/nice-select/nice-select.css') }}" media="all">

    {{-- <!--Offcanvas css --> --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/js-offcanvas/css/js-offcanvas.css') }}" media="all">

    {{-- <!-- MODERNIZER  --> --}}
    <script src="{{ asset('frontend/assets/vendor/modernizr/modernizr-custom.js') }}"></script>

    {{-- <!-- Main Master Style  CSS  --> --}}
    <link id="cbx-style" data-layout="1" rel="stylesheet" href="{{ asset('frontend/assets/css/style-default.min.css') }}" media="all">
    <link id="cbx-style" rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}">
</head>

<body>

    {{-- <!--[if lt IE 7]>
<p class="browsehappy">We are Extreamly sorry, But the browser you are using is probably from when civilization started. Which is way behind to view this site properly. Please update to a modern browser, At least a real browser. </p>
<![endif]--> --}}

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

    {{-- <!-- POPPER JS --> --}}
    <script src="{{ asset('frontend/assets/vendor/bootstrap/js/popper.min.js') }}"></script>

    {{-- <!-- BOOTSTRAP JS --> --}}
    <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/navbar/bootstrap-4-navbar.js') }}"></script>

    {{-- <!--owl--> --}}
    <script src="{{ asset('frontend/assets/vendor/owl-carousel/owl.carousel.min.js') }}"></script>

    {{-- <!--Waypoint--> --}}
    <script src="{{ asset('frontend/assets/vendor/waypoint/waypoints.min.js') }}"></script>

    {{-- <!--CounterUp--> --}}
    <script src="{{ asset('frontend/assets/vendor/counterup/jquery.counterup.min.js') }}"></script>

    {{-- <!--isotope--> --}}
    <script src="{{ asset('frontend/assets/vendor/isotope/isotope.pkgd.min.js') }}"></script>

    {{-- <!--magnific--> --}}
    <script src="{{ asset('frontend/assets/vendor/magnific/jquery.magnific-popup.min.js') }}"></script>

    {{-- <!--Smooth Scroll--> --}}
    <script src="{{ asset('frontend/assets/vendor/smooth-scroll/jquery.smooth-scroll.min.js') }}"></script>

    {{-- <!--Jquery Easing--> --}}
    <script src="{{ asset('frontend/assets/vendor/jquery-easing/jquery.easing.1.3.min.js') }}"></script>

    {{-- <!--Nice Select --> --}}
    <script src="{{ asset('frontend/assets/vendor/nice-select/jquery.nice-select.js') }}"></script>

    {{-- <!--Jquery Valadation --> --}}
    <script src="{{ asset('frontend/assets/vendor/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/validation/additional-methods.min.js') }}"></script>

    {{-- <!--off-canvas js --> --}}
    <script src="{{ asset('frontend/assets/vendor/js-offcanvas/js/js-offcanvas.pkgd.min.js') }}"></script>

    {{-- <!-- Countdown --> --}}
    <script src="{{ asset('frontend/assets/vendor/jquery.countdown/jquery.countdown.min.js') }}"></script>

    {{-- <!-- custom js: main custom theme js file  --> --}}
    <script src="{{ asset('frontend/assets/js/theme.min.js') }}"></script>

    {{-- <!-- custom js: custom js file is added for easy custom js code  --> --}}
    <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>

    {{-- <!-- custom js: custom scripts for theme style switcher for demo purpose  --> --}}


    @include('include.alert')
    @include('sweetalert::alert')
    @stack('custom_scripts')
</body>

</html>
