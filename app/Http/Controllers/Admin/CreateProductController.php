<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateProductController extends Controller
{
    // Create Product
    public function CreateProduct(){
        return view('admin.product.create_product');
    }
}
