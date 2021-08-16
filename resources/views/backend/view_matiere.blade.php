@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 order-sm-2">
                    <h1 class="m-0 float-right">التصرف في المواد</h1>
                </div><!-- /.col -->


                <div class="col-sm-6 order-sm-1">
                    <ol class="breadcrumb float-right float-sm-left">
                        <li class="breadcrumb-item active order-sm">التصرف في المواد</li>
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
                                <h2 class="col-md-6 offset-md-2  order-md-2 text-right">المواد</h2>
                                {{-- <a href="{{ route('matiere.add') }}" class="btn btn-block bg-gradient-primary
                                offset-md-1 col-md-2 order-md-1 mt-sm-2">إضافة مادة</a> --}}
                                <button type="button"
                                    class="btn btn-block bg-gradient-primary offset-md-1 col-md-2 order-md-1 mt-sm-2"
                                    data-toggle="modal" data-target="#exampleModal">
                                    إضافة مادة
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">إضافة مادة</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action='{{ route('matiere.store') }}' width=60%>
                                                    @csrf

                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label for="niveau"> المستوى<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="number" class="form-control" id="niveau"
                                                                name="niveau" placeholder="أدخل المستوى" min="1" max="6"
                                                                required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="libelle"> الإسم<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="libelle"
                                                                name="libelle" placeholder="أدخل الإسم" required>
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
                            <table id="example1" class="table table-bordered table-striped p-3">
                                <thead>
                                    <tr>
                                        <th width="5%">العدد</th>
                                        <th>المستوى</th>
                                        <th>الاسم</th>
                                        <th width="25%">العملية</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allData as $key => $matiere)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $matiere->niveau }}</td>
                                        <td>{{ $matiere->libelle }}</td>
                                        <td>
                                            {{-- <a href="" class="btn btn-info">تعديل</a> --}}

                                            <button type="button" class="btn btn-info" data-toggle="modal"
                                                data-target="#model{{$matiere->id}}">
                                                تحديث
                                            </button>



                                            <a href="{{ route("matiere.delete", $matiere->id) }}" class="btn btn-danger"
                                                id="delete">حذف</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tfoot>
                            </table>



                            @foreach ($allData as $key => $matiere)

                            <!-- Modal -->
                            <div class="modal fade" id="model{{$matiere->id}}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="examplemodel{{$matiere->id}}">تحديث المادة</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action='{{ route('matiere.miseajour',$matiere->id) }}'
                                                width=60%>
                                                @csrf

                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="niveau"> المستوى<span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" id="niveau"
                                                            name="niveau" placeholder="أدخل المستوى" min="1" max="6"
                                                            required value="{{ $matiere->niveau }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="libelle"> الإسم<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="libelle"
                                                            name="libelle" placeholder="أدخل الإسم"
                                                            value="{{ $matiere->libelle }}" required>
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
