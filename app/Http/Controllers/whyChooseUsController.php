<?php

namespace App\Http\Controllers;

use App\Models\HeaderAndDescriptions;
use App\Models\whyChooseUsModel;
use Illuminate\Http\Request;
use ImageResizer;

class whyChooseUsController extends Controller
{
    public function showWhyChooseUsPage()
    {
        $headerAndDescription = HeaderAndDescriptions::where('keyword', 'whychooseus')->first();
        view()->share([
            'pageTitle' => 'Why Choose Us',
            'heading' => $headerAndDescription->heading != '' ? $headerAndDescription->heading : '',
            'description' => $headerAndDescription->description != '' ? $headerAndDescription->description : '',
            'services' => whyChooseUsModel::get(),
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
        if ($request->has('action') && $request->action == 'downpart') {
            if ($request->service_id != '') {
                $is_found = whyChooseUsModel::find($request->service_id);
                if (!empty($is_found)) {
                    if ($request->file_input != '') {
                        $image = $request->file('file_input');
                        $input['imagename'] = time() . '_reasonImage.png';
                        $destinationPath = public_path('/document_bucket');
                        $img = ImageResizer::make($image->path());
                        $img->resize(100, 100, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($destinationPath . '/' . $input['imagename']);
                        $is_found->image = '/document_bucket/' . $input['imagename'];
                    }
                    if ($request->service_name != '') {
                        $is_found->reason = $request->service_name;
                    }
                    $success = $is_found->save();

                    if ($success)
                        return response()->json(['status' => true,]);
                    else
                        return response()->json(['status' => false,]);
                } else {
                    return response()->json(['status' => false,]);
                }
            } else {
                $image = $request->file('file_input');
                $input['imagename'] = time() . '_reasonImage.png';
                $destinationPath = public_path('/document_bucket');
                $img = ImageResizer::make($image->path());
                $img->resize(55, 55, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $input['imagename']);

                $success = whyChooseUsModel::create([
                    'reason' => $request->service_name,
                    'image' => '/document_bucket/' . $input['imagename'],
                ])->save();
                if ($success)
                    return response()->json(['status' => true,]);
                else
                    return response()->json(['status' => false,]);
            }
        }
    }
}
