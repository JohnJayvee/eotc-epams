@extends('system._layouts.main')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('system.dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('system.customer.index')}}">Customer Management</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Customer</li>
  </ol>
</nav>
@stop

@section('content')
<div class="row">
  <div class="col-md-7 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Customer Edit Form</h4>
        <form class="create-form" method="POST" enctype="multipart/form-data">
          @include('system._components.notifications')
          {!!csrf_field()!!}
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="input_title">Email</label>
                <input type="text" class="form-control" value="{{$customer->email}}" disabled>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="input_title">Username</label>
                <input type="text" class="form-control" value="{{$customer->username}}" disabled>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="input_title">First Name</label>
                <input type="text" class="form-control" value="{{Str::title($customer->fname)}}" disabled>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="input_title">Middle Name</label>
                <input type="text" class="form-control" value="{{Str::title($customer->mname)}}" disabled>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="input_title">Last Name</label>
                <input type="text" class="form-control" value="{{Str::title($customer->lname)}}" disabled>
              </div> 
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="input_title">Position</label>
                <input type="text" class="form-control" value="{{ Str::title($customer->position ?: " ")}}" disabled>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="input_title">Primary Phone</label>
                <input type="text" class="form-control" value="{{$customer->primary_phone}}" disabled>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="input_title">Alternate Phone</label>
                <input type="text" class="form-control" value="{{$customer->alternate_phone}}" disabled>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="input_title">Fax Number</label>
                <input type="text" class="form-control" value="{{$customer->fax}}" disabled>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="input_title">Company Name</label>
                <input type="text" class="form-control" value="{{ Str::title($customer->company_name)}}" disabled>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="input_title">Zone Location</label>
                <input type="text" class="form-control" value="{{ $customer->zone_location->code}}" disabled>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="input_title">Enterprise Type</label>
                <input type="text" class="form-control" value="{{ Str::title($customer->enterprise_type) }}" disabled>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="input_title">CR Number</label>
                <input type="text" class="form-control" value="{{ $customer->cr_number}}" disabled>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="input_title">Status</label>
                {!!Form::select("status", $status_type, old('status'), ['id' => "input_status", 'class' => "custom-select".($errors->first('status') ? ' is-invalid' : NULL)])!!}
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-primary mr-2">Proceed</button>
          <a href="{{route('system.customer.index')}}" class="btn btn-light">Return to Customer list</a>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-5 ">
    <div class="card">
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <th>FileName</th>
            <th>File</th>
          </thead>
          <tbody>
            @forelse($files as $file)
              <tr>
                <td>{{Helper::resolve_file_name($file->type)}}</td>
                <td><a href="{{$file->directory}}/{{$file->filename}}" target="_blank">{{$file->filename}}</a></td>
              </tr>
            @empty
              <td>No Available File</td>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@stop

