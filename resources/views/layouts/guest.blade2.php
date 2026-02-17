<!DOCTYPE html>
<html lang="en">

    <head>
        <title>ONLINE SHOP</title>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <!-- Favicon icon -->
        <link rel="shortcut icon" href="{{env('APP_ROOT')}}assets/images/logo.png" type="image/x-icon">
        <link rel="icon" href="{{env('APP_ROOT')}}assets/images/logo.png" type="image/x-icon">

        <!-- Google font-->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">
        <!-- themify -->
        <link rel="stylesheet" type="text/css" href="{{env('APP_ROOT')}}assets/icon/themify-icons/themify-icons.css">
        <!-- iconfont -->
        <link rel="stylesheet" type="text/css" href="{{env('APP_ROOT')}}assets/icon/icofont/css/icofont.css">
        <!-- simple line icon -->
        <link rel="stylesheet" type="text/css" href="{{env('APP_ROOT')}}assets/icon/simple-line-icons/css/simple-line-icons.css">
        <!-- Required Fremwork -->
        <link rel="stylesheet" type="text/css" href="{{env('APP_ROOT')}}assets/plugins/bootstrap/css/bootstrap.min.css">
        <!-- Chartlist chart css -->
        <link rel="stylesheet" href="{{env('APP_ROOT')}}assets/plugins/chartist/dist/chartist.css" type="text/css" media="all">
        <!-- Weather css -->
        <link href="{{env('APP_ROOT')}}assets/css/svg-weather.css" rel="stylesheet">
        <!-- Style.css -->
        <link rel="stylesheet" type="text/css" href="{{env('APP_ROOT')}}assets/css/main.css">
        <!-- Responsive.css-->
        <link rel="stylesheet" type="text/css" href="{{env('APP_ROOT')}}assets/css/responsive.css">
        <link rel="stylesheet" type="text/css" href="{{env('APP_ROOT')}}assets/css/custom.css">

        @livewireStyles
    </head>

    <body class="sidebar-mini fixed">
        <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
            <div class="container-fluid">
                {{ $slot }}
            </div>
        </section>
    
        <!-- Required Jqurey -->
        <script src="{{env('APP_ROOT')}}assets/plugins/Jquery/dist/jquery.min.js"></script>
        <script src="{{env('APP_ROOT')}}assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="{{env('APP_ROOT')}}assets/plugins/tether/dist/js/tether.min.js"></script>

        <!-- Required Fremwork -->
        <script src="{{env('APP_ROOT')}}assets/plugins/bootstrap/js/bootstrap.min.js"></script>

        <!-- Scrollbar JS-->
        <script src="{{env('APP_ROOT')}}assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="{{env('APP_ROOT')}}assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js"></script>

        <!--classic JS-->
        <script src="{{env('APP_ROOT')}}assets/plugins/classie/classie.js"></script>

        <!-- notification -->
        <script src="{{env('APP_ROOT')}}assets/plugins/notification/js/bootstrap-growl.min.js"></script>

        <!-- Sparkline charts -->
        <script src="{{env('APP_ROOT')}}assets/plugins/jquery-sparkline/dist/jquery.sparkline.js"></script>

        <!-- Counter js  -->
        <script src="{{env('APP_ROOT')}}assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="{{env('APP_ROOT')}}assets/plugins/countdown/js/jquery.counterup.js"></script>

        <!-- Echart js -->
        <script src="{{env('APP_ROOT')}}assets/plugins/charts/echarts/js/echarts-all.js"></script>

        <script src="{{env('APP_ROOT')}}https://code.highcharts.com/highcharts.js"></script>
        <script src="{{env('APP_ROOT')}}https://code.highcharts.com/modules/exporting.js"></script>
        <script src="{{env('APP_ROOT')}}https://code.highcharts.com/highcharts-3d.js"></script>

        <!-- custom js -->
        <script type="text/javascript" src="{{env('APP_ROOT')}}assets/js/main.min.js"></script>
        <script type="text/javascript" src="{{env('APP_ROOT')}}assets/pages/dashboard.js"></script>
        <script type="text/javascript" src="{{env('APP_ROOT')}}assets/pages/elements.js"></script>
        <script src="{{env('APP_ROOT')}}assets/js/menu.min.js"></script>
        <script src="{{env('APP_ROOT')}}assets/js/custom.js"></script>
        <script>
            var $window = $(window);
            var nav = $('.fixed-button');
            $window.scroll(function(){
                if ($window.scrollTop() >= 200) {
                nav.addClass('active');
                }
                else {
                nav.removeClass('active');
                }
            });
        </script>

        @livewireScripts
    </body>
</html>

