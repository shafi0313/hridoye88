<!DOCTYPE html>
<html lang="en">
@php
    $user = auth()->user();
@endphp

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="../assets/img/icon.ico" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <!-- Fonts and icons --> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('backend/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands", "simple-line-icons"
                ],
                urls: ['{{ asset('backend/css/fonts.min.css') }}']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    {{-- <!-- CSS Files --> --}}
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/atlantis.min.css') }}">

    {{-- summer note --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css"
        integrity="sha512-ZbehZMIlGA8CTIOtdE+M81uj3mrcgyrh6ZFeG33A4FHECakGrOsTPlPQ8ijjLkxgImrdmSVUHn1j+ApjodYZow=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link href="{{ asset('common/css/custom.css') }}" rel="stylesheet" type="text/css" />

</head>

<body data-background-color="bg1">
    <div class="loading-overlay">
        <div class="loading-spinner"></div>
    </div>
    <div class="wrapper">
        <div class="main-header">
            {{-- <!-- Logo Header --> --}}
            <div class="logo-header" data-background-color="purple">
                <a href="{{ route('admin.dashboard') }}" class="logo">
                    <h4 class="display:4 text-light" style="margin-top: 20px">Hridoye 88</h4>
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            {{-- <!-- End Logo Header --> --}}

            {{-- <!-- Navbar Header --> --}}
            @include('admin.layouts.includes.header')
            {{-- <!-- End Navbar --> --}}
        </div>

        {{-- <!-- Sidebar --> --}}
        @include('admin.layouts.includes.navigation')
        {{-- <!-- End Sidebar --> --}}

        @yield('content')
        <div id="ajax_modal_container"></div>
        @include('admin.layouts.includes.footer')
    </div>
    </div>

    {{-- <!--   Core JS Files   --> --}}
    <script src="{{ asset('backend/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/core/bootstrap.min.js') }}"></script>
    {{-- <!-- jQuery UI --> --}}
    <script src="{{ asset('backend/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>
    {{-- <!-- jQuery Scrollbar --> --}}
    <script src="{{ asset('backend/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugin/select2/select2.full.min.js') }}"></script>
    {{-- <!-- Sweet Alert --> --}}
    <script src="{{ asset('backend/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
    {{-- <!-- Atlantis JS --> --}}
    <script src="{{ asset('backend/js/atlantis.min.js') }}"></script>

    {{-- Summer Note --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"
        integrity="sha512-lVkQNgKabKsM1DA/qbhJRFQU8TuwkLF2vSN3iU/c7+iayKs08Y8GXqfFxxTZr1IcpMovXnf2N/ZZoMgmZep1YQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- <!-- CUSTOM JS --> --}}
    <script src="{{ asset('common/js/http.js') }}"></script>
    <script src="{{ asset('common/js/custom.js') }}"></script>
    {{-- <script src="{{ asset('backend/js/custom.js') }}"></script>
    <script src="{{ asset('backend/js/plugins-init.js') }}"></script> --}}

    {{-- <script>
        $("form").on('submit', function(e){
            $(this).find('button[type="submit"]').attr('disabled', 'disabled');
        });
    </script> --}}
    @include('include.alert')
    @include('sweetalert::alert')
    @stack('custom_scripts')
    <div id="ajax_modal_container"></div>
    <div id="ajax_show_modal_container"></div>
</body>

</html>
