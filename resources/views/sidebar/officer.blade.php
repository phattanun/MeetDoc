<li class="nav-item @yield('registerNav')">
    <a href="{{url('patient/come')}}" class="nav-link nav-toggle">
        <i class="fa fa-user-plus"></i>
        <span class="title">ลงทะเบียนผู้ป่วยเข้าตรวจ</span>
    </a>
</li>
<li class="nav-item  @yield('insteadAppNav')">
    <a href="{{url('/officer/appointment/new')}}" class="nav-link nav-toggle">
        <i class="icon-plus"></i>
        <span class="title">นัดหมายแทนผู้ป่วย</span>
    </a>
</li>
<li class="nav-item  @yield('insteadEditNav')">
    <a href="{{url('/officer/appointment/edit')}}" class="nav-link nav-toggle">
        <i class="fa fa-pencil-square-o"></i>
        <span class="title">แก้ไขการนัดหมายแทนผู้ป่วย</span>
    </a>
</li>
<li class="nav-item  @yield('insteadDoctorEditNav')">
    <a href="{{url('/officer/appointment/doctor/edit')}}" class="nav-link nav-toggle">
        <i class="fa fa-pencil-square-o"></i>
        <i class="fa fa-user-md"></i>
        <span class="title">แก้ไขตารางออกตรวจแพทย์</span>
    </a>
</li>
