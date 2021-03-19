<?php namespace App\Laravel\Requests\Web;

use Session,Auth;
use App\Laravel\Requests\RequestManager;
use App\Laravel\Models\PermitType;


class BusinessApplicationRequest extends RequestManager{

	public function rules(){

		$id = $this->route('id')?:0;
		$case = session()->get('current_progress');
		$service_id = $this->get('service_id');
		$count = PermitType::where('service_id',$service_id)->count();
		switch ($case) {
			case '1':
				$rules = [
					'service_id' => "required",
				];
				if ($count > 0 ) {
					$rules['permit_id'] = "required";
				}
				break;
			case '2':
				$rules = [
					'locator_enterprise' => "required",
					'project_title' => "required",
					'locator_zone' => "required",
					'contractor' => "required",
					'prc_license' => "required",
					'certificate' => "required",
					'loa' => "required",
					'agreement_check' => "required",
				];

				
				break;
			default:
				# code...
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