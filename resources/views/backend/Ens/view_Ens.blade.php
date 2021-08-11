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
                <li class="breadcrumb-item"><a href="#">الصفحة الرئيسية</a></li>
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
                    {{-- <a href="{{ route('Ens.add') }}" class="btn btn-block bg-gradient-primary offset-md-1 col-md-2 order-md-1 mt-sm-2">إضافة مدرس</a> --}}
                    <button type="button" class="btn btn-block bg-gradient-primary offset-md-1 col-md-2 order-md-1 mt-sm-2" data-toggle="modal" data-target="#exampleModal">
                        إضافة مدرس
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">إضافة مدرس</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action='{{ route('Ens.store') }}' width=60%>
                                    @csrf

                                        <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="nom"> الإسم<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="nom" name="nom" placeholder="أدخل الإسم" required>
                                          </div>
                                          <div class="form-group col-md-6">
                                            <label for="prenom"> اللقب<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="أدخل اللقب" required>
                                          </div>
                                        </div>
                                      <div class="row">
                                        <div class="form-group col-md-6">
                                          <label for="login">المعرف  <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" id="login" name="login" placeholder=" أدخل المعرف" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="password">كلمة السر <span class="text-danger">*</span></label>
                                          <input type="password" class="form-control" id="password" name="password" placeholder="أدخل كلمة السر" required>
                                        </div>
                                      </div>
                                      <div class="row">
                                      <div class="form-group col-md-6">
                                      <label for="sexe">الجنس <span class="text-danger">*</span></label>
                                      <div class="form-check form-check-inline" >

                                  <input class="form-check-input" type="radio" id="inlineCheckbox1" name="sexe" value="مذكر" required>
                                  <label class="form-check-label" for="inlineCheckbox1">مذكر</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" id="inlineCheckbox2" name="sexe" value="مؤنث">
                                  <label class="form-check-label" for="inlineCheckbox2">مؤنث</label>
                                </div>
                                </div>
                                        <div class="form-group col-md-6">
                                          <label for="exampleInputFile">الصورة</label>
                                          <div class="input-group">
                                            <div class="custom-file">
                                              <input type="file" class="custom-file-input" id="image">
                                              <label class="custom-file-label" for="exampleInputFile">إختيار صورة</label>
                                            </div>
                                            <div class="input-group-append">
                                              <span class="input-group-text">تنزيل صورة</span>
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

                </div>
        </div>
            <!-- /.card-header -->
            <div class="p-3">
              <table id="example1" class="table table-bordered table-striped p-3">
                <thead>
                <tr>
                  <th width="5%">العدد</th>
                  <th>الاسم</th>
                  <th>اللقب</th>
                  <th>الجنس</th>
                  <th width="25%">العملية</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($allData as $key => $user)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $user->nom }}</td>
                  <td>{{ $user->prenom }}</td>
                  <td>{{ $user->sexe }}</td>
                  <td>
                        {{-- <a href="" class="btn btn-info">تعديل</a> --}}

                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#model{{$user->id}}">
                            تحديث
                          </button>



                        <a href="" class="btn btn-danger">حذف</a>
                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>



              @foreach ($allData as $key => $user)

              <!-- Modal -->
              <div class="modal fade" id="model{{$user->id}}" tabindex="-1"  aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="examplemodel{{$user->id}}">تحديث المدرس</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action='{{ route('Ens.miseajour',$user->id) }}' width=60%>
                            @csrf

                                <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="nom"> الإسم<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $user->nom }}" placeholder="أدخل الإسم" required>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="prenom"> اللقب<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $user->prenom }}" placeholder="أدخل اللقب" required>
                                  </div>
                                </div>
                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="login">المعرف  <span class="text-danger">*</span></label>
                                  <input type="text" class="form-control" id="login" name="login" value="{{ $user->login }}" placeholder=" أدخل المعرف" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sexe">الجنس <span class="text-danger">*</span></label>
                                    <div class="form-check form-check-inline" >

                                <input class="form-check-input" type="radio" id="inlineCheckbox1" name="sexe" value="مذكر" required @if ( $user->sexe == 'مذكر') checked @endif>
                                <label class="form-check-label" for="inlineCheckbox1">مذكر</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="inlineCheckbox2" name="sexe" value="مؤنث"
                                @if ( $user->sexe == 'مؤنث')
                                 checked
                                 @endif
                                 >
                                <label class="form-check-label" for="inlineCheckbox2">مؤنث</label>
                              </div>
                              </div>
                              </div>
                              <div class="row">

                                <div class="form-group col-md-6">
                                  <label for="exampleInputFile">الصورة</label>
                                  <div class="input-group">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="image">
                                      <label class="custom-file-label" for="exampleInputFile">إختيار صورة</label>
                                    </div>
                                    <div class="input-group-append">
                                      <span class="input-group-text">تنزيل صورة</span>
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

@endsection
