<?php

namespace App\Http\Controllers;

use App\Models\brandModel;
use App\Models\HeaderAndDescriptions;
use App\Models\Heros;
use App\Models\Services;
use App\Models\testimonialsModel;
use App\Models\toolsTechnologiesModel;
use App\Models\whyChooseUsModel;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index($service_code = '')
    {
        /* get hero image */
        $heroContents = Heros::where('hero_key', 'frontendForm')->first();

        view()->share([
            'heroImage' => $heroContents->heroimage,
            'heroheader' => $heroContents->header_text,
            'heroDescription' => $heroContents->description,
            'heroContents' => $heroContents->contents,
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
            'tools' => toolsTechnologiesModel::all(),
            'brands' => brandModel::all(),
            'services' => Services::all(),
        ]);
        return view('frontend.pages.services.service_details');
    }
}
