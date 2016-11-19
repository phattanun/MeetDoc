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
    <script src="{{url('assets/pages/scripts/components-select2-appointment.js')}}" type="text/javascript"></script>
    <script>
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

