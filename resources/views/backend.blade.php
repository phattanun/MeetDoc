@if($page == "get")
    <?php
        var_dump($_GET)
    ?>
@elseif($page == "post")
    <?php
        var_dump($_POST)
    ?>

@elseif($controller == "Account")
    @if($page == "register")
        <form action="register" method="post" >
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
            <input type="number"    name="phone_no"  placeholder="Phone no."></input><br>
            <input type="password"  name="password" placeholder="Password"></input><br>
            <button type="submit">Submit</button>
        </form>
    @elseif($page == "edit")
        <form action="edit" method="post" >
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
            <input type="number"    name="phone_no"  placeholder="Phone no."></input><br>
            <input type="password"  name="password" placeholder="Password"></input><br>
            <button type="submit">Submit</button>
        </form>
    @elseif($page == "getProfile")
    <form action="getProfile" method="post" >
        {{ csrf_field() }}
        <input type="number"    name="ssn"      placeholder="SSN"></input> <= Key <br>
        <button type="submit">Submit</button>
    </form>
    @endif
@else
    Not found "{{ $controller }}/{{ $page }}"
@endif
