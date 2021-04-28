<?php namespace App\Laravel\Requests\System;

use Session,Auth;
use App\Laravel\Requests\RequestManager;

class CompanyRequest extends RequestManager{

	public function rules(){

		$rules = [
			'entity_code' => "required",
			'comp_code' => "required",
			'urn' => "required",
			'type' => "required",
			'type_code' => "required",
			'zone_code' => "required",
			'cr_no' => "required",
			'industry' => "required",
			'region_code' => "required",
			'region' => "required",
			'province' => "required",
			'city' => "required",
			'obo_cluster' => "required",
			'income_cluster' => "required",
		];


		return $rules;
		
	}

	public function messages(){
		return [
			'required'	=> "Field is required.",
		];

	}
}