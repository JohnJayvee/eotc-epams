@extends('web._layouts.main')

@section('content')
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
                <div class="col-md-6 col-lg-6">
                    <div class="form-group {{$errors->first('gov_id_1') ? 'text-danger' : NULL}}">
                        <label class="text-form pb-2">Government ID 1 <span class="text-danger">*</span> (maximum of 5mb)</label>
                        <input type="file" class="form-control form-control-sm" name="gov_id_1" accept="image/x-png,image/gif,image/jpeg,application/pdf" />
                        @if($errors->first('gov_id_1'))
                        <p class="help-block text-danger">{{$errors->first('gov_id_1')}}</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="form-group {{$errors->first('gov_id_2') ? 'text-danger' : NULL}}">
                        <label class="text-form pb-2">Government ID 2 <span class="text-danger">*</span> (maximum of 5mb)</label>
                        <input type="file" class="form-control form-control-sm" name="gov_id_2" accept="image/x-png,image/gif,image/jpeg,application/pdf" />
                        @if($errors->first('gov_id_2'))
                        <p class="help-block text-danger">{{$errors->first('gov_id_2')}}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="form-group {{$errors->first('business_permit') ? 'text-danger' : NULL}}">
                        <label class="text-form pb-2">Business Permit <span class="text-danger">*</span> (maximum of 5mb)</label>
                        <input type="file" class="form-control form-control-sm" name="business_permit" accept="image/x-png,image/gif,image/jpeg,application/pdf" />
                        @if($errors->first('business_permit'))
                        <p class="help-block text-danger">{{$errors->first('business_permit')}}</p>
                        @endif
                    </div>
                </div>
            </div>
            <button type="submit" class="btn secondary-solid-btn px-5 py-3 fs-14 float-right"><i class="fa fa-paper-plane pr-2"></i>Finish</button>
            <a href="{{route('web.register.revert')}}"class="btn btn-white text-black px-5 py-3 fs-14 float-right mr-3"></i>Back</a>

        </form>
      </div>
    </div>
  </div>
</section>
<!--team section end-->
<div id="gwt-standard-footer"></div>

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
