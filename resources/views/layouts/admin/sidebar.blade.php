<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            {{-- <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="index-1.htm">
                            <span class="pcoded-mtext">Default</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="dashboard-crm.htm">
                            <span class="pcoded-mtext">CRM</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="dashboard-analytics.htm">
                            <span class="pcoded-mtext">Analytics</span>
                            <span class="pcoded-badge label label-info ">NEW</span>
                        </a>
                    </li>
                </ul>
            </li> --}}
            <li class="@if(Request::is('admin/city')) active @endif">
                <a href="{{ route('city') }}">
                    <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                    <span class="pcoded-mtext">City</span>
                </a>
            </li>
             <li class="@if(Request::is('admin/airline')) active @endif">
                <a href="{{ route('airline')}}">
                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                    <span class="pcoded-mtext">Airline</span>
                </a>
            </li>
            <li class="@if(Request::is('admin/tickets')) active @endif">
                <a href="{{ url('admin/tickets') }}">
                    <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                    <span class="pcoded-mtext">Tickets</span>
                </a>
            </li>
             <li>
                <a href="{{ url('admin/orders') }}">
                    <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                    <span class="pcoded-mtext">Orders</span>
                </a>
            </li>
             <li class="@if(Request::is('admin/users')) active @endif">
                <a href="{{ url('admin/users') }}">
                    <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                    <span class="pcoded-mtext">User Profile</span>
                </a>
            </li>
             {{-- <li>
                <a href="{{ url('admin/logout') }}">
                    <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                    <span class="pcoded-mtext">Logout</span>
                </a>
            </li> --}}
        </ul>
    </div>
</nav>
