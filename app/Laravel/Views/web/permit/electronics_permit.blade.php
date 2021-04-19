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
        <input type="checkbox" id="chck_annual_inspection" name="scope_of_work[]" value="annual_inspection" @if(is_array(old('scope_of_work')) && in_array("annual_inspection", old('scope_of_work'))) checked @endif>
        <label for="chck_annual_inspection">Annual Inspection</label>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_others" name="scope_of_work[]" value="others" @if(is_array(old('scope_of_work')) && in_array("others", old('scope_of_work'))) checked @endif>
        <label for="chck_others">Others(specify) <input type="text" name="others" class="check-input"></label>
      </div>
    </div>
  </div>
</div>
@if($errors->first('scope_of_work'))
  <small class="form-text" style="color:red;padding-left: 2em">{{$errors->first('scope_of_work')}}</small>
@endif