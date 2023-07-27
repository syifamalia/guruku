<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        {{-- <div class="sidebar-brand-icon">
            <img src="/img/LogoNavbar.png" alt="">
        </div> --}}
        <div class="sidebar-brand-text mx-3">Guruku</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Utama
    </div>

    <!-- Nav Item - Program Collapse Menu -->
    <li class="nav-item {{ Request::is('dashboard/training*') || Request::is('dashboard/module*') || Request::is('dashboard/diklat*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Program</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pilihan Program:</h6>
                <a class="collapse-item" href="/dashboard/training">Pelatihan</a>
                <a class="collapse-item" href="/dashboard/diklat">Diklat</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Seminar & Workshop Collapse Menu -->
    <li class="nav-item {{ Request::is('dashboard/seminar-workshop*') || Request::is('dashboard/seminar-workshop-kategori*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/seminar-workshop">
            <i class="fas fa-bullhorn"></i>
            <span>Seminar & Workshop</span></a>
    </li>

    <!-- Nav Item - Article & E-book Collapse Menu -->
    <li class="nav-item {{ Request::is('dashboard/article*') || Request::is('dashboard/article-category*') || Request::is('dashboard/ebook*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-book-open"></i>
            <span>Artikel & E-book</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Artikel/E-book:</h6>
                <a class="collapse-item" href="/dashboard/article">Artikel</a>
                <a class="collapse-item" href="/dashboard/ebook">E-book</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>


    <!-- Nav Item - Review -->
    <li class="nav-item {{ Request::is('dashboard/review*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/review">
            <i class="fas fa-grin-stars"></i>
            <span>Review</span></a>
    </li>

    <!-- Nav Item - Kontak -->
    <li class="nav-item {{ Request::is('dashboard/kontak*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/kontak">
            <i class="fas fa-address-card"></i>
            <span>Kontak</span></a>
    </li>
    <!-- Nav Item - User -->
    <li class="nav-item {{ Request::is('dashboard/user*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/user">
            <i class="fas fa-users"></i>
            <span>User</span></a>
    </li>

    <!-- Nav Item - Admin -->
    <li class="nav-item {{ Request::is('dashboard/admin*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/admin">
            <i class="fas fa-user-cog"></i>
            <span>Admin</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->