@extends('masterpage')

@section('diseaseNav')
    active
@endsection

@section('title')
    จัดการข้อมูลรหัสโรค
@endsection

@section('title-inside')
    จัดการข้อมูลรหัสโรค
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
    <link href="{{url('assets/pages/css/appHistory.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="portlet light ">
        <div class="portlet-title">
            <div class="caption caption-md">
                <i class="icon-globe theme-font hide"></i>
                <span class="caption-subject font-blue-madison bold uppercase">ค้นหารหัสโรคที่ต้องการดู/แก้ไข/ลบข้อมูล</span>
            </div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2 control-label text-right">โรค
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-10">
                                <input class="form-control" name="" placeholder="กรุณากรอกชื่อโรค รหัสโรค SNOMED, รหัสโรค ICD10 หรือรหัสโรค DRG" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-actions right1">
                        <button type="button" class="btn btn-success mt-ladda-btn ladda-button" data-style="expand-right">
                            <span class="ladda-label">ค้นหา</span>
                            <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                        <button type="button" class="btn default">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portlet light ">
        <div class="portlet-title">
            <div class="caption caption-md">
                <i class="icon-globe theme-font hide"></i>
                <span class="caption-subject font-blue-madison bold uppercase">ผลการค้นหา "Smallpox"</span>
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th> ลำดับที่ </th>
                        <th> ICD10 </th>
                        <th> SNOMED </th>
                        <th> DRG </th>
                        <th> ชื่อโรค </th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td> 1 </td>
                        <td> D01 </td>
                        <td> SN01</td>
                        <td> SN01</td>
                        <td> Smallpox </td>
                        <td> <button type="button" class="btn blue" data-toggle="modal" data-target="#viewModal">ดู</button> </td>
                        <td> <button type="button" class="btn yellow-crusta" data-toggle="modal" data-target="#editModal">แก้ไข</button> </td>
                        <td> <button id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button></td>
                    </tr>
                    <tr>
                        <td> 2 </td>
                        <td> D02 </td>
                        <td> SN02 </td>
                        <td> SN02 </td>
                        <td> Smallpox </td>
                        <td> <button type="button" class="btn blue" data-toggle="modal" data-target="#viewModal">ดู</button> </td>
                        <td> <button type="button" class="btn yellow-crusta" data-toggle="modal" data-target="#editModal">แก้ไข</button> </td>
                        <td> <button id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button></td>
                    </tr>
                    <tr>
                        <td> 3 </td>
                        <td> D03 </td>
                        <td> SN03 </td>
                        <td> SN03 </td>
                        <td> Smallpox </td>
                        <td> <button type="button" class="btn blue" data-toggle="modal" data-target="#viewModal">ดู</button> </td>
                        <td> <button type="button" class="btn yellow-crusta" data-toggle="modal" data-target="#editModal">แก้ไข</button> </td>
                        <td> <button id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button></td>
                    <tr>
                        <td> 4 </td>
                        <td> D04 </td>
                        <td> SN04 </td>
                        <td> SN04 </td>
                        <td> Smallpox </td>
                        <td> <button type="button" class="btn blue" data-toggle="modal" data-target="#viewModal">ดู</button> </td>
                        <td> <button type="button" class="btn yellow-crusta" data-toggle="modal" data-target="#editModal">แก้ไข</button> </td>
                        <td> <button id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button></td>
                    </tr>
                    <tr>
                        <td> 5 </td>
                        <td> D05 </td>
                        <td> SN05 </td>
                        <td> SN05 </td>
                        <td> Smallpox </td>
                        <td> <button type="button" class="btn blue" data-toggle="modal" data-target="#viewModal">ดู</button> </td>
                        <td> <button type="button" class="btn yellow-crusta" data-toggle="modal" data-target="#editModal">แก้ไข</button> </td>
                        <td> <button id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button></td>
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
    <div class="portlet light ">
        <div class="portlet-title">
            <div class="caption caption-md">
                <i class="icon-globe theme-font hide"></i>
                <span class="caption-subject font-blue-madison bold uppercase">รายการรหัสโรคทั้งหมด</span>
            </div>
            <div class="text-right"> <button type="button" class="btn green" data-toggle="modal" data-target="#addModal">เพิ่มข้อมูลรหัสโรค</button></div>
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th> ลำดับที่ </th>
                        <th> ICD10 </th>
                        <th> SNOMED </th>
                        <th> DRG </th>
                        <th> ชื่อโรค </th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td> 1 </td>
                        <td> D01 </td>
                        <td> SN01</td>
                        <td> SN01</td>
                        <td> Smallpox </td>
                        <td> <button type="button" class="btn blue" data-toggle="modal" data-target="#viewModal">ดู</button> </td>
                        <td> <button type="button" class="btn yellow-crusta" data-toggle="modal" data-target="#editModal">แก้ไข</button> </td>
                        <td> <button id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button></td>
                    </tr>
                    <tr>
                        <td> 2 </td>
                        <td> D02 </td>
                        <td> SN02 </td>
                        <td> SN02 </td>
                        <td> Smallpox </td>
                        <td> <button type="button" class="btn blue" data-toggle="modal" data-target="#viewModal">ดู</button> </td>
                        <td> <button type="button" class="btn yellow-crusta" data-toggle="modal" data-target="#editModal">แก้ไข</button> </td>
                        <td> <button id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button></td>
                    </tr>
                    <tr>
                        <td> 3 </td>
                        <td> D03 </td>
                        <td> SN03 </td>
                        <td> SN03 </td>
                        <td> Smallpox </td>
                        <td> <button type="button" class="btn blue" data-toggle="modal" data-target="#viewModal">ดู</button> </td>
                        <td> <button type="button" class="btn yellow-crusta" data-toggle="modal" data-target="#editModal">แก้ไข</button> </td>
                        <td> <button id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button></td>
                    <tr>
                        <td> 4 </td>
                        <td> D04 </td>
                        <td> SN04 </td>
                        <td> SN04 </td>
                        <td> Smallpox </td>
                        <td> <button type="button" class="btn blue" data-toggle="modal" data-target="#viewModal">ดู</button> </td>
                        <td> <button type="button" class="btn yellow-crusta" data-toggle="modal" data-target="#editModal">แก้ไข</button> </td>
                        <td> <button id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button></td>
                    </tr>
                    <tr>
                        <td> 5 </td>
                        <td> D05 </td>
                        <td> SN05 </td>
                        <td> SN05 </td>
                        <td> Smallpox </td>
                        <td> <button type="button" class="btn blue" data-toggle="modal" data-target="#viewModal">ดู</button> </td>
                        <td> <button type="button" class="btn yellow-crusta" data-toggle="modal" data-target="#editModal">แก้ไข</button> </td>
                        <td> <button id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button></td>
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

    <div id="viewModal" class="modal fade" tabindex="-1" data-width="760">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">ข้อมูลรหัสโรค ICD10: D01, SNOMED: SN01, DRG: DRG01</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="form_control_1">รหัสโรค ICD10</label>
                    <div class="col-md-9">
                        <input class="form-control" readonly="" value="D01" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="form_control_1">รหัสโรค SNOMED</label>
                    <div class="col-md-9">
                        <input class="form-control" readonly="" value="SN01" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="form_control_1">รหัสโรค DRG</label>
                    <div class="col-md-9">
                        <input class="form-control" readonly="" value="SN01" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="form_control_1">ชื่อโรค</label>
                    <div class="col-md-9">
                        <input class="form-control" readonly="" value="Smallpox" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-outline dark">ย้อนกลับ</button>
        </div>
    </div>


    <div id="editModal" class="modal fade" tabindex="-1" data-width="760">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">แก้ไขข้อมูลรหัสโรค ICD10: D01, SNOMED: SN01, DRG: DRG01</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="form_control_1">รหัสโรค ICD10</label>
                    <div class="col-md-9">
                        <input class="form-control"  value="D01" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="form_control_1">รหัสโรค SNOMED</label>
                    <div class="col-md-9">
                        <input class="form-control" value="SN01" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="form_control_1">รหัสโรค DRG</label>
                    <div class="col-md-9">
                        <input class="form-control" value="SN01" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="form_control_1">ชื่อโรค</label>
                    <div class="col-md-9">
                        <input class="form-control"  value="Smallpox" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success mt-ladda-btn ladda-button" data-style="expand-right">
                <span class="ladda-label">ยืนยัน</span>
                <span class="ladda-spinner"></span><span class="ladda-spinner"></span></button>
            <button type="button" data-dismiss="modal" class="btn btn-outline dark">ย้อนกลับ</button>
        </div>
    </div>


    <div id="addModal" class="modal fade" tabindex="-1" data-width="760">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">เพิ่มข้อมูลรหัสโรค</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="form_control_1">รหัสโรค ICD10</label>
                    <div class="col-md-9">
                        <input class="form-control"  value="" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="form_control_1">รหัสโรค SNOMED</label>
                    <div class="col-md-9">
                        <input class="form-control" value="" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="form_control_1">รหัสโรค DRG</label>
                    <div class="col-md-9">
                        <input class="form-control" value="" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="form_control_1">ชื่อโรค</label>
                    <div class="col-md-9">
                        <input class="form-control"  value="" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success mt-ladda-btn ladda-button" data-style="expand-right">
                <span class="ladda-label">ยืนยัน</span>
                <span class="ladda-spinner"></span><span class="ladda-spinner"></span></button>
            <button type="button" data-dismiss="modal" class="btn btn-outline dark">ย้อนกลับ</button>
        </div>
    </div>


    <div id="removeModal" class="modal fade" tabindex="-1" data-width="480">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">ลบข้อมูลรหัสโรค ICD10: D01, SNOMED: SN01, DRG:01</h4>
        </div>
        <div class="modal-body">
            <div class="caption text-center">
                <i class="glyphicon glyphicon-alert font-red"></i>
                <span class="caption-subject font-red sbold uppercase">ท่านแน่ใจหรือไม่ว่าต้องการลบข้อมูลรหัสโรคนี้</span>
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

