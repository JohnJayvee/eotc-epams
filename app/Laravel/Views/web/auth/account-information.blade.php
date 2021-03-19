@extends('web._layouts.main')


@section('content')
<!--team section start-->
{{ Session::put('percent',35) }}
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
              <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                      <label class="text-form pb-2">First Name</label>
                      <input type="text" class="form-control {{ $errors->first('fname') ? 'is-invalid': NULL  }} form-control-sm" name="fname" placeholder="Firstname" value="{{old('fname',Session::get('registration.fname'))}}">
                       @if($errors->first('fname'))
                          <small class="form-text pl-1" style="color:red;">{{$errors->first('fname')}}</small>
                      @endif
                  </div>
              </div>
              <div class="col-md-6 col-lg-6">
                  <div class="form-group mb-0">
                      <label class="text-form pb-2">Last Name</label>
                      <input type="text" class="form-control {{ $errors->first('lname') ? 'is-invalid': NULL  }} form-control-sm" name="lname" placeholder="Lastname" value="{{old('lname',Session::get('registration.lname'))}}">
                      @if($errors->first('lname'))
                          <small class="form-text pl-1" style="color:red;">{{$errors->first('lname')}}</small>
                      @endif
                  </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="form-group ">
                <label class="text-form pb-2">Middle Name</label>
                <input type="text" class="form-control form-control-sm" name="mname" placeholder="Middlename" value="{{old('mname',Session::get('registration.mname'))}}">
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label class="text-form pb-2">Gender</label>
                {!!Form::select("gender", $gender_type, old('gender',Session::get('registration.gender')), ['id' => "input_gender", 'class' => "form-control form-control-sm classic ".($errors->first('gender') ? 'is-invalid' : NULL)])!!}
                @if($errors->first('gender'))
                <p class="mt-1 text-danger">{!!$errors->first('gender')!!}</p>
                @endif
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label class="text-form pb-2">Contact Number</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text text-title fw-600">+63 <span class="pr-1 pl-2" style="padding-bottom: 2px"> |</span></span>
                  </div>
                  <input type="text" class="form-control {{ $errors->first('contact_number') ? 'is-invalid': NULL  }} br-left-white" name="contact_number" placeholder="Contact Number" value="{{old('contact_number',Session::get('registration.contact_number'))}}">
                    
                </div>
                @if($errors->first('contact_number'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('contact_number')}}</small>
                @endif
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label class="text-form pb-2">Birthdate</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control datepicker {{ $errors->first('birthdate') ? 'is-invalid': NULL  }} br-right-white p-2" name="birthdate" placeholder="YYYY-MM-DD" value="{{old('birthdate',Session::get('registration.birthdate'))}}">
                  <div class="input-group-append">
                      <span class="input-group-text text-title fw-600"><i class="fa fa-calendar"></i></span>
                  </div>
                </div>
                @if($errors->first('birthdate'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('birthdate')}}</small>
                @endif
              </div>
            </div>
          </div>
          <input type="hidden" class="form-control" name="region_name" id="input_region_name" value="{{old('region_name',Session::get('registration.region_name'))}}">
          <input type="hidden" class="form-control" name="town_name" id="input_town_name" value="{{old('town_name',Session::get('registration.town_name'))}}">
          <input type="hidden" class="form-control" name="brgy_name" id="input_brgy_name" value="{{old('brgy_name',Session::get('registration.brgy_name'))}}">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="text-form pb-2">Region</label>
                {!!Form::select('region',[],old('region'),['id' => "input_region",'class' => "form-control form-control-sm classic ".($errors->first('region') ? 'border-red' : NULL)])!!}
                @if($errors->first('region'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('region')}}</small>
                @endif
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="text-form pb-2">City Municipality</label>
                {!!Form::select('town',[],old('town',Session::get('registration.town')),['id' => "input_town",'class' => "form-control form-control-sm classic ".($errors->first('city') ? 'border-red' : NULL)])!!}
                @if($errors->first('town'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('town')}}</small>
                @endif
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label class="text-form pb-2">Barangay</label>
                {!!Form::select('brgy',[],old('brgy'),['id' => "input_brgy",'class' => "form-control form-control-sm classic ".($errors->first('brgy') ? 'border-red' : NULL)])!!}
                @if($errors->first('brgy'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('brgy')}}</small>
                @endif
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label for="input_zipcode" class="text-form pb-2">Zipcode</label>
                <input type="text" id="input_zipcode" class="form-control {{ $errors->first('zipcode') ? 'is-invalid': NULL  }}" name="zipcode" value="{{old('zipcode',session()->get('soleproprietorship.new_business.zip_code'))}}" readonly="readonly">
                @if($errors->first('zipcode'))
                  <p class="help-block text-danger">{{$errors->first('zipcode')}}</p>
                @endif
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label class="text-form pb-2">Street Name</label>
                <input type="text" class="form-control {{ $errors->first('street_name') ? 'is-invalid': NULL  }} form-control-sm" name="street_name" placeholder="Street Name" value="{{old('street_name',Session::get('registration.street_name'))}}">
                @if($errors->first('street_name'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('street_name')}}</small>
                @endif
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label class="text-form pb-2">BLDG/ Unit Number</label>
                <input type="text" class="form-control {{ $errors->first('unit_number') ? 'is-invalid': NULL  }} form-control-sm" name="unit_number" placeholder="Unit Number" value="{{old('unit_number',Session::get('registration.unit_number'))}}">
                @if($errors->first('unit_number'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('unit_number')}}</small>
                @endif
              </div>
            </div>
          </div>
          <button type="submit" class="btn secondary-solid-btn px-5 py-3 fs-14 float-right"><i class="fa fa-paper-plane pr-2"></i>Next</button>
          <a href="{{route('web.register.revert')}}"class="btn btn-white text-black px-5 py-3 fs-14 float-right mr-3"></i>Back</a>
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
@stop
@section('page-scripts')
<script src="{{asset('system/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript">
    $('#file').change(function(e){
      var fileName = e.target.files[0].name;
      $('#lblName').text(fileName);
    });
    
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
        $('.datepicker').datepicker({
          format : "yyyy-mm-dd",
          maxViewMode : 2,
          autoclose : true,
          zIndexOffset: 9999
        });

        $(this).get_region("#input_region","#input_province","#input_town","#input_brgy","{{old('region',Session::get('registration.region'))}}")

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


        @if(strlen(old('region')) > 0 || Session::get('registration.region'))
            $(this).get_city("{{old('region',Session::get('registration.region'))}}", "#input_town", "#input_brgy", "{{old('town',Session::get('registration.town'))}}");
        @endif

        @if(strlen(old('town')) > 0 || Session::get('registration.town'))
            $(this).get_brgy("{{old('town',Session::get('registration.town'))}}", "#input_brgy", "{{old('brgy',Session::get('registration.brgy'))}}");
        @endif

        $("#input_brgy").on("change",function(){
            $('#input_zipcode').val($(this).find(':selected').data('zip_code'))
            var _text = $("#input_brgy option:selected").text();
            $('#input_brgy_name').val(_text);
        });

    })
    $(".toggle-password").click(function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
        input.attr("type", "text");
        } else {
        input.attr("type", "password");
        }
    });
</script>

@endsection
