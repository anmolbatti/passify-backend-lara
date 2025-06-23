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

        <form action="{{ route('cst.update', $cst->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="anme">Name</label>
                <input type="text" name="name" id="" value="{{ $cst->name }}">
            </div>

            <div class="form-group">
                <label for="anme">Email</label>
                <input type="text" name="email" id="" value="{{ $cst->email }}">
            </div>


            <div class="form-group">
                <label for="anme">phone</label>
                <input type="text" name="phone" id="" value="{{ $cst->phone }}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>


        </form>

    </div>
@endsection
