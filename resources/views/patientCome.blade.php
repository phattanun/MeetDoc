@extends('masterpage')

@section('profileNav')
    active
@endsection

@section('title')
    ลงทะเบียนผู้ป่วยเข้ารับการตรวจ
@endsection

@section('pageLevelPluginsCSS')
    <link href="{{url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('pageLevelCSS')
    <link href="{{url('assets/pages/css/profile.css')}}" rel="stylesheet" type="text/css" />
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
                            <form class="form-horizontal" role="form">
                                <div class="form-body" style="padding-bottom: 0px; padding-top: 0px;">
                                    <div class="row">
                                        <div class="col-md-offset-1 col-md-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="รหัสนัดหมาย">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-offset-9 col-md-3">
                                            <button type="submit" class="btn green">ลงทะเบียน</button>
                                        </div>
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
    <script src="{{url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
@endsection

@section('pageLevelScripts')
    <script src="{{url('assets/pages/scripts/profile.min.js')}}" type="text/javascript"></script>
@endsection

