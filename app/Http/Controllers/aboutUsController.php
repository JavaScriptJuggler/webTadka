<?php

namespace App\Http\Controllers;

use App\Models\aboutUsModel;
use App\Models\HeaderAndDescriptions;
use Illuminate\Http\Request;

class aboutUsController extends Controller
{
    public function showAboutUsPAge()
    {
        $headerAndDescription = HeaderAndDescriptions::where('keyword', 'aboutusheadinganddescription')->first();
        view()->share([
            'pageTitle' => 'Brands That Trust',
            'heading' => $headerAndDescription->heading != '' ? $headerAndDescription->heading : '',
            'description' => $headerAndDescription->description != '' ? $headerAndDescription->description : '',
            'about' => aboutUsModel::first()->about,
        ]);
        return view('admin_dashboard.aboutus.aboutus');
    }

    public function saveAboutUsPAge(Request $request)
    {
        if ($request->has('action') && $request->action == 'toppart') {
            $find = HeaderAndDescriptions::where('keyword', $request->keyword)->first();
            $findabout = aboutUsModel::find(1);
            if (!empty($find)) {
                $find->heading = $request->heading;
                $find->description = $request->description;
                $success = $find->save();
            }
            if (!empty($findabout)) {
                $findabout->about = $request->about;
                $findabout->save();
            }
            if (empty($find)) {
                $success = HeaderAndDescriptions::create([
                    'keyword' => $request->keyword,
                    'heading' => $request->heading,
                    'description' => $request->description,
                ])->save();
            }
            if (empty($findabout)) {
                aboutUsModel::create([
                    'about' => $request->about
                ])->save();
            }
        }
        return response()->json(['status' => true,]);
    }
}
