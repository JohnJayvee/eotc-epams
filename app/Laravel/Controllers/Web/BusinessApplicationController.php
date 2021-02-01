<?php

namespace App\Laravel\Controllers\Web;

use App\Laravel\Models\Business;
use App\Http\Controllers\Controller;

use App\Laravel\Requests\PageRequest;
use Carbon,Auth,DB,Str,ImageUploader,Event,FileUploader,PDF,QrCode,Helper,Curl,Log;

class BusinessApplicationController extends Controller
{
    public function index(PageRequest $request){
        $this->data['page_title'] = "Business Application";
        if (Auth::guard('customer')->user()) {
			$this->data['auth'] = Auth::guard('customer')->user();
			$this->data['business_profiles'] = Business::where('customer_id',$this->data['auth']->id)->get();
		}
        return view('web.business-application.index', $this->data);
    }

    public function building_permit(PageRequest $request){
        $this->data['page_title'] = "Business Application";
        if (Auth::guard('customer')->user()) {
			$this->data['auth'] = Auth::guard('customer')->user();
			$this->data['business_profiles'] = Business::where('customer_id',$this->data['auth']->id)->get();
		}
        return view('web.business-application.building-permit', $this->data);
    }
}
