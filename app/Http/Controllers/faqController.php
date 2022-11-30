<?php

namespace App\Http\Controllers;

use App\Models\faqModel;
use App\Models\HeaderAndDescriptions;
use Illuminate\Http\Request;

class faqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showfaq()
    {
        $headerAndDescription = HeaderAndDescriptions::where('keyword', 'faq')->first();
        view()->share([
            'pageTitle' => 'FAQ',
            'heading' => $headerAndDescription->heading != '' ? $headerAndDescription->heading : '',
            'description' => $headerAndDescription->description != '' ? $headerAndDescription->description : '',
            'services' => faqModel::get(),
        ]);
        return view('admin_dashboard.faq.faq');
    }
    public function saveFaq(Request $request)
    {
        if ($request->has('action') && $request->action == 'toppart') {
            $find = HeaderAndDescriptions::where('keyword', $request->keyword)->first();
            if (!empty($find)) {
                $find->heading = $request->heading;
                $find->description = $request->description;
                $success = $find->save();
                if ($success)
                    return response()->json(['status' => true,]);
                else
                    return response()->json(['status' => false,]);
            } else {
                $success = HeaderAndDescriptions::create([
                    'keyword' => $request->keyword,
                    'heading' => $request->heading,
                    'description' => $request->description,
                ])->save();
                if ($success)
                    return response()->json(['status' => true,]);
                else
                    return response()->json(['status' => false,]);
            }
        }
        if ($request->has('action') && $request->action == 'downpart') {
            if ($request->service_id != '') {
                $is_found = faqModel::find($request->service_id);
                if (!empty($is_found)) {
                    $is_found->question = $request->question;
                    $is_found->answer = $request->answer;
                    $success = $is_found->save();
                    if ($success)
                        return response()->json(['status' => true,]);
                    else
                        return response()->json(['status' => false,]);
                } else {
                    return response()->json(['status' => false,]);
                }
            } else {
                $success = faqModel::create([
                    'question' => $request->question,
                    'answer' => $request->answer,
                ])->save();
                if ($success)
                    return response()->json(['status' => true,]);
                else
                    return response()->json(['status' => false,]);
            }
        }
    }

    public function deleteFaq(Request $request)
    {
        $is_found = faqModel::find($request->id);
        if (!empty($is_found)) {
            $success = $is_found->delete();
            if ($success)
                return response()->json(['status' => true,]);
            else
                return response()->json(['status' => false,]);
        } else {
            return response()->json(['status' => false,]);
        }
    }
}
