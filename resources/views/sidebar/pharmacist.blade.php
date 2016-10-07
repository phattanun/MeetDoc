<li class="nav-item  @yield('queueNav')">
    <a href="{{url('/queue')}}" class="nav-link nav-toggle">
        <i class="icon-users"></i>
        <span class="title">จัดการคิว</span>
    </a>
</li>
<li class="nav-item  @yield('drugNav')">
    <a href="{{url('/drug/manage')}}" class="nav-link nav-toggle">
        <i class="fa fa-pill"></i>
        <span class="title">จัดการข้อมูลยา</span>
    </a>
</li>
