@extends('admin-v2.layouts.dashboard')
@section('title', 'Dashboard')
@section('content')

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card revenue-card">


                            <div class="card-body">
                                <h5 class="card-title">Users</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class=" ri-user-3-line"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $count['users'] }}</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Passes</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class=" ri-account-pin-box-line"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $count['passes'] }}</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-3 col-xl-12">

                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title">Enquires</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $count['enquiry'] }}</h6>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                    <div class="col-xxl-3 col-xl-12">

                        <div class="card info-card ref-card">

                            <div class="card-body">
                                <h5 class="card-title">All Pass Installs</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class=" ri-links-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $count['passUsers'] }}</h6>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>



            <!-- Left side columns -->
            <div class="row">

                <div class="col-lg-8">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Reports</h5>

                            <!-- Line Chart -->
                            <div id="reportsChart"></div>
                            <!-- End Line Chart -->

                        </div>

                    </div>


                </div><!-- End Left side columns -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pie Chart</h5>

                            <!-- Pie Chart -->
                            <canvas id="pieChart" style="max-height: 400px;"></canvas>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">

                <div class="col-lg-8">

                    <div class="card recent-sales overflow-auto" style="padding-bottom:19px !important ">

                        <div class="card-body">
                            <h5 class="card-title">Recent Users</h5>
                            <div class="table-responsive">

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Organization</th>
                                            <th scope="col">Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ is_null($user->organization_name) ? 'NA' : $user->organization_name }}
                                                </td>
                                                <td>{{ $user->created_at->diffforHumans() }}</td>
                                            </tr>
                                        @empty
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!-- Right side columns -->
            {{-- <div class="col-lg-4">

                <!-- Recent Activity -->
                <div class="card">


                    <div class="card-body">
                        <h5 class="card-title">Recent Lawyers</h5>

                        <div class="news">
                            @forelse ($users as $user)
                                <div class="post-item clearfix">
                                    <img src="{{ asset('assets/img/default_user.png') }}" alt="">
                                    <h4><a href="#">{{ $user->name }}</a></h4>
                                </div>
                            @empty
                                <div class="post-item clearfix">
                                    <div class="text-center">
                                        No Data Found !
                                    </div>
                                </div>
                            @endforelse


                        </div>

                    </div>
                </div><!-- End Recent Activity -->
                <div style="margin-top: 35px; !important"></div>
                <div class="card">


                    <div class="card-body">
                        <h5 class="card-title">Recent Customers</h5>

                        <div class="news">
                            @forelse ($customers as $user)
                                <div class="post-item clearfix">
                                    <img src="{{ asset('assets/img/default_user.png') }}" alt="">
                                    <h4><a href="#">{{ $user->name }}</a></h4>
                                </div>
                            @empty
                                <div class="post-item clearfix">
                                    <div class="text-center">
                                        No Data Found !
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>



                </div><!-- End Right side columns -->

            </div> --}}
    </section>
@endsection

@push('style')
    <style>
        .datatable-dropdown {
            display: none;
        }
    </style>
@endpush
<script>
    let months = "{{ implode(',', $months) }}";
    let users = "{{ implode(',', $chartData['users']) }}";
    let passaInstalls = "{{ implode(',', $chartData['passInstalls']) }}";
    months = months.split(",");
    users = users.split(",");
    installs = passaInstalls.split(",")

    let usersCount = "{{ $count['users'] }}";
    let passUser = "{{ $count['passUsers'] }}";
    let pass = "{{ $count['passes'] }}";

    document.addEventListener("DOMContentLoaded", () => {
        new ApexCharts(document.querySelector("#reportsChart"), {
            series: [{
                name: 'users',
                data: users
            }, {

                name: 'Pass Installs',
                data: installs
            }],
            chart: {
                height: 311,
                type: 'area',
                toolbar: {
                    show: false
                },
            },
            markers: {
                size: 4
            },
            colors: ['#4154f1', '#2eca6a', '#ff771d'],
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.3,
                    opacityTo: 0.4,
                    stops: [0, 90, 100]
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 2
            },
            xaxis: {
                type: 'string',
                categories: months
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            }
        }).render();
    });

    document.addEventListener("DOMContentLoaded", () => {
        new Chart(document.querySelector('#pieChart'), {
            type: 'pie',
            data: {
                labels: [
                    'Users',
                    'Passes',
                    'Pass Installs'
                ],
                datasets: [{
                    data: [usersCount, pass, passUser],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            }
        });
    });
</script>
