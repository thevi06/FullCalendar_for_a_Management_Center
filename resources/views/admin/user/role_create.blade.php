@extends('layouts.app')
@section('title')
    {{__('User Role Setup')}}
@endsection

@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create User Role</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Create User Role</li>
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

@section('add_role')
    active
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Create User Role</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" id="userRoleForm" action="{{route('role.store-role')}}">
                    @csrf
                    @include('admin.user.partials._role_form')
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $("#selectAll").click(function () {
                $("input[type=checkbox]").prop('checked', $(this).prop('checked'));

            });
        });
    </script>
@endsection
