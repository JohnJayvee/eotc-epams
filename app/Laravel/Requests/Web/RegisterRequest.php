<?php namespace App\Laravel\Requests\Web;

use Session,Auth;
use App\Laravel\Requests\RequestManager;

class RegisterRequest extends RequestManager{

	public function rules(){

		$current_progress = $this->session()->get('current_progress');
		// dd($current_progress);
		$rules = [];
		switch($current_progress){
			case 1:
				$rules = [
					'email'		=> "required|email|unique:customer,email",
					'password'		=> "required|password_format|confirmed",
					'account_type'		=> "required",

				];
				if ($this->get('account_type') == "company") {
					$rules['company_name'] = "required";
					$rules['company_address'] = "required";
					$rules['company_first_name'] = "required";
					$rules['company_last_name'] = "required";
					$rules['company_middle_name'] = "required";
					$rules['company_email'] = "required|email";
					$rules['tel_number'] = "nullable";
					$rules['company_contact_number'] = "required|max:10|phone:PH";

				}
				if ($this->get('account_type') == "contractor") {
					$rules['pcab_undertaking'] = "required";
					$rules['validity_period'] = "required";
					$rules['contractor_id'] = "required";
					$rules['other_classification'] = "required";
					$rules['classification'] = "required";
					$rules['contractor_name'] = "required";
					$rules['contractor_contact_number'] = "required|max:10|phone:PH";
				}
				break;
			case 2:
				$rules = [
					'gov_id_1' => 'required|mimes:jpeg,jpg,png,JPEG,PNG,pdf,docx,doc|max:5000',
		            'gov_id_2' => 'required|mimes:jpeg,jpg,png,JPEG,PNG,pdf,docx,doc|max:5000',
		            'business_permit' => 'required|mimes:jpeg,jpg,png,JPEG,PNG,pdf,docx,doc|max:5000',
				];
				break;
			default:
			break;
		}
		return $rules;

	}

	public function messages(){
		return [
			'required'	=> "Field is required.",
			'max' => "5mb size file only",
			'contact_number.phone' => "Please provide a valid PH mobile number.",
			'password_format' => "Password must be 6-20 alphanumeric and some allowed special characters only.",
		];
	}
}