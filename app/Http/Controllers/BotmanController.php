<?php

namespace App\Http\Controllers;

use App\Models\chatbot;
use Illuminate\Http\Request;

class BotmanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showbotmandata()
    {
        $chatbotdata = chatbot::orderBy('id', 'desc')->get();
        view()->share([
            'pageTitle' => 'Task Manager',
            'botData' => $chatbotdata,
        ]);
        return view('admin_dashboard.chatbot');
    }

    public function savetaskData(Request $request)
    {
        if (!empty($request)) {
            $dataArray = [
                'project' => $request->project,
                'project_details' => $request->project_details,
                'contact_info' => $request->contactinfo,
                'project_assigned' => $request->project_assigned,
                'start_date' => $request->startdate,
                'end_date' => $request->enddate,
                'follow_up' => $request->followup,
                'stage' => $request->stage,
                'remark' => $request->remarks,
                'status' => $request->status,
            ];
            if ($request->id == '')
                $is_success =  chatbot::create($dataArray)->save();
            else {
                $is_success = chatbot::where('id', $request->id)->update($dataArray);
            }
            if ($is_success)
                return response()->json([
                    'status' => true,
                    'message' => "Task Created Successfully",
                ]);
            else
                return response()->json([
                    'status' => false,
                    'message' => "Something Went Wrong",
                ]);
        }
    }

    public function deleteTaskData(Request $request)
    {
        if ($request->taskid != '') {
            return chatbot::find($request->taskid)->delete();
        }
    }
}
