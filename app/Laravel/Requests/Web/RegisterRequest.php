<?php namespace App\Laravel\Requests\Web;

use Session,Auth;
use App\Laravel\Requests\RequestManager;

class RegisterRequest extends RequestManager{

	public function rules(){

		$current_progress = $this->session()->get('current_progress');
		$company_name = $this->get('company_name');
		$company_id = $this->get('company_id');

		$rules = [];
		switch($current_progress){
			case 1:
				$rules = [
					'email'		=> "required|email|unique:customer,email",
					'password'		=> "required|password_format|confirmed",
					'account_type'		=> "required",
					'username'		=> "required",
				];
				
				break;
			case 2:
				$rules = [
					'fname'		=> "required",
					'lname'		=> "required",
					'mname'		=> "required",
					'position'		=> "required",
					'primary_phone'		=> "required",
					'alternate_phone'		=> "required",
					'fax'		=> "required",
				];
				break;
			case 3:
				$rules = [
					'company_name'		=> "required|existing_company:company_name,company_id",
					'zone_id'		=> "required",
					'enterprise_type'		=> "required",
					'cr_number'		=> "required",
				];
				break;
			case 4:
				$rules = [
					'gov_id_1' => 'required|mimes:jpeg,jpg,png,JPEG,PNG,pdf,docx,doc|max:5000',
		            'gov_id_2' => 'required|mimes:jpeg,jpg,png,JPEG,PNG,pdf,docx,doc|max:5000',
		            'endorsement' => 'required|mimes:jpeg,jpg,png,JPEG,PNG,pdf,docx,doc|max:5000',
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
			'company_name.existing_company' => 'The Company name you entered is not existing in our database'
		];
	}
}