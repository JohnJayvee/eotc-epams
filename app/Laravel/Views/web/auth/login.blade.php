<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{$page_title}}</title>
  @include('web._components.styles')
  <style type="text/css">
    .auth .brand-logo img {width: 250px; }
    
  </style>
</head>
<body>
 <section class="hero-section ptb-100 full-screen gray-light-bg">
  <div class="container">
    <div class="card login-card">
      <div class="row no-gutters" style="height: 65vh;">
        <div class="col-md-6">
          <img src="{{asset('web/img/image-bg.png')}}" alt="login" class="login-card-img">
        </div>
        <div class="col-md-6">
          <div class="card-body">
            <h2 class="login-card-description m-0">Welcome To <span><img src="{{asset('web/img/peza-epams-small.png')}}" alt="logo" class="logo"></span> </h2>
            <p class="fw-600">Sign In to your Account</p>
            <form action="" method="POST" class="login-signup-form">
              {{ csrf_field() }}
              @include('web._components.notifications')
              <div class="form-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text text-title fw-600"><img src="{{asset('web/img/bx-envelope.svg')}}" alt="login"></span>
                  </div>
                  <input type="text" class="form-control br-left-white" name="email" placeholder="Email address" value="{{old('email')}}">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text text-title fw-600"><img src="{{asset('web/img/key.svg')}}" alt="login"></span>
                  </div>
                  <input type="password" id="password-field" class="form-control br-left-white" placeholder="Password" name="password">
                  <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" style="margin-top: 20px"></span>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <a href="#!" class="forgot-password-link float-right mb-3" style="color: #E50621">Forgot password?</a>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <button type="submit" class="btn btn-block sign-in-btn mb-4" type="button" value="Login" >Sign In</button>
                </div>
                <div class="col-md-6">
                  <a  href="{{route('web.register.index')}}" class="shadow btn btn-block sign-up-btn mb-4"> Sign Up</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
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
</html>
