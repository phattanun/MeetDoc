<li class="nav-item @yield('registerNav')">
    <a href="{{url('patient/come')}}" class="nav-link nav-toggle">
        <i class="icon-plus"></i>
        <span class="title">ลงทะเบียนผู้ป่วยเข้าตรวจ</span>
    </a>
</li>
<li class="nav-item  @yield('insteadAppNav')">
    <a href="{{url('/officer/appointment/new')}}" class="nav-link nav-toggle">
        <i class="icon-clock"></i>
        <span class="title">นัดหมายแทนผู้ป่วย</span>
    </a>
</li>
<li class="nav-item @yield('doctorTableInsteadNav')">
    <a href="{{url('')}}" class="nav-link nav-toggle">
        <i class="icon-calendar"></i>
        <span class="title">ตารางออกตรวจของแพทย์</span>
    </a>
</li>
