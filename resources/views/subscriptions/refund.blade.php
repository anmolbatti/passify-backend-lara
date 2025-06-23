@extends('layouts.user-dashboard')
@section('content')
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title pb-0">
                <h2 class="m-0 pb-1">{{ __('Subscribe the Plan') }}</h2>

            </div>
            <div class="container">

                @if ($plan)
                <div class="card mt-5">
                    <div class="card-header">{{ __('Subscribed Plan') }}</div>
                    <div class="card-body">
                        <div class="col">

                            @if ($plan->plan_name != null)
                            <div class="gap-2">
                                <span>{{ __('Plan Name') }}:</span>
                                <span>{{ $plan->plan_name }}</span>
                            </div>
                            @endif

                            @if ($plan->price != null)
                            <div class="gap-2">
                                <span>{{ __('Price') }}:</span>
                                <span>{{ $plan->price . " " . $plan->currency_symbol }}</span>
                            </div>
                            @endif

                            @if ($plan->plan_type != null)
                            <div class="gap-2">
                                <span>{{ __('Plan Type') }}:</span>
                                <span>{{ $plan->plan_type }}</span>
                            </div>
                            @endif

                            @if ($plan->trial_period_in_days != null)
                            <div class="gap-2">
                                <span>{{ __('Trial Days') }}:</span>
                                <span>{{ $plan->trial_period_in_days }}</span>
                            </div>
                            @endif

                            @if ($plan->card_design_count != null)
                            <div class="gap-2">
                                <span>{{ __('Card Designs') }}</span>
                                <span>{{ $plan->card_design_count }}</span>
                            </div>
                            @endif

                            @if ($plan->location_count != null)
                            <div class="gap-2">
                                <span>{{ __('Location') }}</span>
                                <span>{{ $plan->location_count }}</span>
                            </div>
                            @endif

                            @if ($plan->user_count != null)
                            <div class="gap-2">
                                <span>{{ __('Users') }}:</span>
                                <span>{{ $plan->user_count }}</span>
                            </div>
                            @endif

                            @if ($plan->card_redesign_annual_count != null)
                            <div class="gap-2">
                                <span>{{ __('Card re-design Annually') }}:</span>
                                <span>{{ $plan->card_redesign_annual_count == '0' ? "Unlimited": $plan->card_redesign_annual_count }}</span>
                            </div>
                            @endif

                            @if ($plan->exportable != null)
                            <div class="gap-2">
                                <span>{{ __('Data Export') }}:</span>
                                <span>{{ $plan->exportable ? "Yes" : "No" }}</span>
                            </div>
                            @endif

                            @if ($plan->is_notification_on != null)
                            <div class="gap-2">
                                <span>{{ __('Push notifications') }}:</span>
                                <span>{{ $plan->is_notification_on ? "Yes" : "No" }}</span>
                            </div>
                            @endif

                        </div>
                    </div>
                    @if(!$refunded)
                        <div class="card-footer">
                            <form action="{{route('plan.refund_check')}}" method="POST">
                                @csrf
                                <button class="btn btn-warning">{{__("Refund Now")}}</button>
                            </form>
                        </div>
                    @endif
                </div>
                @endif

                @if ($refunded)
                    <div class="card">
                        <div class="card-body">
                            <p class="alert alert-warning">{{__('Refund request sent to Paytabs')}}</p>
                            <div class="alert alert-info">
                                <a class="btn-link" href="https://support.paytabs.com/en/support/solutions/articles/60000691210-how-to-refund-an-authorized-transactions#How-much-will-the-refund-process-take?-">
                                    {{__("As per Paytabs official documentations:")}}
                                </a>
                                <br>
                                {{__('The refund process might take up to:')}}
                                <ul style="list-style: inside;">
                                    <li>{{__('20 days for some banks')}}</li>
                                    <li>{{__('5 to 7 working days for (credit card Visa or Master card)')}}</li>
                                    <li>{{__('10-15 working days for a debit card.)')}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
