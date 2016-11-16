<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>ทำรายการไม่สำเร็จ</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <link href="{{url('/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{url('/assets/pages/css/login.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/layouts/layout2/_layout-font-rewrite.css')}}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->

<body class=" login">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="{{url('/')}}">
        <img src="{{url('/assets/pages/img/logo-big-meetdoc.png')}}" alt="" /> </a>
</div>
<!-- END LOGO -->
<div class="content">
    <div class="text-center">
        @if(isset($link)) <a href="{{ url($link) }}"> @endif
        @if(isset($title)) <h3 class="form-title font-red margin-top-40"><div class="fa fa-times-circle margin-bottom-40" style="font-size: 70px"></div><br>{{ $title }}</h3> @endif
        @if(isset($link)) </a> @endif
        <div class="caption text-center">
            @if(isset($message))
                <span class="caption-subject font-red sbold uppercase">{{ $message }}</span>
            @endif
            <br>
            @if(isset($action))
                <span class="caption-subject font-red sbold uppercase">{{ $action }}</span>
            @endif
        </div>
        <br>
        <a href="{{ url('') }}" type="button" id="register-back-btn" class="btn green btn-outline" style="text-align:center">กลับสู่หน้าหลัก</a>
    </div>
</div>
<div class="copyright">
    2016 © MeetDoc<sup>+</sup>
</div>
</body>

</html>
