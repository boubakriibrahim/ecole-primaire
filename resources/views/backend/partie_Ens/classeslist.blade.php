@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 order-sm-2">
                    <h1 class="m-0 float-right">التصرف في الأقسام </h1>
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
                                <h2 class="col-12 text-center">اقسامي</h2>

                            </div>
                            <!-- Modal -->

                            <!-- /.card-header -->
                            <div class="p-3">
                                <table id="example1" class="table table-bordered table-striped text-right p-3">
                                    <thead>
                                        <tr>
                                            <th width="25%">العملية</th>
                                            <th>السنة الدراسية </th>
                                            <th>عدد التلاميذ </th>
                                            <th>المستوى </th>
                                            <th>الاسم</th>
                                            <th width="5%">العدد</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $classe)
                                        <tr>
                                            <td class="col-md-3">
                                                <div class="row" dir="rtl">
                                                    
                                                <a href="{{ route("list.check", $classe->id) }}"
                                                        class="btn btn-success rounded-pill offset-sm-3 mr-sm-1 col-sm-4">اضافة قائمة</a>
                                                
                                                        <a href="{{ route("abscence.view", $classe->id) }}"
                                                        class="btn btn-primary rounded-pill col-md-4 ">تسجيل حضور  </a>
                                                        <a href="{{ route("note.check", $classe->id) }}"
                                                        class="btn btn-primary rounded-pill col-md-4 ">note   </a>

                                                
                                                </div>
                                            </td>
                                            <td>{{ $classe->anneescolaire }}</td>
                                            <td>{{ $classe->nb }}</td>
                                            <td>{{ $classe->niveau }}</td>
                                            <td>{{ $classe->nom }}</td>
                                            <td>{{ $key+1 }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
