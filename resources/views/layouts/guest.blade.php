<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ONLINE SHOP</title>

        <!-- Favicon icon -->
        <link rel="shortcut icon" href="{{env('APP_ROOT')}}assets/images/logo.png" type="image/x-icon">
        <link rel="icon" href="{{env('APP_ROOT')}}assets/images/logo.png" type="image/x-icon">

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{env('APP_ROOT')}}assets/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{env('APP_ROOT')}}assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{env('APP_ROOT')}}assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{env('APP_ROOT')}}assets/plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{env('APP_ROOT')}}assets/dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{env('APP_ROOT')}}assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{env('APP_ROOT')}}assets/plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="{{env('APP_ROOT')}}assets/plugins/summernote/summernote-bs4.min.css">
        <link rel="stylesheet" type="text/css" href="{{env('APP_ROOT')}}assets/dist/css/custom.css">

        @livewireStyles
    </head>

    <body class="login-content">
        {{ $slot }}
        
        <!-- jQuery -->
        <script src="{{env('APP_ROOT')}}assets/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{env('APP_ROOT')}}assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{env('APP_ROOT')}}assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="{{env('APP_ROOT')}}assets/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="{{env('APP_ROOT')}}assets/plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="{{env('APP_ROOT')}}assets/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="{{env('APP_ROOT')}}assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{env('APP_ROOT')}}assets/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="{{env('APP_ROOT')}}assets/plugins/moment/moment.min.js"></script>
        <script src="{{env('APP_ROOT')}}assets/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{env('APP_ROOT')}}assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="{{env('APP_ROOT')}}assets/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="{{env('APP_ROOT')}}assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{env('APP_ROOT')}}assets/dist/js/adminlte.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{env('APP_ROOT')}}assets/dist/js/pages/dashboard.js"></script>
        
        <script src="{{env('APP_ROOT')}}assets/dist/js/custom.js"></script>
        @livewireScripts
    </body>
</html>

