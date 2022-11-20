<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class seoAndDigitalMarketingController extends Controller
{
    public function goToSeoDigitalPage()
    {
        view()->share([
            'pageTitle' => 'Seo & Digital Marketing',
        ]);
        return view('admin_dashboard.seoAndDigitalMarketing.seoanddigital');
    }
}
