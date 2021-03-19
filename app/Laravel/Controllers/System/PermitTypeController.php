<?php

namespace App\Laravel\Controllers\System;

/*
 * Request Validator
 */
use App\Laravel\Requests\PageRequest;
use App\Laravel\Requests\System\PermitTypeRequest;

/*
 * Models
 */
use App\Laravel\Models\PermitType;
use App\Laravel\Models\Services;

/* App Classes
 */


use Carbon,Auth,DB,Str,Helper,Excel;

class PermitTypeController extends Controller
{
    protected $data;
	protected $per_page;
	
	public function __construct(){
		parent::__construct();
		array_merge($this->data, parent::get_data());
		$this->data['services'] = ['' => "All Service Type"] + Services::pluck('name','id')->toArray();

		$this->per_page = env("DEFAULT_PER_PAGE",10);
	}

	public function  index(PageRequest $request){
		$this->data['page_title'] = "Permit Type";
		$this->data['permit_types'] = PermitType::orderBy('created_at',"DESC")->paginate($this->per_page);
		return view('system.permit-type.index',$this->data);
	}

	public function  create(PageRequest $request){
		$this->data['page_title'] .= " - Add new record";
		return view('system.permit-type.create',$this->data);
	}
	public function store(PermitTypeRequest $request){
		DB::beginTransaction();
		try{
			
			$new_permit_type = new PermitType();
			$new_permit_type->name = $request->get('name');
			$new_permit_type->service_id = $request->get('service_id');
			$new_permit_type->save();

			DB::commit();
			session()->flash('notification-status', "success");
			session()->flash('notification-msg', "New Service Type has been added.");
			return redirect()->route('system.permit_type.index');
		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Server Error: Code #{$e->getLine()}");
			return redirect()->back();

		}
	}
	public function  edit(PageRequest $request,$id = NULL){
		$this->data['page_title'] .= " - Edit record";
		$this->data['permit_type'] = $request->get('permit_type_data');
		return view('system.permit-type.edit',$this->data);
	}

	public function  update(PermitTypeRequest $request,$id = NULL){
		DB::beginTransaction();
		try{

			$permit_type = $request->get('permit_type_data');
			$permit_type->name = $request->get('name');
			$permit_type->service_id = $request->get('service_id');
			$permit_type->save();

			DB::commit();
			session()->flash('notification-status', "success");
			session()->flash('notification-msg', "Permit Type had been modified.");
			return redirect()->route('system.permit_type.index');
		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Server Error: Code #{$e->getLine()}");
			return redirect()->back();
		}
	}

	public function  destroy(PageRequest $request,$id = NULL){
		$permit_type = $request->get('permit_type_data');
		DB::beginTransaction();
		try{
			$permit_type->delete();
			DB::commit();
			session()->flash('notification-status', "success");
			session()->flash('notification-msg', "Permit Type removed successfully.");
			return redirect()->route('system.permit_type.index');
		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Server Error: Code #{$e->getLine()}");
			return redirect()->back();
		}
	}
	
}
