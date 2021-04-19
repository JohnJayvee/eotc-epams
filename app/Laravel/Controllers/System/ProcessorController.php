<?php

namespace App\Laravel\Controllers\System;

/*
 * Request Validator
 */
use App\Laravel\Requests\PageRequest;
use App\Laravel\Requests\System\ProcessorRequest;
use App\Laravel\Requests\System\ProcessorPasswordRequest;
/*
 * Models
 */
use App\Laravel\Models\User;
use App\Laravel\Models\Transaction;
use App\Laravel\Models\Application;
/* App Classes
 */

use App\Laravel\Events\SendProcessorReference;
use App\Laravel\Events\SendEmailProcessorReference;

use Carbon,Auth,DB,Str,Hash,ImageUploader,Event;

class ProcessorController extends Controller
{
    protected $data;
	protected $per_page;
	
	public function __construct(){
		parent::__construct();
		array_merge($this->data, parent::get_data());

		$this->data['user_type'] = ['' => "Choose Type",'front_liner' => "Front Liner"];
		$this->data['status_type'] = ['' => "Choose Status",'active' =>  "Active",'inactive' => "Inactive"];
		$this->per_page = env("DEFAULT_PER_PAGE",10);
	}

	public function  index(PageRequest $request){
		$this->data['page_title'] = "Accounts";

		$this->data['processors'] = User::where('type','<>',"super_user")->orderBy('created_at',"DESC")->get(); 
		
		return view('system.processor.index',$this->data);
	}

	public function  create(PageRequest $request){
		$this->data['page_title'] .= "Processor - Add new record";

		return view('system.processor.create',$this->data);
	}

