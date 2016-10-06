@extends('masterpage')

@section('pastAppNav')
    active
@endsection

@section('title')
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
    <link href="{{url('assets/pages/css/newapp.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!-- END PAGE HEADER-->
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">ค้นหาวันเวลานัดหมาย</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-md-2 text-right">แผนก
                                                    <span class="required" aria-required="true"> * </span></label>
                                                <div class="col-md-10">
                                                    <select class="bs-select form-control" data-live-search="true" data-size="8">
                                                        <option value="AF">Afghanistan</option>
                                                        <option value="AL">Albania</option>
                                                        <option value="DZ">Algeria</option>
                                                        <option value="AS">American Samoa</option>
                                                        <option value="AD">Andorra</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                            <label class="control-label col-md-2 text-right">วันที่
                                                <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-10">
                                                    <input class="form-control form-control-inline date-picker" size="16" value="" type="text" data-date-format="dd-mm-yyyy">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-md-2 text-right">แพทย์</label>
                                                <div class="col-md-10">
                                                    <select class="bs-select form-control" data-live-search="true" data-size="8">
                                                        <option value="AF">Afghanistan</option>
                                                        <option value="AL">Albania</option>
                                                        <option value="DZ">Algeria</option>
                                                        <option value="AS">American Samoa</option>
                                                        <option value="AD">Andorra</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                            <label class="control-label col-md-2 text-right">ช่วงเวลา</label>
                                                <div class="col-md-10">
                                                    <div class="mt-checkbox-inline">
                                                        <label class="mt-checkbox">
                                                            <input id="inlineCheckbox21" value="option1" type="checkbox"> เช้า
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-checkbox">
                                                            <input id="inlineCheckbox22" value="option2" type="checkbox"> บ่าย
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                            <label class="col-md-2 text-right">อาการ
                                                <span class="required" aria-required="true"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="" rows="3" placeholder="กรอกอาการป่วยของท่าน เช่น ปวดหัว ตัวร้อน เป็นไข้"></textarea>
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
            <!-- END PROFILE CONTENT -->
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">ผลการค้นหา</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th> ลำดับที่ </th>
                                            <th> วันที่ </th>
                                            <th> ช่วง </th>
                                            <th> แพทย์ </th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td> 1 </td>
                                            <td> 06/10/2016 </td>
                                            <td> เช้า </td>
                                            <td> นายแพทย์พัทธนันท์ อัครพันธุ์ธัช </td>
                                            <td> <button type="button" class="btn blue"  data-toggle="modal" data-target="#confirmAppModal">ทำการนัดหมาย</button> </td>
                                            <td> <a id="more-result" type="button" class="btn red">ไม่ว่าง</a></td>
                                        </tr>
                                        <tr  class="more-result">
                                            <td> 2 </td>
                                            <td> 06/10/2016 </td>
                                            <td> เช้า </td>
                                            <td> นายแพทย์พัทธนันท์ อัครพันธุ์ธัช </td>
                                            <td>  <button type="button" class="btn blue">ทำการนัดหมาย</button>  </td>
                                            <td> </td>
                                        </tr>
                                        <tr class="more-result">
                                            <td> 3 </td>
                                            <td> 06/10/2016 </td>
                                            <td> บ่าย </td>
                                            <td> นายแพทย์พัทธนันท์ อัครพันธุ์ธัช </td>
                                            <td>  <button type="button" class="btn blue">ทำการนัดหมาย</button>  </td>
                                            <td>  </td>
                                        <tr class="more-result">
                                            <td> 4 </td>
                                            <td> 06/10/2016 </td>
                                            <td> เช้า </td>
                                            <td> นายแพทย์พัทธนันท์ อัครพันธุ์ธัช </td>
                                            <td>  <button type="button" class="btn blue">ทำการนัดหมาย</button>  </td>
                                            <td> </td>
                                        </tr>
                                        <tr class="more-result">
                                            <td> 5 </td>
                                            <td> 06/10/2016 </td>
                                            <td> เช้า </td>
                                            <td> นายแพทย์พัทธนันท์ อัครพันธุ์ธัช </td>
                                            <td> <button type="button" class="btn blue">ทำการนัดหมาย</button> </td>
                                            <td> </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
            <!-- END PROFILE CONTENT -->

    <div id="confirmAppModal" class="modal fade" data-backdrop="static" tabindex="-1" data-width="760">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">ยืนยันการนัดหมาย</h4>
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
        </div>
        <div class="modal-footer">
            <button type="button" class="btn green" data-toggle="modal" data-target="#emailConfirmAlertModal">ยืนยัน</button>
            <button type="button" data-dismiss="modal" class="btn btn-outline dark">ย้อนกลับ</button>

        </div>
    </div>

    <div id="emailConfirmAlertModal" data-backdrop="static" class="modal fade" tabindex="-1" data-focus-on="input:first">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">ยืนยันการนัดหมายทางอีเมล</h4>
        </div>
        <div class="modal-body">
            <div class="caption text-center">
                <i class="glyphicon glyphicon-alert font-red"></i>
                <span class="caption-subject font-red sbold uppercase">ระบบจะส่งจดหมายยืนยันการนัดหมายไปทางอีเมลของท่าน <br>กรุณายืนยันภายใน 15 นาที</span>
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
        $('#more-result').click(function () {
            $('.more-result').show();
            $(this).hide()
        });
    </script>
@endsection

