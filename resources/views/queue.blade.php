@extends('masterpage')

@section('profileNav')
    active
@endsection

@section('title')
    หน้าคิว
@endsection

@section('pageLevelPluginsCSS')
    <link href="{{url('assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('pageLevelCSS')
    <link href="{{url('assets/pages/css/profile.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .portlet > .portlet-title > .nav-tabs {
            float: left;
        }
        .fa-female{
            color: hotpink;
        }
        .fa-male{
            color: blue;
        }
        .first-no-column thead tr .first{
            width: 50px;
        }
        .first-no-column thead tr .last{
            width: 200px;
        }
    </style>
    @endsection

    @section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN QUEUE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-title">หน้าคิว</h1>
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">รอตรวจข้อมูลทางกายภาพ</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_2" data-toggle="tab">รอตรวจรักษา</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_3" data-toggle="tab">รอรับยา</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- BEGIN CHECK PHYSICAL DATA TAB -->
                                    <div class="tab-pane active" id="tab_1_1">
                                        <div class="portlet-title margin-bottom-20">
                                            <div class="caption caption-md">
                                                <span class="caption-subject font-blue-madison bold uppercase">ตารางผู้ป่วยรอตรวจข้อมูลทางกายภาพ</span>
                                            </div>
                                        </div>
                                        <!-- BEGIN TABLE -->
                                        <table class="table table-striped table-bordered table-hover order-column first-no-column" id="sample_1">
                                            <thead>
                                            <tr>
                                                <th class="first"> ลำดับที่ </th>
                                                <th> ชื่อ </th>
                                                <th> นามสกุล </th>
                                                <th> เพศ </th>
                                                <th> อายุ </th>
                                                <th> แผนก </th>
                                                <th> อาการ </th>
                                                <th class="last"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>นายกิตติภณ</td>
                                                <td>พละการ</td>
                                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                                <td>21</td>
                                                <td>แผนกหู คอ จมูก</td>
                                                <td>สบายดี</td>
                                                <th>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-history"></i> ประวัติการรักษา</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>นายกิตติภณ</td>
                                                <td>พละการ</td>
                                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                                <td>21</td>
                                                <td>แผนกหู คอ จมูก</td>
                                                <td>สบายดี</td>
                                                <th>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-history"></i> ประวัติการรักษา</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>นายกิตติภณ</td>
                                                <td>พละการ</td>
                                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                                <td>21</td>
                                                <td>แผนกหู คอ จมูก</td>
                                                <td>สบายดี</td>
                                                <th>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-history"></i> ประวัติการรักษา</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>นายกิตติภณ</td>
                                                <td>พละการ</td>
                                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                                <td>21</td>
                                                <td>แผนกหู คอ จมูก</td>
                                                <td>สบายดี</td>
                                                <th>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-history"></i> ประวัติการรักษา</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>นายกิตติภณ</td>
                                                <td>พละการ</td>
                                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                                <td>21</td>
                                                <td>แผนกหู คอ จมูก</td>
                                                <td>สบายดี</td>
                                                <th>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-history"></i> ประวัติการรักษา</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>นายกิตติภณ</td>
                                                <td>พละการ</td>
                                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                                <td>21</td>
                                                <td>แผนกหู คอ จมูก</td>
                                                <td>สบายดี</td>
                                                <th>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-history"></i> ประวัติการรักษา</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>นายกิตติภณ</td>
                                                <td>พละการ</td>
                                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                                <td>21</td>
                                                <td>แผนกหู คอ จมูก</td>
                                                <td>สบายดี</td>
                                                <th>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-history"></i> ประวัติการรักษา</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>นายกิตติภณ</td>
                                                <td>พละการ</td>
                                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                                <td>21</td>
                                                <td>แผนกหู คอ จมูก</td>
                                                <td>สบายดี</td>
                                                <th>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-history"></i> ประวัติการรักษา</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>นายกิตติภณ</td>
                                                <td>พละการ</td>
                                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                                <td>21</td>
                                                <td>แผนกหู คอ จมูก</td>
                                                <td>สบายดี</td>
                                                <th>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-history"></i> ประวัติการรักษา</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>นายกิตติภณ</td>
                                                <td>พละการ</td>
                                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                                <td>21</td>
                                                <td>แผนกหู คอ จมูก</td>
                                                <td>สบายดี</td>
                                                <th>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-history"></i> ประวัติการรักษา</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>นายกิตติภณ</td>
                                                <td>พละการ</td>
                                                <td><i class="fa fa-male" aria-hidden="true"></i> ชาย</td>
                                                <td>21</td>
                                                <td>แผนกหู คอ จมูก</td>
                                                <td>สบายดี</td>
                                                <th>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-history"></i> ประวัติการรักษา</button>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                                </th>
                                            </tr>

                                            </tbody>
                                        </table>
                                        <!-- END TABLE -->
                                    </div>
                                    <!-- END CHECK PHYSICAL DATA TAB -->
                                    <!-- BEGIN WAIT DOCTOR TAB -->
                                    <div class="tab-pane" id="tab_1_2">
                                    </div>
                                    <!-- END WAIT DOCTOR TAB -->

                                    <!-- BEGIN WAIT MEDICINE TAB -->
                                    <div class="tab-pane" id="tab_1_3">
                                    </div>
                                    <!-- END WAIT MEDICINE TAB -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END QUEUE CONTENT -->
        </div>
    </div>
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

