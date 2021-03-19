@extends('web._layouts.main')


@section('content')
{{ Session::put('current_progress',1) }}
<!--team section start-->
<section class="px-120 pt-110 pb-80 gray-light-bg">
  <div class="container">
    <h5 class="text-title pb-3"><i class="fa fa-pencil-alt"></i> CREATE ACCOUNT</h5>
    <div class="card login-signup-form" style="border-radius: 8px;">
      <div class="card-body">
        <h1 class="text-title fs-15">Account Details</h1>
        <form method="POST" action="" enctype="multipart/form-data" id="msform">
          {!!csrf_field()!!}
          <!-- progressbar -->
          @include('web._components.progressbar')
          <div class="row">
            <div class="col-md-6">
              <h4 class="pt-3">Account Type</h4>
            </div>
            <div class="col-md-6">
              <div class="form-group"> 
                <div class="radio-item" style="padding-right: 5em">
                  <input type="radio" id="rbtn_1" name="account_type" value="company" @if(old('account_type') == "company" || Session::get('registration.account_type') == "company") checked @endif>
                  <label for="rbtn_1">Company</label>
                </div>
                <div class="radio-item">
                  <input type="radio" id="rbtn_2" name="account_type" value="contractor" @if(old('account_type') == "contractor" || Session::get('registration.account_type') == "contractor" ) checked @endif>
                  <label for="rbtn_2">Contractor</label>
                </div>
                @if($errors->first('account_type'))
                  <p class="mt-1 text-danger">{!!$errors->first('account_type')!!}</p>
                @endif
              </div>
            </div>
          </div>
          <div class="row mt-1">
            <div class="col-md-6 col-lg-6" id="undertaking_container">
              <div class="form-group">
                <label class="text-form pb-2 fw-600">PCAB/UNDERTAKING</label>
                {!!Form::select("pcab_undertaking", $types, old('pcab_undertaking',Session::get('registration.pcab_undertaking')), ['id' => "input_pcab_undertaking", 'class' => "form-control-lg form-control classic ".($errors->first('pcab_undertaking') ? 'is-invalid' : NULL)])!!}
                @if($errors->first('pcab_undertaking'))
                <p class="mt-1 text-danger">{!!$errors->first('pcab_undertaking')!!}</p>
                @endif
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-lg-12 ">
              <div class="form-group">
                <label class="text-form pb-2 fw-600">Email</label>
                <input type="email" class="form-control form-control-lg {{ $errors->first('email') ? 'is-invalid': NULL  }}" name="email" placeholder="username@email.com" value="{{old('email',Session::get('registration.email'))}}">
                @if($errors->first('email'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('email')}}</small>
                @endif
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label class="text-form pb-2 fw-600">Password</label>
                <input type="password" class="form-control form-control-lg" name="password" placeholder="*************" id="password-field">
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                @if($errors->first('password'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('password')}}</small>
                @endif
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label class="text-form pb-2 fw-600">Confirm Password</label>
                <input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation" placeholder="*************">
                <span toggle="#password_confirmation" class="fa fa-fw fa-eye field-icon toggle-password"></span>
              </div>
            </div>
          </div>
          <p class="text-title fw-600">Please Take note of your email address and password used</p>
          <div class="row">
            <div class="col-md-12 col-lg-12" id="contractor_id_container">
              <div class="form-group">
                <label class="text-form pb-2 fw-600">Contractor ID</label>
                <input type="text" class="form-control form-control-lg {{ $errors->first('contractor_id') ? 'is-invalid': NULL  }}" name="contractor_id" placeholder="ContractorID" value="{{old('contractor_id',Session::get('registration.contractor_id'))}}">
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
                <input type="text" class="form-control form-control-lg {{ $errors->first('contractor_name') ? 'is-invalid': NULL  }}" name="contractor_name" placeholder="ContractorName" value="{{old('contractor_name',Session::get('registration.contractor_name'))}}">
                @if($errors->first('contractor_name'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('contractor_name')}}</small>
                @endif
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-6" id="validity_period_container">
              <div class="form-group">
                <label class="text-form pb-2">Validity Period</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control form-control-lg datepicker br-right-white p-2" name="validity_period" placeholder="YYYY-MM-DD" value="{{old('validity_period',Session::get('registration.validity_period'))}}">
                  <div class="input-group-append">
                      <span class="input-group-text text-title fw-600"><i class="fa fa-calendar"></i></span>
                  </div>
                </div>
                @if($errors->first('validity_period'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('validity_period')}}</small>
                @endif
              </div>
            </div>
            <div class="col-md-6 col-lg-6" id="contact_number_container">
              <div class="form-group">
                <label class="text-form pb-2 fw-600">Mobile Number</label>
                <input type="text" class="form-control form-control-lg {{ $errors->first('contractor_contact_number') ? 'is-invalid': NULL  }}" name="contractor_contact_number" placeholder="09XXXXXXXX" value="{{old('contractor_contact_number',Session::get('registration.contractor_contact_number'))}}">
                @if($errors->first('contractor_contact_number'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('contractor_contact_number')}}</small>
                @endif
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-lg-12" id="classification_container">
              <div class="form-group">
                <label class="text-form pb-2 fw-600">Principal Classification and Category</label>
                <input type="text" class="form-control form-control-lg {{ $errors->first('classification') ? 'is-invalid': NULL  }}" name="classification" placeholder="Category" value="{{old('classification',Session::get('registration.classification'))}}">
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
                <input type="text" class="form-control form-control-lg {{ $errors->first('other_classification') ? 'is-invalid': NULL  }}" name="other_classification" placeholder="Classification" value="{{old('other_classification',Session::get('registration.other_classification'))}}">
                @if($errors->first('other_classification'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('other_classification')}}</small>
                @endif
              </div>
            </div>
          </div>
          <!-- company fields -->
          <h4 class="text-title company-label">Company Details</h4>
          <div class="row">
            <div class="col-md-12 col-lg-12" id="company_name_container">
              <div class="form-group">
                <label class="text-form pb-2 fw-600">Company Name</label>
                <input type="text" class="form-control form-control-lg {{ $errors->first('company_name') ? 'is-invalid': NULL  }}" name="company_name" placeholder="Company Name" value="{{old('company_name',Session::get('registration.company_name'))}}">
                @if($errors->first('company_name'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('company_name')}}</small>
                @endif
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-lg-12" id="company_address_container">
              <div class="form-group">
                <label class="text-form pb-2 fw-600">Company Address</label>
                <input type="text" class="form-control form-control-lg {{ $errors->first('company_address') ? 'is-invalid': NULL  }}" name="company_address" placeholder="Company Address" value="{{old('company_address',Session::get('registration.company_address'))}}">
                @if($errors->first('company_address'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('company_address')}}</small>
                @endif
              </div>
            </div>
          </div>
          <h4 class="text-title company-label">Company Contact Details</h4>
          <div class="row">
            <div class="col-md-6 col-lg-16" id="firstname_container">
              <div class="form-group">
                <label class="text-form pb-2 fw-600">First Name</label>
                <input type="text" class="form-control form-control-lg {{ $errors->first('company_first_name') ? 'is-invalid': NULL  }}" name="company_first_name" placeholder="First Name" value="{{old('company_first_name',Session::get('registration.company_first_name'))}}">
                @if($errors->first('company_first_name'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('company_first_name')}}</small>
                @endif
              </div>
            </div>
            <div class="col-md-6 col-lg-16" id="lastname_container">
              <div class="form-group">
                <label class="text-form pb-2 fw-600">Last Name</label>
                <input type="text" class="form-control form-control-lg {{ $errors->first('company_last_name') ? 'is-invalid': NULL  }}" name="company_last_name" placeholder="Last Name" value="{{old('company_last_name',Session::get('registration.company_last_name'))}}">
                @if($errors->first('company_last_name'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('company_last_name')}}</small>
                @endif
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-16" id="middlename_container">
              <div class="form-group">
                <label class="text-form pb-2 fw-600">Middle Name</label>
                <input type="text" class="form-control form-control-lg {{ $errors->first('company_middle_name') ? 'is-invalid': NULL  }}" name="company_middle_name" placeholder="First Name" value="{{old('company_middle_name',Session::get('registration.company_middle_name'))}}">
                @if($errors->first('company_middle_name'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('company_middle_name')}}</small>
                @endif
              </div>
            </div>
            <div class="col-md-6 col-lg-16" id="email_container">
              <div class="form-group">
                <label class="text-form pb-2 fw-600">Email</label>
                <input type="email" class="form-control form-control-lg {{ $errors->first('company_email') ? 'is-invalid': NULL  }}" name="company_email" placeholder="username@email.com" value="{{old('company_email',Session::get('registration.company_email'))}}">
                @if($errors->first('company_email'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('company_email')}}</small>
                @endif
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-16" id="mobile_container">
              <div class="form-group">
                <label class="text-form pb-2 fw-600">Mobile Number</label>
                <input type="text" class="form-control form-control-lg {{ $errors->first('company_contact_number') ? 'is-invalid': NULL  }}" name="company_contact_number" placeholder="First Name" value="{{old('company_contact_number',Session::get('registration.company_contact_number'))}}">
                @if($errors->first('company_contact_number'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('company_contact_number')}}</small>
                @endif
              </div>
            </div>
            <div class="col-md-6 col-lg-16" id="telephone_container">
              <div class="form-group">
                <label class="text-form pb-2 fw-600">Telephone Number</label>
                <input type="text" class="form-control form-control-lg {{ $errors->first('tel_number') ? 'is-invalid': NULL  }}" name="tel_number" placeholder="Last Name" value="{{old('tel_number',Session::get('registration.tel_number'))}}">
                @if($errors->first('tel_number'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('tel_number')}}</small>
                @endif
              </div>
            </div>
          </div>
          <button type="submit" class="btn secondary-solid-btn px-5 py-3 fs-14 float-right"><i class="fa fa-paper-plane pr-2"></i>Next</button>
        </form>
      </div>
    </div>
  </div>
