@extends('web._layouts.guest')


@section('content')
  {{ Session::put('current_progress', 1) }}

  <div class="tw-h-screen tw-flex tw-overflow-hidden tw-bg-white">
    @include('web._components.sidebar-signup')

    <!--team section start-->
    <div class="tw-flex tw-flex-col tw-w-0 tw-flex-1 tw-overflow-y-auto">
      <section>
        <div class="container" style="margin-top: 5em">
          <div class="card login-signup-form" style="border-radius: 8px;">
            <div class="card-body">
              <h3 class=" pb-3">Sign Up</h3>
              <h1 class="text-title fs-15">Account Information</h1>
              <form method="POST" action="" enctype="multipart/form-data"
                id="msform">
                {!! csrf_field() !!}
                <!-- progressbar -->
                <div class="row">
                  <div class="col-md-3">
                    <h4 class="pt-3">Account Type</h4>
                  </div>
                  <div class="col-md-9">
                    <div class="form-group">
                      <div class="radio-item" style="padding-right: 5em">
                        <input type="radio" id="rbtn_1" name="account_type"
                          value="new_user" @if (old('account_type') == 'new_user' || Session::get('registration.account_type') == 'new_user') checked @endif>
                        <label for="rbtn_1">New User</label>
                      </div>
                      <div class="radio-item">
                        <input type="radio" id="rbtn_2" name="account_type"
                          value="existing_user" @if (old('account_type') == 'existing_user' || Session::get('registration.account_type') == 'existing_user') checked @endif>
                        <label for="rbtn_2">Add Profile to existing account</label>
                      </div>
                      @if ($errors->first('account_type'))
                        <p class="mt-1 text-danger">{!! $errors->first('account_type') !!}</p>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-lg-12 ">
                    <div class="form-group">
                      <label class="text-form pb-2 fw-600">Username <span style="color: red">*</span></label>
                      <input type="username"
                        class="form-control form-control-lg {{ $errors->first('username') ? 'is-invalid' : null }}"
                        name="username" placeholder="username"
                        value="{{ old('username', Session::get('registration.username')) }}">
                      @if ($errors->first('username'))
                        <small class="form-text pl-1"
                          style="color:red;">{{ $errors->first('username') }}</small>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                      <label class="text-form pb-2 fw-600">Password <span style="color: red">*</span></label>
                      <input type="password" class="form-control form-control-lg"
                        name="password" placeholder="*************"
                        id="password-field">
                      <span toggle="#password-field"
                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                      @if ($errors->first('password'))
                        <small class="form-text pl-1"
                          style="color:red;">{{ $errors->first('password') }}</small>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                      <label class="text-form pb-2 fw-600">Confirm Password <span style="color: red">*</span></label>
                      <input type="password" class="form-control form-control-lg"
                        id="password_confirmation" name="password_confirmation"
                        placeholder="*************">
                      <span toggle="#password_confirmation"
                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-lg-12 ">
                    <div class="form-group">
                      <label class="text-form pb-2 fw-600">Email <span style="color: red">*</span></label>
                      <input type="email"
                        class="form-control form-control-lg {{ $errors->first('email') ? 'is-invalid' : null }}"
                        name="email" placeholder="username@email.com"
                        value="{{ old('email', Session::get('registration.email')) }}">
                      @if ($errors->first('email'))
                        <small class="form-text pl-1"
                          style="color:red;">{{ $errors->first('email') }}</small>
                      @endif
                    </div>
                  </div>
                </div>
                
                <p class="text-title fw-600">Please Take note of your email address and password used</p>
                <a href="{{route('web.login')}}" class="btn btn-light px-5 py-3 fs-14"> Cancel</a>
                <button type="submit" class="btn secondary-solid-btn px-5 py-3 fs-14 float-right"><i class="fa fa-paper-plane pr-2"></i>Next</button>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <!--team section end-->
  <div id="gwt-standard-footer"></div>

@endsection

@push('page-styles')
  <style type="text/css">
    .field-icon {
      margin-top: -38px !important;
    }

  </style>
@endpush

@push('page-scripts')
  <script type="text/javascript">
   
    $(".toggle-password").click(function() {
      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
   
  </script>

@endpush
