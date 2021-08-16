<nav class="main-header navbar navbar-expand-lg navbar-dark" dir="rtl">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand mr-2">
            <img src="{{asset('images/logo.jpg')}}" alt="Logo" class="brand-image img-circle elevation-3 ml-2"
                style="opacity: .8" width="35">
            <span class="brand-text font-weight-light">
                <b>المدرسة</b>&nbsp;الإبتدائية
            </span>
        </a>

        <button class="navbar-toggler order-1 mx-auto" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3 mx-auto" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item text-right">
                    <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-toolbox ml-1"></i> صندوق
                        الأدوات</a>
                </li>
                <li class="nav-item dropdown text-right">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle"><i class="fas fa-hourglass-end ml-2"></i></i>جداول الأوقات </a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow"
                        style="left: 0px; right: inherit;">
                        <li><a href="{{ route('emploi.view.enseignants') }}" class="dropdown-item text-right">
                                <i class="nav-icon fas fa-users pl-2"></i>
                                جداول أوقات المدرسين
                            </a></li>
                        <li><a href="{{ route('emploi.view.classes') }}" class="dropdown-item text-right">
                                <i class="fas fa-school pl-2"></i>
                                جداول أوقات الأقسام
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown text-right">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle"><i class="fas fa-user-check ml-2"></i>التّصرّف في المدرّسين
                    </a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow"
                        style="left: 0px; right: inherit;">
                        <li><a href="{{ route('Ens.view') }}" class="dropdown-item text-right">
                                <i class="nav-icon fas fa-users pl-2"></i>
                                عرض قائمة المدرّسين
                            </a></li>
                        <li><a href="{{route('affEns.view')}}" class="dropdown-item text-right">
                                <i class="fas fa-pen pl-2"></i>
                                تعيين المدرّسين

                            </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown text-right">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle"><i class="fas fa-wrench ml-2"></i>التصرّف </a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow"
                        style="left: 0px; right: inherit;">
                        <li><a href="{{ route('classe.view') }}" class="dropdown-item text-right">
                                <i class="fas fa-chalkboard-teacher pl-2"></i>
                                التصرّف في الأقسام
                            </a></li>
                        <li><a href="{{ route('matiere.view') }}" class="dropdown-item text-right">
                                <i class="fas fa-book-open pl-2"></i>
                                التّصرّف في المواد
                            </a></li>

                        <li><a href="{{ route('salle.view') }}" class="dropdown-item text-right">
                                <i class="fas fa-school pl-2"></i>
                                التّصرّف في القاعات
                            </a></li>
                        <li><a href="{{ route('seance.view') }}" class="dropdown-item text-right">
                                <i class="fas fa-calendar-check mr-1 pl-2"></i>
                                التصرّف في الحصص
                            </a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand d-flex align-items-center ml-1" dir="ltr">

            <li class="nav-item">
                <button onclick="$('body').toggleClass('dark-mode');" style="border: none;
                        background: none;
                        cursor: pointer;
                        margin: 0;
                        padding: 0;">
                    <i class="far fa-moon" style="color: white;"></i>
                </button>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">20</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg" style="left: inherit; right: 0px;">
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
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://i.postimg.cc/vZHKNSFx/pdp.jpg" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-lg" style="left: inherit; right: 0px;"
                    aria-labelledby="navbarDropdownMenuLink">
                    <span class="dropdown-header">

                        إبراهيم بوبكري
                        <img src="https://i.postimg.cc/vZHKNSFx/pdp.jpg" alt="" class="rounded-circle ml-2" width="40"
                            height="40">
                    </span>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-right" href="{{route('profil')}}">
                        المعلومات الشّخصيّة
                        <i class="fas fa-user pl-2"></i>
                    </a>
                    <a class="dropdown-item text-right" href="#">
                        معلومات المدرسة
                        <i class="fas fa-school pl-2"></i>
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
