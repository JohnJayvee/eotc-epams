@extends('system._layouts.main')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('system.dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('system.application.index')}}">Application Type Management</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add New Application Type</li>
  </ol>
</nav>
@stop

@section('content')
<div class="col-md-8 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Permit type requirements Form</h4>
      <form class="create-form" method="POST" enctype="multipart/form-data">
        @include('system._components.notifications')
        {!!csrf_field()!!}
        <div class="form-group">
          <label for="input_title">Permit Type</label>
          <input type="text" class="form-control" id="input_title" value="{{ $permit->name}}" readonly>
        </div>
        <div class="form-group">
          <label for="input_suffix">Application Requirements</label>
          {!!Form::select("requirements_id[]", $requirements, old('requirements_id',explode(",", $permit->requirements_id)), ['id' => "input_requirements_id", 'multiple' => 'multiple','class' => "custom-select select2 mb-2 mr-sm-2 ".($errors->first('requirements_id') ? 'is-invalid' : NULL)])!!}
          @if($errors->first('requirements_id'))
          <p class="mt-1 text-danger">{!!$errors->first('requirements_id')!!}</p>
          @endif
        </div>
        <button type="submit" class="btn btn-primary mr-2">Proceed</button>
        <a href="{{route('system.application.index')}}" class="btn btn-light">Return to Permit Type list</a>
      </form>
    </div>
  </div>
</div>
@stop


@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('system/vendors/select2/select2.min.css')}}"/>
<style type="text/css">
  .is-invalid{
    border: solid 2px;
  }
  .select2-container--default .select2-selection--multiple .select2-selection__choice{
    font-size: 18px;
  }
  span.select2.select2-container{
    width: 100% !important;
  }
</style>
@endsection

@section('page-scripts')
<script src="{{asset('system/vendors/select2/select2.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $('#input_requirements_id').select2({placeholder: "Select Requirements"});
    });//document ready
</script>
@endsection