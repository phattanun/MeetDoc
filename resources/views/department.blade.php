@extends('masterpage')

@section('departmentNav')
    active
@endsection

@section('title')
    จัดการข้อมูลแผนก
@endsection

@section('title-inside')
    จัดการข้อมูลแผนก
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
                <span class="caption-subject font-blue-madison bold uppercase">ค้นหาแผนกที่ต้องแก้ไข/ลบข้อมูล</span>
            </div>
        </div>
        <div class="portlet-body">
            <form id="department-search-form" role="form" action="{{ url('/department/search') }}" method="post" novalidate="novalidate">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-2 control-label text-right">ชื่อแผนก
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-9">
                                    <input class="form-control" name="keyword" placeholder="กรุณากรอกชื่อแผนก" required aria-required="true" />
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
                        <th> ชื่อแผนก </th>
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
                <span class="caption-subject font-blue-madison bold uppercase">รายการแผนกทั้งหมด</span>
            </div>
            <div class="text-right"> <button type="button" class="btn green" id="add-department-btn">เพิ่มข้อมูลแผนก</button></div>
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th> ลำดับที่ </th>
                        <th> ชื่อแผนก </th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="all-department-list-table-body">
                    @foreach($departmentList as $department)
                        <tr>
                            <td class="view-all-order">  </td>
                            <td> {{$department->name}} </td>
                            <td> <button  identity="{{$department->id}}" type="button" class="btn yellow-crusta edit-department-button">แก้ไข</button> </td>
                            <td> <button  identity="{{$department->id}}" type="button" class="btn red delete-department-button">ลบ</button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END PROFILE CONTENT -->
    <div id="editModal" class="modal fade" tabindex="-1" data-width="760">
        <form id="department-edit-form" role="form" action="{{ url('/department/edit') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" id="edit_department_id" />
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">แก้ไขข้อมูลแผนก <span id="edit-title"></span></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="form_control_1">ชื่อแผนก</label>
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
        <form id="department-add-form" role="form" action="{{ url('/department/create') }}" method="post" novalidate="novalidate">
            {{ csrf_field() }}
            <input type="hidden" name="id" id="add_department_id" />
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">เพิ่มข้อมูลแผนก</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="form_control_1">ชื่อแผนก</label>
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
            <h4 class="modal-title">ลบข้อมูลแผนก <span id="delete-department-title"></span></h4>
        </div>
        <div class="modal-body">
            <div class="caption text-center">
                <i class="glyphicon glyphicon-alert font-red"></i>
                <span class="caption-subject font-red sbold uppercase">ท่านแน่ใจหรือไม่ว่าต้องการลบข้อมูลแผนกนี้</span>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" id="confirm-delete-department-btn" class="btn btn-success mt-ladda-btn ladda-button" data-style="expand-right">
                <span class="ladda-label">ยืนยัน</span>
                <span class="ladda-spinner"></span><span class="ladda-spinner"></span></button>
            <button type="button" data-dismiss="modal" class="btn btn-outline dark">ย้อนกลับ</button>
        </div>
    </div>
@endsection

@section('pageLevelPluginsScript')
    <script src="{{url('assets/global/plugins/ladda/spin.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/ladda/ladda.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
@endsection

