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
        <input type="checkbox" id="chck_repair" name="scope_of_work[]" value="repair" @if(is_array(old('scope_of_work')) && in_array("repair", old('scope_of_work'))) checked @endif>
        <label for="chck_repair">Repair <input type="text" name="repair" class="check-input"></label>
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
</div>
@if($errors->first('scope_of_work'))
  <small class="form-text" style="color:red;padding-left: 2em">{{$errors->first('scope_of_work')}}</small>
@endif
<p class="text-title fw-600 mt-2 fs-15">Use or Character of Character of Occupancy</p>
<div class="row">
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item pr-5">
        <input type="checkbox" id="chck_group_a" name="character_of_occupancy[]" value="group_a" @if(is_array(old('character_of_occupancy')) && in_array("group_a", old('character_of_occupancy'))) checked @endif>
        <label for="chck_group_a">Group A: Residential, Dwellings</label>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_group_f" name="character_of_occupancy[]" value="group_f" @if(is_array(old('character_of_occupancy')) && in_array("group_f", old('character_of_occupancy'))) checked @endif>
        <label for="chck_group_f">Group F: Industrial</label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item pr-5">
        <input type="checkbox" id="chck_group_b" name="character_of_occupancy[]" value="group_b" @if(is_array(old('character_of_occupancy')) && in_array("group_b", old('character_of_occupancy'))) checked @endif>
        <label for="chck_group_b">Group B: Residential, Hotel, Apartment</label>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_group_g" name="character_of_occupancy[]" value="group_g" @if(is_array(old('character_of_occupancy')) && in_array("group_g", old('character_of_occupancy'))) checked @endif>
        <label for="chck_group_g">Group G: Industrial Storage & Hazardous</label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item pr-5">
        <input type="checkbox" id="chck_group_c" name="character_of_occupancy[]" value="group_c" @if(is_array(old('character_of_occupancy')) && in_array("group_c", old('character_of_occupancy'))) checked @endif>
        <label for="chck_group_c">Group C: Educational, Recreational</label>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_group_h" name="character_of_occupancy[]" value="group_h" @if(is_array(old('character_of_occupancy')) && in_array("group_h", old('character_of_occupancy'))) checked @endif>
        <label for="chck_group_h">Group H: Recreational, Assembly Occupant load less than 1000</label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item pr-5">
        <input type="checkbox" id="chck_group_d" name="character_of_occupancy[]" value="group_d" @if(is_array(old('character_of_occupancy')) && in_array("group_d", old('character_of_occupancy'))) checked @endif>
        <label for="chck_group_d">Group D: Institutional</label>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_group_i" name="character_of_occupancy[]" value="group_i" @if(is_array(old('character_of_occupancy')) && in_array("group_i", old('character_of_occupancy'))) checked @endif>
        <label for="chck_group_i">Group I: Recreational, Assembly Occupant load 1000 or more</label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item pr-5">
        <input type="checkbox" id="chck_group_e" name="character_of_occupancy[]" value="group_e" @if(is_array(old('character_of_occupancy')) && in_array("group_e", old('character_of_occupancy'))) checked @endif>
        <label for="chck_group_e">Group E: Business & Mercantile</label>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_group_j" name="character_of_occupancy[]" value="group_j" @if(is_array(old('character_of_occupancy')) && in_array("group_j", old('character_of_occupancy'))) checked @endif>
        <label for="chck_group_j">Group J: Agricultural, Accesory</label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item pr-5">
        <input type="checkbox" id="chck_group_others" name="character_of_occupancy[]" value="group_others" @if(is_array(old('character_of_occupancy')) && in_array("group_others", old('character_of_occupancy'))) checked @endif>
        <label for="chck_group_others">Others(specify): <input type="text" name="group_others" class="check-input"> </label>
      </div>
    </div>
  </div>
</div>
@if($errors->first('character_of_occupancy'))
  <small class="form-text" style="color:red;padding-left: 2em">{{$errors->first('character_of_occupancy')}}</small>
@endif