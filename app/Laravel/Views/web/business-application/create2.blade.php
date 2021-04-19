@extends('web._layouts.main')


@section('content')
<!--team section start-->
<section class="px-120 pt-110 pb-120 gray-light-bg">
    <div class="container">
      <div class="card" style="border-radius: 8px;">
        <div class="card-body m-3">
          <form method="POST" action="" enctype="multipart/form-data" id="msform">
            {!!csrf_field()!!}
            <!-- progressbar -->
            <h3> {{ Str::title(str_replace("_"," " , $permit->type)) }} Application Form</h3>
            <input type="hidden" name="permit_type" value="{{$permit->type}}">
            <p class="text-title fw-600 fs-15">Zone Code: {{$profile->zone->code}} <span class="text-black fs-15"> {{strtoupper($profile->company_name)}}</span></p>
            <p class="text-title fw-600 mt-2 fs-15">Application Details</p>
            <div class="row">
              <div class="col-md-6 col-lg-6" >
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">First Name</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('first_name') ? 'is-invalid': NULL  }}" name="first_name" placeholder="First Name" value="{{old('first_name')}}">
                  @if($errors->first('first_name'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('first_name')}}</small>
                  @endif
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Last Name</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('last_name') ? 'is-invalid': NULL  }}" name="last_name" placeholder="Last Name" value="{{old('last_name')}}">
                  @if($errors->first('last_name'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('last_name')}}</small>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Middle Name</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('middle_name') ? 'is-invalid': NULL  }}" name="middle_name" placeholder="Middle Name" value="{{old('middle_name')}}">
                  @if($errors->first('middle_name'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('middle_name')}}</small>
                  @endif
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Email</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('email') ? 'is-invalid': NULL  }}" name="email" placeholder="username@email.com" value="{{old('email')}}">
                  @if($errors->first('email'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('email')}}</small>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Mobile Number</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('mobile_no') ? 'is-invalid': NULL  }}" name="mobile_no" placeholder="XXX-XXX-XXXX" value="{{old('mobile_no')}}">
                  @if($errors->first('mobile_no'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('mobile_no')}}</small>
                  @endif
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Telephone Number</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('telephone_number') ? 'is-invalid': NULL  }}" name="telephone_number" placeholder="(XX) XXX-XXXX" value="{{old('telephone_number')}}">
                  @if($errors->first('telephone_number'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('telephone_number')}}</small>
                  @endif
                </div>
              </div>
            </div>
            <p class="text-title fw-600 mt-2 fs-15">Project Details</p>
            <div class="row">
              <div class="col-md-12 col-lg-12">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">PEZA Registered Enterprise (as indicated in PEZA Registration Certificate)</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('registered_enterprise') ? 'is-invalid': NULL  }}" name="registered_enterprise" value="{{old('registered_enterprise')}}" placeholder="PEZA Registered Enterprise (as indicated in PEZA Registration Certificate)">
                  @if($errors->first('registered_enterprise'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('registered_enterprise')}}</small>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-lg-12">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">PEZA Registration Number</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('registration_number') ? 'is-invalid': NULL  }}" name="registration_number" value="{{old('registration_number')}}" placeholder="PEZA Registration Numbe">
                  @if($errors->first('registration_number'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('registration_number')}}</small>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Classification/Category</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('classification') ? 'is-invalid': NULL  }}" name="classification" value="{{old('classification')}}" placeholder="Classification/Category">
                  @if($errors->first('classification'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('classification')}}</small>
                  @endif
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Use & Nature of Occupancy</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('occupancy') ? 'is-invalid': NULL  }}" name="occupancy" value="{{old('occupancy')}}" placeholder="Use & Nature of Occupancy">
                  @if($errors->first('occupancy'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('occupancy')}}</small>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Contractor</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('contractor') ? 'is-invalid': NULL  }}" name="contractor" value="{{old('contractor')}}" placeholder="Contractor">
                  @if($errors->first('contractor'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('contractor')}}</small>
                  @endif
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">PCAB License Number</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('pcab_license_number') ? 'is-invalid': NULL  }}" name="pcab_license_number" value="{{old('pcab_license_number')}}" placeholder="PCAB License Number">
                  @if($errors->first('pcab_license_number'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('pcab_license_number')}}</small>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Locator/EnterPrise</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('locator_enterprise') ? 'is-invalid': NULL  }}" name="locator_enterprise" value="{{old('locator_enterprise')}}" placeholder="Locator/EnterPrise">
                  @if($errors->first('locator_enterprise'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('locator_enterprise')}}</small>
                  @endif
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Project Title</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('project_title') ? 'is-invalid': NULL  }}" name="project_title" value="{{old('project_title')}}" placeholder="Project Title">
                  @if($errors->first('project_title'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('project_title')}}</small>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Locator/Zone</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('locator_zone') ? 'is-invalid': NULL  }}" name="locator_zone" placeholder="Locator/Zone" value="{{old('locator_zone')}}" placeholder="Locator/Zone">
                  @if($errors->first('locator_zone'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('locator_zone')}}</small>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-lg-12">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Exact Location</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('address') ? 'is-invalid': NULL  }}" name="address" value="{{old('address')}}" placeholder="Exact Location">
                  @if($errors->first('address'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('address')}}</small>
                  @endif
                </div>
              </div>
            </div>
            <input type="hidden" class="form-control" name="region_name" id="input_region_name" value="{{old('region_name',Session::get('application.region_name'))}}">
            <input type="hidden" class="form-control" name="town_name" id="input_town_name" value="{{old('town_name',Session::get('application.town_name'))}}">
            <input type="hidden" class="form-control" name="brgy_name" id="input_brgy_name" value="{{old('brgy_name',Session::get('application.brgy_name'))}}">
            <input type="hidden" id="input_zipcode"   name="zipcode" value="{{old('zipcode')}}" readonly="readonly">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                    <label for="exampleInputEmail1" class="text-form pb-2">Region</label>
                       {!!Form::select('region',[],old('region'),['id' => "input_region",'class' => "form-control form-control-lg classic ".($errors->first('region') ? 'border-red' : NULL)])!!}
                        @if($errors->first('region'))
                            <small class="form-text pl-1" style="color:red;">{{$errors->first('region')}}</small>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label class="text-form pb-2">City Municipality</label>
                        {!!Form::select('town',[],old('town',Session::get('application.town')),['id' => "input_town",'class' => "form-control form-control-lg classic ".($errors->first('town') ? 'border-red' : NULL)])!!}
                        @if($errors->first('town'))
                            <small class="form-text pl-1" style="color:red;">{{$errors->first('town')}}</small>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label class="text-form pb-2">Barangay</label>
                        {!!Form::select('brgy',[],old('brgy',Session::get('application.region')),['id' => "input_brgy",'class' => "form-control form-control-lg classic ".($errors->first('brgy') ? 'border-red' : NULL)])!!}
                        @if($errors->first('brgy'))
                            <small class="form-text pl-1" style="color:red;">{{$errors->first('brgy')}}</small>
                        @endif
                    </div>
                </div>
            </div>
            <input type="hidden" name="requirements_id" value="{{$permit->requirements_id}}">
            @if($permit->requirements_id)
              <p class="text-title fw-600 mt-2 fs-15">Application Requirements</p>
              <table class="table table-responsive table-striped table-wrap" style="table-layout: fixed;"  id="old_requirements">
                <thead>
                    <tr>
                        <th class="text-title fs-15 fs-500 p-3" width="15%">Requirement Name </th>
                        <th class="text-title fs-15 fs-500 p-3" width="15%">File <code>(Only PDF file extensions is allowed)</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($requirements as $requirement)
                  <tr>
                      <td>{{$requirement->name}} {{$requirement->is_required == "yes" ? "(Required)" : "(Optional)"}}</td>
                      <td>
                        <input type="file" name="file{{$requirement->id}}" accept="application/pdf,application/vnd.ms-excel">
                        @if($errors->first('file'.$requirement->id))
                          <small class="form-text pl-1" style="color:red;">{{$errors->first('file'.$requirement->id)}}</small>
                        @endif
                      </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            @endif

            @include('web.permit.'.$permit->type)

            @if($permit->type != "building_permit")
              <p class="text-title fw-600 mt-2 fs-15">Other Details</p>
            @endif
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Project Cost</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-title fw-600 px-4">&#8369; </span>
                    </div>
                    <input type="text" class="form-control form-control-lg br-left-white {{ $errors->first('project_cost') ? 'is-invalid': NULL  }}" name="project_cost" value="{{old('project_cost')}}">
                  </div>
                  @if($errors->first('project_cost'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('project_cost')}}</small>
                  @endif
                </div>
              </div>
            </div>
            <p class="fw-600 text-title">Please Review your Existing information below before continuing.</p>
            <div class="custom-control custom-checkbox checkbox-xl mb-5">
              <input type="checkbox" class="custom-control-input" id="checkbox-3" name="agreement_check" value="1">
              <label class="custom-control-label fw-500" for="checkbox-3"><span class="fw-600">I AGREE UNDER PENALTY OF PERJUARY</span> that the foregoing information are based on my personal knowledge and authentic records. <span class="fw-600">FAILURE TO COMPLY WITH ALL THE REQUIREMENTS WILL AUTOMATICALLY REVOKE PERMIT.</span></label>
              @if($errors->first('agreement_check'))
                <small class="form-text" style="color:red;padding-left: 2em">{{$errors->first('agreement_check')}}</small>
              @endif
            </div>
            <a href="{{route('web.application.revert',[$profile->id])}}" class="btn btn-light px-5 py-3 fs-14 float-left text-title">Cancel</a>
            <button type="submit" class="btn secondary-solid-btn px-5 py-3 fs-14 float-right">Request Evaluation</button>

          </form>
        </div>
      </div>
    </div>
