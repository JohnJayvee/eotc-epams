<?php

namespace App\Laravel\Controllers\System;

/*
 * Request Validator
 */
use App\Laravel\Requests\PageRequest;
/*
 * Models
 */
use App\Laravel\Models\Customer;
use App\Laravel\Models\CustomerFile;

/* App Classes
 */


use Carbon,Auth,DB,Str,Helper,Excel;

class CustomerController extends Controller
{
    protected $data;
	protected $per_page;
	
	public function __construct(){
		parent::__construct();
		array_merge($this->data, parent::get_data());
		$this->data['status_type'] = ['active' =>  "Active",'inactive' => "Inactive"];
		$this->per_page = env("DEFAULT_PER_PAGE",10);
	}

	public function  index(PageRequest $request){
		$this->data['page_title'] = "Customer List";
		$this->data['customers'] = Customer::orderBy('created_at',"DESC")->paginate($this->per_page);
		return view('system.customer.index',$this->data);
	}

	public function  show(PageRequest $request , $id = NULL){
		$this->data['page_title'] = "Customer Details";
		$this->data['customer'] = Customer::find($id);
		$this->data['files'] = CustomerFile::where('customer_id', $id)->get();

		return view('system.customer.show',$this->data);
	}
	public function process(PageRequest $request , $id = NULL){
		DB::beginTransaction();
		try{

			$customer = Customer::find($id);
			$customer->status = $request->get('status');
			$customer->save();

			DB::commit();
			session()->flash('notification-status', "success");
			session()->flash('notification-msg', "Customer has successfully approved.");
			return redirect()->route('system.customer.index');
		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Server Error: Code #{$e->getLine()}");
			return redirect()->back();
		}
	} 
}
