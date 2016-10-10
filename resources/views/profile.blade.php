@extends('masterpage')

@section('profileNav')
    active
@endsection

@section('title')
    ข้อมูลส่วนตัว
@endsection
@section('title-inside')
    ข้อมูลส่วนตัว
@endsection

@section('pageLevelPluginsCSS')
    <link href="{{url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
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
                                            <div class="form-group form-md-line-input">
                                                <div class="form-control form-control-static"> 5631011021 </div>
                                                <label for="form_control_1">เลขบัตรประจำตัวโรงพยาบาล</label>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <div class="form-control form-control-static"> 1959800098399 </div>
                                                <label for="form_control_1">เลขบัตรประจำตัวประชาชน</label>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="control-label">ชื่อ</label>
                                                <input type="text" placeholder="กรุณากรอกชื่อพร้อมคำนำหน้าชื่อ เช่น นายสุขภาพดี" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">นามสกุล</label>
                                                <input type="text" placeholder="กรุณากรอกนามสกุล" class="form-control" /> </div>
                                            <div class="form-group">
                                                    <label class="control-label">เพศ</label>
                                                        <div class="mt-radio-inline">
                                                        <label class="mt-radio">
                                                            <input name="optionsRadios" id="optionsRadios25" value="male" checked="" type="radio"> ชาย
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input name="optionsRadios" id="optionsRadios26" value="female" checked="" type="radio"> หญิง
                                                            <span></span>
                                                        </label>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">วันเกิด</label>
                                                <input class="form-control" id="mask_date2" type="text"  placeholder="วว/ดด/ปปปป" />
                                                <span class="help-block"> * ใช้ปีพุทธศักราช </span>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">อีเมล</label>
                                                <input type="email" placeholder="john.doe@meetdoc.com" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">ที่อยู่</label>
                                                <textarea type="text" placeholder="กรุณากรอกที่อยู่" class="form-control" rows="3" ></textarea> </div>
                                            <div class="form-group">
                                                <label class="control-label">หมายเลขโทรศัพท์</label>
                                                <input type="text" placeholder="0899999999" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">ประวัติการแพ้ยา</label>
                                                <select id="multiple" class="form-control select2-multiple" multiple>
                                                    <optgroup label="Alaskan">
                                                        <option value="AK">Alaska</option>
                                                        <option value="HI" disabled="disabled">Hawaii</option>
                                                    </optgroup>
                                                    <optgroup label="Pacific Time Zone">
                                                        <option value="CA">California</option>
                                                        <option value="NV">Nevada</option>
                                                        <option value="OR">Oregon</option>
                                                        <option value="WA">Washington</option>
                                                    </optgroup>
                                                    <optgroup label="Mountain Time Zone">
                                                        <option value="AZ">Arizona</option>
                                                        <option value="CO">Colorado</option>
                                                        <option value="ID">Idaho</option>
                                                        <option value="MT">Montana</option>
                                                        <option value="NE">Nebraska</option>
                                                        <option value="NM">New Mexico</option>
                                                        <option value="ND">North Dakota</option>
                                                        <option value="UT">Utah</option>
                                                        <option value="WY">Wyoming</option>
                                                    </optgroup>
                                                    <optgroup label="Central Time Zone">
                                                        <option value="AL">Alabama</option>
                                                        <option value="AR">Arkansas</option>
                                                        <option value="IL">Illinois</option>
                                                        <option value="IA">Iowa</option>
                                                        <option value="KS">Kansas</option>
                                                        <option value="KY">Kentucky</option>
                                                        <option value="LA">Louisiana</option>
                                                        <option value="MN">Minnesota</option>
                                                        <option value="MS">Mississippi</option>
                                                        <option value="MO">Missouri</option>
                                                        <option value="OK">Oklahoma</option>
                                                        <option value="SD">South Dakota</option>
                                                        <option value="TX">Texas</option>
                                                        <option value="TN">Tennessee</option>
                                                        <option value="WI">Wisconsin</option>
                                                    </optgroup>
                                                    <optgroup label="Eastern Time Zone">
                                                        <option value="CT">Connecticut</option>
                                                        <option value="DE">Delaware</option>
                                                        <option value="FL">Florida</option>
                                                        <option value="GA">Georgia</option>
                                                        <option value="IN">Indiana</option>
                                                        <option value="ME">Maine</option>
                                                        <option value="MD">Maryland</option>
                                                        <option value="MA">Massachusetts</option>
                                                        <option value="MI">Michigan</option>
                                                        <option value="NH">New Hampshire</option>
                                                        <option value="NJ">New Jersey</option>
                                                        <option value="NY">New York</option>
                                                        <option value="NC">North Carolina</option>
                                                        <option value="OH">Ohio</option>
                                                        <option value="PA">Pennsylvania</option>
                                                        <option value="RI">Rhode Island</option>
                                                        <option value="SC">South Carolina</option>
                                                        <option value="VT">Vermont</option>
                                                        <option value="VA">Virginia</option>
                                                        <option value="WV">West Virginia</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <a href="{{url('password/reset')}}" class="btn btn-warning"> เปลี่ยนรหัสผ่าน </a> </div>
                                            <div class="margiv-top-10">
                                                <a href="javascript:;" class="btn green"> บันทึกการแก้ไข </a>
                                                <a href="{{url('/profile')}}" class="btn default"> ยกเลิก </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END PERSONAL INFO TAB -->
                                    <!-- CHANGE AVATAR TAB -->
                                    <div class="tab-pane" id="tab_1_2">
                                        <form action="#" role="form">
                                            <div class="form-group">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> เลือกรูปภาพ </span>
                                                                            <span class="fileinput-exists"> เปลี่ยน </span>
                                                                            <input type="file" name="..."> </span>
                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> ลบ </a>
                                                    </div>
                                                </div>
                                                <div class="clearfix margin-top-10">
                                                    <span class="label label-danger">หมายเหตุ </span>
                                                    <span> การอัพโหลดรูปภาพสามารถใช้งานได้บน Firefox, Chrome, Opera, Safari รุ่นล่าสุด และ Internet Explorer 10 เท่านั้น </span>
                                                </div>
                                            </div>
                                            <div class="margin-top-10">
                                                <a href="javascript:;" class="btn green"> อัพโหลด </a>
                                                <a href="javascript:;" class="btn default"> ยกเลิก </a>
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
    <script src="{{url('assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/jquery.input-ip-address-control-1.0.min.js')}}" type="text/javascript"></script>
@endsection

@section('pageLevelScripts')
    <script src="{{url('assets/pages/scripts/components-select2-profile.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/pages/scripts/form-input-mask.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/pages/scripts/profile.min.js')}}" type="text/javascript"></script>
@endsection

