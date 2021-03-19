<?php namespace App\Laravel\Requests\Web;

use Session,Auth;
use App\Laravel\Requests\RequestManager;

class UpdateBusinessRequest extends RequestManager{

	public function rules(){

		$id = $this->route('id')?:0;
		$file = $this->file('file') ? count($this->file('file')) : 0;

		$rules = [
			'company_name' => "required",
			'zone_id' => "required",
			'brgy' => "required",
			'town' => "required",
			'region' => "required",
			'exact_location' => "required",
			'first_name' => "required",
			'last_name' => "required",
			'middle_name' => "required",
			'email' => "required",
			'contact_number' => "required",
			'telephone_number' => "required",

		];


		return $rules;
		
	}

	public function messages(){
		return [
			'required'	=> "Field is required.",

		];

	}
}