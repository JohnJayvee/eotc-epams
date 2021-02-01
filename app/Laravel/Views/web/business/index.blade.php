@extends('web._layouts.main')


@section('content')



<!--team section start-->
<section class="px-120 pt-110 pb-80 gray-light-bg">
    <div class="container">
        <div class="row">
            @include('web.business.business_sidebar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-title text-uppercase">Please Select A Business Profile You Want To Display</h5>
                    </div>
                    @if (session('ecozone.progress') == 1)
                    <div class="modal" id="economic-zone" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLongTitle">Choose an EcoZone</h3>
                                </div>
                                <form action="" method="GET">
                                    @csrf
                                    <div class="modal-body text-center">
                                        <select name="ecozone" id="list_of_ecozone"
                                            class="form-control form-control-sm classic">
                                            <option value="Cavite Ecozone">Cavite Ecozone</option>
                                            <option value="Baguio Ecozone">Baguio Ecozone</option>
                                            <option value="Laguna Ecozone">Laguna Ecozone</option>
                                            <option value="Batangas Ecozone">Batangas Ecozone</option>
                                            <option value="Cebu Ecozone">Cebu Ecozone</option>
                                            <option value="Davao Ecozone">Davao Ecozone</option>
                                            <option value="Subic Ecozone">Subic Ecozone</option>
                                            <option value="Clark Ecozone">Clark Ecozone</option>
                                            <option value="Dumaguete Ecozone">Dumaguete Ecozone</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="submit" class="btn btn-primary">Ok</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>



    </div>

</section>
<!--team section end-->


@stop

@section('page-scripts')
<script type="text/javascript">
    $(function(){
        $('#economic-zone').modal('show');
    })
</script>
@endsection
