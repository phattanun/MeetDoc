@extends('masterpage')

@section('insteadAppNav')
    active
@endsection

@section('title')
    นัดหมายแทนผู้ป่วย
@endsection

@section('title-inside')
    นัดหมายแทนผู้ป่วย {{$name}} {{$surname}}
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
    <link href="{{url('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/pages/css/search.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('pageLevelCSS')
    <link href="{{url('assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/pages/css/officer.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/pages/css/newapp.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!-- END PAGE HEADER-->
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">เลือกผู้ป่วยและค้นหาวันเวลานัดหมาย</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <form id="search-form" role="form" action="{{ url('/officer/schedule/search') }}" method="post" novalidate="novalidate">
                                    {{ csrf_field() }}
                                    @if(isset($patient_id))
                                    <input id="select-user" type="hidden" name="user_id" value="{{$patient_id}}">
                                    @else
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-md-1 control-label text-right">ผู้ป่วย
                                                <span class="required" aria-required="true"> * </span>
                                            </label>
                                            <div class="col-md-11 margin-bottom-15">
                                                {{--<div class="input-group select2-bootstrap-prepend">--}}
                                                <div class=" select2-bootstrap-prepend">
                                                    <select id="select-user" class="form-control js-data-example-ajax" name="user_id"  required aria-required="true" >
                                                        <option value="" selected="selected">กรุณากรอกหมายเลขประจำตัวผู้ป่วย หมายเลขบัตรประจำตัวประชาชน ชื่อ หรือนามสกุล</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-md-2 text-right">แผนก
                                                    <span class="required" aria-required="true"> * </span></label>
                                                <div class="col-md-10">
                                                    <select id="select-department" name="dept_id" class="bs-select form-control" data-live-search="true" required aria-required="true">
                                                        <option value="">กรุณาเลือกแผนก</option>
                                                        @foreach($departments as $department)
                                                            <option value="{{$department['id']}}">{{$department['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-md-2 text-right">แพทย์</label>
                                                <div class="col-md-10">
                                                    <select id="select-doctor" name="doctor_id" class="bs-select form-control" data-live-search="true" disabled>
                                                        <option>กรุณาเลือกแพทย์ หรือให้ระบบเลือกแพทย์อัตโนมัติ</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-md-2 text-right">วันที่
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-10">
                                                    <input name="date" class="form-control form-control-inline date-picker" size="16" value="" type="text" data-date-format="dd/mm/yyyy" data-date-start-date="+0d" required aria-required="true">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                            <label class="control-label col-md-2 text-right">ช่วงเวลา <span class="required" aria-required="true"> * </span></label>
                                                <div class="col-md-10">
                                                    <div class="mt-checkbox-inline">
                                                        <label class="mt-checkbox">
                                                            <input class="checkboxValidate" name="isMorning" id="inlineCheckbox21" value="M" type="checkbox" checked> เช้า (9.00 - 11.30 น.)
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-checkbox">
                                                            <input class="checkboxValidate" name="isAfternoon" id="inlineCheckbox22" value="A" type="checkbox" checked> บ่าย (13.00 - 15.30 น.)
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
                                            <label class="col-md-2 control-label text-right">อาการ
                                                <span class="required" aria-required="true"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <textarea id="symptom" class="form-control" name="symptom" rows="3" placeholder="กรอกอาการป่วยของท่าน เช่น ปวดหัว ตัวร้อน เป็นไข้" required aria-required="true"></textarea>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-actions right1">
                                            <button id="search-btn" type="button" class="btn btn-success mt-ladda-btn ladda-button" data-style="expand-right">
                                                <span class="ladda-label">ค้นหา</span>
                                                <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
            <!-- END PROFILE CONTENT -->
                        <div id="search-result-porlet" class="portlet light hidden">
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
                                            <th> ช่วงเวลา </th>
                                            <th> แพทย์ </th>
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

    <div id="confirmAppModal" class="modal fade" tabindex="-1" data-width="760">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">ยืนยันการนัดหมาย</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="confirm_patient">ผู้ป่วย</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="" id="confirm_patient"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="confirm_department">แผนก</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="" id="confirm_department"  type="text">
                        <input class="form-control" value="" id="confirm_department_id"  type="hidden">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="confirm_doctor">แพทย์</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="" id="confirm_doctor"  type="text">
                        <input class="form-control" value="" id="confirm_doctor_id"  type="hidden">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="confirm_symptom">อาการ</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="" id="confirm_symptom"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="confirm_date">วันที่</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="" id="confirm_date"  type="text">
                        <input class="form-control" value="" id="confirm_date_original"  type="hidden">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="confirm_time">ช่วงเวลา</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="" id="confirm_time"  type="text">
                        <input class="form-control" value="" id="confirm_time_original"  type="hidden" name="">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" id="confirm-app-btn" class="btn green mt-ladda-btn ladda-button" data-style="expand-right">
                <span class="ladda-label">ยืนยัน</span>
                <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
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
                <span class="caption-subject font-red sbold uppercase">ระบบจะส่งจดหมายยืนยันการนัดหมายไปทางอีเมล<br>และโทรศัพท์เคลื่อนที่ของผู้ป่วย กรุณาให้ผู้ป่วยยืนยันภายใน 1 วัน</span>
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{url('/officer/appointment/new')}}" type="button" class="btn green">รับทราบ</a>
        </div>
    </div>
@endsection

@section('pageLevelPluginsScript')
    <script src="{{url('assets/global/plugins/select2/js/select2.full.officer.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
{{--    <script src="{{url('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>--}}
    <script src="{{url('assets/global/plugins/ladda/spin.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/ladda/ladda.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js')}}" type="text/javascript"></script>
<script src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
@endsection

@section('pageLevelScripts')
    <style>
        .select2-result-staff__avatar {
            float: left;
            width: 60px;
            height: 60px;
            margin-right: 10px;
        }
        .select2-result-staff__avatar > img {
            width: 100%;
            height: 100%;
        }
    </style>
    <script src="{{url('assets/pages/scripts/components-bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/pages/scripts/form-validation-appointment.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/pages/scripts/search.min.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            var ComponentsSelect2 = function() {
                var searchStaff = function() {
                    $.fn.select2.defaults.set("theme", "bootstrap");
                    function formatUser(user) {
                        if (user.loading) return user.text;

                        var markup = "<div class='select2-result-staff clearfix'>" +
                                "<div class='select2-result-staff__avatar'><img src='{{ url('assets/pages/media/profile/profile_user.jpg') }}' /></div>" +
                                "<div class='select2-result-staff__meta'>" +
                                "<div class='select2-result-staff__title'>" + user.name + " " + user.surname + "</div>";

                        markup += "<div class='select2-result-staff__details'>" +
                                "<div class='select2-result-staff__id'></span> หมายเลขประจำตัวผู้ป่วย : " + user.id + "</div>" +
                                "<div class='select2-result-staff__ssn'></span> หมายเลขบัตรประจำตัวประชาชน : " + user.ssn + " </div>" +
                                "</div>" +
                                "</div></div>";

                        return markup;
                    }

                    function formatUserSelection(user) {
                        return (user.key==undefined ? user.key : user.name+ " " + user.surname) || user.text;
                    }

                    $(".js-data-example-ajax").select2({
                        width: "off",
                        ajax: {
                            url: "{{ url('officer/manage/list') }}",
                            dataType: 'json',
                            delay: 250,
                            data: function(params) {
                                return {
                                    q: params.term, // search term
                                    page: params.page
                                };
                            },
                            processResults: function(data, page) {
                                return {
                                    results: data.items
                                };
                            },
                            cache: true
                        },
                        escapeMarkup: function(markup) {
                            return markup;
                        },
                        minimumInputLength: 1,
                        templateResult: formatUser,
                        templateSelection: formatUserSelection
                    });

                    $("button[data-select2-open]").click(function() {
                        $("#" + $(this).data("select2-open")).select2("open");
                    });

                    $(":checkbox").on("click", function() {
                        $(this).parent().nextAll("select").prop("disabled", !this.checked);
                    });

                    $(".select2, .select2-multiple, .select2-allow-clear, .js-data-example-ajax").on("select2:open", function() {
                        if ($(this).parents("[class*='has-']").length) {
                            var classNames = $(this).parents("[class*='has-']")[0].className.split(/\s+/);

                            for (var i = 0; i < classNames.length; ++i) {
                                if (classNames[i].match("has-")) {
                                    $("body > .select2-container").addClass(classNames[i]);
                                }
                            }
                        }
                    });

                    $(".js-btn-set-scaling-classes").on("click", function() {
                        $("#select2-multiple-input-sm, #select2-single-input-sm").next(".select2-container--bootstrap").addClass("input-sm");
                        $("#select2-multiple-input-lg, #select2-single-input-lg").next(".select2-container--bootstrap").addClass("input-lg");
                        $(this).removeClass("btn-primary btn-outline").prop("disabled", true);
                    });
                }

                return {
                    init: function() {
                        searchStaff();
                    }
                };

            }();

            if (App.isAngularJsApp() === false) {
                jQuery(document).ready(function() {
                    ComponentsSelect2.init();
                });
            }
            jQuery().datepicker && $(".date-picker").datepicker({
                todayHighlight: true,
                autoclose:!0
            }).datepicker('setDate', new Date());

            $(document).on('click','#more-result', function () {
                $('.more-result').show();
                $(this).hide()
            });

            $('#select-department').on('change', function () {
                $.post('{{url('/department/doctor/get')}}',
                        {dept_id:  this.value, _token: '{{csrf_token()}}'}).done(function (input) {
                        $('#select-doctor').empty();
                        $('#select-doctor').removeAttr('disabled');
                        $('#select-doctor').append('<option value="0">เลือกแพทย์อัตโนมัติ</option>');
                        for(var i=0;i<input.length;i++){
                            $('#select-doctor').append(
                              '<option value="'+ input[i]['id'] +'">'+input[i]['name']+' '+input[i]['surname']+'</option>'
                            );
                        }
                        $('#select-doctor').selectpicker('refresh');
                }).fail(function () {
                });
            });
            function resetResultOrder(){
                var i = 1;
                $('.result-order').each(function () {
                    $(this).text(i);
                    i++;
                });
            }
            $('#search-btn').click(function (e) {
                if($('#search-form').valid()){
                    e.preventDefault();
                    var l = Ladda.create(this);
                    l.start();
                    function showSuccess(input) {
                        l.stop();
                        $('#search-result-table-body').empty();
                        if(input.length==1){
                            $('#search-result-table-body').append(
                            '<tr>'
                           + '<td>1</td>'
                           + '<td>'+input[0]["date"].split('-').reverse().join("/")+'</td>'
                           + '<td>'+((input[0]["time"]=="M") ? "เช้า (9.00 - 11.30 น.)":"บ่าย (13.00 - 15.30 น.)")+'</td>'
                           + '<td>'+input[0]["user"]["name"]+' '+input[0]["user"]["surname"]+'</td>'
                           + '<td><button type="button" class="btn blue make-appointment-btn"   deptname="'+input[m]["department"]["name"]+'" deptid="'+input[m]["dept_id"]+'"  dname="'+input[0]["user"]["name"]+' '+input[0]["user"]["surname"]+'" did="'+input[0]['doctor_id']+'" date="'+input[0]["date"]+'" time="'+input[0]["time"]+'">ทำการนัดหมาย</button> </td>'
                                  +  '<td></td>'
                                  +  '</tr>'
                            );
                        }
                        else if(input.length>1){
                            for(var m=0;m<input.length;m++){
                                if(m==0){
                                    $('#search-result-table-body').append(
                                            '<tr>'
                                            + '<td class="result-order"></td>'
                                            + '<td>'+input[m]["date"].split('-').reverse().join("/")+'</td>'
                                            + '<td>'+((input[m]["time"]=="M") ? "เช้า (9.00 - 11.30 น.)":"บ่าย (13.00 - 15.30 น.)")+'</td>'
                                            + '<td>'+input[m]["user"]["name"]+' '+input[m]["user"]["surname"]+'</td>'
                                            + '<td> <button class="btn blue make-appointment-btn" type="button"   deptname="'+input[m]["department"]["name"]+'" deptid="'+input[m]["dept_id"]+'"  dname="'+input[m]["user"]["name"]+' '+input[m]["user"]["surname"]+'" did="'+input[m]['doctor_id']+'" date="'+input[m]["date"]+'" time="'+input[m]["time"]+'">ทำการนัดหมาย</button> </td>'
                                            +  '<td> <a id="more-result" type="button" class="btn red">ไม่ว่าง</a></td>'
                                            +  '</tr>'
                                    );
                                }
                                else {
                                    $('#search-result-table-body').append(
                                            '<tr class="more-result">'
                                            + '<td class="result-order"></td>'
                                            + '<td>'+input[m]["date"].split('-').reverse().join("/")+'</td>'
                                            + '<td>'+((input[m]["time"]=="M") ? "เช้า (9.00 - 11.30 น.)":"บ่าย (13.00 - 15.30 น.)")+'</td>'
                                            + '<td>'+input[m]["user"]["name"]+' '+input[m]["user"]["surname"]+'</td>'
                                            + '<td><button type="button" class="btn blue make-appointment-btn"  deptname="'+input[m]["department"]["name"]+'" deptid="'+input[m]["dept_id"]+'" dname="'+input[m]["user"]["name"]+' '+input[m]["user"]["surname"]+'" did="'+input[m]['doctor_id']+'" date="'+input[m]["date"]+'" time="'+input[m]["time"]+'">ทำการนัดหมาย</button> </td>'
                                            +  '<td></td>'
                                            +  '</tr>'
                                    );
                                }
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
                        error: showError
                    };
                    $('#search-form').ajaxSubmit(options);
                    return false;
                }
            });
            $(document).on('click','.make-appointment-btn', function () {
                @if(isset($patient_id))
                    $('#confirm_patient').val('{{$name." ".$surname}}');
                @else
                    var data = $("#select-user").select2('data')[0];
                    $('#confirm_patient').val(data.name+" "+data.surname);
                @endif
                $('#confirm_doctor').val($(this).attr('dname'));
                $('#confirm_doctor_id').val($(this).attr('did'));
                $('#confirm_department').val($(this).attr('deptname'));
                $('#confirm_department_id').val($(this).attr('deptid'));
                $('#confirm_symptom').val($('#symptom').val());
                $('#confirm_date').val($(this).attr('date').split('-').reverse().join("/"));
                $('#confirm_time').val(($(this).attr('time')=="M") ? "เช้า (9.00 - 11.30 น.)":"บ่าย (13.00 - 15.30 น.)");
                $('#confirm_date_original').val($(this).attr('date'));
                $('#confirm_time_original').val($(this).attr('time'));
                $('#confirmAppModal').modal();
            });
            $('#confirm-app-btn').click(function (e) {
                e.preventDefault();
                var l = Ladda.create(this);
                l.start();
                $.post('{{url('/officer/appointment/new')}}',
                        {patient_id: $("#select-user").val(),date:   $('#confirm_date_original').val(), time:  $('#confirm_time_original').val(), symptom:   $('#confirm_symptom').val(), doctor_id:  $('#confirm_doctor_id').val(),dept_id: $('#confirm_department_id').val(), _token: '{{csrf_token()}}'}).done(function (input) {
                    if(input=='success'){
                        toastr['success']("ทำการนัดหมายสำเร็จ", "สำเร็จ");
                        $('#emailConfirmAlertModal').modal();
                    }
                    else if(input=='duplicate') {
                        toastr['warning']("ผู้ป่วยมีนัดแล้วในวันและช่วงเวลานี้", "ขออภัย");
                    }
                    l.stop();
                }).fail(function () {
                    toastr['error']("กรุณาลองใหม่อีกครั้ง", "ผิดพลาด");
                    l.stop();
                });
            });
        });
    </script>
@endsection

