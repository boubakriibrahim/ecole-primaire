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
                                    {{ asset('images/uploads/'.$ecole->ecole_photo_path) }}
                                    @endif
                                    " alt="ecole picture" width="50" height="100">
                            </div>

                            <h3 class="profile-username text-center">{{ $ecole->nom }}
                            </h3>

                            <p class="text-muted text-center">
                                {{ $ecole->genre }}
                            </p>

                            <div dir="rlt" class="text-center">
                                <hr>

                                <strong>الموقع<i class="fas fa-map-marker-alt ml-2"></i></strong>

                                <p class="text-muted">{{ $ecole->adresse }}</p>

                                <hr>

                                <strong> رقم الهاتف<i class="fas fa-phone ml-2"></i></strong>

                                <p class="text-muted">+216 {{ $ecole->phone }}</p>

                                <hr>

                                <strong> البريد الإلكتروني<i class="fas fa-envelope ml-2"></i></strong>

                                <p class="text-muted">{{ $ecole->email }}</p>

                                <hr>

                                <strong>الوصف الأول<i class="fas fa-calendar ml-2"></i></strong>

                                <p class="text-muted">
                                    {{ $ecole->description1 }}
                                </p>

                                <hr>

                                <strong>الوصف الثاني<i class="fas fa-calendar ml-2"></i></strong>

                                <p class="text-muted">
                                    {{ $ecole->description2 }}
                                </p>

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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="exampleModalLabel">تغيير المعلومات الشخصية</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action='{{ route('ecole.miseajour') }}' enctype="multipart/form-data" width=60%>
                    @csrf
                    @method('PUT')

                    <div class="row" dir="rtl">
                        <div class="form-group col-md-6 text-right">
                            <label for="nom"> الإسم<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="أدخل الإسم"
                                value="{{ $ecole->nom }}" required>
                        </div>
                        <div class="form-group col-md-6 text-right">
                            <label for="genre"> النوع <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="genre" name="genre" placeholder="أدخل النوع"
                                value="{{ $ecole->genre }}" required>
                        </div>
                    </div>
                    <div class="row" dir="rtl">
                        <div class="form-group col-md-6 text-right">
                            <label for="email">البريد الإلكتروني <span class="text-danger">*</span></label>
                            <input type="text" class="form-control text-left" id="email" name="email"
                                placeholder=" أدخل البريد الإلكتروني" value="{{ $ecole->email }}" required>
                        </div>
                        <div class="form-group col-md-6 text-right">
                            <label for="phone"> رقم الهاتف<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="phone" name="phone"
                                placeholder="أدخل رقم الهاتف" value="{{ $ecole->phone }}" required>
                        </div>
                    </div>

                    <div class="row" dir="rtl">
                        <div class="form-group col-md-6 text-right">
                            <label for="description1"> الوصف الأول</label>
                            <textarea class="form-control" rows="3" id="description1" name="description1"
                                placeholder="أدخل الوصف الأول"
                                style="margin-top: 0px; margin-bottom: 0px; height: 87px;">{{ $ecole->description1 }}</textarea>
                        </div>
                        <div class="form-group col-md-6 text-right">
                            <label for="description2"> الوصف الثاني</label>
                            <textarea class="form-control" rows="3" id="description2" name="description2"
                                placeholder="أدخل الوصف الثاني"
                                style="margin-top: 0px; margin-bottom: 0px; height: 87px;">{{ $ecole->description2 }}</textarea>
                        </div>
                    </div>

                    <div class="row" dir="rtl">
                        <div class="form-group col-md-6 text-right">
                            <label for="adresse"> الموقع <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="adresse" name="adresse"
                                placeholder="أدخل الموقع" value="{{ $ecole->adresse }}" required>
                        </div>
                        <div class="form-group col-md-6 text-right">
                            <label for="image"> الصورة <span class="text-danger">*</span></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" accept=".jpg, .jpeg, .png">
                                <label class="custom-file-label text-left" for="image">إختر صورة</label>
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex align-items-center" dir="rtl">
                        <div class="form-group col-md-12">
                            <img class="profile-user-img rounded-circle d-flex align-items-center" src="
                                    @if($ecole->ecole_photo_path == NULL)
                                    {{ asset('images/logo.jpg') }}
                                    @else
                                    {{ asset('images/uploads/'.$ecole->ecole_photo_path) }}
                                    @endif
                                    " alt="User profile picture" width="50" height="100">
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
