<?php

namespace App\Laravel\Controllers\System;

/*
 * Request Validator
 */
use App\Laravel\Requests\PageRequest;
use App\Laravel\Requests\System\FileRequest;

/*
 * Models
 */
use App\Laravel\Models\BusinessApplication;
use App\Laravel\Models\BusinessApplicationFile;
use App\Laravel\Models\BusinessScopeOfWork;
use App\Laravel\Models\User;
use App\Laravel\Models\Fixtures;
use App\Laravel\Models\Assessment;


/* App Classes
 */
use App\Laravel\Models\Imports\DepartmentImport;


use Carbon,Auth,DB,Str,Helper,Excel,ImageUploader,FileUploader;

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
		$this->data['page_title'] = "Pending Business Transactions";

		$this->data['business_transactions'] = BusinessApplication::where('status',"PENDING")
				->where(function($query){
					if ($this->data['auth']->type == "super_user" || $this->data['auth']->type == "front_liner") {
						return $query->where('is_validated',"no");
					}else{
						return $query->where('is_validated',"yes");
					}
				})
				->where(function($query){
					if ($this->data['auth']->type == "engineer") {
						return $query->where('engineer_id',$this->data['auth']->id);
					}
				})
				->orderBy('created_at',"DESC")->paginate($this->per_page);

		return view('system.business-transaction.pending',$this->data);
	}

	public function  validated(PageRequest $request){
		$this->data['page_title'] = "Validated Business Transactions";
		$this->data['business_transactions'] = BusinessApplication::where('status',"PENDING")->where('is_validated',"yes")->orderBy('created_at',"DESC")->paginate($this->per_page);
		return view('system.business-transaction.validated',$this->data);
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

		$engineers=  User::where('status','active')->where('type','engineer')->get();

		$list = [] ;
		foreach ($engineers as $key => $engineer) {
			array_push($list, ['id' => $engineer->id , 'name' => str::title($engineer->fname." ".$engineer->lname)]);
		}
		$this->data['json_list'] = json_encode($list);

		$this->data['business_transaction'] = BusinessApplication::find($id);
		$this->data['business_sow'] = BusinessScopeOfWork::where('application_id',$id)->where('type',"sow")->get();
		$this->data['business_coc'] = BusinessScopeOfWork::where('application_id',$id)->where('type',"coc")->get();
		$this->data['business_installations'] = BusinessScopeOfWork::where('application_id',$id)->where('type',"installation")->get();
		$this->data['business_clearances'] = BusinessScopeOfWork::where('application_id',$id)->where('type',"clearance")->get();
		$this->data['business_fencing'] = BusinessScopeOfWork::where('application_id',$id)->where('type',"fencing")->get();

		$this->data['fixtures'] = Fixtures::where('application_id',$id)->get();

		$this->data['count_file'] = BusinessApplicationFile::where('application_id',$id)->count();
		$this->data['attachments'] = BusinessApplicationFile::where('application_id',$id)->get();

		return view('system.business-transaction.show',$this->data);

	}

	public function frontliner_validate(PageRequest $request , $id = NULL){

		DB::beginTransaction();
		try{

			$business_transaction = BusinessApplication::find($id);
			$business_transaction->engineer_id = $request->get('engineer_id');
			$business_transaction->is_validated = "yes";
			$business_transaction->validated_at = Carbon::now();
			$business_transaction->frontliner_id = Auth::user()->id;
			$business_transaction->save();

			DB::commit();
			session()->flash('notification-status', "success");
			session()->flash('notification-msg', "Business Application has been successfully validated.");
			return redirect()->route('system.business_transaction.pending');
		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Server Error: Code #{$e->getLine()}");
			return response()->json(['success'=>'errorList','message'=> $e->errors()]);
		}
	}


	public function process_file(PageRequest $request ,$id = NULL){
		DB::beginTransaction();
		try{

			$business_file = BusinessApplicationFile::find($id);
			$business_file->status = strtoupper($request->get('status'));
			$business_file->save();

			DB::commit();
			session()->flash('notification-status', "success");
			session()->flash('notification-msg', "Business Application has been successfully validated.");
			return redirect()->route('system.business_transaction.show',[$id]);
		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Server Error: Code #{$e->getLine()}");
			return response()->json(['success'=>'errorList','message'=> $e->errors()]);
		}
	}
	
	public function decline(PageRequest $request , $id = NULL){
		DB::beginTransaction();
		try{

			$business_transaction = BusinessApplication::find($id);
			$business_transaction->status = "DECLINED";
			$business_transaction->remarks = $request->get('remarks');
			$business_transaction->processed_at = Carbon::now();
			$business_transaction->process_by = Auth::user()->id;
			if (Auth::user()->type == "engineer") {
				$business_transaction->engineer_status = "DECLINED";
				$business_transaction->engineer_processed_at = Carbon::now();
			}
			if (Auth::user()->type == "fire_department") {
				$business_transaction->fire_department_id = Auth::user()->id;
				$business_transaction->fire_department_status = "DECLINED";
				$business_transaction->fire_department_processed_at = Carbon::now();
			}
			$business_transaction->save();

			if ($request->get('status') == "DECLINED") {
				$business_file = BusinessApplicationFile::where('application_id',$business_transaction->id)->where('status',"PENDING")->update(['status' => "DECLINED"]);
			}
			DB::commit();
			session()->flash('notification-status', "success");
			session()->flash('notification-msg', "Business Application has been successfully validated.");
			return redirect()->route('system.business_transaction.pending');
		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Server Error: Code #{$e->getLine()}");
			return response()->json(['success'=>'errorList','message'=> $e->errors()]);
		}
	}

	public function  upload(PageRequest $request,$id = NULL){
		$this->data['page_title'] .= " - upload Documents";
		$this->data['business_transaction'] = BusinessApplication::find($id);

		if (($this->data['business_transaction']->fire_department_status == "APPROVED" and Auth::user()->type == "fire_department") || ($this->data['business_transaction']->engineer_status == "APPROVED" and Auth::user()->type == "engineer")) {
			session()->flash('notification-status', "warning");
			session()->flash('notification-msg', "Business Application has already approved.");
			return redirect()->route('system.business_transaction.pending');
		}
		
		return view('system.business-transaction.upload',$this->data);
	}

	public function upload_documents(FileRequest $request , $id = NULL){

		

		DB::beginTransaction();
		try{
			$business_transaction = BusinessApplication::find($id);

			if (Auth::user()->type == "engineer") {
				$business_transaction->engineer_status = "APPROVED";
				$business_transaction->engineer_processed_at = Carbon::now();
			}
			if (Auth::user()->type == "fire_department") {
				$business_transaction->fire_department_id = Auth::user()->id;
				$business_transaction->fire_department_status = "APPROVED";
				$business_transaction->fire_department_processed_at = Carbon::now();
			}

			if ($business_transaction->engineer_status == "APPROVED" and Auth::user()->type == "fire_department") {
				$business_transaction->status = "APPROVED";
			}

			if ($business_transaction->fire_department_status == "APPROVED" and Auth::user()->type == "engineer") {
				$business_transaction->status = "APPROVED";
			}
			$business_transaction->save();

			if($request->get('name')) { 
				foreach ($request->get('name') as $key => $image) {
					if ($request->file('document.'.$key)) {
						$ext = $request->file('document.'.$key)->getClientOriginalExtension();
						if($ext == 'pdf' || $ext == 'docx' || $ext == 'doc'){ 
							$type = 'file';
							$original_filename = $request->file('document.'.$key)->getClientOriginalName();
							$upload_image = FileUploader::upload($request->file('document.'.$key), "uploads/documents/transaction/documents/{$business_transaction->id}");
						}
						if($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg'){ 
							$type = 'image';
							$original_filename = $request->file('file')->getClientOriginalName();
							$upload_image = ImageUploader::upload($image, 'uploads/transaction/assessment/{$id}');
						}
						$new_file = new Assessment;
						$new_file->application_id = $business_transaction->id;
						$new_file->name = $image;
						$new_file->path = $upload_image['path'];
						$new_file->directory = $upload_image['directory'];
						$new_file->filename = $upload_image['filename'];
						$new_file->type =$type;
						$new_file->original_name =$original_filename;
						$new_file->save();
					}
						
				}
			}
			

			DB::commit();
			session()->flash('notification-status', "success");
			session()->flash('notification-msg', "Transaction has been successfully APPROVED.");
			return redirect()->route('system.business_transaction.approved');

		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Server Error: Code #{$e->getLine()}");
			return redirect()->back();
		}

	}

	
}	
