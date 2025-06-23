<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Passify">
    <meta name="description" content="">
    <meta name="keywords" content="Passify">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SITE TITLE -->
    <title>{{ config('app.name') }} || Forgot Password</title>

    <!-- FAVICON AND TOUCH ICONS -->
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
        #email-error {
            color: red !important;
        }
    </style>


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




        <!-- RESET PASSWORD PAGE
   ============================================= -->
        <section id="reset-password" class="bg--fixed reset-password-section division">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7 col-lg-5">


                        <!-- LOGO -->



                        <!-- RESET PASSWORD FORM -->
                        <div class="reset-page-wrapper text-center">

                            <form name="resetpasswordform" class="row  r-10 reset-form"
                                action="{{ route('password.email') }}" method="POST">
                                @csrf

                                <!-- Title-->
                                <div class="login-page-logo">
                                    <img class="img-fluid" src="{{ asset('img/logo-name.png') }}" alt="logo-image">
                                </div>
                                <div class="col-md-12">
                                    <div class="reset-form-title">
                                        <h5 class="s-26 w-700">Forgot your password?</h5>
                                        <p class="p-sm color--grey">Enter your email address, if an account exists
                                            we‘ll
                                            send you a link to reset your password.
                                        </p>
                                    </div>
                                </div>

                                <!-- Form Input -->
                                <div class="col-md-12">
                                    <input class="form-control email" type="email" name="email"
                                        placeholder="example@example.com">
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="text-danger" />
                                <x-auth-session-status class="text-success" :status="session('status')" />



                                <!-- Form Submit Button -->
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn--theme hover--theme submit">Reset My
                                        Password</button>
                                </div>

                                <!-- Form Data  -->
                                <div class="col-md-12">
                                    <div class="form-data text-center">
                                        <span><a href="{{ route('login') }}">Never mind, I remembered!</a></span>
                                    </div>
                                </div>

                                <!-- Form Message -->
                                <div class="col-lg-12 reset-form-msg">
                                    <span class="loading">
                                    </span>
                                </div>

                            </form>
                        </div> <!-- END RESET PASSWORD FORM -->


                    </div>
                </div> <!-- End row -->
            </div> <!-- End container -->
        </section> <!-- END RESET PASSWORD PAGE -->




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








</body>




</html>
