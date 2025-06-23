@extends('layouts.dashboard')
@section('content')
    <!-- FAQs-2
                                                                               ============================================= -->
    <section id="faqs-2" class="gr--whitesmoke pb-30 inner-page-hero faqs-section division">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-xl-10">


                    <!-- INNER PAGE TITLE -->
                    <div class="inner-page-title">
                        <h2 class="s-52 w-700">{{ __('faq.question_answers') }}</h2>
                        <p class="p-lg">{{ __('faq.subtitle', ['appname' => config('app.name')]) }}</p>
                    </div>


                    <!-- QUESTIONS ACCORDION -->
                    <div class="accordion-wrapper">
                        <ul class="accordion">


                            <!-- QUESTIONS CATEGORY #1 -->
                            <li class="accordion-item is-active">


                                <!-- CATEGORY HEADER -->
                                <div class="accordion-thumb">
                                    <h4 class="s-28 w-700">{{ __('faq.getting_started') }}</h4>
                                </div>


                                <!-- CATEGORY ANSWERS -->
                                <div class="accordion-panel">


                                    <!-- QUESTION #1 -->
                                    <div class="accordion-panel-item mb-35">

                                        <!-- Question -->
                                        <div class="faqs-2-question">
                                            <h5 class="s-22 w-700"><span>1.</span> {{ __('faq.qu0') }}</h5>
                                        </div>

                                        <!-- Answer -->
                                        <div class="faqs-2-answer color--grey">

                                            <!-- Text -->
                                            <p>{{ __('faq.ans0') }}
                                            </p>

                                        </div>

                                    </div> <!-- END QUESTION #1 -->


                                    <!-- QUESTION #2 -->
                                    <div class="accordion-panel-item mb-35">

                                        <!-- Question -->
                                        <div class="faqs-2-question">
                                            <h5 class="s-22 w-700"><span>2.</span> {{ __('faq.qu1') }}</h5>
                                        </div>

                                        <!-- Answer -->
                                        <div class="faqs-2-answer color--grey">

                                            <!-- Text -->
                                            <p>{{ __('faq.ans1') }}
                                            </p>


                                        </div>

                                    </div> <!-- END QUESTION #2 -->


                                    <!-- QUESTION #3 -->
                                    <div class="accordion-panel-item mb-35">

                                        <!-- Question -->
                                        <div class="faqs-2-question">
                                            <h5 class="s-22 w-700"><span>3.</span> {{ __('faq.qu2') }}</h5>
                                        </div>

                                        <!-- Answer -->
                                        <div class="faqs-2-answer color--grey">

                                            <div class="faqs-2-answer color--grey">

                                                <!-- Text -->
                                                <p>{{ __('faq.ans2') }}</p>


                                            </div>

                                        </div>

                                    </div> <!-- END QUESTION #3 -->

                                </div> <!-- END CATEGORY ANSWERS -->


                            </li> <!-- END QUESTIONS CATEGORY #1 -->


                            <!-- QUESTIONS CATEGORY #2 -->
                            <li class="accordion-item">


                                <!-- CATEGORY HEADER -->
                                <div class="accordion-thumb">
                                    <h4 class="s-28 w-700">{{ __('faq.manage_title') }}</h4>
                                </div>


                                <!-- CATEGORY ANSWERS -->
                                <div class="accordion-panel">


                                    <!-- QUESTION #1 -->
                                    <div class="accordion-panel-item mb-35">

                                        <!-- Question -->
                                        <div class="faqs-2-question">
                                            <h5 class="s-22 w-700"><span>1.</span> {{ __('faq.mq0') }}</h5>
                                        </div>

                                        <!-- Answer -->
                                        <div class="faqs-2-answer color--grey">

                                            <div class="faqs-2-answer color--grey">

                                                <!-- Text -->
                                                <p>{{ __('faq.mans0') }}</p>


                                            </div>

                                        </div>

                                    </div> <!-- END QUESTION #1 -->


                                    <!-- QUESTION #2 -->
                                    <div class="accordion-panel-item mb-35">

                                        <!-- Question -->
                                        <div class="faqs-2-question">
                                            <h5 class="s-22 w-700"><span>2.</span> {{ __('faq.mq1') }}</h5>
                                        </div>

                                        <!-- Answer -->
                                        <div class="faqs-2-answer color--grey">

                                            <!-- Text -->
                                            <p> {{ __('faq.mans1') }}
                                            </p>

                                        </div>

                                    </div> <!-- END QUESTION #2 -->


                                </div> <!-- END CATEGORY ANSWERS -->


                            </li> <!-- END QUESTIONS CATEGORY #2 -->


                            <!-- QUESTIONS CATEGORY #3 -->
                            <li class="accordion-item">


                                <!-- CATEGORY HEADER -->
                                <div class="accordion-thumb">
                                    <h4 class="s-28 w-700">{{ __('faq.design_title') }}</h4>
                                </div>


                                <!-- CATEGORY ANSWERS -->
                                <div class="accordion-panel">


                                    <!-- QUESTION #1 -->
                                    <div class="accordion-panel-item mb-35">

                                        <!-- Question -->
                                        <div class="faqs-2-question">
                                            <h5 class="s-22 w-700"><span>1.</span> {{ __('faq.dq0') }}</h5>
                                        </div>

                                        <!-- Answer -->
                                        <div class="faqs-2-answer color--grey">

                                            <!-- Text -->
                                            <p>{{ __('faq.dans0') }}
                                            </p>

                                        </div>

                                    </div> <!-- END QUESTION #1 -->


                                    <!-- QUESTION #2 -->









                                </div> <!-- END CATEGORY ANSWERS -->


                            </li> <!-- END QUESTIONS CATEGORY #3 -->


                            <!-- QUESTIONS CATEGORY #4 -->
                            <li class="accordion-item">


                                <!-- CATEGORY HEADER -->
                                <div class="accordion-thumb">
                                    <h4 class="s-28 w-700">{{ __('faq.integrate_title') }}</h4>
                                </div>


                                <!-- CATEGORY ANSWERS -->
                                <div class="accordion-panel">


                                    <!-- QUESTION #1 -->
                                    <div class="accordion-panel-item mb-35">

                                        <!-- Question -->
                                        <div class="faqs-2-question">
                                            <h5 class="s-22 w-700"><span>1.</span> {{ __('faq.iq0') }}</h5>
                                        </div>

                                        <!-- Answer -->
                                        <div class="faqs-2-answer color--grey">

                                            <!-- Text -->
                                            <p>{{ __('faq.ians0') }}
                                            </p>

                                        </div>

                                    </div> <!-- END QUESTION #1 -->



                                </div> <!-- END CATEGORY ANSWERS -->


                            </li> <!-- END QUESTIONS CATEGORY #4 -->


                            <!-- QUESTIONS CATEGORY #5 -->
                            <li class="accordion-item">


                                <!-- CATEGORY HEADER -->
                                <div class="accordion-thumb">
                                    <h4 class="s-28 w-700">{{ __('faq.security_title') }}</h4>
                                </div>


                                <!-- CATEGORY ANSWERS -->
                                <div class="accordion-panel">


                                    <!-- QUESTION #1 -->
                                    <div class="accordion-panel-item mb-35">

                                        <!-- Question -->
                                        <div class="faqs-2-question">
                                            <h5 class="s-22 w-700"><span>1.</span> {{ __('faq.sq0') }}</h5>
                                        </div>

                                        <!-- Answer -->
                                        <div class="faqs-2-answer color--grey">

                                            <!-- Text -->
                                            <p>{{ __('faq.sans0') }}
                                            </p>



                                        </div>

                                    </div> <!-- END QUESTION #1 -->


                                    <!-- QUESTION #2 -->
                                    <div class="accordion-panel-item mb-35">

                                        <!-- Question -->
                                        <div class="faqs-2-question">
                                            <h5 class="s-22 w-700"><span>2.</span> {{ __('faq.sq1') }}</h5>
                                        </div>

                                        <!-- Answer -->
                                        <div class="faqs-2-answer color--grey">

                                            <!-- Text -->
                                            <p>{{ __('faq.sans1') }}
                                            </p>



                                        </div>

                                    </div> <!-- END QUESTION #2 -->


                                </div> <!-- END CATEGORY ANSWERS -->


                            </li> <!-- END QUESTIONS CATEGORY #5 -->

                            <li class="accordion-item">


                                <!-- CATEGORY HEADER -->
                                <div class="accordion-thumb">
                                    <h4 class="s-28 w-700">{{ __('faq.support_title') }}</h4>
                                </div>


                                <!-- CATEGORY ANSWERS -->
                                <div class="accordion-panel">


                                    <!-- QUESTION #1 -->
                                    <div class="accordion-panel-item mb-35">

                                        <!-- Question -->
                                        <div class="faqs-2-question">
                                            <h5 class="s-22 w-700"><span>1.</span> {{ __('faq.suq0') }}</h5>
                                        </div>

                                        <!-- Answer -->
                                        <div class="faqs-2-answer color--grey">

                                            <!-- Text -->
                                            <p>{{ __('faq.suans0') }}
                                            </p>



                                        </div>

                                    </div> <!-- END QUESTION #1 -->





                                </div> <!-- END CATEGORY ANSWERS -->


                            </li>

                            <li class="accordion-item">


                                <!-- CATEGORY HEADER -->
                                <div class="accordion-thumb">
                                    <h4 class="s-28 w-700">{{ __('faq.pricing_title') }}</h4>
                                </div>


                                <!-- CATEGORY ANSWERS -->
                                <div class="accordion-panel">


                                    <!-- QUESTION #1 -->
                                    <div class="accordion-panel-item mb-35">

                                        <!-- Question -->
                                        <div class="faqs-2-question">
                                            <h5 class="s-22 w-700"><span>1.</span> {{ __('faq.prq0') }}</h5>
                                        </div>

                                        <!-- Answer -->
                                        <div class="faqs-2-answer color--grey">

                                            <!-- Text -->
                                            <p>{{ __('faq.prans0') }}
                                            </p>



                                        </div>

                                    </div> <!-- END QUESTION #1 -->


                                    <!-- QUESTION #2 -->
                                    <div class="accordion-panel-item mb-35">

                                        <!-- Question -->
                                        <div class="faqs-2-question">
                                            <h5 class="s-22 w-700"><span>2.</span> {{ __('faq.prq1') }}</h5>
                                        </div>

                                        <!-- Answer -->
                                        <div class="faqs-2-answer color--grey">

                                            <!-- Text -->
                                            <p>{{ __('faq.prans1') }}
                                            </p>



                                        </div>

                                    </div> <!-- END QUESTION #2 -->


                                    <div class="accordion-panel-item mb-35">

                                        <!-- Question -->
                                        <div class="faqs-2-question">
                                            <h5 class="s-22 w-700"><span>3.</span> {{ __('faq.prq2') }}</h5>
                                        </div>

                                        <!-- Answer -->
                                        <div class="faqs-2-answer color--grey">

                                            <!-- Text -->
                                            <p>{{ __('faq.starter_plan_des') }}</p>
                                            <p>{{ __('faq.plus_plan_des') }}</p>
                                            <p>{{ __('faq.pro_plan_des') }}</p>


                                        </div>

                                    </div>

                                    <div class="accordion-panel-item mb-35">

                                        <!-- Question -->
                                        <div class="faqs-2-question">
                                            <h5 class="s-22 w-700"><span>4.</span> {{ __('faq.prq3') }}</h5>
                                        </div>

                                        <!-- Answer -->
                                        <div class="faqs-2-answer color--grey">

                                            <!-- Text -->
                                            <p>{{ __('faq.prans3') }}</p>


                                        </div>

                                    </div>

                                    <div class="accordion-panel-item mb-35">

                                        <!-- Question -->
                                        <div class="faqs-2-question">
                                            <h5 class="s-22 w-700"><span>4.</span> {{ __('faq.prq4') }}</h5>
                                        </div>

                                        <!-- Answer -->
                                        <div class="faqs-2-answer color--grey">

                                            <!-- Text -->
                                            <p>{{ __('faq.prans4') }}</p>


                                        </div>

                                    </div>

                                    <div class="accordion-panel-item mb-35">

                                        <!-- Question -->
                                        <div class="faqs-2-question">
                                            <h5 class="s-22 w-700"><span>4.</span> {{ __('faq.prq5') }}</h5>
                                        </div>

                                        <!-- Answer -->
                                        <div class="faqs-2-answer color--grey">

                                            <!-- Text -->
                                            <p>{{ __('faq.prans5') }}</p>


                                        </div>

                                    </div>

                                    <div class="accordion-panel-item mb-35">

                                        <!-- Question -->
                                        <div class="faqs-2-question">
                                            <h5 class="s-22 w-700"><span>4.</span> {{ __('faq.prq6') }}</h5>
                                        </div>

                                        <!-- Answer -->
                                        <div class="faqs-2-answer color--grey">

                                            <!-- Text -->
                                            <p>{{ __('faq.prans6') }}</p>


                                        </div>

                                    </div>

                                    <div class="accordion-panel-item mb-35">

                                        <!-- Question -->
                                        <div class="faqs-2-question">
                                            <h5 class="s-22 w-700"><span>4.</span> {{ __('faq.prq7') }}</h5>
                                        </div>

                                        <!-- Answer -->
                                        <div class="faqs-2-answer color--grey">

                                            <!-- Text -->
                                            <p>{{ __('faq.prans7') }}</p>


                                        </div>

                                    </div>

                                    <div class="accordion-panel-item mb-35">

                                        <!-- Question -->
                                        <div class="faqs-2-question">
                                            <h5 class="s-22 w-700"><span>4.</span> {{ __('faq.prq8') }}</h5>
                                        </div>

                                        <!-- Answer -->
                                        <div class="faqs-2-answer color--grey">

                                            <!-- Text -->
                                            <p>{{ __('faq.prans8') }}</p>


                                        </div>

                                    </div>


                                </div> <!-- END CATEGORY ANSWERS -->


                            </li>
                        </ul>
                    </div> <!-- END QUESTIONS ACCORDION -->


                    <!-- MORE QUESTIONS LINK -->
                    <div class="more-questions">
                        <div class="more-questions-txt bg--white-400 r-100">
                            <p class="p-lg">{{ __('faq.for_more') }}</p>
                        </div>
                    </div>


                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END FAQs-2 -->
@endsection
