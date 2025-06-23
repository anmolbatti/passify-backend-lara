@extends('layouts.user-dashboard')
@section('content')
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>design your card</h2>
            </div>

        </div>

        <div class="center-line d-flex align-items-center">
            <div class="line"></div>
            <div class="h3 fw-bolder text-center" style="color: #904003" data-aos="fade-down">CAFE TEMPLATE</div>
            <div class="line"></div>

        </div>

        <div class="container strat-container d-flex justify-content-center gap-3" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-4">

                    <div class="start-images-mob w-50">
                        <a href="{{ route('loyality.start_design', 'coffee') }}">
                            <img src="{{ asset('user-dashboard/img/cafe.png') }}" alt="cafe" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="start-images-mob w-50">
                        <a href="#">
                            <img src="{{ asset('user-dashboard/img/cafe2.png') }}" alt="food" class="img-fluid">

                        </a>

                    </div>

                </div>

                <div class="col-lg-4">
                    <div class="start-images-mob w-50">
                        <a href="#">
                            <img src="{{ asset('user-dashboard/img/plain.png') }}" alt="food" class="img-fluid">

                        </a>

                    </div>

                </div>


            </div>



        </div>



    </section>
@endsection
