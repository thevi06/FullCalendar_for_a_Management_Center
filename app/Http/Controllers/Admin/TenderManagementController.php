<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TenderManagementController extends Controller
{
    public function index()
    {
        return view('admin.tender.edit_tender');
    }

// Tender Evaluation
    public function edit()
    {
        return view('admin.tender.list_tender');
    }

    // Previous Tender
    public function create()
    {
        return view('admin.tender.view_tender');
    }

    // Tender Mapping
    public function view()
    {
        return view('admin.tender.tender_mapping');
    }
}
