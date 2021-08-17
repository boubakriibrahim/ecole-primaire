@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">
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

                                <button type="button"
                                    class="btn btn-block bg-gradient-primary offset-md-1 col-md-2 order-md-1 mt-sm-2"
                                    data-toggle="modal" data-target="#exampleModal">
                                    إضافة قسم
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title w-100" id="exampleModalLabel">إضافة قسم</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action='{{ route('classe.store') }}' width=60%>
                                                    @csrf

                                                    <div class="row" dir="rtl">
                                                        <div class="form-group col-md-6 text-right">
                                                            <label for="niveau"> المستوى <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="number" class="form-control" id="niveau"
                                                                name="niveau" placeholder="أدخل المستوى" min="1" max="6"
                                                                required>
                                                        </div>
                                                        <div class="form-group col-md-6 text-right">
                                                            <label for="nom"> الإسم <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="nom" name="nom"
                                                                placeholder="أدخل الإسم" required>
                                                        </div>
                                                    </div>
                                                    <div class="row" dir="rtl">
                                                        <div class="form-group col-md-6 text-right">
                                                            <label for="nb">عدد التلاميذ <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="number" class="form-control" id="nb" name="nb"
                                                                placeholder=" أدخل عدد التلاميذ" min="10" max="40"
                                                                required>
                                                        </div>
                                                        <div class="form-group col-md-6 text-right">
                                                            <label for="anneescolaire">السنة الدراسية <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="anneescolaire"
                                                                name="anneescolaire" placeholder="أدخل السنة الدراسية"
                                                                required>
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

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="p-3">
                            <table id="example1" class="table table-bordered table-striped text-right p-3">
                                <thead>
                                    <tr>
                                        <th width="25%">العملية</th>
                                        <th>السنة الدراسية</th>
                                        <th>عدد التلاميذ</th>
                                        <th>المستوى</th>
                                        <th>الاسم</th>
                                        <th width="5%">العدد</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allData as $key => $classe)
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <a href="{{ route("classe.delete", $classe->id) }}"
                                                    class="btn btn-danger offset-sm-3 mr-sm-1 col-sm-4 order-3 order-sm-1"
                                                    id="delete">حذف</a>
                                                <button type="button" class="btn btn-info col-sm-4 order-2"
                                                    data-toggle="modal" data-target="#model{{$classe->id}}">
                                                    تحديث
                                                </button>

                                            </div>
                                        </td>
                                        <td>{{ $classe->anneescolaire }}</td>
                                        <td>{{ $classe->nb }}</td>
                                        <td>{{ $classe->niveau }}</td>
                                        <td>{{ $classe->nom }}</td>
                                        <td>{{ $key+1 }}</td>
                                    </tr>
                                    @endforeach
                                    </tfoot>
                            </table>



                            @foreach ($allData as $key => $classe)

                            <!-- Modal -->
                            <div class="modal fade" id="model{{$classe->id}}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title w-100" id="examplemodel{{$classe->id}}">تحديث القسم
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action='{{ route('classe.miseajour',$classe->id) }}'
                                                width=60%>
                                                @csrf

                                                <div class="row" dir="rtl">
                                                    <div class="form-group col-md-6 text-right">
                                                        <label for="niveau"> المستوى <span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" id="niveau"
                                                            name="niveau" placeholder="أدخل المستوى" min="1" max="6"
                                                            value="{{ $classe->niveau }}" required>
                                                    </div>
                                                    <div class="form-group col-md-6 text-right">
                                                        <label for="nom"> الإسم <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="nom" name="nom"
                                                            value="{{ $classe->nom }}" placeholder="أدخل الإسم"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="row" dir="rtl">
                                                    <div class="form-group col-md-6 text-right">
                                                        <label for="nb">عدد التلاميذ <span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" id="nb" name="nb"
                                                            placeholder=" أدخل عدد التلاميذ" min="10" max="40"
                                                            value="{{ $classe->nb }}" required>
                                                    </div>
                                                    <div class="form-group col-md-6 text-right">
                                                        <label for="anneescolaire">السنة الدراسية <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="anneescolaire"
                                                            name="anneescolaire" placeholder="أدخل السنة الدراسية"
                                                            value="{{ $classe->anneescolaire }}" required>
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

@endsection
