@extends('layouts.user-dashboard')
@section('content')
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>{{ __('Start With Our Predefined Templates') }}</h2>
            </div>

        </div>

        <div class="center-line d-flex align-items-center">
            <div class="line"></div>
            <div class="h3 fw-bolder text-center" style="color: #45505b" data-aos="fade-down">{{ __('CHOOSE YOUR STYLE') }}</div>
            <div class="line"></div>

        </div>

        <div class="container strat-container d-flex justify-content-center gap-3 h-max bg-red-50" data-aos="fade-up">
            <div class="flex gap-2 flex-wrap items-start" id="apple_div">
            @foreach ($passes as $pass)
            <div class="flex flex-col items-center">
                <h1>{{ $pass->pass_name }}</h1>
                <div class="relative border-gray-800 dark:border-gray-800 bg-gray-800 border-[14px] rounded-[2.5rem] h-[600px] w-[300px] shadow-xl scale-[0.8]">
                    <div
                        class="w-[148px] h-[18px] bg-gray-800 top-0 rounded-b-[1rem] left-1/2 -translate-x-1/2 absolute">
                    </div>
                    <div class="h-[46px] w-[3px] bg-gray-800 absolute -start-[17px] top-[124px] rounded-s-lg"></div>
                    <div class="h-[46px] w-[3px] bg-gray-800 absolute -start-[17px] top-[178px] rounded-s-lg"></div>
                    <div class="h-[64px] w-[3px] bg-gray-800 absolute -end-[17px] top-[142px] rounded-e-lg"></div>
                    <div class="rounded-[2rem] overflow-hidden w-[272px] h-[572px] bg-white dark:bg-gray-800">

                        <a href="{{ route('loyality.start_design', $pass->pass_name) }}">
                        @include('design_containers.cofee_dashboard');
                        </a>

                    </div>
                </div>
            </div>
            @endforeach
            </div>
            {{-- <div class="start-images-mob">
                <a href="{{route('loyality.create', 'coffee')}}">
                    <img src="{{ asset('user-dashboard/img/cafe.png') }}" alt="cafe" class="img-fluid">
                    <p class="text-center m-2">COFFEE SHOP</p>
                </a>
            </div>
            <div class="start-images-mob">
                <a href="#">
                    <img src="{{ asset('user-dashboard/img/food.png') }}" alt="food" class="img-fluid">
                    <p class="text-center m-2">HEALTHY FOOD</p>

                </a>

            </div>
            <div class="start-images-mob">
                <a href="#">
                    <img src="{{ asset('user-dashboard/img/shop.png') }}" alt="shop" class="img-fluid">
                    <p class="text-center m-2">LOUNGE</p>

                </a>
            </div>
            <div class="start-images-mob">
                <a href="#">
                    <img src="{{ asset('user-dashboard/img/spa.png') }}" alt="spa" class="img-fluid">
                    <p class="text-center m-2">SPA</p>

                </a>
            </div> --}}


        </div>



    </section>
@endsection
