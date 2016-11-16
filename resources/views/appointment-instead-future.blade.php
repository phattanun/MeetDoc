@extends('masterpage')

@section('insteadEditNav')
    active
@endsection

@section('title')
    แก้ไขการนัดหมายของผู้ป่วย
@endsection

@section('title-inside')
    <a href="{{url('officer/appointment/edit')}}">แก้ไขการนัดหมายของผู้ป่วย</a> / {{$_user['name']}} {{$_user['surname']}}
@endsection

@section('pageLevelPluginsCSS')
    <link href="{{url('assets/global/plugins/ladda/ladda-themeless.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('pageLevelCSS')
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
                                            <th>  </th>
                                            <th>  </th>
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
                                                <td><form role="form" action="{{url('officer/appointment/edit')}}/{{$app->patient_id}}" method="post"> {{ csrf_field() }}<input name="id" type="hidden" value="{{$app->app_id}}"><button id="{{$app->app_id}}" type="submit" class="postpone-btn btn yellow-crusta">แก้ไข</button></form></td>
                                                <td><a id="{{$app->app_id}}" type="button" class="cancel-app-btn btn red">ยกเลิก</a></td>
                                            <tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
            <!-- END PROFILE CONTENT -->

    <div id="cancelAppModal" class="modal fade" tabindex="-1" data-width="320">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">ยกเลิกการนัดหมายรหัส <span id="delete-title"></span></h4>
        </div>
        <div class="modal-body">
            <div class="caption text-center">
                <i class="glyphicon glyphicon-alert font-red"></i>
                <span class="caption-subject font-red sbold uppercase">ท่านแน่ใจหรือไม่ว่าต้องการยกเลิกการนัดหมายนี้</span>
            </div>
            </div>
        <div class="modal-footer">
            <button type="button" id="confirm-cancel-app-btn" class="btn btn-success mt-ladda-btn ladda-button" data-style="expand-right">
                <span class="ladda-label">ยืนยัน</span>
                <span class="ladda-spinner"></span><span class="ladda-spinner"></span></button>
            <button type="button" data-dismiss="modal" class="btn btn-outline dark">ย้อนกลับ</button>
        </div>
    </div>
    <div id="emailConfirmAlertModal" data-backdrop="static" class="modal fade" tabindex="-1" data-focus-on="input:first">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">ยืนยันการยกเลิกการนัดหมายทางอีเมล</h4>
        </div>
        <div class="modal-body">
            <div class="caption text-center">
                <i class="glyphicon glyphicon-alert font-red"></i>
                <span class="caption-subject font-red sbold uppercase">ระบบจะส่งจดหมายยืนยันการยกเลิกการนัดหมายไปทางอีเมล<br>และโทรศัพท์เคลื่อนที่ของท่าน กรุณายืนยันภายใน 1 วัน</span>
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{url('officer/appointment/edit')}}/{{$patient_id}}"  class="btn green">รับทราบ</a>
        </div>
    </div>
@endsection

@section('pageLevelPluginsScript')
    <script src="{{url('assets/global/plugins/ladda/spin.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/ladda/ladda.min.js')}}" type="text/javascript"></script>
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
            $(document).on('click','.cancel-app-btn', function () {
                $('#confirm-cancel-app-btn').attr('identity',this.id);
                $('#delete-title').text(this.id);
                $('#cancelAppModal').modal();
            });
            $('#confirm-cancel-app-btn').click(function () {
                var l = Ladda.create(this);
                l.start();
                $.post('{{url('officer/appointment/cancel')}}',
                        {id:  $(this).attr('identity'), _token: '{{csrf_token()}}'}).done(function (input) {
                    l.stop();
                    if(input=='success'){
                        toastr['success']('ขอยกเลิกการนัดหมายสำเร็จ', "สำเร็จ");
                        $('#cancelAppModal').modal('hide');
                        $('#emailConfirmAlertModal').modal();
                    }
                    else if(input=='fail'){
                        l.stop();
                        toastr['error']("กรุณาลองใหม่อีกครั้ง", "ผิดพลาด");
                    }
                }).fail(function () {
                    l.stop();
                    toastr['error']("กรุณาลองใหม่อีกครั้ง", "ผิดพลาด");
                });
            });
            $(document).on('click','.postpone-btn', function () {

            })
        })
    </script>
@endsection

