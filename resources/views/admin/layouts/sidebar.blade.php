<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('images/logo2.png') }}" alt="PFNL.com" class="brand-image img-circle elevation-1" style="opacity: .8">
        <span class="brand-text font-weight-light">PFNL.com</span>
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          @auth
          <div class="image">
              <img src="{{ asset('images/users/avatar-h.webp') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
              <a href="#" class="d-block">
                  {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
              </a>
          </div>
          @endauth
        </div>
  
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
  
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Tableau de bord
                        </p>
                    </a>
                </li>
  
                <!-- Produits -->
                <li class="nav-item">
                    {{-- <a href="{{ route('admin.products.index') }}" class="nav-link"> --}}
                        {{-- <i class="nav-icon fas fa-box"></i> --}}
                        <p>
                            
                            {{-- <i class="fas fa-angle-left right"></i> --}}
                            {{-- <span class="badge badge-info right">{{ $stats['products'] ?? 0 }}</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            {{-- <a href="{{ route('admin.products.create') }}" class="nav-link"> --}}
                                {{-- <i class="far fa-circle nav-icon"></i> --}}
                                <p></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- <a href="{{ route('admin.products.index') }}" class="nav-link"> --}}
                                {{-- <i class="far fa-circle nav-icon"></i> --}}
                                <p></p>
                            </a>
                        </li>
                    </ul>
                </li>
  
                <li class="nav-item">
                    {{-- <a href="{{ route('admin.users.index') }}" class="nav-link"> --}}
                        {{-- <i class="nav-icon fas fa-users"></i> --}}
                        <p>
                        
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  