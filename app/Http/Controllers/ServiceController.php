<?php

namespace App\Http\Controllers;

use App\Models\aboutUsModel;
use App\Models\brandModel;
use App\Models\faqModel;
use App\Models\HeaderAndDescriptions;
use App\Models\Heros;
use App\Models\PortfolioCategoryModel;
use App\Models\PortfolioModel;
use App\Models\Services;
use App\Models\testimonialsModel;
use App\Models\toolsTechnologiesModel;
use App\Models\whyChooseUsModel;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index($servicename)
    {
        $getServicedetails = '';
        if ($servicename != '') {
            $getServicedetails = Services::where('service_name', str_replace('-', ' ', $servicename))->with('subservices')->first();
        }
        /* get hero image */
        $heroContents = Heros::where('hero_key', 'service' . $servicename)->first();
        $heroimage = !empty($heroContents) ? $heroContents->heroimage : "";
        $heroheader = !empty($heroContents) ? $heroContents->header_text : "";
        $heroDescription = !empty($heroContents) ? $heroContents->description : "";
        view()->share([
            'heroImage' => $heroimage,
            'heroheader' => $heroheader,
            'heroDescription' => $heroDescription,
            'meta_title'=>$getServicedetails->meta_title,
            'meta_description'=>$getServicedetails->meta_description,
            'heroContents' => /* !empty($heroContents) ? $heroContents->contents : '' */ '',
            'seo_heading' => HeaderAndDescriptions::where('keyword', 'servicesanddigitalmarketing')->first()->heading,
            'seo_description' => HeaderAndDescriptions::where('keyword', 'servicesanddigitalmarketing')->first()->description,
            'cta_heading' => HeaderAndDescriptions::where('keyword', 'ctaheadinganddescription')->first()->heading,
            'cta_description' => HeaderAndDescriptions::where('keyword', 'ctaheadinganddescription')->first()->description,
            'why_choose_us_heading' => HeaderAndDescriptions::where('keyword', 'whychooseus')->first()->heading,
            'why_choose_us_description' => HeaderAndDescriptions::where('keyword', 'whychooseus')->first()->description,
            'why_choose_us_reasons' => whyChooseUsModel::all(),
            'testimonials_heading' => HeaderAndDescriptions::where('keyword', 'testimonials')->first()->heading,
            'testimonials_description' => HeaderAndDescriptions::where('keyword', 'testimonials')->first()->description,
            'testimonials' => testimonialsModel::all(),
            'brands_heading' => HeaderAndDescriptions::where('keyword', 'brandheadinganddescription')->first()->heading,
            'brands_description' => HeaderAndDescriptions::where('keyword', 'brandheadinganddescription')->first()->description,
            'tools_heading' => HeaderAndDescriptions::where('keyword', 'toolsheadinganddescription')->first()->heading,
            'tools_description' => HeaderAndDescriptions::where('keyword', 'toolsheadinganddescription')->first()->description,
            'faq_header' => HeaderAndDescriptions::where('keyword', 'faq')->first()->heading,
            'faq_description' => HeaderAndDescriptions::where('keyword', 'faq')->first()->description,
            'faqs' => faqModel::all(),
            'tools' => toolsTechnologiesModel::all(),
            'brands' => brandModel::all(),
            'services' => Services::all(),
            'portfolio_header' => HeaderAndDescriptions::where('keyword', 'portfolio')->first()->heading,
            'portfolio_description' => HeaderAndDescriptions::where('keyword', 'portfolio')->first()->description,
            'portfolio_category' => PortfolioCategoryModel::all(),
            'portfolio_details' => PortfolioModel::all(),
            'serviceDetails' => $getServicedetails,
            'aboutus' => aboutUsModel::find(1)->about,
            'about_us_header' => HeaderAndDescriptions::where('keyword', 'aboutusheadinganddescription')->first()->heading,
            'about_us_description' => HeaderAndDescriptions::where('keyword', 'aboutusheadinganddescription')->first()->description,
            'service_name' => $servicename,
        ]);
        return view('frontend.pages.services.service_details');
    }
}
