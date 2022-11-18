<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        /* get hero image */
        $fileLocation = '';
        foreach (glob(public_path('/heroimage_storage') . '/*') as $file) {
            if (is_file($file)) {
                $fileArray = explode('/', $file);
                $fileLocation = $fileArray[count($fileArray) - 1];
            }
        }
        view()->share([
            'heroImage' => '/heroimage_storage/' . $fileLocation,
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
