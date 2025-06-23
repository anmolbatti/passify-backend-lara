<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Passify">
    <meta name="description"
        content="BEST LOYALTY PLATFORM FOR BUSINESSES, YOUR BRAND, YOUR CUSTOMERS' CARDS SEAMLESSLY UNITED IN APPLE WALLET AND GOOGLE WALLET ! ">
    <meta name="keywords" content="Passify">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- SITE TITLE -->
    <title>{{ config('app.name') }}</title>

    <!-- FAVICON AND TOUCH ICONS -->
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <meta property="og:image" content="{{ asset('img/logo.png') }}">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet">

    <!-- BOOTSTRAP CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- FONT ICONS -->
    <link href="{{ asset('css/flaticon.css') }}" rel="stylesheet">

    <!-- PLUGINS STYLESHEET -->
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link id="effect" href="{{ asset('css/dropdown-effects/fade-down.css') }}" media="all" rel="stylesheet">
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lunar.css') }}" rel="stylesheet">

    <!-- ON SCROLL ANIMATION -->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">

    <!-- TEMPLATE CSS -->
    <!-- <link href="css/blue-theme.css" rel="stylesheet"> -->
    <!-- <link href="css/crocus-theme.css" rel="stylesheet"> -->
    <!-- <link href="css/green-theme.css" rel="stylesheet"> -->
    <!-- <link href="css/magenta-theme.css" rel="stylesheet"> -->
    <link href="{{ asset('css/pink-theme.css') }}" rel="stylesheet">
    <!-- <link href="css/purple-theme.css" rel="stylesheet"> -->
    <!-- <link href="css/skyblue-theme.css" rel="stylesheet"> -->
    <!-- <link href="css/red-theme.css" rel="stylesheet"> -->
    <!-- <link href="css/violet-theme.css" rel="stylesheet"> -->

    <!-- RESPONSIVE CSS -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    @if (app()->isLocale('ar'))
        <style>
            .ar-margin-r-25 {
                margin-right: 25px !important;
            }
        </style>
    @endif

</head>




