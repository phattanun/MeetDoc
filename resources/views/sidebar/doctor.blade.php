<li class="nav-item  @yield('doctorAppointmentNav')">
    <a href="{{url('/doctor/appointment')}}" class="nav-link nav-toggle">
        <i class="icon-calendar"></i>
        <span class="title">การนัดตรวจของตนเอง</span>
    </a>
</li>
<li class="nav-item  @yield('doctorScheduleNav')">
    <a href="{{url('/doctor/schedule')}}" class="nav-link nav-toggle">
        <i class="fa fa-calendar"></i>
        <span class="title">ตารางออกตรวจของตนเอง</span>
    </a>
</li>
