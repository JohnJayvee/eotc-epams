<?php namespace App\Laravel\Requests\Web;

use Session,Auth;
use App\Laravel\Requests\RequestManager;
use App\Laravel\Models\PermitType;
use App\Laravel\Models\ApplicationRequirements;


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
					'first_name' => "required",
					'last_name' => "required",
					'middle_name' => "required",
					'email' => "required",
					'mobile_no' => "required",
					'telephone_number' => "required",
					'registered_enterprise' => "required",
					'registration_number' => "required",
					'classification' => "required",
					'occupancy' => "required",
					'contractor' => "required",
					'pcab_license_number' => "required",
					'locator_enterprise' => "required",
					'project_title' => "required",
					'locator_zone' => "required",
					'address' => "required",
					'region' => "required",
					'town' => "required",
					'brgy' => "required",
					'agreement_check' => "required",
					'scope_of_work' => "required",
					'project_cost' => "required",
				];
				if ($this->get('permit_type') == "mechanical_permit") {
					$rules['installation'] = "required";
				}
				if ($this->get('permit_type') == "building_permit") {
					$rules['character_of_occupancy'] = "required";
					$rules['occupancy_classified'] = "required";
					$rules['unit_no'] = "required";
					$rules['proposed_date'] = "required";
					$rules['expected_date'] = "required";
					$rules['related_permits'] = "required";
					$rules['floor_area'] = "required";
				}
				if ($this->get('permit_type') == "electrical_permit") {
					$rules['connected_load'] = "required";
					$rules['transformer_capacity'] = "required";
					$rules['ups_capacity'] = "required";
				}
				if ($this->get('permit_type') == "fencing_permit") {
					$rules['clearance'] = "required";
					$rules['type_of_fencing'] = "required";
					$rules['length'] = "required";
					$rules['height'] = "required";
				}
				
				$required = ApplicationRequirements::whereIn('id',explode(",", $this->get('requirements_id')))->where('is_required',"yes")->get();
				foreach ($required as $key => $value) {
					$rules['file'.$value->id] = "required|mimes:pdf,docx,doc|max:5000";
				}

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