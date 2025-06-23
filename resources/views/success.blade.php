@extends('layouts.dashboard')
@section('content')
    <section id="lnk-1" class="pt-100 ct-02 content-section division">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h2 class="text-success">{{ __('common.success') }}!</h2>
                            <p>{{ __('common.sub_msg') }}.</p>
                            <p>{{ __('common.thank_you') }}</p>
                            <a href="https://app.passify.info/login"
                                class="btn r-04 btn--theme last-link">{{ __('common.back_dashboard') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
