<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductManagementController extends Controller
{
    public function index()
    {
        return view('admin.product.all_product');
    }

    public function create()
    {
        return view('admin.product.create_product');
    }

    public function edit()
    {
        return view('admin.product.view_product');
    }
}