<body @if (app()->isLocale('ar')) dir="rtl" @endif>




    <!-- PRELOADER SPINNER
  ============================================= -->
    <div id="loading" class="custom-loading-spinner">
        <div class="spinner-square">
            <div class="square-1 square"></div>
            <div class="square-2 square"></div>
            <div class="square-3 square"></div>
        </div>
    </div>




    <!-- PAGE CONTENT
  ============================================= -->
    <div id="page" class="page font--jakarta">




        <!-- HEADER
   ============================================= -->
        @if (Route::currentRouteName() == 'welcome')
            <header id="header" class="tra-menu navbar-light white-scroll">
                <div class="header-wrapper">


                    <!-- MOBILE HEADER -->
                    <div class="wsmobileheader clearfix">
                        <span class="smllogo"><img src="{{ asset('img/logo-name.png') }}" alt="mobile-logo"></span>
                        <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
                    </div>


                    <!-- NAVIGATION MENU -->
                    <div class="wsmainfull menu clearfix">
                        <div class="wsmainwp clearfix">


                            <!-- HEADER BLACK LOGO -->
                            <div class="desktoplogo">
                                <a href="#hero-12" class="logo-black"><img src="{{ asset('img/logo-name.png') }}"
                                        alt="logo"></a>
                            </div>


                            <!-- HEADER WHITE LOGO -->
                            <div class="desktoplogo">
                                <a href="#hero-12" class="logo-white"><img src="{{ asset('img/logo_white.png') }}"
                                        alt="logo" style="max-height: 60px !important;"></a>
                            </div>


                            <!-- MAIN MENU -->
                            <nav class="wsmenu clearfix">
                                <ul class="wsmenu-list nav-theme">


                                    <!-- DROPDOWN SUB MENU -->



                                    <!-- SIMPLE NAVIGATION LINK -->

                                    <li class="nl-simple" aria-haspopup="true"><a href="#solution"
                                            class="h-link">{{ trans('nav.overview') }}</a></li>
                                    {{-- <li class="nl-simple" aria-haspopup="true"><a href="{{ route('solutions') }}"
                                            class="h-link">{{ trans('nav.solutions') }}</a></li> --}}
                                    <li class="nl-simple" aria-haspopup="true"><a href="{{ route('faq') }}"
                                            class="h-link">{{ trans('nav.faq') }}</a></li>
                                    <li class="nl-simple" aria-haspopup="true"><a href="#pricing-3"
                                            class="h-link">{{ trans('nav.pricing') }}</a></li>





                                    <!-- SIMPLE NAVIGATION LINK -->
                                    {{-- <li class="nl-simple" aria-haspopup="true"><a href="#projects-1"
                                        class="h-link">Projects</a></li> --}}


                                    <!-- SIMPLE NAVIGATION LINK -->
                                    {{-- <li class="nl-simple" aria-haspopup="true"><a href="{{ route('faq') }}"
                                            class="h-link">FAQs</a></li> --}}
                                    <li class="nl-simple" aria-haspopup="true"><a href="{{ route('contactUs') }}"
                                            class="h-link">{{ trans('nav.support') }}
                                        </a></li>
                                    {{-- <li class="nl-simple" aria-haspopup="true"><a href="{{ route('contactUs') }}"
                                            class="h-link">BLOG
                                        </a></li> --}}

                                    @guest

                                        <!-- SIGN IN LINK -->
                                        <li class="nl-simple reg-fst-link mobile-last-link" aria-haspopup="true">
                                            <a href="https://app.passify.info/login"
                                                class="h-link">{{ trans('nav.sign_in') }}</a>
                                        </li>


                                        <!-- SIGN UP BUTTON -->
                                        <li class="nl-simple" aria-haspopup="true">
                                            <a href="https://app.passify.info/register"
                                                class="btn r-04 btn--theme  last-link">{{ trans('nav.sign_up') }}</a>
                                        </li>

                                    @endguest
                                    {{--
                                    @auth

                                        <li class="nl-simple" aria-haspopup="true">
                                            <a href="{{ route('dashboard') }}"
                                                class="btn r-04 btn--theme last-link">{{ trans('nav.dashboard') }}</a>
                                        </li>

                                        <li aria-haspopup="true"><a href="#" class="h-link">
                                                {{ auth()->user()->name }}
                                                <span class="flaticon-user ms-1"></span> <span class="wsarrow"></span></a>
                                            <ul class="sub-menu">

                                                <li aria-haspopup="true"><a
                                                        href="{{ route('profile.edit') }}">{{ trans('nav.profile') }}</a>
                                                </li>

                                                <li aria-haspopup="true">
                                                <li aria-haspopup="true"><a href="#!"
                                                        id="logout-link">{{ trans('nav.profile') }}</a>
                                                </li>
                                        </li>
                                    </ul>
                                    </li>

                                    <form action="{{ route('logout') }}" id="logout-form" method="POST">
                                        @csrf
                                    </form>

                                @endauth --}}

                                    @if (app()->isLocale('ar'))
                                        <li aria-haspopup="true"><a href="{{ route('set.lang', 'ar') }}"
                                                class="h-link">
                                                <img src="{{ asset('img/ara.png') }}" class="ms-1 lang-icon"> <span
                                                    class="wsarrow"></span></a>
                                            <ul class="sub-menu">

                                                <li aria-haspopup="true" dir="rtl"><a
                                                        href="{{ route('set.lang', 'eng') }}"><img
                                                            src="{{ asset('img/eng.png') }}"
                                                            class="ms-2 lang-icon">ENG</a>
                                                </li>


                                        </li>
                                    @else
                                        <li aria-haspopup="true"><a href="{{ route('set.lang', 'eng') }}"
                                                class="h-link">
                                                <img src="{{ asset('img/eng.png') }}" class="ms-1"> <span
                                                    class="wsarrow"></span></a>
                                            <ul class="sub-menu">

                                                <li aria-haspopup="true" dir="rtl"><a
                                                        href="{{ route('set.lang', 'ar') }}"><img
                                                            src="{{ asset('img/ara.png') }}"
                                                            class="ms-2 lang-icon">عربي</a>
                                                </li>

                                        </li>
                                    @endif


                                </ul>
                            </nav> <!-- END MAIN MENU -->


                        </div>
                    </div> <!-- END NAVIGATION MENU -->


                </div> <!-- End header-wrapper -->
            </header>
            <!-- END HEADER -->
        @else
            <header id="header" class="tra-menu navbar-dark inner-page-header white-scroll">
                <div class="header-wrapper">


                    <!-- MOBILE HEADER -->
                    <div class="wsmobileheader clearfix">
                        <span class="smllogo"><img src="{{ asset('img/logo-name.png') }}" alt="mobile-logo"></span>
                        <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
                    </div>


                    <!-- NAVIGATION MENU -->
                    <div class="wsmainfull menu clearfix">
                        <div class="wsmainwp clearfix">


                            <!-- HEADER BLACK LOGO -->
                            <div class="desktoplogo">
                                <a href="{{ route('welcome') }}" class="logo-black"><img
                                        src="{{ asset('img/logo-name.png') }}" alt="logo"></a>
                            </div>


                            <!-- HEADER WHITE LOGO -->
                            <div class="desktoplogo">
                                <a href="{{ route('welcome') }}" class="logo-white"><img
                                        src="{{ asset('img/logo-name.png') }}" alt="logo"></a>
                            </div>


                            <!-- MAIN MENU -->
                            <nav class="wsmenu clearfix">
                                <ul class="wsmenu-list nav-theme">
                                    <!-- SIMPLE NAVIGATION LINK -->
                                    <li class="nl-simple" aria-haspopup="true"><a href="{{ route('welcome') }}"
                                            class="h-link">{{ trans('nav.home') }}</a></li>


                                    <!-- SIMPLE NAVIGATION LINK -->
                                    <li class="nl-simple" aria-haspopup="true"><a href="{{ route('solutions') }}"
                                            class="h-link">{{ trans('nav.solutions') }}</a></li>


                                    <!-- SIMPLE NAVIGATION LINK -->
                                    <li class="nl-simple" aria-haspopup="true"><a href="{{ route('faq') }}"
                                            class="h-link">{{ trans('nav.faq') }}</a></li>
                                    <li class="nl-simple" aria-haspopup="true"><a href="{{ route('contactUs') }}"
                                            class="h-link">{{ trans('nav.support') }}</a></li>
                                    {{-- <li class="nl-simple" aria-haspopup="true"><a href="{{ route('contactUs') }}"
                                            class="h-link">BLOG</a></li> --}}


                                    @guest

                                        <li class="nl-simple reg-fst-link mobile-last-link" aria-haspopup="true">
                                            <a href="https://app.passify.info/login"
                                                class="h-link">{{ trans('nav.sign_in') }}</a>
                                        </li>


                                        <!-- SIGN UP BUTTON -->
                                        <li class="nl-simple" aria-haspopup="true">
                                            <a href="https://app.passify.info/register"
                                                class="btn r-04 btn--theme  last-link">{{ trans('nav.sign_up') }}</a>
                                        </li>

                                    @endguest

                                    {{-- @auth

                                        <li class="nl-simple" aria-haspopup="true">
                                            <a href="{{ route('dashboard') }}"
                                                class="btn r-04 btn--theme last-link">{{ trans('nav.dashboard') }}</a>
                                        </li>

                                        <li aria-haspopup="true"><a href="#" class="h-link">
                                                {{ auth()->user()->name }}
                                                <span class="flaticon-user ms-1"></span> <span class="wsarrow"></span></a>
                                            <ul class="sub-menu">

                                                <li aria-haspopup="true"><a
                                                        href="{{ route('profile.edit') }}">{{ trans('nav.profile') }}</a>
                                                </li>

                                                <li aria-haspopup="true">
                                                <li aria-haspopup="true"><a href="#!"
                                                        id="logout-link">{{ trans('nav.sign_out') }}</a>
                                                </li>
                                        </li>
                                    </ul>
                                    </li>

                                    <form action="{{ route('logout') }}" id="logout-form" method="POST">
                                        @csrf
                                    </form>

                                @endauth --}}

                                    @if (app()->isLocale('ar'))
                                        <li aria-haspopup="true"><a href="{{ route('set.lang', 'ar') }}"
                                                class="h-link">
                                                <img src="{{ asset('img/ara.png') }}" class="ms-1 lang-icon"> <span
                                                    class="wsarrow"></span></a>
                                            <ul class="sub-menu">

                                                <li aria-haspopup="true" dir="rtl"><a
                                                        href="{{ route('set.lang', 'eng') }}"><img
                                                            src="{{ asset('img/eng.png') }}"
                                                            class="ms-2 lang-icon">ENG</a>
                                                </li>


                                        </li>
                                    @else
                                        <li aria-haspopup="true"><a href="{{ route('set.lang', 'eng') }}"
                                                class="h-link">
                                                <img src="{{ asset('img/eng.png') }}" class="ms-1"> <span
                                                    class="wsarrow"></span></a>
                                            <ul class="sub-menu">

                                                <li aria-haspopup="true" dir="rtl"><a
                                                        href="{{ route('set.lang', 'ar') }}"><img
                                                            src="{{ asset('img/ara.png') }}"
                                                            class="ms-2 lang-icon">عربي</a>
                                                </li>

                                        </li>
                                    @endif


                                </ul>
                            </nav> <!-- END MAIN MENU -->


                        </div>
                    </div> <!-- END NAVIGATION MENU -->


                </div> <!-- End header-wrapper -->
            </header> <!-- END HEADER -->
        @endif




        @yield('content')


        <!-- FOOTER-3
   ============================================= -->
        <footer id="footer-3" class="pt-100 footer">
            <div class="container">


                <!-- FOOTER CONTENT -->
                <div class="row">


                    <!-- FOOTER LOGO -->
                    <div class="col-xl-3">
                        <div class="footer-info">
                            <h6 class="s-17 w-700">{{ trans('nav.we_accept') }}</h6>
                            <img class="footer-logo w-25" src="{{ asset('img/mada.jpeg') }}" alt="footer-logo">
                            <img class="footer-logo" src="{{ asset('img/1.png') }}" alt="footer-logo">
                            <img class="footer-logo" src="{{ asset('img/2.png') }}" alt="footer-logo">

                        </div>
                    </div>


                    <!-- FOOTER LINKS -->
                    <div class="col-sm-4 col-md-3 col-xl-2">
                        <div class="footer-links fl-1">

                            <!-- Title -->
                            <h6 class="s-17 w-700">{{ trans('nav.company') }}</h6>

                            <!-- Links -->
                            <ul class="foo-links clearfix">
                                <li>
                                    <p><a href="#!">{{ trans('nav.about_us') }}</a></p>
                                </li>
                                <li>
                                    <p><a href="#!">{{ trans('nav.our_blog') }}</a></p>
                                </li>
                                <li>
                                    <p><a href="{{ route('contactUs') }}">{{ trans('nav.contact_us') }}</a></p>
                                </li>
                            </ul>

                        </div>
                    </div> <!-- END FOOTER LINKS -->


                    <!-- FOOTER LINKS -->
                    <div class="col-sm-4 col-md-3 col-xl-2">
                        <div class="footer-links fl-2">

                            <!-- Title -->
                            <h6 class="s-17 w-700">{{ trans('nav.product') }}</h6>

                            <!-- Links -->
                            <ul class="foo-links clearfix">
                                <li>
                                    <p><a href="#!">{{ trans('nav.integration') }}</a></p>
                                </li>
                                <li>
                                    <p><a href="#!">{{ trans('nav.customers') }}</a></p>
                                </li>
                                <li>
                                    <p><a href="#!">{{ trans('nav.pricing') }}</a></p>
                                </li>
                                <li>
                                    <p><a href="{{ route('help') }}">{{ trans('nav.help_center') }}</a></p>
                                </li>
                            </ul>

                        </div>
                    </div> <!-- END FOOTER LINKS -->


                    <!-- FOOTER LINKS -->
                    <div class="col-sm-4 col-md-3 col-xl-2">
                        <div class="footer-links fl-3">

                            <!-- Title -->
                            <h6 class="s-17 w-700">{{ trans('nav.legal') }}</h6>

                            <!-- Links -->
                            <ul class="foo-links clearfix">
                                <li>
                                    <p><a href="{{ route('terms') }}">{{ trans('nav.terms') }}</a></p>
                                </li>
                                <li>
                                    <p><a href="{{ route('privacy') }}">{{ trans('nav.privacy') }}</a></p>
                                </li>
                                <li>
                                    <p><a href="{{ route('cookies') }}">{{ trans('nav.cookie') }}</a></p>
                                </li>

                            </ul>

                        </div>
                    </div> <!-- END FOOTER LINKS -->


                    <!-- FOOTER LINKS -->
                    <div class="col-sm-6 col-md-3">
                        <div class="footer-links fl-4">

                            <!-- Title -->
                            <h6 class="s-17 w-700">{{ trans('nav.connect_with_us') }}</h6>

                            <!-- Mail Link -->
                            <p class="footer-mail-link ico-25">
                                <a href="mailto:support@passify.info" class="color--theme">support@passify.info</a>
                            </p>

                            <!-- Social Links -->
                            <ul class="footer-socials ico-25 text-center clearfix">
                                <li><a href="#!"><span class="flaticon-facebook"></span></a></li>
                                <li><a href="#!"><span class="flaticon-twitter"></span></a></li>
                                <li><a href="#!"><span class="flaticon-instagram"></span></a></li>
                                <li><a href="#!"><span class="flaticon-dribbble"></span></a></li>
                            </ul>

                        </div>
                    </div> <!-- END FOOTER LINKS -->


                </div> <!-- END FOOTER CONTENT -->


                <hr> <!-- FOOTER DIVIDER LINE -->


                <!-- BOTTOM FOOTER -->
                <div class="bottom-footer">
                    <div class="row row-cols-1 row-cols-md-2 d-flex align-items-center">


                        <!-- FOOTER COPYRIGHT -->
                        <div class="col">
                            <div class="footer-copyright">
                                <p class="p-sm">&copy; {{ date('Y') }} <span> {{ config('app.name') }}
                                        {{ trans('nav.all_rights') }}</span></p>
                            </div>
                        </div>


                        <!-- FOOTER SECONDARY LINK -->
                        <div class="col">
                            <div class="bottom-secondary-link ico-15 text-end">
                                <p class="p-sm"><a href="#!">{{ trans('nav.made_with') }}
                                        <span class="flaticon-heart color--pink-400"></span> {{ trans('nav.by') }}
                                        {{ config('app.name') }}</a>
                                </p>
                            </div>
                        </div>


                    </div> <!-- End row -->
                </div> <!-- END BOTTOM FOOTER -->


            </div> <!-- End container -->
        </footer> <!-- END FOOTER-3 -->




    </div> <!-- END PAGE CONTENT -->




    <!-- EXTERNAL SCRIPTS
  ============================================= -->
    <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.js') }}"></script>
    <script src="{{ asset('js/jquery.appear.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/pricing-toggle.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/request-form.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/lunar.js') }}"></script>
    <script src="{{ asset('js/wow.js') }}"></script>

    <!-- Custom Script -->
    <script src="{{ asset('js/custom.js') }}"></script>

    <script>
        $("#logout-link").on("click", function(event) {
            event.preventDefault();
            $("#logout-form").submit();
        })

        $("body").on("click", ".video-popup1", function() {
            event.preventDefault();
            let url = $(this).attr('href');
            $(this).magnificPopup({
                type: 'iframe',
                iframe: {
                    patterns: {
                        youtube: {
                            index: 'youtube.com',
                            src: `${url}`
                        }
                    }
                }
            });
        })
    </script>

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('img/logo.png') }}"
    }
    </script>



    @stack('js')


</body>




</html>
