@extends('layouts.user-dashboard')
@section('content')
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title pb-0">
                <h2 class="m-0 pb-1">{{ __('Subscribe the Plan') }}</h2>

            </div>
            <div class="container">
                <form id="planDetail" action="{{route('plan.detail')}}" method="POST">
                    @csrf
                    <label>{{ __('Select Plan') }}</label>
                    <select name="plan_id" class="form-control"  onchange="document.getElementById('planDetail').submit()">
                        <option>{{__("Select Plan")}}</option>
                        @foreach ($plans as $aplan)
                        <option value="{{$aplan->id}}" {{ $aplan->id == $plan->id ? "selected":'' }}>{{__($aplan->plan_name) . " - " . __($aplan->plan_type) . " - " . __($aplan->price) . " " . __($aplan->currency_symbol)}}</option>
                        @endforeach
                    </select>
                </form>
                <div class="card mt-5">
                    <div class="card-header">{{ __('Plan Detail') }}</div>
                    <div class="card-body">
                        @if ($is_user_sub)
                        <div class="alert alert-warning">
                            {{__("Please be aware of the following consequences when changing your subscription plan:")}}
                            <ul>
                                <li>
                                    <b>{{__("Irreversible Change:")}}</b> {{__("Once you switch, you will be automatically unsubscribed from your previous plan, and this cannot be undone.")}}
                                </li>
                                <li>
                                    <b>{{__("Non-refundable Payments:")}}</b> {{__("Any payments made for your previous plan are non-refundable.")}}
                                </li>
                                <li>
                                    <b>{{__("New Charges Apply:")}}</b> {{__("The new subscription plan will incur fresh charges, effective immediately.")}}
                                </li>
                            </ul>
                        </div>
                        @endif
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
                                <span>{{ __('Card Designs') }}:</span>
                                <span>{{ $plan->card_design_count }}</span>
                            </div>
                            @endif

                            @if ($plan->location_count != null)
                            <div class="gap-2">
                                <span>{{ __('Location') }}:</span>
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
                    <div class="card-footer">
                        <form action="{{route('plan.pay',['plan' => $plan])}}" method="POST">
                            @csrf
                            <button class="btn btn-info">{{ __('Subscribe') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
