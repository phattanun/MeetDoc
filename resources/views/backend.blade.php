@if($page == "get")
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
            <input type="text"      name="date"         placeholder="Date"></input><br>
            <select name="time">
                <option value="M">Morning   ( 8.00 - 11.00)</option>
                <option value="A">Afternoon (13.00 - 18.00)</option>
            </select><br>
            <input type="email"     name="email"    placeholder="Email"></input><br>
            <input type="text"      name="address"  placeholder="Address"></input><br>
            <input type="number"    name="phone_no"  placeholder="Phone no."></input><br>
            <input type="password"  name="password" placeholder="Password"></input><br>
            <button type="submit">Submit</button>
        </form>
    @else
        Not found "{{ $controller }}/{{ $page }}"
    @endif
@else
    Not found "{{ $controller }}/{{ $page }}"
@endif
