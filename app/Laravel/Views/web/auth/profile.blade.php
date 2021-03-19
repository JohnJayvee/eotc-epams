@extends('web._layouts.main')


@section('content')


<!--team section start-->
<section class="px-120 pt-110 pb-80 gray-light-bg">
    <div class="container">
        <h3 >Edit Profile</h3>   
        <div class="row">
            <div class="col-md-12">
                <form class="create-form" method="POST" enctype="multipart/form-data">
                    @include('system._components.notifications')
                    {!!csrf_field()!!}
                    <input type="hidden" name="type" value="{{$customer->type}}">
                    <div class="card">
                        <div class="card-body">
                       		<h5 class="text-title text-uppercase">Account Details</h5>
	                       	<div class="row">
					            <div class="col-md-6">
					              <label class="text-form pt-3 fw-600">Account Type</label>
					            </div>
					            <div class="col-md-6">
					              	<div class="form-group"> 
						                <div class="radio-item" style="padding-right: 5em">
						                  <input type="radio" id="rbtn_1" name="account_type" value="company" @if($customer->type == "company") checked @endif disabled>
						                  <label for="rbtn_1">Company</label>
						                </div>
						                <div class="radio-item">
						                  <input type="radio" id="rbtn_2" name="account_type" value="contractor" @if($customer->type == "contractor") checked @endif disabled>
						                  <label for="rbtn_2">Contractor</label>
						                </div>
						                @if($errors->first('account_type'))
						                  <p class="mt-1 text-danger">{!!$errors->first('account_type')!!}</p>
						                @endif
					              	</div>
					            </div>
					        </div>
					        <div class="row">
					            <div class="col-md-12 col-lg-12">
					              <div class="form-group">
					                <label class="text-form pb-2 fw-600">Email</label>
					                <input type="text" class="form-control {{ $errors->first('email') ? 'is-invalid': NULL  }}" name="email" placeholder="Company Name" value="{{old('email',$customer->email)}}" disabled>
					                @if($errors->first('email'))
					                  <small class="form-text pl-1" style="color:red;">{{$errors->first('email')}}</small>
					                @endif
					              </div>
					            </div>
				        	</div>
				        	@if($customer->type == "company")
					        	<h4 class="text-title company-label">Company Details</h4>
						        <div class="row">
						            <div class="col-md-12 col-lg-12">
							            <div class="form-group">
							                <label class="text-form pb-2 fw-600">Company Name</label>
							                <input type="text" class="form-control {{ $errors->first('company_name') ? 'is-invalid': NULL  }}" name="company_name" placeholder="Company Name" value="{{old('company_name',$customer->company_name)}}">
							                @if($errors->first('company_name'))
							                  <small class="form-text pl-1" style="color:red;">{{$errors->first('company_name')}}</small>
							                @endif
							            </div>
						            </div>
						        </div>
					          	<div class="row">
						            <div class="col-md-12 col-lg-12">
										<div class="form-group">
											<label class="text-form pb-2 fw-600">Company Address</label>
											<input type="text" class="form-control {{ $errors->first('company_address') ? 'is-invalid': NULL  }}" name="company_address" placeholder="Company Address" value="{{old('company_address',$customer->company_address)}}">
											@if($errors->first('company_address'))
											<small class="form-text pl-1" style="color:red;">{{$errors->first('company_address')}}</small>
											@endif
										</div>
						            </div>
					          	</div>
					          	<h4 class="text-title company-label">Company Contact Details</h4>
					          	<div class="row">
						            <div class="col-md-6 col-lg-16">
							            <div class="form-group">
							                <label class="text-form pb-2 fw-600">First Name</label>
							                <input type="text" class="form-control {{ $errors->first('company_first_name') ? 'is-invalid': NULL  }}" name="company_first_name" placeholder="First Name" value="{{old('company_first_name',$customer->company_first_name)}}">
							                @if($errors->first('company_first_name'))
							                  <small class="form-text pl-1" style="color:red;">{{$errors->first('company_first_name')}}</small>
							                @endif
							            </div>
						            </div>
						            <div class="col-md-6 col-lg-16">
							            <div class="form-group">
							                <label class="text-form pb-2 fw-600">Last Name</label>
							                <input type="text" class="form-control {{ $errors->first('company_last_name') ? 'is-invalid': NULL  }}" name="company_last_name" placeholder="Last Name" value="{{old('company_last_name',$customer->company_last_name)}}">
							                @if($errors->first('company_last_name'))
							                  <small class="form-text pl-1" style="color:red;">{{$errors->first('company_last_name')}}</small>
							                @endif
							            </div>
						            </div>
					          	</div>
								<div class="row">
									<div class="col-md-6 col-lg-16">
										<div class="form-group">
											<label class="text-form pb-2 fw-600">Middle Name</label>
											<input type="text" class="form-control {{ $errors->first('company_middle_name') ? 'is-invalid': NULL  }}" name="company_middle_name" placeholder="First Name" value="{{old('company_middle_name',$customer->company_middle_name)}}">
											@if($errors->first('company_middle_name'))
												<small class="form-text pl-1" style="color:red;">{{$errors->first('company_middle_name')}}</small>
											@endif
										</div>
									</div>
									<div class="col-md-6 col-lg-16" id="email_container">
										<div class="form-group">
											<label class="text-form pb-2 fw-600">Email</label>
											<input type="email" class="form-control {{ $errors->first('company_email') ? 'is-invalid': NULL  }}" name="company_email" placeholder="username@email.com" value="{{old('company_email',$customer->company_email)}}">
											@if($errors->first('company_email'))
												<small class="form-text pl-1" style="color:red;">{{$errors->first('company_email')}}</small>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-lg-16">
										<div class="form-group">
											<label class="text-form pb-2 fw-600">Mobile Number</label>
											<input type="text" class="form-control {{ $errors->first('company_contact_number') ? 'is-invalid': NULL  }}" name="company_contact_number" placeholder="First Name" value="{{old('company_contact_number',$customer->company_contact_number)}}">
											@if($errors->first('company_contact_number'))
												<small class="form-text pl-1" style="color:red;">{{$errors->first('company_contact_number')}}</small>
											@endif
										</div>
									</div>
									<div class="col-md-6 col-lg-16">
										<div class="form-group">
											<label class="text-form pb-2 fw-600">Telephone Number</label>
											<input type="text" class="form-control {{ $errors->first('tel_number') ? 'is-invalid': NULL  }}" name="tel_number" placeholder="Last Name" value="{{old('tel_number',$customer->tel_number)}}">
											@if($errors->first('tel_number'))
												<small class="form-text pl-1" style="color:red;">{{$errors->first('tel_number')}}</small>
											@endif
										</div>
									</div>
								</div>
				        	@endif
				        	@if($customer->type == "contractor")
								<div class="row">
									<div class="col-md-12 col-lg-12">
										<div class="form-group">
											<label class="text-form pb-2 fw-600">Contractor ID</label>
											<input type="text" class="form-control {{ $errors->first('contractor_id') ? 'is-invalid': NULL  }}" name="contractor_id" placeholder="ContractorID" value="{{old('contractor_id',$customer->contractor_id)}}">
											@if($errors->first('contractor_id'))
												<small class="form-text pl-1" style="color:red;">{{$errors->first('contractor_id')}}</small>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-lg-12" id="contractor_name_container">
										<div class="form-group">
											<label class="text-form pb-2 fw-600">Contractor Name</label>
											<input type="text" class="form-control {{ $errors->first('contractor_name') ? 'is-invalid': NULL  }}" name="contractor_name" placeholder="ContractorName" value="{{old('contractor_name',$customer->contractor_name)}}">
											@if($errors->first('contractor_name'))
												<small class="form-text pl-1" style="color:red;">{{$errors->first('contractor_name')}}</small>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-lg-6">
										<div class="form-group">
											<label class="text-form pb-2">Validity Period</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control datepicker br-right-white p-2" name="validity_period" placeholder="YYYY-MM-DD" value="{{old('validity_period',$customer->validity_period)}}">
												<div class="input-group-append">
													<span class="input-group-text text-title fw-600"><i class="fa fa-calendar"></i></span>
												</div>
											</div>
											@if($errors->first('validity_period'))
												<small class="form-text pl-1" style="color:red;">{{$errors->first('validity_period')}}</small>
											@endif
										</div>
									</div>
									<div class="col-md-6 col-lg-6">
										<div class="form-group">
											<label class="text-form pb-2 fw-600">Mobile Number</label>
											<input type="text" class="form-control {{ $errors->first('contractor_contact_number') ? 'is-invalid': NULL  }}" name="contractor_contact_number" placeholder="09XXXXXXXX" value="{{old('contractor_contact_number',$customer->contractor_contact_number)}}">
											@if($errors->first('contractor_contact_number'))
												<small class="form-text pl-1" style="color:red;">{{$errors->first('contractor_contact_number')}}</small>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-lg-12">
										<div class="form-group">
											<label class="text-form pb-2 fw-600">Principal Classification and Category</label>
											<input type="text" class="form-control {{ $errors->first('classification') ? 'is-invalid': NULL  }}" name="classification" placeholder="Category" value="{{old('classification',$customer->classification)}}">
											@if($errors->first('classification'))
												<small class="form-text pl-1" style="color:red;">{{$errors->first('classification')}}</small>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-lg-12" id="other_classification_container">
										<div class="form-group">
											<label class="text-form pb-2 fw-600">Other Classification</label>
											<input type="text" class="form-control {{ $errors->first('other_classification') ? 'is-invalid': NULL  }}" name="other_classification" placeholder="Classification" value="{{old('other_classification',$customer->other_classification)}}">
											@if($errors->first('other_classification'))
												<small class="form-text pl-1" style="color:red;">{{$errors->first('other_classification')}}</small>
											@endif
										</div>
									</div>
								</div>
				        	@endif
				        	<button type="submit" class="btn secondary-solid-btn mr-2" style="float: right;">Update Record</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--team section end-->


@stop

@section('page-styles')
<link rel="stylesheet" href="{{asset('system/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
@stop
@section('page-scripts')
<script src="{{asset('system/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript">
	$('.datepicker').datepicker({
		format : "yyyy-mm-dd",
		maxViewMode : 2,
		autoclose : true,
		zIndexOffset: 9999
	});

</script>
@endsection
