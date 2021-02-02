<?php

namespace App\Laravel\Controllers\System;

/*
 * Request Validator
 */
use App\Laravel\Requests\PageRequest;
use App\Laravel\Requests\System\AccountCodeRequest;
/*
 * Models
 */
use App\Laravel\Models\AccountCode;
/* App Classes
 */


use Carbon,Auth,DB,Str,Helper,Excel;

class AccountCodeController extends Controller
{
    protected $data;
	protected $per_page;
	
	public function __construct(){
		parent::__construct();
		array_merge($this->data, parent::get_data());
		$this->per_page = env("DEFAULT_PER_PAGE",10);
	}

	public function  index(PageRequest $request){
		$this->data['page_title'] = "Account Code";
		$this->data['account_codes'] = AccountCode::orderBy('created_at',"DESC")->paginate($this->per_page);
		return view('system.account-code.index',$this->data);
	}

	public function  create(PageRequest $request){
		$this->data['page_title'] .= " - Add new record";
		return view('system.account-code.create',$this->data);
	}
	public function store(AccountCodeRequest $request){
		DB::beginTransaction();
		try{
			$new_account_code = new AccountCode();
			$new_account_code->code = $request->get('code');
			$new_account_code->description = $request->get('description');
			$new_account_code->alias = $request->get('alias');
			$new_account_code->default_cost = $request->get('default_cost');
			$new_account_code->ngas_code = $request->get('ngas_code');
			$new_account_code->assigned_to_unit = $request->get('assigned_to_unit');

			$new_account_code->save();
			DB::commit();
			session()->flash('notification-status', "success");
			session()->flash('notification-msg', "New Account Code has been added.");
			return redirect()->route('system.account_code.index');
		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Server Error: Code #{$e->getLine()}");
			return response()->json(['success'=>'errorList','message'=> $e->errors()]);

		}
	}

	public function  edit(PageRequest $request,$id = NULL){
		$this->data['page_title'] .= " - Edit record";
		$this->data['account_code'] = $request->get('account_code_data');
		return view('system.account-code.edit',$this->data);
	}

	public function  update(AccountCodeRequest $request,$id = NULL){
		DB::beginTransaction();
		try{

			$account_code = $request->get('account_code_data');
			$account_code->code = $request->get('code');
			$account_code->description = $request->get('description');
			$account_code->alias = $request->get('alias');
			$account_code->default_cost = $request->get('default_cost');
			$account_code->ngas_code = $request->get('ngas_code');
			$account_code->assigned_to_unit = $request->get('assigned_to_unit');
			$account_code->save();

			DB::commit();
			session()->flash('notification-status', "success");
			session()->flash('notification-msg', "Account Code had been modified.");
			return redirect()->route('system.account_code.index');
		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Server Error: Code #{$e->getLine()}");
			return redirect()->back();
		}
	}

	public function  destroy(PageRequest $request,$id = NULL){
		$account_code = $request->get('account_code_data');
		DB::beginTransaction();
		try{
			$account_code->delete();
			DB::commit();
			session()->flash('notification-status', "success");
			session()->flash('notification-msg', "Account Code removed successfully.");
			return redirect()->route('system.account_code.index');
		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Server Error: Code #{$e->getLine()}");
			return redirect()->back();
		}
	}

	

	
}