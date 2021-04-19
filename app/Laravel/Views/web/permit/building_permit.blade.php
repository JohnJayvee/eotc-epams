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
        <input type="checkbox" id="chck_addtion" name="scope_of_work[]" value="addition" @if(is_array(old('scope_of_work')) && in_array("addition", old('scope_of_work'))) checked @endif>
        <label for="chck_addtion">Addition <input type="text" name="addition" class="check-input"></label>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_conversion" name="scope_of_work[]" value="conversion" @if(is_array(old('scope_of_work')) && in_array("conversion", old('scope_of_work'))) checked @endif>
        <label for="chck_conversion">Conversion <input type="text" name="conversion" class="check-input"></label>
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
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_alteration" name="scope_of_work[]" value="alteration" @if(is_array(old('scope_of_work')) && in_array("alteration", old('scope_of_work'))) checked @endif>
        <label for="chck_alteration">Alteration <input type="text" name="alteration" class="check-input"></label>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_moving" name="scope_of_work[]" value="moving" @if(is_array(old('scope_of_work')) && in_array("moving", old('scope_of_work'))) checked @endif>
        <label for="chck_moving">Moving <input type="text" name="moving" class="check-input"></label>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_raising" name="scope_of_work[]" value="raising"  @if(is_array(old('scope_of_work')) && in_array("raising", old('scope_of_work'))) checked @endif>
        <label for="chck_raising">Raising <input type="text" name="raising" class="check-input"></label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_accesory" name="scope_of_work[]" value="accessory" @if(is_array(old('scope_of_work')) && in_array("accessory", old('scope_of_work'))) checked @endif>
        <label for="chck_accesory">Accessory Building/Structure <input type="text" name="accessory" class="check-input"></label>
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
<p class="text-title fw-600 mt-2 fs-15">Use or Character of character_of_occupancy</p>
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
<p class="text-title fw-600 mt-2 fs-15">Other Details</p>
<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label class="text-form pb-2 fw-600">Occupancy Classified</label>
      <input type="text" class="form-control form-control-lg {{ $errors->first('occupancy_classified') ? 'is-invalid': NULL  }}" name="occupancy_classified" placeholder="First Name" value="{{old('occupancy_classified')}}">
      @if($errors->first('occupancy_classified'))
        <small class="form-text pl-1" style="color:red;">{{$errors->first('occupancy_classified')}}</small>
      @endif
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label class="text-form pb-2 fw-600">Number of Units</label>
      <input type="text" class="form-control form-control-lg {{ $errors->first('unit_no') ? 'is-invalid': NULL  }}" name="unit_no" value="{{old('unit_no')}}">
      @if($errors->first('unit_no'))
        <small class="form-text pl-1" style="color:red;">{{$errors->first('unit_no')}}</small>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="text-form pb-2 fw-600">Total Floor Area</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text text-title fw-600 px-4">sqm</span>
        </div>
        <input type="text" class="form-control form-control-lg br-left-white {{ $errors->first('floor_area') ? 'is-invalid': NULL  }}" name="floor_area" value="{{old('floor_area')}}">
      </div>
      @if($errors->first('floor_area'))
        <small class="form-text pl-1" style="color:red;">{{$errors->first('floor_area')}}</small>
      @endif
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label class="text-form pb-2 fw-600">Proposed Date of Completion</label>
      <input type="date" class="form-control form-control-lg {{ $errors->first('proposed_date') ? 'is-invalid': NULL  }}" name="proposed_date" value="{{old('proposed_date')}}">
      @if($errors->first('proposed_date'))
        <small class="form-text pl-1" style="color:red;">{{$errors->first('proposed_date')}}</small>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="text-form pb-2 fw-600">Expected Date of Completion</label>
      <input type="date" class="form-control form-control-lg {{ $errors->first('expected_date') ? 'is-invalid': NULL  }}" name="expected_date" value="{{old('expected_date')}}">
      @if($errors->first('expected_date'))
        <small class="form-text pl-1" style="color:red;">{{$errors->first('expected_date')}}</small>
      @endif
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label class="text-form pb-2 fw-600">Other Related Permits</label>
      <input type="text" class="form-control form-control-lg {{ $errors->first('related_permits') ? 'is-invalid': NULL  }}" name="related_permits" value="{{old('related_permits')}}">
      @if($errors->first('related_permits'))
        <small class="form-text pl-1" style="color:red;">{{$errors->first('related_permits')}}</small>
      @endif
    </div>
  </div>
</div>