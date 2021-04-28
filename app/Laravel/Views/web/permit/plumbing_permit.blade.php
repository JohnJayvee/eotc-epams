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
<p class="text-title fw-600 mt-2 fs-15">Fixtures to be installed</p>
<div class="row">
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-2">
        <div class="form-group mt-2">
          <input type="text" class="form-control {{ $errors->first('qty_water_closet') ? 'is-invalid': NULL  }}" name="qty_water_closet" value="{{old('qty_water_closet')}}" placeholder="qty">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group mt-2">
           {!!Form::select('fixture_water_closet',$fixtures,old('fixture_water_closet'),['id' => "input_service_id",'class' => "form-control ".($errors->first('fixture_water_closet') ? 'border-red' : NULL)])!!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group"> 
          <div class="radio-item">
            <input type="checkbox" id="chck_water_closet" name="fixtures[]" value="water_closet" @if(is_array(old('fixtures')) && in_array("water_closet", old('fixtures'))) checked @endif>
            <label for="chck_water_closet">Water Closet</label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-2">
        <div class="form-group mt-2">
          <input type="text" class="form-control {{ $errors->first('qty_floor_drain') ? 'is-invalid': NULL  }}" name="qty_floor_drain" value="{{old('qty_floor_drain')}}" placeholder="qty">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group mt-2">
           {!!Form::select('fixture_floor_drain',$fixtures,old('fixture_floor_drain'),['id' => "input_service_id",'class' => "form-control ".($errors->first('fixture_floor_drain') ? 'border-red' : NULL)])!!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group"> 
          <div class="radio-item">
            <input type="checkbox" id="chck_floor_drain" name="fixtures[]" value="floor_drain" @if(is_array(old('fixtures')) && in_array("floor_drain", old('fixtures'))) checked @endif>
            <label for="chck_floor_drain">Floor Drain</label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-2">
        <div class="form-group mt-2">
          <input type="text" class="form-control {{ $errors->first('qty_lavatory') ? 'is-invalid': NULL  }}" name="qty_lavatory" value="{{old('qty_lavatory')}}" placeholder="qty">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group mt-2">
           {!!Form::select('fixture_lavatory',$fixtures,old('fixture_lavatory'),['id' => "input_service_id",'class' => "form-control ".($errors->first('fixture_lavatory') ? 'border-red' : NULL)])!!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group"> 
          <div class="radio-item">
            <input type="checkbox" id="chck_lavatory" name="fixtures[]" value="lavatory" @if(is_array(old('fixtures')) && in_array("lavatory", old('fixtures'))) checked @endif>
            <label for="chck_lavatory">Lavatory</label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-2">
        <div class="form-group mt-2">
          <input type="text" class="form-control {{ $errors->first('qty_kitchen_sink') ? 'is-invalid': NULL  }}" name="qty_kitchen_sink" value="{{old('qty_kitchen_sink')}}" placeholder="qty">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group mt-2">
           {!!Form::select('fixture_kitchen_sink',$fixtures,old('fixture_kitchen_sink'),['id' => "input_service_id",'class' => "form-control ".($errors->first('fixture_kitchen_sink') ? 'border-red' : NULL)])!!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group"> 
          <div class="radio-item">
            <input type="checkbox" id="chck_kitchen_sink" name="fixtures[]" value="kitchen_sink" @if(is_array(old('fixtures')) && in_array("kitchen_sink", old('fixtures'))) checked @endif>
            <label for="chck_kitchen_sink">Kitchen Sink</label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-2">
        <div class="form-group mt-2">
          <input type="text" class="form-control {{ $errors->first('qty_faucet') ? 'is-invalid': NULL  }}" name="qty_faucet" value="{{old('qty_faucet')}}" placeholder="qty">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group mt-2">
           {!!Form::select('fixture_faucet',$fixtures,old('fixture_faucet'),['id' => "input_service_id",'class' => "form-control ".($errors->first('fixture_faucet') ? 'border-red' : NULL)])!!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group"> 
          <div class="radio-item">
            <input type="checkbox" id="chck_faucet" name="fixtures[]" value="faucet" @if(is_array(old('fixtures')) && in_array("faucet", old('fixtures'))) checked @endif>
            <label for="chck_faucet">Faucet</label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-2">
        <div class="form-group mt-2">
          <input type="text" class="form-control {{ $errors->first('qty_shower_head') ? 'is-invalid': NULL  }}" name="qty_shower_head" value="{{old('qty_shower_head')}}" placeholder="qty">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group mt-2">
           {!!Form::select('fixture_shower_head',$fixtures,old('fixture_shower_head'),['id' => "input_service_id",'class' => "form-control ".($errors->first('fixture_shower_head') ? 'border-red' : NULL)])!!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group"> 
          <div class="radio-item">
            <input type="checkbox" id="chck_shower_head" name="fixtures[]" value="shower_head" @if(is_array(old('fixtures')) && in_array("shower_head", old('fixtures'))) checked @endif>
            <label for="chck_shower_head">Shower Head</label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-2">
        <div class="form-group mt-2">
          <input type="text" class="form-control {{ $errors->first('qty_water_meter') ? 'is-invalid': NULL  }}" name="qty_water_meter" value="{{old('qty_water_meter')}}" placeholder="qty">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group mt-2">
           {!!Form::select('fixture_water_meter',$fixtures,old('fixture_water_meter'),['id' => "input_service_id",'class' => "form-control ".($errors->first('fixture_water_meter') ? 'border-red' : NULL)])!!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group"> 
          <div class="radio-item">
            <input type="checkbox" id="chck_water_meter" name="fixtures[]" value="water_meter" @if(is_array(old('fixtures')) && in_array("water_meter", old('fixtures'))) checked @endif>
            <label for="chck_water_meter">Water Meter</label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-2">
        <div class="form-group mt-2">
          <input type="text" class="form-control {{ $errors->first('qty_grease_trap') ? 'is-invalid': NULL  }}" name="qty_grease_trap" value="{{old('qty_grease_trap')}}" placeholder="qty">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group mt-2">
           {!!Form::select('fixture_grease_trap',$fixtures,old('fixture_grease_trap'),['id' => "input_service_id",'class' => "form-control ".($errors->first('fixture_grease_trap') ? 'border-red' : NULL)])!!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group"> 
          <div class="radio-item">
            <input type="checkbox" id="chck_grease_trap" name="fixtures[]" value="grease_trap" @if(is_array(old('fixtures')) && in_array("grease_trap", old('fixtures'))) checked @endif>
            <label for="chck_grease_trap">Grease Trap</label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-2">
        <div class="form-group mt-2">
          <input type="text" class="form-control {{ $errors->first('qty_bath_tub') ? 'is-invalid': NULL  }}" name="qty_bath_tub" value="{{old('qty_bath_tub')}}" placeholder="qty">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group mt-2">
           {!!Form::select('fixture_bath_tub',$fixtures,old('fixture_bath_tub'),['id' => "input_service_id",'class' => "form-control ".($errors->first('fixture_bath_tub') ? 'border-red' : NULL)])!!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group"> 
          <div class="radio-item">
            <input type="checkbox" id="chck_bath_tub" name="fixtures[]" value="bath_tub" @if(is_array(old('fixtures')) && in_array("bath_tub", old('fixtures'))) checked @endif>
            <label for="chck_bath_tub">Bath Tub</label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-2">
        <div class="form-group mt-2">
          <input type="text" class="form-control {{ $errors->first('qty_slop_sink') ? 'is-invalid': NULL  }}" name="qty_slop_sink" value="{{old('qty_slop_sink')}}" placeholder="qty">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group mt-2">
           {!!Form::select('fixture_slop_sink',$fixtures,old('fixture_slop_sink'),['id' => "input_service_id",'class' => "form-control ".($errors->first('fixture_slop_sink') ? 'border-red' : NULL)])!!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group"> 
          <div class="radio-item">
            <input type="checkbox" id="chck_slop_sink" name="fixtures[]" value="slop_sink" @if(is_array(old('fixtures')) && in_array("slop_sink", old('fixtures'))) checked @endif>
            <label for="chck_slop_sink">Slop Sink</label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-2">
        <div class="form-group mt-2">
          <input type="text" class="form-control {{ $errors->first('qty_urinal') ? 'is-invalid': NULL  }}" name="qty_urinal" value="{{old('qty_urinal')}}" placeholder="qty">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group mt-2">
           {!!Form::select('fixture_urinal',$fixtures,old('fixture_urinal'),['id' => "input_service_id",'class' => "form-control ".($errors->first('fixture_urinal') ? 'border-red' : NULL)])!!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group"> 
          <div class="radio-item">
            <input type="checkbox" id="chck_urinal" name="fixtures[]" value="urinal" @if(is_array(old('fixtures')) && in_array("urinal", old('fixtures'))) checked @endif>
            <label for="chck_urinal">Urinal</label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-2">
        <div class="form-group mt-2">
          <input type="text" class="form-control {{ $errors->first('qty_air_conditioning_unit') ? 'is-invalid': NULL  }}" name="qty_air_conditioning_unit" value="{{old('qty_air_conditioning_unit')}}" placeholder="qty">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group mt-2">
           {!!Form::select('fixture_air_conditioning_unit',$fixtures,old('fixture_air_conditioning_unit'),['id' => "input_service_id",'class' => "form-control ".($errors->first('fixture_air_conditioning_unit') ? 'border-red' : NULL)])!!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group"> 
          <div class="radio-item">
            <input type="checkbox" id="chck_air_conditioning_unit" name="fixtures[]" value="air_conditioning_unit" @if(is_array(old('fixtures')) && in_array("air_conditioning_unit", old('fixtures'))) checked @endif>
            <label for="chck_air_conditioning_unit">Air Conditioning Unit</label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-2">
        <div class="form-group mt-2">
          <input type="text" class="form-control {{ $errors->first('qty_water_tank_reservoir') ? 'is-invalid': NULL  }}" name="qty_water_tank_reservoir" value="{{old('qty_water_tank_reservoir')}}" placeholder="qty">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group mt-2">
           {!!Form::select('fixture_water_tank_reservoir',$fixtures,old('fixture_water_tank_reservoir'),['id' => "input_service_id",'class' => "form-control ".($errors->first('fixture_water_tank_reservoir') ? 'border-red' : NULL)])!!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group"> 
          <div class="radio-item">
            <input type="checkbox" id="chck_water_tank_reservoir" name="fixtures[]" value="water_tank_reservoir" @if(is_array(old('fixtures')) && in_array("water_tank_reservoir", old('fixtures'))) checked @endif>
            <label for="chck_water_tank_reservoir">Water Tank Reservoir</label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-2">
        <div class="form-group mt-2">
          <input type="text" class="form-control {{ $errors->first('qty_bidette') ? 'is-invalid': NULL  }}" name="qty_bidette" value="{{old('qty_bidette')}}" placeholder="qty">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group mt-2">
           {!!Form::select('fixture_bidette',$fixtures,old('fixture_bidette'),['id' => "input_service_id",'class' => "form-control ".($errors->first('fixture_bidette') ? 'border-red' : NULL)])!!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group"> 
          <div class="radio-item">
            <input type="checkbox" id="chck_bidette" name="fixtures[]" value="bidette" @if(is_array(old('fixtures')) && in_array("bidette", old('fixtures'))) checked @endif>
            <label for="chck_bidette">Bidette</label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-2">
        <div class="form-group mt-2">
          <input type="text" class="form-control {{ $errors->first('qty_laundry_trays') ? 'is-invalid': NULL  }}" name="qty_laundry_trays" value="{{old('qty_laundry_trays')}}" placeholder="qty">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group mt-2">
           {!!Form::select('fixture_laundry_trays',$fixtures,old('fixture_laundry_trays'),['id' => "input_service_id",'class' => "form-control ".($errors->first('fixture_laundry_trays') ? 'border-red' : NULL)])!!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group"> 
          <div class="radio-item">
            <input type="checkbox" id="chck_laundry_trays" name="fixtures[]" value="laundry_trays" @if(is_array(old('fixtures')) && in_array("laundry_trays", old('fixtures'))) checked @endif>
            <label for="chck_laundry_trays">Laundry Trays</label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-2">
        <div class="form-group mt-2">
          <input type="text" class="form-control {{ $errors->first('qty_dental_cuspidor') ? 'is-invalid': NULL  }}" name="qty_dental_cuspidor" value="{{old('qty_dental_cuspidor')}}" placeholder="qty">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group mt-2">
           {!!Form::select('fixture_dental_cuspidor',$fixtures,old('fixture_dental_cuspidor'),['id' => "input_service_id",'class' => "form-control ".($errors->first('fixture_dental_cuspidor') ? 'border-red' : NULL)])!!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group"> 
          <div class="radio-item">
            <input type="checkbox" id="chck_dental_cuspidor" name="fixtures[]" value="dental_cuspidor" @if(is_array(old('fixtures')) && in_array("dental_cuspidor", old('fixtures'))) checked @endif>
            <label for="chck_dental_cuspidor">Dental Cuspidor</label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-2">
        <div class="form-group mt-2">
          <input type="text" class="form-control {{ $errors->first('qty_drinking_fountain') ? 'is-invalid': NULL  }}" name="qty_drinking_fountain" value="{{old('qty_drinking_fountain')}}" placeholder="qty">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group mt-2">
           {!!Form::select('fixture_drinking_fountain',$fixtures,old('fixture_drinking_fountain'),['id' => "input_service_id",'class' => "form-control ".($errors->first('fixture_drinking_fountain') ? 'border-red' : NULL)])!!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group"> 
          <div class="radio-item">
            <input type="checkbox" id="chck_drinking_fountain" name="fixtures[]" value="drinking_fountain" @if(is_array(old('fixtures')) && in_array("drinking_fountain", old('fixtures'))) checked @endif>
            <label for="chck_drinking_fountain">Drinking Fountain</label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-2">
        <div class="form-group mt-2">
          <input type="text" class="form-control {{ $errors->first('qty_bar_sink') ? 'is-invalid': NULL  }}" name="qty_bar_sink" value="{{old('qty_bar_sink')}}" placeholder="qty">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group mt-2">
           {!!Form::select('fixture_bar_sink',$fixtures,old('fixture_bar_sink'),['id' => "input_service_id",'class' => "form-control ".($errors->first('fixture_bar_sink') ? 'border-red' : NULL)])!!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group"> 
          <div class="radio-item">
            <input type="checkbox" id="chck_bar_sink" name="fixtures[]" value="bar_sink" @if(is_array(old('fixtures')) && in_array("bar_sink", old('fixtures'))) checked @endif>
            <label for="chck_bar_sink">Bar Sink</label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-2">
        <div class="form-group mt-2">
          <input type="text" class="form-control {{ $errors->first('qty_soda_fountain_drink') ? 'is-invalid': NULL  }}" name="qty_soda_fountain_drink" value="{{old('qty_soda_fountain_drink')}}" placeholder="qty">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group mt-2">
           {!!Form::select('fixture_soda_fountain_drink',$fixtures,old('fixture_soda_fountain_drink'),['id' => "input_service_id",'class' => "form-control ".($errors->first('fixture_soda_fountain_drink') ? 'border-red' : NULL)])!!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group"> 
          <div class="radio-item">
            <input type="checkbox" id="chck_soda_fountain_drink" name="fixtures[]" value="soda_fountain_drink" @if(is_array(old('fixtures')) && in_array("soda_fountain_drink", old('fixtures'))) checked @endif>
            <label for="chck_soda_fountain_drink">Soda Fountain Sink</label>
          </div>
        </div>
      </div>
    </div>
  </div>
   <div class="col-md-6">
  <div class="row">
      <div class="col-md-2">
        <div class="form-group mt-2">
          <input type="text" class="form-control {{ $errors->first('qty_laboratory_sink') ? 'is-invalid': NULL  }}" name="qty_laboratory_sink" value="{{old('qty_laboratory_sink')}}" placeholder="qty">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group mt-2">
           {!!Form::select('fixture_laboratory_sink',$fixtures,old('fixture_laboratory_sink'),['id' => "input_service_id",'class' => "form-control ".($errors->first('fixture_laboratory_sink') ? 'border-red' : NULL)])!!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group"> 
          <div class="radio-item">
            <input type="checkbox" id="chck_laboratory_sink" name="fixtures[]" value="laboratory_sink" @if(is_array(old('fixtures')) && in_array("laboratory_sink", old('fixtures'))) checked @endif>
            <label for="chck_laboratory_sink">Laboratory Sink</label>
          </div>
        </div>
      </div>
  </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-2">
        <div class="form-group mt-2">
          <input type="text" class="form-control {{ $errors->first('qty_sterilizer') ? 'is-invalid': NULL  }}" name="qty_sterilizer" value="{{old('qty_sterilizer')}}" placeholder="qty">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group mt-2">
           {!!Form::select('fixture_sterilizer',$fixtures,old('fixture_sterilizer'),['id' => "input_service_id",'class' => "form-control ".($errors->first('fixture_sterilizer') ? 'border-red' : NULL)])!!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group"> 
          <div class="radio-item">
            <input type="checkbox" id="chck_sterilizer" name="fixtures[]" value="sterilizer" @if(is_array(old('fixtures')) && in_array("sterilizer", old('fixtures'))) checked @endif>
            <label for="chck_sterilizer">Sterilizer</label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="row">
      <div class="col-md-2">
        <div class="form-group mt-2">
          <input type="text" class="form-control {{ $errors->first('qty_others') ? 'is-invalid': NULL  }}" name="qty_others" value="{{old('qty_others')}}" placeholder="qty">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group mt-2">
           {!!Form::select('fixture_others',$fixtures,old('fixture_others'),['id' => "input_service_id",'class' => "form-control ".($errors->first('fixture_others') ? 'border-red' : NULL)])!!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group"> 
          <div class="radio-item">
            <input type="checkbox" id="chck_other_fixture" name="fixtures[]" value="others" @if(is_array(old('fixtures')) && in_array("others", old('fixtures'))) checked @endif>
            <label for="chck_other_fixture">Others  <input type="text" name="other_fixture" class="check-input"> </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>