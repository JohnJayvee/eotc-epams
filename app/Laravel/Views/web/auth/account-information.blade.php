@extends('web._layouts.guest')


@section('content')
  <div class="tw-h-screen tw-flex tw-overflow-hidden tw-bg-white">
    @include('web._components.sidebar-signup')
    <!--team section start-->
    <div class="tw-flex tw-flex-col tw-w-0 tw-flex-1 tw-overflow-y-auto">
      <section>
        <div class="container" style="margin-top: 5em">
          <div class="card login-signup-form" style="border-radius: 8px;">
            <div class="card-body">
              <h3 class=" pb-3">Sign Up</h3>
              <h1 class="text-title fs-15">Contact Information</h1>
              <form method="POST" action="" enctype="multipart/form-data"
                id="msform">
                {!! csrf_field() !!}
                <!-- progressbar -->
                <div class="row">
                  <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                      <label class="text-form pb-2 fw-600">First Name <span style="color: red">*</span></label>
                      <input type="text" class="form-control {{ $errors->first('fname') ? 'is-invalid': NULL  }} form-control-lg" name="fname" placeholder="Firstname" value="{{old('fname',Session::get('registration.fname'))}}">
                      @if($errors->first('fname'))
                        <small class="form-text pl-1" style="color:red;">{{$errors->first('fname')}}</small>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6">
                    <div class="form-group mb-0">
                      <label class="text-form pb-2 fw-600 fw-600">Last Name <span style="color: red">*</span></label>
                      <input type="text" class="form-control {{ $errors->first('lname') ? 'is-invalid': NULL  }} form-control-lg" name="lname" placeholder="Lastname" value="{{old('lname',Session::get('registration.lname'))}}">
                      @if($errors->first('lname'))
                        <small class="form-text pl-1" style="color:red;">{{$errors->first('lname')}}</small>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-lg-6">
                    <div class="form-group ">
                      <label class="text-form pb-2 fw-600">Middle Name</label>
                      <input type="text" class="form-control form-control-lg" name="mname" placeholder="Middlename" value="{{old('mname',Session::get('registration.mname'))}}">
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                      <label class="text-form pb-2 fw-600">Position</label>
                      <input type="text" class="form-control form-control-lg {{ $errors->first('position') ? 'is-invalid': NULL  }}" name="position" placeholder="Position" value="{{old('position',Session::get('registration.position'))}}">
                      @if($errors->first('position'))
                        <small class="form-text pl-1" style="color:red;">{{$errors->first('position')}}</small>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                      <label class="text-form pb-2 fw-600">Primary Phone <span style="color: red">*</span></label>
                      <input type="text" class="form-control form-control-lg {{ $errors->first('primary_phone') ? 'is-invalid': NULL  }}" name="primary_phone" placeholder="Middlename" value="{{old('primary_phone',Session::get('registration.primary_phone'))}}">
                      @if($errors->first('primary_phone'))
                        <small class="form-text pl-1" style="color:red;">{{$errors->first('primary_phone')}}</small>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6">
                    <div class="form-group ">
                      <label class="text-form pb-2 fw-600">Alternate Phone</label>
                      <input type="text" class="form-control form-control-lg {{ $errors->first('alternate_phone') ? 'is-invalid': NULL  }}" name="alternate_phone" placeholder="Alternate Phone" value="{{old('alternate_phone',Session::get('registration.alternate_phone'))}}">
                      @if($errors->first('alternate_phone'))
                        <small class="form-text pl-1" style="color:red;">{{$errors->first('alternate_phone')}}</small>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-lg-6">
                    <div class="form-group ">
                      <label class="text-form pb-2 fw-600">Fax </label>
                      <input type="text" class="form-control form-control-lg {{ $errors->first('fax') ? 'is-invalid': NULL  }}" name="fax" placeholder="Fax" value="{{old('fax',Session::get('registration.fax'))}}">
                       @if($errors->first('fax'))
                        <small class="form-text pl-1" style="color:red;">{{$errors->first('fax')}}</small>
                      @endif
                    </div>
                  </div>
                </div>
                
                <a href="{{route('web.register.revert')}}"class="btn btn-light text-title px-5 py-3 fs-14 mr-3"></i>Back</a>
                <button type="submit" class="btn secondary-solid-btn px-5 py-3 fs-14 float-right"><i class="fa fa-paper-plane pr-2"></i>Next</button>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <!--team section end-->


@endsection

