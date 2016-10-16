@extends('masterpage')

@section('drugNav')
    active
@endsection

@section('title')
    จัดการข้อมูลยา
@endsection

@section('title-inside')
    จัดการข้อมูลยา
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
                <span class="caption-subject font-blue-madison bold uppercase">ค้นหายาที่ต้องการดู/แก้ไข/ลบข้อมูล</span>
            </div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2 control-label text-right">ชื่อยา
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-10">
                                <input class="form-control" name="" placeholder="กรุณากรอกชื่อยา" />
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
                <span class="caption-subject font-blue-madison bold uppercase">ผลการค้นหา "Parac"</span>
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th> ลำดับที่ </th>
                        <th> ชื่อตัวยา </th>
                        <th> ชื่อทางการค้า </th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="all-table-body">
                    @foreach($drugList as $drug)
                        <tr>
                            <td>  </td>
                            <td> {{$drug->medicine_name}} </td>
                            <td> {{$drug->business_name}} </td>
                            <td> <button id="view-{{$drug->medicine_id}}" type="button" class="btn blue" data-toggle="modal" data-target="#viewModal">ดู</button> </td>
                            <td> <button id="edit-{{$drug->medicine_id}}" type="button" class="btn yellow-crusta" data-toggle="modal" data-target="#editModal">แก้ไข</button> </td>
                            <td> <button id="delete-{{$drug->medicine_id}}" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button></td>
                        </tr>
                    @endforeach
                    {{--<tr>--}}
                        {{--<td> 2 </td>--}}
                        {{--<td> SN02 </td>--}}
                        {{--<td> Paracetamol </td>--}}
                        {{--<td> <button type="button" class="btn blue" data-toggle="modal" data-target="#viewModal">ดู</button> </td>--}}
                        {{--<td> <button type="button" class="btn yellow-crusta" data-toggle="modal" data-target="#editModal">แก้ไข</button> </td>--}}
                        {{--<td> <button id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td> 3 </td>--}}
                        {{--<td> SN03 </td>--}}
                        {{--<td> Paracetamol </td>--}}
                        {{--<td> <button type="button" class="btn blue" data-toggle="modal" data-target="#viewModal">ดู</button> </td>--}}
                        {{--<td> <button type="button" class="btn yellow-crusta" data-toggle="modal" data-target="#editModal">แก้ไข</button> </td>--}}
                        {{--<td> <button id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button></td>--}}
                    {{--<tr>--}}
                        {{--<td> 4 </td>--}}
                        {{--<td> SN04 </td>--}}
                        {{--<td> Paracetamol </td>--}}
                        {{--<td> <button type="button" class="btn blue" data-toggle="modal" data-target="#viewModal">ดู</button> </td>--}}
                        {{--<td> <button type="button" class="btn yellow-crusta" data-toggle="modal" data-target="#editModal">แก้ไข</button> </td>--}}
                        {{--<td> <button id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td> 5 </td>--}}
                        {{--<td> SN05 </td>--}}
                        {{--<td> Paracetamol </td>--}}
                        {{--<td> <button type="button" class="btn blue" data-toggle="modal" data-target="#viewModal">ดู</button> </td>--}}
                        {{--<td> <button type="button" class="btn yellow-crusta" data-toggle="modal" data-target="#editModal">แก้ไข</button> </td>--}}
                        {{--<td> <button id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button></td>--}}
                    {{--</tr>--}}
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
                                    <span class="caption-subject font-blue-madison bold uppercase">รายการยาทั้งหมด</span>
                                </div>
                                <div class="text-right"> <button type="button" class="btn green" data-toggle="modal" data-target="#addModal">เพิ่มข้อมูลยา</button></div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th> ลำดับที่ </th>
                                            <th> ชื่อตัวยา </th>
                                            <th> ชื่อทางการค้า </th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($drugList as $drug)
                                            <tr>
                                                <td class="view-all-order">  </td>
                                                <td> {{$drug->medicine_name}} </td>
                                                <td> {{$drug->business_name}} </td>
                                                {{--<td> <button id="view-{{$drug->medicine_id}}" type="button" class="btn blue view-drug-button" data-toggle="modal" data-target="#viewModal">ดู</button> </td>--}}
                                                {{--<td> <button id="edit-{{$drug->medicine_id}}" type="button" class="btn yellow-crusta edit-drug-button" data-toggle="modal" data-target="#editModal">แก้ไข</button> </td>--}}
                                                {{--<td> <button id="delete-{{$drug->medicine_id}}" type="button" class="btn red delete-drug-button" data-toggle="modal" data-target="#removeModal">ลบ</button></td>--}}
                                                <td> <button id="view-{{$drug->medicine_id}}" identity="{{$drug->medicine_id}}" type="button" class="btn blue view-drug-button">ดู</button> </td>
                                                <td> <button id="edit-{{$drug->medicine_id}}" identity="{{$drug->medicine_id}}" type="button" class="btn yellow-crusta edit-drug-button">แก้ไข</button> </td>
                                                <td> <button id="delete-{{$drug->medicine_id}}" identity="{{$drug->medicine_id}}" type="button" class="btn red delete-drug-button">ลบ</button></td>
                                            </tr>
                                        @endforeach
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
            <h4 class="modal-title">ข้อมูลยา <span id="view-title"></span></h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ชื่อตัวยา</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="Paracetamol" id="view_medicine_name"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ชื่อทางการค้า</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="Para" id="view_business_name"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ประเภท</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="เม็ด" id="view_type"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">คำอธิบาย</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="แก้ปวด" id="view_description"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">วิธีใช้</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="กินกับน้ำ" id="view_instruction"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ผู้ผลิต</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="บริษัทยาปลอม" id="view_manufacturer"  type="text">
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
        <form id="drug-edit-form" role="form" action="{{ url('/medicine/edit') }}" method="post">
            {{ csrf_field() }}
        <input type="hidden" name="medicine_id" id="edit_medicine_id" />
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">แก้ไขข้อมูลยา <span id="edit-title"></span></h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ชื่อตัวยา</label>
                    <div class="col-md-10">
                        <input class="form-control"  value="" id="edit_medicine_name"  type="text" name="medicine_name">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ชื่อทางการค้า</label>
                    <div class="col-md-10">
                        <input class="form-control" value="" id="edit_business_name"  type="text" name="business_name">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row margin-top-15 margin-bottom-10">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ประเภท</label>
                    <div class="col-md-10" id="edit-type-selection">
                        <select id="edit-type" class="form-control select2-multiple" multiple name="type[]">
                            @include('drug-type')
                        </select>
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">คำอธิบาย</label>
                    <div class="col-md-10">
                        <input class="form-control" value="" id="edit_description"  type="text" name="description">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">วิธีใช้</label>
                    <div class="col-md-10">
                        <input class="form-control" value="" id="edit_instruction"  type="text" name="instruction">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ผู้ผลิต</label>
                    <div class="col-md-10">
                        <input class="form-control" value="" id="edit_manufacturer"  type="text" name="manufacturer">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" id="edit-submit-btn" class="btn btn-success mt-ladda-btn ladda-button" data-style="expand-right">
                <span class="ladda-label">ยืนยัน</span>
                <span class="ladda-spinner"></span><span class="ladda-spinner"></span></button>
            <button type="button" data-dismiss="modal" class="btn btn-outline dark">ย้อนกลับ</button>
        </div>
        </form>
    </div>


    <div id="addModal" class="modal fade" tabindex="-1" data-width="760">
        <form id="drug-add-form" role="form" action="{{ url('/medicine/create') }}" method="post">
            {{ csrf_field() }}
        <input type="hidden" name="medicine_id" id="add_medicine_id" />
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">เพิ่มข้อมูลยา</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ชื่อตัวยา</label>
                    <div class="col-md-10">
                        <input class="form-control"  value="" id="add_medicine_name"  type="text" name="medicine_name">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ชื่อทางการค้า</label>
                    <div class="col-md-10">
                        <input class="form-control" value="" id="add_business_name"  type="text" name="business_name">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row margin-top-15 margin-bottom-10">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ประเภท</label>
                    <div class="col-md-10" id="add-type-selection">
                        <select id="add-type" class="form-control select2-multiple" multiple name="type[]">
                            @include('drug-type')
                        </select>
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">คำอธิบาย</label>
                    <div class="col-md-10">
                        <input class="form-control" value="" id="add_description"  type="text" name="description">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">วิธีใช้</label>
                    <div class="col-md-10">
                        <input class="form-control" value="" id="add_instruction"  type="text" name="instruction">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ผู้ผลิต</label>
                    <div class="col-md-10">
                        <input class="form-control" value="" id="add_manufacturer"  type="text" name="manufacturer">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" id="add-submit-btn" class="btn btn-success mt-ladda-btn ladda-button" data-style="expand-right">
                <span class="ladda-label">ยืนยัน</span>
                <span class="ladda-spinner"></span><span class="ladda-spinner"></span></button>
            <button type="button" data-dismiss="modal" class="btn btn-outline dark">ย้อนกลับ</button>
        </div>
        </form>
    </div>


        <div id="removeModal" class="modal fade" tabindex="-1" data-width="320">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">ลบข้อมูลยา <span id="delete-drug-title"></span></h4>
            </div>
            <div class="modal-body">
                <div class="caption text-center">
                    <i class="glyphicon glyphicon-alert font-red"></i>
                    <span class="caption-subject font-red sbold uppercase">ท่านแน่ใจหรือไม่ว่าต้องการลบข้อมูลยานี้</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="confirm-delete-drug-btn" class="btn btn-success mt-ladda-btn ladda-button" data-style="expand-right">
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
        $(document).ready(function() {
            var i = 1;
            $('.view-all-order').each(function () {
                $(this).text(i);
                i++;
            });
            $('tbody tr').click(function () {
                $('#appDetailModal').modal()
            });
            $('.view-drug-button').click(function(){
                var id = $(this).attr('identity');
                var URL_ROOT = '{{Request::root()}}';
                $.post(URL_ROOT+'/medicine/detail',
                        {medicine_id:  id, _token: '{{csrf_token()}}'}).done(function (input) {
                            $('#view-title').text(input['medicine_name']);
                            $('#view_business_name').val(input['business_name']);
                            $('#view_medicine_name').val(input['medicine_name']);
                            $('#view_type').val(input['type']);
                            $('#view_manufacturer').val(input['manufacturer']);
                            $('#view_description').val(input['description']);
                            $('#view_instruction').val(input['instruction']);
                }).fail(function () {
                });
                $('#viewModal').modal();
            });
            var tempData;
            $('.edit-drug-button').click(function(e){
                var id = $(this).attr('identity');
                var URL_ROOT = '{{Request::root()}}';
                $.post(URL_ROOT+'/medicine/detail',
                        {medicine_id:  id, _token: '{{csrf_token()}}'}).done(function (input) {
                            tempData = input;
                            $('#edit-title').text(input['medicine_name']);
                            $('#edit_medicine_id').val(input['medicine_id']);
                            $('#edit_business_name').val(input['business_name']);
                            $('#edit_medicine_name').val(input['medicine_name']);
                            var type = input['type'].split(",");
                            $('#edit-type').val(type);
                            ComponentsSelect2.init();
                            $('#edit_manufacturer').val(input['manufacturer']);
                            $('#edit_description').val(input['description']);
                            $('#edit_instruction').val(input['instruction']);

                }).fail(function () {
                });
                $('#editModal').modal();
            });
            $('#edit-submit-btn').click(function(e) {
                e.preventDefault();
                var l = Ladda.create(this);
                l.start();
                function showSuccess(formData, jqForm, options) {
                    toastr['success']('แก้ไขข้อมูลยาสำเร็จ', "สำเร็จ");
                    l.stop();
                    $('#editModal').modal('hide');
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
                $('#drug-edit-form').ajaxSubmit(options);
                return false;
            });

            $('#add-submit-btn').click(function(e) {
                e.preventDefault();
                var l = Ladda.create(this);
                l.start();
                function showSuccess(formData, jqForm, options) {
                    toastr['success']('เพิ่มข้อมูลยาสำเร็จ', "สำเร็จ");
                    l.stop();
                    $('#addModal').modal('hide');
                    $('#add-type').val('');
                    ComponentsSelect2.init();
                    return true;
                }
                function showError(responseText, statusText, xhr, $form) {
                    toastr['error']("กรุณาลองใหม่อีกครั้ง", "ผิดพลาด");
                    l.stop();
                    return true;
                }
                var options = {
                    success: showSuccess,
                    error: showError,
                    clearForm: true
                };
                $('#drug-add-form').ajaxSubmit(options);
                return false;
            });

            $(document).on('click','.delete-drug-button', function () {
                var id = $(this).attr('identity');
                var URL_ROOT = '{{Request::root()}}';
                $.post(URL_ROOT+'/medicine/detail',
                        {medicine_id:  id, _token: '{{csrf_token()}}'}).done(function (input) {
                    $('#delete-drug-title').text(input['medicine_name']);
                    $('#confirm-delete-drug-btn').attr('identity',id);
                }).fail(function () {
                });
                $('#removeModal').modal();
            });
            $(document).on('click','#confirm-delete-drug-btn', function (e) {
                e.preventDefault();
                var l = Ladda.create(this);
                l.start();
                var id = $(this).attr('identity');
                var URL_ROOT = '{{Request::root()}}';
                $.post(URL_ROOT+'/medicine/delete',
                        {medicine_id:  id, _token: '{{csrf_token()}}'}).done(function (input) {
                    l.stop();
                    toastr['success']('ลบข้อมูลยาสำเร็จ', "สำเร็จ");
                    $('#removeModal').modal('hide');
                }).fail(function () {
                    l.stop();
                    toastr['error']("กรุณาลองใหม่อีกครั้ง", "ผิดพลาด");
                });
            });
        });
    </script>
@endsection

