@extends('masterpage')

@section('pastAppNav')
    active
@endsection

@section('title')
    ประวัติการนัดหมายในอดีต
@endsection

@section('title-inside')
    ประวัติการนัดหมายในอดีต
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
                                        </tr>
                                        <tr>
                                            <td> 2 </td>
                                            <td> AP02 </td>
                                            <td> 06/10/2016 </td>
                                            <td> เช้า </td>
                                            <td> หัวใจและหลอดเลือด </td>
                                            <td> นายแพทย์พัทธนันท์ อัครพันธุ์ธัช </td>
                                        </tr>
                                        <tr>
                                            <td> 3 </td>
                                            <td> AP03 </td>
                                            <td> 06/10/2016 </td>
                                            <td> บ่าย </td>
                                            <td> หัวใจและหลอดเลือด </td>
                                            <td> นายแพทย์พัทธนันท์ อัครพันธุ์ธัช </td>
                                        <tr>
                                            <td> 4 </td>
                                            <td> AP04 </td>
                                            <td> 06/10/2016 </td>
                                            <td> เช้า </td>
                                            <td> หัวใจและหลอดเลือด </td>
                                            <td> นายแพทย์พัทธนันท์ อัครพันธุ์ธัช </td>
                                        </tr>
                                        <tr>
                                            <td> 5 </td>
                                            <td> AP05 </td>
                                            <td> 06/10/2016 </td>
                                            <td> เช้า </td>
                                            <td> หัวใจและหลอดเลือด </td>
                                            <td> นายแพทย์พัทธนันท์ อัครพันธุ์ธัช </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
            <!-- END PROFILE CONTENT -->

    <div id="appDetailModal" class="modal fade" tabindex="-1" data-width="760">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">ประวัติการนัดหมายรหัส AP01</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">แผนก</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="หัวใจและหลอดเลือด" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">แพทย์</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="นายพัทธนันท์ อัครพันธุ์ธัช" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">อาการ</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="หัวใจมันเต้นแรงจนแทบทนไม่ไหว" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">วันที่</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="06/10/2016" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ช่วงเวลา</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="เช้า" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ผลการวินิจจัย</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="โรคหัวใจ" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">รหัสโรค</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="DS444" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">รายการยา</label>
                    <div class="col-md-10">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th> ลำดับที่ </th>
                                    <th> ชื่อยา </th>
                                    <th> ปริมาณ </th>
                                    <th> หน่วย </th>
                                    <th> วิธีใช้ </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td> 1 </td>
                                    <td> Paracetamol </td>
                                    <td> 5 </td>
                                    <td> เม็ด/5mg </td>
                                    <td> กลืนพร้อมน้ำปริมาณมาก </td>
                                </tr>
                                <tr>
                                    <td> 2 </td>
                                    <td> Paracetamol </td>
                                    <td> 5 </td>
                                    <td> เม็ด/5mg </td>
                                    <td> กลืนพร้อมน้ำปริมาณมาก </td>
                                </tr>
                                <tr>
                                    <td> 3 </td>
                                    <td> Paracetamol </td>
                                    <td> 5 </td>
                                    <td> เม็ด/5mg </td>
                                    <td> กลืนพร้อมน้ำปริมาณมาก </td>
                                </tr>
                                <tr>
                                    <td> 4 </td>
                                    <td> Paracetamol </td>
                                    <td> 5 </td>
                                    <td> เม็ด/5mg </td>
                                    <td> กลืนพร้อมน้ำปริมาณมาก </td>
                                </tr>
                                <tr>
                                    <td> 5 </td>
                                    <td> Paracetamol </td>
                                    <td> 5 </td>
                                    <td> เม็ด/5mg </td>
                                    <td> กลืนพร้อมน้ำปริมาณมาก </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
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

