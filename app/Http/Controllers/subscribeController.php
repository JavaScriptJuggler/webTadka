<?php

namespace App\Http\Controllers;

use App\Models\subscribeModel;
use Illuminate\Http\Request;

class subscribeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['saveSubscribe']]);
    }
    public function deleteSubscribers(Request $request)
    {
        subscribeModel::find($request->deleteId)->delete();
    }

    public function getSubscribers()
    {
        view()->share([
            'pageTitle' => 'Subscribers',
            'subscribers' => subscribeModel::paginate(10),
        ]);
        return view('admin_dashboard.subscribers.subscribers');
    }

    public function saveSubscribe(Request $request)
    {
        if (!empty($request)) {
            $exist = subscribeModel::where('email', $request->email)->first();
            if (empty($exist)) {
                $success = subscribeModel::create([
                    'email' => $request->email,
                    'name' => $request->name,
                    'date' => date('d/m/Y'),
                    'time' => date('h:i a'),
                ])->save();
                sendEnquiryMail($request->email, 'Thanks For Subscribe', ['header' => 'Thank you for subscribing us !', 'body' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s"], $request->name, null, [], [], 'frontend1');
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
