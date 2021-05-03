<?php

namespace App\Laravel\Controllers\Web;

/*
 * Request Validator
 */

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

use App\Laravel\Requests\PageRequest;
use App\Laravel\Requests\Web\RegisterRequest;

/*
 * Models
 */
use App\Laravel\Models\Customer;
use App\Laravel\Models\ZoneLocation;
use App\Laravel\Models\CustomerFile;


use App\Laravel\Listeners\SendCode;

use Carbon,Auth,DB,Str,ImageUploader,Event,Helper,FileUploader;

class AuthController extends Controller{

	protected $data;

	public function __construct(){
		parent::__construct();
		$this->data['gender_type'] = ['' => "Choose Gender",'male' =>  "MALE",'female' => "FEMALE"];
		$this->data['types'] = ['pcab' => "PCAB",'undertaking' =>  "UNDERTAKING"];
		$this->data['zone_locations'] = ['' => "Choose Zone Location"] + ZoneLocation::pluck('ecozone', 'id')->toArray();
		$this->data['enterprises'] = ['' => "Choose Enterprise Type",'agro-industrial' =>  "Agro-Industrial",'domestic_market' => "Domestic Market" , "export" => "Export" , "facilities" => "Facilities" , "free_trade" => "Free Trade" , "I.T" => "I.T" ,"i.t_facilities" => "I.T Facilities" , "logistics_service" => "Logistics Service" , "medical_tourism" => "Medical Tourism" , "regional_warehouse" => "Regional Warehouse" , "service" => "Service" ,"tourism" => "Tourism" , "utilities" => "Utilities"];
	}

	public function login(PageRequest $request, $redirect_uri = NULL){
		$this->data['page_title'] = " :: Login";

		$request->session()->forget('current_progress');
		$request->session()->forget('registration');

		return view('web.auth.login',$this->data);
	}
	public function authenticate(PageRequest $request){

		try{
			$this->data['page_title'] = " :: Login";
			$email = $request->get('email');
			$password = $request->get('password');

			if(Auth::guard('customer')->attempt(['email' => $email,'password' => $password]) || Auth::guard('customer')->attempt(['username' => $email,'password' => $password])){

				$user = Auth::guard('customer')->user();
				session()->put('auth_id', Auth::guard('customer')->user()->id);
				session()->flash('notification-status','success');
				session()->flash('notification-msg',"Welcome to EOTC Portal, {$user->full_name}!");

				return redirect()->route('web.business.index');
			}
			session()->flash('notification-status','error');
			session()->flash('notification-msg','Wrong username or password.');
			return redirect()->back();

		}catch(Exception $e){
			abort(500);
		}
	}

	public function register(PageRequest $request){
		$this->data['page_title'] = " :: Create Account";

		$current_progress = $request->session()->get('current_progress');
		switch ($current_progress) {
			case '1':
				return view('web.auth.account-details',$this->data);
				break;
			case '2':
				return view('web.auth.account-information',$this->data);
				break;
			case '3':
				return view('web.auth.company-information',$this->data);
				break;
			case '4':
				return view('web.auth.account-id',$this->data);
				break;
			default:
				return view('web.auth.account-details',$this->data);
				break;
		}	
	}

	public function revert (PageRequest $request){
		
		$current_progress = $request->session()->get('current_progress');
		if ($current_progress > 1) {
			session()->put('current_progress',$current_progress - 1);
			
		}else{
			session()->put('current_progress', 1);
		}

		return redirect()->route("web.register.index");
	}

