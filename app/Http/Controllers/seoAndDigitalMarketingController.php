<?php

namespace App\Http\Controllers;

use App\Models\HeaderAndDescriptions;
use App\Models\Heros;
use App\Models\Services;
use App\Models\subServicesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

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
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
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

    /* sub services */
    public function subServices($servicedetails)
    {
        view()->share(['pageTitle' => 'Sub Services']);
        $service_id = Crypt::decryptString($servicedetails);
        $getServiceDetails = Services::find($service_id);
        $subservices = subServicesModel::where('service_id', $service_id)->get();
        $getheroDetails = Heros::where('hero_key', 'service' . str_replace(' ', '-', Services::find($service_id)->service_name))->first();
        $hero_header = '';
        $hero_description = '';
        if (!empty($getheroDetails)) {
            $hero_header = $getheroDetails->header_text;
            $hero_description = $getheroDetails->description;
        }
        return view('admin_dashboard.seoAndDigitalMarketing.subservices', compact('getServiceDetails', 'subservices', 'hero_header', 'hero_description'));
    }

    /* add edit sub services */
    public function addEditSubServices(Request $request)
    {
        if ($request->has('action') && $request->action == 'toppart') {
            $checkIfExist = Heros::where('hero_key', $request->hero_key)->first();
            if (!empty($checkIfExist)) {
                if ($request->has('icon') && $request->icon != '') {
                    if ($checkIfExist->heroimage != '')
                        unlink(public_path($checkIfExist->heroimage));
                    $checkIfExist->heroimage = $this->imageLinkGenerator($request);
                }
                $checkIfExist->header_text = $request->hero_header_text;
                $checkIfExist->description = $request->hero_description_text;
                $is_success = $checkIfExist->save();
                if ($is_success) {
                    return response()->json([
                        'status' => true,
                        'message' => 'Hero Updated Successfully',
                    ]);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Something Went Wrong, Please Contact Developer',
                    ]);
                }
            } else {
                $is_success = Heros::create([
                    'heroimage' => ($request->has('icon') && $request->icon != '') ? $this->imageLinkGenerator($request) : "",
                    'header_text' => $request->hero_header_text,
                    'description' => $request->hero_description_text,
                    'hero_key' => $request->hero_key,
                ]);
                if ($is_success) {
                    return response()->json([
                        'status' => true,
                        'message' => 'Hero Updated Successfully',
                    ]);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Something Went Wrong, Please Contact Developer',
                    ]);
                }
            }
        }

        if ($request->has('action') && $request->action == 'downpart') {
            if ($request->service_sub_id != '' && $request->service_sub_id != null) {
                $getSubService = subServicesModel::find($request->service_sub_id);
                if (!empty($getSubService)) {
                    /* unlinking image */
                    if ($request->has('icon') && $request->icon != '') {
                        if (file_exists(public_path($getSubService->image)))
                            unlink(public_path($getSubService->image));
                        $getSubService->image = $this->imageLinkGenerator($request);
                    }

                    $getSubService->name = $request->name;
                    $getSubService->description = $request->description;
                    $getSubService->features = $request->features;
                    $is_success = $getSubService->save();
                    if ($is_success) {
                        return response()->json([
                            'status' => true,
                            'message' => 'Sub Services Updated Successfully',
                        ]);
                    } else {
                        return response()->json([
                            'status' => false,
                            'message' => 'Something went wrong please contact developer',
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'No Sub Service found accroading to this sub service',
                    ]);
                }
            } else {
                $is_success = subServicesModel::create([
                    'service_id' => $request->service_id,
                    'name' => $request->name,
                    'description' => $request->description,
                    'image' => $this->imageLinkGenerator($request),
                    'features' => $request->features,
                ])->save();
                if ($is_success)
                    return response()->json([
                        'status' => true,
                        'message' => 'Sub Services Added Successfully',
                    ]);
            }
        }
    }

    public function deleteSubServices(Request $request)
    {
        $data = subServicesModel::find($request->id);
        if ($data->image != '' && file_exists(public_path($data->image)))
            unlink(public_path($data->image));
        $is_success = $data->delete();
        if ($is_success)
            return response()->json([
                'status' => true,
                'message' => 'Sub Services Deleted Successfully',
            ]);
        else
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong please contact developer',
            ]);
    }

    /* image link generator */
    public function imageLinkGenerator($request)
    {
        $image = $request->file('icon');
        $extention = explode('.', $image->getClientOriginalName());
        $input['imagename'] = time() . '_' . Str::random(5) . '_subservice.' . $extention[1];
        $destinationPath = public_path('/document_bucket');
        $image->move($destinationPath, $input['imagename']);
        $finalImageUrl = '/document_bucket/' . $input['imagename'];
        return $finalImageUrl;
    }
}
