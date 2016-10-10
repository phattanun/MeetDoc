@extends('masterpage')

@section('accountNav')
    active
@endsection

@section('title')
    จัดการบัญชีผู้ใช้
@endsection

@section('title-inside')
    จัดการบัญชีผู้ใช้
@endsection

@section('pageLevelPluginsCSS')
    <link href="{{url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/ladda/ladda-themeless.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/pages/css/search.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('pageLevelCSS')
    <link href="{{url('assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/pages/css/officer.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="portlet light ">
        <div class="portlet-title">
            <div class="caption caption-md">
                <i class="icon-globe theme-font hide"></i>
                <span class="caption-subject font-blue-madison bold uppercase">แก้ไขบัญชีผู้ใช้</span>
            </div>
        </div>
        <div class="portlet-body">
            <div class="row text-left">
                <div class="col-md-9">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2 control-label text-right">ค้นหาบัญชีผู้ใช้
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-8 margin-bottom-9">
                                <input class="form-control" name="" placeholder="กรุณากรอกหมายเลขบัตรประจำตัวผู้ป่วย, รหัสบัตรประจำตัวประชาชน ชื่อ, หรือนามสกุล">
                            </div>
                            <div class="col-md-2">
                                <div class="form-actions right1">
                                    <button type="button" class="btn btn-success mt-ladda-btn ladda-button" data-style="expand-right">
                                        <span class="ladda-label">ค้นหา</span>
                                        <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END PROFILE CONTENT -->
    <div class="portlet light ">
        <div class="portlet-title">
            <div class="caption caption-md">
                <i class="icon-globe theme-font hide"></i>
                <span class="caption-subject font-blue-madison bold uppercase">ผลการค้นหา "พัทธนันท์"</span>
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr >
                        <th>ลำดับที่</th>
                        <th>รหัสโรงพยาบาล</th>
                        <th>รหัสบัตรประจำตัวประชาชน</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td> 1 </td>
                        <td> HS001 </td>
                        <td> 1959800098399 </td>
                        <td> นายแพทย์พัทธนันท์ </td>
                        <td> อัครพันธุ์ธัช </td>
                        <td>
                            <a href="{{url('account/manage/1')}}" id="edit-account-id" type="button" class="btn btn-warning" >แก้ไข</a>
                        </td>
                        <td>
                            <button id="remove-account-id" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button>
                        </td>
                    </tr>
                    <tr>
                        <td> 2 </td>
                        <td> HS002 </td>
                        <td> 1959800098399 </td>
                        <td> นายแพทย์พัทธนันท์ </td>
                        <td> อัครพันธุ์ธัช </td>
                        <td>
                            <a href="{{url('account/manage/1')}}" id="edit-account-id" type="button" class="btn btn-warning" >แก้ไข</a>
                        </td>
                        <td>
                            <button id="remove-account-id" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button>
                        </td>
                    </tr>
                    <tr>
                        <td> 3 </td>
                        <td> HS003 </td>
                        <td> 1959800098399 </td>
                        <td> นายแพทย์พัทธนันท์ </td>
                        <td> อัครพันธุ์ธัช </td>
                        <td>
                            <a href="{{url('account/manage/1')}}" id="edit-account-id" type="button" class="btn btn-warning" >แก้ไข</a>
                        </td>
                        <td>
                            <button id="remove-account-id" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button>
                        </td>
                    </tr>
                    <tr>
                        <td> 4 </td>
                        <td> HS004 </td>
                        <td> 1959800098399 </td>
                        <td> นายแพทย์พัทธนันท์ </td>
                        <td> อัครพันธุ์ธัช </td>
                        <td>
                            <a href="{{url('account/manage/1')}}" id="edit-account-id" type="button" class="btn btn-warning" >แก้ไข</a>
                        </td>
                        <td>
                            <button id="remove-account-id" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button>
                        </td>
                    </tr>
                    <tr>
                        <td> 5 </td>
                        <td> HS005 </td>
                        <td> 1959800098399 </td>
                        <td> นายแพทย์พัทธนันท์ </td>
                        <td> อัครพันธุ์ธัช </td>
                        <td>
                            <a href="{{url('account/manage/1')}}" id="edit-account-id" type="button" class="btn btn-warning" >แก้ไข</a>
                        </td>
                        <td>
                            <button id="remove-account-id" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="search-pagination text-right">
                <ul class="pagination">
                    <li class="page-active">
                        <a href="javascriptt:;"> 1 </a>
                    </li>
                    <li>
                        <a href="javascriptt:;"> 2 </a>
                    </li>
                    <li>
                        <a href="javascriptt:;"> 3 </a>
                    </li>
                    <li>
                        <a href="javascriptt:;"> 4 </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>  <!-- END PROFILE CONTENT -->

    <div class="portlet light ">
        <div class="portlet-title">
            <div class="caption caption-md">
                <i class="icon-globe theme-font hide"></i>
                <span class="caption-subject font-blue-madison bold uppercase">รายการบัญชีผู้ใช้ทั้งหมด</span>
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr >
                        <th>ลำดับที่</th>
                        <th>รหัสโรงพยาบาล</th>
                        <th>รหัสบัตรประจำตัวประชาชน</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td> 1 </td>
                        <td> HS001 </td>
                        <td> 1959800098399 </td>
                        <td> นายแพทย์พัทธนันท์ </td>
                        <td> อัครพันธุ์ธัช </td>
                        <td>
                            <a href="{{url('account/manage/1')}}" id="edit-account-id" type="button" class="btn btn-warning" >แก้ไข</a>
                        </td>
                        <td>
                            <button id="remove-account-id" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button>
                        </td>
                    </tr>
                    <tr>
                        <td> 2 </td>
                        <td> HS002 </td>
                        <td> 1959800098399 </td>
                        <td> นายแพทย์พัทธนันท์ </td>
                        <td> อัครพันธุ์ธัช </td>
                        <td>
                            <a href="{{url('account/manage/1')}}" id="edit-account-id" type="button" class="btn btn-warning" >แก้ไข</a>
                        </td>
                        <td>
                            <button id="remove-account-id" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button>
                        </td>
                    </tr>
                    <tr>
                        <td> 3 </td>
                        <td> HS003 </td>
                        <td> 1959800098399 </td>
                        <td> นายแพทย์พัทธนันท์ </td>
                        <td> อัครพันธุ์ธัช </td>
                        <td>
                            <a href="{{url('account/manage/1')}}" id="edit-account-id" type="button" class="btn btn-warning" >แก้ไข</a>
                        </td>
                        <td>
                            <button id="remove-account-id" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button>
                        </td>
                    </tr>
                    <tr>
                        <td> 4 </td>
                        <td> HS004 </td>
                        <td> 1959800098399 </td>
                        <td> นายแพทย์พัทธนันท์ </td>
                        <td> อัครพันธุ์ธัช </td>
                        <td>
                            <a href="{{url('account/manage/1')}}" id="edit-account-id" type="button" class="btn btn-warning" >แก้ไข</a>
                        </td>
                        <td>
                            <button id="remove-account-id" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button>
                        </td>
                    </tr>
                    <tr>
                        <td> 5 </td>
                        <td> HS005 </td>
                        <td> 1959800098399 </td>
                        <td> นายแพทย์พัทธนันท์ </td>
                        <td> อัครพันธุ์ธัช </td>
                        <td>
                            <a href="{{url('account/manage/1')}}" id="edit-account-id" type="button" class="btn btn-warning" >แก้ไข</a>
                        </td>
                        <td>
                            <button id="remove-account-id" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="search-pagination text-right">
                <ul class="pagination">
                    <li class="page-active">
                        <a href="javascriptt:;"> 1 </a>
                    </li>
                    <li>
                        <a href="javascriptt:;"> 2 </a>
                    </li>
                    <li>
                        <a href="javascriptt:;"> 3 </a>
                    </li>
                    <li>
                        <a href="javascriptt:;"> 4 </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END PROFILE CONTENT -->

    <div id="removeModal" class="modal fade" tabindex="-1" data-width="480">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">ลบบัญชีผู้ใช้ของนายพัทธนันท์ อัครพันธุ์ธัช</h4>
        </div>
        <div class="modal-body">
            <div class="caption text-center">
                <i class="glyphicon glyphicon-alert font-red"></i>
                <span class="caption-subject font-red sbold uppercase">ท่านแน่ใจหรือไม่ว่าต้องการลบบัญชีผู้ใช้นี้</span>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success mt-ladda-btn ladda-button" data-style="expand-right">
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
    <script src="{{url('assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/ladda/spin.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/ladda/ladda.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js')}}" type="text/javascript"></script>
@endsection

@section('pageLevelScripts')
    <script src="{{url('assets/pages/scripts/components-select2-drug.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/pages/scripts/components-bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/pages/scripts/components-date-time-pickers.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/pages/scripts/ui-extended-modals.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/pages/scripts/ui-buttons.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/pages/scripts/search.min.js')}}" type="text/javascript"></script>
    <script>
        $('tbody tr').click(function () {
            $('#appDetailModal').modal()
        });
    </script>
@endsection

