<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
      
        <title>{{ config('site.name', 'Chaiops') }}</title>
      
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" href="/assets/styles/vendor.css">
        <link rel="stylesheet" href="/assets/styles/main.css">
        <script src="/assets/scripts/vendor/modernizr.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        </head>
        <body class="home-page">
            <!--[if lt IE 10]> <p class="browsehappy">You are using an
            <strong>outdated</strong> browser. Please <a
            href="http://browsehappy.com/">upgrade your browser</a> to improve your
            experience.</p> <![endif]-->
            <header>
                <div class="header-body">
              <!-- Header -->
              <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="brand">
                                    <a href="/">
                                        <p>SINCE 1939</p>
                                        <img src="/assets/images/logo.png" alt="Brand Logo" class="logo">
                                    </a>
                                </div>
                                <div class="navbar-header">
                                    <button
                                        type="button"
                                        class="navbar-toggle collapsed"
                                        data-toggle="collapse"
                                        data-target="#coffeeNavbarPrimary"
                                        aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <a href="/" class="header-logo">Coffee and You
                                    <img src="/assets/images/small-logo.png" alt="">
                                </a>
                                <div class="collapse navbar-collapse" id="coffeeNavbarPrimary">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="active">
                                            <a href="/">Home</a>
                                        </li>
                                        <li><a href=/about>About Us</a></li>
                                        <li>
                                            <a href="/menu">Menu</a>
                                        </li>
                                      
                                 
                                        <li>
                                            <a href="/store">store</a>
                                        </li>
                                        <li>
                                            <a href="/contact">Contact Us</a>
                                        </li>
                                        <li>
                                            <a href="/cart">Cart
                                                <i class="fa fa-shopping-cart">
                                                @if(session()->get('cart')) <span class="carttems">{{count(session()->get('cart'))}}</span>  @endif</i>
                                            </a>
                                        </li>
                                        @if(auth()->check())
                                        <li class="button-order-now">
                                            <a href="/dashboard">{{ auth()->user()->name }}</a>
                                        </li>
                                        @else
                                        <li class="button-order-now">
                                            <a href="/signin">Login / Sign Up</a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>

  
  <!-- Content Wrapper. Contains page content -->

  @yield('content')
              <!-- Footer -->
    @include('layout.footer')
    
  <!--=======================================
        All Jquery Script link
  ===========================================-->

  @yield('script')

<script>

//setup CSRF token for ajax forms
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
            <script src="/assets/scripts/vendor.js"></script>
            <script src="/assets/scripts/plugins.js"></script>
            <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
            <script src="/assets/scripts/main.js"></script>
           
            </body>
</html>