<?php

namespace App\Http\Controllers;

use App\Models\HeaderAndDescriptions;
use App\Models\testimonialsModel;
use Illuminate\Http\Request;
use ImageResizer;

class testimonialsController extends Controller
{
    public function showTestimonialsPage()
    {
        $headerAndDescription = HeaderAndDescriptions::where('keyword', 'testimonials')->first();
        view()->share([
            'pageTitle' => 'Testimonials',
            'heading' => $headerAndDescription->heading != '' ? $headerAndDescription->heading : '',
            'description' => $headerAndDescription->description != '' ? $headerAndDescription->description : '',
            'testimonials' => testimonialsModel::get(),
        ]);
        return view('admin_dashboard.testimonials.testimonials');
    }

    public function saveTestimonials(Request $request)
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
            if ($request->testimonial_id != '') {
                $is_found = testimonialsModel::find($request->testimonial_id);
                if (!empty($is_found)) {
                    if ($request->image != '') {
                        unlink(public_path($is_found->image));
                        $image = $request->file('image');
                        $input['imagename'] = time() . '_testimonial.png';
                        $destinationPath = public_path('/document_bucket');
                        $img = ImageResizer::make($image->path());
                        $img->resize(400, 400, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($destinationPath . '/' . $input['imagename']);
                        $is_found->image = '/document_bucket/' . $input['imagename'];
                    }
                    if ($request->name != '') {
                        $is_found->name = $request->name;
                    }
                    if ($request->comment != '') {
                        $is_found->comment = $request->comment;
                    }
                    if ($request->profession != '') {
                        $is_found->profession = $request->profession;
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
                $input['imagename'] = time() . '_testimonial.png';
                $destinationPath = public_path('/document_bucket');
                $img = ImageResizer::make($image->path());
                $img->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $input['imagename']);

                $success = testimonialsModel::create([
                    'name' => $request->name,
                    'comment' => $request->comment,
                    'profession' => $request->profession,
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
