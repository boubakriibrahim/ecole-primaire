<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="mapbox://styles/mahmoudghorbel1/cksbq97os67k717p4pegruc71" />
    <link href="mapbox://styles/mahmoudghorbel1/cksbq97os67k717p4pegruc71" rel="stylesheet" /> --}}
    <style>
        body::before {
            display: block;
            content: '';
            height: 60px;
        }

        #map {
            width: 100%;
            height: 100%;
            border-radius: 10px;
        }

        @media (min-width: 768px) {
            .news-input {
                width: 50%;
            }
        }

    </style>
    <title>المدرسة الإبتدائية | الصفحة الرئيسية</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand navbar-no-expand float-right order-2">

                <span class="brand-text font-weight-light m-2">
                    <b>{{ $ecoleCreds->nom }}</b>
                </span>
                <img src="{{asset('images/uploads/'.$ecoleCreds->ecole_photo_path)}}" alt="Logo"
                    class="brand-image rounded-circle elevation-3" style="opacity: .8" width="35">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse float-left order-3 order-lg-1 text-end" id="navmenu">
                <ul class="navbar-nav">


                    <li class="nav-item">
                        <a href="#contact" class="nav-link">الإتصال</a>
                    </li>
                    <li class="nav-item">
                        <a href="#instructors" class="nav-link"> فريق العمل</a>
                    </li>
                    <li class="nav-item">
                        <a href="#learn" class="nav-link">المزيد</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Showcase -->
    <section class="bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">

                <img class="img-fluid d-none d-sm-block w-50" src="{{ asset('images/ecole.svg') }}" alt="" />

                <div class="text-end">
                    <h1>المدرسة الإبتدائية <span class="text-warning">{{ $ecoleCreds->nom }}</span></h1>
                    <p class="lead my-4">
                        {{ $ecoleCreds->description1 }}
                    </p>
                    <a href="{{ route('login') }}" class="btn btn-lg btn-success">تسجيل الدخول</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Learn Sections -->
    <section id="learn" class="p-5">
        <div class="container">
            <div class="row text-center mb-3">
                <h2>قراءة المزيد من العلومات</h2>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 d-none d-md-block">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        src="{{ asset('images/uploads/'.$ecoleCreds->ecole_photo_path) }}" width="300" height="300">
                </div>
                <div class="col-md-6 p-3">
                    <p class="text-end" style="font-size: 30px;">
                        {{ $ecoleCreds->description2 }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="instructors" class="p-5 bg-primary">
        <div class="container">
            <div class="row mb-3">
                <h2 class="text-center text-white">فريق العمل</h2>
            </div>
            <div class="row">
                <div class="col-md-4 my-2">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <img src="{{ asset('images/ati.png') }}" alt="ati"
                                class="bd-placeholder-img rounded-circle mb-4" width="140" height="140">

                            <h3 class="card-title mb-3">عماد الدين عاتي</h3>
                            <p class="card-text">
                                مهندس علوم الإعلامية

                            </p>

                            <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                            <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>

                        </div>
                    </div>
                </div>

                <div class="col-md-4 my-2">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <img src="{{ asset('images/ibrahim.jpg') }}" alt="ibrahim"
                                class="bd-placeholder-img rounded-circle mb-4" width="140" height="140">
                            <h3 class="card-title mb-3"> إبراهيم بوبكري</h3>
                            <p class="card-text">
                                مهندس علوم الإعلامية

                            </p>
                            <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                            <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                        </div>
                    </div>
                </div>

                <div class=" col-md-4 my-2">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <img src="{{ asset('images/mahmoud.jpg') }}" alt="mahmoud"
                                class="bd-placeholder-img rounded-circle mb-4" width="140" height="140">
                            <h3 class="card-title mb-3">محمود الهادي غربال</h3>
                            <p class="card-text">
                                مهندس علوم الإعلامية

                            </p>

                            <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                            <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Contact & Map -->
    <section id="contact" class="p-5" dir="rtl">
        <div class="container">
            <div class="row g-4 text-center">
               {{--  <div class="col-md-6"> --}}
                    <h2 class="text-center mb-4">الإتصال</h2>
                    <ul class="list-group list-group-flush lead">
                        <li class="list-group-item">
                            <span class="fw-bold">الموقع :</span>
                            {{ $ecoleCreds->adresse }}
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">الهاتف :</span>
                            {{ $ecoleCreds->phone }} 216+
                        </li>

                        <li class="list-group-item">
                            <span class="fw-bold">البريد الإلكتروني :</span>
                            {{ $ecoleCreds->email }}
                        </li>

                    </ul>
                {{-- </div> --}}
                {{-- <div class="col-md-6">
                    <div id="map"></div>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="p-5 bg-dark text-white text-center position-relative">
        <div class="container">
            <p class="lead">حقوق النشر &copy; 2021 | المدرسة الوطنية لعلوم الإعلامية</p>

            <a href="#" class="position-absolute bottom-0 end-0 p-5">
                <i class="bi bi-arrow-up-circle h1"></i>
            </a>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script
        src="https://api.mapbox.com/styles/v1/mahmoudghorbel1/cksbq97os67k717p4pegruc71.html?fresh=true&title=copy&access_token=pk.eyJ1IjoibWFobW91ZGdob3JiZWwxIiwiYSI6ImNrc2Jwamx6YzA5MDgydW9kbGQ0MnVmdnoifQ.34JYxGpmxVOSCpEqasXY4Q"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    {{-- <script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js"></script>

    <script>
        mapboxgl.accessToken =
            'pk.eyJ1IjoibWFobW91ZGdob3JiZWwxIiwiYSI6ImNrc2Jwamx6YzA5MDgydW9kbGQ0MnVmdnoifQ.34JYxGpmxVOSCpEqasXY4Q'
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mahmoudghorbel1/cksbq97os67k717p4pegruc71',
            center: [10.761498, 34.800580],
            zoom: 14,
        })

    </script> --}}
</body>

</html>
