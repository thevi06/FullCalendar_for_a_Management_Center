<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TenderController extends Controller
{
    // view previous tender
    public function ViewTender(){
        return view('admin.tender.view_tender');
    }
    
}
