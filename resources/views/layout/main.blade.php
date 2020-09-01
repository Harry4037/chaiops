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
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" href="/assets/styles/vendor.css">
        <link rel="stylesheet" href="/assets/styles/main.css">
        <script src="/assets/scripts/vendor/modernizr.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     

        </head>
        <body class="menu-page inner-page">
            <!--[if lt IE 10]> <p class="browsehappy">You are using an
            <strong>outdated</strong> browser. Please <a
            href="http://browsehappy.com/">upgrade your browser</a> to improve your
            experience.</p> <![endif]-->
            <header>
         <div class=container>
              <!-- Header -->
  @include('layout.header')

  
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