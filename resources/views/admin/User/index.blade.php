@extends('admin.layouts.includes.app')
@section('title')
Users
@endsection

@section('content')

@section('page-header')
<!-- PAGE HEADER -->
<div class="page-header mt-5-7">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">Users</h4>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fa-solid fa-chart-tree-map mr-2 fs-12"></i>Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#"> Users</a></li>
        </ol>
    </div>
</div>
<!-- END PAGE HEADER -->
@endsection
<div class="card">
    <livewire:user />
</div>
</div>
@livewireScripts
@endsection