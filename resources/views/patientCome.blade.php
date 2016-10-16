@extends('masterpage')

@section('profileNav')
    active
@endsection

@section('title')
    ลงทะเบียนผู้ป่วยเข้ารับการตรวจ
@endsection

@section('title-inside')
    ลงทะเบียนผู้ป่วยเข้ารับการตรวจ
@endsection

@section('pageLevelPluginsCSS')
    <link href="{{url('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/ladda/ladda-themeless.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('pageLevelCSS')
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
                            <form class="form-horizontal" role="form" action="../../backend/Appointment/get" method="get">
                                {{csrf_field()}}
                                <div class="form-body" style="padding-bottom: 0px; padding-top: 0px;">
                                    <div class="row">
                                        <div class="col-md-offset-1 col-md-10">
                                            <div class="form-group">
                                                <!--div class="input-group input-group-sm select2-bootstrap-prepend">
                                                    <select id="select2-button-addons-single-input-group-sm" class="form-control js-data-example-ajax" dir="rtl">
                                                        <option value="0" selected="selected">คลิกเพื่อกรอกรหัสนัดหมาย</option>
                                                    </select>
                                                </div-->
                                                <div class="input-group input-group select2-bootstrap-append">
                                                    <select id="select2-button-addons-single-input-group" class="form-control js-data-example-ajax" name="appointment_id">
                                                        <option value="0">คลิกเพื่อกรอกรหัสนัดหมาย</option>
                                                    </select>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="button" data-select2-open="select2-button-addons-single-input-group">
                                                        <span class="glyphicon glyphicon-search"></span>
                                                    </button>
                                                </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row" style="text-align: right;">
                                        <button type="submit" class="btn btn-success mt-ladda-btn ladda-button" data-style="expand-right">
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
    <script src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
@endsection

@section('pageLevelScripts')
    <script src="{{url('assets/pages/scripts/components-select2-appointment.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/pages/scripts/ui-buttons.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/pages/scripts/form-validation.js')}}" type="text/javascript"></script>
@endsection

