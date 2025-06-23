@extends('admin-v2.layouts.dashboard')
@section('title', 'Manage Plans')
@section('content')

    <div class="pagetitle">
        <h1>Manage Plans</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Manage Plans</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">

                            <h5 class="card-title">Plan Management

                            </h5>
                            {{-- <a href="#" class="btn btn-primary h-25 mt-3">Create</a> --}}
                            <x-primary-button class="h-25 bg-primary mt-3 create_plan">Create</x-primary-button>
                        </div>
                        <!-- Table with stripped rows -->
                        <div class="table-responsive">

                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Location Count</th>
                                        <th scope="col">Sub Users Count</th>
                                        <th scope="col">Notification Users</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plans as $plan)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $plan->plan_name }}</td>
                                            <td>{{ $plan->price . ' ' . $plan->currency_symbol }}</td>
                                            <td>{{ $plan->plan_type }}</td>
                                            <td>{{ $plan->location_count }}</td>
                                            <td>{{ $plan->user_count }}</td>
                                            <td>{{ $plan->notification_users_count }}</td>

                                            @if ($plan->status == 1)
                                                <td><span class="badge bg-success">Active</span></td>
                                            @elseif ($plan->status == 0)
                                                <td><span class="badge bg-warning">In active</span></td>
                                            @endif
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a class="text-primary" style="cursor: pointer"
                                                        href="{{ route('admin.plan.edit', $plan->id) }}"
                                                        onclick="editPlan(this)"><i class="bi bi-pencil-fill"></i></a>
                                                    @if ($plan->status == 1)
                                                        <span class="text-danger" style="cursor: pointer"
                                                            onclick="changeStatus({{ $plan->id }}, 'reject')"><i
                                                                class="ri-close-circle-line"></i></span>
                                                    @elseif ($plan->status == 0)
                                                        <span class="text-success" style="cursor: pointer"
                                                            onclick="changeStatus({{ $plan->id }}, 'approve')"><i
                                                                class="bi bi-check-circle"></i></span>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="PlanCreate" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Create A Plan</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container" id="result">
                <form action="{{ route('admin.plans.store') }}" method="post" onsubmit="savePlan(this)">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Name*</label>
                        <input type="text" id="name" placeholder="Plan Name" name="name" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="price">Price*</label>
                        <input type="number" id="price" placeholder="Price" name="price" class="form-control"
                            min="0">
                    </div>

                    <div class="form-group mb-3">
                        <label for="plan">Plan Type*</label>
                        <select name="plan_type" class="form-control" id="plan">
                            <option value="monthly">Monthly</option>
                            <option value="annual">Annual</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="trial">Trial Period*</label>
                        <input type="number" id="trial" placeholder="Trial Period In Days" name="trial_period_in_days"
                            class="form-control" min="0">
                    </div>

                    <div class="form-group mb-3">
                        <label for="design">Card Design Count*</label>
                        <input type="number" id="design" placeholder="Card Design Count" name="card_design_count"
                            class="form-control" min="0">
                    </div>

                    <div class="form-group mb-3">
                        <label for="location">Location Count*</label>
                        <input type="number" id="location" placeholder="Location Count" name="location_count"
                            class="form-control" min="0">
                    </div>

                    <div class="form-group mb-3">
                        <label for="subuser">Sub-user Count*</label>
                        <input type="number" id="subuser" placeholder="Sub User Count" name="sub_user_count"
                            class="form-control" min="0">
                    </div>

                    <div class="form-group mb-3">
                        <label for="location">Notification User Count*</label>
                        <input type="number" id="location" placeholder="Notification User Count"
                            name="notification_user_count" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="plan">Exportable*</label>
                        <select name="exportable" class="form-control" id="exportable">
                            <option value="true">Yes</option>
                            <option value="false">No</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="plan">Status*</label>
                        <select name="status" class="form-control" id="Status">
                            <option value="1">Active</option>
                            <option value="0">In-active</option>
                        </select>
                    </div>

                    <x-primary-button class="h-25 bg-primary mt-3">Save</x-primary-button>

                </form>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="PlanUpdate" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Update Plan</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container" id="update_result">

            </div>
        </div>
    </div>


@endsection

@push('script')
    <script>
        const changeStatus = async (id, action) => {
            let btnText = action == 'approve' ? 'Yes, Enable It' : 'Yes, Disable It';
            let successText = action == 'approve' ? 'Plan has been Enabled.' : 'Plan has been Disabled.';
            Swal.fire({
                title: 'Are you sure?',
                text: "You can be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: `${btnText}`
            }).then(async (result) => {
                if (result.isConfirmed) {
                    let url = "/admin/plans/status/update/" + id
                    const res = await $.post(`${url}`, {
                        status: action,
                        _method: 'PATCH',
                    });

                    Swal.fire(
                        'Success',
                        `${successText}`,
                        'success'
                    )
                    location.reload()


                }
            })
        }

        $(".create_plan").on("click", function() {
            $("#PlanCreate").offcanvas('show');
        })

        const savePlan = async (form) => {
            try {
                event.preventDefault();
                let data = $(form).serialize();

                let url = form.action;

                const res = await $.post(`${url}`, data);

                if (res.status) {

                    Swal.fire(
                        'Success',
                        `${res.message}`,
                        'success'
                    )
                }
                $(form)[0].reset();
                location.reload()

            } catch (error) {
                console.log(error);
                if (error.status === 422) {
                    let msg = error.responseJSON.message;
                    showError(msg);
                }
            }
        }

        const editPlan = async (btn) => {
            try {
                event.preventDefault();
                let href = btn.href;

                const res = await $.get(`${btn}`);

                $("#update_result").html(' ')
                $("#update_result").html(res.data)
                $("#PlanUpdate").offcanvas('show')

            } catch (error) {
                console.log(error);
            }
        }
    </script>
@endpush
