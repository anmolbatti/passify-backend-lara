@extends('layouts.dashboard')
@section('content')
    <section id="integrations-2" class="pt-100 integrations-section">
        <div class="container">


            <!-- INTEGRATIONS-2 WRAPPER -->
            <div class="integrations-2-wrapper bg--white-400 r-12 text-center">


                <!-- SECTION TITLE -->
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-9">
                        <div class="section-title mb-50">

                            <!-- Title -->
                            <h2 class="s-50 w-700">{{ __('pricing.title') }}</h2>

                            <!-- Text -->
                            <p class="s-21 color--grey">{{ __('pricing.subtitle') }}
                            </p>

                        </div>
                    </div>
                </div>

                <div class="table-responsive">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('pricing.pass_volume') }}</th>
                                <th scope="col">{{ __('pricing.multi_use') }}</th>
                                <th scope="col">{{ __('pricing.single_use') }}</th>
                                <th scope="col">{{ __('pricing.single_use') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{{__('pricing.from')}} 0 {{__('pricing.to')}} 300</th>
                                <td>-</td>
                                <td>-</td>
                                <td>$39.50</td>
                            </tr>
                            <tr>
                                <th>{{__('pricing.from')}} 300 {{__('pricing.to')}} 3000</th>
                                <td>$0.0310</td>
                                <td>$0.0711</td>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>{{__('pricing.from')}} 3001 {{__('pricing.to')}} 10,000</th>
                                <td>$0.0227</td>
                                <td>$0.0480</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>{{__('pricing.from')}} 10,001 {{__('pricing.to')}} 25,000</th>
                                <td>$0.0159</td>
                                <td>$0.0337</td>
                                <td></td>
                            </tr>

                            <tr>
                                <th>{{__('pricing.from')}} 25,001 {{__('pricing.to')}} 50,000</th>
                                <td>$0.0123</td>
                                <td>$0.0260</td>
                                <td></td>
                            </tr>

                            <tr>
                                <th>{{__('pricing.from')}} 50,001 {{__('pricing.to')}} 100,000</th>
                                <td>$0.0085</td>
                                <td>$0.0182</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>{{__('pricing.from')}} 100,001 {{__('pricing.to')}} 500,000</th>
                                <td>$0.0039</td>
                                <td>$0.0085</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>{{__('pricing.from')}} 500,001 {{__('pricing.from')}} 1000,000</th>
                                <td>$0.0019</td>
                                <td>$0.0044</td>
                                <td></td>
                            </tr>

                            <tr>
                                <th>{{__('pricing.morethan')}} 1000,000</th>
                                <td>-</td>
                                <td>-</td>
                                <td><a href="#" class="nav-link text-primary">{{__('pricing.lets_talk')}}</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>




            </div> <!-- END INTEGRATIONS-2 WRAPPER -->


        </div> <!-- End container -->
    </section>
@endsection
