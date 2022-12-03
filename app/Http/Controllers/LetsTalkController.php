<?php

namespace App\Http\Controllers;

use App\Models\LetsTalkModel;
use Illuminate\Http\Request;

class LetsTalkController extends Controller
{
    public function index(Request $request)
    {
        $is_success = LetsTalkModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'business_name' => $request->businessname,
            'country' => $request->country,
            'state' => $request->state,
            'address' => $request->address,
            'project_details' => $request->projectdetails,
            'subscribed' => $request->subscribe,
        ])->save();
        return $is_success;
    }
}
