<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/img/LogoNavbar.png" alt="">
          </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="navtxt nav-link fw-bold {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="navtxt nav-link dropdown-toggle fw-bold {{ Request::is('pelatihan*') || Request::is('diklat*')  ? 'active' : '' }}" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Program
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="/pelatihan">Pelatihan</a></li>
              <li><a class="dropdown-item" href="/diklat">Diklat</a></li>
            </ul>
          </li>
          <li class="nav-item nyala">
            <a class="navtxt nav-link fw-bold {{ Request::is('seminar-workshop*') ? 'active' : '' }}" href="/seminar-workshop">Seminar & Workshop</a>
          </li>
          <li class="nav-item dropdown">
            <a class="navtxt nav-link dropdown-toggle fw-bold {{ Request::is('artikel*') || Request::is('ebook*')  ? 'active' : '' }}" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Artikel & E-book
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="/artikel">Artikel</a></li>
              <li><a class="dropdown-item" href="/ebook">E-book</a></li>
            </ul>
          </li>
        </ul>
        @auth
          <ul class="navbar-nav d-inline-block">
            <li class="nav-item dropdown">
              <a class="nametxt nav-link dropdown-toggle fw-bold navbar-brand" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->name }} 
                @if (auth()->user()->photo)
                    <img src="{{ asset('storage/' . auth()->user()->photo) }}" class="rounded-circle" width="35" height="35" style="margin-left: 5px">
                @else
                    <img src="/admins/img/user.png"  width="35" height="35" style="margin-left: 5px">
                @endif
                
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/akun"><i class="fa fa-user"></i> Akun</a></li>
                <li><a class="dropdown-item" href="/akun/pengaturan"><i class="fa fa-gear"></i> Pengaturan</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/signout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Keluar</button>
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        @else
          <div class="d-flex">
            <a href="/signin"><button class="btn btn-login ms-4 shadow-sm" type="submit">Masuk</button></a>
          </div>
        @endauth

      </div>
    </div>
  </nav>