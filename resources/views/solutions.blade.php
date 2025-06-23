@extends('layouts.dashboard')
@section('content')
    <section id="lnk-1" class="pt-100 ct-02 content-section division">
        <div class="container">
            <div class="row d-flex align-items-center">


                <!-- IMAGE BLOCK -->
                <div class="col-md-6">
                    <div class="img-block left-column wow fadeInRight"
                        style="visibility: visible; animation-name: fadeInRight;">
                        <img class="img-fluid" src="{{asset('images/img-07.png')}}" alt="content-image">
                    </div>
                </div>


                <!-- TEXT BLOCK -->
                <div class="col-md-6">
                    <div class="txt-block right-column wow fadeInLeft"
                        style="visibility: visible; animation-name: fadeInLeft;">

                        <!-- Section ID -->
                        <span class="section-id">Strategies That Work</span>

                        <!-- Title -->
                        <h2 class="s-46 w-700">Right strategies &amp; implementations</h2>

                        <!-- Text -->
                        <p>Sodales tempor sapien quaerat ipsum undo congue laoreet turpis neque auctor turpis
                            vitae dolor luctus placerat magna and ligula cursus purus vitae purus an ipsum suscipit
                        </p>

                        <!-- Small Title -->
                        <h5 class="s-24 w-700">Optimize your presence</h5>

                        <!-- CONTENT BOX #1 -->
                        <div class="cbox-1 ico-15">

                            <div class="ico-wrap color--theme">
                                <div class="cbox-1-ico"><span class="flaticon-check"></span></div>
                            </div>

                            <div class="cbox-1-txt">
                                <p>Magna dolor luctus at egestas sapien</p>
                            </div>

                        </div>

                        <!-- CONTENT BOX #2 -->
                        <div class="cbox-1 ico-15">

                            <div class="ico-wrap color--theme">
                                <div class="cbox-1-ico"><span class="flaticon-check"></span></div>
                            </div>

                            <div class="cbox-1-txt">
                                <p>Cursus purus suscipit vitae cubilia magnis volute egestas vitae sapien
                                    turpis ultrice auctor congue varius magnis
                                </p>
                            </div>

                        </div>

                        <!-- CONTENT BOX #3 -->
                        <div class="cbox-1 ico-15">

                            <div class="ico-wrap color--theme">
                                <div class="cbox-1-ico"><span class="flaticon-check"></span></div>
                            </div>

                            <div class="cbox-1-txt">
                                <p class="mb-0">Volute turpis dolores and sagittis congue</p>
                            </div>

                        </div>

                    </div>
                </div> <!-- END TEXT BLOCK -->


            </div> <!-- End row -->
        </div> <!-- End container -->
    </section>

    <section id="features-2" class="py-100 features-section division">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="section-title mb-70">

                        <!-- Title -->
                        <h2 class="s-50 w-700">The Complete Solutions</h2>

                        <!-- Text -->

                    </div>
                </div>
            </div>


            <!-- FEATURES-2 WRAPPER -->
            <div class="fbox-wrapper text-center">
                <div class="row row-cols-1 row-cols-md-3">


                    <!-- FEATURE BOX #1 -->
                    <div class="col">
                        <div class="fbox-2 fb-1 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">

                            <!-- Image -->
                            <div class="fbox-img gr--whitesmoke h-175">
                                <img class="img-fluid" src="images/f_01.png" alt="feature-image">
                            </div>

                            <!-- Text -->
                            <div class="fbox-txt">
                                <h6 class="s-22 w-700">Member Manager</h6>
                                <p>Luctus egestas augue undo ultrice aliquam in lacus congue dapibus</p>
                            </div>

                            <div class="text-center">
                                <a href="#" class="btn btn--theme mt-5">GET STARTED</a>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #1 -->


                    <!-- FEATURE BOX #2 -->
                    <div class="col">
                        <div class="fbox-2 fb-2 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">

                            <!-- Image -->
                            <div class="fbox-img gr--whitesmoke h-175">
                                <img class="img-fluid" src="images/f_06.png" alt="feature-image">
                            </div>

                            <!-- Text -->
                            <div class="fbox-txt">
                                <h6 class="s-22 w-700">
                                    Coupon Creator
                                </h6>
                                <p>Tempor laoreet augue undo ultrice aliquam in lacusq luctus feugiat</p>
                            </div>

                            <div class="text-center ">
                                <a href="#" class="btn btn--theme mt-5">GET STARTED</a>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #2 -->


                    <!-- FEATURE BOX #3 -->
                    <div class="col">
                        <div class="fbox-2 fb-3 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">

                            <!-- Image -->
                            <div class="fbox-img gr--whitesmoke h-175">
                                <img class="img-fluid" src="images/f_08.png" alt="feature-image">
                            </div>

                            <!-- Text -->
                            <div class="fbox-txt">
                                <h6 class="s-22 w-700">
                                    Event Tickets
                                </h6>
                                <p>Egestas luctus augue undo ultrice aliquam in lacus feugiat cursus</p>
                            </div>

                            <div class="text-center ">
                                <a href="#" class="btn btn--theme mt-5">GET STARTED</a>
                            </div>

                        </div>
                    </div>



                    <!-- END FEATURE BOX #3 -->
                    <div class="col mt-5">
                        <div class="fbox-2 fb-3 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">

                            <!-- Image -->
                            <div class="fbox-img gr--whitesmoke h-175">
                                <img class="img-fluid" src="images/f_07.png" alt="feature-image">
                            </div>

                            <!-- Text -->
                            <div class="fbox-txt">
                                <h6 class="s-22 w-700">
                                    Scanning App
                                </h6>
                                <p>Egestas luctus augue undo ultrice aliquam in lacus feugiat cursus</p>
                            </div>

                            <div class="text-center ">
                                <a href="#" class="btn btn--theme mt-5">GET STARTED</a>
                            </div>

                        </div>
                    </div>

                    <div class="col mt-5">
                        <div class="fbox-2 fb-3 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">

                            <!-- Image -->
                            <div class="fbox-img gr--whitesmoke h-175">
                                <img class="img-fluid" src="images/f_05.png" alt="feature-image">
                            </div>

                            <!-- Text -->
                            <div class="fbox-txt">
                                <h6 class="s-22 w-700">
                                    Flights
                                </h6>
                                <p>Egestas luctus augue undo ultrice aliquam in lacus feugiat cursus</p>
                            </div>

                            <div class="text-center ">
                                <a href="#" class="btn btn--theme mt-5">GET STARTED</a>
                            </div>

                        </div>
                    </div>

                    <div class="col mt-5">
                        <div class="fbox-2 fb-3 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">

                            <!-- Image -->
                            <div class="fbox-img gr--whitesmoke h-175">
                                <img class="img-fluid" src="images/f_04.png" alt="feature-image">
                            </div>

                            <!-- Text -->
                            <div class="fbox-txt">
                                <h6 class="s-22 w-700">
                                    Integrations
                                </h6>
                                <p>Egestas luctus augue undo ultrice aliquam in lacus feugiat cursus</p>
                            </div>

                            <div class="text-center ">
                                <a href="#" class="btn btn--theme mt-5">GET STARTED</a>
                            </div>

                        </div>
                    </div>

                </div> <!-- End row -->
            </div> <!-- END FEATURES-2 WRAPPER -->


        </div> <!-- End container -->
    </section>
@endsection
