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
              <h1 class="text-title fs-15">Company Profile</h1>
              <form method="POST" action="" enctype="multipart/form-data"
                id="msform">
                {!! csrf_field() !!}
                <!-- progressbar -->
                {{-- <div class="row">
                  <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                      <label class="text-form pb-2 fw-600">Company Name</label>
                      <select class="livesearch form-control form-control-lg" name="livesearch" val></select>
                      @if($errors->first('company_name'))
                        <small class="form-text pl-1" style="color:red;">{{$errors->first('company_name')}}</small>
                      @endif
                    </div>
                  </div>
                </div> --}}
                
                <input type="text" id='company_id' readonly name="company_id" value="{{old('company_id',Session::get('registration.company_id'))}}">
                <div class="row">
                  <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                      <label class="text-form pb-2 fw-600">Company Name <span style="color: red">*</span></label>
                      <input type="text" id='company_search' class="form-control form-control-lg {{ $errors->first('company_name') ? 'is-invalid': NULL  }}" placeholder="Company Name" value="{{old('company_name',Session::get('registration.company_name'))}}" name="company_name">
                      @if($errors->first('company_name'))
                        <small class="form-text pl-1" style="color:red;">{{$errors->first('company_name')}}</small>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <a href="{{route('web.company_request')}}" class="float-right text-danger fw-600">Didn't Find your company on the list ?</a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                      <label class="text-form pb-2 fw-600">Zone Location <span style="color: red">*</span></label>
                      {!!Form::select("zone_id", $zone_locations, old('zone_id',Session::get('registration.zone_id')), ['id' => "input_zone_id", 'class' => "classic form-control form-control-lg"])!!}
                      @if($errors->first('zone_id'))
                        <small class="form-text pl-1" style="color:red;">{{$errors->first('zone_id')}}</small>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                      <label class="text-form pb-2 fw-600">Enterprise Type <span style="color: red">*</span></label>
                      {!!Form::select("enterprise_type", $enterprises, old('enterprise_type',Session::get('registration.enterprise_type')), ['id' => "input_enterprise_type", 'class' => "classic form-control form-control-lg"])!!}
                      @if($errors->first('enterprise_type'))
                        <small class="form-text pl-1" style="color:red;">{{$errors->first('enterprise_type')}}</small>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                      <label class="text-form pb-2 fw-600">Certification Registration (CR) Number <span style="color: red">*</span></label>
                      <input type="text" class="form-control {{ $errors->first('cr_number') ? 'is-invalid': NULL  }} form-control-lg" name="cr_number" placeholder="xxxxxxxxxxxxxx" value="{{old('cr_number',Session::get('registration.cr_number'))}}">
                      @if($errors->first('cr_number'))
                        <small class="form-text pl-1" style="color:red;">{{$errors->first('cr_number')}}</small>
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
@push('page-styles')
<link href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">
<style type="text/css">
  .select2-container .select2-selection--single {
    height: 58px;
  }
  .select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 55px;
  }
  .select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 55px;
  }
  .select2-container--default .select2-selection--single {
    border: 2px solid #EAEAEA;
    border-radius: 5px;
  }
</style>
@endpush
@push('page-scripts')
<script src="http://demo.expertphp.in/js/jquery.js"></script>
<script src="http://demo.expertphp.in/js/jquery-ui.min.js"></script>
 <script type="text/javascript">

    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

      $( "#company_search" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url:"{{route('web.get_company')}}",
            type: 'get',
            dataType: "json",
            data: {
               _token: CSRF_TOKEN,
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
           // Set selection
           $('#company_search').val(ui.item.label); // display the selected text
           $('#company_id').val(ui.item.value); // save selected id to input
           return false;
        }
      });

    });
    </script>

@endpush