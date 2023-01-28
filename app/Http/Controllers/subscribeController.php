<?php

namespace App\Http\Controllers;

use App\Models\subscribeModel;
use Illuminate\Http\Request;

class subscribeController extends Controller
{
    public function saveSubscribe(Request $request)
    {
        if (!empty($request)) {
            $exist = subscribeModel::where('email', $request->email)->first();
            if (empty($exist)) {
                $success = subscribeModel::create([
                    'email' => $request->email,
                    'name' => $request->name,
                ])->save();
                sendEnquiryMail($request->email, 'Thanks For Subscribe', ['header' => 'Thank you for subscribing us !', 'body' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s"], $request->name, null, [], [], 'frontend');
                if ($success) {
                    return response()->json([
                        'status' => true,
                        'message' => 'Thank you for subscribing us. We will sent you an email when we publish new blog or any information'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'You have already subscribe us !!!'
                ]);
            }
        }
    }
}
