@extends('web._layouts.main')


@section('content')



<!--team section start-->
<section class="px-120 pt-110 pb-80 gray-light-bg">
    <div class="container">
        <div class="row profile">
            @include('web.business.business_sidebar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body" style="padding: 3em">
                        <h5 class="text-title text-uppercase">Business Transaction</h5>
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="text-form pb-2">Services</label>
                                    <select name="services" id="services" class="form-control form-control-sm classic">
                                        <option value="new_permit" selected>New Permit</option>
                                        <option value="renew">Renewal of Permit</option>
                                        <option value="other">Other Taxes, Dues, and Fees</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="text-form pb-2">Type of Permit</label>
                                    <div class="new-permit" style="display: none;">
                                        <select name="services" id="type_of_permit" class="form-control form-control-sm classic">
                                            <option value="pre_construction">Pre-construction permits</option>
                                            <option value="post_construction">Post-construction permits</option>
                                        </select>
                                    </div>
                                    <div class="renew" style="display: none;">
                                        <select name="services" id="type_of_permit" class="form-control form-control-sm classic">
                                            <option value="renewal_permit">Annual/Renewal of permits</option>
                                        </select>
                                    </div>
                                    <div class="other" style="display: none;">
                                        <select name="services" id="type_of_permit" class="form-control form-control-sm classic">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="text-form pb-2">List of Permit</label>
                                    <div class="pre-construction" style="display: none;">
                                        <select name="services" id="list_of_permit" class="form-control form-control-sm classic">
                                            <option value="">Building Permit</option>
                                            <option value="">Ancillary Permit – Architectural Permit</option>
                                            <option value="">Ancillary Permit – Civil/Structural Permit</option>
                                            <option value="">Ancillary Permit – Sanitary Permit</option>
                                            <option value="">Ancillary Permit – Plumbing Permit</option>
                                            <option value="">Ancillary Permit – Fencing Permit</option>
                                            <option value="">Ancillary Permit – Electrical Permit</option>
                                            <option value="">Ancillary Permit – Mechanical Permit</option>
                                            <option value="">Ancillary Permit – Electronics Permit</option>
                                            <option value="">Ancillary Permit – Demolition Permit</option>
                                            <option value="">Accessory Permit – Excavation Permit</option>
                                            <option value="">Accessory Permit – Ground Preparation Permit</option>
                                        </select>
                                    </div>
                                    <div class="post-construction" style="display: none;">
                                        <select name="services" id="list_of_permit" class="form-control form-control-sm classic">
                                            <option value="">Certificate of Occupancy</option>
                                            <option value="">Permits-to-Operate</option>
                                            <option value="">Application for Certificate of Electrical Inspection (CEI)</option>
                                        </select>
                                    </div>
                                    <div class="renewal" style="display: none;">
                                        <select name="services" id="list_of_permit" class="form-control form-control-sm classic">
                                            <option value="">Certificate of Annual Inspection</option>
                                            <option value="">Permit-to-Operate Renewal</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('web.business.application.building_permit')}}" class="btn badge-primary-2 mt-2" style="float: right;">Proceeed</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>
<!--team section end-->


@stop

@section('page-styles')
<style type="text/css">
    .underline {
        border-bottom: solid 1px;
    }
</style>
@endsection
@section('page-scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('.new-permit').show();
        $('.pre-construction').show();
        $('#services').change(function(){
            if($(this).val() == 'new_permit'){
                $('.new-permit').show();
                $('.renew').hide();
                $('.pre-construction').show();
                $('.renewal').hide();

            }
            if($(this).val() == 'renew'){
                $('.renew').show();
                $('.new-permit').hide();
                $('.renewal').show();
                $('.pre-construction').hide();
                $('.post-construction').hide();

            }
        })
        $('#type_of_permit').change(function(){
            if($(this).val() == 'pre_construction'){
                $('.pre-construction').show();
                $('.post-construction').hide();
            }
            if($(this).val() == 'post_construction'){
                $('.pre-construction').hide();
                $('.post-construction').show();
            }
        })
    })
</script>

@endsection
