<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/contact" class="nav-link">Contact</a>
        </li>
    </ul>
  
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
                <span class="badge badge-warning navbar-badge">1</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">
                    @auth
                        {{ Auth::user()->name }} {{ Auth::user()->prenom }}
                    @endauth
                    @guest
                        <a href="{{ route('auth.login') }}" class="dropdown-item">Se connecter</a>
                    @endguest
                </span>
  
                @auth
                    <div class="dropdown-divider"></div>
                    {{-- <a href="{{ route('profile') }}" class="dropdown-item"> --}}
                        <i class="fas fa-user mr-2"></i> Profil
                    </a>
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('auth.logout') }}" method="POST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="dropdown-item" type="submit">
                            <i class="fas fa-sign-out mr-2"></i> Se déconnecter
                        </button>
                    </form>
                @endauth
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
  </nav>
  