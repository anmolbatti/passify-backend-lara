<!doctype html>

<html lang="en">




<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="passify">
    <meta name="description" content="Passify">
    <meta name="keywords" content="Passify">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SITE TITLE -->
    <title>{{ config('app.name') }} || Login</title>

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

</head>




<body>

    <!-- PRELOADER SPINNER
  ============================================= -->
    <div id="loading" class="loading--theme custom-loader"
        style="background-image: url('{{ asset('img/logo-anim.gif') }}'); background-repeat: no-repeat; background-size :cover; background-position : center">
        {{-- <div id="loading-center"> --}}
        {{-- <img src="{{asset('img/logo-anim.gif')}}"> --}}
        {{-- </div> --}}
    </div>




    <!-- PAGE CONTENT
  ============================================= -->
    <div id="page" class="page font--jakarta">




        <!-- LOGIN PAGE
   ============================================= -->
        <div id="login" class="bg--scroll login-section division">
            <div class="container">
                <div class="row justify-content-center">


                    <!-- REGISTER PAGE WRAPPER -->
                    <div class="col-lg-11">
                        <div class="register-page-wrapper r-16 bg--fixed">
                            <div class="row">


                                <!-- LOGIN PAGE TEXT -->
                                <div class="col-md-6">
                                    <div class="register-page-txt color--white">

                                        <!-- Logo -->
                                        {{-- <img class="img-fluid" src="{{ asset('img/logo-name.png') }}" alt="logo-image"> --}}

                                        <!-- Title -->
                                        <h2 class="s-42 w-700">Welcome</h2>
                                        <h2 class="s-42 w-700">back to {{ config('app.name') }}

                                        </h2>

                                        <!-- Text -->
                                        <p class="p-md mt-25">Unlock Rewards and Savings with Our Loyalty Card Program
                                        </p>

                                        <!-- Copyright -->
                                        <div class="register-page-copyright">
                                            <p class="p-sm">&copy; {{ date('Y') . ' ' . config('app.name') }}.
                                                <span>All Rights Reserved</span>
                                            </p>
                                        </div>

                                    </div>
                                </div> <!-- END LOGIN PAGE TEXT -->


                                <!-- LOGIN FORM -->
                                <div class="col-md-6">
                                    <div class="register-page-form">
                                        <form action="{{ route('login') }}" class="row sign-in-form" method="POST">
                                            @csrf

                                            <!-- Login Separator -->
                                            <div class="col-md-12 text-center">
                                                <div class="separator-line">Sign in with your email</div>
                                            </div>

                                            <!-- Form Input -->
                                            <div class="col-md-12">
                                                <p class="p-sm input-header">Email address</p>
                                                <input class="form-control email mb-0" type="email" name="email"
                                                    placeholder="example@example.com">
                                                @error('email')
                                                    <span class="text-danger ms-3"
                                                        style="font-size: 14px">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Form Input -->
                                            <div class="col-md-12">
                                                <p class="p-sm input-header">Password</p>
                                                <div class="wrap-input">
                                                    <span class="btn-show-pass ico-20"><span
                                                            class="flaticon-visibility eye-pass"></span></span>
                                                    <input class="form-control password" type="password"
                                                        name="password" placeholder="* * * * * * * * *">
                                                </div>
                                            </div>

                                            <!-- Reset Password Link -->
                                            <div class="col-md-12">
                                                <div class="reset-password-link">
                                                    <p class="p-sm"><a href="{{route('password.request')}}"
                                                            class="color--theme">Forgot your password?</a></p>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <p class="create-account" style="font-size: 14px">
                                                    Log In as <a href="{{ route('login.index') }}"
                                                        class="color--theme">Admin</a>
                                                </p>
                                            </div>

                                            <!-- Form Submit Button -->
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn--theme hover--theme submit">Log
                                                    In</button>
                                            </div>

                                            <!-- Sign Up Link -->
                                            <div class="col-md-12">
                                                <p class="create-account text-center">
                                                    Don't have an account? <a href="{{ route('register') }}"
                                                        class="color--theme">Sign up</a>
                                                </p>
                                            </div>

                                        </form>
                                    </div>
                                </div> <!-- END LOGIN FORM -->


                            </div> <!-- End row -->
                        </div> <!-- End register-page-wrapper -->
                    </div> <!-- END REGISTER PAGE WRAPPER -->


                </div> <!-- End row -->
            </div> <!-- End container -->
        </div> <!-- END LOGIN PAGE -->




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



</body>




</html>
