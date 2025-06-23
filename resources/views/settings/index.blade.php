@extends('layouts.user-dashboard')
@section('content')
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>{{ __('Settings') }}</h2>

            </div>




        </div>

        <div class="container">
            <div class="text-center">
                <div class="tabs d-flex justify-content-center">

                    <ul class="nav nav-pills gap-4" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <div class="nav-link active settings-btn" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true">
                                <div class="tab-link-ico">{{ __('Account') }}</div>
                            </div>
                        </li>
                        <li class="nav-item" role="presentation">
                            <div class="nav-link settings-btn" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#profile-tab-pane" role="tab" aria-controls="profile-tab-pane"
                                aria-selected="false">
                                <i class="fas fa-user"></i>{{ __('Profile') }} 
                            </div>
                        </li>
                        <li class="nav-item" role="presentation">
                            <div class="nav-link settings-btn" id="contact-tab" data-bs-toggle="tab"
                                data-bs-target="#contact-tab-pane" type="button" role="tab"
                                aria-controls="contact-tab-pane" aria-selected="false">
                                <i class="fas fa-envelope"></i>{{ __('Contact') }} 
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

                <div class="tab-content p-5" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                        tabindex="0">
                        <div class="container">
                            <form action="#" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="org">{{ __('Organisation Name') }}</label>
                                    <input type="text" name="org_name" id="org" class="form-control w-75">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                        tabindex="0">.2.</div>
                    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                        tabindex="0">.3.</div>

                </div>
            </div>
        </div>

    </section>
@endsection
@push('style')
    <style>
        #myTab .active {
            color: #fff !important;
            border-color: #f74780 !important;
            background-color: #f74780 !important;
        }
    </style>
@endpush
