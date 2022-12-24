<?php

namespace App\Http\Controllers;

use App\Models\blogs;
use Illuminate\Http\Request;

class sitemapController extends Controller
{
    public function index()
    {
        $blogs = blogs::all();

        return response()->view('sitemap.sitemap', compact('blogs'))->header('Content-Type', 'text/xml');;
    }
}
