@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper dark-mode">
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6 order-sm-2">
                  <h1 class="m-0 float-right">التصرف في الأقسام</h1>
                </div><!-- /.col -->


            <div class="col-sm-6 order-sm-1">
              <ol class="breadcrumb float-right float-sm-left">
                <li class="breadcrumb-item active order-sm">التصرف في الأقسام</li>
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
                    <h2 class="col-md-6 offset-md-2  order-md-2 text-right">الأقسام</h2>
                    {{-- <a href="{{ route('classe.add') }}" class="btn btn-block bg-gradient-primary offset-md-1 col-md-2 order-md-1 mt-sm-2">إضافة قسم</a> --}}
                    <button type="button" class="btn btn-block bg-gradient-primary offset-md-1 col-md-2 order-md-1 mt-sm-2" data-toggle="modal" data-target="#exampleModal">
                        إضافة قسم
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">إضافة قسم</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action='{{ route('classe.store') }}' width=60%>
                                    @csrf

                                        <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="niveau"> المستوى<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="niveau" name="niveau" placeholder="أدخل المستوى" min="1" max="6" required>
                                          </div>
                                          <div class="form-group col-md-6">
                                            <label for="nom"> الإسم<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="nom" name="nom" placeholder="أدخل الإسم" required>
                                          </div>
                                        </div>
                                      <div class="row">
                                        <div class="form-group col-md-6">
                                          <label for="nb">عدد التلاميذ  <span class="text-danger">*</span></label>
                                          <input type="number" class="form-control" id="nb" name="nb" placeholder=" أدخل عدد التلاميذ" min="10" max="40" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="anneescolaire">السنة الدراسية<span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" id="anneescolaire" name="anneescolaire" placeholder="أدخل السنة الدراسية" required>
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
                  <th>المستوى</th>
                  <th>الاسم</th>
                  <th>عدد التلاميذ</th>
                  <th>السنة الدراسية</th>
                  <th width="25%">العملية</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($allData as $key => $classe)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $classe->niveau }}</td>
                  <td>{{ $classe->nom }}</td>
                  <td>{{ $classe->nb }}</td>
                  <td>{{ $classe->anneescolaire }}</td>
                  <td>
                        {{-- <a href="" class="btn btn-info">تعديل</a> --}}

                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#model{{$classe->id}}">
                            تحديث
                          </button>



                        <a href="{{ route("classe.delete", $classe->id) }}" class="btn btn-danger" id="delete">حذف</a>
                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>



              @foreach ($allData as $key => $classe)

              <!-- Modal -->
              <div class="modal fade" id="model{{$classe->id}}" tabindex="-1"  aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="examplemodel{{$classe->id}}">تحديث القسم</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action='{{ route('classe.miseajour',$classe->id) }}' width=60%>
                            @csrf

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="niveau"> المستوى<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="niveau" name="niveau" placeholder="أدخل المستوى" min="1" max="6" required value="{{ $classe->niveau }}">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="nom"> الإسم<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="أدخل الإسم" value="{{ $classe->nom }}" required>
                                  </div>
                                </div>
                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="nb">عدد التلاميذ  <span class="text-danger">*</span></label>
                                  <input type="number" class="form-control" id="nb" name="nb" placeholder=" أدخل عدد التلاميذ" min="10" max="40" value="{{ $classe->nb }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="anneescolaire">السنة الدراسية<span class="text-danger">*</span></label>
                                  <input type="text" class="form-control" id="anneescolaire" name="anneescolaire" placeholder="أدخل السنة الدراسية" value="{{ $classe->anneescolaire }}" required>
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
