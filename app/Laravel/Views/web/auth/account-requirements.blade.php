@extends('web._layouts.main')


@section('content')
{{ Session::put('percent',70) }}
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
            <div class="col-md-6 col-lg-6 ">
              <div class="form-group">
                <label class="text-form pb-2">TIN No.</label>
                <input type="text" class="form-control {{ $errors->first('tin_no') ? 'is-invalid': NULL  }} form-control-sm" name="tin_no" placeholder="TIN Number" value="{{old('tin_no',Session::get('registration.tin_no'))}}">
                @if($errors->first('tin_no'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('tin_no')}}</small>
                @endif
              </div>
            </div>
            <div class="col-md-6 col-lg-6 ">
              <div class="form-group">
                <label class="text-form pb-2">SSS No.</label>
                <input type="text" class="form-control {{ $errors->first('sss_no') ? 'is-invalid': NULL  }} form-control-sm" name="sss_no" placeholder="TIN Number" value="{{old('sss_no',Session::get('registration.sss_no'))}}">
                @if($errors->first('sss_no'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('sss_no')}}</small>
                @endif
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-6 ">
              <div class="form-group">
                <label class="text-form pb-2">PHIC No.</label>
                <input type="text" class="form-control {{ $errors->first('phic_no') ? 'is-invalid': NULL  }} form-control-sm" name="phic_no" placeholder="TIN Number" value="{{old('phic_no',Session::get('registration.phic_no'))}}">
                @if($errors->first('phic_no'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('phic_no')}}</small>
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
</script>

@endsection
