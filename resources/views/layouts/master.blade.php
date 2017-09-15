<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html ng-app="takengo" lang="en">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>Takengo Admin</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Admin site of takengo" name="description" />
        <meta content="" name="author" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{asset('css/plugins/slim.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/build.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/login.css')}}" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body ng-controller="mainController" class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-md">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a style="text-decoration:none" href="{{url('/')}}">
                        <h3 class="logo-default" style="height:50px;width:135px;font-weight:500;color:#FFFFFF;margin-top:20px">TAKE N GO</h3>   
                    </a>
                    <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN PAGE TOP -->
                @component('components.shared.header')
                @endcomponent
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- END SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                @component('components.shared.sidebar')
                @endcomponent
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                   @yield('content')
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2017 &copy; Takengo By
                <a target="_blank" href="https://takengo.io">Frankenayulong</a>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <!-- END FOOTER -->
            <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCk4jGn1h6CtPzKYczwwvv5IwEgomxgmwA"></script>
            <script src="{{asset('js/env.js')}}" type="text/javascript"></script>
            <script src="{{asset('js/build-min.js')}}" type="text/javascript"></script>
            <script src="{{asset('js/master-min.js')}}" type="text/javascript"></script>
            <script src="{{asset('js/login-min.js')}}" type="text/javascript"></script>
            <script src="{{ URL::asset('app/lib/angular/angular.min.js')}}"></script>
            <script src="{{ URL::asset('app/lib/slim/slim.angular.js')}}"></script>
            <script src="{{ URL::asset('app/lib/ngMap/ng-map.min.js')}}"></script>
            <script src="{{ URL::asset('app/lib/slim/slim.angular.js')}}"></script>
            <script src="{{ URL::asset('app/lib/angular/angular-cookies.min.js')}}"></script>
            <script src="{{ URL::asset('app/app.js')}}"></script>
            <script src="{{ URL::asset('app/controllers/cars.js') }}"></script>
            <script src="{{ URL::asset('app/controllers/newsletter.js') }}"></script>
            <script src="{{ URL::asset('app/controllers/messages.js') }}"></script>
            <script src="{{ URL::asset('app/controllers/users.js') }}"></script>
            <script src="{{ URL::asset('app/controllers/admins.js') }}"></script>
            <script src="{{ URL::asset('app/controllers/orders.js') }}"></script>
            <script src="{{ URL::asset('app/controllers/home.js') }}"></script>
    </body>

</html>