@extends('layouts.app')

@section('title')
    {{__('User Role')}}
@endsection

@section('datatable_style')
    @include('partials.datatable_styles')
@endsection

@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Roles</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">User Roles</li>
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

@section('role_list')
    active
@endsection

@section('content')
    @can('role-view')

        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">All user role list with their permissions</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="user_role_table"
                               class="table table-bordered table-striped table-hover dt-responsive  nowrap w-100">
                            <thead>
                            <tr>
                                <th class="bg-soft-info">Role Name</th>
                                <th class="bg-soft-info">Permissions</th>
                                <th class="bg-soft-info">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    @endcan
@endsection

@section('datatable_script')
    @include('partials.datatable_script')
@endsection

@section('scripts')
    <script src="{{url('assets/js/admin/user_role.js')}}"></script>
@endsection
