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
            <form id="disease-search-form" role="form" action="{{ url('/disease/search') }}" method="post" novalidate="novalidate">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-4 control-label text-right">ชื่อโรคหรือรหัสโรค
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-8">
                                    <input class="form-control" name="keyword" placeholder="กรุณากรอกรหัสโรค ICD10, SNOMED, DRG หรือชื่อโรค" required aria-required="true" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-actions right1">
                            <button type="submit" id="search-btn" class="btn btn-success mt-ladda-btn ladda-button" data-style="expand-right">
                                <span class="ladda-label">ค้นหา</span>
                                <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                            <button type="button" id="cancel-search-btn" class="btn default">ยกเลิก</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="portlet light hidden" id="search-result-porlet">
        <div class="portlet-title">
            <div class="caption caption-md">
                <i class="icon-globe theme-font hide"></i>
                <span class="caption-subject font-blue-madison bold">ผลการค้นหา "<span id="search-keyword"></span>"</span>
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
                    <tbody id="search-result-table-body">
                    </tbody>
                </table>
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
            <div class="text-right"> <button type="button" class="btn green" id="add-disease-btn">เพิ่มข้อมูลรหัสโรค</button></div>
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
                    <tbody id="all-disease-list-table-body">
                    @foreach($diseaseList as $disease)
                        <tr>
                            <td class="view-all-order">  </td>
                            <td> {{$disease->icd10}} </td>
                            <td> {{$disease->snomed}} </td>
                            <td> {{$disease->drg}} </td>
                            <td> {{$disease->name}} </td>
                            <td> <button  identity="{{$disease->id}}" type="button" class="btn blue view-disease-button">ดู</button> </td>
                            <td> <button  identity="{{$disease->id}}" type="button" class="btn yellow-crusta edit-disease-button">แก้ไข</button> </td>
                            <td> <button  identity="{{$disease->id}}" type="button" class="btn red delete-disease-button">ลบ</button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END PROFILE CONTENT -->

    <div id="viewModal" class="modal fade" tabindex="-1" data-width="760">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">ข้อมูลรหัสโรค <span id="view-title"></span></h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="form_control_1">รหัสโรค ICD10</label>
                    <div class="col-md-9">
                        <input class="form-control" readonly="" value="" id="view_icd10"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="form_control_1">รหัสโรค SNOMED</label>
                    <div class="col-md-9">
                        <input class="form-control" readonly="" value="" id="view_snomed"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="form_control_1">รหัสโรค DRG</label>
                    <div class="col-md-9">
                        <input class="form-control" readonly="" value="" id="view_drg"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="form_control_1">ชื่อโรค</label>
                    <div class="col-md-9">
                        <input class="form-control" readonly="" value="" id="view_name"  type="text">
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
        <form id="disease-edit-form" role="form" action="{{ url('/disease/edit') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" id="edit_disease_id" />
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">แก้ไขข้อมูลรหัสโรค <span id="edit-title"></span></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="form_control_1">รหัสโรค ICD10</label>
                        <div class="col-md-9 margin-bottom-15">
                            <input class="form-control"  value="" id="edit_icd10"  type="text" name="icd10"  required aria-required="true">
                            <div class="form-control-focus"> </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="form_control_1">รหัสโรค SNOMED</label>
                        <div class="col-md-9 margin-bottom-15">
                            <input class="form-control" value="" id="edit_snomed"  type="text" name="snomed"  required aria-required="true">
                            <div class="form-control-focus"> </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="form_control_1">รหัสโรค DRG</label>
                        <div class="col-md-9 margin-bottom-15">
                            <input class="form-control"  value="" id="edit_drg"  type="text" name="drg"  required aria-required="true">
                            <div class="form-control-focus"> </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="form_control_1">ชื่อโรค</label>
                        <div class="col-md-9 margin-bottom-15">
                            <input class="form-control" value="" id="edit_name"  type="text" name="name"  required aria-required="true">
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
        <form id="disease-add-form" role="form" action="{{ url('/disease/create') }}" method="post" novalidate="novalidate">
            {{ csrf_field() }}
            <input type="hidden" name="id" id="add_disease_id" />
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">เพิ่มข้อมูลรหัสโรค</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="form_control_1">รหัสโรค ICD10</label>
                        <div class="col-md-9 margin-bottom-15">
                            <input class="form-control"  value="" id="add_icd10"  type="text" name="icd10" required aria-required="true">
                            <div class="form-control-focus"> </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="form_control_1">รหัสโรค SNOMED</label>
                        <div class="col-md-9 margin-bottom-15">
                            <input class="form-control" value="" id="add_snomed"  type="text" name="snomed" required aria-required="true">
                            <div class="form-control-focus"> </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="form_control_1">รหัสโรค DRG</label>
                        <div class="col-md-9 margin-bottom-15">
                            <input class="form-control" value="" id="add_drg"  type="text" name="drg" required aria-required="true">
                            <div class="form-control-focus"> </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="form_control_1">ชื่อโรค</label>
                        <div class="col-md-9 margin-bottom-15">
                            <input class="form-control" value="" id="add_name"  type="text" name="name" required aria-required="true">
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
            <h4 class="modal-title">ลบข้อมูลรหัสโรค โรค<span id="delete-disease-title"></span></h4>
        </div>
        <div class="modal-body">
            <div class="caption text-center">
                <i class="glyphicon glyphicon-alert font-red"></i>
                <span class="caption-subject font-red sbold uppercase">ท่านแน่ใจหรือไม่ว่าต้องการลบข้อมูลรหัสโรคนี้</span>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" id="confirm-delete-disease-btn" class="btn btn-success mt-ladda-btn ladda-button" data-style="expand-right">
                <span class="ladda-label">ยืนยัน</span>
                <span class="ladda-spinner"></span><span class="ladda-spinner"></span></button>
            <button type="button" data-dismiss="modal" class="btn btn-outline dark">ย้อนกลับ</button>
        </div>
    </div>