</section>
<!--team section end-->
<div id="gwt-standard-footer"></div>

@stop

@section('page-styles')
<link rel="stylesheet" href="{{asset('system/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
<style type="text/css">
  .field-icon {
    margin-top: -38px !important;
  }
</style>
@stop
@section('page-scripts')
<script src="{{asset('system/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript">
  $('#file').change(function(e){
    var fileName = e.target.files[0].name;
    $('#lblName').text(fileName);
  });
  $(".toggle-password").click(function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
    input.attr("type", "text");
    } else {
    input.attr("type", "password");
    }
  });
  $('.datepicker').datepicker({
    format : "yyyy-mm-dd",
    maxViewMode : 2,
    autoclose : true,
    zIndexOffset: 9999
  });
  $('input[name="account_type"]').on('change', function() {
    var value = $(this).val();
    if (value == "company") {
      $("#undertaking_container").hide();
      $("#validity_period_container").hide();
      $("#contact_number_container").hide();
      $("#other_classification_container").hide();
      $("#contractor_id_container").hide();
      $("#contractor_name_container").hide();
      $("#classification_container").hide();

      $("#company_name_container").show();
      $("#company_address_container").show();
      $("#firstname_container").show();
      $("#lastname_container").show();
      $("#middlename_container").show();
      $("#email_container").show();
      $("#mobile_container").show();
      $("#telephone_container").show();
      $(".company-label").show();
    }
    else if(value == "contractor"){
      $("#undertaking_container").show();
      $("#validity_period_container").show();
      $("#contact_number_container").show();
      $("#contractor_id_container").show();
      $("#other_classification_container").show();
      $("#classification_container").show();
      $("#contractor_name_container").show();

      $("#company_name_container").hide();
      $(".company-label").hide();
      $("#company_address_container").hide();
      $("#firstname_container").hide();
      $("#lastname_container").hide();
      $("#middlename_container").hide();
      $("#email_container").hide();
      $("#mobile_container").hide();
      $("#telephone_container").hide();
    }
        
}).change();

