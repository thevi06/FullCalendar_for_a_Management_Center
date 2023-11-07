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
<from>
<div class="row mb-4">
    <div class="col-lg-1"></div>
    <div class="col-lg-12 ">
        <div class="card pb-4">
            <div class="card-header">
                <h4 class="card-title">Tender Reading</h4>
            </div>
            <div class="card-body">


                <table class="order-details">
                    <thead>
                        <tr>
                            <th width="50%" colspan="2">
                                <h2 class="text-start">Tender Reading</h2>
                            </th>
                            <div class="mt-4 mb-4 d-flex justify-content-end">
                                <a href="{{url('generate-invoice')}}" class="btn btn-primary w-md">Generate Invoce</a>
                            </div>
                            <th width="20%" colspan="1" class="text-end company-data">
                                <span>Tender Number: 650856251</span> <br>
                                <span>Item Name: Sodium bicarcanate</span> <br>
                                <span>SR Number: 602</span> <br>
                            </th>
                            <th width="30%" colspan="1" class="text-end company-data">
                                <span>Quantity: 6</span> <br>
                                <span>Date: 24 / 09 / 2022</span> <br>
                                <span>Item code : NAB0077</span> <br>
                            </th>
                        </tr>
                    </thead>
                </table>

                <table>
                    <thead>
                        <tr>
                            <th class="no-border text-start heading" colspan="7">
                            </th>
                        </tr>
                        <tr class="bg-blue">
                            <th>Competitor Name</th>
                            <th>Terms</th>
                            <th>Currency</th>
                            <th>Quoted Price</th>
                            <th>Bid Bond</th>
                            <th>Delivery</th>
                            <th>Local Agent</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!-- <td colspan="4" class="total-heading">Total Amount - <small>Inc. all vat/tax</small> :</td> -->
                            <td colspan="1" class="total-heading">Yaden</td>
                            <td colspan="1" class="total-heading"></td>
                            <td colspan="1" class="total-heading">LKR</td>
                            <td colspan="1" class="total-heading">490/AMP</td>
                            <td colspan="1" class="total-heading"></td>
                            <td colspan="1" class="total-heading">3 weeks-SOLE</td>
                            <td colspan="1" class="total-heading"></td>
                        </tr>

                    </tbody>
                </table>


                <style>
                    <style>html,
                    body {
                        margin: 10px;
                        padding: 10px;
                        font-family: sans-serif;
                    }

                    h1,
                    h2,
                    h3,
                    h4,
                    h5,
                    h6,
                    p,
                    span,
                    label {
                        font-family: sans-serif;
                    }

                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-bottom: 0px !important;
                    }

                    table thead th {
                        height: 28px;
                        text-align: left;
                        font-size: 16px;
                        font-family: sans-serif;
                    }

                    table,
                    th,
                    td {
                        border: 1px solid #ddd;
                        padding: 8px;
                        font-size: 14px;
                    }

                    .heading {
                        font-size: 24px;
                        margin-top: 12px;
                        margin-bottom: 12px;
                        font-family: sans-serif;
                    }

                    .small-heading {
                        font-size: 18px;
                        font-family: sans-serif;
                    }

                    .total-heading {
                        font-size: 14px;
                        font-weight: 350;
                        font-family: sans-serif;
                    }

                    .order-details tbody tr td:nth-child(1) {
                        width: 20%;
                    }

                    .order-details tbody tr td:nth-child(3) {
                        width: 20%;
                    }

                    .text-start {
                        text-align: left;
                    }

                    .text-end {
                        text-align: right;
                    }

                    .text-center {
                        text-align: center;
                    }

                    .company-data span {
                        margin-bottom: 4px;
                        display: inline-block;
                        font-family: sans-serif;
                        font-size: 14px;
                        font-weight: 400;
                    }

                    .no-border {
                        border: 1px solid #fff !important;
                    }

                    .bg-blue {
                        background-color: #1F45FC;
                        color: #fff;
                    }

                </style>
                </tbody>
                </table>
            </div>
        </div>
</form>
    </div>
    @endsection
