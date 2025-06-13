@extends('layouts.landing.app')
@section('content')
<?php
    $log_email_succ = session()->get('log_email_succ');
?>
<body>
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" class="main">
    <div class="auth-wrapper">
        <div class="auth-wrapper-left">
            <div class="auth-left-cont">
                <h2 class="title">Ofrecemos <span class="d-block">seguridad</span> <strong class="text--039D55">a los usuarios....</strong></h2>
            </div>
        </div>
        <div class="auth-wrapper-right">
            <!-- Card -->
            <div class="auth-wrapper-form">
                <!-- Form -->
                <form class="" action="{{ route('signin') }}" method="post" id="form-id">
                    @csrf
                    <div class="auth-header">
                        <div class="mb-5">
                            <h2 class="title">Inicio de usuario</h2>
                            <div>Bienvenido</div>
                        </div>
                    </div>

                    <!-- Form Group -->
                    <div class="js-form-message form-group">
                        <label class="input-label text-capitalize" for="signinSrEmail">Correo electrónico</label>

                        <input type="email" class="form-control form-control-lg" name="email" id="signinSrEmail"
                                tabindex="1" placeholder="email@address.com" value="{{ old('email') }}" aria-label="email@address.com"
                                required data-msg="Porfavor ponga el correo electrónico">
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="js-form-message form-group mb-2">
                        <label class="input-label" for="signupSrPassword" tabindex="0">
                            <span class="d-flex justify-content-between align-items-center">
                                Constraseña
                            </span>
                        </label>

                        <div class="input-group input-group-merge">
                            <input type="password" class="js-toggle-password form-control form-control-lg"
                                    name="password" id="signupSrPassword" placeholder="Constraseña mayor a 6 carácteres" value=""
                                    aria-label="Constraseña mayor a 6 carácteres" required
                                    data-msg="Contrseña inválida"
                                    data-hs-toggle-password-options='{
                                                "target": "#changePassTarget",
                                    "defaultClass": "tio-hidden-outlined",
                                    "showClass": "tio-visible-outlined",
                                    "classChangeTarget": "#changePassIcon"
                                    }'>
                            <div id="changePassTarget" class="input-group-append">
                                <a class="input-group-text" href="javascript:">
                                    <i id="changePassIcon" class="tio-visible-outlined"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <div class="d-flex justify-content-between mt-5">
                        <!-- Checkbox -->
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="termsCheckbox"
                                        name="remember">
                                <label class="custom-control-label text-muted" for="termsCheckbox">
                                    Recordámelo
                                </label>
                            </div>
                        </div>
                        <!-- End Checkbox -->
                        <!-- forget password -->
                        <div class="form-group" id="forget-password">
                            <div class="custom-control">
                                <span type="button" data-toggle="modal" class="text-primary" data-target="#forgetPassModal">¿Olvidades la contraseña?</span>
                            </div>
                        </div>
                        <!-- End forget password -->
                    </div>

                    <button type="submit" class="btn btn-lg btn-block btn--primary mt-xxl-3">Login</button>
                </form>
            </div>
            <!-- End Card -->

        </div>
    </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->
<div class="modal fade" id="forgetPassModal" style="z-index: 9999;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header justify-content-end">
        <span type="button" class="close-modal-icon" data-dismiss="modal">
            <i class="tio-clear"></i>
        </span>
      </div>
      <div class="modal-body">
        <div class="forget-pass-content">
            <img src="{{asset('/public/assets/admin/img/send-mail.svg')}}" alt="">
            <!-- After Succeed -->
            <!-- <img src="{{asset('/public/assets/admin/img/sent-mail.svg')}}" alt=""> -->
            <h4>
                ¿Enviarme un correo?
            </h4>
            <p>
                Enviarme un correo para cambiar la contraseña
            </p>
            <a class="btn btn-lg btn-block btn--primary mt-3" href="###">
                Enviarme un correo
            </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="forgetPassModal1" style="z-index: 9999;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header justify-content-end">
        <span type="button" class="close-modal-icon" data-dismiss="modal">
            <i class="tio-clear"></i>
        </span>
      </div>
      <div class="modal-body">
        <div class="forget-pass-content">
            <img src="{{asset('/public/assets/admin/img/send-mail.svg')}}" alt="">
            <!-- After Succeed -->
            <!-- <img src="{{asset('/public/assets/admin/img/sent-mail.svg')}}" alt=""> -->
            <h4>
                ¿Enviarme un correo?
            </h4>
            <form class="" action="###" method="post">
                @csrf

                <input type="email" name="email" id="" class="form-control" placeholder="Pon el correo con el que te registraste" required>
                <button type="submit" class="btn btn-lg btn-block btn--primary mt-3">Enviar email</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="successMailModal" style="z-index: 9999;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header justify-content-end">
          <span type="button" class="close-modal-icon" data-dismiss="modal">
              <i class="tio-clear"></i>
          </span>
        </div>
        <div class="modal-body">
          <div class="forget-pass-content">
              <!-- After Succeed -->
              <img src="{{asset('/public/assets/admin/img/sent-mail.svg')}}" alt="">
              <h4>
                ¡Un correo ha sido enviado por tu registrarte!
              </h4>
              <p>
                Click el link in en la descripción de correo para cambiar la contraseña
              </p>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- JS Implementing Plugins -->
<script src="{{asset('public/assets/admin')}}/js/vendor.min.js"></script>

<!-- JS Front -->
<script src="{{asset('public/assets/admin')}}/js/theme.min.js"></script>
<script src="{{asset('public/assets/admin')}}/js/toastr.js"></script>
{!! Toastr::message() !!}

@if ($errors->any())
    <script>
        "use strict";
        @foreach($errors->all() as $error)
        toastr.error('{{translate($error)}}', Error, {
            CloseButton: true,
            ProgressBar: true
        });
        @endforeach
    </script>
@endif
@if ($log_email_succ)
@php(session()->forget('log_email_succ'))
    <script>
        "use strict";
        $('#successMailModal').modal('show');
    </script>
@endif

<script>
    "use strict";
    // $("#forget-password").hide();
        $("#role-select").change(function() {
            var selectValue = $(this).val();
            if (selectValue == "admin") {
            $("#forget-password").show();
            $("#forget-password1").hide();
            } else if(selectValue == "vendor") {
            $("#forget-password").hide();
            $("#forget-password1").show();
            }
            else {
            $("#forget-password").hide();
            $("#forget-password1").hide();
            }
        });

    $(document).on('ready', function () {
        // INITIALIZATION OF SHOW PASSWORD
        // =======================================================
        $('.js-toggle-password').each(function () {
            new HSTogglePassword(this).init()
        });

        // INITIALIZATION OF FORM VALIDATION
        // =======================================================
        $('.js-validate').each(function () {
            $.HSCore.components.HSValidation.init($(this));
        });
    });


    $(document).ready(function() {
        $('.onerror-image').on('error', function() {
            let img = $(this).data('onerror-image')
            $(this).attr('src', img);
        });
    });
</script>

<!-- IE Support -->
<script>
    if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="{{asset('public//assets/admin')}}/vendor/babel-polyfill/polyfill.min.js"><\/script>');
</script>
@endsection