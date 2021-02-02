@extends('web._layouts.main')


@section('content')



<!--team section start-->
<section class="px-120 pt-110 pb-80 gray-light-bg">
    <div class="container">
        <div class="row profile">
            @include('web.business.business_sidebar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">BUILDING PERMIT AND / OR ANCILLARY PERMITS APPLICATION EVALUATION FORM</h3>
                    </div>
                    <div class="card-body" style="padding: 3em">
                        <h5 class="text-title text-uppercase">Business Transaction</h5>
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="text-form pb-2">Locator / Enterprise:</label>
                                    <input type="text" class="form-control form-control-sm"  name="locator_enterprise" value="">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="text-form pb-2">Project Title</label>
                                    <input type="text" class="form-control form-control-sm"  name="project_title" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="text-form pb-2">Locator / Zone:</label>
                                    @if(!empty(session('ecozone.selected')))
                                    <input type="text" class="form-control form-control-sm"  name="locator_zone" value="{{ session('ecozone.selected') }}" disabled>
                                    @else
                                    <input type="text" class="form-control form-control-sm"  name="locator_zone" value="">
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="text-form pb-2">Contractor</label>
                                    <input type="text" class="form-control form-control-sm"  name="contractor" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="table-responsive">
                                <table class="table table-striped ">
                                    <thead>
                                        <th class="text-title">Requirement Name</th>
                                        <th class="text-title">File</th>
                                    </thead>
                                    <tr>
                                        <td>Permit Application Forms (Required)</td>
                                        <td><input type="file"></td>
                                    </tr>
                                    <tr>
                                        <td>Four (4) clear copies of valid PRC License and PTR of signing professionals (Required)</td>
                                        <td><input type="file"></td>
                                    </tr>
                                    <tr>
                                        <td>Copy of PEZA Enterprise’s Certificate of Registration and Registration Agreement or
                                            Approved Board Resolution (Optional)</td>
                                        <td><input type="file"></td>
                                    </tr>
                                    <tr>
                                        <td>Supplemental Agreement or Letter of Authority LOA (Optional)</td>
                                        <td><input type="file"></td>
                                    </tr>
                                   <!--  <tr>
                                        <td>Contract of Lease between lessor and lessee or PEZA-issued LOA (Optional)</td>
                                        <td><input type="file"></td>
                                    </tr>
                                    <tr>
                                        <td>Four (4) sets of Proposed Plans (3 sets A1 size + 1 set A3 size)</td>
                                        <td><input type="file"></td>
                                    </tr>
                                    <tr>
                                        <td>Occupant load density certification (Optional)</td>
                                        <td><input type="file"></td>
                                    </tr>
                                    <tr>
                                        <td>Duly accomplished DATASHEETS of MECHANICAL, ELECTRICAL and ELECTRONICS</td>
                                        <td><input type="file"></td>
                                    </tr>
                                    <tr>
                                        <td>Four (4) copies of DETAILED COST ESTIMATE</td>
                                        <td><input type="file"></td>
                                    </tr>
                                    <tr>
                                        <td>Four (4) copies of TECHNICAL SPECIFICATIONS</td>
                                        <td><input type="file"></td>
                                    </tr>
                                    <tr>
                                        <td>Two (2) copies of STRUCTURAL DESIGN CALCULATION</td>
                                        <td><input type="file"></td>
                                    </tr>
                                    <tr>
                                        <td>Two (2) copies of SHORT CIRCUIT ANALYSIS and VOLTAGE DROP CALCULATIONS</td>
                                        <td><input type="file"></td>
                                    </tr>
                                    <tr>
                                        <td>Two (2) copies of DESIGN CALCULATION of foundations of internal combustion engines</td>
                                        <td><input type="file"></td>
                                    </tr>
                                    <tr>
                                        <td>Copy of Contractor’s valid PCAB LICENSE:</td>
                                        <td><input type="file"></td>
                                    </tr>
                                    <tr>
                                        <td>Copy of DOLE-Approved CONSTRUCTION SAFETY AND HEALTH PROGRAM</td>
                                        <td><input type="file"></td>
                                    </tr>
                                    <tr>
                                        <td>Copy of ENVIRONMENTAL COMPLIANCE CERTIFICATE (ECC) or CERTIFICATE OF NONCOVERAGE
                                            (CNC); and LLDA CLEARANCE</td>
                                        <td><input type="file"></td>
                                    </tr>
                                    <tr>
                                        <td>SOFT COPY (PDF format) of all applicable plans and documents,</td>
                                        <td><input type="file"></td>
                                    </tr>
                                    <tr>
                                        <td>LETTER OF APPLICATION for building permit and/or ancillary permit from the locator/owner or
                                            from the contractor.</td>
                                        <td><input type="file"></td>
                                    </tr> -->

                                </table>
                            </div>
                        </div>
                        <a href="#" class="btn badge-primary-2 mt-2 process" style="float: right;">Proceeed <span class="fas fa-arrow-right"></span></a>
                        <a href="{{route('web.business.index')}}" class="btn badge-default-2 mt-2 mr-2" style="float: right;">Return</a>
                    </div>
                </div>
                <div class="modal" id="economic-zone" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                    <h1 class="text-success">Success</h1>
                                    <h5>Thank you! We have received your application.</h5>
                                    <h5>We'll get in touch once the assessment is complete.</h5>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <a href="{{ route('web.business.index') }}" class="btn btn-primary echozone">Go back to home</a>
                                </div>
                            </div>
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
<script>
    $('.process').click(function(){
        $('.modal').modal('show')
    })
    $('.ecozone').click(function(){
        {{ session()->forget('ecozone') }}
    })
</script>


@endsection
