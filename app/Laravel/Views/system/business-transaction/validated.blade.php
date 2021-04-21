@extends('system._layouts.main')

@section('content')
<div class="row p-3">
  <div class="col-12">
    @include('system._components.notifications')
    <div class="row ">
      <div class="col-md-6">
        <h5 class="text-title text-uppercase">{{$page_title}}</h5>
      </div>
      <div class="col-md-6 ">
        <p class="text-dim  float-right">EOR-PHP Processor Portal / Business Transactions</p>
      </div>
    </div>
  
  </div>

  <div class="col-12 ">
    <form>
      <div class="row">
        
        <div class="col-md-3 p-2">
          <div class="form-group has-search">
            <span class="fa fa-search form-control-feedback"></span>
            <input type="text" class="form-control form-control-lg" placeholder="Search">
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-12">
    <h4 class="pb-4">Record Data
      <!-- <span class="float-right">
        <a href="{{route('system.department.upload')}}" class="btn btn-sm btn-primary">Bulk Upload</a>
        <a href="{{route('system.department.create')}}" class="btn btn-sm btn-primary">Add New</a>
      </span> -->
    </h4>
    <div class="table-responsive shadow fs-15">
      <table class="table table-striped text-center">
        <thead>
          <tr>
            <th class="text-title p-3">Company Name</th>
            <th class="text-title p-3">Service</th>
            <th class="text-title p-3">Permit Type</th>
            <th class="text-title p-3">Locator/Enterprise</th>
            <th class="text-title p-3">Project Title</th>
            <th class="text-title p-3">Status</th>
            <th class="text-title p-3">Is Validated ?</th>
            <th class="text-title p-3">Validated at / Validated By</th>
            <th class="text-title p-3">Created At</th>
            <th class="text-title p-3">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse($business_transactions as $index => $business_transaction)
          <tr>
            <td>{{ $business_transaction->business ? $business_transaction->business->company_name : "---"}}</td>
            <td>{{ $business_transaction->service ? $business_transaction->service->name : "---"}}</td>
            <td>{{ $business_transaction->permit ? $business_transaction->permit->name : "---"}}</td>
            <td>{{ Str::title($business_transaction->locator_enterprise)}}</td>
            <td>{{ Str::title($business_transaction->project_title) }}</td>
            <td><div><small><span class="badge badge-pill badge-{{Helper::status_badge($business_transaction->status)}} p-2">{{Str::upper($business_transaction->status)}}</span></small></div></td>
            <td>{{ $business_transaction->is_validated }}</td>
            <td>{{ $business_transaction->validated_at ? Helper::date_format($business_transaction->validated_at) : "---"}} <br> {{ $business_transaction->validated_at ? $business_transaction->frontliner->full_name : " "}} </td>
            <td>{{ Helper::date_format($business_transaction->created_at)}}</td>
            <td >
              <button type="button" class="btn btn-sm p-0" data-toggle="dropdown" style="background-color: transparent;"> <i class="mdi mdi-dots-horizontal" style="font-size: 30px"></i></button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton2">
                <a class="dropdown-item" href="{{route('system.business_transaction.show',[$business_transaction->id])}}">View transaction</a>
               <!--  <a class="dropdown-item action-delete"  data-url="#" data-toggle="modal" data-target="#confirm-delete">Remove Record</a> -->
              </div>
            </td>
          </tr>
          @empty
          <tr>
           <td colspan="8" class="text-center"><i>No Business Transaction Records Available.</i></td>
          </tr>
          @endforelse
          
        </tbody>
      </table>
    </div>
    @if($business_transactions->total() > 0)
    <nav class="mt-2">
      <p>Showing <strong>{{$business_transactions->firstItem()}}</strong> to <strong>{{$business_transactions->lastItem()}}</strong> of <strong>{{$business_transactions->total()}}</strong> entries</p>
      {!!$business_transactions->appends(request()->query())->render()!!}
      </ul>
    </nav>
    @endif
  </div>
</div>
@stop

@section('page-modals')
<div id="confirm-delete" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm your action</h5>
      </div>

      <div class="modal-body">
        <h6 class="text-semibold">Deleting Record...</h6>
        <p>You are about to delete a record, this action can no longer be undone, are you sure you want to proceed?</p>

        <hr>

        <h6 class="text-semibold">What is this message?</h6>
        <p>This dialog appears everytime when the chosen action could hardly affect the system. Usually, it occurs when the system is issued a delete command.</p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <a href="#" class="btn btn-sm btn-danger" id="btn-confirm-delete">Delete</a>
      </div>
    </div>
  </div>
</div>
@stop

@section('page-scripts')
<script src="{{asset('system/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript">
  $(function(){
   

    $(".action-delete").on("click",function(){
      var btn = $(this);
      $("#btn-confirm-delete").attr({"href" : btn.data('url')});
    });

  })
</script>
@stop