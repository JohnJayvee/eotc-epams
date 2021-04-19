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
use App\Laravel\Models\BusinessApplicationFile;
use App\Laravel\Models\BusinessScopeOfWork;
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
		$this->data['requirements'] =  User::pluck('name','id')->where('')->toArray();
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
		$this->data['business_sow'] = BusinessScopeOfWork::where('application_id',$id)->where('type',"sow")->get();
		$this->data['business_coc'] = BusinessScopeOfWork::where('application_id',$id)->where('type',"coc")->get();
		$this->data['business_installations'] = BusinessScopeOfWork::where('application_id',$id)->where('type',"installation")->get();
		$this->data['count_file'] = BusinessApplicationFile::where('application_id',$id)->count();
		$this->data['attachments'] = BusinessApplicationFile::where('application_id',$id)->get();

		return view('system.business-transaction.show',$this->data);

	}

	
}
