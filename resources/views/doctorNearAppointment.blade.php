@extends('masterpage')

@section('doctorAppointmentNav')
    active
@endsection

@section('title')
    นัดตรวจที่กำลังจะเกิดขึ้นของแพทย์
@endsection

@section('title-inside')
    นัดตรวจที่กำลังจะเกิดขึ้นของแพทย์
@endsection

@section('pageLevelPluginsCSS')
    <link href="{{url('assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('pageLevelCSS')
    <link href="{{url('assets/pages/css/profile.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .fa-female{
            color: hotpink;
        }
        .fa-male{
            color: blue;
        }
    </style>
@endsection

@section('content')
    <!-- BEGIN NORMAL SCHEDULE -->
    <div class="normal-content">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption caption-md">
                            <span class="caption-subject font-blue-madison bold uppercase">ตารางนัดตรวจที่กำลังจะเกิดขึ้น</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <!-- BEGIN TABLE -->
                        <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
                            <thead>
                            <tr>
                                <th> วันที่ </th>
                                <th> ช่วงเวลา </th>
                                <th> แผนก </th>
                                <th> ชื่อ </th>
                                <th> นามสกุล </th>
                                <th> เพศ </th>
                                <th> อายุ </th>
                                <th> อาการ </th>
                            </tr>
                            </thead>
                            <tbody><?php echo $recent_appointment; ?></tbody>
                        </table>
                        <!-- END TABLE -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END NORMAL SCHEDULE -->

@endsection

@section('pageLevelPluginsScript')
    <script src="{{url('assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
@endsection

@section('pageLevelScripts')
    <script>
        $(document).ready(function(){
            $('#sample_1').DataTable();
        });
    </script>
@endsection
