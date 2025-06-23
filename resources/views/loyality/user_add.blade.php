@extends('layouts.user-dashboard')
@section('content')
    <div class="container p-5">
        <div class="p-5">
            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul class="p-0 m-0" style="list-style: none;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>



        <div class="max-w-[600px] mx-auto">
            <form action="{{ route('subuser.store') }}" method="post">
                @csrf
                <div class="form-group mb-2">
                    <label for="name" class="form-label fw-bold">{{__("Name")}}</label>
                    <input type="text" class="form-control rounded-3 rounded-3" name="name" id="name">
                </div>
    
                <div class="form-group mb-2">
                    <label for="email" class="form-label fw-bold">{{__("Email")}}</label>
                    <input type="text" class="form-control rounded-3" name="email" id="email">
                </div>
    
                <div class="form-group mb-2">
                    <label for="phone" class="form-label fw-bold">{{__("Phone")}}</label>
                    <input type="text" class="form-control rounded-3" name="phone" id="phone">
                </div>
    
                <div class="form-group mb-2">
                    <label for="password" class="form-label fw-bold">{{__("Password")}}</label>
                    <input type="password" class="form-control rounded-3" name="password" id="password">
                </div>
    
                <div class="form-group mb-2">
                    <label for="passwordConfirm" class="form-label fw-bold">{{__("Password Confirmation")}}</label>
                    <input type="password" class="form-control rounded-3" name="password_confirmation" id="passwordConfirm">
                </div>
    
                <div class="form-group mb-2">
                    <button type="submit" class="btn btn-outline-danger">{{__("Submit")}}</button>
                </div>
            </form>
        </div>




    </div>
@endsection
