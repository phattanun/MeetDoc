@extends('masterpage')

@section('registerNav')
    active
@endsection

@section('title')
    ลงทะเบียนผู้ป่วยเข้าตรวจ
@endsection

@section('title-inside')
    ลงทะเบียนผู้ป่วยเข้าตรวจ
@endsection

@section('pageLevelPluginsCSS')
    <link href="{{url('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/ladda/ladda-themeless.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('pageLevelCSS')
    <style>
        .select2-container--bootstrap .select2-selection {
            font-family: 'Sukhumvit Set';
        }
    </style>
@endsection

@section('content')

    <div class="normal-content">
        <div class="row">
            <div class="col-md-offset-4 col-md-4">
                <h1 class="page-title">ลงทะเบียนผู้ป่วยเข้ารับการตรวจ</h1>
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption caption-md">
                            <span class="caption-subject font-blue-madison bold uppercase">กรอกรหัสการนัดหมาย</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <!-- BEGIN FORM -->
                        <div class="portlet-body form">
                            <form id="appointment-search-form" class="form-horizontal" role="form" action="{{url('backend/Diagnosis/checkin')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-body" style="padding-bottom: 0px; padding-top: 0px;">
                                    <div class="row">
                                        <div class="col-md-offset-1 col-md-10">
                                            <div class="form-group">
                                                <div class="input-group input-group select2-bootstrap-append">
                                                    <select id="appointment_select2" class="form-control js-data-example-ajax" name="appointment_id">
                                                        <!--option id="first-label" value="0">คลิกเพื่อกรอกรหัสนัดหมาย</option-->
                                                    </select>
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button" data-select2-open="appointment_select2" style="margin-left: 5px;">
                                                            <span class="glyphicon glyphicon-search"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row" style="text-align: right;">
                                        <button type="submit" id="search-appointment-button" class="btn btn-success mt-ladda-btn ladda-button" data-style="expand-right">
                                            <span class="ladda-label">ลงทะเบียน</span>
                                            <span class="ladda-spinner"></span><span class="ladda-spinner"></span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- END FORM -->
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('pageLevelPluginsScript')
    <script src="{{url('assets/pages/scripts/select2-appointment.full.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/ladda/spin.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/ladda/ladda.min.js')}}" type="text/javascript"></script>
@endsection

@section('pageLevelScripts')
    @include('js.components-select2-appointment')
    <script>
        var ComponentsSelect2 = function() {

            var handleDemo = function() {

                // Set the "bootstrap" theme as the default theme for all Select2
                // widgets.
                //
                // @see https://github.com/select2/select2/issues/2927
                $.fn.select2.defaults.set("theme", "bootstrap");

                var placeholder = "Select a State";

                $(".select2, .select2-multiple").select2({
                    placeholder: placeholder,
                    width: null
                });

                $(".select2-allow-clear").select2({
                    allowClear: true,
                    placeholder: placeholder,
                    width: null
                });

                // @see https://select2.github.io/examples.html#data-ajax
                function formatRepo(repo) {
                    if (repo.loading) return repo.text;

                    var markup = "<div class='select2-result-repository clearfix'>" +
                        //"<div class='select2-result-repository__avatar'><img src='" + repo.avatar_url + "' /></div>" +
                        "<div class='select2-result-repository__meta'>" +
                        "<div class='select2-result-repository__title'>" + repo.id + "</div>"+
                        "<div class='select2-result-repository__description'>" + repo.name + " " + repo.surname + "</div>";

                    //if (repo.description) {
                    //    markup += "<div class='select2-result-repository__description'>" + repo.name + " " + repo.surname + "</div>";
                    //}

                    var t;
                    if(repo.time == 'M') t = "Morning";
                    else t = "Afternoon";

                    markup += "<div class='select2-result-repository__statistics'>" +
                        "<div class='select2-result-repository__forks'><span class='glyphicon glyphicon-plus'></span> " + repo.department + "</div>" +
                        "<div class='select2-result-repository__stargazers'><span class='glyphicon glyphicon-time'></span> " + t + "</div>" +
                        "</div>" +
                        "</div></div>";

                    return markup;
                }

                function formatRepoSelection(repo) {
                    return repo.fullname || repo.text;
                }

                $(".js-data-example-ajax").select2({
                    placeholder: "คลิกเพื่อกรอกรหัสนัดหมาย",
                    width: "off",
                    ajax: {
                        url: "{{ url('/backend/Appointment/search') }}",
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                q: params.term, // search term
                                page: params.page
                            };
                        },
                        processResults: function(data, page) {
                            // parse the results into the format expected by Select2.
                            // since we are using custom formatting functions we do not need to
                            // alter the remote JSON data
                            return {
                                results: data.items
                            };
                        },
                        cache: true
                    },
                    escapeMarkup: function(markup) {
                        return markup;
                    }, // let our custom formatter work
                    minimumInputLength: 1,
                    templateResult: formatRepo,
                    templateSelection: formatRepoSelection
                });

                $("button[data-select2-open]").click(function() {
                    $("#" + $(this).data("select2-open")).select2("open");
                });

                $(":checkbox").on("click", function() {
                    $(this).parent().nextAll("select").prop("disabled", !this.checked);
                });

                // copy Bootstrap validation states to Select2 dropdown
                //
                // add .has-waring, .has-error, .has-succes to the Select2 dropdown
                // (was #select2-drop in Select2 v3.x, in Select2 v4 can be selected via
                // body > .select2-container) if _any_ of the opened Select2's parents
                // has one of these forementioned classes (YUCK! ;-))
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
                //main function to initiate the module
                init: function() {
                    handleDemo();
                }
            };

        }();

        if (App.isAngularJsApp() === false) {
            jQuery(document).ready(function() {
                ComponentsSelect2.init();
            });
        }


        $('#search-appointment-button').click(function(e) {
            e.preventDefault();
            if($("#appointment_select2").val()!=0){
                $('.form-group').removeClass('has-error');
                var l = Ladda.create(this);
                l.start();
                function showSuccess(formData, jqForm, options) {
                    toastr['success']("ลงทะเบียนสำเร็จ", "สำเร็จ");
                    l.stop();
                    $("#appointment_select2").select2('destroy');
//                    $("#appointment_select2 option").not( document.getElementById( "first-label" ) ).remove();
                    $("#appointment_select2 option").remove();
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
                $('#appointment-search-form').ajaxSubmit(options);
                return false;
            }
            else{
                $('.form-group').addClass('has-error');
                return false;
            }
        });
    </script>
@endsection
