@extends('web._layouts.main')


@section('content')

<!--team section start-->
<section class="px-120 pt-110 pb-120 gray-light-bg" >
    <div class="container">
       @include('web._components.notifications')
      <div class="card" style="border-radius: 8px;">
        <div class="card-body">
          <form method="POST" action="" enctype="multipart/form-data" id="msform">
            {!!csrf_field()!!}
            <!-- progressbar -->
            <h3 class="p-4">Edit Business CV</h3>

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <a href="#" class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#company_details" type="button" role="tab" aria-controls="company-details" aria-selected="true">Company Details</a>
              </li>
              <li class="nav-item" role="presentation">
                <a href="#" class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#address_details" type="button" role="tab" aria-controls="address-details" aria-selected="false">Site Address Details</a>
              </li>
              <li class="nav-item" role="presentation">
                <a href="" class="nav-link" id="pills-contact-tab" data-toggle="pill" data-target="#contact_details" type="button" role="tab" aria-controls="contact-details" aria-selected="false">Company Contact Details</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="company_details" role="tabpanel" aria-labelledby="company-details-tab">
                <div class="row mt-2">
                  <div class="col-md-12 col-lg-12" >
                    <div class="form-group">
                      <label class="text-form pb-2 fw-600">Company Name</label>
                      <input type="text" class="form-control form-control-lg {{ $errors->first('company_name') ? 'is-invalid': NULL  }}" name="company_name" placeholder="Company Name" value="{{old('company_name',$profile->company_name)}}">
                      @if($errors->first('company_name'))
                        <small class="form-text pl-1" style="color:red;">{{$errors->first('company_name')}}</small>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                      <label class="text-form pb-2 fw-600">Zone Location</label>
                      {!!Form::select("zone_id", $zone_locations, old('zone_id',$profile->zone_id), ['id' => "input_zone_id", 'class' => "classic form-control form-control-lg"])!!}
                      @if($errors->first('zone_id'))
                        <small class="form-text pl-1" style="color:red;">{{$errors->first('zone_id')}}</small>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="address_details" role="tabpanel" aria-labelledby="address-details-tab">
                <div class="row mt-2">
                  <div class="col-md-12 col-lg-12" >
                    <div class="form-group">
                      <label class="text-form pb-2 fw-600">Exact Location</label>
                      <input type="text" class="form-control form-control-lg {{ $errors->first('exact_location') ? 'is-invalid': NULL  }}" name="exact_location" placeholder="Exact Location" value="{{old('exact_location',$profile->exact_location)}}">
                       @if($errors->first('zone_id'))
                        <small class="form-text pl-1" style="color:red;">{{$errors->first('zone_id')}}</small>
                      @endif
                    </div>
                  </div>
                </div>
                <input type="hidden" class="form-control" name="region_name" id="input_region_name" value="{{old('region_name',$profile->region_name)}}">
                <input type="hidden" class="form-control" name="town_name" id="input_town_name" value="{{old('town_name',$profile->town_name)}}">
                <input type="hidden" class="form-control" name="brgy_name" id="input_brgy_name" value="{{old('town_name',$profile->town_name)}}">
                <input type="hidden" id="input_zipcode"   name="zipcode" value="{{old('zipcode')}}">
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
                      {!!Form::select('town',[],old('town',$profile->town),['id' => "input_town",'class' => "form-control form-control-lg classic ".($errors->first('town') ? 'border-red' : NULL)])!!}
                      @if($errors->first('town'))
                        <small class="form-text pl-1" style="color:red;">{{$errors->first('town')}}</small>
                      @endif
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                      <label class="text-form pb-2">Barangay</label>
                      {!!Form::select('brgy',[],old('brgy',$profile->region),['id' => "input_brgy",'class' => "form-control form-control-lg classic ".($errors->first('brgy') ? 'border-red' : NULL)])!!}
                      @if($errors->first('brgy'))
                        <small class="form-text pl-1" style="color:red;">{{$errors->first('brgy')}}</small>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="contact_details" role="tabpanel" aria-labelledby="contact-details-tab">
                <div class="row mt-2">
                  <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                      <label class="text-form pb-2 fw-600">First Name</label>
                      <input type="text" class="form-control form-control-lg {{ $errors->first('first_name') ? 'is-invalid': NULL  }}" name="first_name" placeholder="First Name" value="{{old('first_name',$profile->first_name)}}">
                      @if($errors->first('first_name'))
                        <small class="form-text pl-1" style="color:red;">{{$errors->first('first_name')}}</small>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                      <label class="text-form pb-2 fw-600">Last Name</label>
                      <input type="text" class="form-control form-control-lg {{ $errors->first('last_name') ? 'is-invalid': NULL  }}" name="last_name" placeholder="Last Name" value="{{old('last_name',$profile->last_name)}}">
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
                      <input type="text" class="form-control form-control-lg {{ $errors->first('middle_name') ? 'is-invalid': NULL  }}" name="middle_name" placeholder="Middle Name" value="{{old('middle_name',$profile->middle_name)}}">
                      @if($errors->first('middle_name'))
                        <small class="form-text pl-1" style="color:red;">{{$errors->first('middle_name')}}</small>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                      <label class="text-form pb-2 fw-600">Email</label>
                      <input type="email" class="form-control form-control-lg {{ $errors->first('email') ? 'is-invalid': NULL  }}" name="email" placeholder="username@email.com" value="{{old('email',$profile->email)}}">
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
                      <input type="text" class="form-control form-control-lg {{ $errors->first('contact_number') ? 'is-invalid': NULL  }}" name="contact_number" placeholder="09xxxxxxxxx" value="{{old('contact_number',$profile->contact_number)}}">
                      @if($errors->first('contact_number'))
                        <small class="form-text pl-1" style="color:red;">{{$errors->first('contact_number')}}</small>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                      <label class="text-form pb-2 fw-600">Telephone Number</label>
                      <input type="text" class="form-control form-control-lg {{ $errors->first('telephone_number') ? 'is-invalid': NULL  }}" name="telephone_number" placeholder="Telephone Number" value="{{old('telephone_number',$profile->telephone_number)}}">
                      @if($errors->first('telephone_number'))
                        <small class="form-text pl-1" style="color:red;">{{$errors->first('telephone_number')}}</small>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <a href="{{route('web.business.index')}}" class="btn btn-light px-5 py-3 fs-14 float-left ml-4">Cancel</a>
            <button type="submit" class="btn secondary-solid-btn px-5 py-3 fs-14 float-right mr-4">Update</button>
          </form>
        </div>
      </div>
    </div>
</section>
<!--team section end-->


@stop
@section('page-scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript"></script>
<script type="text/javascript">
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
    $(this).get_region("#input_region","#input_province","#input_town","#input_brgy","{{old('region',$profile->region)}}")

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

    @if(strlen(old('region')) > 0 || strlen($profile->region))
        $(this).get_city("{{old('region',$profile->region)}}", "#input_town", "#input_brgy", "{{old('town',$profile->town)}}");
    @endif

    @if(strlen(old('town')) > 0 || strlen($profile->town))
        $(this).get_brgy("{{old('town',$profile->town)}}", "#input_brgy", "{{old('brgy',$profile->brgy)}}");
    @endif

    $("#input_brgy").on("change",function(){
      $('#input_zipcode').val($(this).find(':selected').data('zip_code'))
      var _text = $("#input_brgy option:selected").text();
      $('#input_brgy_name').val(_text);
    });
  })
</script>
@endsection

