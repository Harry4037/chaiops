<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Chaiops::Admin</title>
        <!-- Icons-->
        <link href="{{ asset("css/free.min.css") }}" rel="stylesheet">
        <!-- Main styles for this application-->
        <link href="{{ asset("css/style.css") }}" rel="stylesheet">
        
        <link href="{{ asset("css/coreui-chartjs.css") }}" rel="stylesheet">
        @isset($css)
        @foreach($css as $cs)
        <link href="{{ asset($cs) }}" rel="stylesheet">
        @endforeach
        @endisset


        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>
            var site_url = "{{ url('/admin') }}";
            </script>
            <script type="text/javascript">
                var _baseUrl = "{{ URL::to('/') }}";
            </script>
        </head>


        <body class="c-app">
            @include('admin.layout.control-sidebar')
            <div class="c-wrapper">
                @include('admin.layout.header')

                <div class="c-body">

                    <!-- page content -->
                    <main class="c-main">
                        @yield('style')

                        @yield('content')
                    </main>
                    <!-- /page content -->

                    @include('admin.layout.footer')

                </div>
            </div>

            <!-- CoreUI and necessary plugins-->
            <script src="{{ asset("js/coreui.bundle.min.js") }}"></script>
            <script src="{{ asset("js/coreui-utils.js") }}"></script>

            <script src="{{ asset("js/Chart.min.js")}}"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" ></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js" ></script>
            <script src="{{ asset("js/bootbox.min.js") }}"></script> 
            @isset($js)
            @foreach($js as $js)
            <script src="{{ asset($js) }}"></script>
            @endforeach
            @endisset

            @yield('script')

            <script>

                //setup CSRF token for ajax forms
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                function showErrorMessage(msg) {
                    $(".msg").addClass("alert-danger");
                    $(".msg").html(msg);
                    $(".msg").fadeIn();
                    setTimeout(function () {
                        $(".msg").fadeOut();
                    }, 4000);
                }

                function showSuccessMessage(msg) {
                    $(".msg").addClass("alert-success");
                    $(".msg").html(msg);
                    $(".msg").fadeIn();
                    setTimeout(function () {
                        $(".msg").fadeOut();
                    }, 4000);
                }

                function deletePopup(title, message, record_id, url) {
                bootbox.confirm({
                    size: "small",
                    title: title,
                    message: "<i class=\"fa fa-exclamation-triangle\" style=\"color:red\"></i> " + message,
                    buttons: {
                        confirm: {
                            label: 'Confirm',
                            className: 'btn-danger',
                        },
                        cancel: {
                            label: 'No',
                        }
                    },
                    callback: function (result) {
                        if (result) {
                            $.ajax({
                                url: url,
                                type: 'post',
                                data: {id: record_id},
                                dataType: 'json',
                                // beforeSend: function () {
                                //     $(".overlay").show();
                                // },
                                success: function (res) {
                                    if (res.status)
                                    {
                                        t.draw();
                                        // $(".overlay").hide();
                                        showSuccessMessage(res.message);
                                    } else {
                                        // $(".overlay").hide();
                                        showErrorMessage(res.message);
                                    }
                                }
                            });
                        }
                    }
                });

            }
                setTimeout(function () {
                    $(".alert").fadeOut();
                }, 4000);
            </script>
        </body>
    </html>