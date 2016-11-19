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

    <link href="{{url('assets/global/plugins/ladda/ladda-themeless.min.css')}}" rel="stylesheet" type="text/css" />
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
        #history-detail-physical-data-body .row{
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
                                <a id="tab_modal_1_button" class="goToModalTab1" href="#tab_modal_1" data-toggle="tab">ข้อมูลส่วนตัว</a>
                            </li>
                            <li>
                                <a id="tab_modal_2_button" class="goToModalTab2" href="#tab_modal_2" data-toggle="tab">ประวัติการรักษา</a>
                            </li>
                            <li>
                                <a id="tab_modal_3_button" class="goToModalTab3" href="#tab_modal_3" data-toggle="tab">บันทึกข้อมูล</a>
                            </li>
                        </ul>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <!-- BEGIN profile DATA TAB -->
                            <div class="tab-pane active" id="tab_modal_1">
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
                                                    <div id="name_surname_big" class="profile-usertitle-name"> ชื่อสมมุต นามสกุลปลอม </div>
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
                                                                <span class="caption-subject font-blue-madison bold uppercase">ข้อมูลส่วนตัว</span>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <div class="tab-content">
                                                                <!-- PERSONAL INFO TAB -->
                                                                <div class="tab-pane active">
                                                                    <form id="profile-form" role="form" action="{{url('backend/Diagnosis/edit_allergic_medicine')}}" method="post">
                                                                        <div class="form-group form-md-line-input">
                                                                            <div id="hid" class="form-control form-control-static"> 555 </div>
                                                                            <label>หมายเลขประจำตัวผู้ป่วย</label>
                                                                        </div>
                                                                        <div class="form-group form-md-line-input">
                                                                            <div id="id" class="form-control form-control-static"> 1100110011001 </div>
                                                                            <label>หมายเลขบัตรประจำตัวประชาชน</label>
                                                                        </div>
                                                                        <hr>

                                                                        <div class="form-group form-md-line-input">
                                                                            <div id="name" class="form-control form-control-static"> ชื่อสมมุตจ้า </div>
                                                                            <label>ชื่อ</label>
                                                                        </div>
                                                                        <div class="form-group form-md-line-input">
                                                                            <div id="surname" class="form-control form-control-static"> นามสกุลปลอม </div>
                                                                            <label class="control-label">นามสกุล</label>
                                                                        </div>
                                                                        <div class="form-group form-md-line-input">
                                                                            <div id="gender" class="form-control form-control-static"><i id="gender_icon" class="fa fa-male" aria-hidden="true"></i> ชาย</div>
                                                                            <label class="control-label">เพศ</label>
                                                                        </div>
                                                                        <div class="form-group form-md-line-input">
                                                                            <div id="birthday" class="form-control form-control-static"> 1999 </div>
                                                                            <label class="control-label">วันเกิด</label>
                                                                        </div>
                                                                        <div class="form-group form-md-line-input">
                                                                            <div id="email" class="form-control form-control-static"> aaa@gmail.com </div>
                                                                            <label class="control-label">อีเมล</label>
                                                                        </div>
                                                                        <div class="form-group form-md-line-input">
                                                                            <div id="address" class="form-control form-control-static"> 52/55 fasd adas asd </div>
                                                                            <label class="control-label">ที่อยู่</label>
                                                                        </div>
                                                                        <div class="form-group form-md-line-input">
                                                                            <div id="phone_no" class="form-control form-control-static"> 0855555555 </div>
                                                                            <label class="control-label">หมายเลขโทรศัพท์เคลื่อนที่</label>
                                                                        </div>
                                                                        {{csrf_field()}}
                                                                        <input id="profile-form-patient-id" name="id" class="profile-form" type="hidden" required>
                                                                        <div class="form-group">
                                                                            <label class="control-label">ประวัติการแพ้ยา</label>
                                                                            <!--select name="drugAllergy[]" id="drugAllergy" class="form-control select2-multiple" multiple>
                                                                            </select-->
                                                                            <select id="drugAllergy_select2" class="form-control js-data-drugAllergy-ajax profile-form" name="drugAllergy[]" multiple>
                                                                            </select>
                                                                        </div>
                                                                        <div class="margiv-top-10">
                                                                            <button id="profile-form-submit-button" type="submit" class="btn green"> บันทึกการแก้ไข </button>
                                                                            <a class="btn default close-modal"> ยกเลิก </a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!-- END PERSONAL INFO TAB -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END PROFILE CONTENT -->
                                    </div>
                                </div>
                            </div>
                            <!-- END profile DATA TAB -->
                            <!-- BEGIN diagnosis history TAB -->
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
                                                <div id="history-detail-physical-data-body" class="portlet-body margin-bottom-20">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="col-md-5 bold">น้ำหนัก</label>
                                                            <div id="history_detail_weight" class="col-md-7">
                                                                70.00 กิโลกรัม
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="col-md-5 bold">ส่วนสูง</label>
                                                            <div id="history_detail_height" class="col-md-7">
                                                                170.00 เซนติเมตร
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="col-md-5 bold">อุณหภูมิร่างกาย</label>
                                                            <div id="history_detail_temperature"  class="col-md-7">
                                                                32 องศาเซลเซียส
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="col-md-5 bold">อัตราการเต้นของหัวใจ</label>
                                                            <div id="history_detail_heart_rate"  class="col-md-7">
                                                                80 ครั้ง/นาที
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="col-md-5 bold">ความดันซิสโทลิก</label>
                                                            <div id="history_detail_systolic"  class="col-md-7">
                                                                760 มิลลิเมตรปรอท
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="col-md-5 bold">ความดันไดแอสโทลิก</label>
                                                            <div id="history_detail_diastolic"  class="col-md-7">
                                                                766 มิลลเมตรปรอท
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
                                                                    </div>
                                                                    <div id="disease_container" class="col-md-12">
                                                                        <div class="disease">- โรคติดยา</div>
                                                                        <div class="disease">- โรคติดยา</div>
                                                                        <div class="disease">- โรคติดยา</div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group margin-top-20">
                                                                    <label class="bold margin-bottom-10">รายละเอียดของโรค</label>
                                                                    <p id="diagnosis_description">อาการหนักมาก งานเยอะมากอาการหนักมาก งานเยอะมากอาการหนักมาก งานเยอะมากอาการหนักมาก งานเยอะมากอาการหนักมาก งานเยอะมากอาการหนักมาก งานเยอะมากอาการหนักมาก งานเยอะมากอาการหนักมาก งานเยอะมากอาการหนักมาก งานเยอะมากอาการหนักมาก งานเยอะมาก</p>
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
                                                            </tr>
                                                            </thead>
                                                            <tbody id="medicine-container">
                                                            <tr class="medicine-list">
                                                                <td> 1 </td>
                                                                <td> MD22531 </td>
                                                                <td> Paracetamol </td>
                                                                <td> 350 </td>
                                                                <td> เม็ด </td>
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
                            <!-- END diagnosis history TAB -->

                            <!-- BEGIN diagnosis TAB -->
                            <div class="tab-pane" id="tab_modal_3">
                                <!-- BEGIN PHYSICAL DATA FORM -->
                                <div id="modal_tab3_physical_form" class="normal-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- BEGIN FORM -->
                                            <form id="physical-form" class="form-horizontal" action="{{url('backend/Diagnosis/add_physical_record')}}" method="post" role="form">
                                                {{csrf_field()}}
                                                <input id="physical-form-appointment-id" name="appointment_id" class="physical-form" type="hidden" required>
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
                                                                                <input class="form-control physical-form" name="weight" placeholder="กิโลกรัม" type="text" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">ส่วนสูง</label>
                                                                            <div class="col-md-7">
                                                                                <input class="form-control physical-form" name="height" placeholder="เซนติเมตร" type="text" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">อุณหภูมิร่างกาย</label>
                                                                            <div class="col-md-7">
                                                                                <input class="form-control physical-form" name="temperature" placeholder="องศาเซลเซียส" type="text" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">อัตราการเต้นของหัวใจ</label>
                                                                            <div class="col-md-7">
                                                                                <input class="form-control physical-form" name="heart_rate" placeholder="ครั้ง/นาที" type="text" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">ความดันซิสโทลิก</label>
                                                                            <div class="col-md-7">
                                                                                <input class="form-control physical-form" name="systolic" placeholder="มิลลิเมตรปรอท" type="text" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">ความดันไดแอสโทลิก</label>
                                                                            <div class="col-md-7">
                                                                                <input class="form-control physical-form" name="diastolic" placeholder="มิลลิเมตรปรอท" type="text" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="text-align: right;" id="physical-form-submit-row">
                                                    <div class="col-md-12">
                                                        <button type="submit" id="physical-form-submit-button" class="btn btn-success mt-ladda-btn ladda-button physical-form" data-style="expand-right">
                                                            <span class="ladda-label">บันทึกข้อมูล</span>
                                                            <span class="ladda-spinner"></span><span class="ladda-spinner"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- END FORM -->
                                        </div>
                                    </div>
                                </div>
                                <!-- END PHYSICAL DATA FORM -->
                                <form id="diagnosis-form" class="form-horizontal" action="{{url('backend/Diagnosis/add_diagnosis_record')}}" method="post" role="form">
                                    {{csrf_field()}}
                                    <input id="diagnosis-form-appointment-id" name="appointment_id" class="diagnosis-form" type="hidden" required>
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
                                                                <div class="form-body" style="padding-bottom: 0px; padding-top:10px;">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label">โรคที่วินิจฉัยได้</label>
                                                                            <div class="input-group input-group select2-bootstrap-append">
                                                                                <select id="disease_select2" class="form-control js-data-disease-ajax diagnosis-form" name="disease_select2[]" multiple required>
                                                                                    <!--option value="0" selected="selected">กรุณาระบุโรค</option-->
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <div class="col-md-12 margin-top-20">
                                                                            <label class="control-label">รายละเอียดของโรค</label>
                                                                            <textarea id="diagnosis_detail" name="diagnosis_detail" class="form-control diagnosis-form" rows="3" placeholder="กรุณาระบุรายละเอียดของโรค" required></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
                                                        <div id="medicine-search-row" class="form-body" style="padding-bottom: 0px; padding-top:10px;">
                                                            <div class="row">
                                                                <label class="col-md-3 control-label text-right">ค้นหารหัสยา หรือชื่อยา
                                                                    <span class="required" aria-required="true"> * </span>
                                                                </label>
                                                                <div class="col-md-7 margin-bottom-10">
                                                                    <div class="input-group select2-bootstrap-prepend">
                                                                        <select id="medicine_select2" class="form-control js-data-medicine-ajax diagnosis-form" multiple></select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <button id="add_medicine_button" type="button" class="btn btn-success">เพิ่ม</button>
                                                                </div>
                                                            </div>
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
                                                                    <th></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody id="medicine-table-body">
                                                                <tr id="medicine-row-empty" class="medicine-table-body-row">
                                                                    <td colspan="6" style="text-align: center;">ไม่มียาที่สั่ง</td>
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
                                    <div class="row" style="text-align: right;" id="diagnosis-form-submit-row">
                                        <div class="col-md-12">
                                            <button type="submit" id="diagnosis-form-submit-button" class="btn btn-success mt-ladda-btn ladda-button diagnosis-form" data-style="expand-right">
                                                <span class="ladda-label">บันทึกข้อมูล</span>
                                                <span class="ladda-spinner"></span><span class="ladda-spinner"></span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <form id="pharmacist-form" class="form-horizontal" action="{{url('backend/Diagnosis/give_medicine')}}" method="post" role="form">
                                    {{csrf_field()}}
                                    <input id="pharmacist-form-appointment-id" name="appointment_id" class="pharmacist-form" type="hidden" required>
                                    <div class="row" style="text-align: right;" id="pharmacist-form-submit-row">
                                        <div class="col-md-12">
                                            <button type="submit" id="pharmacist-form-submit-button" class="btn btn-success mt-ladda-btn ladda-button pharmacist-form" data-style="expand-right">
                                                <span class="ladda-label">จ่ายยา</span>
                                                <span class="ladda-spinner"></span><span class="ladda-spinner"></span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- END diagnosis TAB -->
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

    <script src="{{url('assets/global/plugins/ladda/spin.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/ladda/ladda.min.js')}}" type="text/javascript"></script>

    <script src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
