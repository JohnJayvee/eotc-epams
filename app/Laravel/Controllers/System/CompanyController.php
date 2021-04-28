<?php

namespace App\Laravel\Controllers\System;

/*
 * Request Validator
 */
use App\Laravel\Requests\PageRequest;
use App\Laravel\Requests\System\UploadRequest;
use App\Laravel\Requests\System\CompanyRequest;

/*
 * Models
 */
use App\Laravel\Models\Company;
use App\Laravel\Models\ZoneLocation;

/* App Classes
 */
use App\Laravel\Models\Imports\CompanyImport;


use Carbon,Auth,DB,Str,Helper,Excel;

class CompanyController extends Controller
{
    protected $data;
	protected $per_page;
	
	public function __construct(){
		parent::__construct();
		array_merge($this->data, parent::get_data());
		$this->data['zone_locations'] =  ['' => "All Zone Locations"] +  ZoneLocation::pluck('ecozone','code')->toArray();
		$this->per_page = env("DEFAULT_PER_PAGE",10);
	}

	public function  index(PageRequest $request){
		$this->data['page_title'] = "Company";
		$this->data['companies'] = Company::where('status',"APPROVED")->orderBy('created_at',"DESC")->paginate($this->per_page);
		return view('system.company.index',$this->data);
	}
	public function  pending(PageRequest $request){
		$this->data['page_title'] = "Company";
		$this->data['companies'] = Company::where('status' , "PENDING")->orderBy('created_at',"DESC")->paginate($this->per_page);
		return view('system.company.pending',$this->data);
	}

	public function  destroy(PageRequest $request,$id = NULL){
		$company = $request->get('company_data');
		DB::beginTransaction();
		try{
			$company->delete();
			DB::commit();
			session()->flash('notification-status', "success");
			session()->flash('notification-msg', "Company removed successfully.");
			return redirect()->route('system.company.index');
		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Server Error: Code #{$e->getLine()}");
			return redirect()->back();
		}
	}

	public function  upload(PageRequest $request){
		$this->data['page_title'] .= " - Bulk Upload Company";
		return view('system.company.upload',$this->data);
	}

	public function upload_company(UploadRequest $request) 
	{	
		try {
		    Excel::import(new CompanyImport, request()->file('file'));

		    session()->flash('notification-status', "success");
			session()->flash('notification-msg', "Importing data was successful.");
			return redirect()->route('system.company.index');
		} catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
		     $failures = $e->failures();
		     
		     foreach ($failures as $failure) {
		         $failure->row(); // row that went wrong
		         $failure->attribute(); // either heading key (if using heading row concern) or column index
		         $failure->errors(); // Actual error messages from Laravel validator
		         $failure->values(); // The values of the row that has failed.
		     }
		    dd($failures);
		    session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Something went wrong.");
			return redirect()->route('system.company.index');
		}
	    
	}

	public function  process(PageRequest $request , $id = NULL){
		$this->data['page_title'] .= " - Process Company Request";
		$this->data['company'] = $request->get('company_data');
		return view('system.company.process',$this->data);
	}

	public function approved(CompanyRequest $request , $id = NULL){
		DB::beginTransaction();
		try{
			$company = $request->get('company_data');
			$company->fill($request->all());
			$company->status = "APPROVED";
			$company->approved_at = Carbon::now();
			$company->approved_by = Auth::user()->id;
			$company->save();
			DB::commit();
			session()->flash('notification-status', "success");
			session()->flash('notification-msg', "Company approved successfully.");
			return redirect()->route('system.company.index');
		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Server Error: Code #{$e->getLine()}");
			return redirect()->back();
		}
	}
}
