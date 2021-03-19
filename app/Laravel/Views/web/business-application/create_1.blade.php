@extends('web._layouts.main')


@section('content')
{{ Session::put('current_progress',1) }}
<!--team section start-->
<section class="px-120 pt-110 pb-120 gray-light-bg">
    <div class="container">

      <div class="card" style="border-radius: 8px;">
        <div class="card-body">
          <form method="POST" action="" enctype="multipart/form-data" id="msform">
            {!!csrf_field()!!}
            <!-- progressbar -->
            <h3 class="px-4">Application</h3>
            <p class="px-4 text-title fw-600 fs-15">Zone Code: {{$profile->zone->code}} <span class="text-black fs-15"> {{strtoupper($profile->company_name)}}</span></p>

            <div class="row px-4">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                  <label for="exampleInputEmail1" class="text-form pb-2">Services</label>
                  {!!Form::select('service_id',$services,old('service_id',Session::get('application.service_id')),['id' => "input_service_id",'class' => "form-control form-control-lg classic ".($errors->first('service_id') ? 'border-red' : NULL)])!!}
                  @if($errors->first('service_id'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('service_id')}}</small>
                  @endif
                </div>
              </div>
            </div>
            <div class="row px-4">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                  <label for="exampleInputEmail1" class="text-form pb-2">Permit Type</label>
                  {!!Form::select('permit_id',['' => "--Choose Permit Type--"],old('permit_id'),['id' => "input_permit_id",'class' => "form-control form-control-lg form-control-sm classic ".($errors->first('permit_id') ? 'border-red' : NULL)])!!}
                  @if($errors->first('permit_id'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('permit_id')}}</small>
                  @endif
                </div>
              </div>
            </div>
            <a href="{{route('web.business.profile',[$profile->id])}}" class="btn btn-light px-5 py-3 fs-14 float-left ml-4">Back to CV</a>
            <button type="submit" class="btn secondary-solid-btn px-5 py-3 fs-14 float-right mr-4">Next</button>
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
  $.fn.get_permit_type = function(service_id,input_purpose,selected){
        $(input_purpose).empty().prop('disabled',true)
        $(input_purpose).append($('<option>', {
                  value: "",
                  text: "Loading Content..."
              }));
        $.getJSON( "{{route('web.get_permit_type')}}?service_id="+service_id, function( result ) {
            $(input_purpose).empty().prop('disabled',true)
            $.each(result.data,function(index,value){
              // console.log(index+value)
              $(input_purpose).append($('<option>', {
                  value: index,
                  text: value
              }));
            })

            $(input_purpose).prop('disabled',false)
            $(input_purpose).prepend($('<option>',{value : "",text : "--Choose Permit Type--"}))

            if(selected.length > 0){
              $(input_purpose).val($(input_purpose+" option[value="+selected+"]").val());

            }else{
              $(input_purpose).val($(input_purpose+" option:first").val());
              //$(this).get_extra(selected)
            }
        });
        // return result;
    };


    $("#input_service_id").on("change",function(){
      var service_id = $(this).val()
      var _text = $("#input_service_id option:selected").text();
      $(this).get_permit_type(service_id,"#input_permit_id","")
      $('#input_department_name').val(_text);
    })

    @if(old('service_id') || strlen(Session::get('application.service_id')) > 0)
        $(this).get_permit_type("{{old('service_id',Session::get('application.service_id'))}}","#input_permit_id","")
    @endif
    @if((old('service_id') and  old('permit_id')) || (Session::get('application.service_id') and Session::get('application.permit_id')))
        $(this).get_permit_type("{{old('service_id',Session::get('application.service_id'))}}","#input_permit_id","{{old('permit_id',Session::get('application.permit_id'))}}")
    @endif
</script>
@endsection