@endsection

@section('pageLevelScripts')
    <script src="{{url('assets/pages/scripts/components-select2-diagnosis.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/pages/scripts/physical-form-validation.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/pages/scripts/diagnosis-form-validation.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            resetQueue();
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

        $(document).on('click','.close-modal', function(){
            $('#full').modal('hide');
        });

        $(document).on('click','.goToModalTab1', function(){
            var id = $(this).attr('patientId');
            var appId = $(this).attr('appointmentId');
            var step = $(this).attr('step');
            $('#profile-form-patient-id').val(id);

            $('#tab_modal_1_button').attr('patientId',id);
            $('#tab_modal_2_button').attr('patientId',id);
            $('#tab_modal_3_button').attr('appointmentId',appId);
            $('#tab_modal_1_button').attr('step',step);
            $('#tab_modal_2_button').attr('step',step);
            $('#tab_modal_3_button').attr('step',step);
//            alert(id);

            var URL_ROOT = '{{Request::root()}}';
            $.post(URL_ROOT+'/backend/Account/getProfile',
                    {id:  id, _token: '{{csrf_token()}}'}).done(function (input) {
                console.log("profile");
                console.log(input);
                $("#hid").text(input['id']);
                $("#id").text(input['ssn']);
                $("#name").text(input['name']);
                $("#surname").text(input['surname']);
                $("#name_surname_big").text(input['name']+" "+input['surname']);
                if(input['gender']=="m"){
                    $("#gender").html('<i id="gender_icon" class="fa fa-male" aria-hidden="true"></i> ชาย');
                }
                else{
                    $("#gender").html('<i id="gender_icon" class="fa fa-female" aria-hidden="true"></i> หญิง');
                }
                $("#birthday").text(input['birthday']);
                $("#email").text(input['email']);
                $("#address").text(input['address']);
                $("#phone_no").text(input['phone_no']);

                var $select = $('#drugAllergy_select2');
                $select.empty();
                $select.val('').trigger('change');
                var $option;
                for(var tmp in input['allergic_medicine']){
                    console.log("allergic_medicine_array => " + tmp);
                    $option = $('<option selected>'+input['allergic_medicine'][tmp]['medicine_name']+'</option>').val(input['allergic_medicine'][tmp]['medicine_id']);
                    $select.append($option);
                }
                $select.trigger('change');

//            $('#tab_modal_1_button').click();
                $('.nav-tabs li:eq(0) a').tab('show');
            }).fail(function () {
            });


        });

        var diagnosis_history;
        var modalHistoryTable;
        var allTableData;

        $(document).on('click','.goToModalTab2', function(){
            var id = $(this).attr('patientId');
            var appId = $(this).attr('appointmentId');
            var step = $(this).attr('step');
            $('#tab_modal_1_button').attr('patientId',id);
            $('#tab_modal_2_button').attr('patientId',id);
            $('#tab_modal_3_button').attr('appointmentId',appId);
            $('#tab_modal_1_button').attr('step',step);
            $('#tab_modal_2_button').attr('step',step);
            $('#tab_modal_3_button').attr('step',step);
            $('#history_detail').hide();
//            alert('ss'+id);
            var URL_ROOT = '{{Request::root()}}';
            $.post(URL_ROOT+'/backend/Diagnosis/view_diagnosis_record',
                    {patient_id:  id, _token: '{{csrf_token()}}'}).done(function (input) {
//                alert();
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
//                    alert(diagnosis_history[tmp]['id']);
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
//                $('#tab_modal_2_button').click();
                $('.nav-tabs li:eq(1) a').tab('show');
            }).fail(function () {
            });
        });

        $(document).on('click','.goToModalTab3', function(){
            var id = $(this).attr('appointmentId');
            var patientId = $(this).attr('patientId');
            var step = $(this).attr('step');
            $('#tab_modal_1_button').attr('patientId',patientId);
            $('#tab_modal_2_button').attr('patientId',patientId);
            $('#tab_modal_3_button').attr('appointmentId',id);
            $('#tab_modal_1_button').attr('step',step);
            $('#tab_modal_2_button').attr('step',step);
            $('#tab_modal_3_button').attr('step',step);
//            alert("goToModalTab3 "+id+" "+step);
            if(step == 1){
                clearPhysicalForm();
                clearDiagnosisForm();
                clearMedicineForm();

                $('.physical-form').removeAttr('disabled');
                $('.diagnosis-form').attr('disabled','disabled');
                $('.medicine-form').attr('disabled','disabled');
                $('.pharmacist-form').attr('disabled','disabled');

                $('#physical-form-submit-row').show();
                $('#diagnosis-form-submit-row').hide();
                $('#pharmacist-form-submit-row').hide();

                $('#physical-form').show();
                $('#diagnosis-form').hide();
                $('#pharmacist-form').hide();

                $('#medicine-search-row').show();

                $('#physical-form-appointment-id').val(id);
//                alert("step1 : " + $('#physical-form-appointment-id').val());
            }
            else if(step == 2){
                clearPhysicalForm();
                clearDiagnosisForm();
                clearMedicineForm();

                $('.physical-form').attr('disabled','disabled');
                $('.diagnosis-form').removeAttr('disabled');
                $('.medicine-form').removeAttr('disabled');
                $('.pharmacist-form').attr('disabled','disabled');

                $('#physical-form-submit-row').hide();
                $('#diagnosis-form-submit-row').show();
                $('#pharmacist-form-submit-row').hide();

                $('#physical-form').show();
                $('#diagnosis-form').show();
                $('#pharmacist-form').hide();

                $('#medicine-search-row').show();

                $('#diagnosis-form-appointment-id').val(id);

                $("input[name~='weight'].physical-form").val(allTableData['waiting_doctor'][id]['weight']);
                $("input[name~='height'].physical-form").val(allTableData['waiting_doctor'][id]['height']);
                $("input[name~='temperature'].physical-form").val(allTableData['waiting_doctor'][id]['temperature']);
                $("input[name~='heart_rate'].physical-form").val(allTableData['waiting_doctor'][id]['heart_rate']);
                $("input[name~='systolic'].physical-form").val(allTableData['waiting_doctor'][id]['systolic']);
                $("input[name~='diastolic'].physical-form").val(allTableData['waiting_doctor'][id]['diastolic']);
            }
            else{
                clearPhysicalForm();
                clearDiagnosisForm();
                clearMedicineForm();

                $('.physical-form').attr('disabled','disabled');
                $('.diagnosis-form').attr('disabled','disabled');
                $('.medicine-form').attr('disabled','disabled');
                $('.pharmacist-form').removeAttr('disabled');

                $('#physical-form-submit-row').hide();
                $('#diagnosis-form-submit-row').hide();
                $('#pharmacist-form-submit-row').show();

                $('#physical-form').show();
                $('#diagnosis-form').show();
                $('#pharmacist-form').show();

                $('#medicine-search-row').hide();


                $('#pharmacist-form-appointment-id').val(id);

                $("input[name~='weight'].physical-form").val(allTableData['waiting_pharmacist'][id]['weight']);
                $("input[name~='height'].physical-form").val(allTableData['waiting_pharmacist'][id]['height']);
                $("input[name~='temperature'].physical-form").val(allTableData['waiting_pharmacist'][id]['temperature']);
                $("input[name~='heart_rate'].physical-form").val(allTableData['waiting_pharmacist'][id]['heart_rate']);
                $("input[name~='systolic'].physical-form").val(allTableData['waiting_pharmacist'][id]['systolic']);
                $("input[name~='diastolic'].physical-form").val(allTableData['waiting_pharmacist'][id]['diastolic']);

                var $select = $('#disease_select2');
                $select.empty();
                $select.val('').trigger('change');
                var $option;
                for(var tmp in allTableData['waiting_pharmacist'][id]['disease']){
                    console.log("disease => " + tmp);
                    $option = $('<option selected>'+allTableData['waiting_pharmacist'][id]['disease'][tmp]['name']+'</option>').val(allTableData['waiting_pharmacist'][id]['disease'][tmp]['id']);
                    $select.append($option);
                }
                $select.trigger('change');

                $("textarea[name~='diagnosis_detail'].diagnosis-form").val(allTableData['waiting_pharmacist'][id]['diagnosis']);

                var medicine_order = allTableData['waiting_pharmacist'][id]['medicine'];
                var text_medicine, i=1;
                for(var tmp in medicine_order){
                    text_medicine +='<tr id="medicine-table-body-row-'+i+'" class="medicine-table-body-row" medicineId="'+medicine_order[tmp]['medicine_id']+'">'+
                            '    <td id="medicine-table-body-no-'+i+'">'+i+'</td>'+
                            '    <td>'+medicine_order[tmp]['medicine_id']+'</td>'+
                            '    <td>'+medicine_order[tmp]['business_name']+'</td>'+
                            '    <td class="form-group">'+medicine_order[tmp]['pivot']['amount']+'</td>'+
                            '    <td class="form-group">'+medicine_order[tmp]['pivot']['unit']+'</td>'+
                            '    <td></td>'+
                            '</tr>';
                    i++;
                }
                $('#medicine-row-empty').remove();
                if(medicineNo==1){
                    $('#medicine-table-body').append(text_medicine);
                }
                else{
                    $("#medicine-table-body").append('<tr id="medicine-row-empty" class="medicine-table-body-row"><td colspan="6" style="text-align: center;">ไม่มียาที่สั่ง</td></tr>');
                }


            }
//            $('#tab_modal_3_button').click();
            $('.nav-tabs li:eq(2) a').tab('show');
        });

