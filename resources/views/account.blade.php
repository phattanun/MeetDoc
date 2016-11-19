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
    <link href="{{url('assets/pages/css/appHistory.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="portlet light ">
        <div class="portlet-title">
            <div class="caption caption-md">
                <i class="icon-globe theme-font hide"></i>
                <span class="caption-subject font-blue-madison bold uppercase">ค้นหาบัญชีผู้ใช้ที่ต้องการดู/แก้ไข/ลบข้อมูล</span>
            </div>
        </div>
        <div class="portlet-body">
            <form id="account-search-form" role="form" action="{{ url('/account/search') }}" method="post" novalidate="novalidate">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-2 control-label text-right">ค้นหาบัญชีผู้ใช้
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-10">
                                    <input class="form-control" name="keyword" placeholder="กรุณากรอกหมายเลขประจำตัวผู้ป่วย หมายเลขบัตรประจำตัวประชาชน ชื่อ หรือนามสกุล" required aria-required="true" />
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
                        <th> หมายเลขประจำตัวผู้ป่วย </th>
                        <th> หมายเลขบัตรประจำตัวประชาชน </th>
                        <th> ชื่อ </th>
                        <th> นามสกุล </th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="search-result-table-body">
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
                <span class="caption-subject font-blue-madison bold uppercase">รายการบัญชีผู้ใช้ทั้งหมด</span>
            </div>
            <div class="text-right"> <a href="{{url('register')}}" type="button" class="btn green" id="add-account-btn">เพิ่มบัญชีผู้ใช้</a></div>
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th> ลำดับที่ </th>
                        <th> หมายเลขประจำตัวผู้ป่วย </th>
                        <th> หมายเลขบัตรประจำตัวประชาชน </th>
                        <th> ชื่อ </th>
                        <th> นามสกุล </th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="all-account-list-table-body">
                    @foreach($accountList as $account)
                        <tr>
                            <td class="view-all-order">  </td>
                            <td> {{$account->id}} </td>
                            <td> {{$account->ssn}} </td>
                            <td> {{$account->name}} </td>
                            <td> {{$account->surname}} </td>
                            <td> <button  identity="{{$account->id}}" type="button" class="btn blue view-account-button">ดู</button> </td>
                            <td> <a href="{{url('account/manage/')}}/{{$account->id}}" id="edit-account-id" type="button" class="btn btn-warning" >แก้ไข</a> </td>
                            <td> <button  identity="{{$account->id}}" type="button" class="btn red delete-account-button">ลบ</button></td>
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
            <h4 class="modal-title">ข้อมูลบัญชีผู้ใช้ <span id="view-title"></span></h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-4 control-label" for="view_id">หมายเลขประจำตัวผู้ป่วย</label>
                    <div class="col-md-8">
                        <input class="form-control" readonly="" value="" id="view_id"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-4 control-label" for="view_ssn">หมายเลขบัตรประจำตัวประชาชน</label>
                    <div class="col-md-8">
                        <input class="form-control" readonly="" value="" id="view_ssn"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-4 control-label" for="view_name">ชื่อ</label>
                    <div class="col-md-8">
                        <input class="form-control" readonly="" value="" id="view_name"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-4 control-label" for="view_surname">นามสกุล</label>
                    <div class="col-md-8">
                        <input class="form-control" readonly="" value="" id="view_surname"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-4 control-label" for="view_gender">เพศ</label>
                    <div class="col-md-8">
                        <input class="form-control" readonly="" value="" id="view_gender"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-4 control-label" for="view_birthday">วันเกิด</label>
                    <div class="col-md-8">
                        <input class="form-control" readonly="" value="" id="view_birthday"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-4 control-label" for="view_email">อีเมล</label>
                    <div class="col-md-8">
                        <input class="form-control" readonly="" value="" id="view_email"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-4 control-label" for="view_address">ที่อยู่</label>
                    <div class="col-md-8">
                        <input class="form-control" readonly="" value="" id="view_address"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-4 control-label" for="view_phone">หมายเลขโทรศัพท์เคลื่อนที่</label>
                    <div class="col-md-8">
                        <input class="form-control" readonly="" value="" id="view_phone"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-4 control-label" for="view_allergy">ประวัติการแพ้ยา</label>
                    <div class="col-md-8">
                        <input class="form-control" readonly="" value="" id="view_allergy"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-outline dark">ย้อนกลับ</button>
        </div>
    </div>

    <div id="removeModal" class="modal fade" tabindex="-1" data-width="320">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">ลบข้อมูลบัญชีผู้ใช้ <span id="delete-account-title"></span></h4>
        </div>
        <div class="modal-body">
            <div class="caption text-center">
                <i class="glyphicon glyphicon-alert font-red"></i>
                <span class="caption-subject font-red sbold uppercase">ท่านแน่ใจหรือไม่ว่าต้องการลบบัญชีผู้ใช้นี้</span>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" id="confirm-delete-account-btn" class="btn btn-success mt-ladda-btn ladda-button" data-style="expand-right">
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
    <script src="{{url('assets/pages/scripts/account-form-validation.js')}}" type="text/javascript"></script>
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
            $(document).on('click','.view-account-button', function(){
                var id = $(this).attr('identity');
                var URL_ROOT = '{{Request::root()}}';
                $.post(URL_ROOT+'/account/detail',
                        {id:  id, _token: '{{csrf_token()}}'}).done(function (input) {
                    $('#view_id').val(input['id']);
                    $('#view_ssn').val(input['ssn']);
                    $('#view_name').val(input['name']);
                    $('#view_surname').val(input['surname']);
                    $('#view_gender').val(input['gender']);
                    $('#view_birthday').val(input['birthday']);
                    $('#view_address').val(input['address']);
                    $('#view_phone').val(input['phone_no']);
                    $('#view_email').val(input['email']);
                    $('#view_allergy').val(input['email']);
                }).fail(function () {
                });
                $('#viewModal').modal();
            });
            $(document).on('click','.delete-account-button', function () {
                var id = $(this).attr('identity');
                var URL_ROOT = '{{Request::root()}}';
                $.post(URL_ROOT+'/account/detail',
                        {id:  id, _token: '{{csrf_token()}}'}).done(function (input) {
                    $('#delete-account-title').text(input['name'] +" "+ input['surname']);
                    $('#confirm-delete-account-btn').attr('identity',id);
                }).fail(function () {
                });
                $('#removeModal').modal();
            });
            $(document).on('click','#confirm-delete-account-btn', function (e) {
                e.preventDefault();
                var l = Ladda.create(this);
                l.start();
                var id = $(this).attr('identity');
                var URL_ROOT = '{{Request::root()}}';
                $.post(URL_ROOT+'/account/delete',
                        {id:  id, _token: '{{csrf_token()}}'}).done(function (input) {
                    l.stop();
                    toastr['success']('ลบข้อมูลบัญชีผู้ใช้สำเร็จ', "สำเร็จ");
                    resetaccountList();
                    resetResultList(keyword);
                    $('#removeModal').modal('hide');
                }).fail(function () {
                    l.stop();
                    toastr['error']("กรุณาลองใหม่อีกครั้ง", "ผิดพลาด");
                    resetaccountList();
                    resetResultList(keyword);
                });
            });
            function resetaccountList() {
                $.get( "{{url('/account/getAccountList')}}").done(function(data) {
                    $('#all-account-list-table-body').empty();
                    for(var m=0;m<data.length;m++){
                        $('#all-account-list-table-body').append(
                                '<tr>'
                                +'<td class="view-all-order"></td>'
                                +'<td>'+ data[m]['id'] +'</td>'
                                +'<td>'+ data[m]['ssn'] +'</td>'
                                +'<td>'+ data[m]['name'] +'</td>'
                                +'<td>'+ data[m]['surname'] +'</td>'
                                +'<td> <button  identity="'+ data[m]['id']+'" type="button" class="btn blue view-account-button">ดู</button> </td>'
                                +'<td> <a href="{{url('account/manage/')}}/'+data[m]['id']+'"  identity="'+ data[m]['id']+'" type="button" class="btn yellow-crusta edit-account-button">แก้ไข</a> </td>'
                                +'<td> <button  identity="'+ data[m]['id']+'" type="button" class="btn red delete-account-button">ลบ</button></td>'
                                +'</tr>'
                        );
                    }
                    resetAllOrder();
                });
            }
            function resetResultList(keyword){
                var URL_ROOT = '{{Request::root()}}';
                $.post(URL_ROOT+'/account/search',
                        {keyword:  keyword, _token: '{{csrf_token()}}'}).done(function (input) {
                    $('#search-keyword').text(input['keyword']);
                    $('#search-result-table-body').empty();
                    var data = input['account_list'];
                    if(data.length>0){
                        for(var m=0;m<data.length;m++){
                            $('#search-result-table-body').append(
                                    '<tr id="result-row-'+data[m]['id']+'">'
                                    +'<td class="result-order"></td>'
                                    +'<td>'+ data[m]['id'] +'</td>'
                                    +'<td>'+ data[m]['ssn'] +'</td>'
                                    +'<td>'+ data[m]['name'] +'</td>'
                                    +'<td>'+ data[m]['surname'] +'</td>'
                                    +'<td><button  identity="'+ data[m]['id']+'" type="button" class="btn blue view-account-button">ดู</button> </td>'
                                    +'<td><a href="{{url('account/manage/')}}/'+data[m]['id']+'"  identity="'+ data[m]['id']+'" type="button" class="btn yellow-crusta edit-account-button">แก้ไข</a> </td>'
                                    +'<td><button  identity="'+ data[m]['id']+'" type="button" class="btn red delete-account-button">ลบ</button></td>'
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
                if($('#account-search-form').valid()){
                    e.preventDefault();
                    var l = Ladda.create(this);
                    l.start();
                    function showSuccess(input) {
                        l.stop();
                        keyword = input['keyword'];
                        $('#search-keyword').text(input['keyword']);
                        $('#search-result-table-body').empty();
                        var data = input['account_list'];
                        if(data.length>0){
                            for(var m=0;m<data.length;m++){
                                $('#search-result-table-body').append(
                                        '<tr id="result-row-'+data[m]['id']+'">'
                                        +'<td class="result-order"></td>'
                                        +'<td>'+ data[m]['id'] +'</td>'
                                        +'<td>'+ data[m]['ssn'] +'</td>'
                                        +'<td>'+ data[m]['name'] +'</td>'
                                        +'<td>'+ data[m]['surname'] +'</td>'
                                        +'<td><button  identity="'+ data[m]['id']+'" type="button" class="btn blue view-account-button">ดู</button> </td>'
                                        +'<td><a href="{{url('account/manage/')}}/'+data[m]['id']+'"  identity="'+ data[m]['id']+'" type="button" class="btn yellow-crusta edit-account-button">แก้ไข</a> </td>'
                                        +'<td><button  identity="'+ data[m]['id']+'" type="button" class="btn red delete-account-button">ลบ</button></td>'
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
                    $('#account-search-form').ajaxSubmit(options);
                    return false;
                }
            });
            $('#cancel-search-btn').click(function () {
                $('#search-result-porlet').addClass('hidden');
            });
        });
    </script>
@endsection