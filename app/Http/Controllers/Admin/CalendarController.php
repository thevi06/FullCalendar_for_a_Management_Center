<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    // Manufacture 
    public function index()
    {
        return view('admin.calendar.calendar');
    }
}
