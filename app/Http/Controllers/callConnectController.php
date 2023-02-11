<?php

namespace App\Http\Controllers;

use App\Models\instantCallConnect;
use Illuminate\Http\Request;

class callConnectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getCallConnect()
    {
        view()->share([
            'pageTitle' => 'Call Connect',
            'callConnect' => instantCallConnect::orderBy('id','desc')->paginate('10'),
        ]);
        return view('admin_dashboard.call_connect.call_connect');
    }
    public function deleteCallConnect(Request $request)
    {
        dd($request->deleteId);
        instantCallConnect::find($request->deleteId)->delete();
    }
}
