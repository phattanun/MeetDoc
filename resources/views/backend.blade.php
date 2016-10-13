@if( !isset($controller) && !isset($page))
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
    <h3>WorkingTimeController</h3>
    <ul>
        <li><a href="{{ action('WorkingTimeController@getWorkingTime') }}" target="side">getWorkingTime</a></li>
        <li>Normal WorkingTime</li>
        <ul>
            <li><a href="{{ action('WorkingTimeController@getNormalWorkingTime') }}" target="side">get</a></li>
            <li><a href="{{ action('WorkingTimeController@addNormalWorkingTime') }}" target="side">add</a></li>
            <li><a href="{{ action('WorkingTimeController@deleteNormalWorkingTime') }}" target="side">delete</a></li>
        </ul>
        <li>Special WorkingTime</li>
        <ul>
            <li><a href="{{ action('WorkingTimeController@getSpecialWorkingTime') }}" target="side">get</a></li>
            <li><a href="{{ action('WorkingTimeController@addSpecialWorkingTime') }}" target="side">add</a></li>
            <li><a href="{{ action('WorkingTimeController@deleteSpecialWorkingTime') }}" target="side">delete</a></li>
        </ul>
    </ul>
    <h3>AppointmentController</h3>
    <ul>
        <li><a href="{{ action('AppointmentController@getAppointmentList') }}" target="side">get</a></li>
        <li><a href="{{ action('AppointmentController@create') }}" target="side">create</a></li>
        <li><a href="{{ action('AppointmentController@cancel') }}" target="side">cancel (and approve)</a></li>
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
            <input type="number"    name="ssn"      placeholder="SSN" /><br>
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
            <input type="number"    name="ssn"      placeholder="SSN" /> <= Key <br>
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
            <input type="number"    name="patient_ssn"  placeholder="Patient's SSN" /><br>
            <input type="number"    name="doctor_ssn"   placeholder="Doctor's SSN" /><br>
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
@elseif($controller == "WorkingTime")
    @if($page == "addNormalWorkingTime")
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
    @elseif($page == "deleteNormalWorkingTime")
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
    @elseif($page == "addSpecialWorkingTime")
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
    @elseif($page == "deleteSpecialWorkingTime")
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
    @elseif($page == "getWorkingTime")
        <form action="{{$page}}" method="post" >
            {{ csrf_field() }}
            Doctor SSN:
            <input type="number"    name="doctor_ssn"   placeholder="Doctor's SSN" /><br>
            From: <input type="date" name="from" /><br>
            To:   <input type="date" name="to" /><br>
            <button type="submit">Submit</button>
        </form>
    @else
        Not found "{{ $controller }}/{{ $page }}"
    @endif
@else
    Not found "{{ $controller }}/{{ $page }}"
@endif
