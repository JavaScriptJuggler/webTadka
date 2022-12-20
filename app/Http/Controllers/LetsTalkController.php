<?php

namespace App\Http\Controllers;

use App\Models\LetsTalkModel;
use Illuminate\Http\Request;

class LetsTalkController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('action') && $request->action == 'lets-talk') {
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
            $service = $request->has('services') ? $request->services : '';
            $message = '
                Message From <strong>' . $request->name . '</strong>, <br>
                I want to talk to you about my project.<br> My Business name is <strong>' . $request->businessname . '</strong><br>My Requested Service is <strong>' . $service . '</strong><br>My addredd is <strong>' . $request->address . ',' . $request->state . ',' . $request->country . '</strong><br> Email: <strong>' . $request->email . '</strong><br>Phone: <strong>' . $request->phone . '</strong>.<br> My Project Details is as follows :<br>' . $request->projectdetails;
            sendEnquiryMail('team@webtadka.com', "New Client want's to talk about project", $message, $request->name);
            return $is_success;
        }
        if ($request->has('action') && $request->action == 'client-support') {
            $message = '
            Message From <strong>' . $request->name . '</strong>, <br>
            I have a issue with my project. Can you please help me ?.<br> My Prjecct name is <strong>' . $request->project_name . '<br> Email: <strong>' . $request->email . '</strong><br>Phone: <strong>' . $request->phone . '</strong>.<br> My Service Details is as follows :<br>' . $request->serviceDetails;
            sendSupportMail('support@webtadka.com', "Need Client Support", $message, $request->name);
            return true;
        }
    }
}
