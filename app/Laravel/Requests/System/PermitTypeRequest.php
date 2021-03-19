<?php namespace App\Laravel\Requests\System;

use Session,Auth;
use App\Laravel\Requests\RequestManager;

class PermitTypeRequest extends RequestManager{

	public function rules(){

		$rules = [
			'name' => "required|unique:service,name,NULL,id,deleted_at,NULL",
			'service_id' => "required"
		];

		return $rules;
	}

	public function messages(){
		return [
			'required'	=> "Field is required.",
			'name.unique'	=> "The Service type name is already exist.",
		];
	}
}