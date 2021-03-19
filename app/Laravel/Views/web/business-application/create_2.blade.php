@extends('web._layouts.main')


@section('content')
<!--team section start-->
<section class="px-120 pt-110 pb-120 gray-light-bg">
    <div class="container">

      <div class="card" style="border-radius: 8px;">
        <div class="card-body m-3">
          <form method="POST" action="" enctype="multipart/form-data" id="msform">
            {!!csrf_field()!!}
            <!-- progressbar -->
            <h3 >Building Permit and / or Ancillary Permits Application Evaluation Form</h3>
            <p class="text-title fw-600 fs-15">Zone Code: {{$profile->zone->code}} <span class="text-black fs-15"> {{strtoupper($profile->company_name)}}</span></p>
            <p class="text-title fw-600 mt-2 fs-15">application Transaction</p>
            <div class="row mt-2">
              <div class="col-md-6 col-lg-6" >
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Locator/EnterPrise</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('locator_enterprise') ? 'is-invalid': NULL  }}" name="locator_enterprise" placeholder="Locator/EnterPrise" value="{{old('locator_enterprise',Session::get('application.locator_enterprise'))}}">
                  @if($errors->first('locator_enterprise'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('locator_enterprise')}}</small>
                  @endif
                </div>
              </div>
              <div class="col-md-6 col-lg-6" >
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Project Title</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('project_title') ? 'is-invalid': NULL  }}" name="project_title" placeholder="Project Title" value="{{old('project_title',Session::get('application.project_title'))}}">
                  @if($errors->first('project_title'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('project_title')}}</small>
                  @endif
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-md-6 col-lg-6" >
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Locator/Zone</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('locator_zone') ? 'is-invalid': NULL  }}" name="locator_zone" placeholder="Locator/Zone" value="{{old('locator_zone',Session::get('application.locator_zone'))}}">
                  @if($errors->first('locator_zone'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('locator_zone')}}</small>
                  @endif
                </div>
              </div>
              <div class="col-md-6 col-lg-6" >
                <div class="form-group">
                  <label class="text-form pb-2 fw-600">Contractor</label>
                  <input type="text" class="form-control form-control-lg {{ $errors->first('contractor') ? 'is-invalid': NULL  }}" name="contractor" placeholder="Contractor" value="{{old('contractor',Session::get('application.contractor'))}}">
                  @if($errors->first('contractor'))
                    <small class="form-text pl-1" style="color:red;">{{$errors->first('contractor')}}</small>
                  @endif
                </div>
              </div>
            </div>
            <p class="text-title fw-600 mt-2 fs-15">Upload Requirements</p>
            <div class="row mb-3">
              <div class="col-md-12 col-lg-12" >
                <label class="text-form fw-600">Four(4) clear copies of valid PRC License and PTR of signing professionals <span style="color: red">*</span></label>
                <div class="input-group mb-3">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="input_prc_license" name="prc_license">
                    <label class="custom-file-label .custom1" for="input_prc_license">No File Choosen</label>
                  </div>
                </div>
                @if($errors->first('prc_license'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('prc_license')}}</small>
                @endif
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12 col-lg-12" >
                <label class="text-form fw-600">Copy of PEZA Enterprise's Certificate of Registration and Registration Agreement or Approved Board Solution<span style="color: red">*</span></label>
                <div class="input-group mb-3">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="input_certificate" name="certificate">
                    <label class="custom-file-label" for="input_certificate">No File Choosen</label>
                  </div>
                </div>
                @if($errors->first('certificate'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('certificate')}}</small>
                @endif
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12 col-lg-12" >
                <label class="text-form fw-600">Supplemental Agreement or Letter of Authority LOA<span style="color: red">*</span></label>
                <div class="input-group mb-3">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="input_loa" name="loa">
                    <label class="custom-file-label" for="input_loa">No File Choosen</label>
                  </div>
                </div>
                @if($errors->first('loa'))
                  <small class="form-text pl-1" style="color:red;">{{$errors->first('loa')}}</small>
                @endif
              </div>
            </div>
            <p class="fw-600 text-black">Please Review your Existing information below before continuing.</p>
            <div class="custom-control custom-checkbox checkbox-xl mb-5">
              <input type="checkbox" class="custom-control-input" id="checkbox-3" name="agreement_check" value="1">
              <label class="custom-control-label fw-500" for="checkbox-3"><span class="fw-600">I AGREE UNDER PENALTY OF PERJUARY</span> that the foregoing information are based on my personal knowledge and authentic records. Further, I agree to comply with the regulatory requirements and other deficiencies within 30 days from release of the Business Permit. <span class="fw-600">FAILURE TO COMPLY WITH ALL THE REQUIREMENTS WILL AUTOMATICALLY REVOKE PERMIT.</span></label>
              @if($errors->first('loa'))
                <small class="form-text" style="color:red;padding-left: 2em">{{$errors->first('loa')}}</small>
              @endif
            </div>
            <a href="{{route('web.application.revert',[$profile->id])}}" class="btn btn-light px-5 py-3 fs-14 float-left text-title">Cancel</a>
            <button type="submit" class="btn secondary-solid-btn px-5 py-3 fs-14 float-right">Request Evaluation</button>

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
 $(document).on('change', '.custom-file-input', function (event) {
    $(this).next('.custom-file-label').html(event.target.files[0].name);
})
</script>
@endsection
@section('page-styles')
<style type="text/css">
  .custom-file-label {
    height: 3.5em;
    padding-top: 15px;
    border-radius: 10px;
  }
  .custom-file-label::after {
    height: 3.4em;
    padding-top: 15px;
    background-color: #0038A8;
    color: #fff;
    content: "Choose File" !important;
    border-radius: 0 .50rem .50rem 0

  }

.checkbox-xl .custom-control-label::before, 
.checkbox-xl .custom-control-label::after {
  top: 1.2rem !important;
  width: 2.85rem;
  height: 2.85rem;
}

.checkbox-xl .custom-control-label {
  padding-top: 25px;
  padding-left: 30px;
  color: #000;
  font-size: 18px;
}


</style>
@endsection