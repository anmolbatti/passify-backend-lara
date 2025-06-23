@extends('layouts.dashboard')
@section('content')
    <!-- CONTACTS-1
                                               ============================================= -->
    <section id="contacts-1" class="pb-50 inner-page-hero contacts-section division">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="section-title text-center mb-80">

                        <!-- Title -->
                        <h2 class="s-52 w-700"> {{ __('contact.title') }}</h2>

                        <!-- Text -->
                        <p class="p-lg">{{ __('contact.description') }}
                        </p>

                    </div>
                </div>
            </div>


            <!-- CONTACT FORM -->
            <div class="row justify-content-center">
                <div class="col-md-11 col-lg-10 col-xl-8">
                    <div class="form-holder">
                        <form name="contactform" class="row contact-form" data-lang="{{ app()->getLocale() }}">

                            <!-- Form Select -->
                            <div class="col-md-12 input-subject">
                                <p class="p-lg">{{ __('contact.question') }}: </p>
                                <span>{{ __('contact.topic') }}: </span>
                                <select class="form-select subject" aria-label="Default select example">
                                    <option value="" selected>{{ __('contact.question') }}...</option>
                                    <option value="Registering/Authorising">{{ __('contact.reg') }}</option>
                                    <option value="Using Application">{{ __('contact.using') }}</option>
                                    <option value="Troubleshooting">{{ __('contact.troubleshoot') }}</option>
                                    <option value="Backup/Restore">{{ __('contact.backup') }}</option>
                                    <option value="Other">{{ __('contact.other') }}</option>
                                </select>
                            </div>

                            <!-- Contact Form Input -->
                            <div class="col-md-12">
                                <p class="p-lg">{{ __('contact.name') }}: </p>
                                <span>{{ __('contact.real_name') }}: </span>
                                <input type="text" name="name" class="form-control name"
                                    placeholder="{{ __('contact.name') }}*">
                            </div>

                            <div class="col-md-12">
                                <p class="p-lg">{{ __('contact.email') }}: </p>
                                <span>{{ __('contact.email_des') }}</span>
                                <input type="text" name="email" class="form-control email"
                                    placeholder="{{ __('contact.email_address') }}*">
                            </div>

                            <div class="col-md-12">
                                <p class="p-lg">{{ __('contact.details') }}: </p>
                                <span>{{ __('contact.version') }}</span>
                                <textarea class="form-control message" name="message" rows="6" placeholder="{{ __('contact.i_have') }}..."></textarea>
                            </div>

                            <!-- Contact Form Button -->
                            <div class="col-md-12 mt-15 form-btn text-right">
                                <button type="submit"
                                    class="btn btn--theme hover--theme submit" id="support_submit">{{ __('contact.submit') }}</button>
                            </div>

                            <div class="contact-form-notice">
                                <p class="p-sm">{{ __('contact.paragraph') }} <a
                                        href="{{ route('privacy') }}">{{ __('contact.privacy_policy') }}</a>.
                                </p>
                            </div>

                            <!-- Contact Form Message -->
                            <div class="col-lg-12 contact-form-msg">
                                <span class="loading"></span>
                            </div>

                        </form>
                    </div>
                </div>
            </div> <!-- END CONTACT FORM -->


        </div> <!-- End container -->
    </section> <!-- END CONTACTS-1 -->
@endsection

@push('js')
    <script src="{{ asset('js/contact-form.js') }}"></script>
@endpush
