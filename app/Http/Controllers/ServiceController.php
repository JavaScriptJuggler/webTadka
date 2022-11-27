<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    
    public function index($service_code = '')
    {
        return view('frontend.pages.services.service_details');
    }
}
