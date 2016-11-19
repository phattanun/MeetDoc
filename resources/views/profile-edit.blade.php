@extends('masterpage')

@section('profileNav')
    active
@endsection

@section('title')
    ข้อมูลส่วนตัว
@endsection
@section('title-inside')
    <a href="{{url('account/manage')}}">จัดการบัญชีผู้ใช้</a> / แก้ไขข้อมูลส่วนตัวของ {{ $name }} {{ $surname }}
@endsection

@section('pageLevelPluginsCSS')
    <link href="{{url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/ladda/ladda-themeless.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css')}}" rel="stylesheet" type="text/css" />
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
                        <img src="@if($image==""){{url('\assets\pages\img\avatars\placeholder.jpg')}}@else{{$image}}@endif" class="img-responsive" alt=""> </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"> {{ $name }} {{ $surname }} </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                    </div>
                    <!-- END MENU -->
                </div>
                <!-- END PORTLET MAIN -->
                <!-- PORTLET MAIN -->
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
                                        <form id="profile-form" role="form" action="{{ url('/officer/profile') }}" method="post">
                                            {{ csrf_field() }}
                                            @if(isset($success)&&$success)
                                                <div class="alert alert-success" id="success-alert">
                                                    <strong>สำเร็จ!</strong> ระบบบันทึกการแก้ไขเรียบร้อย </div>
                                            @elseif(isset($success)&&!$success)
                                                <div class="alert alert-danger" id="fail-alert">
                                                    <strong>ผิดพลาด!</strong> {{$error}} </div>
                                            @else
                                            @endif
                                            <div class="form-group form-md-line-input">
                                                <div class="form-control form-control-static"> {{ $hid }} </div>
                                                <label for="form_control_1">หมายเลขประจำตัวผู้ป่วย</label>
                                                <input type="hidden" name="id" value="{{ $hid }}" />
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="control-label">หมายเลขบัตรประจำตัวประชาชน</label>
                                                <input type="text" name="ssn" placeholder="กรุณากรอกเลชบัตรประจำตัวประชาชนของท่าน" class="form-control" value="{{ $ssn }}" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">ชื่อ</label>
                                                <input id="name" type="text" name="name" placeholder="กรุณากรอกชื่อพร้อมคำนำหน้าชื่อ เช่น นายสุขภาพดี" class="form-control" value="{{ $name }}"/> </div>
                                            <div class="form-group">
                                                <label class="control-label">นามสกุล</label>
                                                <input id="surname" type="text" name="surname" placeholder="กรุณากรอกนามสกุล" class="form-control" value="{{ $surname }}"/> </div>
                                            <div class="form-group">
                                                <label class="control-label">เพศ</label>
                                                <div class="mt-radio-inline">
                                                    <label class="mt-radio">
                                                        <input name="gender" id="male" @if(isset($gender) && $gender=='m') checked @endif value = "m" type="radio"> ชาย
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input name="gender" id="female" @if(isset($gender) && $gender=='f') checked @endif value="f"  type="radio"> หญิง
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">วันเกิด</label>
                                                <input name="birthday" class="form-control" id="mask_date2" type="text"  placeholder="วว/ดด/ปปปป" value="{{ join('/',array_reverse(explode("-",$birthday))) }}"/>
                                                <span class="help-block"> * ใช้ปีคริสต์ศักราช </span>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">อีเมล</label>
                                                <input id="email" name="email" type="email" placeholder="john.doe@meetdoc.com" class="form-control" value="{{ $email }}"/> </div>
                                            <div class="form-group">
                                                <label class="control-label">ที่อยู่</label>
                                                <textarea id="address" name="address" type="text" placeholder="กรุณากรอกที่อยู่" class="form-control" rows="3" >{{ $address }}</textarea> </div>
                                            <div class="form-group">
                                                <label class="control-label">หมายเลขโทรศัพท์เคลื่อนที่</label>
                                                <input id="phone_no" name="phone_no" type="text" placeholder="0899999999" class="form-control" value="{{ $phone_no }}"/> </div>
                                            <div class="form-group">
                                                <label class="control-label">ประวัติการแพ้ยา</label>
                                                <select name="drugAllergy[]" id="drugAllergy" class="form-control select2-multiple" multiple>
                                                    @foreach($medicine_list as $medicine)
                                                        <option value="{{$medicine['medicine_id']}}" @if(in_array($medicine['medicine_name'], $allergic_medicine)) selected @endif>{{$medicine['medicine_name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="margiv-top-10">
                                                <button type="submit" class="btn green"> บันทึกการแก้ไข </button>
                                                <a href="{{ url('/profile') }}" class="btn default"> ยกเลิก </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END PERSONAL INFO TAB -->
                                    <!-- CHANGE AVATAR TAB -->
                                    <div class="tab-pane" id="tab_1_2">
                                        <form role="form" action="{{ url('officer/profile/picupload') }}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $hid }}">
                                            <div class="form-group">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="@if($image==""){{url('\assets\pages\img\avatars\placeholder.jpg')}}@else{{$image}}@endif" alt="" /> </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> เลือกรูปภาพ </span>
                                                                            <span class="fileinput-exists"> เปลี่ยน </span>
                                                                            <input type="file" name="image"> </span>
                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> ลบ </a>
                                                    </div>
                                                </div>
                                                <div class="clearfix margin-top-10">
                                                    <span class="label label-danger">หมายเหตุ </span>
                                                    <span> การอัพโหลดรูปภาพสามารถใช้งานได้บน Firefox, Chrome, Opera, Safari รุ่นล่าสุด และ Internet Explorer 10 เท่านั้น </span>
                                                </div>
                                            </div>
                                            <div class="margin-top-10">
                                                <button type="submit" class="btn green"> อัพโหลด </button>
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
                <button class="btn red btn-block" data-toggle="modal" data-target="#removeModal">ลบบัญชีผู้ใช้นี้ออกจากฐานข้อมูล</button>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>

    <div id="removeModal" class="modal fade" tabindex="-1" data-width="480">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">ลบบัญชีผู้ใช้ของ {{ $name }} {{ $surname }} </h4>
        </div>
        <div class="modal-body">
            <div class="caption text-center">
                <i class="glyphicon glyphicon-alert font-red"></i>
                <span class="caption-subject font-red sbold uppercase">ท่านแน่ใจหรือไม่ว่าต้องการลบบัญชีผู้ใช้นี้</span>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" id="confirm-delete-account-btn" class="btn btn-success mt-ladda-btn ladda-button" data-style="expand-right">
                <span class="ladda-label">ยืนยัน</span>
                <span class="ladda-spinner"></span><span class="ladda-spinner"></span></button>
            <button type="button" data-dismiss="modal" class="btn btn-outline dark">ย้อนกลับ</button>
        </div>
    </div>
@endsection

@section('pageLevelPluginsScript')
    <script src="{{url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/jquery.input-ip-address-control-1.0.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/ladda/spin.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/ladda/ladda.min.js')}}" type="text/javascript"></script>
@endsection

@section('pageLevelScripts')
    <script src="{{url('assets/pages/scripts/components-select2-profile.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/pages/scripts/form-input-mask.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/pages/scripts/profile.min.js')}}" type="text/javascript"></script>
    <script>
        $(document).on('click','#confirm-delete-account-btn', function (e) {
            e.preventDefault();
            var l = Ladda.create(this);
            l.start();
            var URL_ROOT = '{{Request::root()}}';
            $.post(URL_ROOT+'/account/delete',
                    {id:  {{ $hid }}, _token: '{{csrf_token()}}'}).done(function (input) {
                l.stop();
                if(input =="success"){
                    toastr['success']('ลบข้อมูลบัญชีผู้ใช้สำเร็จ', "สำเร็จ");
                    $('#removeModal').modal('hide');
                    window.location.replace("{{url('/account/manage')}}");
                }
                else if (input =="constraint"){
                    toastr['warning']("บัญชีผู้ใช้นี้ถูกใช้อยู่ในระบบ ไม่สามารถลบได้", "ขออภัย");
                }
            }).fail(function () {
                l.stop();
                toastr['error']("กรุณาลองใหม่อีกครั้ง", "ผิดพลาด");
            });
        });
    </script>
@endsection
