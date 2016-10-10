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
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="{{ url('/login') }}" method="post">
        {{ csrf_field() }}

        <h3 class="form-title font-green">ลงชื่อเข้าใช้</h3>
        @if (isset($error))
            <h4> {{ $error }} </h4>
        @endif
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> กรุณากรอกเลขบัตรประจำตัวประชาชนและรหัสผ่าน </span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">เลขบัตรประจำตัวประชาชน</label>
            <input class="form-control{{ $errors->has('email') ? ' has-error' : '' }} form-control-solid placeholder-no-fix" id="id" type="text" autocomplete="off" placeholder="รหัสบัตรประจำตัวประชาชน" name="id" />
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">รหัสผ่าน</label>
            <input class="form-control{{ $errors->has('password') ? ' has-error' : '' }} form-control-solid placeholder-no-fix" id="password" type="password" autocomplete="on" placeholder="รหัสผ่าน" name="password" />
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-actions">
            <button type="submit" class="btn green uppercase">เข้าสู่ระบบ</button>
            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="remember" value="1" />จำฉันไว้ในระบบ
                <span></span>
            </label>
            <a href="javascript:;" id="forget-password" class="forget-password">ลืมรหัสผ่าน?</a>
        </div>
        <div class="create-account">
            <p>
                <a href="javascript:;" id="register-btn" class="uppercase">ลงทะเบียน</a>
            </p>
        </div>
    </form>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="forget-form" action="{{ url('/password/email') }}" method="post">

        {{ csrf_field() }}

        <h3 class="font-green">ลืมรหัสผ่าน ?</h3>
        <p> กรุณากรอกรหัสบัตรประจำตัวชาชนของท่านเพื่อทำการกำหนดรหัสผ่านใหม่ </p>
        <div class="form-group">
            <input class="form-control{{ $errors->has('email') ? ' has-error' : '' }} placeholder-no-fix" type="text" autocomplete="off" placeholder="รหัสบัตรประจำตัวประชาชน" name="id" value="{{ old('email') }}" />
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn green btn-outline">Back</button>
            <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
    <!-- BEGIN REGISTRATION FORM -->
    <form class="register-form" action="{{ url('/register') }}" method="post">
        {{ csrf_field() }}

        <h3 class="font-green">ลงทะเบียน</h3>
        <p class="hint"> กรุณาระบุข้อมูลต่อไปนี้: </p>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">รหัสบัตรประจำตัวประชาชน</label>
            <input class="form-control{{ $errors->has('id') ? ' has-error' : '' }} placeholder-no-fix" id="id" type="text" placeholder="รหัสบัตรประจำตัวประชาชน" name="id" value="{{ old('id') }}" />
            @if ($errors->has('id'))
                <span class="help-block">
                    <strong>{{ $errors->first('id') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">ชื่อ</label>
            <input class="form-control{{ $errors->has('name') ? ' has-error' : '' }} placeholder-no-fix" id="name" type="text" placeholder="ชื่อ" name="name" value="{{ old('name') }}" />
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">นามสกุล</label>
            <input class="form-control{{ $errors->has('surname') ? ' has-error' : '' }} placeholder-no-fix" id="surname" type="text" placeholder="นามสกุล" name="surname" value="{{ old('surname') }}" />
            @if ($errors->has('surname'))
                <span class="help-block">
                    <strong>{{ $errors->first('surname') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <div class="row">
            <label class="col-md-2 control-label">เพศ</label>
            <div class="col-md-10">
                <div class="mt-radio-inline">
                    <label class="mt-radio">
                        <input name="gender" type="radio" id="optionsRadios25" value="male" checked> ชาย
                        <span></span>
                    </label>
                    <label class="mt-radio">
                        <input name="gender"  type="radio" id="optionsRadios26" value="female" checked> หญิง
                        <span></span>
                    </label>
                </div>
            </div>
                </div>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">วันเกิด</label>
            <input class="form-control{{ $errors->has('birthday') ? ' has-error' : '' }} placeholder-no-fix" id="mask_date2" type="text" placeholder="วันเกิด" name="birthday" />
            @if ($errors->has('birthday'))
                <span class="help-block">
                    <strong>{{ $errors->first('birthday') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">อีเมล</label>
            <input class="form-control{{ $errors->has('email') ? ' has-error' : '' }} placeholder-no-fix" id="email"  type="text" placeholder="อีเมล" name="email" />
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">ที่อยู่</label>
            <textarea class="form-control{{ $errors->has('address') ? ' has-error' : '' }} placeholder-no-fix" id="address" style="height: 100px;"  placeholder="ที่อยู่" name="address" ></textarea>
            @if ($errors->has('address'))
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">หมายเลขโทรศัพท์เคลื่อนที่</label>
            <input class="form-control{{ $errors->has('phone') ? ' has-error' : '' }} placeholder-no-fix" id="mask_number"  type="text" placeholder="หมายเลขโทรศัพท์เคลื่อนที่" name="phone" />
            @if ($errors->has('phone'))
                <span class="help-block">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-actions">
            <button type="button" id="register-back-btn" class="btn green btn-outline">ย้อนกลับ</button>
            <button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">สมัครสมาชิก</button>
        </div>
    </form>
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
