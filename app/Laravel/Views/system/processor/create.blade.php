@extends('system._layouts.main')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('system.dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('system.department.index')}}">Account Management</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add New User Account</li>
  </ol>
</nav>
@stop

@section('content')
<div class="col-md-8 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Account Create Form</h4>
      <form class="create-form" method="POST" enctype="multipart/form-data">
        @include('system._components.notifications')
        {!!csrf_field()!!}
        <div class="form-group">
          <label for="input_title">Upload Photo <code>(Please use image dimension 225px * 225px)</code></label>
          <input type="file" class="form-control" id="input_file" name="file" accept="image/x-png,image/gif,image/jpeg">
          @if($errors->first('file'))
          <p class="mt-1 text-danger">{!!$errors->first('file')!!}</p>
          @endif
        </div>
        <div class="form-group">
          <label for="input_title">First Name</label>
          <input type="text" class="form-control {{$errors->first('fname') ? 'is-invalid' : NULL}}" id="input_fname" name="fname" placeholder="First Name" value="{{old('fname')}}">
          @if($errors->first('fname'))
          <p class="mt-1 text-danger">{!!$errors->first('fname')!!}</p>
          @endif
        </div>
        <div class="form-group">
          <label for="input_title">Middle Name</label>
          <input type="text" class="form-control {{$errors->first('mname') ? 'is-invalid' : NULL}}" id="input_mname" name="mname" placeholder="Middle Name" value="{{old('mname')}}">
          @if($errors->first('mname'))
          <p class="mt-1 text-danger">{!!$errors->first('mname')!!}</p>
          @endif
        </div>
        <div class="form-group">
          <label for="input_title">Last Name</label>
          <input type="text" class="form-control {{$errors->first('lname') ? 'is-invalid' : NULL}}" id="input_lname" name="lname" placeholder="Last Name" value="{{old('lname')}}">
          @if($errors->first('lname'))
          <p class="mt-1 text-danger">{!!$errors->first('lname')!!}</p>
          @endif
        </div>
        <div class="form-group">
          <label for="input_title">User Type</label>
          {!!Form::select("type", $user_type, old('type'), ['id' => "input_type", 'class' => "custom-select".($errors->first('type') ? ' is-invalid' : NULL)])!!}
          @if($errors->first('type'))
          <p class="mt-1 text-danger">{!!$errors->first('type')!!}</p>
          @endif
        </div>
        <div class="form-group">
          <label for="input_title">Username</label>
          <input type="text" class="form-control {{$errors->first('username') ? 'is-invalid' : NULL}}" id="input_username" name="username" placeholder="User Name" value="{{old('username')}}">
          @if($errors->first('username'))
          <p class="mt-1 text-danger">{!!$errors->first('username')!!}</p>
          @endif
        </div>
        <div class="form-group">
          <label for="input_title">Email</label>
          <input type="email" class="form-control {{$errors->first('email') ? 'is-invalid' : NULL}}" id="input_email" name="email" placeholder="Email" value="{{old('email')}}">
          @if($errors->first('email'))
          <p class="mt-1 text-danger">{!!$errors->first('email')!!}</p>
          @endif
        </div>
        <div class="form-group">
          <label for="input_title">Contact Number</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon3" style="border-top-left-radius: 5px;border-bottom-left-radius: 5px;">+63</span>
            </div>
            <input type="text" class="form-control {{$errors->first('contact_number') ? 'is-invalid' : NULL}}" id="input_contact_number" name="contact_number" placeholder="Contact Number" value="{{old('contact_number')}}">
          </div>
          @if($errors->first('contact_number'))
            <p class="mt-1 text-danger">{!!$errors->first('contact_number')!!}</p>
          @endif
        </div>
        <button type="submit" class="btn btn-primary mr-2">Create Record</button>
        <a href="{{route('system.processor.index')}}" class="btn btn-light">Return to Processors list</a>
      </form>
    </div>
  </div>
</div>
@stop
