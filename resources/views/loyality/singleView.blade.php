@extends('layouts.user-dashboard')
@section('content')
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>{{ __('Overview') }}</h2>
            </div>

            <div class="container text-center d-flex justify-content-center align-center">
                <div class="row">

                    <div class="col-lg-3 col-md-6 card p-3 br-20 overview-card pink-border">
                        <div class="count-box">
                            <i class="bi bi-emoji-smile"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $passUsers->count() }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>{{ __('Customers Signed Up') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0 card p-3 br-20 overview-card pink-border">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $installs_to_wallet }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>{{ __('Installs to Wallet') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 card p-3 br-20 overview-card pink-border">
                        <div class="count-box">
                            <i class="bi bi-trash"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $Uninstalled_from_wallet }}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>{{ __('Uninstalled from Wallet') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 card p-3 br-20 overview-card pink-border">
                        <div class="count-box">
                            <i class='bx bxs-user-x'></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{$Rewards_redeemed}}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>{{ __('Rewards Redeemed') }}</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-bolder">{{ __('Latest Transactions') }}</h5>

                            <div class="table-responsive mt-5">

                                <table id="overviewTable" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('Date and Time') }}</th>
                                            <th>{{ __('Customer') }}</th>
                                            <th>{{ __('Event') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($passUsers as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ __('Signup') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>


                                </table>
                            </div>


                        </div>
                    </div>

                </div>
                <div class="col-md-4">


                    <div
                        class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-end px-4 pt-4">
                            <button id="dropdownButton" data-dropdown-toggle="dropdown"
                                class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                                type="button">
                                <span class="sr-only">{{ __('Open dropdown') }}</span>
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 16 3">
                                    <path
                                        d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdown"
                                class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2" aria-labelledby="dropdownButton">
                                    <li>
                                        <a id="route" href="{{ route('install.card',['id'=>$id]) }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">{{ __('Open') }}</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="flex flex-col items-center pb-10">
                            <div class="text-center fw-bolder m-3">
                                {{ __('Your Card URL') }}:
                            </div>

                            <div class="qrcode mb-5" id="qrcode_gen">

                            </div>

                        </div>
                    </div>

                </div>
            </div>







        </div>
    </section>
@endsection


@push('script')
    <script>
        var qrcode = new QRCode(document.getElementById("qrcode_gen"), {
            text: document.getElementById('route').href,
            width: 140,
            height: 140,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
    </script>
@endpush
