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
                <h4 class="card-title">Tender Evaluation</h4>
            </div>
            <div class="card-body">

                <form>
                    <div class="row ">
                        <div class="col-lg-6">
                            <div>
                                <div class="mb-3">
                                    <label class="form-label" for="lfCode">Tender Number</label>
                                    <input type="text" class="form-control" id="lfCode" name="lfCode" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <div class="mb-3">
                                    <label class="form-label" for="brandPartNumber">SR Number</label>
                                    <input type="text" class="form-control" id="brandPartNumber" name="brandPartNumber"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="dateOfBirth">Date</label>
                                <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth"
                                    @if(isset($customer)) value="{{$customer->dateOfBirth}}" @endif required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <div class="mb-3">
                                    <label class="form-label" for="name">Item</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Item-01</option>
                                        <option>Item-02</option>
                                        <option>Item-03</option>
                                        <option>Item-04</option>
                                        <option>Item-05</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-6">
                            <div>
                                <div class="mb-3">
                                    <label class="form-label" for="name">Quantity</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <div class="mb-3">
                                    <label class="form-label" for="brandPartNumber">Item code</label>
                                    <input type="text" class="form-control" id="brandPartNumber" name="brandPartNumber"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-6">
                            <div>
                                <div class="mb-3">
                                    <label class="form-label" for="name">Company</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Yaden International (Pvt)Ltd</option>
                                        <option>Yaden laboratories (Pvt)Ltd</option>
                                        <option>EuroChem biotech(Pvt)Ltd</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 mb-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>

                    <table id="order_list_table"
                        class="table table-bordered table-striped table-hover dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th class="bg-soft-info">items</th>
                                <th class="bg-soft-info">Code Date</th>
                                <th class="bg-soft-info">Competitors </th>
                                <th class="bg-soft-info">Pricing</th>
                                <th class="bg-soft-info">Tender Status</th>
                                <th class="bg-soft-info">Action</th>
                            </tr>
                        </thead>
                    </table>
            </div>
            </form>
            <br><br><br>
        </div>
    </div>
</div>
<div class="col-lg-1"></div>
@endsection
