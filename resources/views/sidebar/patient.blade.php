<li class="nav-item @yield('newAppNav')">
    <a href="{{url('/appointment/new')}}" class="nav-link nav-toggle">
        <i class="icon-plus"></i>
        <span class="title">สร้างนัดหมายใหม่</span>
    </a>
</li>
<li class="nav-item @yield('futureAppNav')">
    <a href="{{url('/appointment/future')}}" class="nav-link nav-toggle">
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