@if( !isset($controller) && !isset($page))
    <h3>MessageController</h3>
    <ul>
        <li><a href="{{ action('MessageController@sendEmail') }}" target="side">email</a></li>
        <li><a href="{{ action('MessageController@send_sms') }}" target="side">sms</a></li>
    </ul>
    <h3>AccountController</h3>
    <ul>
        <li><a href="{{ action('PagesController@viewLogin') }}" target="side">login</a></li>
        <li><a href="{{ action('AccountController@loginStatus') }}" target="side">loginStatus</a></li>
        <li><a href="{{ action('AccountController@getUserList') }}" target="side">getUserList</a></li>
        <li><a href="{{ action('AccountController@register') }}" target="side">register</a></li>
        <li><a href="{{ action('AccountController@edit') }}" target="side">editUser</a></li>
        <li><a href="{{ action('AccountController@getProfile') }}" target="side">getProfile</a></li>
        <li><a href="{{ action('AccountController@forgetPassword') }}" target="side">forgetPassword</a></li>
        <li><a href="{{ action('AccountController@logout') }}" target="side">logout</a></li>
    </ul>
    <h3>ScheduleController</h3>
    <ul>
        <li><a href="{{ action('ScheduleController@getSchedule') }}" target="side">getSchedule</a></li>
        <li>Weekly Schedule</li>
        <ul>
            <li><a href="{{ action('ScheduleController@getScheduleWeekly') }}" target="side">get</a></li>
            <li><a href="{{ action('ScheduleController@addScheduleWeekly') }}" target="side">add</a></li>
            <li><a href="{{ action('ScheduleController@deleteScheduleWeekly') }}" target="side">delete</a></li>
        </ul>
        <li>Daily Schedule</li>
        <ul>
            <li><a href="{{ action('ScheduleController@getScheduleDaily') }}" target="side">get</a></li>
            <li><a href="{{ action('ScheduleController@addScheduleDaily') }}" target="side">add</a></li>
            <li><a href="{{ action('ScheduleController@deleteScheduleDaily') }}" target="side">delete</a></li>
        </ul>
    </ul>
    <h3>AppointmentController</h3>
    <ul>
        <li><a href="{{ action('AppointmentController@getAppointmentList') }}" target="side">get</a></li>
        <li><a href="{{ action('AppointmentController@create') }}" target="side">create</a></li>
        <li><a href="{{ action('AppointmentController@cancel') }}" target="side">cancel (and approve)</a></li>
    </ul>
    <h3>MedicineController</h3>
    <ul>
        <li><a href="{{ action('MedicineController@get_medicine_list') }}" target="side">get</a></li>
        <li><a href="{{ action('MedicineController@get_medicine_detail') }}" target="side">detail</a></li>
        <li><a href="{{ action('MedicineController@create_medicine') }}" target="side">create</a></li>
        <li><a href="{{ action('MedicineController@delete_medicine') }}" target="side">delete</a></li>
        <li><a href="{{ action('MedicineController@edit_medicine') }}" target="side">update</a></li>
    </ul>
    <h3>DiagnosisController</h3>
    <ul>
        <li><a href="{{ action('DiagnosisController@patient_checkin_by_staff') }}" target="side">check in</a></li>
        <li><a href="{{ action('DiagnosisController@get_queue') }}" target="side">get queue</a></li>
        <li><a href="{{ action('DiagnosisController@add_physical_record') }}" target="side">add physical record</a></li>
        <li><a href="{{ action('DiagnosisController@get_patient_profile') }}" target="side">get patient profile</a></li>
        <li><a href="{{ action('DiagnosisController@get_appointment_list') }}" target="side">get appointment list</a></li>
        <li><a href="{{ action('DiagnosisController@diagnosis_record_and_receive_medicine') }}" target="side">view diagnosis record</a></li>
        <li><a href="{{ action('DiagnosisController@give_medicine') }}" target="side">give medicine</a></li>
        Allergic
        <ul>
            <li><a href="{{ action('DiagnosisController@add_allergic_medicine') }}" target="side">add allergic medicine</a></li>
            <li><a href="{{ action('DiagnosisController@delete_allergic_medicine') }}" target="side">delete allergic medicine</a></li>
        </ul>
    </ul>
    <h3>SystemController</h3>
    <ul>
        <li><a href="{{ action('DiseaseController@get_disease_list') }}" target="side">get disease list</a></li>
        <li><a href="{{ action('DiseaseController@add_disease') }}" target="side">add disease</a></li>
        <li><a href="{{ action('DiseaseController@edit_disease') }}" target="side">edit disease</a></li>
        <li><a href="{{ action('DiseaseController@delete_disease') }}" target="side">delete disease</a></li>
    </ul>
    <iframe name="side" style="width: 75%;height: 99%;position: absolute;right:0px;top:0px;"></iframe>
