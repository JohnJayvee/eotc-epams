@extends('system._layouts.main')

@section('content')
<div class="row px-5 py-4">
  <div class="col-12">
    @include('system._components.notifications')
    <div class="row ">
      <div class="col-md-6">
        <h5 class="text-title text-uppercase">{{$page_title}}</h5>
      </div>
      <div class="col-md-6 ">
        <p class="text-dim  float-right">EOR-PHP Processor Portal / Business / Business Transaction Details</p>
      </div>
    </div>
  </div>
  <div class="col-12 pt-4">
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
        
      <div class="card-body d-flex">
        <button class="btn btn-transparent p-3" data-toggle="collapse" data-target="#collapseExample"><i class="fa fa-download" style="font-size: 1.5rem;"></i></button>
        <p class="text-title pt-4 pl-3 fw-500">Review Attached Requirements: {{$count_file}} Item / s</p>
      </div>
    </div>
    <div class="collapse pt-2" id="collapseExample">
      <div class="card card-body card-rounded">
        <div class="row justify-content-center">
          <table class="table table-striped">
            <thead>
              <th>FileName</th>
              <th>File Type</th>
              <th>Status</th>
            </thead>
            <tbody>
            @forelse($attachments as $index => $attachment)
              <tr>
                <td><a href="{{$attachment->directory}}/{{$attachment->filename}}" target="_blank">{{$attachment->requirement->name}}</a></td>
                <td>{{$attachment->type}}</td>
                <td>{{Str::title($attachment->status)}}</td>
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
  <a data-url="{{route('system.transaction.pending')}}"  class="btn btn-primary mt-4 btn-validate border-5 text-white" ><i class="fa fa-check-circle"></i> Validate Transactions</a>
  <a  data-url="{{route('system.transaction.pending')}}" class="btn btn-danger mt-4 btn-decline border-5 text-white"><i class="fa fa-times-circle"></i> Decline Transactions</a>
  </div>
</div>
@stop



@section('page-styles')
<link rel="stylesheet" href="{{asset('system/vendors/sweet-alert2/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('system/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
<style type="text/css" >
  .input-daterange input{ background: #fff!important; }  
  .isDisabled{
    color: currentColor;
    display: inline-block;  /* For IE11/ MS Edge bug */
    pointer-events: none;
    text-decoration: none;
    cursor: not-allowed;
    opacity: 0.5;
  }
</style>
@stop

@section('page-scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{asset('system/vendors/sweet-alert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('system/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript">
  $(function(){
    $('.input-daterange').datepicker({
      format : "yyyy-mm-dd"
    });
    $(".btn-decline").on('click', function(){
      var url = $(this).data('url');
      var self = $(this)
      Swal.fire({
        title: "All the submitted requirements will be marked as declined. Are you sure you want to declined this application?",
        
        icon: 'warning',
        input: 'text',
        inputPlaceholder: "Put remarks",
        showCancelButton: true,
        confirmButtonText: 'Decline',
        cancelButtonColor: '#d33'
      }).then((result) => {
        if (result.value === "") {
          alert("You need to write something")
          return false
        }
        if (result.value) {
          window.location.href = url + "&remarks="+result.value;
        }
      });
    });
    $(".btn-approved").on('click', function(){
      var url = $(this).data('url');
      var self = $(this)
      Swal.fire({
        title: "All the submitted requirements will be marked as approved. Are you sure you want to approve this application?",
        
        icon: 'info',
        input: 'number',
        inputPlaceholder: "Put Amount",
        showCancelButton: true,
        confirmButtonText: 'Approved!',
        cancelButtonColor: '#d33'
      }).then((result) => {
        if (result.value === "") {
          alert("You need to write something")
          return false
        }
        if (result.value) {
          window.location.href = url /*+ "&amount="+result.value*/;
        }
      });
    });
    $(".btn-validate").on('click', function(){
      var url = $(this).data('url');
      var self = $(this)
      Swal.fire({
        title: 'Input Reference Number',
        text: 'Use comma(,) as separator',
        content: '<span>test</span>',
        icon: 'warning',
        input: 'select',
        inputOptions:  {!! $requirements !!} ,
        showCancelButton: true,
        confirmButtonText: 'Proceed',
        cancelButtonColor: '#d33',
      }).then((result) => {
        if (result.value === "") {
          alert("You need to write something")
          return false
        }
        if (result.value) {
          window.location.href = url /*+ "department_code="+result.value*/;
        }
      });
    });

    $(".btn-approved-requirements").on('click', function(){
      var url = $(this).data('url');
      var self = $(this)
      Swal.fire({
        title: 'Are you sure you want to modify this requirements?',
        text: "You will not be able to undo this action, proceed?",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: `Proceed`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          window.location.href = url
        }
      });
    });
  })
</script>
@stop