<p class="text-title fw-600 mt-2 fs-15">Scope of Work</p>
<div class="row">
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_new_fence" name="scope_of_work[]" value="new_fence" @if(is_array(old('scope_of_work')) && in_array("new_fence", old('scope_of_work'))) checked @endif>
        <label for="chck_new_fence">New Fence</label>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_addition" name="scope_of_work[]" value="addition" @if(is_array(old('scope_of_work')) && in_array("addition", old('scope_of_work'))) checked @endif>
        <label for="chck_addition">Addition</label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_renovation" name="scope_of_work[]" value="renovation" @if(is_array(old('scope_of_work')) && in_array("renovation", old('scope_of_work'))) checked @endif>
        <label for="chck_renovation">Renovation</label>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_repair" name="scope_of_work[]" value="repair" @if(is_array(old('scope_of_work')) && in_array("repair", old('scope_of_work'))) checked @endif>
        <label for="chck_repair">Repair <input type="text" name="repair" class="check-input"></label>
      </div>
    </div>
  </div>
</div>
@if($errors->first('scope_of_work'))
  <small class="form-text" style="color:red;padding-left: 2em">{{$errors->first('scope_of_work')}}</small>
@endif
<p class="text-title fw-600 mt-2 fs-15">Accompanying Documents</p>
<div class="row">
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_ctc" name="clearance[]" value="Xerox Copy of TCT" @if(is_array(old('clearance')) && in_array("Xerox Copy of TCT", old('clearance'))) checked @endif>
        <label for="chck_ctc">Xerox Copy of TCT</label>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_lot_plan" name="clearance[]" value="Xerox Copy of Lot/Site Plan" @if(is_array(old('clearance')) && in_array("Xerox Copy of Lot/Site Plan", old('clearance'))) checked @endif>
        <label for="chck_lot_plan">Xerox Copy of Lot/Site Plan</label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_land_tax" name="clearance[]" value="Xerox Copy of Latest Land Tax Receipt" @if(is_array(old('clearance')) && in_array("Xerox Copy of Latest Land Tax Receipt", old('clearance'))) checked @endif>
        <label for="chck_land_tax">Xerox Copy of Latest Land Tax Receipt</label>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_contract_lease" name="clearance[]" value="Xerox Copy of Contract of Lease" @if(is_array(old('clearance')) && in_array("Xerox Copy of Contract of Lease", old('clearance'))) checked @endif>
        <label for="chck_contract_lease">Xerox Copy of Contract of Lease (if Not owned by applicant)</label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_other_clearance" name="clearance[]" value="other_clearance" @if(is_array(old('clearance')) && in_array("other_clearance", old('scope_of_work'))) checked @endif>
        <label for="chck_other_clearance">Other Clearance (Specify) <input type="text" name="other_clearance" class="check-input"></label>
      </div>
    </div>
  </div>
</div>
@if($errors->first('clearance'))
  <small class="form-text" style="color:red;padding-left: 2em">{{$errors->first('clearance')}}</small>
@endif
<p class="text-title fw-600 mt-2 fs-15">Type of Fencing</p>
<div class="row">
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_indigineous_material" name="type_of_fencing[]" value="Indigenous Materials" @if(is_array(old('type_of_fencing')) && in_array("Indigenous Materials", old('type_of_fencing'))) checked @endif>
        <label for="chck_indigineous_material">Indigenous Materials</label>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_interlink" name="type_of_fencing[]" value="R.C & Interlink/ Cyclone Wire" @if(is_array(old('type_of_fencing')) && in_array("R.C & Interlink/ Cyclone Wire", old('type_of_fencing'))) checked @endif>
        <label for="chck_interlink">R.C & Interlink/ Cyclone Wire</label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_concrete" name="type_of_fencing[]" value="R.C (Reinforced Concrete)" @if(is_array(old('type_of_fencing')) && in_array("R.C (Reinforced Concrete)", old('type_of_fencing'))) checked @endif>
        <label for="chck_concrete">R.C (Reinforced Concrete)</label>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_steel_matting" name="type_of_fencing[]" value="R.C & Steel Matting" @if(is_array(old('type_of_fencing')) && in_array("R.C & Steel Matting", old('type_of_fencing'))) checked @endif>
        <label for="chck_steel_matting">R.C & Steel Matting</label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_hollow_blocks" name="type_of_fencing[]" value="R.C & Conc Hollow Blocks" @if(is_array(old('type_of_fencing')) && in_array("R.C & Conc Hollow Blocks", old('type_of_fencing'))) checked @endif>
        <label for="chck_hollow_blocks">R.C & Conc Hollow Blocks</label>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_barbed_wire" name="type_of_fencing[]" value="R.C & Barbed Wire" @if(is_array(old('type_of_fencing')) && in_array("R.C & Barbed Wire", old('scope_of_work'))) checked @endif>
        <label for="chck_barbed_wire">R.C & Barbed Wire</label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_other_wires" name="type_of_fencing[]" value="Other Wires" @if(is_array(old('type_of_fencing')) && in_array("Other Wires", old('type_of_fencing'))) checked @endif>
        <label for="chck_other_wires">Other Wires</label>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group"> 
      <div class="radio-item">
        <input type="checkbox" id="chck_others" name="type_of_fencing[]" value="others" @if(is_array(old('type_of_fencing')) && in_array("others", old('type_of_fencing'))) checked @endif>
        <label for="chck_others">Others (Specify) <input type="text" name="others" class="check-input"></label>
      </div>
    </div>
  </div>
</div>
@if($errors->first('type_of_fencing'))
  <small class="form-text" style="color:red;padding-left: 2em">{{$errors->first('type_of_fencing')}}</small>
@endif
<p class="text-title fw-600 mt-2 fs-15">Other Details</p>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label class="text-form pb-2 fw-600">Length in Meters</label>
      <input type="text" class="form-control form-control-lg {{ $errors->first('length') ? 'is-invalid': NULL  }}" name="length" placeholder="First Name" value="{{old('length')}}">
      @if($errors->first('length'))
        <small class="form-text pl-1" style="color:red;">{{$errors->first('length')}}</small>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="text-form pb-2 fw-600">Height in Meters</label>
      <input type="text" class="form-control form-control-lg {{ $errors->first('height') ? 'is-invalid': NULL  }}" name="height" placeholder="First Name" value="{{old('height')}}">
      @if($errors->first('height'))
        <small class="form-text pl-1" style="color:red;">{{$errors->first('height')}}</small>
      @endif
    </div>
  </div>
</div>