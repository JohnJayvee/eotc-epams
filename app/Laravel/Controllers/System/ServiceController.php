<?php

namespace App\Laravel\Controllers\System;

/*
 * Request Validator
 */
use App\Laravel\Requests\PageRequest;
use App\Laravel\Requests\System\ServiceRequest;
/*
 * Models
 */
use App\Laravel\Models\Services;
/* App Classes
 */


use Carbon,Auth,DB,Str,Helper,Excel;

class ServiceController extends Controller
{
    protected $data;
	protected $per_page;
	
	public function __construct(){
		parent::__construct();
		array_merge($this->data, parent::get_data());
		$this->per_page = env("DEFAULT_PER_PAGE",10);
	}

	public function  index(PageRequest $request){
		$this->data['page_title'] = "Services";
		$this->data['services'] = Services::orderBy('created_at',"DESC")->paginate($this->per_page);
		return view('system.service.index',$this->data);
	}

	public function  create(PageRequest $request){
		$this->data['page_title'] .= " - Add new record";
		return view('system.service.create',$this->data);
	}
	public function store(ServiceRequest $request){
		DB::beginTransaction();
		try{
			$new_service = new Services();
			$new_service->name = $request->get('name');
			
			$new_service->save();
			DB::commit();
			session()->flash('notification-status', "success");
			session()->flash('notification-msg', "New Service Type has been added.");
			return redirect()->route('system.service.index');
		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Server Error: Code #{$e->getLine()}");
			return response()->json(['success'=>'errorList','message'=> $e->errors()]);

		}
	}

	public function  edit(PageRequest $request,$id = NULL){
		$this->data['page_title'] .= " - Edit record";
		$this->data['service'] = $request->get('service_data');
		return view('system.service.edit',$this->data);
	}

	public function  update(ServiceRequest $request,$id = NULL){
		DB::beginTransaction();
		try{

			$service = $request->get('service_data');
			$service->name = $request->get('name');
			$service->save();

			DB::commit();
			session()->flash('notification-status', "success");
			session()->flash('notification-msg', "Service Type had been modified.");
			return redirect()->route('system.service.index');
		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Server Error: Code #{$e->getLine()}");
			return redirect()->back();
		}
	}

	public function  destroy(PageRequest $request,$id = NULL){
		$service = $request->get('service_data');
		DB::beginTransaction();
		try{
			$service->delete();
			DB::commit();
			session()->flash('notification-status', "success");
			session()->flash('notification-msg', "Service Type removed successfully.");
			return redirect()->route('system.service.index');
		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Server Error: Code #{$e->getLine()}");
			return redirect()->back();
		}
	}
	
}
