@extends('masterpage')

@section('profileNav')
    active
@endsection

@section('title')
    แก้ไขตารางออกตรวจ
@endsection

@section('pageLevelPluginsCSS')
    <link href="{{url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('pageLevelCSS')
    <link href="{{url('assets/pages/css/profile.css')}}" rel="stylesheet" type="text/css" />
    @endsection

    @section('content')
        <!-- BEGIN NORMAL SCHEDULE -->
        <div class="normal-content">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">ตารางประจำ</h1>
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption caption-md">
                                <span class="caption-subject font-blue-madison bold uppercase">แก้ไขตารางออกตรวจประจำ</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <!-- BEGIN ADD FORM -->
                            <div class="portlet-body form">
                                <form class="form-horizontal" role="form">
                                    <div class="form-body" style="padding-bottom: 0px;">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>เพิ่มวัน</b></label>
                                                    <div class="col-md-9">
                                                        <select class="form-control">
                                                            <option>วันอาทิตย์</option>
                                                            <option>วันจันทร์</option>
                                                            <option>วันอังคาร</option>
                                                            <option>วันพุธ</option>
                                                            <option>วันพฤหัสบดี</option>
                                                            <option>วันศุกร์</option>
                                                            <option>วันเสาร์</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>ช่วง</b></label>
                                                    <div class="col-md-9">
                                                        <div class="mt-radio-inline">
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios" id="optionsRadios25" value="0" checked=""> เช้า
                                                                <span></span>
                                                            </label>
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios" id="optionsRadios26" value="1" checked=""> บ่าย
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>แผนก</b></label>
                                                    <div class="col-md-9">
                                                        <select class="form-control">
                                                            <option>แผนกอายุรกรรม</option>
                                                            <option>แผนกหู คอ จมูก</option>
                                                            <option>แผนกตา</option>
                                                            <option>แผนกกระดูก</option>
                                                            <option>แผนกฉุกเฉิน</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn green">เพิ่ม</button>
                                            </div>
                                        </div>
                                   </div>
                                </form>
                            </div>
                            <!-- END ADD FORM -->
                            <!-- BEGIN TABLE -->
                            <div class="table-scrollable">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th> ลำดับที่ </th>
                                        <th> วัน </th>
                                        <th> ช่วง </th>
                                        <th> แผนก </th>
                                        <th> ลบ </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td> 1 </td>
                                        <td> วันอาทิตย์ </td>
                                        <td> เช้า </td>
                                        <td> แผนกหู คอ จมูก </td>
                                        <td>
                                            <a href="javascript:;" class="btn red"> ลบ
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> 1 </td>
                                        <td> วันอาทิตย์ </td>
                                        <td> เช้า </td>
                                        <td> แผนกหู คอ จมูก </td>
                                        <td>
                                            <a href="javascript:;" class="btn red"> ลบ
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> 1 </td>
                                        <td> วันอาทิตย์ </td>
                                        <td> เช้า </td>
                                        <td> แผนกหู คอ จมูก </td>
                                        <td>
                                            <a href="javascript:;" class="btn red"> ลบ
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> 1 </td>
                                        <td> วันอาทิตย์ </td>
                                        <td> เช้า </td>
                                        <td> แผนกหู คอ จมูก </td>
                                        <td>
                                            <a href="javascript:;" class="btn red"> ลบ
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- END TABLE -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END NORMAL SCHEDULE -->

        <!-- BEGIN NORMAL SCHEDULE -->
        <div class="normal-content">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">ตารางตรวจเพิ่ม</h1>
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption caption-md">
                                <span class="caption-subject font-blue-madison bold uppercase">แก้ไขตารางออกตรวจเพิ่ม</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <!-- BEGIN ADD FORM -->
                            <div class="portlet-body form">
                                <form class="form-horizontal" role="form">
                                    <div class="form-body" style="padding-bottom: 0px;">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>เพิ่มวัน</b></label>
                                                    <div class="col-md-9">
                                                        <select class="form-control">
                                                            <option>วันอาทิตย์</option>
                                                            <option>วันจันทร์</option>
                                                            <option>วันอังคาร</option>
                                                            <option>วันพุธ</option>
                                                            <option>วันพฤหัสบดี</option>
                                                            <option>วันศุกร์</option>
                                                            <option>วันเสาร์</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>ช่วง</b></label>
                                                    <div class="col-md-9">
                                                        <div class="mt-radio-inline">
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios" id="optionsRadios25" value="0" checked=""> เช้า
                                                                <span></span>
                                                            </label>
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios" id="optionsRadios26" value="1" checked=""> บ่าย
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>แผนก</b></label>
                                                    <div class="col-md-9">
                                                        <select class="form-control">
                                                            <option>แผนกอายุรกรรม</option>
                                                            <option>แผนกหู คอ จมูก</option>
                                                            <option>แผนกตา</option>
                                                            <option>แผนกกระดูก</option>
                                                            <option>แผนกฉุกเฉิน</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn green">เพิ่ม</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- END ADD FORM -->
                            <!-- BEGIN TABLE -->
                            <div class="table-scrollable">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th> ลำดับที่ </th>
                                        <th> วัน </th>
                                        <th> ช่วง </th>
                                        <th> แผนก </th>
                                        <th> ลบ </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td> 1 </td>
                                        <td> วันอาทิตย์ </td>
                                        <td> เช้า </td>
                                        <td> แผนกหู คอ จมูก </td>
                                        <td>
                                            <a href="javascript:;" class="btn red"> ลบ
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> 1 </td>
                                        <td> วันอาทิตย์ </td>
                                        <td> เช้า </td>
                                        <td> แผนกหู คอ จมูก </td>
                                        <td>
                                            <a href="javascript:;" class="btn red"> ลบ
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> 1 </td>
                                        <td> วันอาทิตย์ </td>
                                        <td> เช้า </td>
                                        <td> แผนกหู คอ จมูก </td>
                                        <td>
                                            <a href="javascript:;" class="btn red"> ลบ
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> 1 </td>
                                        <td> วันอาทิตย์ </td>
                                        <td> เช้า </td>
                                        <td> แผนกหู คอ จมูก </td>
                                        <td>
                                            <a href="javascript:;" class="btn red"> ลบ
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- END TABLE -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END NORMAL SCHEDULE -->

        <!-- BEGIN NORMAL SCHEDULE -->
        <div class="normal-content">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">ตารางงดตรวจ</h1>
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption caption-md">
                                <span class="caption-subject font-blue-madison bold uppercase">แก้ไขตารางงดตรวจ</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <!-- BEGIN ADD FORM -->
                            <div class="portlet-body form">
                                <form class="form-horizontal" role="form">
                                    <div class="form-body" style="padding-bottom: 0px;">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>เพิ่มวัน</b></label>
                                                    <div class="col-md-9">
                                                        <select class="form-control">
                                                            <option>วันอาทิตย์</option>
                                                            <option>วันจันทร์</option>
                                                            <option>วันอังคาร</option>
                                                            <option>วันพุธ</option>
                                                            <option>วันพฤหัสบดี</option>
                                                            <option>วันศุกร์</option>
                                                            <option>วันเสาร์</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>ช่วง</b></label>
                                                    <div class="col-md-9">
                                                        <div class="mt-radio-inline">
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios" id="optionsRadios25" value="0" checked=""> เช้า
                                                                <span></span>
                                                            </label>
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios" id="optionsRadios26" value="1" checked=""> บ่าย
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>แผนก</b></label>
                                                    <div class="col-md-9">
                                                        <select class="form-control">
                                                            <option>แผนกอายุรกรรม</option>
                                                            <option>แผนกหู คอ จมูก</option>
                                                            <option>แผนกตา</option>
                                                            <option>แผนกกระดูก</option>
                                                            <option>แผนกฉุกเฉิน</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn green">เพิ่ม</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- END ADD FORM -->
                            <!-- BEGIN TABLE -->
                            <div class="table-scrollable">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th> ลำดับที่ </th>
                                        <th> วัน </th>
                                        <th> ช่วง </th>
                                        <th> แผนก </th>
                                        <th> ลบ </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td> 1 </td>
                                        <td> วันอาทิตย์ </td>
                                        <td> เช้า </td>
                                        <td> แผนกหู คอ จมูก </td>
                                        <td>
                                            <a href="javascript:;" class="btn red"> ลบ
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> 1 </td>
                                        <td> วันอาทิตย์ </td>
                                        <td> เช้า </td>
                                        <td> แผนกหู คอ จมูก </td>
                                        <td>
                                            <a href="javascript:;" class="btn red"> ลบ
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> 1 </td>
                                        <td> วันอาทิตย์ </td>
                                        <td> เช้า </td>
                                        <td> แผนกหู คอ จมูก </td>
                                        <td>
                                            <a href="javascript:;" class="btn red"> ลบ
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> 1 </td>
                                        <td> วันอาทิตย์ </td>
                                        <td> เช้า </td>
                                        <td> แผนกหู คอ จมูก </td>
                                        <td>
                                            <a href="javascript:;" class="btn red"> ลบ
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- END TABLE -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END NORMAL SCHEDULE -->


@endsection

@section('pageLevelPluginsScript')
    <script src="{{url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
@endsection

@section('pageLevelScripts')
    <script src="{{url('assets/pages/scripts/profile.min.js')}}" type="text/javascript"></script>
@endsection
