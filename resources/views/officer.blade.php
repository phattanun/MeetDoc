@extends('masterpage')

@section('officerNav')
    active
@endsection

@section('title')
    จัดการแผนกและสิทธิ์บุคลากร
@endsection

@section('title-inside')
    จัดการแผนกและสิทธิ์บุคลากร
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
                <span class="caption-subject font-blue-madison bold uppercase">เพิ่มบุคลากร</span>
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
                            <div class="col-md-9 margin-bottom-10">
                                <div class="input-group input-group select2-bootstrap-prepend">
                                    <select id="select2-button-addons-single-input-group" class="form-control js-data-example-ajax"  >
                                        <option value="" selected="selected">กรุณากรอกหมายเลขบัตรประจำตัวผู้ป่วย, รหัสบัตรประจำตัวประชาชน ชื่อ, หรือนามสกุล</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-actions right1">
                                    <button type="button" class="btn btn-success mt-ladda-btn ladda-button" data-style="expand-right">
                                        <span class="ladda-label">เพิ่ม</span>
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
                <span class="caption-subject font-blue-madison bold uppercase">รายการบุคลากรทั้งหมด</span>
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr >
                        <th style="vertical-align:middle" rowspan="2">ลำดับที่</th>
                        <th style="vertical-align:middle" rowspan="2">รหัสโรงพยาบาล</th>
                        <th style="vertical-align:middle" rowspan="2">รหัสบัตรประจำตัวประชาชน</th>
                        <th style="vertical-align:middle" rowspan="2">ชื่อ</th>
                        <th style="vertical-align:middle" rowspan="2">นามสกุล</th>
                        <th style="vertical-align:middle;" rowspan="2">แผนก</th>
                        <th class="text-center" colspan="5">สิทธิ์ในการจัดการ<br></th>
                        <th rowspan="2"></th>
                    </tr>
                    <tr class="text-center">
                        <th>ผู้ป่วย</th>
                        <th>แพทย์</th>
                        <th>พยาบาล</th>
                        <th>เภสัช</th>
                        <th>เจ้าหน้าที่</th>
                    </tr>
                    </thead>
                    <tbody><?php echo $users_list ?></tbody>
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
            <h4 class="modal-title">ลบสถานะบุคลากรของนายแพทย์พัทธนันท์ อัครพันธุ์ธัช</h4>
        </div>
        <div class="modal-body">
            <div class="caption text-center">
                <i class="glyphicon glyphicon-alert font-red"></i>
                <span class="caption-subject font-red sbold uppercase">ท่านแน่ใจหรือไม่ว่าต้องการลบสถานะบุคลากรของบัญชีผู้ใช้นี้</span>
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
