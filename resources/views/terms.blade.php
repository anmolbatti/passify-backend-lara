@extends('layouts.dashboard')
@section('content')
    <section id="terms-page" class="gr--whitesmoke pb-80 inner-page-hero division">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">


                    <!-- INNER PAGE TITLE -->
                    <div class="inner-page-title">
                        <h2 class="s-52 w-700">{{ __('terms.title') }}</h2>
                        <p class="p-lg">{{ __('terms.subtitle') }}
                        </p>
                    </div>


                    <!-- TEXT BLOCK -->
                    <div class="txt-block legal-info">

                        <!-- Title -->
                        <h4 class="s-30 w-700"><span>1.</span> {{ __('terms.intro_title') }}</h4>

                        <!-- Text -->
                        <p>{{ __('terms.intro_des1') }} <a href="https://passify.info" target="_new"
                                class="color--theme">https://passify.info</a>
                            (“Passify”),{{ __('terms.intro_des2') }}

                        </p>

                        <!-- Text -->
                        <p>{{ __('terms.intro_confirm') }}
                        </p>
                        <p>{{ __('terms.intro_modify') }}</p>

                        <!-- Title -->
                        <h4 class="s-30 w-700"><span>2.</span> {{ __('terms.rep_title') }}</h4>



                        <!-- Text -->
                        <p>
                            {{ __('terms.by_using') }}

                        </p>

                        <ul class="simple-list">

                            <li class="list-item">
                                <p>
                                    {{ __('terms.rep_des1') }}

                                </p>
                            </li>

                            <li class="list-item">
                                <p>
                                    {{ __('terms.rep_des2') }}

                                </p>
                            </li>

                            <li class="list-item">
                                <p>
                                    {{ __('terms.rep_des3') }}

                                </p>
                            </li>

                            <li class="list-item">
                                <p>
                                    {{ __('terms.rep_des4') }}

                                </p>
                            </li>

                            <li class="list-item">
                                <p>
                                    {{ __('terms.rep_des5') }}

                                </p>
                            </li>
                            <li class="list-item">
                                <p>
                                    {{ __('terms.rep_des6') }}

                                </p>
                            </li>

                        </ul>


                        <h4 class="s-30 w-700"><span>3.</span>
                            {{ __('terms.account_title') }}

                        </h4>

                        <!-- Text -->
                        <p> {{ __('terms.account_desc') }}
                        </p>

                        <!-- List -->
                        <p> {{ __('terms.account_data') }}
                        </p>
                        <p> {{ __('terms.account_confidentiality') }}
                        </p>

                        <p> {{ __('terms.account_theft') }}
                        </p>

                        <p> {{ __('terms.account_use') }}
                        </p>

                        <p> {{ __('terms.account_harm') }}
                        </p>

                        <p> {{ __('terms.account_verification') }}
                        </p>


                        <!-- Small Title -->
                        <h5 class="s-24 w-700"><span>4</span>{{ __('terms.subscribe_title') }}</h5>

                        <p> {{ __('terms.subscribe_desc') }}
                        </p>

                        <p> {{ __('terms.subscribe_terms') }}
                        </p>


                        <p> {{ __('terms.subscribe_trial') }}
                        </p>

                        <p> {{ __('terms.subscribe_packages') }}
                        </p>
                        <p> {{ __('terms.subscribe_price') }}
                        </p>

                        <p> {{ __('terms.subscribe_start') }}
                        </p>

                        <p> {{ __('terms.sub_des6') }}
                        </p>

                        <p> {{ __('terms.sub_des7') }}
                        </p>

                        <p> {{ __('terms.sub_des8') }}
                        </p>

                        <p> {{ __('terms.sub_des9') }}
                        </p>


                        <!-- Title -->
                        <h4 class="s-30 w-700"><span>5.</span> {{ __('terms.payment_title') }}</h4>

                        <!-- Text -->
                        <p>{{ __('terms.payment_des1') }}</p>

                        <p>{{ __('terms.payment_des2') }}</p>

                        <p>{{ __('terms.payment_des3') }}</p>

                        <p>{{ __('terms.payment_des4') }}</p>

                        <p>{{ __('terms.payment_des5') }}</p>

                        <p>{{ __('terms.payment_des6') }}</p>


                        <!-- Small Title -->
                        <h5 class="s-24 w-700"><span>4.1.</span> {{ __('terms.licenses_title') }}</h5>

                        <!-- Text -->
                        <p>{{ __('terms.licenses_des1') }}</p>

                        <!-- Text -->
                        <p>{{ __('terms.licenses_des2') }}</p>

                        <!-- Small Title -->
                        <h5 class="s-24 w-700"><span>6.</span> {{ __('terms.prohibition_title') }}</h5>

                        <p>{{ __('terms.prohibition_des') }}</p>

                        <ul class="simple-list">
                            <li class="list-item">
                                {{ __('terms.pro_list1') }}
                            </li>
                            <li class="list-item">
                                {{ __('terms.pro_list2') }}
                            </li>
                            <li class="list-item">
                                {{ __('terms.pro_list3') }}
                            </li>
                            <li class="list-item">
                                {{ __('terms.pro_list4') }}
                            </li>
                            <li class="list-item">
                                {{ __('terms.pro_list5') }}
                            </li>
                            <li class="list-item">
                                {{ __('terms.pro_list6') }}
                            </li>
                            <li class="list-item">
                                {{ __('terms.pro_list7') }}
                            </li>
                            <li class="list-item">
                                {{ __('terms.pro_list8') }}
                            </li>
                            <li class="list-item">
                                {{ __('terms.pro_list9') }}
                            </li>
                        </ul>

                        <p>{{ __('terms.prohibition_des2') }}</p>


                        <!-- Title -->
                        <h4 class="s-30 w-700"><span>6.</span> {{ __('terms.legal_liability_title') }}</h4>

                        <!-- List -->
                        <p>{{ __('terms.legal_liability_des1') }}</p>

                        <p>{{ __('terms.legal_liability_des2') }}</p>

                        <p>{{ __('terms.legal_liability_des3') }}</p>

                        <p>{{ __('terms.legal_liability_des4') }}</p>

                        <p>{{ __('terms.legal_liability_des5') }}</p>

                        <p>{{ __('terms.legal_liability_des6') }}</p>
                        <!-- Title -->
                        <h4 class="s-30 w-700"><span>7.</span> {{ __('terms.intelluctual_title') }}</h4>

                        <p>{{ __('terms.int_des1') }} <a href="https://passify.com"
                                class="color--theme">https://passify.com</a> {{ __('terms.int_des2') }}</p>

                        <p>{{ __('terms.int_des3') }}
                        </p>

                        <p>{{ __('terms.int_des4') }}</p>
                        {{ __('terms.int_des5') }}<a href="https://passify.com"
                            class="color--theme">https://passify.com</a>. {{ __('terms.int_des6') }}</p>


                        <!-- Small Title -->
                        <h5 class="s-24 w-700"><span>8.</span> {{ __('terms.indemnification_title') }}</h5>

                        <p>{{ __('terms.indemnification_des') }}</p>

                        <ul class="simple-list">
                            <li class="list-item">{{ __('terms.ind_list_1') }}</li>
                            <li class="list-item">{{ __('terms.ind_list_2') }}</li>
                            <li class="list-item">{{ __('terms.ind_list_3') }}</li>
                            <li class="list-item">{{ __('terms.ind_list_4') }}</li>
                        </ul>

                        <h4 class="s-30 w-700"><span>9.</span> {{ __('terms.e_communications_title') }}
                        </h4>

                        <!-- Text -->
                        <p>{{ __('terms.e_communications_des1') }}</p>
                        <p>{{ __('terms.e_communications_des2') }}</p>

                        <!-- Title -->
                        <h4 class="s-30 w-700"><span>10.</span> {{ __('terms.termination_title') }}
                        </h4>

                        <!-- Text -->
                        <p>{{ __('terms.termination_des1') }}</p>
                        <!-- Text -->
                        <p>{{ __('terms.termination_des2') }}</p>

                        <!-- Title -->
                        <h4 class="s-30 w-700"><span>11.</span> {{ __('terms.laws_jurisdiction_title') }}</h4>

                        <!-- Text -->
                        <p>{{ __('terms.laws_jurisdiction_des1') }}</p>

                        <p>{{ __('terms.laws_jurisdiction_des2') }}</p>

                        <p>{{ __('terms.laws_jurisdiction_des3') }}</p>

                        <h4 class="s-30 w-700"><span>12.</span> {{ __('terms.modifications_title') }}</h4>
                        <p>{{ __('terms.modifications_des2') }}</p>

                        <p>{{ __('terms.modifications_des2') }}</p>

                        <p>{{ __('terms.modifications_des3') }}</p>


                        <h4 class="s-30 w-700"><span>13.</span>{{ __('terms.general_provisions_title') }}</h4>

                        <!-- Text -->
                        <p>{{ __('terms.general_provisions_des1') }}</p>

                        <p>{{ __('terms.general_provisions_des2') }}</p>

                        <p>{{ __('terms.general_provisions_des3') }}</p>

                        <p>{{ __('terms.general_provisions_des4') }}</p>

                        <p>{{ __('terms.general_provisions_des5') }}</p>

                        <p>{{ __('terms.general_provisions_des6') }} <a href="https://passify.info"
                                class="color--theme">https://passify.info</a> {{ __('terms.general_provisions_des7') }}
                        </p>


                        <h4 class="s-30 w-700"><span>10.</span> {{ __('terms.how_to_contact') }}</h4>

                        <!-- Text -->
                        <p>{{ __('terms.contact_des') }} <a href="mailto:support@passify.info"
                                class="color--theme">support@passify.info</a>
                        </p>


                    </div> <!-- END TEXT BLOCK -->


                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END TERMS PAGE -->
@endsection