	public function store(RegisterRequest $request){
		$current_progress = $request->session()->get('current_progress');
		
		switch ($current_progress) {
			case '1':
				$request->session()->put('registration.email',$request->get('email'));
				$request->session()->put('registration.password',$request->get('password'));
				$request->session()->put('registration.username',$request->get('username'));
				$request->session()->put('registration.account_type',$request->get('account_type'));
				
				session()->put('current_progress',$current_progress + 1) ;
				break;
			case '2':
				$request->session()->put('registration.fname',$request->get('fname'));
				$request->session()->put('registration.lname',$request->get('lname'));
				$request->session()->put('registration.mname',$request->get('mname'));
				$request->session()->put('registration.position',$request->get('position'));
				$request->session()->put('registration.primary_phone',$request->get('primary_phone'));
				$request->session()->put('registration.alternate_phone',$request->get('alternate_phone'));
				$request->session()->put('registration.fax',$request->get('fax'));
				
				session()->put('current_progress',$current_progress + 1) ;

				break;
			case '3':
				$request->session()->put('registration.company_name',$request->get('company_name'));
				$request->session()->put('registration.company_id',$request->get('company_id'));
				$request->session()->put('registration.zone_id',$request->get('zone_id'));
				$request->session()->put('registration.enterprise_type',$request->get('enterprise_type'));
				$request->session()->put('registration.cr_number',$request->get('cr_number'));
				
				session()->put('current_progress',$current_progress + 1) ;
				break;
			case '4':
				$new_customer = new Customer;
				$new_customer->email = $request->session()->get('registration.email');
				$new_customer->username = $request->session()->get('registration.username');
				$new_customer->password = bcrypt($request->session()->get('registration.password'));
				$new_customer->type = $request->session()->get('registration.account_type');

				$new_customer->fname = $request->session()->get('registration.fname');
				$new_customer->lname = $request->session()->get('registration.lname');
				$new_customer->mname = $request->session()->get('registration.mname');
				$new_customer->position = $request->session()->get('registration.position');
				$new_customer->primary_phone = $request->session()->get('registration.primary_phone');
				$new_customer->alternate_phone = $request->session()->get('registration.alternate_phone');
				$new_customer->fax = $request->session()->get('registration.fax');

				$new_customer->company_name = $request->session()->get('registration.company_name');
				$new_customer->zone_id = $request->session()->get('registration.zone_id');
				$new_customer->enterprise_type = $request->session()->get('registration.enterprise_type');
				$new_customer->cr_number = $request->session()->get('registration.cr_number');
				$new_customer->save();

				$customer_id = $new_customer->id;

				if($request->hasFile('gov_id_1')) {
	                $image = $request->file('gov_id_1');
	                $ext = $image->getClientOriginalExtension();
	                $original_name = $image->getClientOriginalName();
	                $file_type = 'gov_id_1';
	                $filename = strtoupper(str_replace('-', ' ', Helper::resolve_file_name($file_type)). "_" . $new_customer->name) . "." . $ext;

	                $upload_image = FileUploader::upload($image, 'uploads/'.$customer_id.'/file',$filename);

	                $new_file = new CustomerFile;
	                $new_file->path = $upload_image['path'];
	                $new_file->directory = $upload_image['directory'];
	                $new_file->filename = $filename;
	                $new_file->type = $file_type;
	                $new_file->original_name = $original_name;
	                $new_file->application_id = $customer_id;
	                $new_file->save();
	            }
	            if($request->hasFile('gov_id_2')) {
	                $image = $request->file('gov_id_2');
	                $ext = $image->getClientOriginalExtension();
	                $original_name = $image->getClientOriginalName();
	                $file_type = 'gov_id_2';
	                $filename = strtoupper(str_replace('-', ' ', Helper::resolve_file_name($file_type)). "_" . $new_customer->name) . "." . $ext;

	                $upload_image = FileUploader::upload($image, 'uploads/'.$customer_id.'/file',$filename);

	                $new_file = new CustomerFile;
	                $new_file->path = $upload_image['path'];
	                $new_file->directory = $upload_image['directory'];
	                $new_file->filename = $filename;
	                $new_file->type = $file_type;
	                $new_file->original_name = $original_name;
	                $new_file->application_id = $customer_id;
	                $new_file->save();
	            }
	            if($request->hasFile('endorsement')) {
	                $image = $request->file('endorsement');
	                $ext = $image->getClientOriginalExtension();
	                $original_name = $image->getClientOriginalName();
	                $file_type = 'endorsement';
	                $filename = strtoupper(str_replace('-', ' ', Helper::resolve_file_name($file_type)). "_" . $new_customer->name) . "." . $ext;

	                $upload_image = FileUploader::upload($image, 'uploads/'.$customer_id.'/file',$filename);

	                $new_file = new CustomerFile;
	                $new_file->path = $upload_image['path'];
	                $new_file->directory = $upload_image['directory'];
	                $new_file->filename = $filename;
	                $new_file->type = $file_type;
	                $new_file->original_name = $original_name;
	                $new_file->application_id = $customer_id;
	                $new_file->save();
	            }
	            
	            $request->session()->forget('current_progress');
				$request->session()->forget('registration');

				session()->flash('notification-status', "success");
				session()->flash('notification-msg','Successfully registered.');
				return redirect()->route('web.login');
				break;
			default:
				break;
		}
		return redirect()->route("web.register.index");

	}
	public function verify(){
		$this->data['page_title'] = " :: Verify Account";
		return view('web.auth.verify',$this->data);

	}

	public function verified($id = NULL , PageRequest $request){

		$verified_user = User::where('id',$id)->where('code',$request->get('code'))->first();

		if ($verified_user) {
			User::where('id',$id)->update(['active' => "1"]);
			session()->flash('notification-status', "success");
			session()->flash('notification-msg','Your Account has been Successfully verified.');
			return redirect()->route('web.login');
		}
		else{
			Session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Verification Failed");
			return redirect()->back();
		}

	}
	public function destroy(){
		Auth::guard('customer')->logout();
		session()->forget('auth_id');
		session()->flash('notification-status','success');
		session()->flash('notification-msg','You are now signed off.');
		return redirect()->route('web.login');
	}
	
	
}