@if(old("account_type") == "company" || Session::get('registration.account_type') == "company")
  $("#undertaking_container").hide();
  $("#validity_period_container").hide();
  $("#contact_number_container").hide();
  $("#other_classification_container").hide();
  $("#contractor_id_container").hide();
  $("#contractor_name_container").hide();
  $("#classification_container").hide();

  $("#company_name_container").show();
  $("#company_address_container").show();
  $("#firstname_container").show();
  $("#lastname_container").show();
  $("#middlename_container").show();
  $("#email_container").show();
  $("#mobile_container").show();
  $("#telephone_container").show();
  $(".company-label").show();
@endif

@if(old("account_type") == "contractor" || Session::get('registration.account_type') == "contractor")
  $("#undertaking_container").show();
  $("#validity_period_container").show();
  $("#contact_number_container").show();
  $("#other_classification_container").show();
  $("#classification_container").show();
  $("#contractor_id_container").show();
  $("#contractor_name_container").show();

  $("#company_name_container").hide();
  $(".company-label").hide();
  $("#company_address_container").hide();
  $("#firstname_container").hide();
  $("#lastname_container").hide();
  $("#middlename_container").hide();
  $("#email_container").hide();
  $("#mobile_container").hide();
  $("#telephone_container").hide();
@endif

 
</script>

@endsection
