<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
    @yield('pageLevelPluginsCSS')
    <link href="{{url('assets/global/plugins/bootstrap-toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{url('assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
    @yield('pageLevelCSS')
    <link href="{{url('assets/layouts/layout2/css/layout.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/layouts/layout2/_layout-font-rewrite.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/layouts/layout2/css/themes/light.css')}}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{url('assets/layouts/layout2/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="favicon.ico" /> </head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <div class="page-logo">
            <a href="{{url('/')}}">
                <img src="{{url('assets/layouts/layout2/img/logo-default.png')}}" alt="logo" class="logo-default" /> </a>
            <div class="menu-toggler sidebar-toggler">
            </div>
        </div>
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <div class="page-actions">
            <h1 class="page-title">@yield('title-inside')
            </h1>
        </div>
        <div class="page-top">
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="@if($_user['image']==""){{url('\assets\pages\img\avatars\placeholder.jpg')}}@else{{$_user['image']}}@endif" />
                                <span class="username username-hide-on-mobile"> {{ $_user->name }} @if($_user->staff) @if($_user->role=='Patient')(ผู้ป่วย)@elseif($_user->role=='Staff')(บุคลากร)@endif @endif</span>
                            @if($_user->staff)
                                <i class="fa fa-angle-down"></i>
                            @else
                                <i></i>
                            @endif
                        </a>
                        @if($_user->staff)
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="{{ url('swapRole') }}">
                                        @if($_user->role=='Patient')
                                            <i class="fa fa-user" style="margin-right: 0px"></i><i class="fa fa-long-arrow-right" style="margin-right: 0px"></i><i class="fa fa-user-md"></i> เปลี่ยนเป็นบุคลากร </a>
                                        @elseif($_user->role=='Staff')
                                            <i class="fa fa-user-md" style="margin-right: 0px"></i><i class="fa fa-long-arrow-right" style="margin-right: 0px"></i><i class="fa fa-user"></i> เปลี่ยนเป็นผู้ป่วย </a>
                                        @endif
                                </li>
                            </ul>
                        @endif
                    </li>
                    <li class="dropdown dropdown-user">
                        <a href="{{ url('logout') }}" class="dropdown-toggle">
                            <i class="icon-logout"></i>
                            <span> ออกจากระบบ </span>
                            <i></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"> </div>
<div class="page-container">
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="nav-item @yield('profileNav')">
                    <a href="{{url('/profile')}}" class="nav-link nav-toggle">
                        <i class="icon-user"></i>
                        <span class="title">ขัอมูลส่วนตัว</span>
                    </a>
                </li>
                @if(Session::get('_role')=='Patient')
                    @include('sidebar.patient')
                @elseif(Session::get('_role')=='Staff')
                    @if($_user['p_nurse']||$_user['p_doctor']||$_user['p_pharm'])
                        <li class="nav-item  @yield('queueNav')">
                            <a href="{{url('/queue')}}" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">จัดการคิว</span>
                            </a>
                        </li>
                    @endif
                    @if($_user['p_officer'])
                        @include('sidebar.officer')
                    @endif
                    @if($_user['p_doctor'])
                        @include('sidebar.doctor')
                    @endif
                    @if($_user['p_pharm'])
                        @include('sidebar.pharmacist')
                    @endif
                    @if($_user['p_admin'])
                        @include('sidebar.admin')
                    @endif
                @endif

            </ul>
        </div>
    </div>
    <div class="page-content-wrapper">
        <div class="page-content">
            @yield('content')
        </div>
    </div>
</div>
<div class="page-footer">
    <div class="page-footer-inner">2016 &copy; MeetDoc<sup>+</sup>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!--[if lt IE 9]>
    <script src="{{url('assets/global/plugins/respond.min.js')}}"></script>
    <script src="{{url('assets/global/plugins/excanvas.min.js')}}"></script>
    <![endif]-->
    <script src="{{url('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
    @yield('pageLevelPluginsScript')
    <script src="{{url('assets/global/plugins/bootstrap-toastr/toastr.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/jquery.form.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
    @yield('pageLevelScripts')
    <script src="{{url('assets/pages/scripts/ui-toastr.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/layouts/layout2/scripts/layout.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/layouts/layout2/scripts/demo.min.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "positionClass": "toast-top-right",
                "onclick": null,
                "showDuration": "1000",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        });
    </script>
</div>
</body>

</html>
