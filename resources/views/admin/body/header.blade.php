<nav class="main-header navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a href="{{ url('/') }}" class="navbar-brand mr-2">
        <img src="{{asset('images/logo.jpg')}}" alt="Logo" class="brand-image img-circle elevation-3 mr-2" style="opacity: .8" width="35">
        <span class="brand-text font-weight-light">
            <b>المدرسة</b>&nbsp;الإبتدائية
        </span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item text-right">
            <a href="{{ route('home') }}" class="nav-link"> صندوق الأدوات</a>
          </li>
          <li class="nav-item dropdown text-right">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">التصرّف</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow" style="left: 0px; right: inherit;">
              <li><a href="{{ route('Ens.view') }}" class="dropdown-item text-right">
                  التصرّف في المدرسين
                  <i class="nav-icon fas fa-users pl-2"></i>
                </a></li>
              <li><a href="{{ route('classe.view') }}" class="dropdown-item text-right">
                  التصرّف في الأقسام
                  <i class="fas fa-school pl-2"></i>
                </a></li>
                <li><a href="{{ route('matiere.view') }}" class="dropdown-item text-right">
                    التّصرّف في المواد
                    <i class="fas fa-book-open pl-2"></i>
                  </a></li>
              <li><a href="#" class="dropdown-item text-right">
                  التّصرّف في جدول الأوقات
                  <i class="fas fa-user-check pl-2"></i>
                </a></li>
              <li class="dropdown-divider"></li>
              <li><a href="{{route('affEns.view')}}" class="dropdown-item text-right">
                  تعيين المدرّسين
                  <i class="fas fa-pen pl-2"></i>
                </a></li>
            </ul>
          </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="بحث" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">20</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
            <span class="dropdown-header">إشعارات (50)</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> (4) رسائل جديدة
              <span class="float-right text-muted text-sm">3 دقائق</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> (3) تقارير جديدة
              <span class="float-right text-muted text-sm">2 أيام</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">اطلع على جميع الإشعارات</a>
          </div>
        </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="https://i.postimg.cc/vZHKNSFx/pdp.jpg" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;" aria-labelledby="navbarDropdownMenuLink">
                  <span class="dropdown-header">

                      إبراهيم بوبكري
                      <img src="https://i.postimg.cc/vZHKNSFx/pdp.jpg" alt="" class="rounded-circle ml-2" width="40" height="40">
                    </span>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-right" href="{{route('profil')}}">
                      المعلومات الشّخصيّة
                      <i class="fas fa-user pl-2"></i>
                    </a>
                  <a class="dropdown-item text-right" href="{{ route('admin.logout') }}">
                    تسجيل الخروج
                    <i class="fas fa-sign-out-alt pl-2"></i>
                </a>
                </div>
              </li>

      </ul>
    </div>
  </nav>
