<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Models\servicesEnquiry;
use App\Models\subServicesModel;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        view()->share([
            'pageTitle' => 'Service Master',
            'services' => Services::all(),
        ]);
        return view('admin_dashboard.services.servicemaster');
    }

    public function getSubServices(Request $request)
    {
        if ($request->has('serviceId') && $request->serviceId != '') {
            return subServicesModel::where('service_id', $request->serviceId)->get();
        }
    }

    public function getData(Request $request){
        return servicesEnquiry::where('service_id',$request->serviceId)->where('subservice_id',$request->subserviceId)->get();
    }
}
