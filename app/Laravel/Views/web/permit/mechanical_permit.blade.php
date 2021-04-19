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
<p class="text-title fw-600 mt-2 fs-15">Installation and Operation of:</p>
<div class="row">
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_boiler" name="installation[]" value="boiler" @if(is_array(old('installation')) && in_array("boiler", old('installation'))) checked @endif>
        <label for="chck_boiler">Boiler</label>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_central_airconditioning" name="installation[]" value="Central Airconditioning" @if(is_array(old('installation')) && in_array("Central Airconditioning", old('installation'))) checked @endif>
        <label for="chck_central_airconditioning">Central Airconditioning</label>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_dumb_waiter" name="installation[]" value="Dumb Waiter" @if(is_array(old('installation')) && in_array("Dumb Waiter", old('installation'))) checked @endif>
        <label for="chck_dumb_waiter">Dumb Waiter</label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_pressure_vessel" name="installation[]" value="Pressure Vessel" @if(is_array(old('installation')) && in_array("Pressure Vessel", old('installation'))) checked @endif>
        <label for="chck_pressure_vessel">Pressure Vessel</label>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_mechanical_ventilation" name="installation[]" value="Mechanical Ventilation" @if(is_array(old('installation')) && in_array("Mechanical Ventilation", old('installation'))) checked @endif>
        <label for="chck_mechanical_ventilation">Mechanical Ventilation</label>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_pumps" name="installation[]" value="pumps" @if(is_array(old('installation')) && in_array("pumps", old('installation'))) checked @endif>
        <label for="chck_pumps">Pumps</label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_combustion_engine" name="installation[]" value="Internal Combustion Engine" @if(is_array(old('installation')) && in_array("Internal Combustion Engine", old('installation'))) checked @endif>
        <label for="chck_combustion_engine">Internal Combustion Engine</label>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_escalator" name="installation[]" value="escalator" @if(is_array(old('installation')) && in_array("escalator", old('installation'))) checked @endif>
        <label for="chck_escalator">Escalator</label>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_compressed_air" name="installation[]" value="Compressed air , Vacuum, Institutional and/or Industrial Gas" @if(is_array(old('installation')) && in_array("Compressed air , Vacuum, Institutional and/or Industrial Gas", old('installation'))) checked @endif>
        <label for="chck_compressed_air">Compressed air , Vacuum, Institutional and/or Industrial Gas</label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_ice_making" name="installation[]" value="Refrigeration and ice making" @if(is_array(old('installation')) && in_array("Refrigeration and ice making", old('installation'))) checked @endif>
        <label for="chck_ice_making">Refrigeration and ice making</label>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_moving_sidewalk" name="installation[]" value="Moving Sidewalk" @if(is_array(old('installation')) && in_array("Moving Sidewalk", old('installation'))) checked @endif>
        <label for="chck_moving_sidewalk">Moving Sidewalk</label>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_pneumatic" name="installation[]" value="Pneumatic Tubes, Conveyors and/or Monorails" @if(is_array(old('installation')) && in_array("Pneumatic Tubes, Conveyors and/or Monorails", old('installation'))) checked @endif>
        <label for="chck_pneumatic">Pneumatic Tubes, Conveyors and/or Monorails</label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_airconditioning" name="installation[]" value="Window Type Airconditioning" @if(is_array(old('installation')) && in_array("Window Type Airconditioning", old('installation'))) checked @endif>
        <label for="chck_airconditioning">Window Type Airconditioning</label>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_freight_elevator" name="installation[]" value="Freight Elevator" @if(is_array(old('installation')) && in_array("Freight Elevator", old('installation'))) checked @endif>
        <label for="chck_freight_elevator">Freight Elevator</label>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_funicular" name="installation[]" value="Funicular" @if(is_array(old('installation')) && in_array("Funicular", old('installation'))) checked @endif>
        <label for="chck_funicular">Funicular</label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_packaged" name="installation[]" value="Packaged / Split Type Airconditioning" @if(is_array(old('installation')) && in_array("Packaged / Split Type Airconditioning", old('installation'))) checked @endif>
        <label for="chck_packaged">Packaged / Split Type Airconditioning</label>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_passenger_elevator" name="installation[]" value="Passenger Elevator" @if(is_array(old('installation')) && in_array("Passenger Elevator", old('installation'))) checked @endif>
        <label for="chck_passenger_elevator">Passenger Elevator</label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  
  <div class="col-md-4">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_cable_car" name="installation[]" value="Cable Car" @if(is_array(old('installation')) && in_array("Cable Car", old('installation'))) checked @endif>
        <label for="chck_cable_car">Cable Car</label>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_installation_others" name="installation[]" value="others" @if(is_array(old('installation')) && in_array("others", old('installation'))) checked @endif>
        <label for="chck_installation_others">Others (Specify) <input type="text" name="others_installation" class="check-input" value="{{old('others_installation')}}"></label>
      </div>
    </div>
  </div>
</div>
@if($errors->first('installation'))
  <small class="form-text" style="color:red;padding-left: 2em">{{$errors->first('installation')}}</small>
@endif