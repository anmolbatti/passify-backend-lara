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
    <title>{{ config('app.name') }} || !Success</title>

    <!-- FAVICON AND TOUCH ICONS -->
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <meta property="og:image" content="{{ asset('img/logo.png') }}">

    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="152x152" href="images/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

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

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <style>
        .danger-text {
            font-size: 16px;
            float: left;
        }

        .colored-toast.swal2-icon-error {
            background-color: #f27474 !important;
        }

        .colored-toast .swal2-title {
            color: white;
        }

        .colored-toast.swal2-icon-success {
            background-color: #a5dc86 !important;
        }
    </style>

</head>

<body>

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


        <section id="reset-password" class="bg--fixed reset-password-section division">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7 col-lg-5">


                        <!-- LOGO -->
                        <div class="login-page-logo">
                            <img class="img-fluid" src="{{ asset('img/logo-name.png') }}" alt="logo-image">
                        </div>


                        <!-- RESET PASSWORD FORM -->
                        <!-- Redirection Counter -->
                        <script type="text/javascript">
                            var count = 10; // Timer
                            var redirect = "https://app.passify.info";
                             // Target URL

                            function countDown() {
                                var timer = document.getElementById("timer"); // Timer ID
                                if (count > 0) {
                                    count--;
                                    timer.innerHTML = "This page will redirect in " + count + " seconds."; // Timer Message
                                    setTimeout("countDown()", 1000);
                                } else {
                                    window.location.href = redirect;
                                }
                            }
                        </script>

                        <div id="master-wrap">
                            <div id="logo-box">

                                <div class="animated fast fadeInUp">
                                    <div class="icon"></div>
                                    <h1>Thank you</h1>
                                </div>

                                <div class="notice animated fadeInUp">
                                    <p class="lead">Your password has been successfully updated. You will be redirected in 10 seconds!</p>
                                </div>

                                <div class="footer animated slow fadeInUp">
                                    <p id="timer">
                                        <script type="text/javascript">
                                            countDown();
                                        </script>
                                    </p>
                                    <p class="copyright">&copy; {{ config('app.name') }}</p>
                                </div>

                            </div>
                            <!-- /#logo-box -->
                        </div>
                        <!-- /#master-wrap -->


                    </div>
                </div> <!-- End row -->
            </div> <!-- End container -->
        </section>





    </div> <!-- END PAGE CONTENT -->



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
    <script src="{{ asset('js/reset-form.js') }}"></script>

    <!-- Custom Script -->
    <script src="{{ asset('js/custom.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast'
            },
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
        });
    </script>
    @if (session()->has('status'))
        <script>
            Toast.fire({
                icon: "success",
                title: "{{ session()->get('success') }}"
            })
        </script>
    @endif

    @if ($errors->any())
        <script>
            var errorMessage = "{{ $errors->first() }}";

            Toast.fire({
                icon: "error",
                title: errorMessage
            });
        </script>
    @endif


</body>




</html>
