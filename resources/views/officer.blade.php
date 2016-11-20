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
                    <form id="add-staff-form" class="form-group" action="{{ url('/officer/manage/addStaff') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <label class="col-md-2 control-label text-right">ค้นหาบัญชีผู้ใช้
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-9 margin-bottom-10">
                                <div class="input-group input-group select2-bootstrap-prepend">
                                    <select id="select2-button-addons-single-input-group" class="form-control js-data-example-ajax" name="id"  >
                                        <option value="" selected="selected">กรุณากรอกหมายเลขประจำตัวผู้ป่วย หมายเลขบัตรประจำตัวประชาชน ชื่อ หรือนามสกุล</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-actions right1">
                                    <button type="submit" id="add-staff-btn" class="btn btn-success mt-ladda-btn ladda-button" data-style="expand-right">
                                        <span class="ladda-label">เพิ่ม</span>
                                        <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                                </div>
                            </div>
                        </div>
                    </form>
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
                        <th style="vertical-align:middle" rowspan="2">หมายเลขประจำตัวผู้ป่วย</th>
                        <th style="vertical-align:middle" rowspan="2">หมายเลขบัตรประจำตัวประชาชน</th>
                        <th style="vertical-align:middle" rowspan="2">ชื่อ</th>
                        <th style="vertical-align:middle" rowspan="2">นามสกุล</th>
                        <th style="vertical-align:middle;" rowspan="2">แผนก</th>
                        <th class="text-center" colspan="5">สิทธิ์ในการจัดการ<br></th>
                        <th rowspan="2"></th>
                    </tr>
                    <tr class="text-center">
                        <th>เจ้าหน้าที่</th>
                        <th>พยาบาล</th>
                        <th>แพทย์</th>
                        <th>เภสัชกร</th>
                        <th>ผู้ดูแลระบบ</th>
                    </tr>
                    </thead>
                    <tbody id="staff-table-body"><?php echo $users_list ?></tbody>
                </table>
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
            <button type="button" id="remove-staff-btn" class="btn btn-success mt-ladda-btn ladda-button" data-style="expand-right">
                <span class="ladda-label">ยืนยัน</span>
                <span class="ladda-spinner"></span><span class="ladda-spinner"></span></button>
            <button type="button" data-dismiss="modal" class="btn btn-outline dark">ย้อนกลับ</button>
        </div>
    </div>
@endsection

@section('pageLevelPluginsScript')
    <script src="{{url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/select2/js/select2.full.officer.js')}}" type="text/javascript"></script>
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
    <script src="{{url('assets/pages/scripts/components-date-time-pickers.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/pages/scripts/ui-extended-modals.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/pages/scripts/search.min.js')}}" type="text/javascript"></script>
    <script>
        var ComponentsSelect2 = function() {
            var searchStaff = function() {
                $.fn.select2.defaults.set("theme", "bootstrap");
                function formatUser(user) {
                    if (user.loading) return user.text;

                    var markup = "<div class='select2-result-staff clearfix'>" +
                        "<div class='select2-result-staff__avatar'><img src='"+user.image+"' /></div>" +
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
                $(".select2-dept").select2({
                    width: null
                });
            });
        }
        $(document).on('switchChange.bootstrapSwitch','.make-switch', function () {
            var URL_ROOT = '{{Request::root()}}';
            $.post(URL_ROOT+'/officer/manage/changePermission',
                    {id:  this.id, type:$(this).attr('isa'),permission:this.checked, _token: '{{csrf_token()}}'}).done(function (input) {
                if(input=="success")
                    toastr['success']('แก้ไขสิทธิสำเร็จ', "สำเร็จ");
                else if (input=="constraint") {
                    toastr['warning']("แพทย์ท่านนี้มีนัดอยู่ในระบบ ไม่สามารถลบสิทธิ์แพทย์ได้", "ขออภัย");
                    resetStaffList();
                }
                else {
                    toastr['error']('กรุณาลองใหม่อีกครั้ง', "ผิดพลาด")
                }
            }).fail(function () {
                toastr['error']('กรุณาลองใหม่อีกครั้ง', "ผิดพลาด")
            });
        });

        $(document).on('change','.select2-dept', function () {
            var URL_ROOT = '{{Request::root()}}';
            $.post(URL_ROOT+'/officer/manage/changeDepartment',
                    {id:  this.id, dept_id: this.value, _token: '{{csrf_token()}}'}).done(function (input) {
                        if(input=="success")
                            toastr['success']('แก้ไขแผนกสำเร็จ', "สำเร็จ");
                        else if (input=="constraint") {
                            toastr['warning']("แพทย์ท่านนี้ในแผนกนี้มีนัดอยู่ในระบบ ไม่สามารถแก้ไขได้", "ขออภัย");
                            resetStaffList();
                        }
                        else {
                            toastr['error']('กรุณาลองใหม่อีกครั้ง', "ผิดพลาด")
                        }
            }).fail(function () {
                toastr['error']('กรุณาลองใหม่อีกครั้ง', "ผิดพลาด")
            });
        });

        $(document).on('click','.delete-staff-btn', function () {
            $('#remove-staff-btn').attr('identity',this.id);
            $('#removeModal').modal();
        });
        $(document).on('click','#remove-staff-btn', function () {
            var l = Ladda.create(this);
            l.start();
            var URL_ROOT = '{{Request::root()}}';
            $.post(URL_ROOT+'/officer/manage/removeStaff',
                    {id:  $(this).attr('identity'), _token: '{{csrf_token()}}'}).done(function (input) {
                        if(input=="success"){
                            toastr['success']('ลบสถานะบุคลากรสำเร็จ', "สำเร็จ");
                            resetStaffList();
                            $('#removeModal').modal('hide');
                        }
                        else if(input=="constraint"){
                            toastr['warning']("แพทย์ท่านนี้มีนัดอยู่ในระบบ ไม่สามารถลบสถานะบุคลากรได้", "ขออภัย");
                        }
                        else {
                            toastr['error']('กรุณาลองใหม่อีกครั้ง', "ผิดพลาด")
                        }
                        l.stop();
            }).fail(function () {
                toastr['error']('กรุณาลองใหม่อีกครั้ง', "ผิดพลาด")
            });
        });

        $('#add-staff-btn').click(function () {
                var l = Ladda.create(this);
                l.start();
                function showSuccess(formData, jqForm, options) {
                    toastr['success']('เพิ่มบุคลากรสำเร็จ', "สำเร็จ");
                    l.stop();
                    resetStaffList();
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
                $('#add-staff-form').ajaxSubmit(options);
                return false;
        });
        
        function resetStaffList() {
            $('#staff-table-body').empty();
            var URL_ROOT = '{{Request::root()}}';
            $.post(URL_ROOT+'/officer/getStaffList',
                    {id:  $(this).attr('identity'), _token: '{{csrf_token()}}'}).done(function (input) {
                $('#staff-table-body').html(input);
                $(".select2-dept").select2({
                    width: null
                });
                $('.make-switch').bootstrapSwitch();
            }).fail(function () {
            });
        }
    </script>
@endsection
