@extends('web._layouts.main')


@section('content')


<!--team section start-->
<section class="px-120 pt-110 pb-80 gray-light-bg">
    <div class="container">
     {{--  <div class="row flex-row items-center px-4">
        <a href="{{route('web.transaction.history')}}" class="custom-btn badge-primary-2 text-white mb-2" style="float: right;margin-left: auto;">E-Submission</a>
      </div> --}}
      <div class="card card-rounded shadow-sm">
        <div class="card-body" style="border-bottom: 3px dashed #E3E3E3;">
          <div class="row">
            <div class="col-md-11 d-flex">
              <p class="text-title fw-600 pt-3">Application By: <span class="text-black">{{Str::title($business_transaction->full_name)}}</span></p>
              <p class="text-title fw-500 pl-3" style="padding-top: 15px;">|</p>
              <p class="text-title fw-600 pt-3 pl-3">Application Sent: <span class="text-black">{{ Helper::date_format($business_transaction->created_at)}}</span></p>
            </div>
          </div> 
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <p class="text-title fw-500">Business Details:</p>
              <p class="text-title fw-500">Company Name: <span class="text-black">{{str::title($business_transaction->business->company_name)}}</span></p>
              <p class="text-title fw-500">Zone Code: <span class="text-black">{{$business_transaction->business->zone->code}}</span></p>
              <p class="text-title fw-500">Exact Location: <span class="text-black">{{$business_transaction->business->exact_location}}</span></p>
              <p class="text-title fw-500">Region: <span class="text-black">{{$business_transaction->business->region_name}}</span></p>
              <p class="text-title fw-500">Town: <span class="text-black">{{$business_transaction->business->town_name}}</span></p>
              <p class="text-title fw-500">Brgy: <span class="text-black">{{$business_transaction->business->brgy_name}}</span></p>
            </div>
            <div class="col-md-4">
              <p class="text-title fw-500">Project Details:</p>
              <p class="text-title fw-500">Service: <span class="text-black">{{ Str::title($business_transaction->service->name) }}</span></p>
              <p class="text-title fw-500">Permit Type: <span class="text-black">{{ Str::title($business_transaction->permit->name) }}</span></p>
              <p class="text-title fw-500">Project Title: <span class="text-black">{{ Str::title($business_transaction->project_title) }}</span></p>
              <p class="text-title fw-500">Project Cost: <span class="text-black">{{ Helper::money_format($business_transaction->project_cost) }}</span></p>
              <p class="text-title fw-500">Region: <span class="text-black">{{$business_transaction->region_name}}</span></p>
              <p class="text-title fw-500">Town: <span class="text-black">{{$business_transaction->town_name}}</span></p>
              <p class="text-title fw-500">Brgy: <span class="text-black">{{$business_transaction->brgy_name}}</span></p>
              <p class="text-title fw-500">Status: <span class="badge  badge-{{Helper::status_badge($business_transaction->status)}} p-2">{{$business_transaction->status}}</span></p>
              @if($business_transaction->status == "DECLINED")
                <p class="text-title fw-500">Remarks: <span class="text-black">{{$business_transaction->remarks}}</span></p>
              @endif
            </div>
            <div class="col-md-4">
              <p class="text-title fw-500">PEZA Registered Enterprise: <span class="text-black">{{ Str::title($business_transaction->registered_enterprise) }}</span></p>
              <p class="text-title fw-500">PEZA Registration Number: <span class="text-black">{{ Str::title($business_transaction->registration_number) }}</span></p>
              <p class="text-title fw-500">Classification/Category: <span class="text-black">{{ Str::title($business_transaction->classification) }}</span></p>
              <p class="text-title fw-500">Use & Nature of Occupancy: <span class="text-black">{{ Str::title($business_transaction->occupancy) }}</span></p>
              <p class="text-title fw-500">Contractor: <span class="text-black">{{ Str::title($business_transaction->contractor) }}</span></p>
              <p class="text-title fw-500">PCAB License Number: <span class="text-black">{{ Str::title($business_transaction->pcab_license_number) }}</span></p>
              <p class="text-title fw-500">Locator/Enterprise: <span class="text-black">{{ Str::title($business_transaction->locator_enterprise) }}</span></p>
              <p class="text-title fw-500">Locator Zone: <span class="text-black">{{ Str::title($business_transaction->locator_zone) }}</span></p>
            </div>
          </div>
        </div>
      </div>
      <div class="card card-rounded shadow-sm mt-4">
        <div class="card-body">
          <h5 class="text-title text-uppercase pt-2">Re-Upload Requirements</h5>
          <form method="POST" action="" enctype="multipart/form-data">
            {!!csrf_field()!!}
            <input type="hidden" name="code" value="{{$business_transaction->document_reference_code}}">
            <div class="row">
              <div class="col-md-12 col-lg-12">
                <label class="text-form pb-2">Application Declined Requirements</label>
                  <table class="table table-responsive table-striped table-wrap" style="table-layout: fixed;" id="requirements">
                    <thead>
                      <tr>
                        <th class="text-title fs-15 fs-500 p-3" width="15%">Requirement Name</th>
                        <th class="text-title fs-15 fs-500 p-3" width="15%">File <code>(Only PDF file extensions is allowed)</th>
                      </tr>
                      <tbody>
                        @forelse($application_requirements as $index => $requirement)
                          <input type="hidden" name="requirements_id[]" value="{{$requirement->requirement->id}}">
                          <tr>
                            <td>{{$requirement->requirement ? $requirement->requirement->name : "N/A"}} {{$requirement->requirement->is_required == "yes" ? "(Required)" : "(Optional)"}}</td>
                            <td>
                              <input type="file" name="file{{$requirement->requirement->id}}">
                              @if($errors->first('file'.$requirement->requirement->id))
                                <small class="form-text pl-1" style="color:red;">{{$errors->first('file'.$requirement->requirement->id)}}</small>
                              @endif
                            </td>
                          </tr>
                        @empty
                        @endforelse
                      </tbody>
                    </thead>
                  </table>
              </div>
            </div>
            <button class="btn badge badge-primary-2 text-white px-4 py-2 fs-14" type="submit"></i>SUBMIT</button>
          </form>
        </div>
      </div>
    </div>
</section>
<!--team section end-->

@stop
@section('page-styles')
<style type="text/css">
    .custom-btn{
        padding: 5px 10px;
        border-radius: 10px;
        height: 37px;
    }
    .custom-btn:hover{
        background-color: #7093DC !important;
        color: #fff !important;
    }
    .btn-status{
        text-align: center;
        border-radius: 10px;
    }
    .table-font th{
        font-size: 16px;
        font-weight: bold;
    }
    .table-font td{
        font-size: 13px;
        font-weight: bold;
    }
    p:not(:last-child) {
      margin-bottom: .5em;
    }
</style>
@endsection
@section('page-scripts')
<script type="text/javascript">
    $('#file').change(function(e){
      $('#lblName').empty();
      $('#lblName').css("color", "black");
     var files = [];
      for (var i = 0; i < $(this)[0].files.length; i++) {
          files.push($(this)[0].files[i].name);
      }
      $('#lblName').text(files.join(', '));
    });
</script>

@endsection