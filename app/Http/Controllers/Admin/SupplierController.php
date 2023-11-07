<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Manufacture 
    public function index()
    {
        return view('admin.supplier.all_supplier');
    }
}
