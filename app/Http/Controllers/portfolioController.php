<?php

namespace App\Http\Controllers;

use App\Models\HeaderAndDescriptions;
use App\Models\PortfolioCategoryModel;
use App\Models\PortfolioModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class portfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $headerAndDescription = HeaderAndDescriptions::where('keyword', 'portfolio')->first();
        view()->share([
            'pageTitle' => 'Portfolios',
            'heading' => $headerAndDescription->heading != '' ? $headerAndDescription->heading : '',
            'description' => $headerAndDescription->description != '' ? $headerAndDescription->description : '',
            'services' => PortfolioModel::get(),
            'category' => PortfolioCategoryModel::get(),
        ]);
        return view('admin_dashboard.portfolios.portfolio');
    }
    public function savePortfolio(Request $request)
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
            if ($request->portfolio_id != '') {
                $is_found = PortfolioModel::find($request->portfolio_id);
                if (!empty($is_found)) {
                    $is_found->portfolio_name = $request->portfolio_name;
                    $is_found->potrfolio_description = $request->portfolio_long_description;
                    $is_found->short_description = $request->portfolio_short_description;
                    if ($request->has('portfolio_images') && count($request->portfolio_images) > 0) {
                        /* linking and unlinking images */
                        if (count(unserialize($is_found->images)) > 0) {
                            foreach (unserialize($is_found->images) as $key => $value) {
                                unlink(public_path($value));
                            }
                        }
                        $is_found->images = serialize($this->imageAdder($request));
                    }
                    $is_found->links = $request->portfolio_link;
                    $is_found->category_id = $request->category;
                    $success = $is_found->save();
                    if ($success)
                        return response()->json(['status' => true,]);
                    else
                        return response()->json(['status' => false,]);
                } else {
                    return response()->json(['status' => false,]);
                }
            } else {
                $success = PortfolioModel::create([
                    'portfolio_name' => $request->portfolio_name,
                    'potrfolio_description' => $request->portfolio_long_description,
                    'short_description' => $request->portfolio_short_description,
                    'images' => serialize($this->imageAdder($request)),
                    'links' => $request->portfolio_link,
                    'category_id' => $request->category,
                ])->save();
                if ($success)
                    return response()->json(['status' => true,]);
                else
                    return response()->json(['status' => false,]);
            }
        }
    }

    public function savePortfolioCategory(Request $request)
    {
        if ($request->category_name != '' && empty(PortfolioCategoryModel::where('category_name', $request->category_name)->first())) {
            $success = PortfolioCategoryModel::create([
                'category_name' => $request->category_name,
            ])->save();
            if ($success) {
                return response()->json(['status' => true, 'message' => 'Category Added Successfully']);
            } else {
                return response()->json(['status' => false, 'message' => 'Something went wrong']);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => "Category already exist or category name is empty",
            ]);
        }
    }

    public function imageAdder($request)
    {
        $portfolio_image_array = [];
        if ($request->has('portfolio_images') && count($request->portfolio_images) > 0) {
            foreach ($request->portfolio_images as $key => $value) {
                $image = $value;
                $extention = explode('.', $image->getClientOriginalName());
                $input['imagename'] = time() . '_' . Str::random(5) . '_portfolio_image.' . $extention[1];
                $destinationPath = public_path('/document_bucket');
                $image->move($destinationPath, $input['imagename']);
                $finalImageUrl = '/document_bucket/' . $input['imagename'];
                array_push($portfolio_image_array, $finalImageUrl);
            }
        }
        return $portfolio_image_array;
    }

    /* delete services */
    public function deletePortfolio(Request $request)
    {
        $is_found = PortfolioModel::find($request->id);
        if (!empty($is_found)) {
            $images = unserialize($is_found->images);
            if (count($images) > 0) {
                foreach ($images as $key => $value) {
                    unlink(public_path($value));
                }
            }
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
