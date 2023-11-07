@extends('layouts.app')

@section('title')


@section('breadcrumb')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection

@section('dashboard')
active
@endsection

@section('content')
<div class="row mb-4">
    <div class="col-lg-1"></div>
    <div class="col-lg-12 ">
        <div class="card pb-4">
            <div class="card-header">
                <h4 class="card-title">All Tender</h4>
            </div>
            <div class="card-body">
                <!-- File Upload -->
                <div class="col-lg-6">
                    <div>
                        <div class="mb-3">
                            <label class="form-label" for="image">Product
                                Image</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                    </div>
                </div>
                <br><br>
                <!-- End  -->

                <table id="order_list_table"
                    class="table table-bordered table-striped table-hover dt-responsive  nowrap w-100">
                    <thead>
                        <tr>
                            <th class="bg-soft-info">items</th>
                            <th class="bg-soft-info">Code Date</th>
                            <th class="bg-soft-info">Competitors </th>
                            <th class="bg-soft-info">Pricing</th>
                            <th class="bg-soft-info">Tender Status</th>
                            <!-- <th class="bg-soft-info">Action</th> -->
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-1"></div>
</div>
@endsection
