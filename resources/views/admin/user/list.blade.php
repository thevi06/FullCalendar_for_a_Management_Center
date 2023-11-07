@extends('layouts.app')
@section('title')
    {{__('All Users')}}
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
                    <h1 class="m-0">All Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">All Users</li>
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

@section('all_user')
    active
@endsection

@section('content')
    @can('user-view')

        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">All users list</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @include('admin.user.partials._table')
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
    <script src="{{url('assets/js/admin/user.js')}}"></script>
@endsection
