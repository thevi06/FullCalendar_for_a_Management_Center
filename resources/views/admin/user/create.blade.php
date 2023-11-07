@extends('layouts.app')
@section('title')
    {{__('User Setup')}}
@endsection

@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Create</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">User Create</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('user_manage_list')
    menu-is-opening menu-open
@endsection

@section('user_manage')
    active
@endsection

@section('create_user')
    active
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Create User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" id="userForm" action="{{route('users.store-user')}}">
                    @csrf
                    @include('admin.user.partials._user_form')
                </form>
            </div>
        </div>
    </div>
@endsection
