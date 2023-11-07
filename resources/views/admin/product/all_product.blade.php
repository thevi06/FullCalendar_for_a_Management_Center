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
<form action="">
    <div class="row mb-4">
        <div class="col-lg-12 ">
            <div class="card pb-4">
                <div class="card-header">
                    <h4 class="card-title">All Products</h4>
                </div>
                <div class="card-body">

                    <table id="product_table"
                        class="table table-bordered table-striped table-hover dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th class="bg-soft-info">Product Name</th>
                                <th class="bg-soft-info">LF Code</th>
                                <th class="bg-soft-info">Brand Part Number</th>
                                <th class="bg-soft-info">Brand</th>
                                <th class="bg-soft-info">Sector</th>
                                <th class="bg-soft-info">Sub Sector</th>
                                <th class="bg-soft-info">Product Family</th>
                                <th class="bg-soft-info">Buying Price</th>
                                <th class="bg-soft-info">Price Margin</th>
                                <th class="bg-soft-info">Selling Price</th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
</form>
@endsection
