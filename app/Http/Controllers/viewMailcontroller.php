<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewMailcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        view()->share(['pageTitle' => 'Email']);
        return view('admin_dashboard.viewinbox');
    }
}