@elseif($page == "get")
    <?php
        echo "Dump GET:";
        var_dump($_GET);
    ?>
@elseif($page == "post")
    <?php
        echo "Dump POST:";
        var_dump($_POST);
    ?>

@elseif($controller == "Account")
    @if($page == "login")
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            <input type="text"      name="ssn"      placeholder="SSN" pattern="[0-9]*" /><br>
            <input type="text"      name="password" placeholder="Password" /><br>
            <input type="checkbox"  name="remember" />Remember me pls..<br>
            <button type="submit">Submit</button>
        </form>
    @elseif($page == "register")
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            <input type="number"    name="id"      placeholder="SSN" /><br>
            <input type="text"      name="name"     placeholder="Name" /><br>
            <input type="text"      name="surname"  placeholder="Surname" /><br>
            <select name="gender">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select><br>
            Birthday<input type="date"      name="birthday"  /><br>
            <input type="email"     name="email"    placeholder="Email" /><br>
            <input type="text"      name="address"  placeholder="Address" /><br>
            <input type="number"    name="phone_no" placeholder="Phone no." /><br>
            <button type="submit">Submit</button>
        </form>
    @elseif($page == "edit")
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            <input type="number"    name="id"       placeholder="ID" /> <= Key <br>
            <input type="number"    name="ssn"      placeholder="SSN" /><br>
            <input type="text"      name="name"     placeholder="Name" /><br>
            <input type="text"      name="surname"  placeholder="Surname" /><br>
            <select name="gender">
                <option value=""></option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select><br>
            <input type="email"     name="email"    placeholder="Email" /><br>
            <input type="text"      name="address"  placeholder="Address" /><br>
            <input type="number"    name="phone_no" placeholder="Phone no." /><br>
            <button type="submit">Submit</button>
        </form>
    @elseif($page == "forgetPassword")
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            <input type="number"    name="id"      placeholder="SSN" /> <= Key <br>
            <button type="submit">Submit</button>
        </form>
    @elseif($page == "resetPassword")
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            <input type="hidden"  name="id"         value="{{ $_GET['id'] }}">
            <input type="hidden"  name="cfp"        value="{{ $_GET['cfp'] }}">
            <input type="text"    name="password"   placeholder="Password" /><br>
            <input type="text"    name="repassword" placeholder="Re-enter Password" /><br>
            <button type="submit">Submit</button>
        </form>
    @elseif($page == "getProfile")
    <form action="{{$page}}" method="post" >
        {{ csrf_field() }}
        <input type="number"    name="id"      placeholder="ID" /> <= Key <br>
        <button type="submit">Submit</button>
    </form>
    @else
        Not found "{{ $controller }}/{{ $page }}"
    @endif
@elseif($controller == "Appointment")
    @if($page == "create")
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            <input type="number"    name="patient_id"  placeholder="Patient's ID" /><br>
            <input type="number"    name="doctor_id"   placeholder="Doctor's ID" /><br>
            <input type="date"      name="date"         placeholder="Date" /><br>
            <select name="time">
                <option value="M">Morning   ( 8.00 - 11.00)</option>
                <option value="A">Afternoon (13.00 - 18.00)</option>
            </select><br>
            <input type="text"      name="symptom"      placeholder="Symptom" /><br>
            <button type="submit">Submit</button>
        </form>
    @elseif($page == "cancel")
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            <input type="number"    name="id"  placeholder="Appointment's ID" /><br>
            <button type="submit">Submit</button>
        </form>
    @else
        Not found "{{ $controller }}/{{ $page }}"
    @endif