///////////////////////////////////////ModelTab1////////////////////////////////////////////////

        $(document).on('click','#profile-form-submit-button', function(e) {
            if($('#profile-form').valid()) {
                e.preventDefault();
                var l = Ladda.create(this);
                l.start();
                function showSuccess(formData, jqForm, options) {
                    toastr['success']('แก้ไขข้อมูลการแพ้ยาสำเร็จ', "สำเร็จ");
                    l.stop();
                    $('#full').modal('hide');
                    return true;
                }

                function showError(responseText, statusText, xhr, $form) {
                    toastr['error']("กรุณาลองใหม่อีกครั้ง", "ผิดพลาด");
                    l.stop();
                    return true;
                }

                var options = {
                    success: showSuccess,
                    error: showError
                };
                $('#profile-form').ajaxSubmit(options);
                return false;
            }
        });

///////////////////////////////////////ModelTab2////////////////////////////////////////////////
        $(document).on('click','.view-history', function(){
            var historyId = $(this).attr('historyId');
//            alert(historyId);
            $('#history_detail_weight').text(diagnosis_history[historyId]['weight']+' กิโลกรัม');
            $('#history_detail_height').text(diagnosis_history[historyId]['height']+' เซนติเมตร');
            $('#history_detail_temperature').text(diagnosis_history[historyId]['temperature']+' องศาเซลเซียส');
            $('#history_detail_heart_rate').text(diagnosis_history[historyId]['heart_rate']+' ครั้ง/นาที');
            $('#history_detail_systolic').text(diagnosis_history[historyId]['systolic']+' มิลลิเมตรปรอท');
            $('#history_detail_diastolic').text(diagnosis_history[historyId]['diastolic']+' มิลลิเมตรปรอท');

            $('.disease').remove();
            for(var tmp in diagnosis_history[historyId]['disease']){
                $('#disease_container').append('<div class="disease">- '+diagnosis_history[historyId]['disease'][tmp]['name']+'</div>');
            }

            $('#diagnosis_description').text(diagnosis_history[historyId]['diagnosis']);

            $('.medicine-list').remove()
            var i=1;
            for(var tmp in diagnosis_history[historyId]['prescription']){
                $('#medicine-container').append('<tr class="medicine-list">'+
                        '<td> '+i+' </td>'+
                        '<td> '+diagnosis_history[historyId]['prescription'][tmp]['medicine_name']+' </td>'+
                        '<td> '+diagnosis_history[historyId]['prescription'][tmp]['business_name']+' </td>'+
                        '<td> '+diagnosis_history[historyId]['prescription'][tmp]['pivot']['amount']+' </td>'+
                        '<td> '+diagnosis_history[historyId]['prescription'][tmp]['pivot']['unit']+' </td>'+
                        '</tr>');
                i++;
            }
            $('#history_detail').show();
        });

