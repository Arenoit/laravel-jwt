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
                <h2 class="title">Sistema <span class="d-block">de registro</span> <strong class="text--039D55">de usuarios....</strong></h2>
            </div>
        </div>
        <div class="auth-wrapper-right">
            <!-- Card -->
            <div class="auth-wrapper-form">
                <!-- Form -->
                <form class="" action="{{ route('signup') }}" method="post" id="form-id">
                    @csrf
                    <div class="auth-header">
                        <div class="mb-5">
                            <h2 class="title">Registro de usuario</h2>
                            <div>Bienvenido</div>
                        </div>
                    </div>

                    <!-- Form Group -->
                    <div class="js-form-message form-group">
                        <label class="input-label text-capitalize" for="signinSrEmail">Nombre</label>

                        <input type="text" class="form-control form-control-lg" name="name"
                                tabindex="1" placeholder="Tu nombre" value="" aria-label="name-register"
                                required data-msg="Porfavor ponga el nombre">
                    </div>
                    <!-- End Form Group -->

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