</section>
<!--team section end-->


@stop


@section('page-styles')
<style type="text/css">
  .custom-file-label {
    height: 3.5em;
    padding-top: 15px;
    border-radius: 10px;
  }
  .custom-file-label::after {
    height: 3.4em;
    padding-top: 15px;
    background-color: #0038A8;
    color: #fff;
    content: "Choose File" !important;
    border-radius: 0 .50rem .50rem 0

  }

  .checkbox-xl .custom-control-label::before, 
  .checkbox-xl .custom-control-label::after {
    top: 1.2rem !important;
    width: 2.85rem;
    height: 2.85rem;
  }

  .checkbox-xl .custom-control-label {
    padding-top: 25px;
    padding-left: 30px;
    color: #000;
    font-size: 18px;
  }

  .check-input {
    background: transparent;
    border: none;
    border-bottom: 1px solid #000000;
    outline:none;
    box-shadow:none;
    vertical-align: super;
  }
  
</style>
@endsection

@section('page-scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).on('change', '.custom-file-input', function (event) {
    $(this).next('.custom-file-label').html(event.target.files[0].name);
  })
  $.fn.get_region = function(input_region,input_province,input_city,input_brgy,selected){
    $(input_city).empty().prop('disabled',true)
    $(input_brgy).empty().prop('disabled',true)

    $(input_region).append($('<option>', {
              value: "",
              text: "Loading Content..."
          }));
    $.getJSON("{{env('PSGC_REGION_URL')}}", function( response ) {
        $(input_region).empty().prop('disabled',true)
        $.each(response.data,function(index,value){
          $(input_region).append($('<option>', {
              value: index,
              text: value
          }));
        })

        $(input_region).prop('disabled',false)
        $(input_region).prepend($('<option>',{value : "",text : "--Select Region--"}))
        if(selected.length > 0){
          $(input_region).val($(input_region+" option[value="+selected+"]").val());
        }else{
          $(input_region).val($(input_region+" option:first").val());
        }
    });
    // return result;
  };

  $.fn.get_city = function(reg_code,input_city,input_brgy,selected){
    $(input_brgy).empty().prop('disabled',true)
    $(input_city).append($('<option>', {
          value: "",
          text: "Loading Content..."
      }));
    $.getJSON("{{env('PSGC_CITY_URL')}}?region_code="+reg_code, function( data ) {
      console.log(data)
        $(input_city).empty().prop('disabled',true)
        $.each(data,function(index,value){
            $(input_city).append($('<option>', {
                value: index,
                text: value
            }));
        })

        $(input_city).prop('disabled',false)
        $(input_city).prepend($('<option>',{value : "",text : "--SELECT MUNICIPALITY/CITY, PROVINCE--"}))
        if(selected.length > 0){
          $(input_city).val($(input_city+" option[value="+selected+"]").val());
        }else{
          $(input_city).val($(input_city+" option:first").val());
        }
    });
    // return result;
  };

  $.fn.get_brgy = function(munc_code,input_brgy,selected){
    $(input_brgy).empty().prop('disabled',true);
    $(input_brgy).append($('<option>', {
              value: "",
              text: "Loading Content..."
          }));
    $.getJSON("{{env('PSGC_BRGY_URL')}}?city_code="+munc_code, function( data ) {
        $(input_brgy).empty().prop('disabled',true);

        $.each(data,function(index,value){
          $(input_brgy).append($('<option>', {
              value: index,
              text: value.desc,
              "data-zip_code" : (value.zip_code).trim()
          }));
        })
        $(input_brgy).prop('disabled',false)
        $(input_brgy).prepend($('<option>',{value : "",text : "--SELECT BARANGAY--"}))

        if(selected.length > 0){
          $(input_brgy).val($(input_brgy+" option[value="+selected+"]").val());

          if(typeof $(input_brgy+" option[value="+selected+"]").data('zip_code')  === undefined){
            $(input_brgy.replace("brgy","zipcode")).val("")
          }else{
            $(input_brgy.replace("brgy","zipcode")).val($(input_brgy+" option[value="+selected+"]").data('zip_code'))
          }

        }else{
          $(input_brgy).val($(input_brgy+" option:first").val());
        }
    });
  }
  $(function(){
    $(this).get_region("#input_region","#input_province","#input_town","#input_brgy","{{old('region',Session::get('business.region'))}}")

    $("#input_region").on("change",function(){
        var _val = $(this).val();
        var _text = $("#input_region option:selected").text();
        $(this).get_city($("#input_region").val(), "#input_town", "#input_brgy", "{{old('town')}}");
        $('#input_zipcode').val('');
        $('#input_region_name').val(_text);
    });

    $("#input_town").on("change",function(){
        var _val = $(this).val();
        var _text = $("#input_town option:selected").text();
        $(this).get_brgy(_val, "#input_brgy", "");
        $('#input_zipcode').val('');
        $('#input_town_name').val(_text);
    });

    @if(strlen(old('region')) > 0 || strlen(Session::get('business.region')) > 0)
        $(this).get_city("{{old('region',Session::get('business.region'))}}", "#input_town", "#input_brgy", "{{old('town',Session::get('business.town'))}}");
    @endif

    @if(strlen(old('town')) > 0 || strlen(Session::get('business.town')) > 0)
        $(this).get_brgy("{{old('town',Session::get('business.town'))}}", "#input_brgy", "{{old('brgy',Session::get('business.brgy'))}}");
    @endif

    $("#input_brgy").on("change",function(){
      $('#input_zipcode').val($(this).find(':selected').data('zip_code'))
      var _text = $("#input_brgy option:selected").text();
      $('#input_brgy_name').val(_text);
    });
  })

</script>
@endsection