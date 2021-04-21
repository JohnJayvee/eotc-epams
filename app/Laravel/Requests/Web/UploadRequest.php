<?php namespace App\Laravel\Requests\Web;

use Session,Auth;
use App\Laravel\Requests\RequestManager;
use App\Laravel\Models\ApplicationRequirements;

class UploadRequest extends RequestManager{

	public function rules(){

		$required = ApplicationRequirements::whereIn('id',$this->get('requirements_id'))->get();

		foreach ($required as $key => $value) {
			$rules['file'.$value->id] = "required|mimes:pdf,docx,doc|max:8192";
		}

		return $rules;
		
	}

	public function messages(){
		return [
			'required'	=> "Field is required.",
			'file.required'	=> "No File Uploaded.",
			'file.*' => 'Only PDF File are allowed.'
		];
	}
}