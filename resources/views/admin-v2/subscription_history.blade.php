@extends('admin-v2.layouts.dashboard')
@section('title', 'Subscription History')
@section('content')

    <div class="pagetitle">
        <h1>Subscription History</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Subscription History</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">

                            <h5 class="card-title">Subscription History

                            </h5>
                        </div>
                        <!-- Table with stripped rows -->
                        <div class="table-responsive">

                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Plan Name</th>
                                        <th scope="col">Plan Type</th>
                                        <th scope="col">Subscribed on</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($histories as $history)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $history->user->name ?? 'Na' }}
                                            </td>
                                            <td>
                                                {{ $history->user->email ?? 'Na' }}
                                            </td>
                                            <td>
                                                {{ $history->plan->plan_name ?? 'Na' }}
                                            </td>
                                            <td>
                                                {{ $history->plan->plan_type }}
                                            </td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($history->expire_at)->format('Y-m-d h:i A') ?? 'N/A' }}
                                            </td>

                                        </tr>
                                    @empty
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection
