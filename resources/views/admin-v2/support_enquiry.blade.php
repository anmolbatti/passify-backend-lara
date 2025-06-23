@extends('admin-v2.layouts.dashboard')
@section('title', 'Support Enquires')
@section('content')

    <div class="pagetitle">
        <h1>Support Enquires</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Support Enquires</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">

                            <h5 class="card-title">Support Enquires

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
                                        <th scope="col">Subject</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Created_at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($enquiries as $enquiry)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ !is_null($enquiry->name) ? $enquiry->name : 'N/a' }}
                                            </td>

                                            <td>
                                                {{ !is_null($enquiry->email) ? $enquiry->email : 'N/a' }}
                                            </td>
                                            <td>
                                                {{ !is_null($enquiry->subject) ? $enquiry->subject : 'N/a' }}
                                            </td>
                                            <td>
                                                {{ !is_null($enquiry->message) ? $enquiry->message : 'N/a' }}
                                            </td>

                                            <td>
                                                {{ $enquiry->created_at->format('Y-m-d h:i A') }}
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
