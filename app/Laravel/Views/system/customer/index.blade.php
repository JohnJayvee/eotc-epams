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
        <p class="text-dim  float-right">EOR-PHP Processor Portal / Customer</p>
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
    <h4 class="pb-4">Record Data</h4>
    <div class="table-responsive shadow fs-15">
      <table class="table table-striped">
        <thead>
          <tr>
            <th width="25%" class="text-title p-3">Name</th>
            <th width="25%" class="text-title p-3">Status</th>
            <th width="25%" class="text-title p-3">Created At</th>
            <th width="10%" class="text-title p-3">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse($customers as $index => $customer)
          <tr>
            <td>{{ Str::title($customer->full_name) }}</td>
            <td><div><small><span class="badge badge-pill badge-{{Helper::status_badge($customer->status)}} p-2">{{Str::upper($customer->status)}}</span></small></div></td>
            <td>{{ Helper::date_format($customer->created_at)}}</td>
            <td >
              <button type="button" class="btn btn-sm p-0" data-toggle="dropdown" style="background-color: transparent;"> <i class="mdi mdi-dots-horizontal" style="font-size: 30px"></i></button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton2">
                <a class="dropdown-item" href="{{route('system.customer.show',[$customer->id])}}">View Details</a>
              </div>
            </td>
          </tr>
          @empty
          <tr>
           <td colspan="5" class="text-center"><i>No Peza Unit Records Available.</i></td>
          </tr>
          @endforelse
          
        </tbody>
      </table>
    </div>
    @if($customers->total() > 0)
    <nav class="mt-2">
      <p>Showing <strong>{{$customers->firstItem()}}</strong> to <strong>{{$customers->lastItem()}}</strong> of <strong>{{$customers->total()}}</strong> entries</p>
      {!!$customers->appends(request()->query())->render()!!}
      </ul>
    </nav>
    @endif
  </div>
</div>
@stop


