<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>ลงชื่อเข้าใช้</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{url('/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('/assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('/assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{url('assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
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
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="forget-form" action="{{ url('/password/reset') }}" method="post">

        {{ csrf_field() }}

        <h3 class="font-green">ลืมรหัสผ่าน ?</h3>
        @if(isset($success)&&$success)
            <div class="alert alert-success" id="password-reset-success-alert">
                <strong>สำเร็จ!</strong> ระบบได้ทำการส่งจดหมายเพื่อเปลี่ยนรหัสผ่านไปที่อีเมลของท่าน กรุณาทำการเปลี่ยนรหัสผ่านภายใน 1 วัน. </div>
        @elseif(isset($success)&&!$success)
            <div class="alert alert-danger" id="password-reset-alert">
                <strong>ผิดพลาด!</strong> กรุณาลองใหม่อีกครั้ง </div>
        @else
        @endif
        <p> กรุณากรอกรหัสบัตรประจำตัวชาชนของท่านเพื่อทำการกำหนดรหัสผ่านใหม่</p>
        <div class="form-group">
            <input class="form-control{{ $errors->has('id') ? ' has-error' : '' }} placeholder-no-fix" type="text" autocomplete="off" placeholder="รหัสบัตรประจำตัวประชาชน" name="id" value="{{ old('id') }}" />
            @if ($errors->has('id'))
                <span class="help-block">
                    <strong>{{ $errors->first('id') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-actions">
            <a href="{{url('login')}}" type="button" id="back-btn" class="btn green btn-outline">Back</a>
            <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
</div>
<div class="copyright">
    2016 © MeetDoc<sup>+</sup>
</div>
<script src="{{url('/assets/global/plugins/respond.min.js')}}"></script>
<script src="{{url('/assets/global/plugins/excanvas.min.js')}}"></script>
<script src="{{url('/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/global/plugins/jquery.input-ip-address-control-1.0.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/pages/scripts/form-input-mask.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/pages/scripts/login.min.js')}}" type="text/javascript"></script>
</body>

</html>
