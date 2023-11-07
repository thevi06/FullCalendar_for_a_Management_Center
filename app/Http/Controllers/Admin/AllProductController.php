<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AllProductController extends Controller
{
    //
    public function AllProducts(){
        return view('admin.product.all_product');
    }
}
