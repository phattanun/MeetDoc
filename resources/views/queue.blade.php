@extends('masterpage')

@section('queueNav')
    active
@endsection

@section('title')
    หน้าคิว
@endsection

@section('title-inside')
    หน้าคิว
@endsection

@section('pageLevelPluginsCSS')
    <link href="{{url('assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
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
        .first-no-column thead tr .first,.first-no-column tbody tr .first{
            width: 25px !important;
        }
        .first-no-column thead tr .last,.first-no-column tbody tr .last{
            width: 400px !important;
            max-width: 400px !important;
            min-width: 400px !important;
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
        .select2-container--bootstrap .select2-selection {
            font-family: 'Sukhumvit Set';
        }
        .medicine-table>thead>tr>td,.medicine-table>tbody>tr>td{
            vertical-align: middle;
        }
        #physical-data-body .row{
            margin-top: 5px;
            margin-bottom: 5px;
        }
        .table .middle tr td,
        .table .middle tr th{
            vertical-align: middle;
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
                                <!-- BEGIN HISTORY TABLE -->
                                <div class="normal-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="portlet light ">
                                                <div class="portlet-title">
                                                    <div class="caption caption-md">
                                                        <span class="caption-subject font-blue-madison bold uppercase">ประวัติการรักษา</span>
                                                    </div>
                                                </div>
                                                <div id="modal-history-table-container" class="portlet-body">
                                                    <!-- BEGIN TABLE -->
                                                    <table id="modal-history-table" class="table table-striped table-bordered table-hover order-column first-no-column data-table">
                                                        <thead>
                                                        <tr>
                                                            <th class="first"> ครั้งที่ </th>
                                                            <th> วันที่ </th>
                                                            <th> ช่วง </th>
                                                            <th> แพทย์ </th>
                                                            <th> แผนก </th>
                                                            <th> อาการ </th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td class="first">1</td>
                                                            <td>12/10/2559</td>
                                                            <td>เช้า</td>
                                                            <td>นายแพทย์สวัสดี หายไวไวนะ</td>
                                                            <td>แผนกหู คอ จมูก</td>
                                                            <td>ใกล้หายแล้ว ไม่รู้จะมาทำไม</td>
                                                            <td><a type="button" class="btn btn-default"><i class="fa fa-user"></i> ดูประวัติ</a></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- END TABLE -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END HISTORY TABLE -->

                                <div id="history_detail" class="normal-content">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="portlet light ">
                                                <!-- BEGIN PHYSICAL DATA -->
                                                <div class="portlet-title">
                                                    <div class="caption caption-md">
                                                        <span class="caption-subject font-blue-madison bold uppercase">ข้อมูลกายภาพ</span>
                                                    </div>
                                                </div>
                                                <div id="physical-data-body" class="portlet-body margin-bottom-20">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="col-md-5 bold">น้ำหนัก</label>
                                                            <div id="history_detail_weight" class="col-md-7">
                                                                70.00 กิโลกรัม
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="col-md-5 bold">ส่วนสูง</label>
                                                            <div class="col-md-7">
                                                                170.00 เซนติเมตร
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="col-md-5 bold">อุณหภูมิร่างกาย</label>
                                                            <div class="col-md-7">
                                                                32 องศาเซลเซียส
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="col-md-5 bold">ความดันซิสโทลิก</label>
                                                            <div class="col-md-7">
                                                                760 มิลลิเมตรปรอท
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="col-md-5 bold">ความดันไดแอสโทลิก</label>
                                                            <div class="col-md-7">
                                                                766 มิลลเมตรปรอท
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="col-md-5 bold">อัตราการเต้นของหัวใจ</label>
                                                            <div class="col-md-7">
                                                                80 ครั้ง/นาที
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END PHYSICAL DATA -->

                                                <!-- BEGIN DIAGNOSIS FORM -->
                                                <div class="portlet-title">
                                                    <div class="caption caption-md">
                                                        <span class="caption-subject font-blue-madison bold uppercase">ข้อมูลวินิจฉัยโรค</span>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <!-- BEGIN FORM -->
                                                    <div class="portlet-body form">
                                                        <form class="form" role="form">
                                                            <div class="form-body" style="padding-bottom: 0px; padding-top:10px;">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label class="bold margin-bottom-10">โรคที่วินิจฉัยได้</label>
                                                                        <div class="disease">- โรคติดยา</div>
                                                                        <div class="disease">- โรคติดยา</div>
                                                                        <div class="disease">- โรคติดยา</div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group margin-top-20">
                                                                    <label class="bold margin-bottom-10">รายละเอียดของโรค</label>
                                                                    <p>อาการหนักมาก งานเยอะมากอาการหนักมาก งานเยอะมากอาการหนักมาก งานเยอะมากอาการหนักมาก งานเยอะมากอาการหนักมาก งานเยอะมากอาการหนักมาก งานเยอะมากอาการหนักมาก งานเยอะมากอาการหนักมาก งานเยอะมากอาการหนักมาก งานเยอะมากอาการหนักมาก งานเยอะมาก</p>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END FORM -->
                                                </div>
                                                <!-- END DIAGNOSIS FORM -->

                                                <!-- BEGIN MEDICINE FORM -->
                                                <div class="portlet-title">
                                                    <div class="caption caption-md">
                                                        <span class="caption-subject font-blue-madison bold uppercase">ข้อมูลสั่งยา</span>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <!-- BEGIN TABLE -->
                                                    <div class="table-scrollable">
                                                        <table class="table table-striped table-hover medicine-table">
                                                            <thead>
                                                            <tr>
                                                                <th> ลำดับที่ </th>
                                                                <th> รหัสยา </th>
                                                                <th> ชื่อยา </th>
                                                                <th> จำนวน </th>
                                                                <th> หน่วย </th>
                                                                <th> หมายเหตุ </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td> 1 </td>
                                                                <td> MD22531 </td>
                                                                <td> Paracetamol </td>
                                                                <td> 350 </td>
                                                                <td> เม็ด </td>
                                                                <td> กินหลังอาหาร </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- END TABLE -->
                                                </div>
                                                <!-- END MEDICINE FORM -->
                                            </div>

                                        </div>
                                    </div>
                                </div>



                            </div>
                            <!-- END WAIT DOCTOR TAB -->

                            <!-- BEGIN WAIT MEDICINE TAB -->
                            <div class="tab-pane" id="tab_modal_3">
                                <!-- BEGIN PHYSICAL DATA FORM -->
                                <div id="modal_tab3_physical_form" class="normal-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- BEGIN FORM -->
                                            <form class="form-horizontal" role="form">
                                                <input id="physical-form-appointment-id" name="appointment_id" class="physical-form" type="hidden">
                                                <div class="portlet light ">
                                                    <div class="portlet-title">
                                                        <div class="caption caption-md">
                                                            <span class="caption-subject font-blue-madison bold uppercase">ข้อมูลกายภาพ</span>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="portlet-body form">
                                                            <div class="form-body" style="padding-bottom: 0px;">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">น้ำหนัก</label>
                                                                            <div class="col-md-7">
                                                                                <input class="form-control physical-form" name="weight" placeholder="กิโลกรัม" type="text">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">ส่วนสูง</label>
                                                                            <div class="col-md-7">
                                                                                <input class="form-control physical-form" name="height" placeholder="เซนติเมตร" type="text">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">อุณหภูมิร่างกาย</label>
                                                                            <div class="col-md-7">
                                                                                <input class="form-control physical-form" name="temperature" placeholder="องศาเซลเซียส" type="text">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">อัตราการเต้นของหัวใจ</label>
                                                                            <div class="col-md-7">
                                                                                <input class="form-control physical-form" name="heart_rate" placeholder="ครั้ง/นาที" type="text">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">ความดันซิสโทลิก</label>
                                                                            <div class="col-md-7">
                                                                                <input class="form-control physical-form" name="systolic" placeholder="มิลลิเมตรปรอท" type="text">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">ความดันไดแอสโทลิก</label>
                                                                            <div class="col-md-7">
                                                                                <input class="form-control physical-form" name="diastolic" placeholder="มิลลิเมตรปรอท" type="text">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a type="submit" id="physical-form-submit" class="btn btn-success pull-right physical-form"><i class="fa fa-save"></i> บันทึก</a>
                                            </form>
                                            <!-- END FORM -->
                                        </div>
                                    </div>
                                </div>
                                <!-- END PHYSICAL DATA FORM -->
                                <!-- BEGIN DIAGNOSIS FORM -->
                                <div id="modal_tab3_diagnosis_form" class="normal-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="portlet light ">
                                                <div class="portlet-title">
                                                    <div class="caption caption-md">
                                                        <span class="caption-subject font-blue-madison bold uppercase">ข้อมูลวินิจฉัยโรค</span>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <!-- BEGIN FORM -->
                                                    <div class="portlet-body form">
                                                        <form class="form" role="form">
                                                            <div class="form-body" style="padding-bottom: 0px; padding-top:10px;">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label for="select2-button-addons-single-input-group" class="control-label">โรคที่วินิจฉัยได้</label>
                                                                        <div class="input-group input-group select2-bootstrap-append">
                                                                            <select id="" class="form-control js-data-example-ajax" multiple>
                                                                                <option value="0" selected="selected">กรุณาระบุโรค</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group margin-top-20">
                                                                    <label>รายละเอียดของโรค</label>
                                                                    <textarea class="form-control" rows="3" placeholder="กรุณาระบุรายละเอียดของโรค"></textarea>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END FORM -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END DIAGNOSIS FORM -->
                                <!-- BEGIN MEDICINE FORM -->
                                <div id="modal_tab3_medicine_form" class="normal-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="portlet light ">
                                                <div class="portlet-title">
                                                    <div class="caption caption-md">
                                                        <span class="caption-subject font-blue-madison bold uppercase">ข้อมูลสั่งยา</span>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <!-- BEGIN FORM -->
                                                    <div class="portlet-body form">
                                                        <form class="form form-group" role="form">
                                                            <div class="form-body" style="padding-bottom: 0px; padding-top:10px;">
                                                                <div class="row">
                                                                    <label class="col-md-3 control-label text-right">ค้นหารหัสยา หรือชื่อยา
                                                                        <span class="required" aria-required="true"> * </span>
                                                                    </label>
                                                                    <div class="col-md-7 margin-bottom-10">
                                                                        <div class="input-group select2-bootstrap-prepend">
                                                                            <select class="form-control js-data-example-ajax" multiple></select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-1">
                                                                        <button type="button" class="btn btn-success">เพิ่ม</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END FORM -->
                                                    <!-- BEGIN TABLE -->
                                                    <div class="table-scrollable">
                                                        <table class="table table-striped table-hover medicine-table">
                                                            <thead>
                                                            <tr>
                                                                <th> ลำดับที่ </th>
                                                                <th> รหัสยา </th>
                                                                <th> ชื่อยา </th>
                                                                <th> จำนวน </th>
                                                                <th> หน่วย </th>
                                                                <th> หมายเหตุ </th>
                                                                <th></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td> 1 </td>
                                                                <td> MD22531 </td>
                                                                <td> Paracetamol </td>
                                                                <td> <input class="touchspin" type="text" value="" name=""> </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Option 1</option>
                                                                        <option>Option 2</option>
                                                                        <option>Option 3</option>
                                                                        <option>Option 4</option>
                                                                        <option>Option 5</option>
                                                                    </select>
                                                                </td>
                                                                <td> <input class="form-control" type="text" value="" name=""> </td>
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
                                <!-- END MEDICINE FORM -->
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
                                        <table id="tab1_table" class="table table-striped table-bordered table-hover order-column first-no-column data-table">
                                            <thead class="middle">
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
                                            <tbody class="middle">
                                            @foreach($queue_list['waiting_staff'] as $queue)
                                                <tr>
                                                    <td>{{$queue['patient_info']['id']}}</td>
                                                    <td>{{$queue['patient_info']['name']}}</td>
                                                    <td>{{$queue['patient_info']['surname']}}</td>
                                                    <td>@if($queue['patient_info']['gender'] == 'm')<i class="fa fa-male" aria-hidden="true"></i> ชาย @else<i class="fa fa-female" aria-hidden="true"></i> หญิง @endif</td>
                                                    <td>{{$queue['patient_info']['age']}}</td>
                                                    <td>{{$queue['department']}}</td>
                                                    <td>{{$queue['symptom']}}</td>
                                                    <td class="last">
                                                        <a type="button" class="btn btn-default goToModalTab1" data-toggle="modal" href="#full" appointmentId="{{$queue['patient_info']['id']}}"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</a>
                                                        <a type="button" class="btn btn-default goToModalTab2" data-toggle="modal" href="#full" appointmentId="{{$queue['patient_info']['id']}}"><i class="fa fa-history"></i> ประวัติการรักษา</a>
                                                        <a type="button" class="btn btn-default goToModalTab3" data-toggle="modal" href="#full" appointmentId="{{$queue['patient_info']['id']}}" step="1"><i class="fa fa-save"></i> บันทึกข้อมูล</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td>1</td>
                                                <td>นายกิตติภณ</td>
                                                <td>พละการ</td>
                                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                                <td>21</td>
                                                <td>แผนกหู คอ จมูก</td>
                                                <td>สบายดี</td>
                                                <td class="last">
                                                    <a type="button" class="btn btn-default goToModalTab1" data-toggle="modal" href="#full" appointmentId="111"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</a>
                                                    <a type="button" class="btn btn-default goToModalTab2" data-toggle="modal" href="#full" appointmentId="111"><i class="fa fa-history"></i> ประวัติการรักษา</a>
                                                    <a type="button" class="btn btn-default goToModalTab3" data-toggle="modal" href="#full" appointmentId="111" step="1"><i class="fa fa-save"></i> บันทึกข้อมูล</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!-- END TABLE -->
                                    </div>
                                    <!-- END CHECK PHYSICAL DATA TAB -->
                                    <!-- BEGIN WAIT DOCTOR TAB -->
                                    <div class="tab-pane" id="tab_1_2">
                                        <div class="portlet-title margin-bottom-20">
                                            <div class="caption caption-md">
                                                <span class="caption-subject font-blue-madison bold uppercase">ตารางผู้ป่วยรอตรวจรักษา</span>
                                            </div>
                                        </div>
                                        <!-- BEGIN TABLE -->
                                        <table id="tab2_table" class="table table-striped table-bordered table-hover order-column first-no-column data-table">
                                            <thead class="middle">
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
                                            <tbody class="middle">
                                            @foreach($queue_list['waiting_doctor'] as $queue)
                                                <tr>
                                                    <td>{{$queue['patient_info']['id']}}</td>
                                                    <td>{{$queue['patient_info']['name']}}</td>
                                                    <td>{{$queue['patient_info']['surname']}}</td>
                                                    <td>@if($queue['patient_info']['gender'] == 'm')<i class="fa fa-male" aria-hidden="true"></i> ชาย @else<i class="fa fa-female" aria-hidden="true"></i> หญิง @endif</td>
                                                    <td>{{$queue['patient_info']['age']}}</td>
                                                    <td>{{$queue['department']}}</td>
                                                    <td>{{$queue['symptom']}}</td>
                                                    <td class="last">
                                                        <a type="button" class="btn btn-default goToModalTab1" data-toggle="modal" href="#full" appointmentId="{{$queue['patient_info']['id']}}"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</a>
                                                        <a type="button" class="btn btn-default goToModalTab2" data-toggle="modal" href="#full" appointmentId="{{$queue['patient_info']['id']}}"><i class="fa fa-history"></i> ประวัติการรักษา</a>
                                                        <a type="button" class="btn btn-default goToModalTab3" data-toggle="modal" href="#full" appointmentId="{{$queue['patient_info']['id']}}" step="2"><i class="fa fa-save"></i> บันทึกข้อมูล</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td>1</td>
                                                <td>นายกิตติภณ</td>
                                                <td>พละการ</td>
                                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                                <td>21</td>
                                                <td>แผนกหู คอ จมูก</td>
                                                <td>สบายดี</td>
                                                <td class="last">
                                                    <a type="button" class="btn btn-default goToModalTab1" data-toggle="modal" href="#full" appointmentId="1111"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</a>
                                                    <a type="button" class="btn btn-default goToModalTab2" data-toggle="modal" href="#full" appointmentId="1111"><i class="fa fa-history"></i> ประวัติการรักษา</a>
                                                    <a type="button" class="btn btn-default goToModalTab3" data-toggle="modal" href="#full" appointmentId="1111" step="2"><i class="fa fa-save"></i> บันทึกข้อมูล</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!-- END TABLE -->
                                    </div>
                                    <!-- END WAIT DOCTOR TAB -->

                                    <!-- BEGIN WAIT MEDICINE TAB -->
                                    <div class="tab-pane" id="tab_1_3">
                                        <div class="portlet-title margin-bottom-20">
                                            <div class="caption caption-md">
                                                <span class="caption-subject font-blue-madison bold uppercase">ตารางผู้ป่วยรอรับยา</span>
                                            </div>
                                        </div>
                                        <!-- BEGIN TABLE -->
                                        <table id="tab3_table" class="table table-striped table-bordered table-hover order-column first-no-column data-table">
                                            <thead class="middle">
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
                                            <tbody class="middle">
                                            @foreach($queue_list['waiting_pharmacist'] as $queue)
                                                <tr>
                                                    <td>{{$queue['patient_info']['id']}}</td>
                                                    <td>{{$queue['patient_info']['name']}}</td>
                                                    <td>{{$queue['patient_info']['surname']}}</td>
                                                    <td>@if($queue['patient_info']['gender'] == 'm')<i class="fa fa-male" aria-hidden="true"></i> ชาย @else<i class="fa fa-female" aria-hidden="true"></i> หญิง @endif</td>
                                                    <td>{{$queue['patient_info']['age']}}</td>
                                                    <td>{{$queue['department']}}</td>
                                                    <td>{{$queue['symptom']}}</td>
                                                    <td class="last">
                                                        <a type="button" class="btn btn-default goToModalTab1" data-toggle="modal" href="#full" appointmentId="{{$queue['patient_info']['id']}}"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</a>
                                                        <a type="button" class="btn btn-default goToModalTab2" data-toggle="modal" href="#full" appointmentId="{{$queue['patient_info']['id']}}"><i class="fa fa-history"></i> ประวัติการรักษา</a>
                                                        <a type="button" class="btn btn-default goToModalTab3" data-toggle="modal" href="#full" appointmentId="{{$queue['patient_info']['id']}}" step="3"><i class="fa fa-save"></i> บันทึกข้อมูล</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td>1</td>
                                                <td>นายกิตติภณ</td>
                                                <td>พละการ</td>
                                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                                <td>21</td>
                                                <td>แผนกหู คอ จมูก</td>
                                                <td>สบายดี</td>
                                                <td class="last">
                                                    <a type="button" class="btn btn-default goToModalTab1" data-toggle="modal" href="#full" appointmentId="11111"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</a>
                                                    <a type="button" class="btn btn-default goToModalTab2" data-toggle="modal" href="#full" appointmentId="11111"><i class="fa fa-history"></i> ประวัติการรักษา</a>
                                                    <a type="button" class="btn btn-default goToModalTab3" data-toggle="modal" href="#full" appointmentId="11111" step="3"><i class="fa fa-save"></i> บันทึกข้อมูล</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!-- END TABLE -->
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
    <script src="{{url('assets/pages/scripts/select2-diagnosis.full.min.js')}}" type="text/javascript"></script>

    <script src="{{url('assets/global/plugins/fuelux/js/spinner.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js')}}" type="text/javascript"></script>
@endsection

@section('pageLevelScripts')
    <script src="{{url('assets/pages/scripts/components-select2-diagnosis.min.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            $('#tab1_table').DataTable({
                "autoWidth": false,
                "columnDefs": [
                    { "width": "400px", "targets": 7 }
                ],
                fixedColumns: true
            });
            $('#tab2_table').DataTable({
                "autoWidth": false,
                "columnDefs": [
                    { "width": "400px", "targets": 7 }
                ],
                fixedColumns: true
            });
            $('#tab3_table').DataTable({
                "autoWidth": false,
                "columnDefs": [
                    { "width": "400px", "targets": 7 }
                ],
                fixedColumns: true
            });
            $('#modal-history-table').DataTable();
        });
        $(".touchspin").TouchSpin({
            min: 0,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10
        });

        $(document).on('click','.goToModalTab1', function(){
            var id = $(this).attr('appointmentId');
            alert(id);
            $('#tab_modal_1_button').click();
        });

        var diagnosis_history;
        var modalHistoryTable;

        $(document).on('click','.goToModalTab2', function(){
            var id = $(this).attr('appointmentId');
            $('#history_detail').hide();
//            alert('ss'+id);
            var URL_ROOT = '{{Request::root()}}';
            $.post(URL_ROOT+'/backend/Diagnosis/view_diagnosis_record',
                    {patient_id:  id, _token: '{{csrf_token()}}'}).done(function (input) {
                console.log(input);
                diagnosis_history = input;
                $('#modal-history-table_wrapper').remove();
                modalHistoryTable = '<table id="modal-history-table" class="table table-striped table-bordered table-hover order-column first-no-column data-table">'+
                        '<thead>'+
                        '<tr>'+
                        '<th class="first"> ครั้งที่ </th>'+
                        '<th> วันที่ </th>'+
                        '<th> ช่วง </th>'+
                        '<th> แพทย์ </th>'+
                        '<th> แผนก </th>'+
                        '<th> อาการ </th>'+
                        '<th></th>'+
                        '</tr>'+
                        '</thead>'+
                        '<tbody>';
                var tmp;
                var i = 1;
                var time;
                for(tmp in diagnosis_history){
                    console.log(diagnosis_history[tmp]);
                    alert(diagnosis_history[tmp]['id']);
                    if(diagnosis_history[tmp]['time'] == 'M')
                        time = 'เช้า';
                    else if(diagnosis_history[tmp]['time'] == 'A')
                        time = 'บ่าย';

                    modalHistoryTable+=
                            '<tr>'+
                            '<td class="first">'+i+'</td>'+
                            '<td>'+diagnosis_history[tmp]['date']+'</td>'+
                            '<td>'+time+'</td>'+
                            '<td>'+diagnosis_history[tmp]['doctor']['name']+' '+diagnosis_history[tmp]['doctor']['surname']+'</td>'+
                            '<td>'+diagnosis_history[tmp]['doctor']['dept_id']+'</td>'+
                            '<td>'+diagnosis_history[tmp]['symptom']+'</td>'+
                            '<td><a type="button" class="btn btn-default view-history" historyId="'+tmp+'"><i class="fa fa-user"></i> ดูประวัติ</a></td>'+
                            '</tr>';
                }
                modalHistoryTable+='</tbody></table>';

//                modalHistoryTable = '<table id="modal-history-table" class="table table-striped table-bordered table-hover order-column first-no-column data-table">'+
//                        '<thead>'+
//                        '<tr>'+
//                        '<th class="first"> ครั้งที่ </th>'+
//                        '<th> วันที่ </th>'+
//                        '<th> ช่วง </th>'+
//                        '<th> แพทย์ </th>'+
//                        '<th> แผนก </th>'+
//                        '<th> อาการ </th>'+
//                        '<th></th>'+
//                        '</tr>'+
//                        '</thead>'+
//                        '<tbody>'+
//                        '<tr>'+
//                        '<td class="first">'+id+'</td>'+
//                        '<td>12/10/2559</td>'+
//                        '<td>เช้า</td>'+
//                        '<td>นายแพทย์สวัสดี หายไวไวนะ</td>'+
//                        '<td>แผนกหู คอ จมูก</td>'+
//                        '<td>ใกล้หายแล้ว ไม่รู้จะมาทำไม</td>'+
//                        '<td><a type="button" class="btn btn-default view-history" historyId="1"><i class="fa fa-user"></i> ดูประวัติ</a></td>'+
//                        '</tr>'+
//                        '</tbody>'+
//                        '</table>';
                $('#modal-history-table-container').append(modalHistoryTable);
                $('#modal-history-table').DataTable();
                $('#tab_modal_2_button').click();
            }).fail(function () {
            });
        });

        $(document).on('click','.goToModalTab3', function(){
            var id = $(this).attr('appointmentId');
            var step = $(this).attr('step');
            alert(id+" "+step);
            if(step == 1){
                $('#modal_tab3_physical_form').show();
                $('#modal_tab3_diagnosis_form').hide();
                $('#modal_tab3_medicine_form').hide();

                $('#physical-form-appointment-id').val(id);
            }
            else{
                $('#modal_tab3_physical_form').show();
                $('#modal_tab3_diagnosis_form').show();
                $('#modal_tab3_medicine_form').show();

                $('.physical-form').attr('disabled','disabled');
            }
            $('#tab_modal_3_button').click();
        });


        $(document).on('click','.view-history', function(){
            var historyId = $(this).attr('historyId');
//            alert(historyId);
            $('#history_detail_weight').text(diagnosis_history[historyId]['weight']+' กิโลกรัม');
            $('#history_detail').show();
        });



    </script>
@endsection

