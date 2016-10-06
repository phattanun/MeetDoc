@extends('masterpage')

@section('profileNav')
    active
@endsection

@section('title')
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
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="odd gradeX">
                                <td>07/10/2559</td>
                                <td>เช้า</td>
                                <td>แผนกหู คอ จมูก</td>
                                <td>นายกิตติภณ</td>
                                <td>พละการ</td>
                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                <td>21</td>
                            </tr>
                            <tr class="odd gradeX">
                                <td>07/10/2559</td>
                                <td>เช้า</td>
                                <td>แผนกหู คอ จมูก</td>
                                <td>นายกิตติภพ</td>
                                <td>พละการ</td>
                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                <td>21</td>
                            </tr>
                            <tr class="odd gradeX">
                                <td>07/10/2559</td>
                                <td>เช้า</td>
                                <td>แผนกหู คอ จมูก</td>
                                <td>ก</td>
                                <td>ก</td>
                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                <td>21</td>
                            </tr>
                            <tr class="odd gradeX">
                                <td>07/10/2559</td>
                                <td>เช้า</td>
                                <td>แผนกหู คอ จมูก</td>
                                <td>ข</td>
                                <td>ข</td>
                                <td><i class="fa fa-female" aria-hidden="true"></i> หญิง</td>
                                <td>21</td>
                            </tr>
                            <tr class="odd gradeX">
                                <td>07/10/2559</td>
                                <td>เช้า</td>
                                <td>แผนกหู คอ จมูก</td>
                                <td>ค</td>
                                <td>ค</td>
                                <td><i class="fa fa-female" aria-hidden="true"></i> หญิง</td>
                                <td>21</td>
                            </tr>
                            <tr class="odd gradeX">
                                <td>07/10/2559</td>
                                <td>เช้า</td>
                                <td>แผนกหู คอ จมูก</td>
                                <td>ง</td>
                                <td>ง</td>
                                <td> <i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                <td>21</td>
                            </tr>
                            </tbody>
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

