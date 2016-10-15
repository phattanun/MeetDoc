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
                    <tbody>
                    <tr>
                        <td> 1 </td>
                        <td> SN01</td>
                        <td> Paracetamol </td>
                        <td> <button type="button" class="btn blue" data-toggle="modal" data-target="#viewModal">ดู</button> </td>
                        <td> <button type="button" class="btn yellow-crusta" data-toggle="modal" data-target="#editModal">แก้ไข</button> </td>
                        <td> <button id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button></td>
                    </tr>
                    <tr>
                        <td> 2 </td>
                        <td> SN02 </td>
                        <td> Paracetamol </td>
                        <td> <button type="button" class="btn blue" data-toggle="modal" data-target="#viewModal">ดู</button> </td>
                        <td> <button type="button" class="btn yellow-crusta" data-toggle="modal" data-target="#editModal">แก้ไข</button> </td>
                        <td> <button id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button></td>
                    </tr>
                    <tr>
                        <td> 3 </td>
                        <td> SN03 </td>
                        <td> Paracetamol </td>
                        <td> <button type="button" class="btn blue" data-toggle="modal" data-target="#viewModal">ดู</button> </td>
                        <td> <button type="button" class="btn yellow-crusta" data-toggle="modal" data-target="#editModal">แก้ไข</button> </td>
                        <td> <button id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button></td>
                    <tr>
                        <td> 4 </td>
                        <td> SN04 </td>
                        <td> Paracetamol </td>
                        <td> <button type="button" class="btn blue" data-toggle="modal" data-target="#viewModal">ดู</button> </td>
                        <td> <button type="button" class="btn yellow-crusta" data-toggle="modal" data-target="#editModal">แก้ไข</button> </td>
                        <td> <button id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button></td>
                    </tr>
                    <tr>
                        <td> 5 </td>
                        <td> SN05 </td>
                        <td> Paracetamol </td>
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
                                        <tr>
                                            <td> 1 </td>
                                            <td> SN01</td>
                                            <td> เช้า </td>
                                            <td> <button type="button" class="btn blue" data-toggle="modal" data-target="#viewModal">ดู</button> </td>
                                            <td> <button type="button" class="btn yellow-crusta" data-toggle="modal" data-target="#editModal">แก้ไข</button> </td>
                                            <td> <button id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button></td>
                                        </tr>
                                        <tr>
                                            <td> 2 </td>
                                            <td> SN02 </td>
                                            <td> เช้า </td>
                                            <td> <button type="button" class="btn blue" data-toggle="modal" data-target="#viewModal">ดู</button> </td>
                                            <td> <button type="button" class="btn yellow-crusta" data-toggle="modal" data-target="#editModal">แก้ไข</button> </td>
                                            <td> <button id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button></td>
                                        </tr>
                                        <tr>
                                            <td> 3 </td>
                                            <td> SN03 </td>
                                            <td> บ่าย </td>
                                            <td> <button type="button" class="btn blue" data-toggle="modal" data-target="#viewModal">ดู</button> </td>
                                            <td> <button type="button" class="btn yellow-crusta" data-toggle="modal" data-target="#editModal">แก้ไข</button> </td>
                                            <td> <button id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button></td>
                                        <tr>
                                            <td> 4 </td>
                                            <td> SN04 </td>
                                            <td> เช้า </td>
                                            <td> <button type="button" class="btn blue" data-toggle="modal" data-target="#viewModal">ดู</button> </td>
                                            <td> <button type="button" class="btn yellow-crusta" data-toggle="modal" data-target="#editModal">แก้ไข</button> </td>
                                            <td> <button id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button></td>
                                        </tr>
                                        <tr>
                                            <td> 5 </td>
                                            <td> SN05 </td>
                                            <td> เช้า </td>
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
            <h4 class="modal-title">ข้อมูลยา รหัส D01</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ชื่อตัวยา</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="Paracetamol" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ชื่อทางการค้า</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="Para" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ประเภท</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="เม็ด" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">คำอธิบาย</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="แก้ปวด" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">วิธีใช้</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="กินกับน้ำ" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ผู้ผลิต</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="บริษัทยาปลอม" id="form_control_1"  type="text">
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
            <h4 class="modal-title">แก้ไขข้อมูลยา รหัส D01</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ชื่อตัวยา</label>
                    <div class="col-md-10">
                        <input class="form-control"  value="Paracetamol" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ชื่อทางการค้า</label>
                    <div class="col-md-10">
                        <input class="form-control" value="Para" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row margin-top-15 margin-bottom-10">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ประเภท</label>
                    <div class="col-md-10">
                        <select id="multiple" class="form-control select2-multiple" multiple></option>
                            <option>SOLUTION</option>
                            <option selected="selected">CAPSULE</option>
                            <option>TABLET</option>
                            <option>KIT</option>
                            <option>INJECTION</option>
                            <option>POWDER</option>
                            <option>GRANULE</option>
                            <option>OINTMENT</option>
                            <option>SUPPOSITORY</option>
                            <option>LOTION</option>
                            <option>GEL</option>
                            <option>CREAM</option>
                            <option>SUSPENSION</option>
                            <option>INHALANT</option>
                            <option selected="selected">RING</option>
                            <option>SUSPENSION/ DROPS</option>
                            <option>SOLUTION/ DROPS</option>
                            <option>IMPLANT</option>
                            <option>LIQUID</option>
                            <option>INTRAUTERINE DEVICE</option>
                            <option>TAPE</option>
                            <option>EMULSION</option>
                            <option>LOZENGE</option>
                            <option>AEROSOL</option>
                            <option>MOUTHWASH</option>
                            <option>SYRUP</option>
                            <option>SPRAY</option>
                            <option>CONCENTRATE</option>
                            <option>PILL</option>
                            <option>PATCH</option>
                            <option>SHAMPOO</option>
                            <option>ENEMA</option>
                            <option>RINSE</option>
                            <option>ELIXIR</option>
                            <option>PASTE</option>
                            <option>CLOTH</option>
                            <option>DOUCHE</option>
                            <option>SOAP</option>
                            <option>INSERT</option>
                            <option>STICK</option>
                            <option>PELLET</option>
                            <option>IRRIGANT</option>
                            <option>JELLY</option>
                            <option>OIL</option>
                            <option>SWAB</option>
                            <option>DISC</option>
                            <option>STRIP</option>
                            <option>SALVE</option>
                            <option>PLASTER</option>
                            <option>EXTRACT</option>
                            <option>DRESSING</option>
                            <option>SPONGE</option>
                            <option>TINCTURE</option>
                            <option>FOR SUSPENSION</option>
                            <option>GAS</option>
                            <option>LIPSTICK</option>
                            <option>LOTION/SHAMPOO</option>
                            <option>PASTILLE</option>
                            <option>FILM</option>
                            <option>LINIMENT</option>
                            <option>WAFER</option>
                            <option>FOR SOLUTION</option>
                            <option>POULTICE</option>
                            <option>CRYSTAL</option>
                            <option>CELLULAR SHEET</option>
                            <option>GLOBULE</option>
                            <option>INJECTABLE FOAM</option>
                        </select>
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">คำอธิบาย</label>
                    <div class="col-md-10">
                        <input class="form-control" value="แก้ปวด" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">วิธีใช้</label>
                    <div class="col-md-10">
                        <input class="form-control" value="กินกับน้ำ" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ผู้ผลิต</label>
                    <div class="col-md-10">
                        <input class="form-control" value="บริษัทยาปลอม" id="form_control_1"  type="text">
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
            <h4 class="modal-title">เพิ่มข้อมูลยา</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ชื่อตัวยา</label>
                    <div class="col-md-10">
                        <input class="form-control"  value="" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ชื่อทางการค้า</label>
                    <div class="col-md-10">
                        <input class="form-control" value="" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row margin-top-15 margin-bottom-10">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ประเภท</label>
                    <div class="col-md-10">
                        <select id="multiple" class="form-control select2-multiple" multiple></option>
                            <option>SOLUTION</option>
                            <option>CAPSULE</option>
                            <option>TABLET</option>
                            <option>KIT</option>
                            <option>INJECTION</option>
                            <option>POWDER</option>
                            <option>GRANULE</option>
                            <option>OINTMENT</option>
                            <option>SUPPOSITORY</option>
                            <option>LOTION</option>
                            <option>GEL</option>
                            <option>CREAM</option>
                            <option>SUSPENSION</option>
                            <option>INHALANT</option>
                            <option>RING</option>
                            <option>SUSPENSION/ DROPS</option>
                            <option>SOLUTION/ DROPS</option>
                            <option>IMPLANT</option>
                            <option>LIQUID</option>
                            <option>INTRAUTERINE DEVICE</option>
                            <option>TAPE</option>
                            <option>EMULSION</option>
                            <option>LOZENGE</option>
                            <option>AEROSOL</option>
                            <option>MOUTHWASH</option>
                            <option>SYRUP</option>
                            <option>SPRAY</option>
                            <option>CONCENTRATE</option>
                            <option>PILL</option>
                            <option>PATCH</option>
                            <option>SHAMPOO</option>
                            <option>ENEMA</option>
                            <option>RINSE</option>
                            <option>ELIXIR</option>
                            <option>PASTE</option>
                            <option>CLOTH</option>
                            <option>DOUCHE</option>
                            <option>SOAP</option>
                            <option>INSERT</option>
                            <option>STICK</option>
                            <option>PELLET</option>
                            <option>IRRIGANT</option>
                            <option>JELLY</option>
                            <option>OIL</option>
                            <option>SWAB</option>
                            <option>DISC</option>
                            <option>STRIP</option>
                            <option>SALVE</option>
                            <option>PLASTER</option>
                            <option>EXTRACT</option>
                            <option>DRESSING</option>
                            <option>SPONGE</option>
                            <option>TINCTURE</option>
                            <option>FOR SUSPENSION</option>
                            <option>GAS</option>
                            <option>LIPSTICK</option>
                            <option>LOTION/SHAMPOO</option>
                            <option>PASTILLE</option>
                            <option>FILM</option>
                            <option>LINIMENT</option>
                            <option>WAFER</option>
                            <option>FOR SOLUTION</option>
                            <option>POULTICE</option>
                            <option>CRYSTAL</option>
                            <option>CELLULAR SHEET</option>
                            <option>GLOBULE</option>
                            <option>INJECTABLE FOAM</option>
                        </select>
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">คำอธิบาย</label>
                    <div class="col-md-10">
                        <input class="form-control" value="" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">วิธีใช้</label>
                    <div class="col-md-10">
                        <input class="form-control" value="" id="form_control_1"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ผู้ผลิต</label>
                    <div class="col-md-10">
                        <input class="form-control" value="" id="form_control_1"  type="text">
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
        <div id="removeModal" class="modal fade" tabindex="-1" data-width="320">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">ลบข้อมูลยา รหัส  D01</h4>
            </div>
            <div class="modal-body">
                <div class="caption text-center">
                    <i class="glyphicon glyphicon-alert font-red"></i>
                    <span class="caption-subject font-red sbold uppercase">ท่านแน่ใจหรือไม่ว่าต้องการลบข้อมูลยานี้</span>
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

