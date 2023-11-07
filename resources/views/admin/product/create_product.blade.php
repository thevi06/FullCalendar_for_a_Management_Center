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
<div class="row">
    <div class="col-lg-12 ">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Product</h4>
                <p class="card-title-desc">Create new product here.</p>
            </div>
            <div class="card-body p-4">
                <form method="post" enctype="multipart/form-data" id="productForm"
                    action="">
                    @csrf
                    <div class="row ">
                        <div class="col-lg-6">
                            <div>
                                <div class="mb-3">
                                    <label class="form-label" for="lfCode">Product Number</label>
                                    <input type="text" class="form-control" id="lfCode" name="lfCode" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <div class="mb-3">
                                    <label class="form-label" for="name">Product Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row ">
                        <div class="col-lg-6">
                            <div>
                                <div class="mb-3">
                                    <label class="form-label" for="Pdf">Product
                                        file</label>
                                    <input type="file" class="form-control" id="pdf" name="pdr" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <div class="mb-3">
                                    <label class="form-label" for="brandPartNumber">Brand Number
                                    </label>
                                    <input type="text" class="form-control" id="brandPartNumber" name="brandPartNumber"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 mb-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-1"></div>
    <div class="col-lg-1"></div>
</div>

@endsection
