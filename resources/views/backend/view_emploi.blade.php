@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6 order-sm-2">
                  <h1 class="m-0 float-right">التصرف في جداول الأوقات</h1>
                </div><!-- /.col -->


            <div class="col-sm-6 order-sm-1">
              <ol class="breadcrumb float-right float-sm-left">
                <li class="breadcrumb-item active order-sm">التصرف في جداول الأوقات</li>
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
                    <h2 class="col-md-4 order-md-3 text-center">جداول الأوقات</h2>

                    <div class="form-group offset-md-1 col-md-4 order-md-2 justify-content-center">
                        <form method="post" action="{{ route("emploi.select") }}">
                        @csrf
                        <div class="row">
                        <select class="custom-select offset-md-1 col-md-7 order-md-2 mt-2" id="selectemploi" name="selectemploi">
                            <option value="classes" class="text-center" selected>جداول الأقسام</option>
                            <option value="enseignats" class="text-center" >جداول المدرسين</option>
                          </select>
                          <input type="submit" class="btn btn-success col-md-4 order-md-1 mt-2 " value="تغيير">
                        </div>
                        </form>
                    </div>

                    <a href="{{ route('emploi.add') }}" class="btn btn-block bg-gradient-primary offset-md-1 col-md-2 order-md-1 mt-sm-2">
                        إضافة جدول أوقات
                      </a>

                </div>
        </div>
            <!-- /.card-header -->
            <div class="p-3">
              <table id="example1" class="table table-bordered table-striped text-right p-3">
                <thead>
                <tr>
                  <th width="25%">العملية</th>
                  <th>السنة الدراسية</th>
                  @if ($type == "classes")
                  <th>القسم</th>
                  @else
                  <th>المدرس</th>
                  @endif
                  <th width="5%">العدد</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($emplois as $key => $emploi)
                <tr>
                  <td>
                      <div class="row">
                        <a href="{{ route("emploi.delete", $emploi->id) }}" class="btn btn-danger offset-sm-3 mr-sm-1 col-sm-4 order-3 order-sm-1" id="delete">حذف</a>

                        <button type="button" class="btn btn-info  col-sm-4 order-2" data-toggle="modal" data-target="#model{{$emploi->id}}">
                            تحديث
                          </button>
                        </div>
                  </td>
                  <td>{{ $emploi->anneescolaire }}</td>
                  @if ($type == "classes")
                  <td>{{ $emploi->classe->nom }}</td>
                  @else
                  <td>{{ $emploi->enseignant->nom }}</td>
                  @endif
                  <td>{{ $key+1 }}</td>
                </tr>
                @endforeach
                </tfoot>
              </table>



              @foreach ($emplois as $key => $emploi)

              <!-- Modal -->
              <div class="modal fade" id="model{{$emploi->id}}" tabindex="1" aria-labelledby="exampleModal{{$emploi->id}}" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header text-center">
                      <h5 class="modal-title w-100" id="exampleModalLabel">تحديث الجدول أوقات</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action='{{ route('emploi.miseajour',$emploi->id) }}' width=60%>
                            @csrf


                                  <div class="form-group text-right">
                                    <label for="libelle text-right"><span class="text-danger">*</span> الإسم</label>
                                    <input type="text" class="form-control text-right" id="libelle" name="libelle" placeholder="أدخل الإسم" value="{{ $emploi->libelle }}" required>
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
