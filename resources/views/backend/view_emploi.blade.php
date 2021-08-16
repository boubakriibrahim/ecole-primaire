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
                                <h2 class="col-md-4 order-md-3 text-center">
                                    @if (str_contains(url()->current(), 'enseignants') )
                                    جداول أوقات المدرسين
                                    @else
                                    جداول أوقات الأقسام
                                    @endif
                                </h2>

                                <div class="form-group offset-md-1 col-md-4 order-md-2 justify-content-center">
                                    <form method="post" action="{{ route("emploi.select") }}">
                                        @csrf
                                        <div class="row">
                                            <select class="custom-select offset-md-1 col-md-7 order-md-2 mt-2"
                                                id="selectemploi" name="selectemploi">
                                                <option value="classes" class="text-center" selected>جداول الأقسام
                                                </option>
                                                <option value="enseignats" class="text-center">جداول المدرسين</option>
                                            </select>
                                            <input type="submit" class="btn btn-success col-md-4 order-md-1 mt-2 "
                                                value="تغيير">
                                        </div>
                                    </form>
                                </div>

                                <a href="@if (str_contains(url()->current(), 'classes'))
                                    {{ route('emploi.add.classes') }} @else
                                    {{ route('emploi.add.enseignants') }} @endif"
                                    class="btn btn-block bg-gradient-primary offset-md-1 col-md-2 order-md-1 mt-sm-2
                                    h-50">
                                    @if (str_contains(url()->current(), 'enseignants') )
                                    إضافة جدول أوقات مدرس
                                    @else
                                    إضافة جدول أوقات قسم
                                    @endif
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
                                    @php($i=1)
                                    @foreach ($emplois as $key => $emploi)
                                    @if (($emploi->id_classe != -1 && $type == 'classes') ||
                                    ($emploi->id_enseignant != -1 && $type == 'enseignants'))
                                    <tr>
                                        <td>
                                            <div class="row" dir="rtl">

                                                <a href="{{ route('emploi.view.one',$emploi->id) }}"
                                                    class="btn btn-success col-md-3 m-1">عرض</a>


                                                <a href="{{ route('emploi.delete', $emploi->id) }}"
                                                    class="btn btn-danger col-md-3 m-1"
                                                    id="delete">حذف</a>
                                            </div>
                                        </td>
                                        <td>{{ $emploi->anneescolaire }}</td>
                                        @if (str_contains(url()->current(), 'classes'))
                                        <td>{{ $emploi->classe->nom }}</td>
                                        @else
                                        <td>{{ $emploi->enseignant->nom }} {{ $emploi->enseignant->prenom }}</td>
                                        @endif
                                        <td>{{ $i++ }}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    </tfoot>
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
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
