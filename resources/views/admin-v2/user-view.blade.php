@extends('admin-v2.layouts.dashboard')
@section('title', 'User Details')
@section('content')

    <div class="pagetitle">
        <h1>User Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Users</a></li>
                <li class="breadcrumb-item active">User Details</li>
            </ol>
        </nav>
    </div>

    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Subscription
                                    History</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Sub
                                    Users</button>
                            </li>


                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Organization</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->organization_name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Organization Phone</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->organization_phone }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->phone }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Language</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->language == 'ara' ? 'Arabic' : 'English' }}
                                    </div>
                                </div>


                            </div>

                            <div class="tab-pane fade profile-overview pt-3" id="profile-edit">

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Plan Name</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->subscription->plan->plan_name ?? 'N/A' }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Plan Price</div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ $user->subscription ? $user->subscription->plan->price . ' ' . $user->subscription->plan->currency_symbol : 'N/A' }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Plan Renew</div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ $user->subscription ? \Carbon\Carbon::parse($user->subscription->expire_at)->format('Y-m-d h:i A') : 'N/A' }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Plan Type</div>
                                    <div class="col-lg-9 col-md-8 text-capitalize">
                                        {{ $user->subscription->plan->plan_type ?? 'N/A' }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Plan Activated</div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ $user->subscription ? \Carbon\Carbon::parse($user->subscription->created_at)->format('Y-m-d h:i A') : 'N/A' }}
                                    </div>
                                </div>


                            </div>

                            <div class="tab-pane fade pt-3" id="profile-settings">

                                <div class="col-lg-12">

                                    <div class="card recent-sales overflow-auto" style="padding-bottom:19px !important ">

                                        <div class="card-body">
                                            <h5 class="card-title">Sub Users ({{ count($user->children)}})</h5>
                                            <div class="table-responsive">

                                                <table class="table table-borderless datatable">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Phone</th>
                                                            <th scope="col">Created At</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($user->children as $user)
                                                            <tr>
                                                                <th scope="row">{{ $loop->iteration }}</th>
                                                                <td>{{ $user->name }}</td>
                                                                <td>
                                                                    {{ $user->phone }}
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

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection
