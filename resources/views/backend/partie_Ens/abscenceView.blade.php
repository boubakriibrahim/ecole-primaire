@extends('admin.admin_master')

@section('title')
<title>{{ $ecoleCreds->nom }} | تسجيل الحضور</title>
@endsection

@section('admin')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 order-sm-2">
                    <h1 class="m-0 float-right"> تسجيل الحضور </h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6 order-sm-1">
                    <ol class="breadcrumb float-right float-sm-left">
                        <li class="breadcrumb-item active order-sm"> تسجيل الحضور </li>
                        <li class="breadcrumb-item"><a href="#">الصفحة الرئيسية</a></li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="offset-md-4 col-md-4 order-md-2">
                                    <div class="row">
                                        <h3 class="w-100 text-center">قائمة أسماء القسم</h3>
                                    </div>
                                    <div class="row">
                                        <h2 class="text-success w-100 text-center">{{$classe["classe"]["nom"]}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="p-3">
                            <!-- /.card-header -->
                            <form method="post" action='{{route('abscence.store',$classe["classe"]["id"])}}'>
                                @csrf
                                <div class="row">
                                    <div class="form-group offset-md-2 col-md-4 text-right">
                                        <label for="seance" dir="rtl"> الحصة<span class="text-danger">*</span></label>
                                        @php($jours=['الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'])
                                        <select class="custom-select text-center" dir="rtl" name="seance" required>
                                            <option selected>إختر حصة</option>
                                            @foreach ($seances as $key => $seance)
                                            <option value="{{ $seance->id }}">
                                                {{ $seance->libelle }} | يوم {{ $jours[$seance->jour] }} | من
                                                {{ substr($seance->heure_debut, 0 , -3) }} إلى
                                                {{ substr($seance->heure_fin, 0 , -3) }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 text-right">
                                        <label for="date" dir="rtl">التاريخ
                                            <span class="text-danger">*</span></label>
                                        <input type="date" placeholder="التاريخ" name="date" class="form-control"
                                            dir="rtl" required>
                                    </div>
                                </div>
                                <div>
                                    <table id="example1" class="table table-bordered  text-right p-3">
                                        <thead>
                                            <tr>
                                                <th>تسجيل الغياب</th>
                                                <th>اللقب</th>
                                                <th>الاسم</th>
                                                <th width="5%">العدد</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($eleves_aff as $data => $aff)
                                            <tr>
                                                <td>
                                                    <div class="row d-flex align-items-center">
                                                        <div class="offset-md-2 col-md-4">
                                                            <div class="custom-control custom-radio">
                                                                <input class="custom-control-input order-2" type="radio"
                                                                    id="etat1{{ $aff->id }}" name="etat{{ $aff->id }}[]"
                                                                    value="present" checked="checked">
                                                                <label class="custom-control-label order-1"
                                                                    for="etat1{{ $aff->id }}" checked>حاضر</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="custom-control custom-radio">
                                                                <input class="custom-control-input" type="radio"
                                                                    id="etat2{{ $aff->id }}" name="etat{{ $aff->id }}[]"
                                                                    value="absent">
                                                                <label class="custom-control-label"
                                                                    for="etat2{{ $aff->id }}">غائب</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td> {{ $aff->eleve->prenom }}</td>
                                                <td>{{ $aff->eleve->nom }} </td>
                                                <td>{{ $data+1 }} </td>


                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <center><button type="reset" class="btn btn-secondary">إلغاء</button>
                                    <button type="submit" class="btn btn-primary">تأكيد</button>
                                </center>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
