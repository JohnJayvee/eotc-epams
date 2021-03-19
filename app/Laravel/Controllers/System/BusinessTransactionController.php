<?php

namespace App\Laravel\Controllers\System;

/*
 * Request Validator
 */
use App\Laravel\Requests\PageRequest;
/*
 * Models
 */
use App\Laravel\Models\BusinessApplication;
use App\Laravel\Models\ApplicationBusinessPermitRequirements;

/* App Classes
 */
use App\Laravel\Models\Imports\DepartmentImport;


use Carbon,Auth,DB,Str,Helper,Excel;

class BusinessTransactionController extends Controller
{
    protected $data;
	protected $per_page;
	
	public function __construct(){
		parent::__construct();
		array_merge($this->data, parent::get_data());
		$this->per_page = env("DEFAULT_PER_PAGE",10);
	}

	public function  pending(PageRequest $request){
		$this->data['page_title'] = "Business Transactions";
		$this->data['business_transactions'] = BusinessApplication::where('status',"PENDING")->orderBy('created_at',"DESC")->paginate($this->per_page);
		return view('system.business-transaction.pending',$this->data);
	}
	public function  approved(PageRequest $request){
		$this->data['page_title'] = "Business Transactions";
		$this->data['business_transactions'] = BusinessApplication::where('status',"APPROVED")->orderBy('created_at',"DESC")->paginate($this->per_page);
		return view('system.business-transaction.pending',$this->data);
	}
	public function  declined(PageRequest $request){
		$this->data['page_title'] = "Business Transactions";
		$this->data['business_transactions'] = BusinessApplication::where('status',"DECLINED")->orderBy('created_at',"DESC")->paginate($this->per_page);
		return view('system.business-transaction.pending',$this->data);
	}

	public function show(PageRequest $request , $id = NULL){
		$this->data['business_transaction'] = BusinessApplication::find($id);
		$this->data['attachments'] = ApplicationBusinessPermitRequirements::where('application_id',$id)->get();

		return view('system.business-transaction.show',$this->data);

	}

	
}
