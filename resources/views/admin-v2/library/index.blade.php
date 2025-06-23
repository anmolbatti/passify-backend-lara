@extends('admin-v2.layouts.dashboard')
@section('title', 'Manage Plans')
@section('content')

    <div class="pagetitle">
        <h1>Manage Library</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Manage Library</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">

                            <h5 class="card-title">Library Management

                            </h5>
                            {{-- <a href="#" class="btn btn-primary h-25 mt-3">Create</a> --}}
                            <x-primary-button class="h-25 bg-primary mt-3 navigate">Create</x-primary-button>
                        </div>
                        <!-- Table with stripped rows -->

                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>



@endsection

@push('script')
    <script>
        $(() => {
            
        })
    </script>
@endpush
