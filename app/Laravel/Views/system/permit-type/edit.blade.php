@extends('system._layouts.main')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('system.dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('system.department.index')}}">Permit Type Management</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Permit Type</li>
  </ol>
</nav>
@stop

@section('content')
<div class="col-md-8 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Permit Type Edit Form</h4>
      <form class="create-form" method="POST" enctype="multipart/form-data">
        @include('system._components.notifications')
        {!!csrf_field()!!}
        <div class="form-group">
          <label for="input_suffix">Service Type</label>
          {!!Form::select("service_id", $services, old('service_id',$permit_type->service_id), ['id' => "input_service_id", 'class' => "custom-select mb-2 mr-sm-2 ".($errors->first('service_id') ? 'is-invalid' : NULL)])!!}
          @if($errors->first('service_id'))
          <p class="mt-1 text-danger">{!!$errors->first('service_id')!!}</p>
          @endif
        </div>
        <div class="form-group">
          <label for="input_title">Name</label>
          <input type="text" class="form-control {{$errors->first('name') ? 'is-invalid' : NULL}}" id="input_title" name="name" placeholder="Permit Type Name" value="{{old('name',$permit_type->name)}}">
          @if($errors->first('name'))
          <p class="mt-1 text-danger">{!!$errors->first('name')!!}</p>
          @endif
        </div>

        <button type="submit" class="btn btn-primary mr-2">Edit Record</button>
        <a href="{{route('system.department.index')}}" class="btn btn-light">Return to Permit Type list</a>
      </form>
    </div>
  </div>
</div>
@stop