@elseif($controller == "Schedule")
    @if($page == "addScheduleWeekly")
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            Doctor SSN:
            <input type="number"    name="doctor_ssn"   placeholder="Doctor's SSN" /><br>
            Day:
            <select name="day">
                <option value="Sunday">Sunday</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
            </select><br>
            Time:
            <select name="time">
                <option value="M">Morning   ( 8.00 - 11.00)</option>
                <option value="A">Afternoon (13.00 - 18.00)</option>
            </select><br>
            Department id:
            <select name="dept_id">
                <option value="1">A</option>
                <option value="2">B</option>
                <option value="3">C</option>
                <option value="4">D</option>
            </select><br>
            <button type="submit">Submit</button>
        </form>
    @elseif($page == "deleteScheduleWeekly")
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            Doctor SSN:
            <input type="number"    name="doctor_ssn"   placeholder="Doctor's SSN" /><br>
            Day:
            <select name="day">
                <option value="Sunday">Sunday</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
            </select><br>
            Time:
            <select name="time">
                <option value="M">Morning   ( 8.00 - 11.00)</option>
                <option value="A">Afternoon (13.00 - 18.00)</option>
            </select><br>
            <button type="submit">Submit</button>
        </form>
    @elseif($page == "addScheduleDaily")
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            Doctor SSN:
            <input type="number"    name="doctor_ssn"   placeholder="Doctor's SSN" /><br>
            Date:
            <input type="date"      name="date" /><br>
            Time:
            <select name="time">
                <option value="M">Morning   ( 8.00 - 11.00)</option>
                <option value="A">Afternoon (13.00 - 18.00)</option>
            </select><br>
            Task:
            <select name="type">
                <option value="sub">Cancel</option>
                <option value="add">Attend</option>
            </select><br>
            Department id:
            <select name="dept_id">
                <option value=""></option>
                <option value="1">A</option>
                <option value="2">B</option>
                <option value="3">C</option>
                <option value="4">D</option>
            </select><br>
            <button type="submit">Submit</button>
        </form>
    @elseif($page == "deleteScheduleDaily")
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            Doctor SSN:
            <input type="number"    name="doctor_ssn"   placeholder="Doctor's SSN" /><br>
            Date:
            <input type="date"      name="date" /><br>
            Time:
            <select name="time">
                <option value="M">Morning   ( 8.00 - 11.00)</option>
                <option value="A">Afternoon (13.00 - 18.00)</option>
            </select><br>
            <button type="submit">Submit</button>
        </form>
    @elseif($page == "getSchedule")
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            Doctor id:
            <input type="number"    name="doctor_id"   placeholder="Doctor's id" /><br>
            From: <input type="date" name="from" /><br>
            To:   <input type="date" name="to" /><br>
            <button type="submit">Submit</button>
        </form>
    @else
        Not found "{{ $controller }}/{{ $page }}"
    @endif
@elseif($controller == "Medicine")
    @if($page == 'create')
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            <input type="text" name="medicine_name" placeholder="Medicine name" /><br>
            <input type="text" name="business_name" placeholder="Business name" /><br>
            <input type="text" name="type" placeholder="Type" /><br>
            <input type="text" name="description" placeholder="Description" /><br>
            <input type="text" name="instruction" placeholder="Instruction" /><br>
            <input type="text" name="manufacturer" placeholder="Manufacturer" /><br>
            <button type="submit">Submit</button>
        </form>
    @elseif($page == 'update')
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            <input type="text" name="medicine_id" placeholder="Medicine ID" /><br>
            <input type="text" name="medicine_name" placeholder="Medicine name" /><br>
            <input type="text" name="business_name" placeholder="Business name" /><br>
            <input type="text" name="type" placeholder="Type" /><br>
            <input type="text" name="description" placeholder="Description" /><br>
            <input type="text" name="instruction" placeholder="Instruction" /><br>
            <input type="text" name="manufacturer" placeholder="Manufacturer" /><br>
            <button type="submit">Submit</button>
        </form>
    @elseif($page == 'delete')
        <form action="{{$page}}" method="post">
            {{csrf_field()}}
            <input type="number" name="medicine_id" placeholder="Medicine ID" /><br>
            <button type="submit">Submit</button>
        </form>
    @elseif($page == 'detail')
        <form action="{{$page}}" method="post">
            {{csrf_field()}}
            <input type="number" name="medicine_id" placeholder="Medicine ID" /><br>
            <button type="submit">Submit</button>
        </form>
    @endif
