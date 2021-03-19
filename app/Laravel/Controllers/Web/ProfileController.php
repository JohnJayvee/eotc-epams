<?php
namespace App\Laravel\Controllers\Web;

/*
 * Request Validator
 */
use App\Laravel\Requests\PageRequest;
use App\Laravel\Requests\Web\UpdateProfileRequest;


/*
 * Models
 */
use App\Laravel\Models\{Customer, CustomerFile};

/* App Classes
 */

use Carbon,Auth,DB,Str,ImageUploader,FileUploader,Helper;

class ProfileController extends Controller
{
    protected $data;
	protected $per_page;
	
	public function __construct(){
		parent::__construct();
		$this->data['types'] = ['pcab' => "PCAB",'undertaking' =>  "UNDERTAKING"];
		array_merge($this->data, parent::get_data());

	}

		
	public function index(PageRequest $request){
		
		$this->data['page_title'] = "Profile";
		if (Auth::guard('customer')->user()) {
			$auth_id = Auth::guard('customer')->user()->id;
			$this->data['customer'] = Customer::find($auth_id);
		}
		return view('web.auth.profile',$this->data);
	}

	public function update(UpdateProfileRequest $request){
		DB::beginTransaction();
		try{
			$auth = Auth::guard('customer')->user();

			$profile = Customer::find($auth->id);
			if ($profile->type == "company") {
				$profile->company_name = $request->get('company_name');
				$profile->company_address = $request->get('company_address');
				$profile->company_first_name = $request->get('company_first_name');
				$profile->company_last_name = $request->get('company_last_name');
				$profile->company_middle_name = $request->get('company_middle_name');
				$profile->company_email = $request->get('company_email');
				$profile->tel_number = $request->get('tel_number');
				$profile->company_contact_number = $request->get('company_contact_number');
			}
			
			if ($profile->type == "contractor") {
				$profile->pcab_undertaking = $request->get('pcab_undertaking');
				$profile->validity_period = $request->get('validity_period');
				$profile->contractor_id = $request->get('contractor_id');
				$profile->other_classification = $request->get('other_classification');
				$profile->classification = $request->get('classification');
				$profile->contractor_name = $request->get('contractor_name');
				$profile->contractor_contact_number = $request->get('contractor_contact_number');
			}

			$profile->save();
			DB::commit();
			session()->flash('notification-status', "success");
			session()->flash('notification-msg', "Profile Succssfully Modified.");
			return redirect()->route('web.profile.index');

		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Server Error: Code #{$e->getLine()}");
			return redirect()->back();
		}
	}


}
