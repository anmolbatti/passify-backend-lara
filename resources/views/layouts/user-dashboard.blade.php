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
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('toastr/toastr.css')}}">

    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>


    @stack('style')
    @vite(['resources/css/app.css','resources/js/app.js'])

    <style>
        #locationsTable_length{
            display: none;
        }

        #locationsTable_filter{
            display: none;
        }
        .pac-container{
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

    <nav class="navbar bg-body-tertiary h-[50px]" id="main-header" style="background: url('{{ asset('images/bg-04.jpg') }}')">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('welcome') }}">
                <img src="{{ asset('img/logo-name.png') }}" alt="Logo"
                    class="d-inline-block align-text-top img-fluid main-logo-img h-[30px] object-contain">
            </a>
            <div class="text-center">

                @if(!subscription()['status'])
                    {{-- <p>Welcome, authenticated user!</p> --}}
                    <span class="text-pink text-capitalize text-[16px]">
                        {{ __(subscription()['trial_days_left'].' days left on trial') }}
                    </span>
                  <a href="{{route('plan.show')}}" class="btn btn-sm btn--theme">{{ __('Upgrade Now') }}</a>
                @elseif (subscription()['trial_days_left'] > 0)
                    <span class="text-pink text-capitalize text-[16px]">
                        {{ __(subscription()['trial_days_left'].' days left on trial') }}
                    </span>
                    <a href="{{route('plan.show')}}" class="btn btn-sm btn--theme">{{ __('Upgrade Now') }}</a>
                    <a href="{{route('plan.refund')}}" class="btn btn-sm btn-warning">{{ __('Refund Now') }}</a>
                @endif

            </div>

            <div class="d-flex gap-3 items-center md-5 profile-bar">
                {{-- <div class="dropdown">
                    <a class="dropdown-toggle text-dark" href="#" role="button" id="userDropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="bx bx-globe"></span> <span class="text-uppercase text-[16px]">
                            {{__('Language')}}
                        </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{route('profile.edit') }}">{{ __('English') }}</a>
                        <a class="dropdown-item" href="{{route('plan.show')}}">{{ __('عربي') }}</a>
                    </div>
                </div> --}}
                <div class="dropdown">
                    <a class="dropdown-toggle text-dark" href="#" role="button" id="userDropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="bx bx-globe"></span> <span class="text-uppercase text-[16px]">
                            {{__('Language')}}
                        </span>
                    </a>
                    <form action="{{ route('change.Language') }}" method="POST">
                        @csrf
                        <div class="dropdown-menu p-3" aria-labelledby="userDropdown">
                            <button type="submit" name="language" value="eng" class=" text-dark" role="button">
                                <span class="text-uppercase text-[16px]">{{ __('English') }}</span>
                            </button>
                            <br>
                            <button type="submit" name="language" value="ara" class=" text-dark" role="button">
                                <span class="text-uppercase text-[16px]">{{ __('عربي') }}</span>
                            </button>
                        </div>
                    </form>
                </div>
                {{-- <a href="#!" class="text-dark"> <span class="flaticon-home ms-1"></span></a> --}}

                {{-- <span class="flaticon-user ms-1"></span> --}}
                <div class="dropdown">
                    <a class="dropdown-toggle text-dark" href="#" role="button" id="userDropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="flaticon-user"></span> <span class="text-uppercase text-[16px]">
                            {{ auth()->user()->name }}
                        </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Settings') }}</a>
                        {{-- <a class="dropdown-item" href="{{route('settings.index')}}">{{ __('Settings') }}</a> --}}
                        <a class="dropdown-item" href="{{route('plan.show')}}">{{ __('Subscription') }}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item logout-form" href="#">{{ __('Logout') }}</a>
                    </div>
                </div>



                {{-- <span class="text-pink">
                    30 Days Left on Trail
                </span>
                <a href="#!">Upgrade Now !!</a> --}}

            </div>

        </div>
    </nav>

    <!-- ======= Mobile nav toggle button ======= -->
    <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
    <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex flex-column justify-content-center">


        <nav id="navbar" class="navbar nav-menu">
            <ul>
                <li><a href="{{ route('dashboard') }}"
                        class="nav-link  {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}"><i
                            class="bx bx-home"></i> <span>{{ __('My Cards') }}</span></a>
                </li>
                <li><a href="{{ route('subusers.index') }}"
                        class="nav-link {{ Route::currentRouteName() == 'subusers.index' ? 'active' : '' }} "><i
                            class="bx bx-user-plus"></i> <span>{{ __('Sub Users') }}</span></a></li>
                <li><a href="{{ route('loyality.start') }}"
                        class="nav-link
                    {{ Route::currentRouteName() == 'loyality.start' ? 'active' : '' }}
                    "><i
                            class="bx bxs-widget"></i>
                        <span>{{ __('Start') }}</span></a>
                </li>
                <li><a href="{{ route('settings.index') }}" class="nav-link "><i class="bx bx-cog"></i>
                        <span>{{ __('Settings') }}</span></a></li>
                {{-- <li><a href="{{ route('loyality.create') }}"
                        class="nav-link {{ Route::currentRouteName() == 'loyality.create' ? 'active' : '' }} "><i
                            class="bx bx-paint"></i>
                        <span>Design</span></a></li> --}}
                {{-- <li><a href="{{ route('profile.edit') }}"
                        class="nav-link {{ Route::currentRouteName() == 'profile.edit' ? 'active' : '' }} "><i
                            class="bx bx-user"></i>
                        <span>Profile</span></a></li> --}}
                <li><a href="#contact" class="nav-link  logout-form"><i class="bx bx-exit"></i> <span>{{ __('Logout') }}</span></a>
                </li>
            </ul>
        </nav><!-- .nav-menu -->

    </header><!-- End Header -->
    <main id="main" class="card pink-border">
        {{-- @if (session()->has('success'))
        <div class="alert alert-info">
            {{ __(session('success')) }}
        </div>
        @endif
        @if (session()->has('danger'))
        <div class="alert alert-danger">
            {{ __(session('danger')) }}
        </div>
        @endif --}}
        @yield('content')
    </main>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <form action="{{ route('logout') }}" id="logout-form" method="POST">
        @csrf
    </form>

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
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('user-dashboard/assets/js/main.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
    <script src="{{asset('js/qrcode/qrcode.js')}}"></script>
    <script src="{{asset('js/qrcode/qrcode.min.js')}}"></script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYxbvsaLJWHoD41beX5o19038MQUHLaYM&callback=initMap&libraries=places"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="{{URL::asset('toastr/toastr.js')}}"></script>



    <script>
        $(".logout-form").on("click", function(event) {
            event.preventDefault();
            $("#logout-form").submit();
        })

        $(document).ready(function() {
            $('#overviewTable').DataTable({
                paging: true,
                pageLength: 10,
                searching: true,
                search: {
                    searchPlaceholder: 'Search...'
                }
            });
        });
    </script>
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
