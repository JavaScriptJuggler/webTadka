<?php

namespace App\Http\Controllers;

use App\Models\HeaderAndDescriptions;
use App\Models\Heros;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        /* get hero image */
        $fileLocation = '';
        $heroContents = Heros::first();
        foreach (glob(public_path('/heroimage_storage') . '/*') as $file) {
            if (is_file($file)) {
                $fileArray = explode('/', $file);
                $fileLocation = $fileArray[count($fileArray) - 1];
            }
        }
        view()->share([
            'heroImage' => '/heroimage_storage/' . $fileLocation,
            'heroheader' => $heroContents->header_text,
            'heroDescription' => $heroContents->description,
            'heroContents' => $heroContents->contents,
            'seo_heading' => HeaderAndDescriptions::where('keyword', 'servicesanddigitalmarketing')->first()->heading,
            'seo_description' => HeaderAndDescriptions::where('keyword', 'servicesanddigitalmarketing')->first()->description,
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
