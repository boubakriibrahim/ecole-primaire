<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Ecole Primaire</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Ibrahim Boubakri</a>
        </div>
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
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Tableau de Bord
              </p>
            </a>
          </li>
          {{-- espace utilisateurs --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Espace Utilisateurs
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.view') }}" class="nav-link">
                    <i class="fas fa-user-secret nav-icon"></i>
                  <p>Admins</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-user-tie nav-icon"></i>
                  <p>Maitres</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-user-graduate nav-icon"></i>
                  <p>Eleves</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- espace documents --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-archive"></i>
              <p>
                Espace Documents
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-file-alt nav-icon"></i>
                  <p>Docs Administratives</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-user-check nav-icon"></i>
                  <p>Absence</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- espaces classes --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fas fa-school nav-icon"></i>
              <p>
                Espace Classes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-user-friends nav-icon"></i>
                  <p>Les Groupes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-book-open nav-icon"></i>
                  <p>Les Matières</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-calendar-alt nav-icon"></i>
                  <p>Les Emplois</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fab fa-discourse nav-icon"></i>
                  <p>Les Discussions</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- espaces notes --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fas fa-pen nav-icon"></i>
              <p>
                Espace Notes
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
