@extends('web._layouts.guest')


@section('content')
  <div class="tw-h-screen tw-flex tw-overflow-hidden tw-bg-white">
    @include('web._components.sidebar-signup')
    <!--team section start-->
    <div class="tw-flex tw-flex-col tw-w-0 tw-flex-1 tw-overflow-y-auto">
      <section>
        <div class="container" style="margin-top: 5em">
          <div class="card login-signup-form" style="border-radius: 8px;">
            <div class="card-body">
              <h3 class=" pb-3">Sign Up</h3>
              <h1 class="text-title fs-15">Verification</h1>
              <form method="POST" action="" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <!-- progressbar -->
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="custom-file" id="customFile" style="margin-bottom: 2em">
                            <input type="file" class="custom-file-input" name="endorsement">
                            <label class="custom-file-label">Select file...</label>
                        </div>
                        @if($errors->first('endorsement'))
                          <p class="mt-1 text-danger">{!!$errors->first('endorsement')!!}</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="custom-file" id="customFile" style="margin-bottom: 2em">
                            <input type="file" class="custom-file-input" name="gov_id_1">
                            <label class="custom-file-label" >Select file...</label>
                        </div>
                        @if($errors->first('gov_id_1'))
                          <p class="mt-1 text-danger">{!!$errors->first('gov_id_1')!!}</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="custom-file" id="customFile" style="margin-bottom: 2em">
                            <input type="file" class="custom-file-input" name="gov_id_2">
                            <label class="custom-file-label">Select file...</label>
                        </div>
                        @if($errors->first('gov_id_2'))
                          <p class="mt-1 text-danger">{!!$errors->first('gov_id_2')!!}</p>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_SITE_KEY') }}"></div>
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="invalid-feedback" style="display: block;">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <a href="{{route('web.register.revert')}}"class="btn btn-light text-title px-5 py-3 fs-14 mr-3"></i>Back</a>
                <button type="submit" class="btn secondary-solid-btn px-5 py-3 fs-14 float-right"><i class="fa fa-paper-plane pr-2"></i>Finish</button>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <!--team section end-->


@endsection

@push('page-styles')
<style type="text/css">
    .custom-file-label {
        height: 4em;
        padding-top: 18px;
        border-radius: 10px;
    }
    .custom-file-label::after {
        height: 3.9em;
        padding-top: 20px;
        background-color: #0038A8;
        color: #fff;
        content: "Choose File" !important;
        border-radius: 0 .50rem .50rem 0;
        cursor: pointer;
    }
    .custom-file-input{
        cursor: pointer;
    }
    .frm_form_field .grecaptcha-badge { 
          display:none;
        }
</style>
@endpush
@push('page-scripts')
<script src="https://www.google.com/recaptcha/api.js?render={{ env('CAPTCHA_SITE_KEY') }}"></script>
<script type="text/javascript">
    $(document).on('change', '.custom-file-input', function (event) {
        $(this).next('.custom-file-label').html(event.target.files[0].name);
    })
     function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('{{ env('CAPTCHA_SITE_KEY') }}', {action: 'submit'}).then(function(token) {
              // Add your logic to submit to your backend server here.
          });
        });
      }
</script>

@endpush