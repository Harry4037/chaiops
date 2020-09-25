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
        <link rel="stylesheet" href="{{ asset("assets/styles/vendor.css")}}">
        <link rel="stylesheet" href="{{ asset("assets/styles/main.css")}}">
        <!-- <script src="/assets/scripts/vendor/modernizr.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <style>
            .pagination>.active>span {
                background-color: #dc8068 !important;
                border-color: #dc8068 !important;
            }

            .pagination>li>a {
                color: #337ab7;
            }
            .social-icons>.fa {
  padding: 10px;
  font-size: 30px;
  width: 60px;
  text-align: center;
  text-decoration: none; 
  
}
.fa:hover {
    opacity: 0.7;
    color:white; 

}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}
.fa-linkedin {
  background: #007bb5;
  color: white;
}
.fa-instagram {
   background: #ea4c89;
  color: white;
}
        </style>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>
var site_url = "{{ url('/admin') }}";
var _baseUrl = "{{ URL::to('/') }}";
        </script>
    </head>
    <body @if(in_array(Route::currentRouteName(), ['site.index']))
           {{ "class=home-page" }}
           @else
           {{ "class=menu-page inner-page" }}
           @endif>
<!--[if lt IE 10]> <p class="browsehappy">You are using an
<strong>outdated</strong> browser. Please <a
href="http://browsehappy.com/">upgrade your browser</a> to improve your
experience.</p> <![endif]-->
           <header>
            <div @if(in_array(Route::currentRouteName(), ['site.index']))
                  {{ "class=header-body" }}
                  @else
                  {{ "class=container" }}
                  @endif>
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


            <script src="{{ asset("assets/scripts/vendor_1.js")}}"></script>
                <script src="{{ asset("assets/scripts/plugins.js")}}"></script>
                <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
                <script src="{{ asset("assets/scripts/main_1.js")}}"></script>
                <script src="{{ asset("assets/js/notify.min.js")}}"></script>

                <script>

//setup CSRF token for ajax forms
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {

    $(document).on('click', '.addItemCart', function () {
        var product_id = $(this).data('id');
        var product_type_id =$( '.cuisine-heart'+ product_id ).val();
        $.ajax({
            url: _baseUrl + '/add-cart',
            type: 'post',
            data: {'product_id': product_id, 'product_type_id': product_type_id},
            beforeSend: function () {
//                $(".overlay").show();
            },
            success: function (res) {
                $("#cart_count").text(res.cart_count);
                $.notify(
                        "Item added to cart",
                        {className: "success"}
                );
            },
            error: function(data){
        alert("fail");
    }
        });
    });
});
                </script>


                </body>
                </html>