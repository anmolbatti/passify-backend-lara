@extends('layouts.user-dashboard')
@section('content')
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>{{ __('Sub Users') }}</h2>
            </div>
{{--
            <div class="container text-center d-flex justify-content-center align-center">
                <div class="row">

                    <div class="col-lg-3 col-md-6 card p-3 br-20 overview-card pink-border">
                        <div class="count-box">
                            <i class="bi bi-emoji-smile"></i>
                            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>{{ __('Happy Clients') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0 card p-3 br-20 overview-card pink-border">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext"></i>
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>{{ __('Installs to Wallet') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 card p-3 br-20 overview-card pink-border">
                        <div class="count-box">
                            <i class="bi bi-trash"></i>
                            <span data-purecounter-start="0" data-purecounter-end="14" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>{{ __('Uninstalled from Wallet') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 card p-3 br-20 overview-card pink-border">
                        <div class="count-box">
                            <i class='bx bxs-user-x'></i>
                            <span data-purecounter-start="0" data-purecounter-end="25" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>{{ __('Deleted Members') }}</p>
                        </div>
                    </div>

                </div>
            </div> --}}

            <section class="section">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                {{-- <h5 class="card-title">{{ __('Sub Users') }}</h5> --}}
                                <div class="m-3 overview-create-btn">
                                    <a class="btn btn--theme" href="{{ route('subusers.create') }}">{{ __('Create') }}</a>
                                </div>
                                <div class="table-responsive mt-5">

                                    <table id="overviewTable" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Email') }}</th>
                                                <th>{{ __('Phone') }}</th>
                                                <th>{{ __('Created at') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->phone }}</td>

                                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                                    <td><a href="{{ route('subuser.edit', $user->id) }}"
                                                            class="btn btn-primary">{{ __('Edit') }}</a>
                                                        <a href="{{ route('subuser.delete', $user->id) }}"
                                                            class="btn btn-danger">{{ __('Delete') }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>


                                    </table>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
            </section>




        </div>
    </section>

@php
    $start = __('start_value'); // Replace 'start_value' with the translation key for the start value
    $end = __('end_value'); // Replace 'end_value' with the translation key for the end value
@endphp

@endsection
