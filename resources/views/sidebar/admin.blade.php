<li class="nav-item  @yield('officerNav')">
    <a href="{{url('/officer/manage')}}" class="nav-link nav-toggle">
        <i class="fa fa-user-md"></i>
        <span class="title">จัดการแผนกและสิทธิ์บุคลากร</span>
    </a>
</li>
<li class="nav-item  @yield('accountNav')">
    <a href="{{url('/account/manage')}}" class="nav-link nav-toggle">
        <i class="icon-users"></i>
        <span class="title">จัดการบัญชีผู้ใช้</span>
    </a>
</li>
<li class="nav-item @yield('diseaseNav')">
    <a href="{{url('/disease/manage')}}" class="nav-link nav-toggle">
        <i class="fa fa-stethoscope"></i>
        <span class="title">จัดการข้อมูลรหัสโรค</span>
    </a>
</li>
<li class="nav-item @yield('departmentNav')">
    <a href="{{url('/department/manage')}}" class="nav-link nav-toggle">
        <i class="fa fa-sitemap"></i>
        <span class="title">จัดการข้อมูลแผนก</span>
    </a>
</li>
