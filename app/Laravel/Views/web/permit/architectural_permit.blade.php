<p class="text-title fw-600 mt-2 fs-15">Scope of Work</p>
<div class="row">
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_new_construction" name="scope_of_work[]" value="new_construction" @if(is_array(old('scope_of_work')) && in_array("new_construction", old('scope_of_work'))) checked @endif>
        <label for="chck_new_construction">New Construction</label>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_renovation" name="scope_of_work[]" value="renovation" @if(is_array(old('scope_of_work')) && in_array("renovation", old('scope_of_work'))) checked @endif>
        <label for="chck_renovation">Renovation</label>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_erection" name="scope_of_work[]" value="erection" @if(is_array(old('scope_of_work')) && in_array("erection", old('scope_of_work'))) checked @endif>
        <label for="chck_erection">Erection <input type="text" name="erection" class="check-input" value="{{old('erection')}}"></label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_addition" name="scope_of_work[]" value="addition" @if(is_array(old('scope_of_work')) && in_array("addition", old('scope_of_work'))) checked @endif>
        <label for="chck_addition">Addition <input type="text" name="addition" class="check-input"></label>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_conversion" name="scope_of_work[]" value="conversion" @if(is_array(old('scope_of_work')) && in_array("conversion", old('scope_of_work'))) checked @endif>
        <label for="chck_conversion">Conversion <input type="text" name="conversion" value="{{old('conversion')}}" class="check-input"></label>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_repair" name="scope_of_work[]" value="repair" @if(is_array(old('scope_of_work')) && in_array("repair", old('scope_of_work'))) checked @endif>
        <label for="chck_repair">Repair <input type="text" name="repair" value="{{old('repair')}}" class="check-input"></label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_alteration" name="scope_of_work[]" value="alteration" @if(is_array(old('scope_of_work')) && in_array("alteration", old('scope_of_work'))) checked @endif>
        <label for="chck_alteration">Alteration <input type="text" name="alteration" value="{{old('alteration')}}" class="check-input"></label>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_moving" name="scope_of_work[]" value="moving" @if(is_array(old('scope_of_work')) && in_array("moving", old('scope_of_work'))) checked @endif>
        <label for="chck_moving">Moving <input type="text" name="moving" value="{{old('moving')}}"  class="check-input"></label>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_raising" name="scope_of_work[]" value="raising"  @if(is_array(old('scope_of_work')) && in_array("raising", old('scope_of_work'))) checked @endif>
        <label for="chck_raising">Raising <input type="text" name="raising" value="{{old('raising')}}" class="check-input"></label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_accesory" name="scope_of_work[]" value="accessory" @if(is_array(old('scope_of_work')) && in_array("accessory", old('scope_of_work'))) checked @endif>
        <label for="chck_accesory">Accessory Building/Structure <input type="text" name="accessory" value="{{old('accessory')}}" class="check-input"></label>
      </div>
    </div>
  </div>
  <div class="col-md-6">
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