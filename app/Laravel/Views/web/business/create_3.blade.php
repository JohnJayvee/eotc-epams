@extends('web._layouts.main')


@section('content')

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
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">First Name</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('first_name') ? 'is-invalid': NULL  }}" name="first_name" placeholder="First Name" value="{{old('first_name',Str::title($auth->fname))}}" readonly>
                  @if($errors->first('first_name'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('first_name')}}</small>
                  @endif
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Last Name</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('last_name') ? 'is-invalid': NULL  }}" name="last_name" placeholder="Last Name" value="{{old('last_name',Str::title($auth->lname))}}" readonly>
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
                  <input type="text" class="form-control form-control-lg {{ $errors->first('middle_name') ? 'is-invalid': NULL  }}" name="middle_name" placeholder="Middle Name" value="{{old('middle_name',Str::title($auth->mname))}}" readonly>
                  @if($errors->first('middle_name'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('middle_name')}}</small>
                  @endif
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Email</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('email') ? 'is-invalid': NULL  }}" name="email" placeholder="username@email.com" value="{{old('email',$auth->email)}}" readonly>
                  @if($errors->first('email'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('email')}}</small>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-16" id="mobile_container">
                <div class="form-group">
                    <label class="text-form pb-2 fw-600">Mobile Number</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text text-title fw-600" style="border-right: none;">+63 <span class="pr-1 pl-2" style="padding-bottom: 2px"> |</span></span>
                      </div>
                      <input type="text" class="form-control form-control-lg br-left-white {{ $errors->first('mobile_number') ? 'is-invalid': NULL  }}" name="mobile_number" placeholder="XXX-XXX-XXXX" value="{{old('mobile_number',$auth->primary_phone)}}" readonly>
                    </div>
                    @if($errors->first('mobile_number'))
                        <small class="form-text pl-1" style="color:red;">{{$errors->first('mobile_number')}}</small>
                    @endif
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Telephone Number</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('telephone_number') ? 'is-invalid': NULL  }}" name="telephone_number" placeholder="(XX) XXX-XXXX" value="{{old('telephone_number',Session::get('business.telephone_number'))}}">
                  @if($errors->first('telephone_number'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('telephone_number')}}</small>
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
@endsection
