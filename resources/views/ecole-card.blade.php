@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 order-sm-2">
                    <h1 class="m-0 float-right">معلومات المدرسة</h1>
                </div><!-- /.col -->


                <div class="col-sm-6 order-sm-1">
                    <ol class="breadcrumb float-right float-sm-left">
                        <li class="breadcrumb-item active order-sm">معلومات المدرسة</li>
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">الصفحة الرئيسية</a></li>
                    </ol>
                </div><!-- /.col -->



            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img rounded-circle" src="
                                    @if($ecole->ecole_photo_path == NULL)
                                    {{ asset('images/logo.jpg') }}
                                    @else
                                    {{ $ecole->profile_photo_path }}
                                    @endif
                                    " alt="User profile picture" width="50" height="100">
                            </div>

                            <h3 class="profile-username text-center">{{ $ecole->nom }}
                            </h3>

                            <p class="text-muted text-center">
                                {{ $ecole->genre }}
                            </p>

                            <div dir="rlt" class="text-center">
                                <hr>
                                <strong>تاريخ الولادة<i class="fas fa-calendar ml-2"></i></strong>

                                <p class="text-muted">

                                </p>

                                <hr>

                                <strong>الموقع<i class="fas fa-map-marker-alt ml-2"></i></strong>

                                <p class="text-muted">{{ $ecole->adresse }}</p>

                                <hr>

                                <strong> رقم الهاتف<i class="fas fa-phone ml-2"></i></strong>

                                <p class="text-muted">+216 {{ $ecole->phone }}</p>

                                <hr>

                                <strong> البريد الإلكتروني<i class="fas fa-envelope ml-2"></i></strong>

                                <p class="text-muted">{{-- {{ $ecole->email }} --}}</p>

                                <hr>


                            </div>

                            <div class="row">
                                <div class="offset-md-4">

                                </div>
                                <div class="col-md-4 p-2">
                                    <a href="#" class="btn btn-primary btn-block" data-toggle="modal"
                                        data-target="#exampleModal"><b>تغيير معلومات المدرسة
                                        </b></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Modal -->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="exampleModalLabel">تغيير المعلومات الشخصية</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action='{{ route('profil.miseajour', Auth::user()->id) }}' width=60%>
                    @csrf

                    <div class="row" dir="rtl">
                        <div class="form-group col-md-6 text-right">
                            <label for="nom"> الإسم<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="أدخل الإسم"
                                value="{{ Auth::user()->nom }}" required>
                        </div>
                        <div class="form-group col-md-6 text-right">
                            <label for="prenom"> اللقب <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="أدخل اللقب"
                                value="{{ Auth::user()->prenom }}" required>
                        </div>
                    </div>
                    <div class="row" dir="rtl">
                        <div class="form-group col-md-6 text-right">
                            <label for="date_naissance"> تاريخ الولادة <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="date_naissance" name="date_naissance"
                                placeholder="أدخل تاريخ الولادة" value="{{ Auth::user()->date_naissance }}" required>
                        </div>
                        <div class="form-group col-md-6 text-right">
                            <label for="adresse"> مكان الإقامة <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="adresse" name="adresse"
                                placeholder="أدخل مكان الإقامة" value="{{ Auth::user()->adresse }}" required>
                        </div>
                    </div>
                    <div class="row" dir="rtl">
                        <div class="form-group col-md-6 text-right">
                            <label for="login">البريد الإلكتروني <span class="text-danger">*</span></label>
                            <input type="text" class="form-control text-left" id="login" name="login"
                                placeholder=" أدخل البريد الإلكتروني" value="{{ Auth::user()->email }}" required>
                        </div>
                        <div class="form-group col-md-6 text-right">
                            <label for="phone"> رقم الهاتف<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="phone" name="phone"
                                placeholder="أدخل رقم الهاتف" value="{{ Auth::user()->phone }}" required>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                <button type="submit" class="btn btn-primary">تأكيد</button>
            </div>
            </form>
        </div>
    </div>


</div> --}}


@endsection
