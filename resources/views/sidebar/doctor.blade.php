<li class="nav-item  @yield('queueNav')">
    <a href="{{url('/queue')}}" class="nav-link nav-toggle">
        <i class="icon-users"></i>
        <span class="title">จัดการคิว</span>
    </a>
</li>
<li class="nav-item  @yield('doctorAppointmentNav')">
    <a href="{{url('/doctor/appointment')}}" class="nav-link nav-toggle">
        <i class="icon-calendar"></i>
        <span class="title">การนัดหมายของแพทย์</span>
    </a>
</li>
<li class="nav-item  @yield('doctorScheduleNav')">
    <a href="{{url('/doctor/schedule')}}" class="nav-link nav-toggle">
        <i class="fa fa-calendar"></i>
        <span class="title">ตารางออกตรวจของตนเอง</span>
    </a>
</li>
