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
                                    @if(Auth::user()->profile_photo_path == NULL)
                                    https://i.postimg.cc/6qbpp0LV/profile-photo.jpg
                                    @else
                                    {{ asset('images/uploads/'.Auth::user()->profile_photo_path) }}
                                    @endif
                                    " alt="User profile picture" width="50" height="100">
                            </div>
                            <h3 class="profile-username text-center">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}
                            </h3>

                            <p class="text-muted text-center">
                                @if (Auth::user()->role == "superadmin")
                                مدير المدرسة
                                @elseif(Auth::user()->role == "enseignant")
                                مدرس
                                @endif
                            </p>

                            <div dir="rlt" class="text-center">
                                <hr>
                                <strong>تاريخ الولادة<i class="fas fa-calendar ml-2"></i></strong>

                                <p class="text-muted">
                                    {{ Auth::user()->date_naissance }}
                                </p>

                                <hr>

                                <strong> مكان الإقامة<i class="fas fa-map-marker-alt ml-2"></i></strong>

                                <p class="text-muted">{{ Auth::user()->adresse }}</p>

                                <hr>

                                <strong> رقم الهاتف<i class="fas fa-phone ml-2"></i></strong>

                                <p class="text-muted">+216 {{ Auth::user()->phone }}</p>

                                <hr>

                                <strong> البريد الإلكتروني<i class="fas fa-envelope ml-2"></i></strong>

                                <p class="text-muted">{{ Auth::user()->email }}</p>

                                <hr>

                                @if(Auth::user()->role == "enseignant")

                                <strong> الأقسام<i class="fas fa-school ml-2"></i></strong>

                                <p class="text-muted">
                                    @foreach ($affEnsclasses as $key => $affectation)
                                    <span class="tag tag-success">{{ $affectation }}</span>
                                    @endforeach
                                </p>

                                <hr>

                                <strong> المواد<i class="fas fa-book-open ml-2"></i></strong>

                                <p class="text-muted">
                                    @php($n = count($affEnsMatieres))
                                    @for ($i = 0; $i < $n; $i++) <span class="tag tag-success">{{ $affEnsMatieres[$i] }}
                                        ({{ $affEnsNiveau[$i] }})</span>
                                        @endfor
                                </p>
                                <hr>
                                @endif
                            </div>
                            <div class="row">
                                <div class="offset-md-3">
                                </div>
                                <div class="col-md-3 p-2 order-md-2">
                                    <a href="#" class="btn btn-primary btn-block" data-toggle="modal"
                                        data-target="#exampleModal"><b>تغيير المعلومات الشّخصيّة
                                        </b></a>
                                </div>
                                <div class="col-md-3 p-2 order-md-1">
                                    <a href="#" class="btn btn-secondary btn-block" data-toggle="modal"
                                        data-target="#exampleModal2"><b>تغيير كلمة العبور
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="exampleModalLabel">تغيير المعلومات الشخصية</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action='{{ route('profil.miseajour', Auth::user()->id) }}' width=60%>
                @csrf
                <div class="modal-body">

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
                    <div class="row" dir="rtl">
                        <div class="form-group col-md-12 text-right">
                            <label for="image"> الصورة <span class="text-danger">*</span></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image"
                                    accept=".jpg, .jpeg, .png">
                                <label class="custom-file-label text-center" for="image">إختر صورة</label>
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex align-items-center" dir="rtl">
                        <div class="form-group col-md-12">
                            <img class="profile-user-img rounded-circle d-flex align-items-center" src="
                                    @if(Auth::user()->profile_photo_path == NULL)
                                    https://i.postimg.cc/6qbpp0LV/profile-photo.jpg
                                    @else
                                    {{ asset('images/uploads/'.Auth::user()->profile_photo_path) }}
                                    @endif
                                    " alt="User profile picture" id="preview" width="50" height="100">
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

<!-- Modal2 -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="exampleModalLabel2">تغيير كلمة العبور</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action='{{ route('profil.password', Auth::user()->id) }}' width=60%>
                    @csrf

                    <div class="row" dir="rtl">
                        <div class="form-group col-md-12 text-right">
                            <label for="oldpassword"> كلمة العبور الحالية <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="oldpassword" name="oldpassword"
                                placeholder="أدخل كلمة العبور الحالية" required>
                        </div>
                    </div>
                    <div class="row" dir="rtl">
                        <div class="form-group col-md-6 text-right">
                            <label for="newpassword"> كلمة العبور الجديدة <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="newpassword" name="newpassword"
                                placeholder="أدخل كلمة العبور الجديدة" required>
                        </div>
                        <div class="form-group col-md-6 text-right">
                            <label for="newpassword2">إعادة كلمة العبور الجديدة <span
                                    class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="newpassword2" name="newpassword2"
                                placeholder="أعد إدخال كلمة العبور الجديدة" required>
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


<script>
    image.onchange = evt => {
        const [file] = image.files
        if (file) {
            preview.src = URL.createObjectURL(file)
        }
    }

</script>
@endsection
