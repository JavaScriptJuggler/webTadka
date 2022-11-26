<?php

namespace App\Http\Controllers;

use App\Models\HeaderAndDescriptions;
use App\Models\toolsTechnologiesModel;
use Illuminate\Http\Request;
use ImageResizer;

class toolsTechnologiesController extends Controller
{
    public function showToolPage()
    {
        $headerAndDescription = HeaderAndDescriptions::where('keyword', 'toolsheadinganddescription')->first();
        view()->share([
            'pageTitle' => 'Brands That Trust',
            'heading' =>  $headerAndDescription->heading != '' ? $headerAndDescription->heading : '',
            'description' => $headerAndDescription->description != '' ? $headerAndDescription->description : '',
            'services' => toolsTechnologiesModel::all(),
        ]);
        return view('admin_dashboard.toolsAndTechnologies.tools');
    }

    public function saveTools(Request $request)
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
                $is_found = toolsTechnologiesModel::find($request->service_id);
                if (!empty($is_found)) {
                    if ($request->image != '') {
                        unlink(public_path($is_found->image));
                        $image = $request->file('image');
                        $input['imagename'] = time() . '_tools.png';
                        $destinationPath = public_path('/document_bucket');
                        $img = ImageResizer::make($image->path());
                        $img->resize(400, 400, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($destinationPath . '/' . $input['imagename']);
                        $is_found->image = '/document_bucket/' . $input['imagename'];
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
                $image = $request->file('image');
                $input['imagename'] = time() . '_tools.png';
                $destinationPath = public_path('/document_bucket');
                $img = ImageResizer::make($image->path());
                $img->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $input['imagename']);

                $success = toolsTechnologiesModel::create([
                    'image' => '/document_bucket/' . $input['imagename'],
                ])->save();
                if ($success)
                    return response()->json(['status' => true,]);
                else
                    return response()->json(['status' => false,]);
            }
        }
    }

    public function deleteTools(Request $request)
    {
        $is_found = toolsTechnologiesModel::find($request->id);
        if (!empty($is_found)) {
            unlink(public_path($is_found->image));
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
