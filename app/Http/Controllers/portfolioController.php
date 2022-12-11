<?php

namespace App\Http\Controllers;

use App\Models\HeaderAndDescriptions;
use App\Models\PortfolioCategoryModel;
use App\Models\PortfolioModel;
use Illuminate\Http\Request;

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
            if ($request->service_id != '') {
                $is_found = PortfolioModel::find($request->service_id);
                if (!empty($is_found)) {
                    $is_found->question = $request->question;
                    $is_found->answer = $request->answer;
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
                    'question' => $request->question,
                    'answer' => $request->answer,
                ])->save();
                if ($success)
                    return response()->json(['status' => true,]);
                else
                    return response()->json(['status' => false,]);
            }
        }
    }

    public function savePortfolioCategory(Request $request){
        if($request->category_name!='' && empty(PortfolioCategoryModel::where('category_name', $request->category_name)->first())){
            $success = PortfolioCategoryModel::create([
                'category_name'=>$request->category_name,
            ])->save();
            if($success){
                return response()->json(['status' => true,'message'=>'Category Added Successfully']);
            }else{
                return response()->json(['status' => false, 'message'=>'Something went wrong']);
            }
        }else{
            return response()->json([
                'status'=>false,
                'message'=>"Category already exist or category name is empty",
            ]);
        }
    }
}
