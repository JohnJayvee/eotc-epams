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
use App\Laravel\Models\CustomerFile;


use App\Laravel\Listeners\SendCode;

use Carbon,Auth,DB,Str,ImageUploader,Event,Helper,FileUploader;

class AuthController extends Controller{

	protected $data;

	public function __construct(){
		parent::__construct();
		$this->data['gender_type'] = ['' => "Choose Gender",'male' =>  "MALE",'female' => "FEMALE"];
		$this->data['types'] = ['pcab' => "PCAB",'undertaking' =>  "UNDERTAKING"];
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

			if(Auth::guard('customer')->attempt(['email' => $email,'password' => $password])){

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
				$request->session()->put('registration.account_type',$request->get('account_type'));

				if ($request->get('account_type') == "contractor") {
					$request->session()->put('registration.pcab_undertaking',$request->get('pcab_undertaking'));
					$request->session()->put('registration.validity_period',$request->get('validity_period'));
					$request->session()->put('registration.other_classification',$request->get('other_classification'));
					$request->session()->put('registration.classification',$request->get('classification'));
					$request->session()->put('registration.contractor_id',$request->get('contractor_id'));
					$request->session()->put('registration.contractor_name',$request->get('contractor_name'));
					$request->session()->put('registration.contractor_contact_number',$request->get('contractor_contact_number'));
				}
				
				if ($request->get('account_type') == "company") {

					$request->session()->put('registration.company_name',$request->get('company_name'));
					$request->session()->put('registration.company_address',$request->get('company_address'));
					$request->session()->put('registration.company_first_name',$request->get('company_first_name'));
					$request->session()->put('registration.company_last_name',$request->get('company_last_name'));
					$request->session()->put('registration.company_middle_name',$request->get('company_middle_name'));
					$request->session()->put('registration.company_email',$request->get('company_email'));
					$request->session()->put('registration.tel_number',$request->get('tel_number'));
					$request->session()->put('registration.company_contact_number',$request->get('company_contact_number'));
				}

				session()->put('current_progress',$current_progress + 1) ;
				break;
			case '2':
				$new_customer = new Customer;
				$new_customer->email = $request->session()->get('registration.email');
				$new_customer->password = bcrypt($request->session()->get('registration.password'));
				$new_customer->type = $request->session()->get('registration.account_type');

				$new_customer->company_name = $request->session()->get('registration.company_name');
				$new_customer->company_address = $request->session()->get('registration.company_address');
				$new_customer->company_first_name = $request->session()->get('registration.company_first_name');
				$new_customer->company_last_name = $request->session()->get('registration.company_last_name');
				$new_customer->company_middle_name = $request->session()->get('registration.company_middle_name');
				$new_customer->company_email = $request->session()->get('registration.company_email');
				$new_customer->tel_number = $request->session()->get('registration.tel_number');
				$new_customer->company_contact_number = $request->session()->get('registration.company_contact_number');

				$new_customer->pcab_undertaking = $request->session()->get('registration.pcab_undertaking');
				$new_customer->validity_period = $request->session()->get('registration.validity_period');
				$new_customer->contractor_id = $request->session()->get('registration.contractor_id');
				$new_customer->other_classification = $request->session()->get('registration.other_classification');
				$new_customer->classification = $request->session()->get('registration.classification');
				$new_customer->contractor_name = $request->session()->get('registration.contractor_name');
				$new_customer->contractor_contact_number = $request->session()->get('registration.contractor_contact_number');

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
	            if($request->hasFile('business_permit')) {
	                $image = $request->file('business_permit');
	                $ext = $image->getClientOriginalExtension();
	                $original_name = $image->getClientOriginalName();
	                $file_type = 'business_permit';
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
				$request->session()->forget('percent');

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
