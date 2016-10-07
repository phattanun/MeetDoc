<li class="nav-item @yield('profileNav')">
    <a href="{{url('/profile')}}" class="nav-link nav-toggle">
        <i class="icon-user"></i>
        <span class="title">ขัอมูลส่วนตัว</span>
    </a>
</li>
<li class="nav-item  @yield('accountNav')">
    <a href="{{url('/account/manage')}}" class="nav-link nav-toggle">
        <i class="icon-users"></i>
        <span class="title">จัดการบัญชีผู้ใช้</span>
    </a>
</li>
<li class="nav-item  @yield('officerNav')">
    <a href="{{url('/officer/manage')}}" class="nav-link nav-toggle">
        <i class="fa fa-user-md"></i>
        <span class="title">จัดการข้อมูลบุคลากร</span>
    </a>
</li>
<li class="nav-item @yield('diseaseNav')">
    <a href="{{url('/disease/manage')}}" class="nav-link nav-toggle">
        <i class="icon-calendar"></i>
        <span class="title">จัดการข้อมูลรหัสโรค</span>
    </a>
</li>
