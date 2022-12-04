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
        $message = '
            Message From <strong>' . $request->name . '</strong>, <br>
            I want to talk to you about my project.<br> My Business name is <strong>' . $request->businessname . '</strong><br>My Requested Service is <strong>' . $request->has('services') ? $request->services : '' . '</strong><br>My addredd is <strong>' . $request->address . ',' . $request->state . ',' . $request->country . '</strong><br> Email: <strong>' . $request->email . '</strong><br>Phone: <strong>' . $request->phone . '</strong>. My Project Details is as follows :<br><br>' . $request->projectdetails;
        sendMail('team@webtadka.com', "New Client want's to tak about project", $message, $request->name);
        return $is_success;
    }
}
