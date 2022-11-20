<?php

namespace App\Http\Controllers;

use App\Models\HeaderAndDescriptions;
use Illuminate\Http\Request;

class seoAndDigitalMarketingController extends Controller
{
    public function goToSeoDigitalPage()
    {
        $headerAndDescription = HeaderAndDescriptions::where('keyword', 'servicesanddigitalmarketing')->first();
        view()->share([
            'pageTitle' => 'Seo & Digital Marketing',
            'heading' => $headerAndDescription->heading != '' ? $headerAndDescription->heading : '',
            'description' => $headerAndDescription->description != '' ? $headerAndDescription->description : '',
        ]);
        return view('admin_dashboard.seoAndDigitalMarketing.seoanddigital');
    }

    /* save seo and deigital marketing details */
    public function seoAndServicesContents(Request $request)
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
