@extends('system._layouts.main')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('system.dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('system.department.index')}}">Company Management</a></li>
    <li class="breadcrumb-item active" aria-current="page">Process Company</li>
  </ol>
</nav>
@stop

@section('content')
<div class="col-md-8 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Company Process Form</h4>
      <form class="create-form" method="POST" enctype="multipart/form-data">
        @include('system._components.notifications')
        {!!csrf_field()!!}
        <input type="hidden" name="zone_location" id="input_zone_code_name">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="input_title">Company Name</label>
              <input type="text" class="form-control {{$errors->first('company_name') ? 'is-invalid' : NULL}}" name="company_name" placeholder="Company Name" value="{{old('company_name',$company->company_name)}}" readonly>
              @if($errors->first('company_name'))
              <p class="mt-1 text-danger">{!!$errors->first('company_name')!!}</p>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Notes and Details</label>
              <textarea class="form-control" rows="6" readonly>{{$company->description}}</textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="input_title">Entity Code</label>
              <input type="text" class="form-control {{$errors->first('entity_code') ? 'is-invalid' : NULL}}" name="entity_code" placeholder="Entity Code" value="{{old('entity_code')}}">
              @if($errors->first('entity_code'))
                <p class="mt-1 text-danger">{!!$errors->first('entity_code')!!}</p>
              @endif
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="input_title">Company Code</label>
              <input type="text" class="form-control {{$errors->first('comp_code') ? 'is-invalid' : NULL}}" name="comp_code" placeholder="Company Code" value="{{old('comp_code')}}">
              @if($errors->first('comp_code'))
                <p class="mt-1 text-danger">{!!$errors->first('comp_code')!!}</p>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="input_title">URN</label>
              <input type="text" class="form-control {{$errors->first('urn') ? 'is-invalid' : NULL}}" name="urn" placeholder="Entity Code" value="{{old('urn')}}">
              @if($errors->first('urn'))
                <p class="mt-1 text-danger">{!!$errors->first('urn')!!}</p>
              @endif
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="input_title">Type</label>
              <input type="text" class="form-control {{$errors->first('type') ? 'is-invalid' : NULL}}" name="type" placeholder="Type" value="{{old('type')}}">
              @if($errors->first('type'))
                <p class="mt-1 text-danger">{!!$errors->first('type')!!}</p>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="input_title">Type Code</label>
              <input type="text" class="form-control {{$errors->first('type_code') ? 'is-invalid' : NULL}}" name="type_code" placeholder="Type Code" value="{{old('type_code')}}">
              @if($errors->first('type_code'))
                <p class="mt-1 text-danger">{!!$errors->first('type_code')!!}</p>
              @endif
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="input_title">Zone Location</label>
              {!!Form::select("zone_code", $zone_locations, old('zone_code'), ['id' => "input_zone_code", 'class' => "form-control ".($errors->first('zone_code') ? 'border-red' : NULL)]) !!}
              @if($errors->first('zone_code'))
              <p class="mt-1 text-danger">{!!$errors->first('zone_code')!!}</p>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="input_title">CR Number</label>
              <input type="text" class="form-control {{$errors->first('cr_no') ? 'is-invalid' : NULL}}" name="cr_no" placeholder="CR Number" value="{{old('cr_no')}}">
              @if($errors->first('cr_no'))
                <p class="mt-1 text-danger">{!!$errors->first('cr_no')!!}</p>
              @endif
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="input_title">Industry</label>
              <input type="text" class="form-control {{$errors->first('industry') ? 'is-invalid' : NULL}}" name="industry" placeholder="Industry" value="{{old('industry')}}">
              @if($errors->first('industry'))
                <p class="mt-1 text-danger">{!!$errors->first('industry')!!}</p>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="input_title">Region Code</label>
              <input type="text" class="form-control {{$errors->first('region_code') ? 'is-invalid' : NULL}}" name="region_code" placeholder="Region Code" value="{{old('region_code')}}">
              @if($errors->first('region_code'))
                <p class="mt-1 text-danger">{!!$errors->first('region_code')!!}</p>
              @endif
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="input_title">Region</label>
              <input type="text" class="form-control {{$errors->first('region') ? 'is-invalid' : NULL}}" name="region" placeholder="Region" value="{{old('region')}}">
              @if($errors->first('region'))
                <p class="mt-1 text-danger">{!!$errors->first('region')!!}</p>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="input_title">Province</label>
              <input type="text" class="form-control {{$errors->first('province') ? 'is-invalid' : NULL}}" name="province" placeholder="Province" value="{{old('province')}}">
              @if($errors->first('province'))
                <p class="mt-1 text-danger">{!!$errors->first('province')!!}</p>
              @endif
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="input_title">City</label>
              <input type="text" class="form-control {{$errors->first('city') ? 'is-invalid' : NULL}}" name="city" placeholder="city" value="{{old('city')}}">
              @if($errors->first('city'))
                <p class="mt-1 text-danger">{!!$errors->first('city')!!}</p>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="input_title">OBO Cluster</label>
              <input type="text" class="form-control {{$errors->first('obo_cluster') ? 'is-invalid' : NULL}}" name="obo_cluster" placeholder="OBO Cluster" value="{{old('obo_cluster')}}">
              @if($errors->first('obo_cluster'))
                <p class="mt-1 text-danger">{!!$errors->first('obo_cluster')!!}</p>
              @endif
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="input_title">Income Cluster</label>
              <input type="text" class="form-control {{$errors->first('income_cluster') ? 'is-invalid' : NULL}}" name="income_cluster" placeholder="Income Cluster" value="{{old('income_cluster')}}">
              @if($errors->first('income_cluster'))
                <p class="mt-1 text-danger">{!!$errors->first('income_cluster')!!}</p>
              @endif
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Approved</button>
        <a href="{{route('system.department.index')}}" class="btn btn-light">Return to Company list</a>
      </form>
    </div>
  </div>
</div>
@stop
@section('page-scripts')
<script type="text/javascript">
  $("#input_zone_code").on("change",function(){
    var _text = $("#input_zone_code option:selected").text();
    $('#input_zone_code_name').val(_text);
  });
</script>
@endsection

