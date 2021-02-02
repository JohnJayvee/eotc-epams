@extends('web._layouts.main')


@section('content')

<!--team section start-->
<section class="ptb-120 pt-110 pb-80 gray-light-bg">
    <div class="container">
        <div class="row">
            @include('web.business.business_sidebar')
            <div class="col-md-9">
                <div class="card stretch-card">
                    <div class="card-body">
                        <h5 class="text-title text-uppercase">Please Select A Business Profile You Want To Display</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--team section end-->
@stop


