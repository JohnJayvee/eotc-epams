<?php

namespace App\Laravel\Controllers\Web;


use App\Laravel\Models\{ApplicationRequirements,Business,BusinessApplication,BusinessApplicationFile,Services,PermitType,BusinessScopeOfWork,ApplicationBusinessPermitRequirements,BuildingPermit,ElectricalPermit};
use App\Laravel\Requests\PageRequest;
use App\Laravel\Requests\Web\BusinessApplicationRequest;

use Carbon,Auth,DB,Str,ImageUploader,Event,FileUploader,PDF,QrCode,Helper,Curl,Log;

class BusinessApplicationController extends Controller
{   
    protected $data;
    protected $per_page;
    
    public function __construct(){
        parent::__construct();
        array_merge($this->data, parent::get_data());
        $this->data['services'] = ['' => "All Service Type"] + Services::pluck('name','id')->toArray();

       
        $this->data['permits'] = [''=>"--Choose Permit Type--",'building_permit' => "Building Permit"];

        $this->per_page = env("DEFAULT_PER_PAGE",10);
    }

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

    public function create(PageRequest $request, $id = NULL){
        $this->data['page_title'] = "Business Application";
        if (Auth::guard('customer')->user()) {
            $this->data['auth'] = Auth::guard('customer')->user();
            $this->data['profile'] = Business::find($id);
        }
        $current_progress = $request->session()->get('current_progress');
        switch ($current_progress) {
            case '1':
                return view('web.business-application.create1', $this->data);
                break;
            case '2':
                $this->data['permit'] = PermitType::find($request->session()->get('application.permit_id'));
                $this->data['requirements'] = ApplicationRequirements::whereIn('id',explode(",", $this->data['permit']->requirements_id))->get();
                return view('web.business-application.create2', $this->data);
                break;
            default:
                return view('web.business-application.create1', $this->data);
                break;
        }   
    }

    public function revert (PageRequest $request,$id = NULL){
        $current_progress = $request->session()->get('current_progress');
        if ($current_progress > 1) {
            session()->put('current_progress',$current_progress - 1);
            
        }else{
            session()->put('current_progress', 1);
        }

        return redirect()->route("web.application.create",[$id]);
    }

    public function store(BusinessApplicationRequest $request, $id= NULL){
        $current_progress = $request->session()->get('current_progress');
        

        switch ($current_progress) {
            case '1':
                $request->session()->put('application.service_id',$request->get('service_id'));
                $request->session()->put('application.permit_id',$request->get('permit_id'));
                session()->put('current_progress',$current_progress + 1) ;
                break;
            case '2':
                $new_business_application = new BusinessApplication();
                $new_business_application->business_id = $id;
                $new_business_application->owner_user_id = Auth::guard('customer')->user()->id;
                $new_business_application->service_id = $request->session()->get('application.service_id');
                $new_business_application->permit_id = $request->session()->get('application.permit_id');
                $new_business_application->first_name = $request->get('first_name');
                $new_business_application->last_name = $request->get('last_name');
                $new_business_application->middle_name = $request->get('middle_name');
                $new_business_application->email = $request->get('email');
                $new_business_application->mobile_no = $request->get('mobile_no');
                $new_business_application->tel_no = $request->get('telephone_number');
                $new_business_application->registered_enterprise = $request->get('registered_enterprise');
                $new_business_application->registration_number = $request->get('registration_number');
                $new_business_application->classification = $request->get('classification');
                $new_business_application->occupancy = $request->get('occupancy');
                $new_business_application->contractor = $request->get('contractor');
                $new_business_application->pcab_license_number = $request->get('pcab_license_number');
                $new_business_application->locator_enterprise = $request->get('locator_enterprise');
                $new_business_application->project_title = $request->get('project_title');
                $new_business_application->project_cost = $request->get('project_cost');
                $new_business_application->locator_zone = $request->get('locator_zone');
                $new_business_application->address = $request->get('address');
                $new_business_application->region = $request->get('region');
                $new_business_application->region_name = $request->get('region_name');
                $new_business_application->town = $request->get('town');
                $new_business_application->town_name = $request->get('town_name');
                $new_business_application->brgy = $request->get('brgy');
                $new_business_application->brgy_name = $request->get('brgy_name');
                $new_business_application->zip_code = $request->get('zip_code');
                $new_business_application->is_agreement_check = $request->get('agreement_check');
                $new_business_application->save();

                if ($request->get('scope_of_work')) {
                    foreach ($request->get('scope_of_work') as $key => $value) {
                        $sow = new BusinessScopeOfWork();
                        $sow->name = $value;
                        $sow->type = "sow";
                        $sow->application_id = $new_business_application->id;
                        if ($value == "erection") {
                            $sow->description = $request->get('erection');
                        }
                        if ($value == "addition" ) {
                            $sow->description = $request->get('addition');
                        }
                        if ($value == "conversion") {
                            $sow->description = $request->get('conversion');
                        }
                        if ($value == "repair") {
                            $sow->description = $request->get('repair');
                        }
                        if ($value == "alteration") {
                            $sow->description = $request->get('alteration');
                        }
                        if ($value == "moving") {
                            $sow->description = $request->get('moving');
                        }
                        if ($value == "raising") {
                            $sow->description = $request->get('raising');
                        }
                        if ($value == "accessory") {
                            $sow->description = $request->get('accessory');
                        }
                        if ($value == "others") {
                            $sow->description = $request->get('others');
                        }
                        $sow->save();
                    }
                }
                if ($request->get('character_of_occupancy') || $request->get('permit_type') == "building_permit") {
                    foreach ($request->get('character_of_occupancy') as $key => $value) {
                        $coc = new BusinessScopeOfWork();
                        $coc->name = $value;
                        $coc->type = "coc";
                        $coc->application_id = $new_business_application->id;
                        
                        if ($value == "others") {
                            $coc->description = $request->get('group_others');
                        }
                        $coc->save();
                    }
                }

                 if ($request->get('installation') || $request->get('permit_type') == "mechanical_permit") {
                    foreach ($request->get('installation') as $key => $value) {
                        $sow = new BusinessScopeOfWork();
                        $sow->name = $value;
                        $sow->slug = Str::slug($value);
                        $sow->type = "installation";
                        $sow->application_id = $new_business_application->id;

                        if ($value == "others") {
                            $sow->description = $request->get('others_installation');
                        }
                        $sow->save();
                    }
                }

                switch ($request->get('permit_type')) {
                    case 'building_permit':
                            $new_building_permit = new BuildingPermit();
                            $new_building_permit->application_id = $new_business_application->id;
                            $new_building_permit->fill($request->all());
                            $new_building_permit->save();
                        break;
                    case 'electrical_permit':
                            $new_electrical_permit = new ElectricalPermit();
                            $new_electrical_permit->application_id = $new_business_application->id;
                            $new_electrical_permit->fill($request->all());
                            $new_electrical_permit->save();
                        break;
                    default:
                        
                        break;
                }
             
                $request->session()->forget('current_progress');
                $request->session()->forget('application');

                session()->flash('notification-status', "success");
                session()->flash('notification-msg','Application has successfuly submitted.');
                return redirect()->route('web.business.profile',[$id]);

                break;
            default:
                break;
        }
        return redirect()->route("web.application.create",[$id]);

    }
}