@elseif($controller == "Diagnosis")
    @if($page == 'checkin')
        <form action="{{$page}}" method="post">
            {{csrf_field()}}
            <input type="number" name="appointment_id" placeholder="Appointment ID"/><br>
            <button type="submit">Submit</button>
        </form>
    @elseif($page=='add_physical_record')
        <form action="{{$page}}" method="post">
            {{csrf_field()}}
            <input type="number" name="appointment_id" placeholder="Appointment ID"/><br>
            <input type="number" step="0.01" name="weight" placeholder="Weight"/><br>
            <input type="number" step="0.01" name="height" placeholder="Height"/><br>
            <input type="number" step="0.01" name="systolic" placeholder="Systolic"/><br>
            <input type="number" step="0.01" name="diastolic" placeholder="Diastolic"/><br>
            <input type="number" step="0.01" name="temperature" placeholder="Temperature"/><br>
            <input type="number" step="0.01" name="heart_rate" placeholder="Heart rate"/><br>

            <button type="submit">Submit</button>
        </form>
    @elseif($page=='get_patient_profile')
        <form action="{{$page}}" method="post">
            {{csrf_field()}}
            <input type="number" name="patient_id" placeholder="User's ID"/><br>

            <button type="submit">Submit</button>
        </form>
    @elseif($page=='appointment_list')
        <form action="{{$page}}" method="post">
            {{csrf_field()}}
            <input type="number" name="patient_id" placeholder="User's ID"/><br>

            <button type="submit">Submit</button>
        </form>
    @elseif($page=='add_allergic_medicine')
        <form action="{{$page}}" method="post">
            {{csrf_field()}}
            <input type="number" name="patient_id" placeholder="User's ID"/><br>
            <input type="number" name="medicine_id" placeholder="Medicine ID"><br>
            <button type="submit">Submit</button>
        </form>
    @elseif($page=='delete_allergic_medicine')
        <form action="{{$page}}" method="post">
            {{csrf_field()}}
            <input type="number" name="patient_id" placeholder="User's ID"/><br>
            <input type="number" name="medicine_id" placeholder="Medicine ID"><br>
            <button type="submit">Submit</button>
        </form>
    @elseif($page=='view_diagnosis_record')
        <form action="{{$page}}" method="post">
            {{csrf_field()}}
            <input type="number" name="patient_id" placeholder="User's ID"/><br>

            <button type="submit">Submit</button>
        </form>
    @elseif($page=='give_medicine')
        <form action="{{$page}}" method="post">
            {{csrf_field()}}
            <input type="number" name="appointment_id" placeholder="Appointment ID"/><br>
            <button type="submit">Submit</button>
        </form>
    @else
        Not found "{{ $controller }}/{{ $page }}"
    @endif
@elseif($controller == "Message")
    @if($page == 'send_email')
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            <input type="email" name="email" placeholder="Receiver's email" /><br>
            <input type="text" name="subject" placeholder="Subject" value="[MeetDoc] Testing"/><br>
            <input type="text" name="message" placeholder="Message" value="Hello World!" /><br>
            <button type="submit">Submit</button>
        </form>
    @elseif($page == 'send_sms')
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            <input type="text" name="receive_phone_number" placeholder="Phone number" /><br>
            <input type="text" name="sms_text" placeholder="Message" /><br>
            <button type="submit">Submit</button>
        </form>
    @else
        Not found "{{ $controller }}/{{ $page }}"
    @endif
@elseif($controller == "Disease")
    @if($page == 'add_disease')
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            <input type="text" name="disease_name" placeholder="Disease name" /><br>
            <input type="text" name="disease_icd10" placeholder="Disease ICD10" /><br>
            <input type="text" name="disease_snomed" placeholder="Disease SNOMED" /><br>
            <button type="submit">Submit</button>
        </form>
    @elseif($page == 'edit_disease')
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            <input type="number" name="disease_id" placeholder="Disease ID" /><br>
            <input type="text" name="disease_name" placeholder="Disease name" /><br>
            <input type="text" name="disease_icd10" placeholder="Disease ICD10" /><br>
            <input type="text" name="disease_snomed" placeholder="Disease SNOMED" /><br>
            <button type="submit">Submit</button>
        </form>
    @elseif($page == 'delete_disease')
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            <input type="number" name="disease_id" placeholder="Disease ID" /><br>
            <button type="submit">Submit</button>
        </form>
    @endif
@else
    Not found "{{ $controller }}/{{ $page }}"
@endif
