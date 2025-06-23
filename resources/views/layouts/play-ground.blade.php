<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ config('app.name') }}</title>

    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('user-dashboard/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('user-dashboard/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user-dashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('user-dashboard/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user-dashboard/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user-dashboard/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('user-dashboard/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('user-dashboard/assets/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flaticon.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('toastr/toastr.css') }}">

    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>


    @stack('style')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        #locationsTable_length {
            display: none;
        }

        #locationsTable_filter {
            display: none;
        }

        .pac-container {
            width: 465px;
            position: absolute;
            left: 121px;
            top: 331px;
            z-index: 10000 !important;
            background-color: white !important;
        }
    </style>



</head>

<body>
    <header id="header" class="d-flex flex-column justify-content-center">


        <nav id="navbar" class="navbar nav-menu">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}"
                        class="nav-link  {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}"><i
                            class="bx bx-home"></i> <span>{{ __('Back To Dashboard') }}</span></a>
                </li>
            </ul>
        </nav><!-- .nav-menu -->

    </header>
    <main id="main" class="card pink-border">

        @yield('content')
    </main>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('user-dashboard/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('user-dashboard/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('user-dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user-dashboard/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('user-dashboard/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('user-dashboard/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('user-dashboard/assets/vendor/typed.js/typed.umd.js') }}"></script>
    <script src="{{ asset('user-dashboard/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('user-dashboard/assets/js/main.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
    <script src="{{ asset('js/qrcode/qrcode.js') }}"></script>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="{{ URL::asset('toastr/toastr.js') }}"></script>
    @stack('script')

    @if (session()->has('success'))
        <script>
            toastr.success("{{ __(session('success')) }}");
        </script>
    @endif
    @if (session()->has('danger'))
        <script>
            toastr.error("{{ __(session('danger')) }}");
        </script>
    @endif
    @livewireScriptConfig
</body>

</html>
