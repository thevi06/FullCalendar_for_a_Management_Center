<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewProductController extends Controller
{
    //Product Mapping
    public function ProductMapping(){
        return view ('admin.product.view_product');
    }
}
