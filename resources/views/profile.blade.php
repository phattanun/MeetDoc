@extends('masterpage')

@section('profileNav')
    active
@endsection

@section('title')
    ข้อมูลส่วนตัว
@endsection

@section('pageLevelPluginsCSS')
    <link href="{{url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('pageLevelCSS')
    <link href="{{url('assets/pages/css/profile.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->
            <div class="profile-sidebar">
                <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet ">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="{{url('/assets/pages/media/profile/profile_user.jpg')}}" class="img-responsive" alt=""> </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"> นายกิตติภพ พละการ </div>
                        <div class="profile-usertitle-job"> ผู้ป่วย </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                    </div>
                    <!-- END MENU -->
                </div>
                <!-- END PORTLET MAIN -->
                <!-- PORTLET MAIN -->
                <div class="portlet light ">
                    <!-- STAT -->
                    <div class="row list-separated ">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="uppercase profile-stat-title"> 37 </div>
                            <div class="uppercase profile-stat-text"> ไปตามนัด </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="uppercase profile-stat-title"> 51 </div>
                            <div class="uppercase profile-stat-text"> เลื่อนนัด </div>
                        </div>
                    </div>
                    <div class="row list-separated ">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="uppercase profile-stat-title"> 37 </div>
                            <div class="uppercase profile-stat-text"> ยกเลิกนัด </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="uppercase profile-stat-title"> 51 </div>
                            <div class="uppercase profile-stat-text"> การนัดหมายทั้งหมด </div>
                        </div>
                    </div>
                    <!-- END STAT -->
                </div>
                <!-- END PORTLET MAIN -->
            </div>
            <!-- END BEGIN PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">แก้ไขข้อมูลส่วนตัว</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">ข้อมูลทั่วไป</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_2" data-toggle="tab">เปลี่ยนรูปภาพ</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">
                                        <form role="form" action="#">
                                            <div class="form-group">
                                                <label class="control-label">ชื่อ</label>
                                                <input type="text" placeholder="กรุณากรอกชื่อพร้อมคำนำหน้าชื่อ เช่น นายสุขภาพดี" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">นามสกุล</label>
                                                <input type="text" placeholder="กรุณากรอกนามสกุล" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">เบอร์โทรศัพท์</label>
                                                <input type="text" placeholder="0899999999" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Interests</label>
                                                <input type="text" placeholder="Design, Web etc." class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Occupation</label>
                                                <input type="text" placeholder="Web Developer" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">About</label>
                                                <textarea class="form-control" rows="3" placeholder="We are KeenThemes!!!"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Website Url</label>
                                                <input type="text" placeholder="http://www.mywebsite.com" class="form-control" /> </div>
                                            <div class="margiv-top-10">
                                                <a href="javascript:;" class="btn green"> Save Changes </a>
                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END PERSONAL INFO TAB -->
                                    <!-- CHANGE AVATAR TAB -->
                                    <div class="tab-pane" id="tab_1_2">
                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                            eiusmod. </p>
                                        <form action="#" role="form">
                                            <div class="form-group">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> Select image </span>
                                                                            <span class="fileinput-exists"> Change </span>
                                                                            <input type="file" name="..."> </span>
                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                    </div>
                                                </div>
                                                <div class="clearfix margin-top-10">
                                                    <span class="label label-danger">NOTE! </span>
                                                    <span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                                </div>
                                            </div>
                                            <div class="margin-top-10">
                                                <a href="javascript:;" class="btn green"> Submit </a>
                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END CHANGE AVATAR TAB -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>
@endsection

@section('pageLevelPluginsScript')
    <script src="{{url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
@endsection

@section('pageLevelScripts')
    <script src="{{url('assets/pages/scripts/profile.min.js')}}" type="text/javascript"></script>
@endsection

