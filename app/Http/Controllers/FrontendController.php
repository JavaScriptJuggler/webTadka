<?php

namespace App\Http\Controllers;

use App\Models\aboutUsModel;
use App\Models\brandModel;
use App\Models\faqModel;
use App\Models\HeaderAndDescriptions;
use App\Models\Heros;
use App\Models\Services;
use App\Models\testimonialsModel;
use App\Models\toolsTechnologiesModel;
use App\Models\whyChooseUsModel;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        /* get hero image */
        $heroContents = Heros::where('hero_key', 'frontendForm')->first();

        view()->share([
            'heroImage' => !empty($heroContents) ? $heroContents->heroimage : '',
            'heroheader' => !empty($heroContents) ? $heroContents->header_text : '',
            'heroDescription' => !empty($heroContents) ? $heroContents->description : '',
            'heroContents' => !empty($heroContents) ? $heroContents->contents : '',
            'seo_heading' => HeaderAndDescriptions::where('keyword', 'servicesanddigitalmarketing')->first()->heading,
            'seo_description' => HeaderAndDescriptions::where('keyword', 'servicesanddigitalmarketing')->first()->description,
            'cta_heading' => HeaderAndDescriptions::where('keyword', 'ctaheadinganddescription')->first()->heading,
            'cta_description' => HeaderAndDescriptions::where('keyword', 'ctaheadinganddescription')->first()->description,
            'why_choose_us_heading' => HeaderAndDescriptions::where('keyword', 'whychooseus')->first()->heading,
            'why_choose_us_description' => HeaderAndDescriptions::where('keyword', 'whychooseus')->first()->description,
            'testimonials_heading' => HeaderAndDescriptions::where('keyword', 'testimonials')->first()->heading,
            'testimonials_description' => HeaderAndDescriptions::where('keyword', 'testimonials')->first()->description,
            'brands_heading' => HeaderAndDescriptions::where('keyword', 'brandheadinganddescription')->first()->heading,
            'brands_description' => HeaderAndDescriptions::where('keyword', 'brandheadinganddescription')->first()->description,
            'tools_heading' => HeaderAndDescriptions::where('keyword', 'toolsheadinganddescription')->first()->heading,
            'tools_description' => HeaderAndDescriptions::where('keyword', 'toolsheadinganddescription')->first()->description,
            'about_us_header' => HeaderAndDescriptions::where('keyword', 'aboutusheadinganddescription')->first()->heading,
            'about_us_description' => HeaderAndDescriptions::where('keyword', 'aboutusheadinganddescription')->first()->description,
            'faq_header' => HeaderAndDescriptions::where('keyword', 'faq')->first()->heading,
            'faq_description' => HeaderAndDescriptions::where('keyword', 'faq')->first()->description,
            'faqs' => faqModel::all(),
            'aboutus' => aboutUsModel::find(1)->about,
            'why_choose_us_reasons' => whyChooseUsModel::all(),
            'testimonials' => testimonialsModel::all(),
            'tools' => toolsTechnologiesModel::all(),
            'brands' => brandModel::all(),
            'services' => Services::all(),
        ]);
        return view('frontend.main');
    }

    /* about us */
    public function about_us()
    {
        return view('frontend.pages.aboutus');
    }

    /* blogs */
    public function blogs()
    {
        return view('frontend.pages.blog');
    }

    /* blog details */
    public function blog_details($blogid)
    {
        return view('frontend.pages.blog_details');
    }
}
