@extends('layouts.play-ground')
@section('content')
    <section id="services" class="services">
        <div class="container-fluid p-0" data-aos="fade-up">
            {{-- design navigation --}}
            @include('loyality.design_navigation')

            <div class="container ml-0 h-[85vh] mt-1">
                <div class="d-flex gap-[13px] relative " id="apple_div">
                    <!-- {{-- content page --}} -->
                    @include('loyality.content_page')

                    <!-- {{-- phone --}} -->
                </div>
            </div>
        </div>
    </section>

@endsection

@push('script')
    <script src="{{ asset('js/tab_navigation_script.js') }}"></script>
    <script src="{{ asset('js/card_layout_script.js') }}"></script>
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=scrollIntoView"></script>

@endpush
