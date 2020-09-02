
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
                                <form method="POST" action="{{ route('admin.login') }}">
                                    {{ csrf_field() }}
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg class="c-icon">
                                                <use xlink:href="{{ asset("assets/icons/coreui/free-symbol-defs.svg#cui-user")}}"></use>
                                                </svg>
                                            </span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="Email" name="email">
                                    </div>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg class="c-icon">
                                                <use xlink:href="{{ asset("assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked") }}"></use>
                                                </svg>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-primary px-4" type="submit">Login</button>
                                        </div>
                                </form>
                                <div class="col-6 text-right">
                                    <a href="#" class="btn btn-link px-0">Forgot Your Password?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
