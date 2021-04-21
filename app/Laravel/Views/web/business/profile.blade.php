@extends('web._layouts.main')


@section('content')

<!--team section start-->
<section class="px-120 pt-110 pb-120 gray-light-bg" >
  <div class="container">
    <div class="card" style="border-radius: 8px;">
      <div class="card-body">
        @include('web._components.notifications')
        <div class="row">
          <div class="col-md-6">
            <h3 class="p-4">Business CV</h3>
          </div>
          <div class="col-md-6 p-3">
            <a href="{{ route('web.application.history',[$profile->id])}}" class="btn secondary-solid-btn float-right ">View Transactions</a>
          </div>
        </div>

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
                  <input type="text" class="form-control form-control-lg {{ $errors->first('company_name') ? 'is-invalid': NULL  }}" name="company_name" placeholder="ContractorID" value="{{old('company_name',$profile->company_name)}}" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-lg-12">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Zone Location</label>
                  {!!Form::select("zone_id", $zone_locations, old('zone_id',$profile->zone_id), ['id' => "input_zone_id", 'class' => "classic form-control form-control-lg" ,'disabled' => "disabled"])!!}
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="address_details" role="tabpanel" aria-labelledby="address-details-tab">
            <div class="row mt-2">
              <div class="col-md-12 col-lg-12" >
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Exact Location</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('exact_location') ? 'is-invalid': NULL  }}" name="exact_location" placeholder="ContractorID" value="{{old('exact_location',$profile->exact_location)}}" readonly>
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-md-12 col-lg-12" >
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Region</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('region_name') ? 'is-invalid': NULL  }}" name="region_name" placeholder="ContractorID" value="{{old('region_name',$profile->region_name)}}" readonly>
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-md-12 col-lg-12" >
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">City/Municipality</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('town_name') ? 'is-invalid': NULL  }}" name="town_name" placeholder="ContractorID" value="{{old('town_name',$profile->town_name)}}" readonly>
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-md-12 col-lg-12" >
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Barangay</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('brgy_name') ? 'is-invalid': NULL  }}" name="brgy_name" placeholder="ContractorID" value="{{old('brgy_name',$profile->brgy_name)}}" readonly>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="contact_details" role="tabpanel" aria-labelledby="contact-details-tab">
            <div class="row mt-2">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">First Name</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('first_name') ? 'is-invalid': NULL  }}" name="first_name" placeholder="First Name" value="{{old('first_name',$profile->first_name)}}" readonly>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Last Name</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('last_name') ? 'is-invalid': NULL  }}" name="last_name" placeholder="Last Name" value="{{old('last_name',$profile->last_name)}}" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Middle Name</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('middle_name') ? 'is-invalid': NULL  }}" name="middle_name" placeholder="Middle Name" value="{{old('middle_name',$profile->middle_name)}}" readonly>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Email</label>
                  <input type="email" class="form-control form-control-lg {{ $errors->first('email') ? 'is-invalid': NULL  }}" name="email" placeholder="username@email.com" value="{{old('email',$profile->email)}}" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Mobile Number</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('contact_number') ? 'is-invalid': NULL  }}" name="contact_number" placeholder="09xxxxxxxxx" value="{{old('contact_number',$profile->contact_number)}}" readonly>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Telephone Number</label>
                  <input type="email" class="form-control form-control-lg {{ $errors->first('telephone_number') ? 'is-invalid': NULL  }}" name="telephone_number" placeholder="Telephone Number" value="{{old('telephone_number',$profile->telephone_number)}}" readonly>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a href="{{route('web.business.index')}}" class="btn btn-light px-5 py-3 fs-14 float-left ml-4 text-title">Back to Dashboard</a>
        <a href="{{route('web.application.create',[$profile->id])}}" class="btn secondary-solid-btn px-5 py-3 fs-14 float-right mr-4">Apply Application</a>
      </div>
    </div>
  </div>
</section>
<!--team section end-->


@stop

@section('page-scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@endsection
