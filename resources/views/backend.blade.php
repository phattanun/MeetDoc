@if( !isset($controller) && !isset($page))
    <h3>AccountController</h3>
    <ul>
        <li><a href="{{ action('AccountController@getUserList') }}">getUserList</a></li>
        <li><a href="{{ action('AccountController@register') }}">register</a></li>
        <li><a href="{{ action('AccountController@edit') }}">editUser</a></li>
        <li><a href="{{ action('AccountController@getProfile') }}">getProfile</a></li>
    </ul>
    <h3>WorkingTimeController</h3>
    <ul>
        <li><a href="{{ action('WorkingTimeController@getWorkingTime') }}">getWorkingTime</a></li>
        <li>Normal WorkingTime</li>
        <ul>
            <li><a href="{{ action('WorkingTimeController@getNormalWorkingTime') }}">get</a></li>
            <li><a href="{{ action('WorkingTimeController@addNormalWorkingTime') }}">add</a></li>
            <li><a href="{{ action('WorkingTimeController@deleteNormalWorkingTime') }}">delete</a></li>
        </ul>
        <li>Special WorkingTime</li>
        <ul>
            <li><a href="{{ action('WorkingTimeController@getSpecialWorkingTime') }}">get</a></li>
            <li><a href="{{ action('WorkingTimeController@addSpecialWorkingTime') }}">add</a></li>
            <li><a href="{{ action('WorkingTimeController@deleteSpecialWorkingTime') }}">delete</a></li>
        </ul>
    </ul>
    <h3>AppointmentController</h3>
    <ul>
        <li><a href="{{ action('AppointmentController@getAppointmentList') }}">get</a></li>
        <li><a href="{{ action('AppointmentController@create') }}">create</a></li>
        <li><a href="{{ action('AppointmentController@cancel') }}">cancel (and approve)</a></li>
    </ul>
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
    @if($page == "register")
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            <input type="number"    name="ssn"      placeholder="SSN"></input><br>
            <input type="text"      name="name"     placeholder="Name"></input><br>
            <input type="text"      name="surname"  placeholder="Surname"></input><br>
            <select name="gender">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select><br>
            <input type="email"     name="email"    placeholder="Email"></input><br>
            <input type="text"      name="address"  placeholder="Address"></input><br>
            <input type="number"    name="phone_no" placeholder="Phone no."></input><br>
            <input type="password"  name="password" placeholder="Password"></input><br>
            <button type="submit">Submit</button>
        </form>
    @elseif($page == "edit")
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            <input type="number"    name="ssn"      placeholder="SSN"></input> <= Key <br>
            <input type="text"      name="name"     placeholder="Name"></input><br>
            <input type="text"      name="surname"  placeholder="Surname"></input><br>
            <select name="gender">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select><br>
            <input type="email"     name="email"    placeholder="Email"></input><br>
            <input type="text"      name="address"  placeholder="Address"></input><br>
            <input type="number"    name="phone_no" placeholder="Phone no."></input><br>
            <input type="password"  name="password" placeholder="Password"></input><br>
            <button type="submit">Submit</button>
        </form>
    @elseif($page == "getProfile")
    <form action="{{$page}}" method="post" >
        {{ csrf_field() }}
        <input type="number"    name="ssn"      placeholder="SSN"></input> <= Key <br>
        <button type="submit">Submit</button>
    </form>
    @else
        Not found "{{ $controller }}/{{ $page }}"
    @endif
@elseif($controller == "Appointment")
    @if($page == "create")
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            <input type="number"    name="patient_ssn"  placeholder="Patient's SSN"></input><br>
            <input type="number"    name="doctor_ssn"   placeholder="Doctor's SSN"></input><br>
            <input type="date"      name="date"         placeholder="Date"></input><br>
            <select name="time">
                <option value="M">Morning   ( 8.00 - 11.00)</option>
                <option value="A">Afternoon (13.00 - 18.00)</option>
            </select><br>
            <input type="text"      name="symptom"      placeholder="Symptom"></input><br>
            <button type="submit">Submit</button>
        </form>
    @elseif($page == "cancel")
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            <input type="number"    name="id"  placeholder="Appointment's ID"></input><br>
            <button type="submit">Submit</button>
        </form>
    @else
        Not found "{{ $controller }}/{{ $page }}"
    @endif
@elseif($controller == "WorkingTime")
    @if($page == "addNormalWorkingTime")
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            Doctor SSN:
            <input type="number"    name="doctor_ssn"   placeholder="Doctor's SSN"></input><br>
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
    @elseif($page == "deleteNormalWorkingTime")
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            Doctor SSN:
            <input type="number"    name="doctor_ssn"   placeholder="Doctor's SSN"></input><br>
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
    @elseif($page == "addSpecialWorkingTime")
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            Doctor SSN:
            <input type="number"    name="doctor_ssn"   placeholder="Doctor's SSN"></input><br>
            Date:
            <input type="date"      name="date"></input><br>
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
    @elseif($page == "deleteSpecialWorkingTime")
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            Doctor SSN:
            <input type="number"    name="doctor_ssn"   placeholder="Doctor's SSN"></input><br>
            Date:
            <input type="date"      name="date"></input><br>
            Time:
            <select name="time">
                <option value="M">Morning   ( 8.00 - 11.00)</option>
                <option value="A">Afternoon (13.00 - 18.00)</option>
            </select><br>
            <button type="submit">Submit</button>
        </form>
    @elseif($page == "getWorkingTime")
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            Doctor SSN:
            <input type="number"    name="doctor_ssn"   placeholder="Doctor's SSN"></input><br>
            From: <input type="date" name="from"></input><br>
            To:   <input type="date" name="to"></input><br>
            <button type="submit">Submit</button>
        </form>
    @else
        Not found "{{ $controller }}/{{ $page }}"
    @endif
@else
    Not found "{{ $controller }}/{{ $page }}"
@endif
