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
    <div class="col-lg-1"></div>
    <div class="col-lg-10 ">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-10">
                        <h4 class="card-title">Product Mapping</h4>
                        <p class="card-title-desc">Product mapping</p>
                    </div>
                    <div class="col-lg-2">
                        <a class="btn btn-info float-end" href="{{route('admin.product-list')}}">Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-4">
                <form method="post" enctype="multipart/form-data" id="productForm"
                    action="{{route('admin.product-update', $product->id)}}">
                    @csrf
                    @method('put')
                    <div class="row ">
                        <div class="col-lg-6">
                            <div>
                                <div class="mb-3">
                                    <label class="form-label" for="lfCode">Part Number (LF
                                        Code)</label>
                                    <input type="text" class="form-control" id="lfCode" name="lfCode"
                                        @if(isset($product)) value="{{$product->lfCode}}" @endif required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <div class="mb-3">
                                    <label class="form-label" for="image">Product
                                        Image</label>
                                    <input type="file" class="form-control" id="image" name="image" @if(isset($product))
                                        value="{{$product->image}}" @endif>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <img src="{{$product->imageUrl}}" style="width: 50%;">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-6">
                            <div>
                                <div class="mb-3">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" @if(isset($product))
                                        value="{{$product->name}}" @endif required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <div class="mb-3">
                                    <label class="form-label" for="brandPartNumber">Brand Part
                                        Number</label>
                                    <input type="text" class="form-control" id="brandPartNumber" name="brandPartNumber"
                                        @if(isset($product)) value="{{$product->brandPartNumber}}" @endif required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-6">
                            <div>
                                <div class="mb-3">
                                    <label class="form-label" for="buyingPrice">Buying Price</label>
                                    <input type="number" class="form-control" id="buyingPrice" name="buyingPrice"
                                        @if(isset($product)) value="{{$product->buyingPrice}}" @endif required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <div class="mb-3">
                                    <label class="form-label" for="priceMargin">Price Margin
                                        (Percentage)</label>
                                    <input type="number" class="form-control" id="priceMargin" name="priceMargin"
                                        @if(isset($product)) value="{{$product->priceMargin}}" @endif required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">

                        <div class="col-lg-12">
                            <div>
                                <div class="mb-3">
                                    <label class="form-label" for="sellingPrice">Selling
                                        Price</label>
                                    <input type="text" class="form-control" id="sellingPrice" name="sellingPrice"
                                        @if(isset($product)) value="{{$product->sellingPrice}}" @endif readonly>
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
