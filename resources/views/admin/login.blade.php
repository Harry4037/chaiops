
<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version  v3.0.0-alpha.1
* @link  https://coreui.io
* Copyright (c) 2019 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Chaiops::Admin</title>
        <!-- Main styles for this application-->
        <link href="{{ asset("css/style.css") }}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js" ></script>
    </head>

    <body class="c-app flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card-group">
                        <div class="card p-4">
                            <div class="card-body">
                                <h1>Login</h1>
                                <p class="text-muted">Sign In to your account</p>
                                <form method="POST" action="{{ route('admin.login') }}" id="loginForm">
                                    {{ csrf_field() }}
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg class="c-icon">
                                                <use xlink:href="{{ asset("assets/icons/coreui/free-symbol-defs.svg#cui-user")}}"></use>
                                                </svg>
                                            </span>
                                        </div>
                                        <input style="width: 90%;" type="email" class="form-control" placeholder="Email" name="email">
                                    </div>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg class="c-icon">
                                                <use xlink:href="{{ asset("assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked") }}"></use>
                                                </svg>
                                            </span>
                                        </div>
                                        <input style="width: 90%;" type="password" class="form-control" placeholder="Password" name="password">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-primary px-4" type="submit">Login</button>
                                        </div>
                                        <div class="col-6 text-right">
                                            <a href="{{ route('admin.forget-password') }}" class="btn btn-link px-0">Forgot Your Password?</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
$(document).ready(function () {

    $("#loginForm").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            },
        },
//        errorElement: 'div',
    });
});
        </script>
        <style>
            .error{
                color: red;
            }
        </style>
    </body>
</html>
