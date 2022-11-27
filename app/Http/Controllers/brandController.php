<?php

namespace App\Http\Controllers;

use App\Models\brandModel;
use App\Models\HeaderAndDescriptions;
use Illuminate\Http\Request;
use ImageResizer;

class brandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showBrandPage()
    {
        $headerAndDescription = HeaderAndDescriptions::where('keyword', 'brandheadinganddescription')->first();
        view()->share([
            'pageTitle' => 'Brands That Trust',
            'heading' => $headerAndDescription->heading != '' ? $headerAndDescription->heading : '',
            'description' => $headerAndDescription->description != '' ? $headerAndDescription->description : '',
            'services' => brandModel::all(),
        ]);
        return view('admin_dashboard.brands.brand');
    }

    public function saveBrand(Request $request)
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
                $is_found = brandModel::find($request->service_id);
                if (!empty($is_found)) {
                    if ($request->image != '') {
                        unlink(public_path($is_found->image));
                        $image = $request->file('image');
                        $input['imagename'] = time() . '_brand.png';
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
                $input['imagename'] = time() . '_brand.png';
                $destinationPath = public_path('/document_bucket');
                $img = ImageResizer::make($image->path());
                $img->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $input['imagename']);

                $success = brandModel::create([
                    'image' => '/document_bucket/' . $input['imagename'],
                ])->save();
                if ($success)
                    return response()->json(['status' => true,]);
                else
                    return response()->json(['status' => false,]);
            }
        }
    }

    public function deleteBrand(Request $request)
    {
        $is_found = brandModel::find($request->id);
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
