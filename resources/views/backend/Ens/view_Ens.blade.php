@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 order-sm-2">
                    <h1 class="m-0 float-right">التصرف في المدرسين</h1>
                </div><!-- /.col -->


                <div class="col-sm-6 order-sm-1">
                    <ol class="breadcrumb float-right float-sm-left">
                        <li class="breadcrumb-item active order-sm">التصرف في المدرسين</li>
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
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <h2 class="col-md-6 offset-md-2  order-md-2 text-right">المدرسين</h2>
                                <button type="button"
                                    class="btn btn-block bg-gradient-primary offset-md-1 col-md-2 order-md-1 mt-sm-2"
                                    data-toggle="modal" data-target="#exampleModal">
                                    إضافة مدرس
                                </button>



                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="p-3">
                            <table id="example1" class="table table-bordered table-striped text-right p-3">
                                <thead>
                                    <tr>
                                        <th width="25%">العملية</th>
                                        <th>البريد الإلكتروني</th>
                                        <th>رقم الهاتف</th>
                                        <th>مكان الإقامة</th>
                                        <th>تاريخ الولادة</th>
                                        <th>الجنس</th>
                                        <th>اللقب</th>
                                        <th>الاسم</th>
                                        <th>الصورة</th>
                                        <th width="5%">العدد</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allData as $key => $ens)
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <a href="{{ route('Ens.delete', $ens->id) }}"
                                                    class="btn btn-danger offset-sm-3 mr-sm-1 col-sm-4 order-3 order-sm-1"
                                                    id="delete">حذف</a>

                                                <button type="button" class="btn btn-info  col-sm-4 order-2"
                                                    data-toggle="modal" data-target="#modelChange{{ $ens->id }}">
                                                    تحديث
                                                </button>
                                            </div>
                                        </td>
                                        <td>{{ $ens->login }}</td>
                                        <td>{{ $ens->phone }}</td>
                                        <td>{{ $ens->adresse }}</td>
                                        <td>{{ $ens->date_naissance }}</td>
                                        <td>{{ $ens->sexe }}</td>
                                        <td>{{ $ens->prenom }}</td>
                                        <td>{{ $ens->nom }}</td>
                                        <td><img src="
                                            @if($ens->profile_photo_path == NULL)
                                            https://i.postimg.cc/6qbpp0LV/profile-photo.jpg
                                            @else
                                            {{ $ens->profile_photo_path }}
                                            @endif
                                            " alt="صورة المدرس" width="50" height="50"></td>
                                        <td>{{ $key+1 }}</td>
                                    </tr>
                                    @endforeach
                                    </tfoot>
                            </table>



                            @foreach ($allData as $key => $ens)

                            <!-- Modal -->
                            <div class="modal fade" id="modelChange{{ $ens->id }}" tabindex="1"
                                aria-labelledby="exampleModalChange" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title w-100" id="exampleModalLabel{{ $ens->id }}">تحديث
                                                المدرس</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action='{{ route('Ens.miseajour',$ens->id) }}'
                                                width=60%>
                                                @csrf

                                                <div class="row" dir="rtl">
                                                    <div class="form-group col-md-6 text-right">
                                                        <label for="nom"> الإسم<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="nom" name="nom"
                                                            placeholder="أدخل الإسم" value="{{ $ens->nom }}" required>
                                                    </div>
                                                    <div class="form-group col-md-6 text-right">
                                                        <label for="prenom"> اللقب <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="prenom"
                                                            name="prenom" placeholder="أدخل اللقب"
                                                            value="{{ $ens->prenom }}" required>
                                                    </div>
                                                </div>
                                                <div class="row" dir="rtl">
                                                    <div class="form-group col-md-6 text-right">
                                                        <label for="date_naissance"> تاريخ الولادة<span
                                                                class="text-danger">*</span></label>
                                                        <input type="date" class="form-control" id="date_naissance"
                                                            name="date_naissance" placeholder="أدخل تاريخ الولادة"
                                                            value="{{ $ens->date_naissance }}" required>
                                                    </div>
                                                    <div class="form-group col-md-6 text-right">
                                                        <label for="adresse"> مكان الإقامة <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="adresse"
                                                            name="adresse" placeholder="أدخل مكان الإقامة"
                                                            value="{{ $ens->adresse }}" required>
                                                    </div>
                                                </div>
                                                <div class="row" dir="rtl">
                                                    <div class="form-group col-md-6 text-right">
                                                        <label for="login">المعرف <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control text-left" id="login"
                                                            name="login" placeholder=" أدخل المعرف"
                                                            value="{{ $ens->login }}" required>
                                                    </div>
                                                    <div class="form-group col-md-6 text-right">
                                                        <label for="phone"> رقم الهاتف<span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" id="phone" name="phone"
                                                            placeholder="أدخل رقم الهاتف" value="{{ $ens->phone }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="form-group text-right" dir="rtl">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="sexe">الجنس <span
                                                                    class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-2">
                                                            <div class="custom-control custom-radio">
                                                                <input class="custom-control-input order-2" type="radio"
                                                                    id="inlineCheckbox1" name="sexe" value="مذكر" @if(
                                                                    $ens->sexe ==
                                                                'مذكر') checked @endif>
                                                                <label class="custom-control-label order-1"
                                                                    for="inlineCheckbox1">مذكر</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <div class="custom-control custom-radio">
                                                                <input class="custom-control-input" type="radio"
                                                                    id="inlineCheckbox2" name="sexe" value="مؤنث" @if(
                                                                    $ens->sexe ==
                                                                'مؤنث') checked @endif>
                                                                <label class="custom-control-label"
                                                                    for="inlineCheckbox2">مؤنث</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-secondary"
                                                data-dismiss="modal">إلغاء</button>
                                            <button type="submit" class="btn btn-primary">تأكيد</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            @endforeach



                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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
                <form method="post" action='{{ route('Ens.store') }}' width=60%>
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
                            <label for="date_naissance"> تاريخ الولادة<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="date_naissance" name="date_naissance"
                                placeholder="أدخل تاريخ الولادة" required>
                        </div>
                        <div class="form-group col-md-6 text-right">
                            <label for="adresse"> مكان الإقامة <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="adresse" name="adresse"
                                placeholder="أدخل مكان الإقامة" required>
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
                        <div class="form-group col-md-6 text-right">
                            <label for="phone"> رقم الهاتف<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="phone" name="phone"
                                placeholder="أدخل رقم الهاتف" required>
                        </div>
                        <div class="form-group col-md-6 text-right mt-4">

                            <div class="row mt-2">
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
