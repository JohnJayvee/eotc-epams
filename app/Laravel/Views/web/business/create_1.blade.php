@extends('web._layouts.main')


@section('content')
{{ Session::put('business_current_progress',1) }}
<!--team section start-->
<section class="px-120 pt-110 pb-120 gray-light-bg" >
  <div class="container">
    <div class="card login-signup-form" style="border-radius: 8px;">
      <div class="card-body">
        <form method="POST" action="" enctype="multipart/form-data" id="msform">
          {!!csrf_field()!!}
          <!-- progressbar -->
          @include('web._components.business_progressbar')
         
            <div class="row mt-2">
              <div class="col-md-12 col-lg-12" >
                <div class="form-group">
                    <label class="text-form pb-2 fw-600">Company Name</label>
                    <input type="text" class="form-control form-control-lg {{ $errors->first('company_name') ? 'is-invalid': NULL  }}" name="company_name" placeholder="Company Name" value="{{old('company_name',Session::get('business.company_name'))}}">
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
                        {!!Form::select("zone_id", $zone_locations, old('zone_id',Session::get('business.zone_id')), ['id' => "input_zone_id", 'class' => "classic form-control form-control-lg"])!!}
                        @if($errors->first('zone_id'))
                          <small class="form-text pl-1" style="color:red;">{{$errors->first('zone_id')}}</small>
                        @endif
                    </div>
                </div>
            </div>
          <a href="{{route('web.business.index')}}" class="btn btn-light px-5 py-3 fs-14 float-left">Cancel</a>
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

</script>
@endsection
