@extends('web._layouts.main')


@section('content')



<!--team section start-->
<section class="px-120 pt-110 pb-80 gray-light-bg">
  <div class="container">
    <div class="row flex-row items-center px-4">
            <h5 class="text-title pb-3"><i class="fa fa-file"></i> E<span class="text-title-two"> Business Application Details</span></h5>
            <a href="{{route('web.application.history',[$business_transaction->id])}}" class="custom-btn badge-primary-2 text-white " style="float: right;margin-left: auto;">Application History</a>
         </div>
          
    <div class="card card-rounded shadow-sm">
      <div class="card-body" style="border-bottom: 3px dashed #E3E3E3;">
        <div class="row">
          <div class="col-md-1 text-center">
            <img src="{{asset('system/images/default.jpg')}}" class="rounded-circle" width="100%">
          </div>
          <div class="col-md-11 d-flex">
            <p class="text-title fw-500 pt-3">Application by: <span class="text-black">{{Str::title($business_transaction->full_name)}}</span></p>
            <p class="text-title fw-500 pl-3" style="padding-top: 15px;">|</p>
            <p class="text-title fw-500 pt-3 pl-3">Application Sent: <span class="text-black">{{ Helper::date_format($business_transaction->created_at)}}</span></p>
            <p class="text-title fw-500 pl-3" style="padding-top: 15px;">|</p>
            <p class="text-title fw-500 pt-3 pl-3">Validated: <span class="text-black">{{ Str::title($business_transaction->is_validated)}}</span></p>
            @if($business_transaction->engineer_id)
            <p class="text-title fw-500 pl-3" style="padding-top: 15px;">|</p>
            <p class="text-title fw-500 pt-3 pl-3">Assigned Engineer: <span class="text-black">{{ Str::title($business_transaction->engineer->full_name)}}</span></p>
            @endif
            <p class="text-title fw-500 pl-3" style="padding-top: 15px;">|</p>
            <p class="text-title fw-500 pt-3 pl-3">Engineer Status: <span class="text-black">{{ Str::title($business_transaction->engineer_status)}}</span></p>
            <p class="text-title fw-500 pl-3" style="padding-top: 15px;">|</p>
            <p class="text-title fw-500 pt-3 pl-3">Fire Department Status: <span class="text-black">{{ Str::title($business_transaction->fire_department_status)}}</span></p>
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
        @if($business_transaction->permit->type == "building_permit")
        <div class="row mb-2">
          <div class="col-md-4">
            <p class="text-title fw-500">Other Details:</p>
            <p class="text-title fw-500">Occupancy Classified: <span class="text-black">{{str::title($business_transaction->building_permit->occupancy_classified)}}</span></p>
            <p class="text-title fw-500">Unit No: <span class="text-black">{{str::title($business_transaction->building_permit->unit_no)}}</span></p>
            <p class="text-title fw-500">Proposed Date: <span class="text-black">{{Helper::date_only($business_transaction->building_permit->proposed_date)}}</span></p>
            <p class="text-title fw-500">Expected Date: <span class="text-black">{{Helper::date_only($business_transaction->building_permit->expected)}}</span></p>
            <p class="text-title fw-500">Related Permits: <span class="text-black">{{str::title($business_transaction->building_permit->related_permits)}}</span></p>
            <p class="text-title fw-500">Floor Area: <span class="text-black">{{str::title($business_transaction->building_permit->floor_area)}}</span></p>
          </div>
        </div>
        @endif
        @if($business_transaction->permit->type == "fencing_permit")
        <div class="row mb-2">
          <div class="col-md-4">
            <p class="text-title fw-500">Other Details:</p>
            <p class="text-title fw-500">Length in Meters: <span class="text-black">{{str::title($business_transaction->fencing_permit->length)}}</span></p>
            <p class="text-title fw-500">Height in Meters: <span class="text-black">{{str::title($business_transaction->fencing_permit->height)}}</span></p>
          </div>
        </div>
        @endif
        @if($business_transaction->permit->type == "electrical_permit")
        <div class="row mb-2">
          <div class="col-md-4">
            <p class="text-title fw-500">Other Details:</p>
            <p class="text-title fw-500">Total Connected Load: <span class="text-black">{{str::title($business_transaction->electrical_permit->connected_load)}}</span></p>
            <p class="text-title fw-500">Total Transformer Capacity: <span class="text-black">{{str::title($business_transaction->electrical_permit->transformer_capacity)}}</span></p>
            <p class="text-title fw-500">Total Generator/UPS Capacity: <span class="text-black">{{str::title($business_transaction->electrical_permit->ups_capacity)}}</span></p>
          </div>
        </div>
        @endif
        @if(count($business_sow) > 0)
          <p class="text-title fw-500">Project Scope of Work:</p>
          <table class="table table-bordered">
            <tr>
              <th width="50%">Name</th>
              <th width="50%">Description</th>
            </tr>
            <tbody>
              @forelse ($business_sow as $sow)
              <tr>
                  <td>{{  Str::title(str_replace("_" , " " , $sow->name)) }}</td>
                  <td>{{  Str::title($sow->description) ?: "--" }}</td>
              </tr>
              @empty
              @endforelse
            </tbody>
          </table>
        @endif
        @if(count($business_coc) > 0)
          <p class="text-title fw-500 mt-4">Use or Character of Occupancy</p>
          <table class="table table-bordered">
            <tr>
              <th width="50%">Name</th>
              <th width="50%">Description</th>
             </tr>
              <tbody>
                  @forelse ($business_coc as $coc)
                  <tr>
                      <td>{{  Helper::find_coc($coc->name) }}</td>
                      <td>{{  Str::title($coc->description) ?: "--"}}</td>
                  </tr>
                  @empty
                  @endforelse
              </tbody>
          </table>
        @endif
        @if(count($business_installations) > 0)
          <p class="text-title fw-500">Installation and Operation of:</p>
          <table class="table table-bordered">
            <tr>
              <th width="50%">Name</th>
              <th width="50%">Description</th>
            </tr>
            <tbody>
              @forelse ($business_installations as $installation)
              <tr>
                  <td>{{  Str::title(str_replace("_" , " " , $installation->name)) }}</td>
                  <td>{{  Str::title($installation->description) ?: "--" }}</td>
              </tr>
              @empty
              @endforelse
            </tbody>
          </table>
        @endif
        @if(count($business_clearances) > 0)
          <p class="text-title fw-500 mt-4">Accompanying Documents:</p>
          <table class="table table-bordered">
            <tr>
              <th width="50%">Name</th>
              <th width="50%">Description</th>
            </tr>
            <tbody>
              @forelse ($business_clearances as $clearance)
              <tr>
                  <td>{{  Str::title(str_replace("_" , " " , $clearance->name)) }}</td>
                  <td>{{  Str::title($clearance->description) ?: "--" }}</td>
              </tr>
              @empty
              @endforelse
            </tbody>
          </table>
        @endif
        @if(count($business_fencing) > 0)
          <p class="text-title fw-500 mt-4">Type Of Fencing:</p>
          <table class="table table-bordered">
            <tr>
              <th width="50%">Name</th>
              <th width="50%">Description</th>
            </tr>
            <tbody>
              @forelse ($business_fencing as $fencing)
              <tr>
                  <td>{{  Str::title(str_replace("_" , " " , $fencing->name)) }}</td>
                  <td>{{  Str::title($fencing->description) ?: "--" }}</td>
              </tr>
              @empty
              @endforelse
            </tbody>
          </table>
        @endif
        @if(count($fixtures) > 0)
          <p class="text-title fw-500 mt-4">Fixtures to be installed:</p>
          <table class="table table-bordered">
            <tr>
              <th width="25%">Quantity</th>
              <th width="25%">Fixture type</th>
              <th width="25%">Name</th>
              <th width="25%">Description</th>
            </tr>
            <tbody>
              @forelse ($fixtures as $fixture)
              <tr>
                  <td>{{ $fixture->qty }}</td>
                  <td>{{ Str::title(str_replace("_", " ", $fixture->fixture_type)) }}</td>
                  <td>{{  Str::title(str_replace("_" , " " , $fixture->name)) }}</td>
                  <td>{{  Str::title($fixture->description) ?: "--" }}</td>
              </tr>
              @empty
              @endforelse
            </tbody>
          </table>
        @endif
        @if(count($assessments) > 0 and $business_transaction->status == "APPROVED")
          <p class="text-title fw-500 mt-4">Assessment:</p>
          <table class="table table-bordered">
            <tr>
              <th width="25%">FileName</th>
              <th width="25%">Date Submitted</th>
            </tr>
            <tbody>
              @forelse ($assessments as $assessment)
              <tr>
                <td><a href="{{$assessment->directory}}/{{$assessment->filename}}" target="_blank" class="fw-600">{{$assessment->original_name}}</a></td>
                <td>{{Helper::date_format($assessment->created_at)}}</td>
              </tr>
              @empty
              @endforelse
            </tbody>
          </table>
        @endif
        <div class="card-body d-flex">
          <button class="btn btn-transparent p-3" data-toggle="collapse" data-target="#collapseExample"><i class="fa fa-download" style="font-size: 1.5rem;"></i></button>
          <p class="text-title pt-4 pl-3 fw-500">Review Attached Requirements: {{$count_file}} Item / s</p>
        </div>
      </div>
    </div>    
    <div class="collapse pt-2" id="collapseExample">
      <div class="card card-body card-rounded">
        <div class="row justify-content-center">
          <table class="table table-striped">
            <thead>
              <th>FileName</th>
              <th>Date Submitted</th>
              <th>Status</th>
            </thead>
            <tbody>
            @forelse($attachments as $index => $attachment)
              <tr>
                <td><a href="{{$attachment->directory}}/{{$attachment->filename}}" target="_blank" class="fw-600">{{$attachment->original_name}}</a></td>
                <td>{{Helper::date_format($attachment->created_at)}}</td>
                <td><p class="btn-sm text-center fw-600 text-black {{Helper::status_color($attachment->status)}}">{{Str::title($attachment->status)}}</p></td>
              </tr>
            @empty
            <h5>No Items available.</h5>
            @endforelse
            </tbody>
          </table>
        </div>
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
    margin-bottom: .25em;
  }
</style>
@endsection
