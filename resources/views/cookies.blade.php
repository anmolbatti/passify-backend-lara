@extends('layouts.dashboard')
@section('content')
    <!-- COOKIES PAGE
                       ============================================= -->
    <section id="cookies-page" class="gr--whitesmoke pb-80 inner-page-hero division">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">


                    <!-- INNER PAGE TITLE -->
                    <div class="inner-page-title">
                        <h2 class="s-52 w-700">{{ trans('cookies.title') }}</h2>
                        <p class="p-lg">{{ trans('cookies.subtitle') }}</p>
                    </div>


                    <!-- TEXT BLOCK -->
                    <div class="txt-block legal-info">

                        <!-- Text -->
                        <p>{{ __('cookies.des_1') }} <a href="https://passify.info"
                                class="color--theme">https://passify.info</a> (“Passify”). {{ __('cookies.des_2') }}</p>




                        <!-- Title -->
                        <h4 class="s-30 w-700"><span>1.</span> {{ __('cookies.tech_title') }}</h4>

                        <!-- Text -->
                        <p>{{ __('cookies.tech_des1') }}</p>

                        <p>{{ __('cookies.tech_des2') }}</p>
                        <p>{{ __('cookies.tech_des3') }}</p>


                        <!-- Title -->
                        <h4 class="s-30 w-700"><span>2.</span> {{ __('cookies.purpose_title') }}</h4>

                        <!-- Small Title -->

                        <p>{{ __('cookies.purpose_des1') }}</p>

                        <p>{{ __('cookies.purpose_des2') }}</p>

                        <p>{{ __('cookies.purpose_des3') }}</p>


                        <!-- Small Title -->
                        <h5 class="s-24 w-700"><span>3.</span> {{ __('cookies.type_of_cookies') }}
                        </h5>

                        <!-- Text -->
                        <p>{{ __('cookies.cookies_des1') }}</p>


                        <p>{{ __('cookies.cookies_des2') }}</p>


                        <p>{{ __('cookies.cookies_des3') }}</p>


                        <p>{{ __('cookies.cookies_des4') }}</p>

                        <p>{{ __('cookies.cookies_des5') }}</p>


                        <p>{{ __('cookies.cookies_des6') }}</p>


                        <p>{{ __('cookies.cookies_des7') }}</p>


                        <p>{{ __('cookies.cookies_des8') }}</p>


                        <!-- Small Title -->


                    </div> <!-- END TEXT BLOCK -->


                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END COOKIES PAGE -->
@endsection
