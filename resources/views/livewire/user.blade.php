<div>
    <div class="card-header ui-sortable-handle" style="cursor: move;display: table-row;">
        <h3 class="card-title mt-3">
        <i class="fas fa-users-viewfinder mr-1"></i>
        Manage Users
        </h3>
        <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
                <li class="nav-item mr-1 mt-2">
                    <div class="container-fluid">
                          <input wire:model.live="query" class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
                      </div>
                    {{-- <button class="btn btn-sm btn-primary"  data-bs-toggle="modal" data-bs-target="#add_product_modal"><i class="fas fa-plus-circle"></i> Add New</button> --}}
                </li>

            </ul>
        </div>
    </div>

    <div class="card-body table-responsive ">
        <div class="row">
            {{-- wire:loading.remove.class="opacity-10" --}}
            {{-- wire:loading.class.remove="border border-warning" --}}
            <div class="col-md-6 text-info" style="border-right:2px solid rgb(223, 224, 225); " >
                <table class="table table-light mt-3">
                    <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          {{-- <th scope="col">Phone</th> --}}
                          {{-- <th scope="col">Role</th> --}}
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                            <tr wire:click="userDetail({{$user->id}})">
                                <td scope="col">{{$user['id']}}</td>
                                <td scope="col">{{$user->name}}</td>
                                <td scope="col">{{$user->email}}</td>
                                {{-- <td scope="col">{{$user->phone}}</td> --}}
                                {{-- <td scope="col">{{$user->role}}</td> --}}
                                <td scope="col"></td>
                            </tr>
                        @endforeach
                      </tbody>
                </table>
                {{ $users->links('vendor.pagination.custom') }}
            </div>
            
            <div class="col-md-6">
                <div class="text-center mb-1">
                    <div class="avatar-container" style="width: 70px; height: 70px; border-radius: 50%; overflow: hidden; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); margin: 0 auto; display: inline-block;">
                        <img src="{{URL::asset('admin/img/users/avatar.jpg')}}" alt="Profile Image" class="avatar-image" style=" width: 100%; height: 100%; object-fit: cover;">
                    </div>                
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" wire:model="name" name="name" placeholder="Name" value="{{$name}}" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label> Phone Number </label>
                        <input type="text" wire:model="phone" name="phone" placeholder="Phone Number" value="{{$phone}}" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Email </label>
                        <input type="text" wire:model="email" name="email" placeholder="Email" value="{{$email}}" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Organization Name </label>
                        <input type="text" wire:model="organization_name" name="organization_name" placeholder="Organization Name" value="{{$organization_name}}" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Organization Phone </label>
                        <input type="text" wire:model="organization_phone" name="organization_phone" placeholder="Organization Phone" value="{{$organization_phone}}" class="form-control" disabled>
                    </div>
                </div>
            </div>
        </div>
        
    </div>


    {{-- <button class="btn btn-sm btn-primary"  data-bs-toggle="modal" data-bs-target="#add_product_modal"><i class="fas fa-plus-circle"></i> Add New</button> --}}
    

    {{-- User Modal Start --}}
    <div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalLabel">Create User
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    
                </div>
                <form id ="UserForm" wire:submit.prevent="store" novalidate>
                    @csrf
                    <input type="text" name="id" placeholder="" class="form-control" hidden>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> Name </label>
                                    <input type="text" wire:model="name" name="name" placeholder="Name" class="form-control" required>
                                    <div class="invalid-feedback">Name is Required.</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> Email </label>
                                    <input type="email" wire:model="email" name="email" placeholder="Email" class="form-control" required>
                                    <div class="invalid-feedback">Email is Required</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> Phone Number </label>
                                    <input type="text" wire:model="phone" name="phone" placeholder="Phone Number" class="form-control" required>
                                    <div class="invalid-feedback">Phone Number is Required</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> Password. </label>
                                    <input type="text" wire:model="password" name="password" placeholder="Password." class="form-control" >
                                    <div class="invalid-feedback">Password is required.</div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between mt-3 ml-2">
                                <button type="button" class="btn btn-danger " wire:on="userCreated" data-bs-dismiss="modal">Close</button>
                                <b-button variant="primary" v-if="!load" class="btn-lg " disabled>
                                    <b-spinner small type="grow"></b-spinner>
                                </b-button>
                                <button type="submit"  class="btn btn-lg btn-primary  " id="User_save_btn">Save User</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- User Modal End --}}

</div>
