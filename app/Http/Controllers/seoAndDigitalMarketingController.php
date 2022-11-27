<?php

namespace App\Http\Controllers;

use App\Models\HeaderAndDescriptions;
use App\Models\Services;
use Illuminate\Http\Request;

class seoAndDigitalMarketingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function goToSeoDigitalPage()
    {
        $headerAndDescription = HeaderAndDescriptions::where('keyword', 'servicesanddigitalmarketing')->first();
        view()->share([
            'pageTitle' => 'Seo & Digital Marketing',
            'heading' => $headerAndDescription->heading != '' ? $headerAndDescription->heading : '',
            'description' => $headerAndDescription->description != '' ? $headerAndDescription->description : '',
            'services' => Services::get(),
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
        if ($request->has('action') && $request->action == 'downpart') {
            if ($request->service_id != '') {
                $is_found = Services::find($request->service_id);
                if (!empty($is_found)) {
                    $is_found->service_name = $request->service_name;
                    $is_found->description = $request->description;
                    $success = $is_found->save();
                    if ($success)
                        return response()->json(['status' => true,]);
                    else
                        return response()->json(['status' => false,]);
                } else {
                    return response()->json(['status' => false,]);
                }
            } else {
                $success = Services::create([
                    'service_name' => $request->service_name,
                    'description' => $request->description,
                ])->save();
                if ($success)
                    return response()->json(['status' => true,]);
                else
                    return response()->json(['status' => false,]);
            }
        }
    }

    /* delete services */
    public function deleteServices(Request $request)
    {
        $is_found = Services::find($request->id);
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
