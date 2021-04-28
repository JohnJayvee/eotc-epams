<?php namespace App\Laravel\Requests\Web;

use Session,Auth;
use App\Laravel\Requests\RequestManager;

class CompanyRequest extends RequestManager{

	public function rules(){

		$rules = [
			'company_name' => "required",
			'description' => "required",
			

		];


		return $rules;
		
	}

	public function messages(){
		return [
			'required'	=> "Field is required.",
		];

	}
}