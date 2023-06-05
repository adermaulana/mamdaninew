<nav class="navbar navbar-expand-lg bg-light fixed-top d-flex align-items-center">
  <div class="container">
    <a class="navbar-brand " href="/">SMKN 8 JENEPONTO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/tes">Tes</a>
        </li>
        <li class="nav-item me-2">
          <a class="nav-link" href="#">Kontak</a>
        </li>
      </ul>
      @auth('peserta')
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome Back, {{ auth('peserta')->user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/profil">Profil</a></li>
            <li><a class="dropdown-item" href="#">Hasil</a></li>
            <li>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item">
                  Logout
                </button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
      @elseif(Auth::check())
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome Back, {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/">Home</a></li>
            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
            <li>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item">
                  Logout
                </button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
      @else
        @if(Request::is('login'))
        <li class="nav-item navbar-nav  mb-2 mb-lg-0">
            <a class="btn btn-primary active" aria-current="page" href="/register"><i class="bi bi-box-arrow-in-right"></i>Register</a>
          </li>
        @else
        <li class="nav-item navbar-nav  mb-2 mb-lg-0">
            <a class="btn btn-primary active" aria-current="page" href="/login"><i class="bi bi-box-arrow-in-right"></i>Login</a>
          </li>
        @endif
      @endauth
  </div>
</nav>