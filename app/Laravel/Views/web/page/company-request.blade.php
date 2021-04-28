@extends('web._layouts.main')


@section('content')


<!--team section start-->
<section class="px-120 pt-110 pb-80 gray-light-bg">
    <div class="container">
      <div class="card card-rounded shadow-sm">
        
        <div class="card-body">
          <p class="text-title fw-600">Add Company</p>
          <form method="POST" action="" enctype="multipart/form-data"
                id="msform">
                {!! csrf_field() !!}
                <!-- progressbar -->
                <div class="row">
                  <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                      <label class="text-form pb-2 fw-600">Company Name</label>
                      <input type="text" class="form-control {{ $errors->first('company_name') ? 'is-invalid': NULL  }} form-control-lg" name="company_name" placeholder="Company Name" value="{{old('company_name')}}">
                      @if($errors->first('company_name'))
                        <small class="form-text pl-1" style="color:red;">{{$errors->first('company_name')}}</small>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                      <label class="text-form pb-2 fw-600">Company Name</label>
                      <textarea class="form-control" name="description" rows="5">{{old('description')}}</textarea>
                      @if($errors->first('description'))
                        <small class="form-text pl-1" style="color:red;">{{$errors->first('description')}}</small>
                      @endif
                    </div>
                  </div>
                </div>
                <a href="{{route('web.register.index')}}"class="btn btn-light text-title px-5 py-3 fs-14 mr-3"></i>Back</a>
                <button type="submit" class="btn secondary-solid-btn px-5 py-3 fs-14 float-right"><i class="fa fa-paper-plane pr-2"></i>Submit</button>
              </form>
        </div>
      </div>
     
    </div>
</section>
<!--team section end-->

@stop
