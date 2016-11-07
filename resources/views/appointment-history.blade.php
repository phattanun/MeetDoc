@extends('masterpage')

@section('pastAppNav')
    active
@endsection

@section('title')
    ประวัติการนัดหมายในอดีต
@endsection

@section('title-inside')
    ประวัติการนัดหมายในอดีต
@endsection

@section('pageLevelPluginsCSS')
    {{--<link href="{{url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />--}}
    {{--<link href="{{url('assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css" />--}}
    {{--<link href="{{url('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />--}}
    {{--<link href="{{url('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />--}}
    {{--<link href="{{url('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css" />--}}
    {{--<link href="{{url('assets/global/plugins/ladda/ladda-themeless.min.css')}}" rel="stylesheet" type="text/css" />--}}
    <link href="{{url('assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('pageLevelCSS')
{{--    <link href="{{url('assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />--}}
    <link href="{{url('assets/pages/css/appHistory.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
            <!-- END PROFILE CONTENT -->
                        <div class="portlet light ">
                            <div class="portlet-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th> ลำดับที่ </th>
                                            <th> รหัสการนัดหมาย </th>
                                            <th> วันที่ </th>
                                            <th> ช่วงเวลา </th>
                                            <th> แผนก </th>
                                            <th> แพทย์ </th>
                                            <th> อาการ </th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($appList as $app)
                                            <tr>
                                                <td class="result-order"></td>
                                                <td>{{$app->app_id}}</td>
                                                <td>{{join('/',array_reverse(explode("-", $app->date)))}}</td>
                                                <td>@if($app->time=="M")เช้า (9.00 - 11.30 น.)@else บ่าย (13.00 - 15.30 น.)@endif</td>
                                                <td>{{$app->dept_name}}</td>
                                                <td>{{$app->name}} {{$app->surname}}</td>
                                                <td>{{$app->symptom}}</td>
                                                <td><button id="{{$app->app_id}}" type="button" class="view-btn btn blue">ดู</button> </td>
                                            <tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
            <!-- END PROFILE CONTENT -->

    <div id="appDetailModal" class="modal fade modal-scroll" tabindex="-1" data-width="760">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">ประวัติการนัดหมายรหัส <span id="view-title"></span></h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">แผนก</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="" id="view-department"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">แพทย์</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="" id="view-doctor"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">อาการ</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="" id="view-symptom"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">วันที่</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="" id="view-date"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ช่วงเวลา</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="" id="view-time"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">น้ำหนัก</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="" id="view-weight"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ส่วนสูง</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="" id="view-height"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">Systolic</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="" id="view-systolic"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">Diastolic</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="" id="view-diastoloic"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">อุณหภูมิ</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="" id="view-temperature"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">อัตราการเต้นของหัวใจ</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="" id="view-heartrate"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">ผลการวินิจจัย</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="" id="view-diagnosis"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">โรค</label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="" value="" id="view-disease"  type="text">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">รายการยา</label>
                    <div class="col-md-10">
                        <input class="form-control hidden" readonly="" value="-" id="view-medicine"  type="text">
                        <div class="table-responsive" id="medicine-list">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th> ลำดับที่ </th>
                                    <th> ชื่อยา </th>
                                    <th> ปริมาณ </th>
                                    <th> หน่วย </th>
                                    <th> วิธีใช้ </th>
                                </tr>
                                </thead>
                                <tbody id="view-drug-table-body">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-outline dark">ย้อนกลับ</button>
        </div>
    </div>

@endsection

@section('pageLevelPluginsScript')
    <script src="{{url('assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js')}}" type="text/javascript"></script>
@endsection

@section('pageLevelScripts')
    <script>
        $(document).ready(function () {
            resetResultOrder();
            function resetResultOrder(){
                var i = 1;
                $('.result-order').each(function () {
                    $(this).text(i);
                    i++;
                });
            }
            function resetMedicineOrder(){
                var i = 1;
                $('.medicine-order').each(function () {
                    $(this).text(i);
                    i++;
                });
            }
            $(document).on('click','.view-btn ',function () {
                $.post('{{url('/appointment/detail')}}',
                        {id:  this.id, _token: '{{csrf_token()}}'}).done(function (input) {
                    var app = input['apps'][0];
                    $('#view-title').text(app['app_id']);
                    $('#view-department').val(app['dept_name']);
                    $('#view-doctor').val(app['name'] + ' '+ app['surname']);
                    $('#view-symptom').val(app['symptom']);
                    $('#view-date').val(app['date'].split('-').reverse().join('/'));
                    $('#view-time').val((app["time"]=="M") ? "เช้า (9.00 - 11.30 น.)":"บ่าย (13.00 - 15.30 น.)");

                    $('#view-weight').val((app["weight"]==null) ? "-":(app["weight"] + ' กิโลกรัม'));
                    $('#view-height').val((app["height"]==null) ? "-":(app["height"] + ' เซนติเมตร'));
                    $('#view-systolic').val((app["systolic"]==null) ? "-":(app["systolic"] + ' มิลลิเมตรปรอท'));
                    $('#view-diastoloic').val((app["diastolic"]==null) ? "-":(app["diastolic"] + ' มิลลิเมตรปรอท'));
                    $('#view-temperature').val((app["temperature"]==null) ? "-":(app["temperature"] + ' องศาเซลเซียส'));
                    $('#view-heartrate').val((app["heart_rate"]==null) ? "-":(app["heart_rate"] + ' ครั้งต่อนาที'));
                    $('#view-diagnosis').val((app["diagnosis"]==null) ? "-":(app["diagnosis"]));

                    var disease = input['disease'];
                    if(disease.length>0){
                        var diseasestr = "";
                        for(var i=0;i<disease.length;i++){
                            if(i!=disease.length-1)
                                diseasestr += disease[i]['disease']['name']+ ', ';
                            else
                                diseasestr += disease[i]['disease']['name'];
                        }
                        $('#view-disease').val(diseasestr);
                    }
                    else {
                        $('#view-disease').val("-");
                    }
                    var prescription = input['prescription'];
                    if(prescription.length>0){
                        $('#medicine-list').removeClass('hidden');
                        $('#view-medicine').addClass('hidden');
                        $('#view-drug-table-body').empty();
                        for(var i=0;i<prescription.length;i++){
                            $('#view-drug-table-body').append(
                            '<tr>'
                            + '<td class="medicine-order"></td>'
                            + '<td>'+ prescription[i]['medicine']['business_name'] +'</td>'
                            + '<td>'+ prescription[i]['amount'] +'</td>'
                            + '<td>'+ prescription[i]['unit'] +'</td>'
                            + '<td>'+ prescription[i]['medicine']['instruction'] +'</td>'
                            + '</tr>'
                            );
                        }
                    }
                    else {
                        $('#medicine-list').addClass('hidden');
                        $('#view-medicine').removeClass('hidden');
                    }
                        resetMedicineOrder();
                    if(input == 'fail')
                        toastr['error']("กรุณาลองใหม่อีกครั้ง", "ผิดพลาด");
                }).fail(function () {
                    toastr['error']("กรุณาลองใหม่อีกครั้ง", "ผิดพลาด");
                });
                $("#appDetailModal").modal();
            });
        })
    </script>
@endsection