///////////////////////////////////////ModelTab3////////////////////////////////////////////////

        //physical-form
        $(document).on('click','#physical-form-submit-button', function(e) {
//            alert("step1 : " + $('#physical-form-appointment-id').val());
//            alert('physical-form' + $('#physical-form-appointment-id').val());
            if($('#physical-form').valid()) {
//                alert('valid');
                e.preventDefault();
                var l = Ladda.create(this);
                l.start();
                function showSuccess(formData, jqForm, options) {
                    toastr['success']('บันทึกข้อมูลทางกายภาพสำเร็จ', "สำเร็จ");
                    l.stop();
                    resetQueue();
                    clearPhysicalForm();
//                    resetDrugList();
//                    resetResultList(keyword);
                    $('#full').modal('hide');
                    return true;
                }

                function showError(responseText, statusText, xhr, $form) {
                    toastr['error']("กรุณาลองใหม่อีกครั้ง", "ผิดพลาด");
                    l.stop();
//                    resetDrugList();
//                    resetResultList(keyword);
                    return true;
                }

                var options = {
                    success: showSuccess,
                    error: showError
                };
                $('#physical-form').ajaxSubmit(options);
                return false;
            }
        });

        function clearPhysicalForm(){
            $('.physical-form').val('');
            $('#physical-form').validate().resetForm();
        }

        function resetQueue(){
            var URL_ROOT = '{{Request::root()}}';

            $.get(URL_ROOT+'/backend/Diagnosis/queue',
                    {}).done(function (input) {
//                alert();
                console.log("allTableData");
                console.log(input);
                allTableData= input;
                /////////tab1_table/////////////////////////////////////
                $('#tab1_table_wrapper').remove();
                var waiting_staff_table ='<table id="tab1_table" class="table table-striped table-bordered table-hover order-column first-no-column data-table">'+
                        '<thead class="middle">'+
                        '<tr>'+
                        '    <th class="first"> ลำดับที่ </th>'+
                        '    <th> ชื่อ </th>'+
                        '    <th> นามสกุล </th>'+
                        '    <th> เพศ </th>'+
                        '    <th> อายุ </th>'+
                        '    <th> แผนก </th>'+
                        '    <th> อาการ </th>'+
                        '    <th class="last"></th>'+
                        '</tr>'+
                        '</thead>'+
                        '<tbody class="middle">';

                var tmp;
                var i = 1;
                var sexTH,sexEN;
                console.log(allTableData['waiting_staff']);
                var waiting_staff = allTableData['waiting_staff'];
                for(tmp in waiting_staff){
                    if(waiting_staff[tmp]['patient_info']['gender'] == 'm'){sexTH = 'ชาย'; sexEN = 'male';}
                    else{sexTH = 'หญิง'; sexEN = 'female';}

                    waiting_staff_table += '<tr>'+
                        '<td>'+i+'</td>'+
                        '<td>'+waiting_staff[tmp]['patient_info']['name']+'</td>'+
                        '<td>'+waiting_staff[tmp]['patient_info']['surname']+'</td>'+
                        '<td><i class="fa fa-'+sexEN+'" aria-hidden="true"></i> '+sexTH+'</td>'+
                        '<td>'+waiting_staff[tmp]['patient_info']['age']+'</td>'+
                        '<td>'+waiting_staff[tmp]['department']+'</td>'+
                        '<td>'+waiting_staff[tmp]['symptom']+'</td>'+
                        '<td class="last">'+
                        '    <a type="button" class="btn btn-default goToModalTab1" data-toggle="modal" href="#full" patientId="'+waiting_staff[tmp]['patient_info']['id']+'" appointmentId="'+waiting_staff[tmp]['id']+'" step="1"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</a>'+
                        '    <a type="button" class="btn btn-default goToModalTab2" data-toggle="modal" href="#full" patientId="'+waiting_staff[tmp]['patient_info']['id']+'" appointmentId="'+waiting_staff[tmp]['id']+'" step="1"><i class="fa fa-history"></i> ประวัติการรักษา</a>'+
                        '    <a type="button" class="btn btn-default goToModalTab3" data-toggle="modal" href="#full" patientId="'+waiting_staff[tmp]['patient_info']['id']+'" appointmentId="'+waiting_staff[tmp]['id']+'" step="1"><i class="fa fa-save"></i> บันทึกข้อมูล</a>'+
                        '</td>'+
                    '</tr>';
                    i++;
                }
                waiting_staff_table += '</tbody></table>';
                if(i==1)
                    $('#tab_1_1').append('<div class="row"><div id="tab1_table_wrapper" class="col-md-12" style="text-align:center;"><h3>ไม่มีผู้ป่วยรอตรวจข้อมูลทางกายภาพ</h3></div></div>');
                else
                    $('#tab_1_1').append(waiting_staff_table);

                $('#tab1_table').DataTable();

                /////////tab2_table/////////////////////////////////////
                $('#tab2_table_wrapper').remove();
                var waiting_doctor_table ='<table id="tab2_table" class="table table-striped table-bordered table-hover order-column first-no-column data-table">'+
                        '<thead class="middle">'+
                        '<tr>'+
                        '    <th class="first"> ลำดับที่ </th>'+
                        '    <th> ชื่อ </th>'+
                        '    <th> นามสกุล </th>'+
                        '    <th> เพศ </th>'+
                        '    <th> อายุ </th>'+
                        '    <th> แผนก </th>'+
                        '    <th> อาการ </th>'+
                        '    <th class="last"></th>'+
                        '</tr>'+
                        '</thead>'+
                        '<tbody class="middle">';

                i = 1;
                console.log(allTableData['waiting_doctor']);
                var waiting_doctor = allTableData['waiting_doctor'];
                for(tmp in waiting_doctor){
                    if(waiting_doctor[tmp]['patient_info']['gender'] == 'm'){sexTH = 'ชาย'; sexEN = 'male';}
                    else{sexTH = 'หญิง'; sexEN = 'female';}

                    waiting_doctor_table += '<tr>'+
                            '<td>'+i+'</td>'+
                            '<td>'+waiting_doctor[tmp]['patient_info']['name']+'</td>'+
                            '<td>'+waiting_doctor[tmp]['patient_info']['surname']+'</td>'+
                            '<td><i class="fa fa-'+sexEN+'" aria-hidden="true"></i> '+sexTH+'</td>'+
                            '<td>'+waiting_doctor[tmp]['patient_info']['age']+'</td>'+
                            '<td>'+waiting_doctor[tmp]['department']+'</td>'+
                            '<td>'+waiting_doctor[tmp]['symptom']+'</td>'+
                            '<td class="last">'+
                            '    <a type="button" class="btn btn-default goToModalTab1" data-toggle="modal" href="#full" patientId="'+waiting_doctor[tmp]['patient_info']['id']+'" appointmentId="'+waiting_doctor[tmp]['id']+'" step="2"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</a>'+
                            '    <a type="button" class="btn btn-default goToModalTab2" data-toggle="modal" href="#full" patientId="'+waiting_doctor[tmp]['patient_info']['id']+'" appointmentId="'+waiting_doctor[tmp]['id']+'" step="2"><i class="fa fa-history"></i> ประวัติการรักษา</a>'+
                            '    <a type="button" class="btn btn-default goToModalTab3" data-toggle="modal" href="#full" patientId="'+waiting_doctor[tmp]['patient_info']['id']+'" appointmentId="'+waiting_doctor[tmp]['id']+'" step="2"><i class="fa fa-save"></i> บันทึกข้อมูล</a>'+
                            '</td>'+
                            '</tr>';
                    i++;
                }
                waiting_doctor_table += '</tbody></table>';
                if(i==1)
                    $('#tab_1_2').append('<div class="row"><div id="tab2_table_wrapper" class="col-md-12" style="text-align:center;"><h3>ไม่มีผู้ป่วยรอตรวจรักษา</h3></div></div>');
                else
                    $('#tab_1_2').append(waiting_doctor_table);

                $('#tab2_table').DataTable();

                /////////tab3_table/////////////////////////////////////
                $('#tab3_table_wrapper').remove();
                var waiting_pharmacist_table ='<table id="tab3_table" class="table table-striped table-bordered table-hover order-column first-no-column data-table">'+
                        '<thead class="middle">'+
                        '<tr>'+
                        '    <th class="first"> ลำดับที่ </th>'+
                        '    <th> ชื่อ </th>'+
                        '    <th> นามสกุล </th>'+
                        '    <th> เพศ </th>'+
                        '    <th> อายุ </th>'+
                        '    <th> แผนก </th>'+
                        '    <th> อาการ </th>'+
                        '    <th class="last"></th>'+
                        '</tr>'+
                        '</thead>'+
                        '<tbody class="middle">';

                i = 1;
                console.log(allTableData['waiting_pharmacist']);
                var waiting_pharmacist = allTableData['waiting_pharmacist'];
                for(tmp in waiting_pharmacist){
                    if(waiting_pharmacist[tmp]['patient_info']['gender'] == 'm'){sexTH = 'ชาย'; sexEN = 'male';}
                    else{sexTH = 'หญิง'; sexEN = 'female';}

                    waiting_pharmacist_table += '<tr>'+
                            '<td>'+i+'</td>'+
                            '<td>'+waiting_pharmacist[tmp]['patient_info']['name']+'</td>'+
                            '<td>'+waiting_pharmacist[tmp]['patient_info']['surname']+'</td>'+
                            '<td><i class="fa fa-'+sexEN+'" aria-hidden="true"></i> '+sexTH+'</td>'+
                            '<td>'+waiting_pharmacist[tmp]['patient_info']['age']+'</td>'+
                            '<td>'+waiting_pharmacist[tmp]['department']+'</td>'+
                            '<td>'+waiting_pharmacist[tmp]['symptom']+'</td>'+
                            '<td class="last">'+
                            '    <a type="button" class="btn btn-default goToModalTab1" data-toggle="modal" href="#full" patientId="'+waiting_pharmacist[tmp]['patient_info']['id']+'" appointmentId="'+waiting_pharmacist[tmp]['id']+'" step="3"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</a>'+
                            '    <a type="button" class="btn btn-default goToModalTab2" data-toggle="modal" href="#full" patientId="'+waiting_pharmacist[tmp]['patient_info']['id']+'" appointmentId="'+waiting_pharmacist[tmp]['id']+'" step="3"><i class="fa fa-history"></i> ประวัติการรักษา</a>'+
                            '    <a type="button" class="btn btn-default goToModalTab3" data-toggle="modal" href="#full" patientId="'+waiting_pharmacist[tmp]['patient_info']['id']+'" appointmentId="'+waiting_pharmacist[tmp]['id']+'" step="3"><i class="fa fa-save"></i> บันทึกข้อมูล</a>'+
                            '</td>'+
                            '</tr>';
                    i++;
                }
                waiting_pharmacist_table += '</tbody></table>';
                if(i==1)
                    $('#tab_1_3').append('<div class="row"><div id="tab3_table_wrapper" class="col-md-12" style="text-align:center;"><h3>ไม่มีผู้ป่วยรอรับยา</h3></div></div>');
                else
                    $('#tab_1_3').append(waiting_pharmacist_table);

                $('#tab3_table').DataTable();

            }).fail(function () {
            });

        }

        //diagnosis-form

        function checkDuplicateMedicine(medicine_id){
            console.log('medicine_id = ' + medicine_id);
            for(var i = 1 ; i<medicineNo ; i++){
                var tmp_id = $('#medicine-table-body-row-'+i).attr("medicineId");
                console.log('tmp_id = ' + tmp_id + ' i = ' + i);
                if(medicine_id == tmp_id)
                    return false;
            }
            return true;
        }

        var medicineNo = 1;

        $(document).on('click','#add_medicine_button', function(){
//            alert('aaa');
            var medicineList = $('#medicine_select2').val();
            $("#medicine_select2").val('').trigger('change');
            console.log("medicineList");
            console.log(medicineList);
            var URL_ROOT = '{{Request::root()}}';
            for(medicine_id in medicineList){
                console.log("medicine_id ==> " + medicineList[medicine_id]);
                if(checkDuplicateMedicine(medicineList[medicine_id]))
                {
                    $.post(URL_ROOT+'/backend/Medicine/detail',
                            {medicine_id:  medicineList[medicine_id], _token: '{{csrf_token()}}'}).done(function (input) {
//                        alert('bbb');
                        console.log(input);
                        console.log('medicineNo = '+ medicineNo);
                        if(medicineNo==1){
                            $('#medicine-row-empty').remove();
                        }
                        var new_medicine = '<tr id="medicine-table-body-row-'+medicineNo+'" class="medicine-table-body-row" medicineId="'+input['medicine_id']+'">'+
                                '    <input id="medicine-table-body-row-id-'+medicineNo+'" type="hidden" value="'+input['medicine_id']+'" name="medicine['+medicineNo+'][id]" required>'+
                                '    <td id="medicine-table-body-no-'+medicineNo+'">'+medicineNo+'</td>'+
                                '    <td>'+input['medicine_id']+'</td>'+
                                '    <td>'+input['business_name']+'</td>'+
                                '    <td class="form-group"><input id="medicine-table-body-row-amount-'+medicineNo+'" class="touchspin form-control" type="text" value="" name="medicine['+medicineNo+'][amount]" required></td>'+
                                '    <td class="form-group"><input id="medicine-table-body-row-unit-'+medicineNo+'" class="form-control" type="text" value="" name="medicine['+medicineNo+'][unit]" required></td>'+
                                '    <td>'+
                                '        <a id="medicine-remove-button-'+medicineNo+'" class="btn red medicine-remove-button" medicineNo="'+medicineNo+'"> ลบ'+
                                '            <i class="fa fa-trash"></i>'+
                                '        </a>'+
                                '    </td>'+
                                '</tr>';
                        $('#medicine-table-body').append(new_medicine);
                        medicineNo ++;
                        $(".touchspin").TouchSpin({
                            min: 0,
                            step: 0.1,
                            decimals: 2,
                            boostat: 5,
                            maxboostedstep: 10
                        });
                    }).fail(function () {
                    });
                }

            }


        });

        $(document).on('click','.medicine-remove-button', function(){
            var nowNo = $(this).attr('medicineNo');
//            alert(nowNo);
            $("#medicine-table-body-row-"+nowNo).remove();
            for(var runNo = medicineNo;runNo > nowNo ; runNo--) {
                $("#medicine-table-body-row-" + runNo).attr("id", "medicine-table-body-row-"+(runNo-1));
                $("#medicine-table-body-no-" + runNo).text(runNo-1);
                $("#medicine-table-body-no-" + runNo).attr("id", "medicine-table-body-no-"+(runNo-1));
                $("#medicine-remove-button-" + runNo).attr("medicineNo", (runNo-1));
                $("#medicine-remove-button-" + runNo).attr("id", "medicine-remove-button-"+(runNo-1));

                $("#medicine-table-body-row-id-"+runNo).attr("name","medicine["+(runNo-1)+"][id]");
                $("#medicine-table-body-row-id-"+runNo).attr("id",runNo-1);
                $("#medicine-table-body-row-amount-"+runNo).attr("name","medicine["+(runNo-1)+"][amount]");
                $("#medicine-table-body-row-amount-"+runNo).attr("id",runNo-1);
                $("#medicine-table-body-row-unit-"+runNo).attr("name","medicine["+(runNo-1)+"][unit]");
                $("#medicine-table-body-row-unit-"+runNo).attr("id",runNo-1);
            }
            medicineNo-- ;
            if(medicineNo==1){
                $("#medicine-table-body").append('<tr id="medicine-row-empty" class="medicine-table-body-row"><td colspan="6" style="text-align: center;">ไม่มียาที่สั่ง</td></tr>');
            }
        });

        function clearDiagnosisForm(){
            $("#disease_select2").val('').trigger('change');
            $('#diagnosis_detail').val('');
            $('#diagnosis-form').validate().resetForm();
        }

        function clearMedicineForm(){
            $("#medicine_select2").val('').trigger('change');
            $(".medicine-table-body-row").remove();
            $("#medicine-table-body").append('<tr id="medicine-row-empty" class="medicine-table-body-row"><td colspan="6" style="text-align: center;">ไม่มียาที่สั่ง</td></tr>');
            medicineNo = 1;
            $('#diagnosis-form').validate().resetForm();
        }

        $(document).on('click','#diagnosis-form-submit-button', function(e) {
            if($('#diagnosis-form').valid()) {
                e.preventDefault();
                var l = Ladda.create(this);
                l.start();
                function showSuccess(formData, jqForm, options) {
                    toastr['success']('บันทึกข้อมูลการวินิจฉัยโรคและการสั่งยาสำเร็จ', "สำเร็จ");
                    l.stop();
                    resetQueue();
                    clearPhysicalForm();
                    clearDiagnosisForm();
                    clearMedicineForm();
                    $('#full').modal('hide');
                    return true;
                }

                function showError(responseText, statusText, xhr, $form) {
                    toastr['error']("กรุณาลองใหม่อีกครั้ง", "ผิดพลาด");
                    l.stop();
                    return true;
                }

                var options = {
                    success: showSuccess,
                    error: showError
                };
                $('#diagnosis-form').ajaxSubmit(options);
                return false;
            }
        });

        //pharmacist-form
        $(document).on('click','#pharmacist-form-submit-button', function(e) {
            if($('#pharmacist-form').valid()) {
                e.preventDefault();
                var l = Ladda.create(this);
                l.start();
                function showSuccess(formData, jqForm, options) {
                    toastr['success']('บันทึกข้อมูลการจ่ายยาสำเร็จ', "สำเร็จ");
                    l.stop();
                    resetQueue();
                    clearPhysicalForm();
                    clearDiagnosisForm();
                    clearMedicineForm();
                    $('#full').modal('hide');
                    return true;
                }

                function showError(responseText, statusText, xhr, $form) {
                    toastr['error']("กรุณาลองใหม่อีกครั้ง", "ผิดพลาด");
                    l.stop();
                    return true;
                }

                var options = {
                    success: showSuccess,
                    error: showError
                };
                $('#pharmacist-form').ajaxSubmit(options);
                return false;
            }
        });


    </script>
@endsection

