<li class="nav-item @yield('profileNav')">
    <a href="{{url('/profile')}}" class="nav-link nav-toggle">
        <i class="icon-user"></i>
        <span class="title">ขัอมูลส่วนตัว</span>
    </a>
</li>
<li class="nav-item @yield('newAppNav')">
    <a href="{{url('/appointment/new')}}" class="nav-link nav-toggle">
        <i class="icon-plus"></i>
        <span class="title">สร้างนัดหมายใหม่</span>
    </a>
</li>
<li class="nav-item @yield('futureAppNav')">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="icon-calendar"></i>
        <span class="title">การนัดหมายในอนาคต</span>
    </a>
</li>
<li class="nav-item  @yield('pastAppNav')">
    <a href="{{url('/appointment/history')}}" class="nav-link nav-toggle">
        <i class="icon-clock"></i>
        <span class="title">ประวัติการนัดหมายในอดีต</span>
    </a>
</li>