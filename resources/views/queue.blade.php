@extends('masterpage')

@section('profileNav')
    active
@endsection

@section('title')
    หน้าคิว
@endsection

@section('pageLevelPluginsCSS')
    <link href="{{url('assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('pageLevelCSS')
    <link href="{{url('assets/pages/css/profile.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .portlet > .portlet-title > .nav-tabs {
            float: left;
        }
        .fa-female{
            color: hotpink;
        }
        .fa-male{
            color: blue;
        }
        .first-no-column thead tr .first{
            width: 50px;
        }
        .first-no-column thead tr .last{
            width: 200px;
        }
        .portlet.light.modal-portlet{
            padding: 0px;
            margin-bottom: 0px;
        }
        .portlet.light.modal-portlet .close{
            margin-top: 15px;
            margin-right: 15px;
        }
        .portlet.light.modal-portlet .portlet-title{
            margin-bottom: 0px;
        }
        .portlet.light.modal-portlet>.portlet-body{
            padding: 20px;
            background: #eef1f5;
        }

    </style>
@endsection

@section('content')
    <!-- /.modal -->
    <div class="modal fade bs-modal-lg" id="full" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="portlet light modal-portlet">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <div class="portlet-title tabbable-line">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a id="tab_modal_1_button" href="#tab_modal_1" data-toggle="tab">ข้อมูลส่วนตัว</a>
                            </li>
                            <li>
                                <a id="tab_modal_2_button" href="#tab_modal_2" data-toggle="tab">ประวัติการรักษา</a>
                            </li>
                            <li>
                                <a id="tab_modal_3_button" href="#tab_modal_3" data-toggle="tab">บันทึกข้อมูล</a>
                            </li>
                        </ul>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <!-- BEGIN CHECK PHYSICAL DATA TAB -->
                            <div class="tab-pane active" id="tab_modal_1">
                                <div class="portlet-title margin-bottom-20">
                                    <div class="caption caption-md">
                                        <span class="caption-subject font-blue-madison bold uppercase">ข้อมูลส่วนตัว</span>
                                    </div>
                                </div>
                                <!-- BEGIN PROFILE -->
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
                                                    <div class="portlet light">
                                                        <div class="portlet-title tabbable-line">
                                                            <div class="caption caption-md">
                                                                <i class="icon-globe theme-font hide"></i>
                                                                <span class="caption-subject font-blue-madison bold uppercase">แก้ไขข้อมูลส่วนตัว</span>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <div class="tab-pane active">
                                                                <form role="form" action="#">
                                                                    <div class="form-group form-md-line-input">
                                                                        <div class="form-control form-control-static"> 5631011021 </div>
                                                                        <label for="form_control_1">เลชบัตรประจำตัวโรงพยาบาล</label>
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
                                                                        <label class="control-label">วันเกิด</label>
                                                                        <input class="form-control" id="mask_date2" type="text"  placeholder="วว/ดด/ปปปป" />
                                                                        <span class="help-block"> * ใช้ปีพุทธศักราช </span>
                                                                    </div>
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
                                                                </form>
                                                            </div>
                                                            <!-- END PERSONAL INFO TAB -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END PROFILE CONTENT -->
                                    </div>
                                </div>
                                <!-- END PROFILE -->
                            </div>
                            <!-- END CHECK PHYSICAL DATA TAB -->
                            <!-- BEGIN WAIT DOCTOR TAB -->
                            <div class="tab-pane" id="tab_modal_2">
                                หกดหกด
                            </div>
                            <!-- END WAIT DOCTOR TAB -->

                            <!-- BEGIN WAIT MEDICINE TAB -->
                            <div class="tab-pane" id="tab_modal_3">
                                <!-- BEGIN NORMAL SCHEDULE -->
                                <div class="normal-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h1 class="page-title">ตารางประจำ</h1>
                                            <div class="portlet light ">
                                                <div class="portlet-title">
                                                    <div class="caption caption-md">
                                                        <span class="caption-subject font-blue-madison bold uppercase">แก้ไขตารางออกตรวจประจำ</span>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <!-- BEGIN ADD FORM -->
                                                    <div class="portlet-body form">
                                                        <form class="form-horizontal" role="form">
                                                            <div class="form-body" style="padding-bottom: 0px;">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label class="col-md-3 control-label"><b>เพิ่มวัน</b></label>
                                                                            <div class="col-md-9">
                                                                                <select class="form-control">
                                                                                    <option>วันอาทิตย์</option>
                                                                                    <option>วันจันทร์</option>
                                                                                    <option>วันอังคาร</option>
                                                                                    <option>วันพุธ</option>
                                                                                    <option>วันพฤหัสบดี</option>
                                                                                    <option>วันศุกร์</option>
                                                                                    <option>วันเสาร์</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label class="col-md-3 control-label"><b>ช่วง</b></label>
                                                                            <div class="col-md-9">
                                                                                <div class="mt-radio-inline">
                                                                                    <label class="mt-radio">
                                                                                        <input type="radio" name="optionsRadios" id="optionsRadios25" value="0" checked=""> เช้า
                                                                                        <span></span>
                                                                                    </label>
                                                                                    <label class="mt-radio">
                                                                                        <input type="radio" name="optionsRadios" id="optionsRadios26" value="1" checked=""> บ่าย
                                                                                        <span></span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label class="col-md-3 control-label"><b>แผนก</b></label>
                                                                            <div class="col-md-9">
                                                                                <select class="form-control">
                                                                                    <option>แผนกอายุรกรรม</option>
                                                                                    <option>แผนกหู คอ จมูก</option>
                                                                                    <option>แผนกตา</option>
                                                                                    <option>แผนกกระดูก</option>
                                                                                    <option>แผนกฉุกเฉิน</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <button type="submit" class="btn green">เพิ่ม</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END ADD FORM -->
                                                    <!-- BEGIN TABLE -->
                                                    <div class="table-scrollable">
                                                        <table class="table table-striped table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th> ลำดับที่ </th>
                                                                <th> วัน </th>
                                                                <th> ช่วง </th>
                                                                <th> แผนก </th>
                                                                <th> ลบ </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td> 1 </td>
                                                                <td> วันอาทิตย์ </td>
                                                                <td> เช้า </td>
                                                                <td> แผนกหู คอ จมูก </td>
                                                                <td>
                                                                    <a href="javascript:;" class="btn red"> ลบ
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> 1 </td>
                                                                <td> วันอาทิตย์ </td>
                                                                <td> เช้า </td>
                                                                <td> แผนกหู คอ จมูก </td>
                                                                <td>
                                                                    <a href="javascript:;" class="btn red"> ลบ
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> 1 </td>
                                                                <td> วันอาทิตย์ </td>
                                                                <td> เช้า </td>
                                                                <td> แผนกหู คอ จมูก </td>
                                                                <td>
                                                                    <a href="javascript:;" class="btn red"> ลบ
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> 1 </td>
                                                                <td> วันอาทิตย์ </td>
                                                                <td> เช้า </td>
                                                                <td> แผนกหู คอ จมูก </td>
                                                                <td>
                                                                    <a href="javascript:;" class="btn red"> ลบ
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- END TABLE -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END NORMAL SCHEDULE -->
                            </div>
                            <!-- END WAIT MEDICINE TAB -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN QUEUE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-title">หน้าคิว</h1>
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">รอตรวจข้อมูลทางกายภาพ</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_2" data-toggle="tab">รอตรวจรักษา</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_3" data-toggle="tab">รอรับยา</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- BEGIN CHECK PHYSICAL DATA TAB -->
                                    <div class="tab-pane active" id="tab_1_1">
                                        <div class="portlet-title margin-bottom-20">
                                            <div class="caption caption-md">
                                                <span class="caption-subject font-blue-madison bold uppercase">ตารางผู้ป่วยรอตรวจข้อมูลทางกายภาพ</span>
                                            </div>
                                        </div>
                                        <!-- BEGIN TABLE -->
                                        <table class="table table-striped table-bordered table-hover order-column first-no-column data-table">
                                            <thead>
                                            <tr>
                                                <th class="first"> ลำดับที่ </th>
                                                <th> ชื่อ </th>
                                                <th> นามสกุล </th>
                                                <th> เพศ </th>
                                                <th> อายุ </th>
                                                <th> แผนก </th>
                                                <th> อาการ </th>
                                                <th class="last"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>นายกิตติภณ</td>
                                                <td>พละการ</td>
                                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                                <td>21</td>
                                                <td>แผนกหู คอ จมูก</td>
                                                <td>สบายดี</td>
                                                <th>
                                                    <a type="button" class="btn btn-default" data-toggle="modal" href="#full" onclick="goToModalTab1()"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</a>
                                                    <a type="button" class="btn btn-default" data-toggle="modal" href="#full" onclick="goToModalTab2()"><i class="fa fa-history"></i> ประวัติการรักษา</a>
                                                    <a type="button" class="btn btn-default" data-toggle="modal" href="#full" onclick="goToModalTab3()"><i class="fa fa-save"></i> บันทึกข้อมูล</a>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>นายกิตติภณ</td>
                                                <td>พละการ</td>
                                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                                <td>21</td>
                                                <td>แผนกหู คอ จมูก</td>
                                                <td>สบายดี</td>
                                                <th>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-history"></i> ประวัติการรักษา</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>นายกิตติภณ</td>
                                                <td>พละการ</td>
                                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                                <td>21</td>
                                                <td>แผนกหู คอ จมูก</td>
                                                <td>สบายดี</td>
                                                <th>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-history"></i> ประวัติการรักษา</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>นายกิตติภณ</td>
                                                <td>พละการ</td>
                                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                                <td>21</td>
                                                <td>แผนกหู คอ จมูก</td>
                                                <td>สบายดี</td>
                                                <th>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-history"></i> ประวัติการรักษา</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>นายกิตติภณ</td>
                                                <td>พละการ</td>
                                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                                <td>21</td>
                                                <td>แผนกหู คอ จมูก</td>
                                                <td>สบายดี</td>
                                                <th>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-history"></i> ประวัติการรักษา</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>นายกิตติภณ</td>
                                                <td>พละการ</td>
                                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                                <td>21</td>
                                                <td>แผนกหู คอ จมูก</td>
                                                <td>สบายดี</td>
                                                <th>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-history"></i> ประวัติการรักษา</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>นายกิตติภณ</td>
                                                <td>พละการ</td>
                                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                                <td>21</td>
                                                <td>แผนกหู คอ จมูก</td>
                                                <td>สบายดี</td>
                                                <th>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-history"></i> ประวัติการรักษา</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>นายกิตติภณ</td>
                                                <td>พละการ</td>
                                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                                <td>21</td>
                                                <td>แผนกหู คอ จมูก</td>
                                                <td>สบายดี</td>
                                                <th>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-history"></i> ประวัติการรักษา</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>นายกิตติภณ</td>
                                                <td>พละการ</td>
                                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                                <td>21</td>
                                                <td>แผนกหู คอ จมูก</td>
                                                <td>สบายดี</td>
                                                <th>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-history"></i> ประวัติการรักษา</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>นายกิตติภณ</td>
                                                <td>พละการ</td>
                                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                                <td>21</td>
                                                <td>แผนกหู คอ จมูก</td>
                                                <td>สบายดี</td>
                                                <th>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-history"></i> ประวัติการรักษา</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>นายกิตติภณ</td>
                                                <td>พละการ</td>
                                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                                <td>21</td>
                                                <td>แผนกหู คอ จมูก</td>
                                                <td>สบายดี</td>
                                                <th>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-history"></i> ประวัติการรักษา</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                                </th>
                                            </tr>

                                            </tbody>
                                        </table>
                                        <!-- END TABLE -->
                                    </div>
                                    <!-- END CHECK PHYSICAL DATA TAB -->
                                    <!-- BEGIN WAIT DOCTOR TAB -->
                                    <div class="tab-pane" id="tab_1_2">
                                    </div>
                                    <!-- END WAIT DOCTOR TAB -->

                                    <!-- BEGIN WAIT MEDICINE TAB -->
                                    <div class="tab-pane" id="tab_1_3">
                                    </div>
                                    <!-- END WAIT MEDICINE TAB -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END QUEUE CONTENT -->
        </div>
    </div>
@endsection

@section('pageLevelPluginsScript')
    <script src="{{url('assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
@endsection

@section('pageLevelScripts')
    <script>
        $(document).ready(function(){
            $('.data-table').DataTable();
        });

        function goToModalTab1(){
            $('#tab_modal_1_button').click();
        }
        function goToModalTab2(){
            $('#tab_modal_2_button').click();
        }
        function goToModalTab3(){
            $('#tab_modal_3_button').click();
        }

    </script>
@endsection