@section('pageLevelScripts')
    <script src="{{url('assets/pages/scripts/department-form-validation.js')}}" type="text/javascript"></script>
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
            $(document).on('click','.view-department-button', function(){
                var id = $(this).attr('identity');
                var URL_ROOT = '{{Request::root()}}';
                $.post(URL_ROOT+'/department/detail',
                        {id:  id, _token: '{{csrf_token()}}'}).done(function (input) {
                    $('#view-title').text(input['name']);
                    $('#view_name').val(input['name']);
                }).fail(function () {
                });
                $('#viewModal').modal();
            });
            var tempData;
            $(document).on('click','.edit-department-button', function(e){
                var id = $(this).attr('identity');
                var URL_ROOT = '{{Request::root()}}';
                $.post(URL_ROOT+'/department/detail',
                        {id:  id, _token: '{{csrf_token()}}'}).done(function (input) {
                    tempData = input;
                    $('#edit-title').text(input['name']);
                    $('#edit_department_id').val(input['id']);
                    $('#edit_name').val(input['name']);
                }).fail(function () {
                });
                $('#department-edit-form').validate().resetForm();
                $('#editModal').modal();
            });
            $(document).on('click','#edit-submit-btn', function(e) {
                if($('#department-edit-form').valid()) {
                    e.preventDefault();
                    var l = Ladda.create(this);
                    l.start();
                    function showSuccess(formData, jqForm, options) {
                        toastr['success']('แก้ไขข้อมูลแผนกสำเร็จ', "สำเร็จ");
                        l.stop();
                        resetdepartmentList();
                        resetResultList(keyword);
                        $('#editModal').modal('hide');
                        return true;
                    }

                    function showError(responseText, statusText, xhr, $form) {
                        toastr['error']("กรุณาลองใหม่อีกครั้ง", "ผิดพลาด");
                        l.stop();
                        resetdepartmentList();
                        resetResultList(keyword);
                        return true;
                    }

                    var options = {
                        success: showSuccess,
                        error: showError
                    };
                    $('#department-edit-form').ajaxSubmit(options);
                    return false;
                }
            });
            $('#add-department-btn').click(function () {
                $('#department-add-form').validate().resetForm();
                $('#addModal').modal();
            });
            $(document).on('click','#add-submit-btn', function(e) {
                if($('#department-add-form').valid()){
                    e.preventDefault();
                    var l = Ladda.create(this);
                    l.start();
                    function showSuccess(formData, jqForm, options) {
                        toastr['success']('เพิ่มข้อมูลแผนกสำเร็จ', "สำเร็จ");
                        l.stop();
                        resetdepartmentList();
                        resetResultList(keyword);
                        $('#addModal').modal('hide');
                        return true;
                    }
                    function showError(responseText, statusText, xhr, $form) {
                        toastr['error']("กรุณาลองใหม่อีกครั้ง", "ผิดพลาด");
                        l.stop();
                        resetdepartmentList();
                        resetResultList(keyword);
                        return true;
                    }
                    var options = {
                        success: showSuccess,
                        error: showError,
                        clearForm: true
                    };
                    $('#department-add-form').ajaxSubmit(options);
                    return false;
                }
            });

            $(document).on('click','.delete-department-button', function () {
                var id = $(this).attr('identity');
                var URL_ROOT = '{{Request::root()}}';
                $.post(URL_ROOT+'/department/detail',
                        {id:  id, _token: '{{csrf_token()}}'}).done(function (input) {
                    $('#delete-department-title').text(input['name']);
                    $('#confirm-delete-department-btn').attr('identity',id);
                }).fail(function () {
                });
                $('#removeModal').modal();
            });
            $(document).on('click','#confirm-delete-department-btn', function (e) {
                e.preventDefault();
                var l = Ladda.create(this);
                l.start();
                var id = $(this).attr('identity');
                var URL_ROOT = '{{Request::root()}}';
                $.post(URL_ROOT+'/department/delete',
                        {id:  id, _token: '{{csrf_token()}}'}).done(function (input) {
                    l.stop();
                    if(input == "success"){
                        toastr['success']('ลบข้อมูลแผนกสำเร็จ', "สำเร็จ");
                        resetdepartmentList();
                        resetResultList(keyword);
                        $('#removeModal').modal('hide');
                    }
                    else if (input == "constraint"){
                        toastr['warning']("แผนกนี้ถูกใช้อยู่ในระบบ ไม่สามารถลบได้", "ขออภัย");
                    }
                }).fail(function () {
                    l.stop();
                    toastr['error']("กรุณาลองใหม่อีกครั้ง", "ผิดพลาด");
                    resetdepartmentList();
                    resetResultList(keyword);
                });
            });
            function resetdepartmentList() {
                $.get( "{{url('/department/getDepartmentList')}}").done(function(data) {
                    $('#all-department-list-table-body').empty();
                    for(var m=0;m<data.length;m++){
                        $('#all-department-list-table-body').append(
                                '<tr>'
                                +'<td class="view-all-order"></td>'
                                +'<td>'+ data[m]['name'] +'</td>'
                                +'<td> <button  identity="'+ data[m]['id']+'" type="button" class="btn yellow-crusta edit-department-button">แก้ไข</button> </td>'
                                +'<td> <button  identity="'+ data[m]['id']+'" type="button" class="btn red delete-department-button">ลบ</button></td>'
                                +'</tr>'
                        );
                    }
                    resetAllOrder();
                });
            }

            function resetResultList(keyword){
                var URL_ROOT = '{{Request::root()}}';
                $.post(URL_ROOT+'/department/search',
                        {keyword:  keyword, _token: '{{csrf_token()}}'}).done(function (input) {
                    $('#search-keyword').text(input['keyword']);
                    $('#search-result-table-body').empty();
                    var data = input['department_list'];
                    if(data.length>0){
                        for(var m=0;m<data.length;m++){
                            $('#search-result-table-body').append(
                                    '<tr id="result-row-'+data[m]['id']+'">'
                                    +'<td class="result-order"></td>'
                                    +'<td>'+ data[m]['name'] +'</td>'
                                    +'<td><button  identity="'+ data[m]['id']+'" type="button" class="btn yellow-crusta edit-department-button">แก้ไข</button> </td>'
                                    +'<td><button  identity="'+ data[m]['id']+'" type="button" class="btn red delete-department-button">ลบ</button></td>'
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
                if($('#department-search-form').valid()){
                    e.preventDefault();
                    var l = Ladda.create(this);
                    l.start();
                    function showSuccess(input) {
                        l.stop();
                        keyword = input['keyword'];
                        $('#search-keyword').text(input['keyword']);
                        $('#search-result-table-body').empty();
                        var data = input['department_list'];
                        if(data.length>0){
                            for(var m=0;m<data.length;m++){
                                $('#search-result-table-body').append(
                                        '<tr id="result-row-'+data[m]['id']+'">'
                                        +'<td class="result-order"></td>'
                                        +'<td>'+ data[m]['name'] +'</td>'
                                        +'<td><button  identity="'+ data[m]['id']+'" type="button" class="btn yellow-crusta edit-department-button">แก้ไข</button> </td>'
                                        +'<td><button  identity="'+ data[m]['id']+'" type="button" class="btn red delete-department-button">ลบ</button></td>'
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
                    $('#department-search-form').ajaxSubmit(options);
                    return false;
                }
            });
            $('#cancel-search-btn').click(function () {
                $('#search-result-porlet').addClass('hidden');
            });
        });
    </script>
@endsection

