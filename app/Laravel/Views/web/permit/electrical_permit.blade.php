<p class="text-title fw-600 mt-2 fs-15">Scope of Work</p>
<div class="row">
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_new_installation" name="scope_of_work[]" value="new_installation" @if(is_array(old('scope_of_work')) && in_array("new_installation", old('scope_of_work'))) checked @endif>
        <label for="chck_new_installation">New Installation</label>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_reconnection_svc" name="scope_of_work[]" value="reconnection_of_service_entrance" @if(is_array(old('scope_of_work')) && in_array("reconnection_of_service_entrance", old('scope_of_work'))) checked @endif>
        <label for="chck_reconnection_svc">Reconnecton of Service Entrance</label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_annual_inspection" name="scope_of_work[]" value="annual_inspection" @if(is_array(old('scope_of_work')) && in_array("annual_inspection", old('scope_of_work'))) checked @endif>
        <label for="chck_annual_inspection">Annual Inspection</label>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_seperation_svc" name="scope_of_work[]" value="seperation_of_service_entrance" @if(is_array(old('scope_of_work')) && in_array("seperation_of_service_entrance", old('scope_of_work'))) checked @endif>
        <label for="chck_seperation_svc">Seperation of Service Entrance</label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_temporary" name="scope_of_work[]" value="temporary" @if(is_array(old('scope_of_work')) && in_array("temporary", old('scope_of_work'))) checked @endif>
        <label for="chck_temporary">Temporary</label>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_upgrading_svc" name="scope_of_work[]" value="upgrading_of_service_entrance" @if(is_array(old('scope_of_work')) && in_array("upgrading_of_service_entrance", old('scope_of_work'))) checked @endif>
        <label for="chck_upgrading_svc">Upgrading of Service Entrance</label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_others" name="scope_of_work[]" value="others" @if(is_array(old('scope_of_work')) && in_array("others", old('scope_of_work'))) checked @endif>
        <label for="chck_others">Others(specify) <input type="text" name="others" class="check-input"></label>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_relocation_svc" name="scope_of_work[]" value="relocation_of_service_entrance" @if(is_array(old('scope_of_work')) && in_array("relocation_of_service_entrance", old('scope_of_work'))) checked @endif>
        <label for="chck_relocation_svc">Relocation of Service Entrance</label>
      </div>
    </div>
  </div>
</div>
@if($errors->first('scope_of_work'))
  <small class="form-text" style="color:red;padding-left: 2em">{{$errors->first('scope_of_work')}}</small>
@endif
<p class="text-title fw-600 mt-2 fs-15">Summary of Electrical Loads/Capacities Applied For</p>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label class="text-form pb-2 fw-600">Total Connected Load</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text text-title fw-600 px-4">KVA</span>
        </div>
        <input type="text" class="form-control form-control-lg br-left-white {{ $errors->first('connected_load') ? 'is-invalid': NULL  }}" name="connected_load" value="{{old('connected_load')}}">
      </div>
      @if($errors->first('connected_load'))
        <small class="form-text pl-1" style="color:red;">{{$errors->first('connected_load')}}</small>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="text-form pb-2 fw-600">Total Transformer Capacity</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text text-title fw-600 px-4">KVA</span>
        </div>
        <input type="text" class="form-control form-control-lg br-left-white {{ $errors->first('transformer_capacity') ? 'is-invalid': NULL  }}" name="transformer_capacity" value="{{old('transformer_capacity')}}">
      </div>
      @if($errors->first('transformer_capacity'))
        <small class="form-text pl-1" style="color:red;">{{$errors->first('transformer_capacity')}}</small>
      @endif
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label class="text-form pb-2 fw-600">Total Generator/UPS Capacity</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text text-title fw-600 px-4">KVA</span>
        </div>
        <input type="text" class="form-control form-control-lg br-left-white {{ $errors->first('ups_capacity') ? 'is-invalid': NULL  }}" name="ups_capacity" value="{{old('ups_capacity')}}">
      </div>
      @if($errors->first('ups_capacity'))
        <small class="form-text pl-1" style="color:red;">{{$errors->first('ups_capacity')}}</small>
      @endif
    </div>
  </div>
</div>