@extends('web._layouts.main')


@section('content')

<!--team section start-->
<section class="px-120 pt-110 pb-80 gray-light-bg">
    <div class="container">
         
         <div class="row flex-row items-center px-4">
            <h5 class="text-title pb-3"><i class="fa fa-file"></i> E<span class="text-title-two"> APPLICATION HISTORY</span></h5>
            <a href="{{route('web.business.profile',[$business_id])}}" class="custom-btn badge-primary-2 text-white " style="float: right;margin-left: auto;">Businesss CV</a>
         </div>

        <div class="card">
          <div class="table-responsive shadow fs-15">
            <table class="table table-striped text-center">
              <thead>
                <tr class="text-center">
                  <th class="text-title p-3">Company Name</th>
                  <th class="text-title p-3">Service</th>
                  <th class="text-title p-3">Permit Type</th>
                  <th class="text-title p-3">Status</th>
                  <th class="text-title p-3">Project Title</th>
                  <th class="text-title p-3">Created At</th>
                  <th class="text-title p-3">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse($business_transactions as $transaction)
                <tr class="text-center table-font">
                  <td>{{$transaction->business->company_name}}</td>
                  <td>{{$transaction->service->name}}</td>
                  <td>{{$transaction->permit->name}}</td>
                  <td style="vertical-align: middle;">
                    <div>
                      <span class="badge badge-pill badge-{{Helper::status_badge($transaction->status)}} p-2">{{Str::upper($transaction->status)}}</span>
                    </div>
                  </td>
                  <td>{{ $transaction->project_title }}</td>
                  <td>{{Helper::date_format($transaction->created_at)}}</td>
                  <td>
                    <button type="button" class="btn btn-sm p-0" data-toggle="dropdown" style="background-color: transparent;border: none"> <i class="mdi mdi-dots-horizontal" style="font-size: 30px"></i></button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton2">
                      <a class="dropdown-item" href="{{route('web.application.show',[$transaction->id])}}">View transaction</a>
                    </div>
                  </td>
                </tr>
                @empty
                <tr>
                 <td colspan="7" class="text-center"><i>No transaction Records Available.</i></td>
                </tr>
                @endforelse
              </tbody>
            </table>
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
    .table th{
        font-size: 16px;
        font-weight: bold;
    }
    .table td{
        font-size: 14px;
        font-weight: bold;
        vertical-align: middle;
    }
</style>
@endsection
