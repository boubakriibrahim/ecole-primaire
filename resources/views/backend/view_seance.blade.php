@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 order-sm-2">
                    <h1 class="m-0 float-right">التصرف في الحصص</h1>
                </div><!-- /.col -->


                <div class="col-sm-6 order-sm-1">
                    <ol class="breadcrumb float-right float-sm-left">
                        <li class="breadcrumb-item active order-sm">التصرف في الحصص</li>
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
                                <h2 class="col-md-6 offset-md-2  order-md-2 text-right">الحصص</h2>
                                <button type="button"
                                    class="btn btn-block bg-gradient-primary offset-md-1 col-md-2 order-md-1 mt-sm-2"
                                    data-toggle="modal" data-target="#exampleModal" onclick="$('.timepicker').timepicker({
                                        timeFormat: 'HH:mm',
                                        interval: 30,
                                        minTime: '08:00',
                                        maxTime: '18:00',
                                        defaultTime: '8',
                                        startTime: '08:00',
                                        dynamic: true,
                                        dropdown: true,
                                        scrollbar: false
                                    });">
                                    إضافة حصة
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title w-100" id="exampleModalLabel">إضافة حصة</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action='{{ route('seance.store') }}' width=60%>
                                                    @csrf

                                                    <div class="add_item">
                                                        <div class="row">
                                                            <div class="form-group col-md-6 text-right">
                                                                <label for="selectemploijour" dir="rtl"> اليوم<span
                                                                        class="text-danger">*</span></label>
                                                                <select class="custom-select text-center" dir="rtl"
                                                                    name="selectemploijour[]" required>
                                                                    <option selected>إختر يوم</option>
                                                                    <option value="0">
                                                                        الإثنين
                                                                    </option>
                                                                    <option value="1">
                                                                        الثلاثاء
                                                                    </option>
                                                                    <option value="2">
                                                                        الأربعاء
                                                                    </option>
                                                                    <option value="3">
                                                                        الخميس
                                                                    </option>
                                                                    <option value="4">
                                                                        الجمعة
                                                                    </option>
                                                                    <option value="5">
                                                                        السبت
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6 text-right">
                                                                <label for="anneescolaire" dir="rtl">السنة الدراسية
                                                                    <span class="text-danger">*</span></label>
                                                                <input type="text" placeholder="السنة الدراسية"
                                                                    id="anneescolaire" name="anneescolaire"
                                                                    class="form-control" dir="rtl" required>
                                                            </div>
                                                        </div>
                                                        <div class="row" dir="rtl">
                                                            <div class="form-group col-md-6 text-right">
                                                                <label for="selectSeanceClasse" dir="rtl">
                                                                    القسم
                                                                    <span class="text-danger">*</span></label>

                                                                <select class="custom-select"
                                                                    name="selectSeanceClasse[]" required>
                                                                    <option selected>إختر قسم</option>
                                                                    @foreach ($classes as $key => $classe)
                                                                    <option value="{{$classe->id}}">{{$classe->nom}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6 text-right">
                                                                <label for="selectSeanceEnseignant" dir="rtl">
                                                                    المدرس
                                                                    <span class="text-danger">*</span></label>
                                                                <select class="custom-select text-center" dir="rtl"
                                                                    name="selectSeanceEnseignant[]" required>
                                                                    <option selected>إختر مدرس</option>
                                                                    @foreach ($enseignants as $key => $enseignant)
                                                                    <option value="{{$enseignant->id}}">
                                                                        {{$enseignant->nom}}
                                                                        {{$enseignant->prenom}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="row" dir="rtl">
                                                            <div class="form-group col-md-6 text-right">
                                                                <label for="heure_debut" dir="rtl">ساعة البداية <span
                                                                        class="text-danger">*</span></label>
                                                                <input placeholder="Selected time" type="text"
                                                                    name="heure_debut[]" class="form-control timepicker"
                                                                    required>
                                                            </div>
                                                            <div class="form-group col-md-6 text-right">
                                                                <label for="heure_fin" dir="rtl">ساعة النهاية <span
                                                                        class="text-danger">*</span></label>
                                                                <input placeholder="Selected time" type="text"
                                                                    name="heure_fin[]" class="form-control timepicker"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="row" dir="rtl">
                                                            <div class="form-group col-md-6 text-right">
                                                                <label for="selectmatiere" dir="rtl">
                                                                    المادة
                                                                    <span class="text-danger">*</span></label>
                                                                <select class="custom-select" name="selectmatiere[]"
                                                                    required>
                                                                    <option selected>إختر مادة</option>
                                                                    @foreach ($matieres as $key => $matiere)
                                                                    <option value="{{$matiere->id}}">
                                                                        {{$matiere->libelle}} |
                                                                        مستوى
                                                                        ({{$matiere->niveau}})</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6 text-right">
                                                                <label for="selectsalle" dir="rtl">
                                                                    القاعة
                                                                    <span class="text-danger">*</span></label>
                                                                <select class="custom-select" name="selectsalle[]"
                                                                    required>
                                                                    <option selected>إختر قاعة</option>
                                                                    @foreach ($salles as $key => $salle)
                                                                    <option value="{{$salle->id}}">{{$salle->libelle}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row pt-2">
                                                            <div class="offset-md-3"></div>
                                                            <div class=" col-md-6">
                                                                <span class="btn btn-success btn-block addeventmore"><i
                                                                        class="fa fa-plus-circle mx-1"></i> إضافة حصة
                                                                    أخرى
                                                                </span>
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

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="p-3">
                            <table id="example1" class="table table-bordered table-striped text-right p-3">
                                <thead>
                                    <tr>
                                        <th width="25%">العملية</th>
                                        <th>السنة الدراسية</th>
                                        <th>القاعة</th>
                                        <th>المادة</th>
                                        <th>القسم</th>
                                        <th>المدرس</th>
                                        <th>ساعة النهاية</th>
                                        <th>ساعة البداية</th>
                                        <th>اليوم</th>
                                        <th width="5%">العدد</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($jours = ['الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'])
                                    @foreach ($allData as $key => $seance)
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <a href="{{ route('seance.delete', $seance->id) }}"
                                                    class="btn btn-danger offset-sm-3 mr-sm-1 col-sm-4 order-3 order-sm-1"
                                                    id="delete">حذف</a>

                                                <button type="button" class="btn btn-info  col-sm-4 order-2"
                                                data-toggle="modal" data-target="#modelChange">
                                                    تحديث
                                                </button>
                                            </div>
                                        </td>
                                        <td>{{ $seance->anneescolaire }}</td>
                                        <td>{{ $seance->salle->libelle }}</td>
                                        <td>{{ $seance->matiere->libelle }}</td>
                                        <td>{{ $seance->classe->nom }}</td>
                                        <td>{{ $seance->enseignant->nom }} {{ $seance->enseignant->prenom }}</td>
                                        <td>{{ $seance->heure_fin }}</td>
                                        <td>{{ $seance->heure_debut }}</td>
                                        <td>{{ $jours[$seance->jour] }}</td>
                                        <td>{{ $key+1 }}</td>
                                    </tr>
                                    @endforeach
                                    </tfoot>
                            </table>



                            @foreach ($allData as $key => $seance)

                            <!-- Modal -->
                            <div class="modal fade" id="modelChange" tabindex="1"
                                aria-labelledby="exampleModalChange" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title w-100" id="exampleModalLabel">تحديث الحصة</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action='{{ route('seance.miseajour',$seance->id) }}'
                                                width=60%>
                                                @csrf

                                                <div class="row">
                                                    <div class="form-group col-md-6 text-right">
                                                        <label for="selectemploijour" dir="rtl"> اليوم<span
                                                                class="text-danger">*</span></label>
                                                        <select class="custom-select text-center" dir="rtl"
                                                            name="selectemploijour" required>
                                                            <option selected>إختر يوم</option>
                                                            <option value="0">
                                                                الإثنين
                                                            </option>
                                                            <option value="1">
                                                                الثلاثاء
                                                            </option>
                                                            <option value="2">
                                                                الأربعاء
                                                            </option>
                                                            <option value="3">
                                                                الخميس
                                                            </option>
                                                            <option value="4">
                                                                الجمعة
                                                            </option>
                                                            <option value="5">
                                                                السبت
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6 text-right">
                                                        <label for="anneescolaire" dir="rtl">السنة الدراسية <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" placeholder="السنة الدراسية"
                                                            id="anneescolaire" name="anneescolaire" class="form-control"
                                                            dir="rtl" value="{{ $seance->anneescolaire }}" required>
                                                    </div>
                                                </div>
                                                <div class="row" dir="rtl">
                                                    <div class="form-group col-md-6 text-right">
                                                        <label for="selectSeanceClasse" dir="rtl">
                                                            القسم
                                                            <span class="text-danger">*</span></label>

                                                        <select class="custom-select" name="selectSeanceClasse"
                                                            required>
                                                            @foreach ($classes as $key => $classe)
                                                            <option value="{{$classe->id}}" @if($classe->id == $seance->id_classe) selected @endif>{{$classe->nom}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6 text-right">
                                                        <label for="selectSeanceEnseignant" dir="rtl">
                                                            المدرس
                                                            <span class="text-danger">*</span></label>
                                                        <select class="custom-select text-center" dir="rtl"
                                                            name="selectSeanceEnseignant" required>
                                                            @foreach ($enseignants as $key => $enseignant)
                                                            <option value="{{$enseignant->id}}" @if($enseignant->id == $seance->id_enseignant) selected @endif>{{$enseignant->nom}}
                                                                {{$enseignant->prenom}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="row" dir="rtl">
                                                    <div class="form-group col-md-6 text-right">
                                                        <label for="heure_debut" dir="rtl">ساعة البداية <span
                                                                class="text-danger">*</span></label>
                                                        <input placeholder="Selected time" type="text"
                                                            name="heure_debut" class="form-control timepicker"
                                                            value="{{ $seance->heure_debut }}"
                                                            required>
                                                    </div>
                                                    <div class="form-group col-md-6 text-right">
                                                        <label for="heure_fin" dir="rtl">ساعة النهاية <span
                                                                class="text-danger">*</span></label>
                                                        <input placeholder="Selected time" type="text"
                                                            name="heure_fin"
                                                            value="{{ $seance->heure_fin }}"
                                                            class="form-control timepicker" required>
                                                    </div>
                                                </div>
                                                <div class="row" dir="rtl">
                                                    <div class="form-group col-md-6 text-right">
                                                        <label for="selectmatiere" dir="rtl">
                                                            المادة
                                                            <span class="text-danger">*</span></label>
                                                        <select class="custom-select" name="selectmatiere" required>
                                                            @foreach ($matieres as $key => $matiere)
                                                            <option value="{{$matiere->id}}" @if($matiere->id == $seance->id_matiere) selected @endif>{{$matiere->libelle}} |
                                                                مستوى
                                                                ({{$matiere->niveau}})</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6 text-right">
                                                        <label for="selectsalle" dir="rtl">
                                                            القاعة
                                                            <span class="text-danger">*</span></label>
                                                        <select class="custom-select" name="selectsalle" required>
                                                            @foreach ($salles as $key => $salle)
                                                            <option value="{{$salle->id}}" @if($salle->id == $seance->id_salle) selected @endif>{{$salle->libelle}}
                                                            </option>
                                                            @endforeach
                                                        </select>
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


<div class="d-none" style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">

            {{-- begin new seance --}}
            <div class="dropdown-divider"></div>
            <div class="row w-100 text-center mb-2">
                <div class="col-12">
                    <h4>
                        إضافة حصة
                    </h4>
                </div>
            </div>


            <div class="row">
                <div class="form-group col-md-6 text-right">
                    <label for="selectemploijour" dir="rtl"> اليوم<span class="text-danger">*</span></label>
                    <select class="custom-select text-center" dir="rtl" name="selectemploijour[]" required>
                        <option selected>إختر يوم</option>
                        <option value="0">
                            الإثنين
                        </option>
                        <option value="1">
                            الثلاثاء
                        </option>
                        <option value="2">
                            الأربعاء
                        </option>
                        <option value="3">
                            الخميس
                        </option>
                        <option value="4">
                            الجمعة
                        </option>
                        <option value="5">
                            السبت
                        </option>
                    </select>
                </div>
                <div class="form-group col-md-6 text-right">
                    <label for="anneescolaire" dir="rtl">السنة الدراسية <span class="text-danger">*</span></label>
                    <input type="text" placeholder="السنة الدراسية" id="anneescolaire" name="anneescolaire"
                        class="form-control" dir="rtl" required>
                </div>
            </div>
            <div class="row" dir="rtl">
                <div class="form-group col-md-6 text-right">
                    <label for="selectSeanceClasse" dir="rtl">
                        القسم
                        <span class="text-danger">*</span></label>

                    <select class="custom-select" name="selectSeanceClasse[]" required>
                        <option selected>إختر قسم</option>
                        @foreach ($classes as $key => $classe)
                        <option value="{{$classe->id}}">{{$classe->nom}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6 text-right">
                    <label for="selectSeanceEnseignant" dir="rtl">
                        المدرس
                        <span class="text-danger">*</span></label>
                    <select class="custom-select text-center" dir="rtl" name="selectSeanceEnseignant[]" required>
                        <option selected>إختر مدرس</option>
                        @foreach ($enseignants as $key => $enseignant)
                        <option value="{{$enseignant->id}}">{{$enseignant->nom}}
                            {{$enseignant->prenom}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="row" dir="rtl">
                <div class="form-group col-md-6 text-right">
                    <label for="heure_debut" dir="rtl">ساعة البداية <span class="text-danger">*</span></label>
                    <input placeholder="Selected time" type="text" name="heure_debut[]" class="form-control timepicker"
                        required>
                </div>
                <div class="form-group col-md-6 text-right">
                    <label for="heure_fin" dir="rtl">ساعة النهاية <span class="text-danger">*</span></label>
                    <input placeholder="Selected time" type="text" name="heure_fin[]" class="form-control timepicker"
                        required>
                </div>
            </div>
            <div class="row" dir="rtl">
                <div class="form-group col-md-6 text-right">
                    <label for="selectmatiere" dir="rtl">
                        المادة
                        <span class="text-danger">*</span></label>
                    <select class="custom-select" name="selectmatiere[]" required>
                        <option selected>إختر مادة</option>
                        @foreach ($matieres as $key => $matiere)
                        <option value="{{$matiere->id}}">{{$matiere->libelle}} |
                            مستوى
                            ({{$matiere->niveau}})</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6 text-right">
                    <label for="selectsalle" dir="rtl">
                        القاعة
                        <span class="text-danger">*</span></label>
                    <select class="custom-select" name="selectsalle[]" required>
                        <option selected>إختر قاعة</option>
                        @foreach ($salles as $key => $salle)
                        <option value="{{$salle->id}}">{{$salle->libelle}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="row pt-2" dir="rtl">
                <div class="col-md-6">
                    <span class="btn btn-success btn-block addeventmore"><i class="fa fa-plus-circle mx-1"></i> إضافة
                        حصة أخرى </span>
                </div>
                <div class="col-md-6 mt-2 mt-md-0">
                    <span class="btn btn-danger btn-block removeeventmore"><i class="fa fa-minus-circle mx-1"></i> حذف
                        هذه الحصة </span>
                </div>
            </div>
            {{-- end new seance --}}
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var counter = 0;
        $(document).on("click", ".addeventmore", function () {
            var whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
            $('.timepicker').timepicker({
                timeFormat: 'HH:mm',
                interval: 30,
                minTime: '08:00',
                maxTime: '18:00',
                defaultTime: '8',
                startTime: '08:00',
                dynamic: true,
                dropdown: true,
                scrollbar: false
            });
        });
        $(document).on("click", '.removeeventmore', function (event) {
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter -= 1
        });

    });

</script>


@endsection
