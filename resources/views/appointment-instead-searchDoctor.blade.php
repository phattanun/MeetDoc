@extends('masterpage')

@section('insteadDoctorEditNav')
    active
@endsection

@section('title')
    แก้ไขตารางออกตรวจ
@endsection

@section('title-inside')
    แก้ไขตารางออกตรวจ
@endsection

@section('pageLevelPluginsCSS')
    <link href="{{url('assets/global/plugins/ladda/ladda-themeless.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/pages/css/search.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('pageLevelCSS')
    <link href="{{url('assets/pages/css/officer.css')}}" rel="stylesheet" type="text/css" />
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
@endsection

@section('content')
    <div class="portlet light ">
        <div class="portlet-title">
            <div class="caption caption-md">
                <i class="icon-globe theme-font hide"></i>
                <span class="caption-subject font-blue-madison bold uppercase">ค้นหาแพทย์</span>
            </div>
        </div>
        <div class="portlet-body">
            <form id="search-doctor-form"  novalidate="novalidate"  role="form">
                <div class="row">
                    <div class="form-group">
                        <label class="col-md-1 control-label text-right">แพทย์
                            <span class="required" aria-required="true"> * </span>
                        </label>
                        <div class="col-md-9 margin-bottom-15">
                            <div class=" select2-bootstrap-prepend">
                                <select id="select-user" class="form-control js-data-example-ajax" name="user_id"  required aria-required="true" >
                                    <option value="" selected="selected">กรุณากรอกหมายเลขประจำตัวแพทย์ หมายเลขบัตรประจำตัวประชาชน ชื่อ หรือนามสกุล</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <a id="ok-btn" type="submit" class="btn btn-success">ตกลง</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('pageLevelPluginsScript')
    <script src="{{url('assets/global/plugins/select2/js/select2.full.officer.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/ladda/spin.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/ladda/ladda.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js')}}" type="text/javascript"></script>
@endsection

@section('pageLevelScripts')
    <script>
        $(document).ready(function () {
            var ComponentsSelect2 = function() {
                var searchStaff = function() {
                    $.fn.select2.defaults.set("theme", "bootstrap");
                    function formatUser(user) {
                        if (user.loading) return user.text;
                        var imgURL = (user.image=="")? "{{url('/assets/pages/img/avatars/placeholder.jpg')}}":user.image;
                        var markup = "<div class='select2-result-staff clearfix'>" +
                                "<div class='select2-result-staff__avatar'><img src='"+imgURL+"' /></div>" +
                                "<div class='select2-result-staff__meta'>" +
                                "<div class='select2-result-staff__title'>" + user.name + " " + user.surname + "</div>";

                        markup += "<div class='select2-result-staff__details'>" +
                                "<div class='select2-result-staff__id'></span> หมายเลขประจำตัวแพทย์ : " + user.id + "</div>" +
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
                            url: "{{ url('officer/manage/doctor/list') }}",
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
            $('#select-user').on('change', function () {
                if($('#select-user').val()!=""){
                    $(this).closest('.form-group').removeClass('has-error');
                }
            });
            $('#ok-btn').click(function () {
                if($('#select-user').val()==""){
                    $(this).closest('.form-group').addClass('has-error');
                }
                else {
                    window.location.replace('{{url('/doctor/schedule')}}/'+$("#select-user").val());
                }
            });
        })
    </script>
@endsection

