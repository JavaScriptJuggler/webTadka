<?php

namespace App\Http\Controllers;

use App\Models\HeaderAndDescriptions;
use Illuminate\Http\Request;

class whyChooseUsController extends Controller
{
    public function showWhyChooseUsPage()
    {
        $headerAndDescription = HeaderAndDescriptions::where('keyword', 'whychooseus')->first();
        view()->share([
            'pageTitle' => 'Why Choose Us',
            'heading' => $headerAndDescription->heading != '' ? $headerAndDescription->heading : '',
            'description' => $headerAndDescription->description != '' ? $headerAndDescription->description : '',
        ]);
        return view('admin_dashboard.why_choose_us.whyChooseUs');
    }

    public function saveWhyChooseUs(Request $request)
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
    }
}
