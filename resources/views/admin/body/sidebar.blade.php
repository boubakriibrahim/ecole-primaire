<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">مدرستي </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Ati </a>
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
              جدول الوظائف
              </p>
            </a>
          </li>
          {{-- espace utilisateurs --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
              التصرف في الأطر
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('Ens.view') }}" class="nav-link">
                    <i class="fas fa-user-secret nav-icon"></i>
                  <p>التصرف في المعلمين</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-user-tie nav-icon"></i>
                  <p>تعيين المدرّسين</p>
                </a>
              </li>
              
            </ul>
          </li>
          {{-- espace documents --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-archive"></i>
              <p>
              فضاء الأدوات
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-file-alt nav-icon"></i>
                  <p>صندوق الأدوات</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-user-check nav-icon"></i>
                  <p>الغيابات</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- espaces classes --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fas fa-school nav-icon"></i>
              <p>
              التصرّف في الأقسام 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-user-friends nav-icon"></i>
                  <p>الأقسام</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-book-open nav-icon"></i>
                  <p>التّصرّف في المواد </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-calendar-alt nav-icon"></i>
                  <p>التّصرّف في جدول الأوقات</p>
                </a>
              </li>
              
            </ul>
          </li>
          {{-- espaces notes --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fas fa-pen nav-icon"></i>
              <p>
              فضاء الأعداد
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
