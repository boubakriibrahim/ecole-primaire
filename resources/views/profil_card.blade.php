@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 order-sm-2">
                    <h1 class="m-0 float-right">المعلومات الشّخصيّة</h1>
                </div><!-- /.col -->


                <div class="col-sm-6 order-sm-1">
                    <ol class="breadcrumb float-right float-sm-left">
                        <li class="breadcrumb-item active order-sm">المعلومات الشّخصيّة</li>
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
                                    @if(Auth::user()->profile_photo_lien == NULL)
                                    https://i.postimg.cc/6qbpp0LV/profile-photo.jpg
                                    @else
                                    {{ Auth::user()->profile_photo_lien }}
                                    @endif
                                    " alt="User profile picture"
                                    width="50" height="100">
                            </div>

                            <h3 class="profile-username text-center">{{ $user->name }}</h3>

                            <p class="text-muted text-center">
                                @if (Auth::user()->role == "superadmin")
                                مدير المدرسة
                                @elseif(Auth::user()->role == "enseignant")
                                مدرس
                                @endif
                            </p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Followers</b> <a class="float-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Following</b> <a class="float-right">543</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Friends</b> <a class="float-right">13,287</a>
                                </li>
                            </ul>

                            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
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
<div class="modal fade" id="exampleModal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="exampleModalLabel">إضافة مدرس</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action='#' width=60%>
                    @csrf

                    <div class="row" dir="rtl">
                        <div class="form-group col-md-6 text-right">
                            <label for="nom"> الإسم<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="أدخل الإسم"
                                required>
                        </div>
                        <div class="form-group col-md-6 text-right">
                            <label for="prenom"> اللقب <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="أدخل اللقب"
                                required>
                        </div>
                    </div>
                    <div class="row" dir="rtl">
                        <div class="form-group col-md-6 text-right">
                            <label for="login">المعرف <span class="text-danger">*</span></label>
                            <input type="text" class="form-control text-left" id="login" name="login"
                                placeholder=" أدخل المعرف" required>
                        </div>
                        <div class="form-group col-md-6 text-right">
                            <label for="password">كلمة السر <span class="text-danger">*</span></label>
                            <input type="password" class="form-control text-left" id="password" name="password"
                                placeholder="أدخل كلمة السر" required>
                        </div>
                    </div>
                    <div class="row" dir="rtl">
                        <div class="form-group text-right">

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="sexe">الجنس <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-4">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input order-2" type="radio" id="inlineCheckbox1"
                                            name="sexe" value="مذكر" checked="checked">
                                        <label class="custom-control-label order-1" for="inlineCheckbox1">مذكر</label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="inlineCheckbox2"
                                            name="sexe" value="مؤنث">
                                        <label class="custom-control-label" for="inlineCheckbox2">مؤنث</label>
                                    </div>
                                </div>
                            </div>
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


</div>

@endsection