	public function store(ProcessorRequest $request){
		$auth = Auth::user();
		DB::beginTransaction();
		try{
			$unique = uniqid();
			$new_processor = new User;
			$new_processor->fname = $request->get('fname');
			$new_processor->lname = $request->get('lname');
			$new_processor->mname = $request->get('mname');
			$new_processor->email = $request->get('email');
			$new_processor->type = strtolower($request->get('type'));
			$new_processor->username = $request->get('username');
			$new_processor->contact_number = $request->get('contact_number');
			$new_processor->otp = substr($unique, 0, 10);
			if($request->hasFile('file')) { 
				$ext = $request->file->getClientOriginalExtension();
				if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg' || $ext == 'PNG' || $ext == 'JPEG' || $ext == 'JPG'){ 
					
					$upload_image = ImageUploader::upload($request->file, "uploads/image/users/profile");
					$new_processor->path = $upload_image['path'];
					$new_processor->directory = $upload_image['directory'];
					$new_processor->filename = $upload_image['filename'];
				}else{
					DB::rollback();
					session()->flash('notification-status', "failed");
					session()->flash('notification-msg', "Image Format is not supported");
					return redirect()->back();
				}
				
			}
			$new_processor->save();
			$new_processor->reference_id =  str_pad($new_processor->id, 5, "0", STR_PAD_LEFT);
			$new_processor->save();
			$insert[] = [
				'full_name' => $new_processor->fname ." " .$new_processor->lname,
				'ref_id' => $new_processor->reference_id,
                'contact_number' => $new_processor->contact_number,
                'otp' => $new_processor->otp,
                'type' => $new_processor->type,
                'email' => $new_processor->email
            ];	

			/*$notification_data = new SendProcessorReference($insert);
		    Event::dispatch('send-sms-processor', $notification_data);*/

		    $notification_email_data = new SendEmailProcessorReference($insert);
	    	Event::dispatch('send-email-reference', $notification_email_data);

			DB::commit();
			session()->flash('notification-status', "success");
			session()->flash('notification-msg', "New ".str::title(str_replace("_", " ", $new_processor->type))." has been added.");
			return redirect()->route('system.processor.index');
			
			
		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Server Error: Code #{$e->getLine()}");
			return redirect()->back();

		}
	}

	public function edit(PageRequest $request,$id = NULL){
		$this->data['page_title'] .= "Processor - Edit record";

		$this->data['processor'] = $request->get('processor_data');

		if(old('application_id') != NULL || $this->data['processor']->department_id != NULL){
		
		    $this->data['applications'] = Application::where('department_id',old('department_id',$this->data['processor']->department_id))->pluck('name', 'id')->toArray();
		}else{
			$this->data['applications'] = Application::pluck('name', 'id')->toArray();
		}

		return view('system.processor.edit',$this->data);
	}

	public function update(ProcessorRequest $request,$id = NULL){
		DB::beginTransaction();
		try{

			$processor = $request->get('processor_data');
			$processor->fname = $request->get('fname');
			$processor->lname = $request->get('lname');
			$processor->mname = $request->get('mname');
			$processor->email = $request->get('email');
			$processor->type = $request->get('type');
			$processor->username = $request->get('username');
			$processor->contact_number = $request->get('contact_number');
			$processor->status = $request->get('status');
			if($request->hasFile('file')) { 
				$ext = $request->file->getClientOriginalExtension();
				if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg' || $ext == 'PNG' || $ext == 'JPEG' || $ext == 'JPG'){ 
					
					$upload_image = ImageUploader::upload($request->file, "uploads/image/users/profile");
					$processor->path = $upload_image['path'];
					$processor->directory = $upload_image['directory'];
					$processor->filename = $upload_image['filename'];
				}else{
					DB::rollback();
					session()->flash('notification-status', "failed");
					session()->flash('notification-msg', "Image Format is not supported");
					return redirect()->back();
				}
				
			}

			$processor->save();

			DB::commit();
			session()->flash('notification-status', "success");
			session()->flash('notification-msg', str::title($processor->type)." had been modified.");
			return redirect()->route('system.processor.index');
		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Server Error: Code #{$e->getLine()}");
			return redirect()->back();
		}
	}
	public function reset(PageRequest $request,$id = NULL){
		$this->data['page_title'] .= "Processor - Reset Password";
		$this->data['processor'] = $request->get('processor_data');
		return view('system.processor.reset',$this->data);
	}
	public function update_password(ProcessorPasswordRequest $request,$id = NULL){
		
		DB::beginTransaction();
		try{
			$processor = $request->get('processor_data');
			if (Hash::check($request->get('current_password'), $processor->password)) {
				$processor->password = bcrypt($request->get('password'));
				$processor->save();
				DB::commit();
				session()->flash('notification-status', "success");
				session()->flash('notification-msg', "Password has been reset successfully.");
				return redirect()->route('system.processor.index');
			}else{
				DB::rollback();
				session()->flash('notification-status', "failed");
				session()->flash('notification-msg', "Invalid Current Password");
				return redirect()->back();
			}
		
			
		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Server Error: Code #{$e->getLine()}");
			return redirect()->back();
		}
	}
	public function  destroy(PageRequest $request,$id = NULL){
		$processor = $request->get('processor_data');
		DB::beginTransaction();
		try{
			$processor->delete();
			DB::commit();
			session()->flash('notification-status', "success");
			session()->flash('notification-msg', "Processor removed successfully.");
			return redirect()->route('system.processor.index');
		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Server Error: Code #{$e->getLine()}");
			return redirect()->back();
		}
	}

	public function  list(){
		$this->data['page_title'] .= " List of Processor";
		$auth = Auth::user();
		switch ($auth->type) {
			case 'super_user':
				$this->data['processors']  = User::where('type',"processor")->orderBy('created_at',"DESC")->get();
				break;
			case 'admin':
				$this->data['processors']  = User::where('type',"processor")->orderBy('created_at',"DESC")->get();
				break;
			case 'office_head':
				$this->data['processors']  = User::where('department_id',$auth->department_id)->where('type',"processor")->orderBy('created_at',"DESC")->get();
				break;
			default:
				break;
		}

		return view('system.processor.list',$this->data);
	}

	public function  show($id = NULL){
		$this->data['page_title'] .= " List of Transaction";
		$this->data['transactions']  = Transaction::where('processor_user_id',$id)->orderBy('created_at',"DESC")->get();


		return view('system.processor.show',$this->data);
	}
}
