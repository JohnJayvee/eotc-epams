@extends('web._layouts.main')


@section('content')

<!--team section start-->
<section class="ptb-120 pt-110 pb-80 gray-light-bg">
    <div class="container" style="height: 33em">
        <h2>My Business CVs</h2>
        <div class="row">
            <div class="col-md-12">
                @forelse($business as $value)
                  <div class="card business-card stretch-card shadow mb-3" style="position: initial;">
                    <div class="card-body business">
                      <div class="row align-items-center h-100">
                          <div class="col-md-6 business-details">
                              <h5 class="text-title text-uppercase fs-15 m-0">{{$value->company_name}}</h5>
                              <p class="fw-600 text-black">Zone Code: {{$value->zone->code}}</p>
                          </div>
                          <div class="col-md-6 button-dropdown">
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm p-0 border-0 " data-toggle="dropdown" style="background-color: transparent;"> <i class="mdi mdi-dots-horizontal action-dropdown"></i></button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{route('web.business.profile',[$value->id])}}">View Business CV</a>
                                    <a class="dropdown-item" href="{{route('web.business.edit',[$value->id])}}">Edit</a>
                                    <a class="dropdown-item btn-delete" href="#" data-url="{{route('web.business.destroy',[$value->id])}}">Delete</a>
                                </div>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                @empty
                  <div class="card business-card stretch-card shadow mb-3" style="position: initial;">
                    <div class="card-body business">
                      <div class="row align-items-center h-100">
                          <div class="col-md-12 business-details">
                              <h5 class="text-black text-uppercase fs-15 m-0 text-center"> - No Records Available -</h5>
                          </div>
                      </div>
                    </div>
                  </div>
                @endforelse
               
                <a href="{{route('web.business.create')}}" class="float-right btn secondary-solid-btn fs-15 mt-5">Add New Business CV</a href=""></a>
            </div>
        </div>
    </div>
</section>
<!--team section end-->
@stop
@section('page-styles')
<link rel="stylesheet" href="{{asset('system/vendors/sweet-alert2/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('system/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
<style type="text/css">
  .button-dropdown {
    text-align: right !important;
  }
  .business-details {
    text-align: left !important;
  }
@media (max-width: 767px) {
    .button-dropdown {
        text-align: center !important;
    }
    .business-details {
      text-align: center !important;
      margin-bottom: 0 !important;
    }
}
  
</style>
@stop
@section('page-scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{asset('system/vendors/sweet-alert2/sweetalert2.min.js')}}"></script>
<script type="text/javascript">
  $(".btn-delete").on('click', function(){
      var url = $(this).data('url');
      var self = $(this)
      Swal.fire({
        title: 'Are you sure you want to delete this Business CV ?',
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
</script>
@stop