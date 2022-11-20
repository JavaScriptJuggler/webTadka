<?php

namespace App\Http\Controllers;

use App\Models\Heros;
use Illuminate\Http\Request;
use ImageResizer;

class HeroController extends Controller
{
    public function goToHeroPage()
    {
        view()->share(['pageTitle' => 'Hero Image']);
        $fileLocation = '';
        foreach (glob(public_path('/heroimage_storage') . '/*') as $file) {
            if (is_file($file)) {
                $fileArray = explode('/', $file);
                $fileLocation = $fileArray[count($fileArray) - 1];
            }
        }
        return view('admin_dashboard.herosection.hero', compact('fileLocation'));
    }

    /* upload hero image */
    public function uploadHeroImage(Request $request)
    {
        foreach (glob(public_path('/heroimage_storage') . '/*') as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
        /* upload image */
        $image = $request->file('file');
        $input['imagename'] = 'heroImage.png';
        $destinationPath = public_path('/heroimage_storage');
        $image->move($destinationPath, $input['imagename']);
    }

    /* show hero cotent page */
    public function showHeroContentPage()
    {
        $data = Heros::find(1);
        view()->share([
            'pageTitle' => 'Hero Contets',
            'header' => $data->header_text,
            'description' => $data->description,
            'repeater' => $data->contents,
        ]);
        return view('admin_dashboard.herosection.contents');
    }

    /* save hero content */
    public function saveHeroContent(Request $request)
    {
        if ($request->has('action') && $request->action == 'toppart') {
            $is_found = Heros::find(1);
            if (!empty($is_found)) {
                $is_found->header_text = $request->header_text;
                $is_found->description = $request->description;
                $success = $is_found->save();
                if ($success)
                    return response()->json(['status' => true,]);
                else
                    return response()->json(['status' => false,]);
            } else {
                $success = Heros::create([
                    'header_text' => $request->header_text,
                    'description' => $request->description,
                ])->save();
                if ($success)
                    return response()->json(['status' => true,]);
                else
                    return response()->json(['status' => false,]);
            }
        }
        if ($request->has('action') && $request->action == 'downpart') {
            $content_array = [];
            $image = $request->file('image');
            $input['imagename'] = time() . '_heroTypes.png';
            $destinationPath = public_path('/document_bucket');
            $img = ImageResizer::make($image->path());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['imagename']);

            $is_found = Heros::find(1);
            if (!empty($is_found)) {
                if ($is_found->contents != '') {
                    if (count(unserialize($is_found->contents)) > 0) {
                        $temp['text'] = $request->service_name;
                        $temp['file'] = '/document_bucket/' . $input['imagename'];
                        $previous_array = unserialize($is_found->contents);
                        array_push($previous_array, $temp);
                        $is_found->contents = serialize($previous_array);
                        $success = $is_found->save();
                        if ($success)
                            return response()->json(['status' => true,]);
                        else
                            return response()->json(['status' => false,]);
                    }
                } else {
                    $temp['text'] = $request->service_name;
                    $temp['file'] = '/document_bucket/' . $input['imagename'];
                    array_push($content_array, $temp);
                    $is_found->contents = serialize($content_array);
                    $success = $is_found->save();
                    if ($success)
                        return response()->json(['status' => true,]);
                    else
                        return response()->json(['status' => false,]);
                }
            } else {
                $temp['text'] = $request->service_name;
                $temp['file'] = '/document_bucket/' . $input['imagename'];
                array_push($content_array, $temp);
                $success =  Heros::create([
                    'contents' => serialize($content_array),
                ])->save();
                if ($success)
                    return response()->json(['status' => true,]);
                else
                    return response()->json(['status' => false,]);
            }
        }
    }


    /* delete */
    public function deleteHeroContent(Request $request)
    {
        $is_found = Heros::find(1);
        if (!empty($is_found)) {
            $getContentData = $is_found->contents;
            if ($getContentData != '') {
                $arrayContents = unserialize($getContentData);
                if (count($arrayContents) > 0) {
                    foreach ($arrayContents as $key => $value) {
                        if ($value['text'] == $request->service_name) {
                            array_splice($arrayContents, $key, 1);
                            array_values($arrayContents);
                            $is_found->contents = serialize($arrayContents);
                            $success = $is_found->save();
                            if ($success)
                                return response()->json(['status' => true,]);
                            else
                                return response()->json(['status' => false,]);
                        }
                    }
                }
            }
        }
    }
}
