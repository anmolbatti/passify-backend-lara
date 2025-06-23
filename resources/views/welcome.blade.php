@extends('layouts.dashboard')
@section('content')
    <section id="hero-12" class="bg--scroll hero-section">
        <div class="hero-overlay">
            <div class="container text-center">


                <!-- HERO TEXT -->
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-9 col-xl-10">
                        <div class="hero-12-txt color--white wow fadeInUp">

                            <!-- Title -->
                            {{-- <h2 class="s-62 w-700">Passify</h2> --}}
                            <img src="{{ asset('img/white_textlogo.png') }}" class="img-fluid w-25">
                            <!-- Text -->
                            <p class="s-22 fw-bolder">{{ trans('welcome.hero_title') }}</p>
                            <p class="s-22 fw-bolder">{{ trans('welcome.hero_description') }}</p>

                            <!-- Button -->
                            <a href="{{ route('register') }}"
                                class="btn r-04 btn--theme hover--tra-white">{{ trans('welcome.start_free') }}</a>
                            <p class="p-sm btn-txt ico-15">
                                <span class="flaticon-check"></span> {{ trans('welcome.no_credit_card') }}
                            </p>

                        </div>
                    </div>
                </div> <!-- END HERO TEXT -->


                <!-- HERO IMAGE -->
                <div class="row">
                    <div class="col">
                        <div class="hero-12-img video-preview wow fadeInUp">

                            <!-- Play Icon -->
                            <a class="video-popup1"
                                href="{{ app()->isLocale('ar') ? 'https://www.youtube.com/embed/tY8B1yRxJo0?si=UPI4EXclKHBcNFFd' : 'https://www.youtube.com/embed/gsUJi7R8ke0?si=VO40Txaw7xNzp6ea' }}">
                                <div class="video-btn video-btn-xl bg--theme">
                                    <div class="video-block-wrapper"><span class="flaticon-play-button"></span></div>
                                </div>
                            </a>

                            <!-- Preview Image -->
                            <div class="header-imgs">
                                <div class="header-img mb-5">
                                    <img class="img-fluid" src="{{ asset('img/hero1.png') }}" alt="hero-image"
                                        style="height: 680px">
                                </div>
                                <div class="mb-2">

                                </div>


                            </div>

                        </div>
                    </div>
                </div> <!-- END HERO IMAGE -->


            </div> <!-- End container -->
        </div> <!-- End hero-overlay -->
    </section> <!-- END HERO-12 -->



    <section id="list-1" class="bg--white-300 py-100 ct-01 content-section division">
        <div class="container wow fadeInUp">

            <div class="container mt-5" dir="ltr">
                <div class="row">
                    <div class="col text-center">
                        <div class="owl-carousel brands-carousel-5">

                            <!-- BRAND LOGO IMAGE -->
                            <div class="brand-logo">
                                <div class="align-items-center img-box">
                                    <div class="d-flex gap-3 justify-content-center">
                                        <img src="{{ asset('img/landing_img2.png') }}" alt="" class="img-fluid"
                                            style="width :360px; height:520px;">
                                        <img src="{{ asset('img/landing_img1.png') }}" alt="" class="img-fluid"
                                            style="width :360px; height:520px;">
                                        <img src="{{ asset('img/watch.png') }}" alt="" class="img-fluid mt-5"
                                            style="width :360px; height:420px;">
                                    </div>
                                </div>
                            </div>


                            <!-- BRAND LOGO IMAGE -->
                            <div class="brand-logo">
                                <div class="align-items-center img-box">
                                    <div class="d-flex gap-3 justify-content-center">

                                        <a href="#"><img class="img-fluid" src="{{ asset('img/lo_pass.png') }}"
                                                alt="brand-logo" style="width :380px; height:520px;"></a>
                                    </div>
                                </div>
                            </div>


                            <!-- BRAND LOGO IMAGE -->
                            <div class="brand-logo">
                                <div class="align-items-center img-box">
                                    <div class="d-flex gap-3 justify-content-center">

                                        <a href="#"><img class="img-fluid" src="{{ asset('img/hero_img.png') }}"
                                                alt="brand-logo" style="height:520px;"></a>
                                    </div>
                                </div>
                            </div>

                            <div class="brand-logo">
                                <div class="align-items-center img-box">
                                    <div class="d-flex gap-3 justify-content-center">

                                        <a href="#"><img class="img-fluid" src="{{ asset('img/hero2.png') }}"
                                                alt="brand-logo" style="width :380px; height:520px;"></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="text-center mt-5 d-flex justify-content-center gap-2">
                <h1>{{ trans('welcome.no_install') }}</h1>
                <img src="{{ asset('img/star.png') }}" alt="" class="img-fluid">
            </div>

            <div class="fbox-wrapper text-center mt-5">
                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3">



                    <!-- FEATURE BOX #2 -->
                    <div class="col">
                        <div class="fbox-7 fb-2 r-12 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">

                            <!-- Icon -->
                            <div class="fbox-ico ico-50">
                                <div class="shape-ico color--theme">

                                    <!-- Vector Icon -->
                                    <span class="flaticon-chat-2"></span>
                                    <i class='bxs bx-message-square-dots'></i>
                                    <!-- Shape -->
                                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z"
                                            transform="translate(100 100)"></path>
                                    </svg>

                                </div>
                            </div> <!-- End Icon -->

                            <!-- Text -->
                            <div class="fbox-txt">
                                <h6 class="s-20 w-700">{{ trans('welcome.new_communication') }}</h6>
                                <p class="p-sm">{{ trans('welcome.via_push') }}</p>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #2 -->


                    <!-- FEATURE BOX #3 -->
                    <div class="col">
                        <div class="fbox-7 fb-3 r-12 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">

                            <!-- Icon -->
                            <div class="fbox-ico ico-50">
                                <div class="shape-ico color--theme">

                                    <!-- Vector Icon -->
                                    <span class="flaticon-star"></span>

                                    <!-- Shape -->
                                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z"
                                            transform="translate(100 100)"></path>
                                    </svg>

                                </div>
                            </div> <!-- End Icon -->

                            <!-- Text -->
                            <div class="fbox-txt">
                                <h6 class="s-20 w-700"> {{ trans('welcome.new_innovative') }} </h6>
                                <p class="p-sm"> {{ trans('welcome.mobile_Wallet') }}</p>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #3 -->


                    <!-- FEATURE BOX #4 -->
                    <div class="col">
                        <div class="fbox-7 fb-4 r-12 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">

                            <!-- Icon -->
                            <div class="fbox-ico ico-50">
                                <div class="shape-ico color--theme">

                                    <!-- Vector Icon -->
                                    <span class="flaticon-click-2"></span>

                                    <!-- Shape -->
                                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z"
                                            transform="translate(100 100)"></path>
                                    </svg>

                                </div>
                            </div> <!-- End Icon -->

                            <!-- Text -->
                            <div class="fbox-txt">
                                <h6 class="s-20 w-700">{{ trans('welcome.crm') }}</h6>
                                <p class="p-sm">{{ trans('welcome.crm_description') }}</p>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #4 -->


                </div> <!-- End row -->
            </div>

        </div> <!-- End container -->
    </section>

    <section id="lnk-2" class="bg--white-400 py-100 content-section division mt-5"
        style='background: url("{{ asset('img/frame.png') }}"); background-size: cover;
    background-repeat: no-repeat;
  '>
        <div class="container" dir="ltr">


            <!-- SECTION CONTENT (ROW) -->
            <div class="row d-flex align-items-center">


                <!-- TEXT BLOCK -->
                <div class="col-sm-12 col-md-7 col-sm-7 order-last order-md-2"
                    @if (app()->isLocale('ar')) dir="rtl" @endif>
                    <div class="txt-block left-column wow fadeInRight"
                        style="visibility: visible; animation-name: fadeInRight;">


                        <!-- CONTENT BOX #1 -->
                        <div class="cbox-2 process-step">

                            <!-- Icon -->
                            <div class="ico-wrap">

                                <svg width="60" height="50" viewBox="0 0 83 83" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M65.7083 13.8334H58.7917V6.91675H51.875V13.8334H31.125V6.91675H24.2083V13.8334H17.2917C13.4771 13.8334 10.375 16.9355 10.375 20.7501V69.1667C10.375 72.9813 13.4771 76.0834 17.2917 76.0834H65.7083C69.5229 76.0834 72.625 72.9813 72.625 69.1667V20.7501C72.625 16.9355 69.5229 13.8334 65.7083 13.8334ZM53.0923 54.334L41.5069 65.7084L29.925 54.334C29.2106 53.647 28.6424 52.8228 28.2542 51.911C27.866 50.9991 27.6659 50.0182 27.6659 49.0271C27.6659 48.0361 27.866 47.0552 28.2542 46.1433C28.6424 45.2315 29.2106 44.4073 29.925 43.7203C31.3644 42.2992 33.3058 41.5023 35.3286 41.5023C37.3514 41.5023 39.2928 42.2992 40.7322 43.7203L41.5069 44.4777L42.2816 43.7203C43.7216 42.299 45.6636 41.502 47.687 41.502C49.7103 41.502 51.6523 42.299 53.0923 43.7203C53.8067 44.4073 54.3749 45.2315 54.7631 46.1433C55.1513 47.0552 55.3514 48.0361 55.3514 49.0271C55.3514 50.0182 55.1513 50.9991 54.7631 51.911C54.3749 52.8228 53.8067 53.647 53.0923 54.334ZM65.7083 31.1251H17.2917V24.2084H65.7083V31.1251Z"
                                        fill="#F74780" />
                                </svg>
                            </div>

                            <!-- Text -->
                            <div class="cbox-2-txt text-white">
                                <h5 class="s-22 w-700 text-white">{{ trans('welcome.event_ticket') }}</h5>
                                <p>{{ trans('welcome.event_description') }}
                                </p>
                            </div>

                        </div> <!-- END CONTENT BOX #1 -->


                        <!-- CONTENT BOX #2 -->
                        <div class="cbox-2 process-step">

                            <!-- Icon -->
                            <div class="ico-wrap">

                                <svg width="60" height="50" viewBox="0 0 84 84" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M42 8.75L29.47 28.21L7 34.09L21.7 52.08L20.37 75.25L42 66.815L63.63 75.25L62.3 52.08L77 34.09L54.53 28.21L42 8.75ZM32.83 36.75C35 36.75 36.75 38.5 36.75 40.705C36.75 41.7446 36.337 42.7417 35.6019 43.4769C34.8667 44.212 33.8696 44.625 32.83 44.625C30.625 44.625 28.875 42.875 28.875 40.705C28.875 38.5 30.625 36.75 32.83 36.75ZM51.205 36.75C53.375 36.75 55.125 38.5 55.125 40.705C55.125 41.7446 54.712 42.7417 53.9769 43.4769C53.2417 44.212 52.2446 44.625 51.205 44.625C49 44.625 47.25 42.875 47.25 40.705C47.25 38.5 49 36.75 51.205 36.75ZM31.5 52.5H52.5C50.75 56.735 46.585 59.5 42 59.5C37.415 59.5 33.25 56.735 31.5 52.5Z"
                                        fill="#F74780" />
                                </svg>
                            </div>

                            <!-- Text -->
                            <div class="cbox-2-txt text-white">
                                <h5 class="s-22 w-700 text-white">{{ trans('welcome.point_pass') }}</h5>
                                <p>{{ trans('welcome.point_description') }}
                                </p>
                            </div>

                        </div> <!-- END CONTENT BOX #2 -->


                        <!-- CONTENT BOX #3 -->
                        <div class="cbox-2 process-step">

                            <!-- Icon -->
                            <div class="ico-wrap">

                                <svg width="60" height="50" viewBox="0 0 67 67" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M33.5 1.04688C14.994 1.04688 0 15.5723 0 33.5C0 51.4277 14.994 65.9531 33.5 65.9531C52.006 65.9531 67 51.4277 67 33.5C67 15.5723 52.006 1.04688 33.5 1.04688ZM44.3065 23.0312C46.6974 23.0312 48.629 24.9025 48.629 27.2188C48.629 29.535 46.6974 31.4062 44.3065 31.4062C41.9155 31.4062 39.9839 29.535 39.9839 27.2188C39.9839 24.9025 41.9155 23.0312 44.3065 23.0312ZM22.6935 23.0312C25.0845 23.0312 27.0161 24.9025 27.0161 27.2188C27.0161 29.535 25.0845 31.4062 22.6935 31.4062C20.3026 31.4062 18.371 29.535 18.371 27.2188C18.371 24.9025 20.3026 23.0312 22.6935 23.0312ZM49.0073 45.3035C45.1575 49.7789 39.5111 52.3438 33.5 52.3438C27.4889 52.3438 21.8425 49.7789 17.9927 45.3035C16.1556 43.1705 19.4786 40.501 21.3157 42.6209C24.3415 46.141 28.7722 48.1432 33.5 48.1432C38.2278 48.1432 42.6585 46.1279 45.6843 42.6209C47.4944 40.501 50.8308 43.1705 49.0073 45.3035Z"
                                        fill="#F74780" />
                                </svg>
                            </div>

                            <!-- Text -->
                            <div class="cbox-2-txt">
                                <h5 class="s-22 w-700 text-white">{{ trans('welcome.stamp_pass') }}</h5>
                                <p class="mb-0 text-white">{{ trans('welcome.stamp_description') }}
                                </p>
                            </div>

                        </div> <!-- END CONTENT BOX #3 -->


                    </div>
                </div> <!-- END TEXT BLOCK -->


                <!-- IMAGE BLOCK -->
                <div class=" col-sm-12 col-md-5 col-sm-5 order-first order-md-2">
                    <div class="img-block wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
                        <img class="img-fluid" src="{{ asset('img/Frame64.png') }}" alt="content-image"
                            style="margin: 150px">
                    </div>
                </div>


            </div> <!-- END SECTION CONTENT (ROW) -->


        </div> <!-- End container -->
    </section>

    <section id="pricing-3" class="gr--whitesmoke inner-page-hero pb-60 pricing-section">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="section-title text-center mb-60">

                        <h2 class="s-52 w-700">{{ trans('welcome.pricing_title') }}</h2>

                        <!-- TOGGLE BUTTON -->
                        <div class="toggle-btn ext-toggle-btn toggle-btn-md mt-30">
                            <span class="toggler-txt">{{ trans('welcome.billed_monthly') }}</span>
                            <label class="switch-wrap">
                                <input type="checkbox" id="checbox" onclick="check()">
                                <span class="switcher bg--grey switcher--theme">
                                    <span class="show-annual"></span>
                                    <span class="show-monthly"></span>
                                </span>
                            </label>
                            <span class="toggler-txt">{{ trans('welcome.billed_yearly') }}</span>

                            <!-- Text -->
                            <p class="color--theme">{{ trans('welcome.save_25') }}</p>
                            <p class="color--theme fw-bolder" style="font-size: 25px">
                                {{ trans('welcome.save_description') }}
                            </p>

                        </div>


                    </div>
                </div>
            </div> <!-- END SECTION TITLE -->


            <!-- PRICING TABLES -->
            <div class="pricing-3-wrapper text-center">
                <div class="row row-cols-1 row-cols-md-3 row-cols-sm-1">


                    <div class="col">
                        <div id="pt-3-2"
                            class="p-table pricing-3-table bg--white-100 block-shadow r-12 wow fadeInUp pricing-card">


                            <!-- TABLE HEADER -->
                            <div class="pricing-table-header">

                                <!-- Title -->
                                <h4 class="s-32">{{ trans('welcome.starter') }}</h4>

                                <!-- Text -->
                                <p class="color--grey">{{ trans('welcome.starter_description') }}</p>

                                <!-- Price -->
                                <div class="price mt-25">

                                    <!-- Monthly Price -->
                                    <div class="price2">
                                        <sup class="color--black">SAR</sup>
                                        <span class="color--black">23</span>
                                        {{-- <sup class="coins color--black">99</sup> --}}
                                        <sup class="validity color--grey">{{ trans('welcome.per_month') }}</sup>
                                    </div>

                                    <!-- Yearly Price -->
                                    <div class="price1">
                                        <sup class="color--black">SAR</sup>
                                        <span class="color--black">226</span>
                                        {{-- <sup class="coins color--black">99</sup> --}}
                                        <sup class="validity color--grey">{{ trans('welcome.per_year') }}</sup>
                                    </div>

                                </div>

                            </div> <!-- END TABLE HEADER -->


                            <!-- BUTTON -->
                            <a href="{{ route('plan.show') }}"
                                class="pt-btn btn btn--theme hover--theme">{{ trans('welcome.30_day_trial') }}</a>
                            <ul class="pricing-features color--black ico-10 ico--green mt-25">
                                <li>
                                    <p><span class="flaticon-check"></span> 2 {{ trans('welcome.card_design') }}</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span> 1 {{ trans('welcome.location') }}</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span> 3 {{ trans('welcome.users') }}</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span> {{ trans('welcome.sending_notification', ['count'  => 5]) }}</p>
                                </li>
                                <li style="visibility: hidden" class="mt-5">
                                    <p><span class="flaticon-check"></span> </p>
                                </li>
                                <li style="visibility: hidden" class="mt-3">
                                    <p><span class="flaticon-check"></span> </p>
                                </li>
                                <div class="mt-3"></div>
                            </ul>


                        </div>
                    </div>


                    <!-- PLUS PLAN -->
                    <div class="col">
                        <div id="pt-3-2"
                            class="p-table pricing-3-table bg--white-100 block-shadow r-12 wow fadeInUp pricing-card">


                            <!-- TABLE HEADER -->
                            <div class="pricing-table-header">

                                <!-- Title -->
                                <h4 class="s-32">{{ trans('welcome.plus') }}</h4>

                                <!-- Text -->
                                <p class="color--grey">{{ trans('welcome.plus_description') }}</p>

                                <!-- Price -->
                                <div class="price mt-25">

                                    <!-- Monthly Price -->
                                    <div class="price2">
                                        <sup class="color--black">SAR</sup>
                                        <span class="color--black">60</span>
                                        {{-- <sup class="coins color--black">99</sup> --}}
                                        <sup class="validity color--grey">{{ trans('welcome.per_month') }}</sup>
                                    </div>

                                    <!-- Yearly Price -->
                                    <div class="price1">
                                        <sup class="color--black">SAR</sup>
                                        <span class="color--black">620</span>
                                        {{-- <sup class="coins color--black">99</sup> --}}
                                        <sup class="validity color--grey">{{ trans('welcome.per_year') }}</sup>
                                    </div>

                                </div>

                            </div> <!-- END TABLE HEADER -->


                            <!-- BUTTON -->
                            <a href="{{ route('plan.show') }}"
                                class="pt-btn btn btn--theme hover--theme">{{ trans('welcome.30_day_trial') }}</a>

                            <ul class="pricing-features color--black ico-10 ico--green mt-25">
                                <li>
                                    <p><span class="flaticon-check"></span> 5 {{ trans('welcome.card_design') }}</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span> 3 {{ trans('welcome.location') }}</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span> 10 {{ trans('welcome.users') }}</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span>{{ trans('welcome.plus_feature') }}</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span> {{ trans('welcome.data_export') }}</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span> {{ trans('welcome.sending_notification', ['count'  => 10]) }}</p>
                                </li>
                                <li style="visibility: hidden" class="mt-3">
                                    <p><span class="flaticon-check"></span> </p>
                                </li>
                            </ul>


                        </div>
                    </div> <!-- END PLUS PLAN -->


                    <!-- PRO PLAN -->
                    <div class="col">
                        <div id="pt-3-3"
                            class="p-table pricing-3-table bg--white-100 block-shadow r-12 wow fadeInUp pricing-card">


                            <!-- TABLE HEADER -->
                            <div class="pricing-table-header">

                                <!-- Title -->
                                <h4 class="s-32">{{ trans('welcome.pro') }}</h4>

                                <!-- Text -->
                                <p class="color--grey">{{ trans('welcome.pro_description') }}</p>

                                <!-- Price -->
                                <div class="price mt-25">

                                    <!-- Monthly Price -->
                                    <div class="price2">
                                        <sup class="color--black">SAR</sup>
                                        <span class="color--black">85</span>
                                        {{-- <sup class="coins color--black">99</sup> --}}
                                        <sup class="validity color--grey">{{ trans('welcome.per_month') }}</sup>
                                    </div>

                                    <!-- Yearly Price -->
                                    <div class="price1">
                                        <sup class="color--black">SAR</sup>
                                        <span class="color--black">920</span>
                                        {{-- <sup class="coins color--black">99</sup> --}}
                                        <sup class="validity color--grey">{{ trans('welcome.per_year') }}</sup>
                                    </div>

                                </div>

                            </div> <!-- END TABLE HEADER -->


                            <!-- BUTTON -->
                            <a href="{{ route('plan.show') }}"
                                class="pt-btn btn btn--theme hover--theme">{{ trans('welcome.30_day_trial') }}</a>

                            <ul class="pricing-features color--black ico-10 ico--green mt-25">
                                <li>
                                    <p><span class="flaticon-check"></span> 10 {{ trans('welcome.card_design') }}</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span> 10 {{ trans('welcome.location') }}</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span> 50 {{ trans('welcome.users') }}</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span> {{ trans('welcome.pro_description_1') }}
                                    </p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span>{{ trans('welcome.pro_description_2') }}</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span> {{ trans('welcome.data_export') }}</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span> {{ trans('welcome.sending_notification', ['count'  => 15]) }}</p>
                                </li>

                            </ul>


                        </div>
                    </div> <!-- END PRO PLAN -->

                </div>
            </div> <!-- PRICING TABLES -->


        </div> <!-- End container -->

        <div class="container-fluid mt-5">
            <div class="row wow fadeInRight">
                <div class="col-md-3 mt-2 pricing-box-12">
                    <div class="pricing-box-3" style="background : url('{{ asset('img/food_truck.jpg') }}')">
                        <div class="middle p-2">
                            {{ trans('welcome.food_truck') }}

                            <div class="text-center mt-3">
                                <a href="{{ route('pricing.view') }}"
                                    class="btn btn--theme">{{ trans('welcome.show_price_now') }}</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-3 mt-2 pricing-box-12">
                    <div class="pricing-box-3" style="background : url('{{ asset('img/hair_salon.jpg') }}')">
                        <div class="middle p-2">
                            {{ trans('welcome.hair_salon') }}
                            <div class="text-center mt-3">
                                <a href="{{ route('pricing.view') }}"
                                    class="btn btn--theme">{{ trans('welcome.show_price_now') }}</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-3 mt-2 pricing-box-12">
                    <div class="pricing-box-3" style="background : url('{{ asset('img/coffee_shop.jpg') }}')">
                        <div class="middle p-2">
                            {{ trans('welcome.coffee_shop') }}
                            <div class="text-center mt-3">
                                <a href="{{ route('pricing.view') }}"
                                    class="btn btn--theme">{{ trans('welcome.show_price_now') }}</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-3 mt-2 pricing-box-12">
                    <div class="pricing-box-3" style="background : url('{{ asset('img/rock_climbing.jpg') }}')">
                        <div class="middle p-2">
                            {{ trans('welcome.rock_climbing') }}
                            <div class="text-center mt-3">
                                <a href="{{ route('pricing.view') }}"
                                    class="btn btn--theme">{{ trans('welcome.show_price_now') }}</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-3 mt-2 pricing-box-12">
                    <div class="pricing-box-3" style="background : url('{{ asset('img/pet_grooming.jpg') }}')">
                        <div class="middle p-2">
                            {{ trans('welcome.pet_grooming') }}

                            <div class="text-center mt-1">
                                <a href="{{ route('pricing.view') }}"
                                    class="btn btn--theme">Sho{{ trans('welcome.show_price_now') }}</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-3 mt-2 pricing-box-12">
                    <div class="pricing-box-3" style="background : url('{{ asset('img/FitnessCenter.jpg') }}')">
                        <div class="middle p-2">
                            {{ trans('welcome.fitness_center') }}

                            <div class="text-center mt-3">
                                <a href="{{ route('pricing.view') }}"
                                    class="btn btn--theme">{{ trans('welcome.show_price_now') }}</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-3 mt-2 pricing-box-12">
                    <div class="pricing-box-3" style="background : url('{{ asset('img/spa.jpg') }}')">
                        <div class="middle p-2">
                            {{ trans('welcome.spa') }}
                            <div class="text-center mt-3">
                                <a href="{{ route('pricing.view') }}"
                                    class="btn btn--theme">{{ trans('welcome.show_price_now') }}</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-3 mt-2 pricing-box-12">
                    <div class="pricing-box-3" style="background : url('{{ asset('img/car-wash.jpg') }}')">
                        <div class="middle p-2">
                            {{ trans('welcome.car_wash') }}

                            <div class="text-center mt-1">
                                <a href="{{ route('pricing.view') }}"
                                    class="btn btn--theme">{{ trans('welcome.show_price_now') }}</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </section> <!-- END PRICING-3 -->

    <section class="pt-100 ct-04 content-section division" id="solution">
        <div class="container">


            <!-- SECTION CONTENT (ROW) -->
            <div class="row d-flex align-items-center">


                <!-- TEXT BLOCK -->
                <div class="col-md-6 order-last order-md-2">
                    <div class="txt-block left-column wow fadeInRight"
                        style="visibility: visible; animation-name: fadeInRight;">


                        <!-- CONTENT BOX #1 -->
                        <div class="cbox-2 process-step">

                            <!-- Icon -->
                            <div class="ico-wrap">
                                <div class="cbox-2-ico bg--theme color--white">1</div>
                                <span class="cbox-2-line"></span>
                            </div>

                            <!-- Text -->
                            <div class="cbox-2-txt">
                                <h5 class="s-22 w-700">{{ trans('welcome.simple_title') }}</h5>
                                <p>{{ trans('welcome.Simple_and_UserFriendly') }}
                                </p>
                            </div>

                        </div> <!-- END CONTENT BOX #1 -->


                        <!-- CONTENT BOX #2 -->
                        <div class="cbox-2 process-step">

                            <!-- Icon -->
                            <div class="ico-wrap">
                                <div class="cbox-2-ico bg--theme color--white">2</div>
                                <span class="cbox-2-line"></span>
                            </div>

                            <!-- Text -->
                            <div class="cbox-2-txt">
                                <h5 class="s-22 w-700">{{ trans('welcome.apple_wallet_title') }}</h5>
                                <p>{{ trans('welcome.Compatible_with_Apple_and_Google_Wallet') }}
                                </p>
                            </div>

                        </div> <!-- END CONTENT BOX #2 -->


                        <!-- CONTENT BOX #3 -->
                        <div class="cbox-2 process-step">

                            <!-- Icon -->
                            <div class="ico-wrap">
                                <div class="cbox-2-ico bg--theme color--white">3</div>
                                <span class="cbox-2-line"></span>

                            </div>

                            <!-- Text -->
                            <div class="cbox-2-txt">
                                <h5 class="s-22 w-700">{{ trans('welcome.target_notification') }}</h5>
                                <p class="mb-0">{{ trans('welcome.Targeted_Notifications') }}
                                </p>
                            </div>

                        </div> <!-- END CONTENT BOX #3 -->
                        <div class="cbox-2 process-step">

                            <!-- Icon -->
                            <div class="ico-wrap">
                                <div class="cbox-2-ico bg--theme color--white">4</div>
                            </div>

                            <!-- Text -->
                            <div class="cbox-2-txt">
                                <h5 class="s-22 w-700">{{ trans('welcome.reports_title') }}</h5>
                                <p class="mb-0">{{ trans('welcome.Reports_and_Analytics') }}
                                </p>
                            </div>

                        </div>


                        <div class="mt-5">
                            <div class="img-block wow fadeInLeft"
                                style="visibility: visible; animation-name: fadeInLeft;">
                                <img class="img-fluid w-100" src="{{ asset('img/qqm9i5te.png') }}" alt="content-image">
                            </div>
                        </div>


                    </div>
                </div> <!-- END TEXT BLOCK -->


                <!-- IMAGE BLOCK -->
                <div class="col-md-6 order-first order-md-2">
                    <div class="img-block wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
                        <img class="img-fluid w-100" src="{{ asset('img/solution.png') }}" alt="content-image">
                    </div>

                    <div class="cbox-2 process-step p-3">

                        <!-- Icon -->
                        <div class="ico-wrap">
                            <div class="cbox-2-ico bg--theme color--white">5</div>
                            <span class="cbox-2-line"></span>
                        </div>

                        <!-- Text -->
                        <div class="cbox-2-txt">
                            <h5 class="s-22 w-700">{{ trans('welcome.easy_to_use') }}</h5>
                            <p>{{ trans('welcome.Easy_Steps_to_Use_Sign_Up') }}
                            </p>
                        </div>

                    </div>
                    <div class="cbox-2 process-step p-3">

                        <!-- Icon -->
                        <div class="ico-wrap">
                            <div class="cbox-2-ico bg--theme color--white">6</div>
                            <span class="cbox-2-line"></span>
                        </div>

                        <!-- Text -->
                        <div class="cbox-2-txt">
                            <h5 class="s-22 w-700">{{ trans('welcome.create_cards') }}</h5>
                            <p>{{ trans('welcome.Create_Your_Cards') }}
                            </p>
                        </div>

                    </div>

                    <div class="cbox-2 process-step p-3">

                        <!-- Icon -->
                        <div class="ico-wrap">
                            <div class="cbox-2-ico bg--theme color--white">7</div>
                            <span class="cbox-2-line"></span>
                        </div>

                        <!-- Text -->
                        <div class="cbox-2-txt">
                            <h5 class="s-22 w-700">{{ trans('welcome.add_notification') }}</h5>
                            <p>{{ trans('welcome.Add_Notifications') }}

                            </p>
                        </div>

                    </div>

                    <div class="cbox-2 process-step p-3">

                        <!-- Icon -->
                        <div class="ico-wrap">
                            <div class="cbox-2-ico bg--theme color--white">8</div>
                            <span class="cbox-2-line"></span>
                        </div>

                        <!-- Text -->
                        <div class="cbox-2-txt">
                            <h5 class="s-22 w-700">{{ trans('welcome.start_custom') }}
                            </h5>
                            <p>{{ trans('welcome.Start_Customer_Engagement') }}
                            </p>
                        </div>

                    </div>
                </div>


            </div> <!-- END SECTION CONTENT (ROW) -->


        </div> <!-- End container -->
    </section>

    <section id="features-11" class="py-100 features-section division">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="section-title mb-70">

                        <!-- Title -->
                        <h2 class="s-50 w-700">{{ trans('welcome.feature_cards') }}</h2>

                        <!-- Text -->
                        {{-- <p class="s-21 color--grey">Effortless and Distant Customer Engagement Experiences.</p> --}}

                    </div>
                </div>
            </div>


            <!-- FEATURES-11 WRAPPER -->
            <div class="fbox-wrapper">
                <div class="row row-cols-1 row-cols-md-2 row-cols-sm-1 rows-3">


                    <!-- FEATURE BOX #1 -->
                    <div class="col">
                        <div class="fbox-11 fb-1 wow fadeInUp">

                            <!-- Icon -->
                            <div class="fbox-ico-wrap">
                                <div class="fbox-ico ico-50">
                                    <div class="shape-ico color--theme">

                                        <!-- Vector Icon -->
                                        <span class="flaticon-search-engine-1"></span>

                                        <!-- Shape -->
                                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z"
                                                transform="translate(100 100)" />
                                        </svg>

                                    </div>
                                </div>
                            </div> <!-- End Icon -->

                            <!-- Text -->
                            <div class="fbox-txt ar-margin-r-25">
                                <h6 class="s-22 w-700">{{ trans('welcome.loyalty_cards') }}</h6>
                                <p>{{ trans('welcome.loyalty_cards_description') }}
                                </p>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #1 -->


                    <!-- FEATURE BOX #2 -->
                    <div class="col">
                        <div class="fbox-11 fb-2 wow fadeInUp">

                            <!-- Icon -->
                            <div class="fbox-ico-wrap">
                                <div class="fbox-ico ico-50">
                                    <div class="shape-ico color--theme">

                                        <!-- Vector Icon -->
                                        <span class="flaticon-trophy"></span>

                                        <!-- Shape -->
                                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z"
                                                transform="translate(100 100)" />
                                        </svg>

                                    </div>
                                </div>
                            </div> <!-- End Icon -->

                            <!-- Text -->
                            <div class="fbox-txt ar-margin-r-25">
                                <h6 class="s-22 w-700">{{ trans('welcome.membership_card') }}</h6>
                                <p>{{ trans('welcome.membership_description') }} </p>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #2 -->


                    <!-- FEATURE BOX #3 -->
                    <div class="col">
                        <div class="fbox-11 fb-3 wow fadeInUp">

                            <!-- Icon -->
                            <div class="fbox-ico-wrap">
                                <div class="fbox-ico ico-50">
                                    <div class="shape-ico color--theme">

                                        <!-- Vector Icon -->
                                        <span class="flaticon-hierarchical-structure"></span>

                                        <!-- Shape -->
                                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z"
                                                transform="translate(100 100)" />
                                        </svg>

                                    </div>
                                </div>
                            </div> <!-- End Icon -->

                            <!-- Text -->
                            <div class="fbox-txt ar-margin-r-25">
                                <h6 class="s-22 w-700">
                                    {{ trans('welcome.coupons') }}
                                </h6>
                                <p>{{ trans('welcome.coupon_description') }}
                                </p>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #3 -->


                    <!-- FEATURE BOX #4 -->
                    <div class="col">
                        <div class="fbox-11 fb-4 wow fadeInUp">

                            <!-- Icon -->
                            <div class="fbox-ico-wrap">
                                <div class="fbox-ico ico-50">
                                    <div class="shape-ico color--theme">

                                        <!-- Vector Icon -->
                                        <span class="flaticon-rotate"></span>

                                        <!-- Shape -->
                                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z"
                                                transform="translate(100 100)" />
                                        </svg>

                                    </div>
                                </div>
                            </div> <!-- End Icon -->

                            <!-- Text -->
                            <div class="fbox-txt ar-margin-r-25">
                                <h6 class="s-22 w-700">
                                    {{ trans('welcome.gift_cards') }}
                                </h6>
                                <p>{{ trans('welcome.gift_cards_description') }}
                                </p>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #4 -->


                    <!-- FEATURE BOX #5 -->
                    <div class="col">
                        <div class="fbox-11 fb-5 wow fadeInUp">

                            <!-- Icon -->
                            <div class="fbox-ico-wrap">
                                <div class="fbox-ico ico-50">
                                    <div class="shape-ico color--theme">

                                        <!-- Vector Icon -->
                                        <span class="flaticon-click"></span>

                                        <!-- Shape -->
                                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z"
                                                transform="translate(100 100)" />
                                        </svg>

                                    </div>
                                </div>
                            </div> <!-- End Icon -->

                            <!-- Text -->
                            <div class="fbox-txt ar-margin-r-25">
                                <h6 class="s-22 w-700">{{ trans('welcome.travel_event') }}</h6>
                                <p>{{ trans('welcome.travel_event_description') }}

                                </p>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #5 -->


                    <!-- FEATURE BOX #6 -->
                    <div class="col">
                        <div class="fbox-11 fb-6 wow fadeInUp">

                            <!-- Icon -->
                            <div class="fbox-ico-wrap">
                                <div class="fbox-ico ico-50">
                                    <div class="shape-ico color--theme">

                                        <!-- Vector Icon -->
                                        <span class="flaticon-hosting"></span>

                                        <!-- Shape -->
                                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z"
                                                transform="translate(100 100)" />
                                        </svg>

                                    </div>
                                </div>
                            </div> <!-- End Icon -->

                            <!-- Text -->
                            <div class="fbox-txt ar-margin-r-25">
                                <h6 class="s-22 w-700">{{ trans('welcome.stamp_cards') }}</h6>
                                <p>{{ trans('welcome.stamp_cards_description') }}
                                </p>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #6 -->




                </div> <!-- End row -->
            </div>

            <!-- END FEATURES-11 WRAPPER -->

            <div class="container mt-lg-5">
                <div class="bc-1-wrapper bg--02 bg--fixed r-16">
                    <div class="section-overlay">
                        <div class="row d-flex align-items-center">


                            <!-- TEXT BLOCK -->
                            <div class="col-md-6 order-last order-md-2">
                                <div class="txt-block left-column wow fadeInRight"
                                    style="visibility: visible; animation-name: fadeInRight;">

                                    <!-- Section ID -->

                                    <!-- Title -->
                                    <h2 class="s-46 w-700">{{ trans('welcome.and_more') }}</h2>

                                    <!-- List -->
                                    <ul class="simple-list">

                                        <li class="list-item">
                                            <p>{{ trans('welcome.and_more_title') }}
                                            </p>
                                        </li>

                                        <li class="list-item">
                                            <p class="mb-0">** {{ trans('welcome.engage_title') }}**
                                                <br>
                                                {{ trans('welcome.engage_description') }}
                                            </p>
                                        </li>

                                        <li class="list-item">
                                            <p class="mb-0">** {{ trans('welcome.tailor_msg') }}**
                                                <br>
                                                {{ trans('welcome.tailor_description') }}
                                            </p>
                                        </li>

                                        <li class="list-item">
                                            <p class="mb-0">**{{ trans('welcome.geolocation_title') }}**
                                                <br>
                                                {{ trans('welcome.geolocation_description') }}

                                            </p>
                                        </li>

                                    </ul>

                                </div>
                            </div> <!-- END TEXT BLOCK -->


                            <!-- IMAGE BLOCK -->
                            <div class="col-md-6 order-first order-md-2">
                                <div class="img-block right-column wow fadeInLeft"
                                    style="visibility: visible; animation-name: fadeInLeft;">
                                    <img class="img-fluid" src="{{ asset('img/and_more.png') }}" alt="content-image">
                                </div>
                            </div>


                        </div> <!-- End row -->
                    </div> <!-- End section overlay -->
                </div> <!-- End content wrapper -->
            </div>

        </div> <!-- End container -->


    </section>

    <section id="features-2" class="py-100 features-section division">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="section-title mb-80">

                        <!-- Title -->
                        <h2 class="s-50 w-700">{{ trans('welcome.empower_title') }}</h2>

                        <!-- Text -->
                        <p class="s-21 color--grey">{{ trans('welcome.empower_subtitle') }}</p>

                    </div>
                </div>
            </div>


            <!-- FEATURES-2 WRAPPER -->
            <div class="fbox-wrapper text-center">
                <div class="row row-cols-1 row-cols-md-3">


                    <!-- FEATURE BOX #1 -->
                    <div class="col">
                        <div class="fbox-2 fb-1 wow fadeInUp">

                            <!-- Image -->
                            <div class="fbox-img gr--whitesmoke h-175">
                                <img class="img-fluid" src="{{ asset('img/cafe.png') }}" alt="feature-image">
                            </div>

                            <!-- Text -->
                            <div class="fbox-txt">
                                <h6 class="s-22 w-700">{{ trans('welcome.cafe') }}</h6>
                                <p>{{ trans('welcome.cafe_description') }}</p>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #1 -->


                    <!-- FEATURE BOX #2 -->
                    <div class="col">
                        <div class="fbox-2 fb-2 wow fadeInUp">

                            <!-- Image -->
                            <div class="fbox-img gr--whitesmoke h-175">
                                <img class="img-fluid" src="{{ asset('img/food.png') }}" alt="feature-image">
                            </div>

                            <!-- Text -->
                            <div class="fbox-txt">
                                <h6 class="s-22 w-700">{{ trans('welcome.restuarant_card') }}</h6>
                                <p>{{ trans('welcome.restuarant_card_description') }}</p>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #2 -->


                    <!-- FEATURE BOX #3 -->
                    <div class="col">
                        <div class="fbox-2 fb-3 wow fadeInUp">

                            <!-- Image -->
                            <div class="fbox-img gr--whitesmoke h-175">
                                <img class="img-fluid" src="{{ asset('img/other.png') }}" alt="feature-image">
                            </div>

                            <!-- Text -->
                            <div class="fbox-txt">
                                <h6 class="s-22 w-700">{{ trans('welcome.hair_salon_card') }}</h6>
                                <p>{{ trans('welcome.salon_description') }}</p>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #3 -->


                </div> <!-- End row -->
            </div> <!-- END FEATURES-2 WRAPPER -->


        </div> <!-- End container -->
    </section>

    {{-- <section id="lnk-1" class="pt-100 ct-02 content-section division">
        <div class="container">


            <!-- SECTION CONTENT (ROW) -->
            <div class="row d-flex align-items-center">


                <!-- IMAGE BLOCK -->
                <div class="col-md-6">
                    <div class="img-block left-column wow fadeInRight"
                        style="visibility: visible; animation-name: fadeInRight;">
                        <img class="img-fluid" src="{{ asset('img/bg-overview.png') }}" alt="content-image">
                    </div>
                </div>


                <!-- TEXT BLOCK -->
                <div class="col-md-6">
                    <div class="txt-block right-column wow fadeInLeft"
                        style="visibility: visible; animation-name: fadeInLeft;">

                        <!-- Title -->
                        <h2 class="s-46 w-700">{{ trans('welcome.more_product') }}</h2>

                        <!-- Text -->
                        <p>{{ trans('welcome.more_description') }}
                        </p>


                    </div>
                </div> <!-- END TEXT BLOCK -->


            </div> <!-- END SECTION CONTENT (ROW) -->


        </div> <!-- End container -->
    </section> --}}


    <!-- PRICING-3
                                                                                                   ============================================= -->


    <!-- DIVIDER LINE -->
    <hr class="divider">

    <section class="pt-100 ct-02 content-section division">
        <div class="container">


            <!-- SECTION CONTENT (ROW) -->
            <div class="row d-flex align-items-center">


                <!-- IMAGE BLOCK -->
                <div class="col-md-6">
                    <div class="img-block left-column wow fadeInRight">
                        {{-- <img class="img-fluid" src="{{ asset('img/hero_img.png') }}" alt="content-image"> --}}
                        <img class="img-fluid" src="images/img-05.png" alt="content-image">

                    </div>
                </div>


                <!-- TEXT BLOCK -->
                <div class="col-md-6">
                    <div class="txt-block right-column wow fadeInLeft">

                        <!-- Section ID -->
                        <span class="section-id">{{ trans('welcome.built_automation') }}</span>

                        <!-- Title -->
                        <h2 class="s-46 w-700">{{ trans('welcome.built_subtitle') }}</h2>

                        <!-- Text -->
                        <p> {{ trans('welcome.built_para_1') }}
                        </p>
                        <p>{{ trans('welcome.built_para_2') }}
                        </p>

                        <!-- List -->


                    </div>
                </div> <!-- END TEXT BLOCK -->


            </div> <!-- END SECTION CONTENT (ROW) -->


        </div> <!-- End container -->
    </section> <!-- END TEXT CONTENT -->

    {{-- <section id="lnk-2" class="pt-100 ws-wrapper content-section">
        <div class="container">
            <div class="bc-5-wrapper bg--04 hidd bg--fixed r-16">
                <div class="section-overlay">


                    <!-- SECTION TITLE -->
                    <div class="row justify-content-center">
                        <div class="col-md-11 col-lg-9">
                            <div class="section-title wow fadeInUp mb-60">

                                <!-- Title -->
                                <h2 class="s-50 w-700">{{ trans('welcome.affordable_title') }}</h2>

                                <!-- Text -->
                                <p class="p-xl">{{ trans('welcome.affordable_description') }}
                                </p>

                            </div>
                        </div>
                    </div>


                    <!-- IMAGE BLOCK -->
                    <div class="row justify-content-center">
                        <div class="col">
                            <div class="bc-5-img bc-5-tablet img-block-hidden video-preview wow fadeInUp">

                                <!-- Play Icon -->
                                <a class="video-popup2" href="https://www.youtube.com/embed/7e90gBu4pas">
                                    <div class="video-btn video-btn-xl bg--theme">
                                        <div class="video-block-wrapper"><span class="flaticon-play-button"></span></div>
                                    </div>
                                </a>

                                <!-- Preview Image -->
                                <img class="img-fluid" src="images/tablet-04.png" alt="content-image">

                            </div>
                        </div>
                    </div>


                </div> <!-- End section overlay -->
            </div> <!-- End content wrapper -->
        </div> <!-- End container -->
    </section> <!-- END BOX CONTENT --> --}}

    {{-- <div id="statistic-5" class="pt-100 statistic-section division">
        <div class="container">


            <!-- STATISTIC-1 WRAPPER -->
            <div class="statistic-5-wrapper">
                <div class="row row-cols-1 row-cols-md-3">


                    <!-- STATISTIC BLOCK #1 -->
                    <div class="col">
                        <div id="sb-5-1" class="wow fadeInUp">
                            <div class="statistic-block">

                                <!-- Digit -->
                                <div class="statistic-digit">
                                    <h2 class="s-44 w-700">
                                        <span class="count-element">26</span>.<span class="count-element">62</span>k
                                    </h2>
                                </div>

                                <!-- Text -->
                                <div class="statistic-txt">
                                    <h5 class="s-19 w-700">{{ trans('welcome.happy_customer') }}</h5>
                                    <p>Porta justo integer and velna vitae auctor and magna quaerat ligula</p>
                                </div>

                            </div>
                        </div>
                    </div> <!-- END STATISTIC BLOCK #1 -->


                    <!-- STATISTIC BLOCK #2 -->
                    <div class="col">
                        <div id="sb-5-2" class="wow fadeInUp">
                            <div class="statistic-block">

                                <!-- Digit -->
                                <div class="statistic-digit">
                                    <h2 class="s-44 w-700">
                                        <span class="count-element">13</span>.<span class="count-element">54</span>k
                                    </h2>
                                </div>

                                <!-- Text -->
                                <div class="statistic-txt">
                                    <h5 class="s-19 w-700">{{ trans('welcome.positive_rating') }}</h5>
                                    <p>Porta justo integer and velna vitae auctor and magna quaerat ligula</p>
                                </div>

                            </div>
                        </div>
                    </div> <!-- END STATISTIC BLOCK #2 -->


                    <!-- STATISTIC BLOCK #3 -->
                    <div class="col">
                        <div id="sb-5-3" class="wow fadeInUp">
                            <div class="statistic-block">

                                <!-- Digit -->
                                <div class="statistic-digit">
                                    <h2 class="s-44 w-700">
                                        <span class="count-element">4</span>.<span class="count-element">87</span>/5
                                    </h2>
                                </div>

                                <!-- Text -->
                                <div class="statistic-txt">
                                    <h5 class="s-19 w-700">{{ trans('welcome.rating') }}</h5>
                                    <p>Porta justo integer and velna vitae auctor and magna quaerat ligula</p>
                                </div>

                            </div>
                        </div>
                    </div> <!-- END STATISTIC BLOCK #3 -->


                </div> <!-- End row -->
            </div> <!-- END STATISTIC-5 WRAPPER -->


        </div> <!-- End container -->
    </div> <!-- END STATISTIC-5 --> --}}


    <section class="pt-100 ct-01 content-section division">
        <div class="container">


            <!-- SECTION CONTENT (ROW) -->
            <div class="row d-flex align-items-center">


                <!-- TEXT BLOCK -->
                <div class="col-md-6 order-last order-md-2">
                    <div class="txt-block left-column wow fadeInRight">

                        <!-- Section ID -->
                        <span class="section-id">{{ trans('welcome.brand_new') }}</span>

                        <!-- Title -->
                        <h2 class="s-46 w-700">{{ trans('welcome.bring_new') }} {{ config('app.name') }}</h2>

                        <!-- Text -->
                        <p>
                            {{ trans('welcome.bring_des') }}
                        </p>

                        <!-- Small Title -->


                    </div>
                </div> <!-- END TEXT BLOCK -->


                <!-- IMAGE BLOCK -->
                <div class="col-md-6 order-first order-md-2">
                    <div class="img-block right-column wow fadeInLeft">
                        <img class="img-fluid" src="images/img-11.png" alt="content-image">
                    </div>
                </div>


            </div> <!-- END SECTION CONTENT (ROW) -->


        </div> <!-- End container -->
    </section> <!-- END TEXT CONTENT -->




    {{-- <section id="reviews-3" class="pt-100 reviews-section">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-title mb-70">

                        <!-- Title -->
                        <h2 class="s-50 w-700">Loved by thousands of creators and brands</h2>

                        <!-- Text -->
                        <p class="s-21 color--grey">Ligula risus auctor tempus magna feugiat lacinia.</p>

                    </div>
                </div>
            </div>


            <!-- TESTIMONIALS-3 WRAPPER -->
            <div class="reviews-3-wrapper rel shape--02 shape--whitesmoke r-24">
                <div class="row align-items-center">


                    <!-- TESTIMONIAL #1 -->
                    <div class="col-md-5">
                        <div id="rw-3-1" class="review-3 bg--white-100 block-border block-shadow r-08">

                            <!-- Quote Icon -->
                            <div class="review-ico ico-65"><span class="flaticon-quote"></span></div>

                            <!-- Text -->
                            <div class="review-txt">

                                <!-- Title -->
                                <h6 class="s-20 w-700">This is crazy...</h6>

                                <!-- Text -->
                                <p class="p-md">At sagittis congue an augue magna ipsum vitae a purus suscipit
                                    ipsum primis diam a cubilia laoreet augue ultrice ligula magna a lectus gestas
                                    augue cubilia turpis dolores aliquam undo quaerat sodales euismod
                                </p>

                                <!-- Author -->
                                <div class="author-data clearfix">

                                    <!-- Avatar -->
                                    <div class="review-avatar">
                                        <img src="images/review-author-2.jpg" alt="review-avatar">
                                    </div>

                                    <!-- Data -->
                                    <div class="review-author">
                                        <h6 class="s-18 w-700">Joel Peterson</h6>
                                        <p class="p-sm">Internet Surfer</p>
                                    </div>

                                </div> <!-- End Author -->

                            </div> <!-- End Text -->

                        </div>
                    </div> <!-- END TESTIMONIAL #2 -->


                    <!-- TESTIMONIALS #2-3 -->
                    <div class="col-md-7">


                        <!-- TESTIMONIAL #2 -->
                        <div id="rw-3-2" class="review-3 bg--white-100 block-border block-shadow r-08">

                            <!-- Quote Icon -->
                            <div class="review-ico ico-65"><span class="flaticon-quote"></span></div>

                            <!-- Text -->
                            <div class="review-txt">

                                <!-- Title -->
                                <h6 class="s-20 w-700">Great Flexibility!</h6>

                                <!-- Text -->
                                <p class="p-md">An augue cubilia laoreet magna undo suscipit egestas ipsum and lectus
                                    purus ipsum a primis gestas impedit ultrice ligula egestas a sapien lectus gestas
                                    tempus
                                </p>

                                <!-- Author -->
                                <div class="author-data clearfix">

                                    <!-- Avatar -->
                                    <div class="review-avatar">
                                        <img src="images/review-author-5.jpg" alt="review-avatar">
                                    </div>

                                    <!-- Data -->
                                    <div class="review-author">
                                        <h6 class="s-18 w-700">Jennifer Harper</h6>
                                        <p class="p-sm">App Developer</p>
                                    </div>

                                </div> <!-- End Author -->

                            </div> <!-- End Text -->

                        </div> <!-- END TESTIMONIAL #2 -->


                        <!-- TESTIMONIAL #3 -->
                        <div id="rw-3-3" class="review-3 bg--white-100 block-border block-shadow r-08">

                            <!-- Quote Icon -->
                            <div class="review-ico ico-65"><span class="flaticon-quote"></span></div>

                            <!-- Text -->
                            <div class="review-txt">

                                <!-- Title -->
                                <h6 class="s-20 w-700">Simple and Useful!</h6>

                                <!-- Text -->
                                <p class="p-md">Augue at vitae purus tempus egestas volutpat augue magnis cubilia
                                    laoreet magna and suscipit luctus dolor blandit purus tempus feugiat impedit
                                    laoreet augue
                                </p>

                                <!-- Author -->
                                <div class="author-data clearfix">

                                    <!-- Avatar -->
                                    <div class="review-avatar">
                                        <img src="images/review-author-8.jpg" alt="review-avatar">
                                    </div>

                                    <!-- Data -->
                                    <div class="review-author">
                                        <h6 class="s-18 w-700">Evelyn Martinez</h6>
                                        <p class="p-sm">WordPress Consultant</p>
                                    </div>

                                </div> <!-- End Author -->

                            </div> <!-- End Text -->

                        </div> <!-- END TESTIMONIAL #3 -->


                    </div> <!-- END TESTIMONIALS #2-3 -->


                </div> <!-- End row -->
            </div> <!-- END TESTIMONIALS-3 WRAPPER -->


        </div> <!-- End container -->
    </section> <!-- END TESTIMONIALS-3 --> --}}


    {{-- <div id="rating-1" class="pt-70 rating-section">
        <div class="container">


            <!-- RATING TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="rating-title mb-40">
                        <h5 class="s-18 color--grey w-500">Our clients love us as much as we love them</h5>
                    </div>
                </div>
            </div>


            <!-- RATING-1 WRAPPER -->
            <div class="rating-1-wrapper">
                <div class="row justify-content-md-center row-cols-1 row-cols-md-3">


                    <!-- RATING BOX #1 -->
                    <div class="col">
                        <div id="rb-1-1" class="rbox-1">

                            <!-- Brand Logo -->
                            <div class="rbox-1-img">
                                <img class="img-fluid" src="images/brand-21.png" alt="feature-image">
                            </div>

                            <!-- Rating Stars -->
                            <div class="star-rating ico-10 bg--white-100 r-100 clearfix">
                                <span class="flaticon-star"></span>
                                <span class="flaticon-star"></span>
                                <span class="flaticon-star"></span>
                                <span class="flaticon-star"></span>
                                <span class="flaticon-star-half-empty mr-5"></span>
                                &nbsp; 4.7/5
                            </div>

                        </div>
                    </div>


                    <!-- RATING BOX #2 -->
                    <div class="col">
                        <div id="rb-1-2" class="rbox-1">

                            <!-- Brand Logo -->
                            <div class="rbox-1-img">
                                <img class="img-fluid" src="images/brand-22.png" alt="feature-image">
                            </div>

                            <!-- Rating Stars -->
                            <div class="star-rating ico-10 bg--white-100 r-100 clearfix">
                                <span class="flaticon-star"></span>
                                <span class="flaticon-star"></span>
                                <span class="flaticon-star"></span>
                                <span class="flaticon-star"></span>
                                <span class="flaticon-star mr-5"></span>
                                &nbsp; 4.95/5
                            </div>

                        </div>
                    </div>


                    <!-- RATING BOX #3 -->
                    <div class="col">
                        <div id="rb-1-3" class="rbox-1">

                            <!-- Brand Logo -->
                            <div class="rbox-1-img">
                                <img class="img-fluid" src="images/brand-23.png" alt="feature-image">
                            </div>

                            <!-- Rating Stars -->
                            <div class="star-rating ico-10 bg--white-100 r-100 clearfix">
                                <span class="flaticon-star"></span>
                                <span class="flaticon-star"></span>
                                <span class="flaticon-star"></span>
                                <span class="flaticon-star"></span>
                                <span class="flaticon-star-1 mr-5"></span>
                                &nbsp; 4.24/5
                            </div>

                        </div>
                    </div>


                </div> <!-- End row -->
            </div> <!-- END RATING-1 WRAPPER -->


        </div> <!-- End container -->
    </div> <!-- END RATING-1 --> --}}



    <section class="pt-100 ws-wrapper content-section">
        <div class="container">
            <div class="bc-1-wrapper bg--purple-100 bg--fixed r-16">
                {{-- <div class="section-overlay">
                    <div class="row d-flex align-items-center">


                        <!-- IMAGE BLOCK -->
                        <div class="col-md-6">
                            <div class="img-block left-column wow fadeInRight">
                                <img class="img-fluid" src="images/img-03.png" alt="content-image">
                            </div>
                        </div>


                        <!-- TEXT BLOCK -->
                        <div class="col-md-6">
                            <div class="txt-block right-column wow fadeInLeft">

                                <!-- Section ID -->
                                <span class="section-id">{{ trans('welcome.from_good') }}</span>

                                <!-- Title -->
                                <h2 class="s-46 w-700">{{ trans('welcome.scale_design') }}</h2>

                                <!-- Text -->
                                <p>Sodales tempor sapien quaerat congue eget ipsum laoreet turpis neque auctor
                                    vitae eros dolor luctus placerat magna ligula cursus and purus pretium
                                </p>

                                <!-- Text -->
                                <p class="mb-0">Sapien tempor sodales quaerat ipsum undo congue laoreet turpis neque
                                    auctor turpis vitae dolor luctus placerat magna and ligula cursus purus vitae
                                </p>

                            </div>
                        </div> <!-- END TEXT BLOCK -->


                    </div> <!-- End row -->
                </div> <!-- End section overlay --> --}}
            </div> <!-- End content wrapper -->
        </div> <!-- End container -->
    </section> <!-- END BOX CONTENT -->




    <div id="brands-1" class="pt-100 brands-section">
        <div class="container">


            <!-- BRANDS TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="brands-title mb-50">
                        <h5 class="s-20 w-700">{{ trans('welcome.trust_by', ['count' => '3400']) }}</h5>
                    </div>
                </div>
            </div>


            <!-- BRANDS CAROUSEL -->
            {{-- <div class="row">
                <div class="col text-center">
                    <div class="owl-carousel brands-carousel-5">


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="images/brand-1.png" alt="brand-logo"></a>
                        </div>


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="images/brand-2.png" alt="brand-logo"></a>
                        </div>


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="images/brand-3.png" alt="brand-logo"></a>
                        </div>


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="images/brand-4.png" alt="brand-logo"></a>
                        </div>


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="images/brand-5.png" alt="brand-logo"></a>
                        </div>


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="images/brand-6.png" alt="brand-logo"></a>
                        </div>


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="images/brand-7.png" alt="brand-logo"></a>
                        </div>


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="images/brand-8.png" alt="brand-logo"></a>
                        </div>


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="images/brand-9.png" alt="brand-logo"></a>
                        </div>


                    </div>
                </div>
            </div> <!-- END BRANDS CAROUSEL --> --}}


        </div> <!-- End container -->
    </div> <!-- END BRANDS-1 -->



    {{-- <section id="banner-13" class="pt-100 banner-section">
        <div class="container">


            <!-- BANNER-13 WRAPPER -->
            <div class="banner-13-wrapper bg--03 bg--scroll r-16 block-shadow">
                <div class="banner-overlay">
                    <div class="row d-flex align-items-center">


                        <!-- BANNER-5 TEXT -->
                        <div class="col-md-7">
                            <div class="banner-13-txt color--white">

                                <!-- Title -->
                                <h2 class="s-46 w-700">{{ trans('welcome.getting_start') }} {{ config('app.name') }}
                                    {{ trans('welcome.today') }} </h2>

                                <!-- Text -->
                                <p class="p-lg">{{ trans('welcome.no_coding') }} {{ config('app.name') }}.
                                </p>

                                <!-- Button -->
                                <a href="{{ route('register') }}"
                                    class="btn r-04 btn--theme hover--tra-white">{{ trans('welcome.get_start') }}</a>

                            </div>
                        </div> <!-- END BANNER-13 TEXT -->


                        <!-- BANNER-13 IMAGE -->
                        <div class="col-md-5">
                            <div class="banner-13-img text-center">
                                <img class="img-fluid" src="images/img-04.png" alt="banner-image">
                            </div>
                        </div>


                    </div> <!-- End row -->
                </div> <!-- End banner overlay -->
            </div> <!-- END BANNER-13 WRAPPER -->


        </div> <!-- End container -->
    </section> <!-- END BANNER-13 --> --}}




    <section id="newsletter-1" class="x-border newsletter-section">
        <div class="newsletter-overlay">
            <div class="container">
                <div class="row d-flex align-items-center row-cols-1 row-cols-lg-2">


                    <!-- NEWSLETTER TEXT -->
                    <div class="col">
                        <div class="newsletter-txt">
                            <h4 class="s-34 w-700">{{ trans('welcome.stay_update') }}</h4>
                        </div>
                    </div>


                    <!-- NEWSLETTER FORM -->
                    <div class="col">
                        <form class="newsletter-form">

                            <div class="input-group">
                                <input type="email" autocomplete="off" class="form-control"
                                    placeholder="{{ trans('welcome.your_email') }}" required id="s-email">
                                <span class="input-group-btn">
                                    <button type="submit"
                                        class="btn btn--theme hover--theme">{{ trans('welcome.Subscribe_Now') }}</button>
                                </span>
                            </div>

                            <!-- Newsletter Form Notification -->
                            <label for="s-email" class="form-notification"></label>

                        </form>
                    </div> <!-- END NEWSLETTER FORM -->


                </div> <!-- End row -->
            </div> <!-- End container -->
        </div> <!-- End newsletter-overlay -->
    </section> <!-- END NEWSLETTER-1 -->
@endsection
