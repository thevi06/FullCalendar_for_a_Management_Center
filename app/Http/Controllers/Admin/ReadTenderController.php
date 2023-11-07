<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReadTenderController extends Controller
{
    
    public function ReadTender(){
        return view('admin.tender.edit_tender');
    }

}
