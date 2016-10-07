@extends('masterpage')

@section('futureAppNav')
    active
@endsection

@section('title')
    การนัดหมายในอนาคต
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
@endsection

@section('pageLevelCSS')
    <link href="{{url('assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/pages/css/appHistory.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
            <!-- END PROFILE CONTENT -->
                        <div class="portlet light ">
                            <div class="portlet-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th> ลำดับที่ </th>
                                            <th> รหัสการนัดหมาย </th>
                                            <th> วันที่ </th>
                                            <th> ช่วงเวลา </th>
                                            <th> แผนก </th>
                                            <th> แพทย์ </th>
                                            <th>  </th>
                                            <th>  </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td> 1 </td>
                                            <td> AP01 </td>
                                            <td> 06/10/2016 </td>
                                            <td> เช้า </td>
                                            <td> หัวใจและหลอดเลือด </td>
                                            <td> นายแพทย์พัทธนันท์ อัครพันธุ์ธัช </td>
                                            <td> <button type="button" class="btn blue">เลื่อน</button> </td>
                                            <td> <a id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#cancelAppModal">ยกเลิก</a></td>
                                        </tr>
                                        <tr>
                                            <td> 2 </td>
                                            <td> AP02 </td>
                                            <td> 06/10/2016 </td>
                                            <td> เช้า </td>
                                            <td> หัวใจและหลอดเลือด </td>
                                            <td> นายแพทย์พัทธนันท์ อัครพันธุ์ธัช </td>
                                            <td> <button type="button" class="btn blue">เลื่อน</button> </td>
                                            <td> <a id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#cancelAppModal">ยกเลิก</a></td>
                                        </tr>
                                        <tr>
                                            <td> 3 </td>
                                            <td> AP03 </td>
                                            <td> 06/10/2016 </td>
                                            <td> บ่าย </td>
                                            <td> หัวใจและหลอดเลือด </td>
                                            <td> นายแพทย์พัทธนันท์ อัครพันธุ์ธัช </td>
                                            <td> <button type="button" class="btn blue">เลื่อน</button> </td>
                                            <td> <a id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#cancelAppModal">ยกเลิก</a></td>
                                        <tr>
                                            <td> 4 </td>
                                            <td> AP04 </td>
                                            <td> 06/10/2016 </td>
                                            <td> เช้า </td>
                                            <td> หัวใจและหลอดเลือด </td>
                                            <td> นายแพทย์พัทธนันท์ อัครพันธุ์ธัช </td>
                                            <td> <button type="button" class="btn blue">เลื่อน</button> </td>
                                            <td> <a id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#cancelAppModal">ยกเลิก</a></td>
                                        </tr>
                                        <tr>
                                            <td> 5 </td>
                                            <td> AP05 </td>
                                            <td> 06/10/2016 </td>
                                            <td> เช้า </td>
                                            <td> หัวใจและหลอดเลือด </td>
                                            <td> นายแพทย์พัทธนันท์ อัครพันธุ์ธัช </td>
                                            <td> <button type="button" class="btn blue">เลื่อน</button> </td>
                                            <td> <a id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#cancelAppModal">ยกเลิก</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
            <!-- END PROFILE CONTENT -->

    <div id="cancelAppModal" class="modal fade" tabindex="-1" data-width="320">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">ยกเลิกการนัดหมายรหัส AP01</h4>
        </div>
        <div class="modal-body">
            <div class="caption text-center">
                <i class="glyphicon glyphicon-alert font-red"></i>
                <span class="caption-subject font-red sbold uppercase">ท่านแน่ใจหรือไม่ว่าต้องการยกเลิกการนัดหมายนี้</span>
            </div>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn red" data-toggle="modal" data-target="#emailConfirmAlertModal">ยืนยัน</button>
            <button type="button" data-dismiss="modal" class="btn btn-outline dark">ย้อนกลับ</button>
        </div>
    </div>
    <div id="emailConfirmAlertModal" data-backdrop="static" class="modal fade" tabindex="-1" data-focus-on="input:first">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">ยืนยันการยกเลิกการนัดหมายทางอีเมล</h4>
        </div>
        <div class="modal-body">
            <div class="caption text-center">
                <i class="glyphicon glyphicon-alert font-red"></i>
                <span class="caption-subject font-red sbold uppercase">ระบบจะส่งจดหมายยืนยันการยกเลิกการนัดหมายไปทางอีเมลของท่าน <br>กรุณายืนยันภายใน 15 นาที</span>
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{url('/')}}" type="button" class="btn green">รับทราบ</a>
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
    <script src="{{url('assets/pages/scripts/components-select2-profile.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/pages/scripts/components-bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/pages/scripts/components-date-time-pickers.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/pages/scripts/ui-extended-modals.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/pages/scripts/ui-buttons.min.js')}}" type="text/javascript"></script>
    <script>
        $('tbody tr').click(function () {
            $('#appDetailModal').modal()
        });
    </script>
@endsection

