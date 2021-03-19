<?php

namespace App\Laravel\Controllers\Web;

use App\Laravel\Models\Business;
use App\Laravel\Models\BusinessApplication;
use App\Laravel\Models\Services;
use App\Laravel\Models\ApplicationBusinessPermitRequirements;


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

                return view('web.business-application.create_1', $this->data);
                break;
            case '2':
                return view('web.business-application.create_2', $this->data);
                break;
            default:
                return view('web.business-application.create_1', $this->data);
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
                $new_business_application->locator_enterprise = $request->get('locator_enterprise') ;
                $new_business_application->project_title = $request->get('project_title') ;
                $new_business_application->locator_zone = $request->get('locator_zone') ;
                $new_business_application->contractor = $request->get('contractor') ;
                $new_business_application->is_agreement_check = $request->get('agreement_check');

                $new_business_application->save();

               
                if($request->hasFile('prc_license')) {
                    $image = $request->file('prc_license');
                    $ext = $image->getClientOriginalExtension();
                    if($ext == 'pdf' || $ext == 'docx' || $ext == 'doc'){
                        $filetype = 'pdf_file';
                        $original_filename = $image->getClientOriginalName();
                        $upload_image = FileUploader::upload($image, 'storage/file/documents');
                    } elseif($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png'){
                        $filetype = 'image_file';
                        $original_filename = $image->getClientOriginalName();
                        $upload_image = ImageUploader::upload($image, "uploads/images/business_groups/groups");
                    }

                    $new_requirements = new ApplicationBusinessPermitRequirements();
                    $new_requirements->application_id = $new_business_application->id;
                    $new_requirements->path = $upload_image['path'];
                    $new_requirements->directory = $upload_image['directory'];
                    $new_requirements->filename = $upload_image['filename'];
                    $new_requirements->original_name =$original_filename;
                    $new_requirements->type = $filetype;
                    $new_requirements->save();

                }
                if($request->hasFile('certificate')) {
                    $image = $request->file('certificate');
                    $ext = $image->getClientOriginalExtension();
                    if($ext == 'pdf' || $ext == 'docx' || $ext == 'doc'){
                        $filetype = 'pdf_file';
                        $original_filename = $image->getClientOriginalName();
                        $upload_image = FileUploader::upload($image, 'storage/file/documents');
                    } elseif($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png'){
                        $filetype = 'image_file';
                        $original_filename = $image->getClientOriginalName();
                        $upload_image = ImageUploader::upload($image, "uploads/images/business_groups/groups");
                    }

                    $new_requirements = new ApplicationBusinessPermitRequirements();
                    $new_requirements->application_id = $new_business_application->id;
                    $new_requirements->path = $upload_image['path'];
                    $new_requirements->directory = $upload_image['directory'];
                    $new_requirements->filename = $upload_image['filename'];
                    $new_requirements->original_name =$original_filename;
                    $new_requirements->type = $filetype;
                    $new_requirements->save();
                    
                }
                if($request->hasFile('loa')) {
                    $image = $request->file('loa');
                    $ext = $image->getClientOriginalExtension();
                    if($ext == 'pdf' || $ext == 'docx' || $ext == 'doc'){
                        $filetype = 'pdf_file';
                        $original_filename = $image->getClientOriginalName();
                        $upload_image = FileUploader::upload($image, 'storage/file/documents');
                    } elseif($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png'){
                        $filetype = 'image_file';
                        $original_filename = $image->getClientOriginalName();
                        $upload_image = ImageUploader::upload($image, "uploads/images/business_groups/groups");
                    }

                    $new_requirements = new ApplicationBusinessPermitRequirements();
                    $new_requirements->application_id = $new_business_application->id;
                    $new_requirements->path = $upload_image['path'];
                    $new_requirements->directory = $upload_image['directory'];
                    $new_requirements->filename = $upload_image['filename'];
                    $new_requirements->original_name =$original_filename;
                    $new_requirements->type = $filetype;
                    $new_requirements->save();
                    
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