@endsection

@section('pageLevelPluginsScript')
    <script src="{{url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/ladda/spin.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/ladda/ladda.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
@endsection

@section('pageLevelScripts')
    <script src="{{url('assets/pages/scripts/components-bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/pages/scripts/components-date-time-pickers.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/pages/scripts/ui-extended-modals.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/pages/scripts/search.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/pages/scripts/disease-form-validation.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            var keyword=null;
            resetAllOrder();
            function resetAllOrder(){
                var i = 1;
                $('.view-all-order').each(function () {
                    $(this).text(i);
                    i++;
                });
            }
            function resetResultOrder(){
                var i = 1;
                $('.result-order').each(function () {
                    $(this).text(i);
                    i++;
                });
            }
            $(document).on('click','.view-disease-button', function(){
                var id = $(this).attr('identity');
                var URL_ROOT = '{{Request::root()}}';
                $.post(URL_ROOT+'/disease/detail',
                        {id:  id, _token: '{{csrf_token()}}'}).done(function (input) {
                    $('#view-title').text(input['name']);
                    $('#view_icd10').val(input['icd10']);
                    $('#view_snomed').val(input['snomed']);
                    $('#view_drg').val(input['drg']);
                    $('#view_name').val(input['name']);
                }).fail(function () {
                });
                $('#viewModal').modal();
            });
            var tempData;
            $(document).on('click','.edit-disease-button', function(e){
                var id = $(this).attr('identity');
                var URL_ROOT = '{{Request::root()}}';
                $.post(URL_ROOT+'/disease/detail',
                        {id:  id, _token: '{{csrf_token()}}'}).done(function (input) {
                    tempData = input;
                    $('#edit-title').text(input['name']);
                    $('#edit_disease_id').val(input['id']);
                    $('#edit_icd10').val(input['icd10']);
                    $('#edit_snomed').val(input['snomed']);
                    $('#edit_drg').val(input['drg']);
                    $('#edit_name').val(input['name']);
                }).fail(function () {
                });
                $('#disease-edit-form').validate().resetForm();
                $('#editModal').modal();
            });
            $(document).on('click','#edit-submit-btn', function(e) {
                if($('#disease-edit-form').valid()) {
                    e.preventDefault();
                    var l = Ladda.create(this);
                    l.start();
                    function showSuccess(formData, jqForm, options) {
                        toastr['success']('แก้ไขข้อมูลรหัสโรคสำเร็จ', "สำเร็จ");
                        l.stop();
                        resetDiseaseList();
                        resetResultList(keyword);
                        $('#editModal').modal('hide');
                        return true;
                    }

                    function showError(responseText, statusText, xhr, $form) {
                        toastr['error']("กรุณาลองใหม่อีกครั้ง", "ผิดพลาด");
                        l.stop();
                        resetDiseaseList();
                        resetResultList(keyword);
                        return true;
                    }

                    var options = {
                        success: showSuccess,
                        error: showError
                    };
                    $('#disease-edit-form').ajaxSubmit(options);
                    return false;
                }
            });
            $('#add-disease-btn').click(function () {
                $('#disease-add-form').validate().resetForm();
                $('#addModal').modal();
            });
            $(document).on('click','#add-submit-btn', function(e) {
                if($('#disease-add-form').valid()){
                    e.preventDefault();
                    var l = Ladda.create(this);
                    l.start();
                    function showSuccess(formData, jqForm, options) {
                        toastr['success']('เพิ่มข้อมูลรหัสโรคสำเร็จ', "สำเร็จ");
                        l.stop();
                        resetDiseaseList();
                        resetResultList(keyword);
                        $('#addModal').modal('hide');
                        return true;
                    }
                    function showError(responseText, statusText, xhr, $form) {
                        toastr['error']("กรุณาลองใหม่อีกครั้ง", "ผิดพลาด");
                        l.stop();
                        resetDiseaseList();
                        resetResultList(keyword);
                        return true;
                    }
                    var options = {
                        success: showSuccess,
                        error: showError,
                        clearForm: true
                    };
                    $('#disease-add-form').ajaxSubmit(options);
                    return false;
                }
            });

            $(document).on('click','.delete-disease-button', function () {
                var id = $(this).attr('identity');
                var URL_ROOT = '{{Request::root()}}';
                $.post(URL_ROOT+'/disease/detail',
                        {id:  id, _token: '{{csrf_token()}}'}).done(function (input) {
                    $('#delete-disease-title').text(input['name']);
                    $('#confirm-delete-disease-btn').attr('identity',id);
                }).fail(function () {
                });
                $('#removeModal').modal();
            });
            $(document).on('click','#confirm-delete-disease-btn', function (e) {
                e.preventDefault();
                var l = Ladda.create(this);
                l.start();
                var id = $(this).attr('identity');
                var URL_ROOT = '{{Request::root()}}';
                $.post(URL_ROOT+'/disease/delete',
                        {id:  id, _token: '{{csrf_token()}}'}).done(function (input) {
                    l.stop();
                    if(input == "success") {
                        toastr['success']('ลบข้อมูลรหัสโรคสำเร็จ', "สำเร็จ");
                        resetDiseaseList();
                        resetResultList(keyword);
                        $('#removeModal').modal('hide');
                    }
                    else if (input == "constraint"){
                        toastr['warning']("ข้อมูลรหัสโรคนี้ถูกใช้อยู่ในระบบ ไม่สามารถลบได้", "ขออภัย");
                    }
                }).fail(function () {
                    l.stop();
                    toastr['error']("กรุณาลองใหม่อีกครั้ง", "ผิดพลาด");
                    resetDiseaseList();
                    resetResultList(keyword);
                });
            });
            function resetDiseaseList() {
                $.get( "{{url('/disease/getDiseaseList')}}").done(function(data) {
                    $('#all-disease-list-table-body').empty();
                    for(var m=0;m<data.length;m++){
                        $('#all-disease-list-table-body').append(
                                '<tr>'
                                +'<td class="view-all-order"></td>'
                                +'<td>'+ data[m]['icd10'] +'</td>'
                                +'<td>'+ data[m]['snomed'] +'</td>'
                                +'<td>'+ data[m]['drg'] +'</td>'
                                +'<td>'+ data[m]['name'] +'</td>'
                                +'<td> <button  identity="'+ data[m]['id']+'" type="button" class="btn blue view-disease-button">ดู</button> </td>'
                                +'<td> <button  identity="'+ data[m]['id']+'" type="button" class="btn yellow-crusta edit-disease-button">แก้ไข</button> </td>'
                                +'<td> <button  identity="'+ data[m]['id']+'" type="button" class="btn red delete-disease-button">ลบ</button></td>'
                                +'</tr>'
                        );
                    }
                    resetAllOrder();
                });
            }

            function resetResultList(keyword){
                var URL_ROOT = '{{Request::root()}}';
                $.post(URL_ROOT+'/disease/search',
                        {keyword:  keyword, _token: '{{csrf_token()}}'}).done(function (input) {
                    $('#search-keyword').text(input['keyword']);
                    $('#search-result-table-body').empty();
                    var data = input['disease_list'];
                    if(data.length>0){
                        for(var m=0;m<data.length;m++){
                            $('#search-result-table-body').append(
                                    '<tr id="result-row-'+data[m]['id']+'">'
                                    +'<td class="result-order"></td>'
                                    +'<td>'+ data[m]['icd10'] +'</td>'
                                    +'<td>'+ data[m]['snomed'] +'</td>'
                                    +'<td>'+ data[m]['drg'] +'</td>'
                                    +'<td>'+ data[m]['name'] +'</td>'
                                    +'<td><button  identity="'+ data[m]['id']+'" type="button" class="btn blue view-disease-button">ดู</button> </td>'
                                    +'<td><button  identity="'+ data[m]['id']+'" type="button" class="btn yellow-crusta edit-disease-button">แก้ไข</button> </td>'
                                    +'<td><button  identity="'+ data[m]['id']+'" type="button" class="btn red delete-disease-button">ลบ</button></td>'
                                    +'</tr>'
                            );
                        }
                        resetResultOrder();
                    }
                    else {
                        $('#search-result-table-body').append(
                                '<tr>'
                                +'<td colspan="6" class="text-center font-red sbold">ไม่พบข้อมูล</td>'
                                +'</tr>'
                        );
                    }
                });
            }

            $('#search-btn').click(function (e) {
                if($('#disease-search-form').valid()){
                    e.preventDefault();
                    var l = Ladda.create(this);
                    l.start();
                    function showSuccess(input) {
                        l.stop();
                        keyword = input['keyword'];
                        $('#search-keyword').text(input['keyword']);
                        $('#search-result-table-body').empty();
                        var data = input['disease_list'];
                        if(data.length>0){
                            for(var m=0;m<data.length;m++){
                                $('#search-result-table-body').append(
                                        '<tr id="result-row-'+data[m]['id']+'">'
                                        +'<td class="result-order"></td>'
                                        +'<td>'+ data[m]['icd10'] +'</td>'
                                        +'<td>'+ data[m]['snomed'] +'</td>'
                                        +'<td>'+ data[m]['drg'] +'</td>'
                                        +'<td>'+ data[m]['name'] +'</td>'
                                        +'<td><button  identity="'+ data[m]['id']+'" type="button" class="btn blue view-disease-button">ดู</button> </td>'
                                        +'<td><button  identity="'+ data[m]['id']+'" type="button" class="btn yellow-crusta edit-disease-button">แก้ไข</button> </td>'
                                        +'<td><button  identity="'+ data[m]['id']+'" type="button" class="btn red delete-disease-button">ลบ</button></td>'
                                        +'</tr>'
                                );
                            }
                            resetResultOrder();
                        }
                        else {
                            $('#search-result-table-body').append(
                                    '<tr>'
                                    +'<td colspan="6" class="text-center font-red sbold">ไม่พบข้อมูล</td>'
                                    +'</tr>'
                            );
                        }
                        $('#search-result-porlet').removeClass('hidden');
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
                    $('#disease-search-form').ajaxSubmit(options);
                    return false;
                }
            });
            $('#cancel-search-btn').click(function () {
                $('#search-result-porlet').addClass('hidden');
            });
        });
    </script>
@endsection

