{{-- <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <div class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Client </div>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard-client')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard </span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>


    <!-- Divider -->
    <hr class="sidebar-divider">



    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('logout')}}">
            <span>Deconnexion</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul> --}}


<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a class="nav-link" href="{{ route('dashboard-client') }}">
                <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard Client</span>
                </a>
            </li>
             <div class="copyright">
            <a class="nav-link" href="{{ route('logout') }}" aria-expanded="false">
                <i class="flaticon-381-turn-off"></i>
                Deconnexion
            </a>
        </div>
        </ul>

    </div>
</div>
