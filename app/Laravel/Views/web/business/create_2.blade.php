@extends('web._layouts.main')


@section('content')

<!--team section start-->
<section class="px-120 pt-110 pb-120 gray-light-bg" >
    <div class="container">
        <div class="card" style="border-radius: 8px;">
      <div class="card-body">
        <form method="POST" action="" enctype="multipart/form-data" id="msform">
          {!!csrf_field()!!}
          <!-- progressbar -->
          @include('web._components.business_progressbar')
         
            <div class="row mt-2">
              <div class="col-md-12 col-lg-12" >
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Exact Location</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('exact_location') ? 'is-invalid': NULL  }}" name="exact_location" placeholder="Exact Location" value="{{old('exact_location',Session::get('business.exact_location'))}}">
                  @if($errors->first('exact_location'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('exact_location')}}</small>
                  @endif
                </div>
              </div>
            </div>
            <input type="hidden" class="form-control" name="region_name" id="input_region_name" value="{{old('region_name',Session::get('business.region_name'))}}">
            <input type="hidden" class="form-control" name="town_name" id="input_town_name" value="{{old('town_name',Session::get('business.town_name'))}}">
            <input type="hidden" class="form-control" name="brgy_name" id="input_brgy_name" value="{{old('brgy_name',Session::get('business.brgy_name'))}}">
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
                        {!!Form::select('town',[],old('town',Session::get('business.town')),['id' => "input_town",'class' => "form-control form-control-lg classic ".($errors->first('town') ? 'border-red' : NULL)])!!}
                        @if($errors->first('town'))
                            <small class="form-text pl-1" style="color:red;">{{$errors->first('town')}}</small>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label class="text-form pb-2">Barangay</label>
                        {!!Form::select('brgy',[],old('brgy',Session::get('business.region')),['id' => "input_brgy",'class' => "form-control form-control-lg classic ".($errors->first('brgy') ? 'border-red' : NULL)])!!}
                        @if($errors->first('brgy'))
                            <small class="form-text pl-1" style="color:red;">{{$errors->first('brgy')}}</small>
                        @endif
                    </div>
                </div>
            </div>
           <a href="{{route('web.business.revert')}}" class="btn btn-light px-5 py-3 fs-14 float-left">Back</a>
          <button type="submit" class="btn secondary-solid-btn px-5 py-3 fs-14 float-right">Next</button>
        </form>
      </div>
    </div>
    </div>

</section>
<!--team section end-->


@stop

@section('page-scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
