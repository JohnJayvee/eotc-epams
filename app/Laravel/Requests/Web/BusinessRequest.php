<?php namespace App\Laravel\Requests\Web;

use Session,Auth;
use App\Laravel\Requests\RequestManager;

class BusinessRequest extends RequestManager{

	public function rules(){

		$current_progress = $this->session()->get('business_current_progress');

		$rules = [];

		switch($current_progress){
			case 1:
				$rules = [
					'company_name'		=> "required",
					'zone_id'		    => "required",
				];
				break;
			case 2:
				$rules = [
					'brgy'		     => "required",
					'town'		     => "required",
					'region'		 => "required",
					'exact_location' => "required",
				];
				break;
			case 3:
				$rules = [
					'first_name'		     => "required",
					'last_name'		     => "required",
					'middle_name'		     => "nullable",
					'email'		     => "required|email",
					'mobile_number'		     => "required",
					'telephone_number'		     => "nullable",
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

		];

	}
}