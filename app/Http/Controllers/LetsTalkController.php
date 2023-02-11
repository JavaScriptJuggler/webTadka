<?php

namespace App\Http\Controllers;

use App\Models\instantCallConnect;
use App\Models\LetsTalkModel;
use App\Models\Services;
use App\Models\servicesEnquiry;
use App\Models\subServicesModel;
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
            $sub_service = $request->has('subservice_name') ? $request->subservice_name : '';
            $service_name = $request->has('servicename') ? $request->servicename : '';
            if ($service_name != '' && $sub_service != '') {
                $service_id = Services::where('service_name', $service_name)->first()->id;
                $is_saved = servicesEnquiry::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'businessname' => $request->businessname,
                    'country' => $request->country,
                    'state' => $request->state,
                    'address' => $request->address,
                    'project_details' => $request->projectdetails,
                    'service_id' => $service_id,
                    'subservice_id' => subServicesModel::where('name', $sub_service)->where('service_id', $service_id)->first()->id,
                    'date' => date('d/m/Y'),
                    'time' => date('h:i a'),
                ])->save();
                if ($is_saved) {
                    $message = '
                             Message From <strong>' . $request->name . '</strong>, <br>
                                I want to talk to you about my project.<br> My Business name is <strong>' . $request->businessname . '</strong><br>My addredd is <strong>' . $request->address . ',' . $request->state . ',' . $request->country . '</strong><br> Email: <strong>' . $request->email . '</strong><br>Phone: <strong>' . $request->phone . '</strong>.<br>Service Name: <strong>' . $service_name . '</strong><br>Sub Service Name:<strong>' . $sub_service . '</strong><br> My Project Details is as follows :<br>' . $request->projectdetails;
                    sendServiceMails('services@webtadka.com', "New Enquiry from " . $service_name, $message, $request->name);
                }
            } else {
                $message = '
                    Message From <strong>' . $request->name . '</strong>, <br>
                    I want to talk to you about my project.<br> My Business name is <strong>' . $request->businessname . '</strong><br>My addredd is <strong>' . $request->address . ',' . $request->state . ',' . $request->country . '</strong><br> Email: <strong>' . $request->email . '</strong><br>Phone: <strong>' . $request->phone . '</strong>.<br> My Project Details is as follows :<br>' . $request->projectdetails;
                sendEnquiryMail('team@webtadka.com', "New Client want's to talk about project", $message, $request->name);
            }
            return $is_success;
        }
        if ($request->has('action') && $request->action == 'client-support') {
            $message = '
            Message From <strong>' . $request->name . '</strong>, <br>
            I have a issue with my project. Can you please help me ?.<br><strong> My Prjecct name is </strong>' . $request->project_name . '<br><strong> Email: </strong>' . $request->email . '<br><strong>Phone: </strong>' . $request->phone . '<strong>.<br> My Service Details is as follows :</strong><br>' . $request->serviceDetails;
            sendSupportMail('support@webtadka.com', "Need Client Support", $message, $request->name);
            return true;
        }
        if ($request->has('action') && $request->action == 'callConnect') {
            instantCallConnect::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'priority' => $request->priority,
                'city' => $request->city,
                'message' => $request->message,
                'date' => date('d/m/Y'),
                'time' => date('h:i a'),
            ]);
            $message = '
            Message From <strong>' . $request->name . '</strong>, <br>
            I want to connect a call with you. <br><strong>Phone Number: </strong>' . $request->phone . '<br><strong>Priority: </strong>' . $request->priority . '<br><strong>City: </strong>' . $request->city . '<br><strong>Message: </strong>' . $request->message;
            sendEnquiryMail('team@webtadka.com', "Client want's to connect a call", $message, $request->name);
            return true;
        }
    }
}
