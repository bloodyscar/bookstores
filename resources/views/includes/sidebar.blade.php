<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Bookstore Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item{{ (request()->is('admin')) ? ' active' : '' }}"> 
        <a class="nav-link" href="{{ route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    
    <li class="nav-item{{ (request()->is('admin/book')) ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('book')}}">
            <i class="fas fa-fw fa-book"></i>
            <span>Book</span></a>
    </li>

    <li class="nav-item{{ (request()->is('admin/member')) ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('member') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Members</span></a>
    </li>

    <li class="nav-item{{ (request()->is('admin/transaction')) ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('transaction') }}">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Transaction</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

</ul>
<!-- End of Sidebar -->