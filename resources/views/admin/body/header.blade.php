<nav class="main-header navbar navbar-expand-lg navbar-dark" dir="rtl">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand mr-2">
            <img src="{{asset('images/uploads/'.$ecoleCreds->ecole_photo_path)}}" alt="Logo"
                class="brand-image img-circle elevation-3 ml-2" style="opacity: .8" width="35">
            <span class="brand-text font-weight-light">
                <b>{{ $ecoleCreds->nom }}</b>
            </span>
        </a>

        <button class="navbar-toggler order-1 mx-auto" type="button" data-toggle="collapse"
            data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3 mx-auto" id="navbarCollapse">
            <!-- Left navbar links -->
            @if (Auth::user()->role == "superadmin")
            <ul class="navbar-nav">
                <li class="nav-item dropdown text-right">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle"><i class="fas fa-toolbox ml-1"></i> صندوق
                        الأدوات </a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow"
                        style="left: 0px; right: inherit;">
                        <li><a href="{{ route('home') }}" class="dropdown-item text-right">
                                <i class="nav-icon fas fa-chart-pie pl-2"></i>
                                الإحصائيات
                            </a></li>
                        <li><a href="{{ route('paper.view') }}" class="dropdown-item text-right">
                                <i class="fas fa-folder-open pl-2"></i>
                                الوثائق الإدارية
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown text-right">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle"><i class="fas fa-hourglass-end ml-2"></i>جداول الأوقات </a>
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
                        class="nav-link dropdown-toggle"><i class="fas fa-user-check ml-2"></i>التّصرّف في الأشخاص
                    </a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow"
                        style="left: 0px; right: inherit;">
                        <li><a href="{{ route('Ens.view') }}" class="dropdown-item text-right">
                                <i class="nav-icon fas fa-user-tie pl-2"></i>
                                عرض قائمة المدرّسين
                            </a></li>
                        <li><a href="{{ route('eleve.view') }}" class="dropdown-item text-right">
                                <i class="nav-icon fas fa-user-graduate pl-2"></i>
                                عرض قائمة التلاميذ
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
            @endif
            @if (Auth::user()->role == "enseignant")
            <ul class="navbar-nav">
                <li class="nav-item text-right">
                    <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-chart-pie ml-1"></i> إحصائيّات</a>
                </li>

                <li class="nav-item text-right">
                    <a href="{{ route('mon.emploi') }}" class="nav-link"><i class="fas fa-hourglass-end ml-1"></i> جدول
                        أوقاتي</a>
                </li>

                <li class="nav-item text-right">
                    <a href="{{ route('eleve.view') }}" class="nav-link"><i class="fas fa-book-open ml-1"></i> التصرف في
                        التلاميذ</a>
                </li>


                <li class="nav-item text-right">
                    <a href="{{ route('classes.view') }}" class="nav-link"><i
                            class="fas fa-chalkboard-teacher ml-1"></i> التصرّف في الأقسام</a>
                </li>

            </ul>
            @endif
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand d-flex align-items-center ml-1" dir="ltr">

            <li class="nav-item">
                <button style="border: none;
                        background: none;
                        cursor: pointer;
                        margin: 0;
                        padding: 0;" id="dark-mode-toggle">
                    <i class="far fa-moon" style="color: white;"></i>
                </button>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="
                    @if(Auth::user()->profile_photo_path == NULL)
                    https://i.postimg.cc/6qbpp0LV/profile-photo.jpg
                    @else
                    {{ asset('images/uploads/'.Auth::user()->profile_photo_path) }}
                    @endif
                    " width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-lg" style="left: inherit; right: 0px;"
                    aria-labelledby="navbarDropdownMenuLink">
                    <span class="dropdown-header">
                        <div class="row">
                            <div class="col-8">
                                <h5>{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</h5>
                                @if (Auth::user()->role == "superadmin")
                                مدير المدرسة
                                @elseif(Auth::user()->role == "enseignant")
                                مدرس
                                @endif
                            </div>
                            <div class="col-4">
                                <img src="
                                @if(Auth::user()->profile_photo_path == NULL)
                                https://i.postimg.cc/6qbpp0LV/profile-photo.jpg
                                @else
                                {{ asset('images/uploads/'.Auth::user()->profile_photo_path) }}
                                @endif
                        " alt="" class="rounded-circle" width="50" height="50">
                            </div>
                        </div>
                    </span>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-right" href="{{route('profil')}}">
                        المعلومات الشّخصيّة
                        <i class="fas fa-user pl-2"></i>
                    </a>
                    @if (Auth::user()->role == "superadmin")
                    <a class="dropdown-item text-right" href="{{ route('ecole') }}">
                        معلومات المدرسة
                        <i class="fas fa-school pl-2"></i>
                    </a>
                    @endif
                    <a class="dropdown-item text-right" href="{{ route('admin.logout') }}">
                        تسجيل الخروج
                        <i class="fas fa-sign-out-alt pl-2"></i>
                    </a>
                </div>
            </li>

        </ul>
    </div>
</nav>
