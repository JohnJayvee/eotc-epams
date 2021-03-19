<?php namespace App\Laravel\Requests\Web;

use Session,Auth;
use App\Laravel\Requests\RequestManager;

class UpdateProfileRequest extends RequestManager{

	public function rules(){

		
		// dd($current_progress);
		$rules = [];
		if ($this->get('type') == "company") {
			$rules['company_name'] = "required";
			$rules['company_address'] = "required";
			$rules['company_first_name'] = "required";
			$rules['company_last_name'] = "required";
			$rules['company_middle_name'] = "required";
			$rules['company_email'] = "required";
			$rules['tel_number'] = "required";
			$rules['company_contact_number'] = "required|max:10|phone:PH";

		}
		if ($this->get('type') == "contractor") {
			$rules['pcab_undertaking'] = "required";
			$rules['validity_period'] = "required";
			$rules['contractor_id'] = "required";
			$rules['other_classification'] = "required";
			$rules['classification'] = "required";
			$rules['contractor_name'] = "required";
			$rules['contractor_contact_number'] = "required|max:10|phone:PH";
		}
		return $rules;

	}

	public function messages(){
		return [
			'required'	=> "Field is required.",
			'contact_number.phone' => "Please provide a valid PH mobile number.",
			'password_format' => "Password must be 6-20 alphanumeric and some allowed special characters only.",
		];
	}
}