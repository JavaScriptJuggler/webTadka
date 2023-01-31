<?php

namespace App\Http\Controllers;

use App\Models\aboutUsModel;
use App\Models\blog_categories;
use App\Models\blogs;
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
use Illuminate\Support\Facades\Crypt;

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
            'portfolio_header' => HeaderAndDescriptions::where('keyword', 'portfolio')->first()->heading,
            'portfolio_description' => HeaderAndDescriptions::where('keyword', 'portfolio')->first()->description,
            'portfolio_category' => PortfolioCategoryModel::all(),
            'portfolio_details' => PortfolioModel::all(),
            'why_choose_us_reasons' => whyChooseUsModel::all(),
            'testimonials' => testimonialsModel::all(),
            'tools' => toolsTechnologiesModel::all(),
            'brands' => brandModel::all(),
            'services' => Services::all(),
            'blogs' => blogs::with('blogCategory')->orderBy('id', 'DESC')->get(),
            'meta_title' => 'Number 1 Web, Digital Marketing Company in Mumbai, India',
            'meta_description' => "We are an Award-winning digital marketing company with 4 offices in metro cities like Kolkata, Mumbai, Chennai,Delhi and other places across India and, and offers We offer a wide range of services including SEO, PPC, Social Media Marketing, Content Creation, and Web Design & Development",
        ]);
        return view('frontend.main');
    }

    /* about us */
    /*  public function about_us()
    {
        return view('frontend.pages.aboutus');
    } */

    /* blogs */
    public function blogs()
    {
        $category = '';
        if (isset($_GET['category'])) {
            $blogs = blogs::with('blogCategory')->where('blog_category', $_GET['category'])->orderBy('id', 'DESC')->paginate(6);
            $blogs->appends('category', $_GET['category']);
            $category = $_GET['category'];
        } else
            $blogs = blogs::with('blogCategory')->orderBy('id', 'DESC')->paginate(6);
        view()->share([
            'blogs' => $blogs,
            'blogcategories' => blog_categories::all(),
            'category' => $category,
            'meta_title' => 'Number 1 Web, Digital Marketing Company in Mumbai, India',
            'meta_description' => "We are an Award-winning digital marketing company with 4 offices in metro cities like Kolkata, Mumbai, Chennai,Delhi and other places across India and, and offers We offer a wide range of services including SEO, PPC, Social Media Marketing, Content Creation, and Web Design & Development",
            'about_us_description' => HeaderAndDescriptions::where('keyword', 'aboutusheadinganddescription')->first()->description,
            'services' => Services::all(),
        ]);
        return view('frontend.pages.blog');
    }

    /* blog details */
    public function blog_details($blogname)
    {
        $findBlog = blogs::where('heading', urldecode(str_replace('-', ' ', $blogname)))->first();
        view()->share([
            'blogData' => $findBlog,
            'blogcategories' => blog_categories::all(),
            'blogs' => blogs::with('blogCategory')->orderBy('id', 'DESC')->get(),
            'category' => '',
            'url' => urldecode(str_replace('-', ' ', $blogname)),
            'meta_title' => $findBlog->meta_title,
            'meta_description' => $findBlog->meta_description,
            'about_us_description' => HeaderAndDescriptions::where('keyword', 'aboutusheadinganddescription')->first()->description,
            'services' => Services::all(),
        ]);
        return view('frontend.pages.blog_details');
    }

    /* portfolio details */
    public function gotoPortfolioDetails($portfolioid)
    {
        $portfolio_id = Crypt::decryptString($portfolioid);
        $portfolio_details = PortfolioModel::find($portfolio_id);
        return view('frontend.portfolio_details', compact('portfolio_details'));
    }

    /* privecy policy */
    public function privacyPolicy()
    {
        view()->share([
            'about_us_description' => HeaderAndDescriptions::where('keyword', 'aboutusheadinganddescription')->first()->description,
        ]);
        return view('frontend.pages.external_pages.privecy_policy');
    }

    /* Terms & Conditions */
    public function termsAndConditions()
    {
        view()->share([
            'about_us_description' => HeaderAndDescriptions::where('keyword', 'aboutusheadinganddescription')->first()->description,
        ]);
        return view('frontend.pages.external_pages.terms_and_conditions');
    }

    /* career */
    public function career()
    {
        view()->share([
            'about_us_description' => HeaderAndDescriptions::where('keyword', 'aboutusheadinganddescription')->first()->description,
        ]);
        return view('frontend.pages.external_pages.career');
    }

    /* refund policy */
    public function refundPolicy()
    {
        view()->share([
            'about_us_description' => HeaderAndDescriptions::where('keyword', 'aboutusheadinganddescription')->first()->description,
        ]);
        return view('frontend.pages.external_pages.refund_policy');
    }

    /* disclaimer */
    public function disclaimer()
    {
        view()->share([
            'about_us_description' => HeaderAndDescriptions::where('keyword', 'aboutusheadinganddescription')->first()->description,
        ]);
        return view('frontend.pages.external_pages.disclaimer');
    }

    /* disclaimer */
    public function policies()
    {
        view()->share([
            'about_us_description' => HeaderAndDescriptions::where('keyword', 'aboutusheadinganddescription')->first()->description,
        ]);
        return view('frontend.pages.external_pages.policies');
    }

    /* send career mail */
    public function CareerMail(Request $request)
    {
        $body = "Name: $request->fullname, <br> Position: $request->post <br> Email: $request->email <br> Phone: $request->phone <br>City: $request->city <br>Skills: $request->skills <br>Experience: $request->experience <br>Qualification: $request->qualification";

        $image = $request->file('resume');
        $input['imagename'] = time() . $request->filename;
        $destinationPath = public_path('/document_bucket');
        $image->move($destinationPath, $input['imagename']);
        $filePath =  '/document_bucket/' . $input['imagename'];
        sendCareerMail('careers@webtadka.com', 'New Job Application', $body, 'careers@webtadka.com', $filePath);
        unlink(public_path($filePath));
        return response()->json([
            'status' => true,
            'message' => 'Thanks for your response, we will contact you asap',
        ]);
    }

    /* partner program */
    public function partnerProgramm()
    {
        view()->share([
            'about_us_description' => HeaderAndDescriptions::where('keyword', 'aboutusheadinganddescription')->first()->description,
        ]);
        return view('frontend.pages.external_pages.partner');
    }
}
