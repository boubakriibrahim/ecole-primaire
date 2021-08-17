@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6 order-sm-2">
                  <h1 class="m-0 float-right">التصرف في التلاميذ </h1>
                </div><!-- /.col -->


            <div class="col-sm-6 order-sm-1">
              <ol class="breadcrumb float-right float-sm-left">
                <li class="breadcrumb-item active order-sm">التصرف في التلاميذ</li>
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
                    <h2 class="col-md-6 offset-md-2  order-md-2 text-right">التلاميذ</h2>
                    <button type="button" class="btn btn-block bg-gradient-primary offset-md-1 col-md-2 order-md-1 mt-sm-2" data-toggle="modal" data-target="#exampleModal">
                        إضافة تلميذ
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header text-center">
                              <h5 class="modal-title w-100" id="exampleModalLabel">إضافة تلميذ</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action='{{ route('eleve.store') }}' width=60%>
                                    @csrf



                                    <div class="form-group text-right float-right">
                                            <input type="text" class="form-control text-right" id="nom" name="nom" placeholder="أدخل الإسم" required>
                                            <label for="nom"><span class="text-danger">*</span> الإسم</label>

                                    </div>

                                    <div class="form-group text-right float-right">
                                            <input type="text" class="form-control text-right" id="prenom" name="prenom" placeholder="أدخل اللقب" required>
                                            <label for="prenom"><span class="text-danger">*</span> اللقب</label>

                                    </div>

                                    <div class="form-group text-right float-right">
                                            <input type="date" class="form-control text-right" id="date_naissance" name="date_naissance" placeholder="JJ_MM_AA " required>
                                            <label for="date_naissance"><span class="text-danger">*</span> تاريخ الولادة</label>

                                     </div>

                                     <div class="form-group text-right float-right">
                                            <input type="text" class="form-control text-right" id="num_insci" name="num_inscri" placeholder="أدخل رمز التسجيل  " required>
                                            <label for="num_inscri"><span class="text-danger">*</span>  رمز التسجيل</label>

                                    </div>



                                    <div class="form-group col-md-6 float-right">
                                        <div class="form-check form-check-inline" >

                                            <input class="form-check-input" type="radio" id="inlineCheckbox1" name="sexe" value="0" required>
                                            <label class="form-check-label" for="inlineCheckbox1">مذكر</label>
                                         </div>
                                        <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="radio" id="inlineCheckbox2" name="sexe" value="1">
                                            <label class="form-check-label" for="inlineCheckbox2">مؤنث</label>
                                        </div>
                                      <label for="sexe">الجنس <span class="text-danger">*</span></label>

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
              <table id="example1" class="table table-bordered table-striped text-right p-3">
                <thead>
                <tr>
                  <th width="25%">العملية</th>

                  <th>رمز التسجيل </th>
                  <th> الجنس </th>
                  <th>تاريخ الولادة</th>
                  <th>اللقب</th>
                  <th>الاسم</th>
                  <th width="5%">العدد</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($allData as $key => $eleve)
                <tr>
                  <td>
                      <div class="row">
                        <a href="{{ route("eleve.delete", $eleve->id) }}" class="btn btn-danger offset-sm-3 mr-sm-1 col-sm-4 order-3 order-sm-1" id="delete">حذف</a>

                        <button type="button" class="btn btn-info  col-sm-4 order-2" data-toggle="modal" data-target="#model{{$eleve->id}}">
                            تحديث
                          </button>
                        </div>
                  </td>
                  <td>{{ $eleve->num_inscri }}</td>
                  <td>@if($eleve->sexe==1)
                  مؤنث
                      @else
                      مذكر
                      @endif
                    </td>
                  <td>{{ $eleve->date_naissance }}</td>
                  <td>{{ $eleve->prenom }}</td>
                  <td>{{ $eleve->nom }}</td>
                  <td>{{ $key+1 }}</td>
                </tr>
                @endforeach
                </tfoot>
              </table>



              @foreach ($allData as $key => $eleve)

              <!-- Modal -->
              <div class="modal fade" id="model{{$eleve->id}}" tabindex="1" aria-labelledby="exampleModal{{$eleve->id}}" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header text-center">
                      <h5 class="modal-title w-100" id="exampleModalLabel">تحديث التلميذ  </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action='{{ route('eleve.miseajour',$eleve->id) }}' width=60%>
                            @csrf

                            <div class="form-group text-right float-right">
                                            <input type="text" class="form-control text-right" id="nom" name="nom"  value="{{ $eleve->nom }}" placeholder="أدخل الإسم" required>
                                            <label for="nom"><span class="text-danger">*</span> الإسم</label>

                                    </div>

                                    <div class="form-group text-right float-right">
                                            <input type="text" class="form-control text-right" id="prenom" name="prenom" placeholder="أدخل اللقب" value="{{ $eleve->prenom }}" required>
                                            <label for="prenom"><span class="text-danger">*</span> اللقب</label>

                                    </div>

                                    <div class="form-group text-right float-right">
                                            <input type="date" class="form-control text-right" id="date_naissance" name="date_naissance" value="{{ $eleve->date_naissance }}" placeholder="JJ_MM_AA " required>
                                            <label for="date_naissance"><span class="text-danger">*</span> تاريخ الولادة</label>

                                     </div>

                                     <div class="form-group text-right float-right">
                                            <input type="text" class="form-control text-right" value="{{ $eleve->num_inscri }}" id="num_insci" name="num_inscri" placeholder="أدخل رمز التسجيل  " required>
                                            <label for="num_inscri"><span class="text-danger">*</span>  رمز التسجيل</label>

                                    </div>



                                    <div class="form-group col-md-6 float-right">
                                        <div class="form-check form-check-inline" >

                                            <input class="form-check-input" type="radio" id="inlineCheckbox1" name="sexe" value="0" required checked>
                                            <label class="form-check-label" for="inlineCheckbox1">مذكر</label>
                                         </div>
                                        <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="radio" id="inlineCheckbox2" name="sexe" value="1" @if ( $eleve->sexe == 1) checked @endif>
                                            <label class="form-check-label" for="inlineCheckbox2">مؤنث</label>
                                        </div>
                                      <label for="sexe">الجنس <span class="text-danger">*</span></label>

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
