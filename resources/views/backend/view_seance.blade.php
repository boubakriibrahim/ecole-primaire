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
                                    data-toggle="modal" data-target="#exampleModal">
                                    إضافة حصة
                                </button>



                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="p-3">
                            <table id="example1" class="table table-bordered table-striped text-right p-3" dir="rtl">
                                <thead>
                                    <tr dir="rtl">
                                        <th width="5%">العدد</th>
                                        <th>اليوم</th>
                                        <th>ساعة البداية</th>
                                        <th>ساعة النهاية</th>
                                        <th>المدرس</th>
                                        <th>القسم</th>
                                        <th>المادة</th>
                                        <th>القاعة</th>
                                        <th>السنة الدراسية</th>
                                        <th width="25%">العملية</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($jours = ['الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'])
                                    @foreach ($allData as $key => $seance)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $jours[$seance->jour] }}</td>
                                        <td>{{ $seance->heure_debut }}</td>
                                        <td>{{ $seance->heure_fin }}</td>
                                        <td>{{ $seance->enseignant->nom }} {{ $seance->enseignant->prenom }}</td>
                                        <td>{{ $seance->classe->nom }}</td>
                                        <td>{{ $seance->matiere->libelle }}</td>
                                        <td>{{ $seance->salle->libelle }}</td>
                                        <td>{{ $seance->anneescolaire }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6 px-1">
                                                    <button type="button" class="btn btn-info btn-block"
                                                        data-toggle="modal" data-target="#modelChange{{ $seance->id }}">
                                                        تحديث
                                                    </button>
                                                </div>
                                                <div class="col-md-6 mt-1 mt-md-0 px-1">
                                                    <a href="{{ route('seance.delete', $seance->id) }}"
                                                        class="btn btn-danger btn-block" id="delete">حذف</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tfoot>
                            </table>



                            @foreach ($allData as $key => $seance)

                            <!-- Modal -->
                            <div class="modal fade" id="modelChange{{ $seance->id }}" tabindex="1"
                                aria-labelledby="exampleModalChange" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title w-100" id="exampleModalLabel{{ $seance->id }}">تحديث
                                                الحصة</h5>
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
                                                            <option value="0" @if($seance->jour == 0) selected @endif>
                                                                الإثنين
                                                            </option>
                                                            <option value="1" @if($seance->jour == 1) selected @endif>
                                                                الثلاثاء
                                                            </option>
                                                            <option value="2" @if($seance->jour == 2) selected @endif>
                                                                الأربعاء
                                                            </option>
                                                            <option value="3" @if($seance->jour == 3) selected @endif>
                                                                الخميس
                                                            </option>
                                                            <option value="4" @if($seance->jour == 4) selected @endif>
                                                                الجمعة
                                                            </option>
                                                            <option value="5" @if($seance->jour == 5) selected @endif>
                                                                السبت
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6 text-right">
                                                        <label for="anneescolaire" dir="rtl">السنة الدراسية <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" placeholder="السنة الدراسية"
                                                            name="anneescolaire" class="form-control" dir="rtl"
                                                            value="{{ $seance->anneescolaire }}" required>
                                                    </div>
                                                </div>
                                                <div class="row" dir="rtl">
                                                    <div class="form-group col-md-6 text-right">
                                                        <label for="heure_debut" dir="rtl">ساعة البداية <span
                                                                class="text-danger">*</span></label>
                                                        <input placeholder="ساعة البداية" type="text" name="heure_debut"
                                                            class="form-control" id="heure_debut{{ $seance->id }}"
                                                            value="{{ $seance->heure_debut }}" required>
                                                    </div>
                                                    <div class="form-group col-md-6 text-right">
                                                        <label for="heure_fin" dir="rtl">ساعة النهاية <span
                                                                class="text-danger">*</span></label>
                                                        <input placeholder="ساعة النهاية" type="text" name="heure_fin"
                                                            id="heure_fin{{ $seance->id }}"
                                                            value="{{ $seance->heure_fin }}" class="form-control"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="row" dir="rtl">
                                                    <div class="form-group col-md-12 text-right">
                                                        <label for="selectaffectation" dir="rtl">
                                                            التعيين
                                                            <span class="text-danger">*</span></label>
                                                        <select class="custom-select" name="selectaffectation" required>
                                                            @foreach ($aff_enseignants as $key => $aff_enseignant)
                                                            <option
                                                                value="{{ $aff_enseignant->id }}" @if(($aff_enseignant->classe_id ==
                                                                $seance->id_classe) && ($aff_enseignant->matiere_id ==
                                                                $seance->id_matiere) && ($aff_enseignant->enseignant_id ==
                                                                $seance->id_enseignant) ) selected @endif>
                                                                القسم ({{$aff_enseignant->classe->nom}}) | المدرس ({{$aff_enseignant->enseignant->nom}} {{$aff_enseignant->enseignant->prenom}}) | المادة ({{$aff_enseignant->matiere->libelle}}-مستوى {{$aff_enseignant->matiere->niveau}})
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row" dir="rtl">
                                                    <div class="form-group col-md-12 text-right">
                                                        <label for="selectsalle" dir="rtl">
                                                            القاعة
                                                            <span class="text-danger">*</span></label>
                                                        <select class="custom-select" name="selectsalle" required>
                                                            @foreach ($salles as $key => $salle)
                                                            <option value="{{$salle->id}}" @if($salle->id ==
                                                                $seance->id_salle) selected @endif>{{$salle->libelle}}
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

<script src="{{ asset('js/jquery.min.js') }}"></script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="exampleModalLabel">إضافة حصة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action='{{ route('seance.store') }}' width=60%>
                    @csrf

                    <div class="add_item">
                        <div class="row">
                            <div class="form-group col-md-6 text-right">
                                <label for="selectemploijour" dir="rtl"> اليوم<span class="text-danger">*</span></label>
                                <select class="custom-select text-center" dir="rtl" name="selectemploijour" required>
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
                                <input type="text" placeholder="السنة الدراسية" name="anneescolaire"
                                    class="form-control" dir="rtl" required>
                            </div>
                        </div>
                        <div class="row" dir="rtl">
                            <div class="form-group col-md-6 text-right">
                                <label for="heure_debut" dir="rtl">ساعة البداية <span
                                        class="text-danger">*</span></label>
                                <input placeholder="ساعة البداية" type="text" name="heure_debut"
                                    class="form-control timepicker" required>
                            </div>
                            <div class="form-group col-md-6 text-right">
                                <label for="heure_fin" dir="rtl">ساعة النهاية <span class="text-danger">*</span></label>
                                <input placeholder="ساعة النهاية" type="text" name="heure_fin"
                                    class="form-control timepicker" required>
                            </div>
                        </div>
                        <div class="row" dir="rtl">
                            <div class="form-group col-md-12 text-right">
                                <label for="selectaffectation" dir="rtl">
                                    التعيين
                                    <span class="text-danger">*</span></label>
                                <select class="custom-select" name="selectaffectation" required>
                                    <option selected>إختر تعيين</option>
                                    @foreach ($aff_enseignants as $key => $aff_enseignant)
                                    <option
                                        value="{{ $aff_enseignant->id }}">
                                        القسم ({{$aff_enseignant->classe->nom}}) | المدرس ({{$aff_enseignant->enseignant->nom}} {{$aff_enseignant->enseignant->prenom}}) | المادة ({{$aff_enseignant->matiere->libelle}}-مستوى {{$aff_enseignant->matiere->niveau}})
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row" dir="rtl">
                            <div class="form-group col-md-12 text-right">
                                <label for="selectsalle" dir="rtl">
                                    القاعة
                                    <span class="text-danger">*</span></label>
                                <select class="custom-select" name="selectsalle" required>
                                    <option selected>إختر قاعة</option>
                                    @foreach ($salles as $key => $salle)
                                    <option value="{{$salle->id}}">{{$salle->libelle}}
                                    </option>
                                    @endforeach
                                </select>
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



<script src="{{ asset('js/timepicker.min.js') }}"></script>

<script>
    $('.timepicker').timepicker({
        timeFormat: 'HH:mm',
        interval: 30,
        minTime: '08:00',
        maxTime: '18:00',
        defaultTime: '8',
        startTime: '08:00',
        dynamic: true,
        dropdown: true,
        scrollbar: false,
        zindex: 1500
    });

</script>


@foreach ($allData as $key => $seance)
<script type="text/javascript">
    var seances = {!!json_encode($seance) !!};
    var heure_debut = (seances['heure_debut']).substring(0, 2);
    var heure_fin = (seances['heure_fin']).substring(3, 5);

    $('#heure_debut' + seances['id']).timepicker({
        timeFormat: 'HH:mm',
        interval: 30,
        minTime: '08:00',
        maxTime: '18:00',
        defaultTime: parseInt(heure_debut),
        startTime: '08:00',
        dynamic: true,
        dropdown: true,
        scrollbar: false,
        zindex: 1500
    });
    $('#heure_fin' + seances['id']).timepicker({
        timeFormat: 'HH:mm',
        interval: 30,
        minTime: '08:00',
        maxTime: '18:00',
        defaultTime: parseInt(heure_fin),
        startTime: '08:00',
        dynamic: true,
        dropdown: true,
        scrollbar: false,
        zindex: 1500
    });

</script>
@endforeach


@endsection


@section('datatable')
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "pageLength": 5,
            "autoWidth": false,
            "buttons": [{
                    extend: 'copy',
                    text: 'نسخ',
                    exportOptions: {
                        columns: [
                            '1:visIdx',
                            '2:visIdx',
                            '3:visIdx',
                            '4:visIdx',
                            '5:visIdx',
                            '6:visIdx',
                            '7:visIdx',
                            '8:visIdx',
                            '9:visIdx'
                        ]
                    }
                },
                {
                    extend: 'excel',
                    text: 'Excel',
                    exportOptions: {
                        columns: [
                            '1:visIdx',
                            '2:visIdx',
                            '3:visIdx',
                            '4:visIdx',
                            '5:visIdx',
                            '6:visIdx',
                            '7:visIdx',
                            '8:visIdx',
                            '9:visIdx'
                        ]
                    }
                }, "pdf",
                {
                    extend: 'print',
                    text: 'طباعة',
                    exportOptions: {
                        columns: [
                            '1:visIdx',
                            '2:visIdx',
                            '3:visIdx',
                            '4:visIdx',
                            '5:visIdx',
                            '6:visIdx',
                            '7:visIdx',
                            '8:visIdx',
                            '9:visIdx'
                        ]
                    }
                }, {
                    extend: 'colvis',
                    text: 'رؤية الأعمدة'
                }
            ],

            "language": {
                "emptyTable": "ليست هناك بيانات متاحة في الجدول",
                "loadingRecords": "جارٍ التحميل...",
                "lengthMenu": "أظهر _MENU_ مدخلات",
                "zeroRecords": "لم يعثر على أية سجلات",
                "info": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "infoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                "infoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "search": "ابحث:",
                "paginate": {
                    "first": "الأول",
                    "previous": "السابق",
                    "next": "التالي",
                    "last": "الأخير"
                },
                "aria": {
                    "sortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                    "sortDescending": ": تفعيل لترتيب العمود تنازلياً"
                },
                "select": {
                    "rows": {
                        "_": "%d قيمة محددة",
                        "1": "1 قيمة محددة"
                    },
                    "cells": {
                        "1": "1 خلية محددة",
                        "_": "%d خلايا محددة"
                    },
                    "columns": {
                        "1": "1 عمود محدد",
                        "_": "%d أعمدة محددة"
                    }
                },
                "buttons": {
                    "print": "طباعة",
                    "copyKeys": "زر <i>ctrl<\/i> أو <i>⌘<\/i> + <i>C<\/i> من الجدول<br>ليتم نسخها إلى الحافظة<br><br>للإلغاء اضغط على الرسالة أو اضغط على زر الخروج.",
                    "copySuccess": {
                        "_": "%d قيمة نسخت",
                        "1": "1 قيمة نسخت"
                    },
                    "pageLength": {
                        "-1": "اظهار الكل",
                        "_": "إظهار %d أسطر"
                    },
                    "collection": "مجموعة",
                    "copy": "نسخ",
                    "copyTitle": "نسخ إلى الحافظة",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pdf": "PDF",
                    "colvis": "إظهار الأعمدة",
                    "colvisRestore": "إستعادة العرض"
                },
                "autoFill": {
                    "cancel": "إلغاء",
                    "fill": "املأ جميع الحقول بـ <i>%d&lt;\\\/i&gt;<\/i>",
                    "fillHorizontal": "تعبئة الحقول أفقيًا",
                    "fillVertical": "تعبئة الحقول عموديا"
                },
                "searchBuilder": {
                    "add": "اضافة شرط",
                    "clearAll": "ازالة الكل",
                    "condition": "الشرط",
                    "data": "المعلومة",
                    "logicAnd": "و",
                    "logicOr": "أو",
                    "title": [
                        "منشئ البحث"
                    ],
                    "value": "القيمة",
                    "conditions": {
                        "date": {
                            "after": "بعد",
                            "before": "قبل",
                            "between": "بين",
                            "empty": "فارغ",
                            "equals": "تساوي",
                            "not": "ليس",
                            "notBetween": "ليست بين",
                            "notEmpty": "ليست فارغة"
                        },
                        "number": {
                            "between": "بين",
                            "empty": "فارغة",
                            "equals": "تساوي",
                            "gt": "أكبر من",
                            "gte": "أكبر وتساوي",
                            "lt": "أقل من",
                            "lte": "أقل وتساوي",
                            "not": "ليست",
                            "notBetween": "ليست بين",
                            "notEmpty": "ليست فارغة"
                        },
                        "string": {
                            "contains": "يحتوي",
                            "empty": "فاغ",
                            "endsWith": "ينتهي ب",
                            "equals": "يساوي",
                            "not": "ليست",
                            "notEmpty": "ليست فارغة",
                            "startsWith": " تبدأ بـ "
                        }
                    },
                    "button": {
                        "0": "فلاتر البحث",
                        "_": "فلاتر البحث (%d)"
                    },
                    "deleteTitle": "حذف فلاتر"
                },
                "searchPanes": {
                    "clearMessage": "ازالة الكل",
                    "collapse": {
                        "0": "بحث",
                        "_": "بحث (%d)"
                    },
                    "count": "عدد",
                    "countFiltered": "عدد المفلتر",
                    "loadMessage": "جارِ التحميل ...",
                    "title": "الفلاتر النشطة"
                },
                "infoThousands": ",",
                "datetime": {
                    "previous": "السابق",
                    "next": "التالي",
                    "hours": "الساعة",
                    "minutes": "الدقيقة",
                    "seconds": "الثانية",
                    "unknown": "-",
                    "amPm": [
                        "صباحا",
                        "مساءا"
                    ],
                    "weekdays": [
                        "الأحد",
                        "الإثنين",
                        "الثلاثاء",
                        "الأربعاء",
                        "الخميس",
                        "الجمعة",
                        "السبت"
                    ],
                    "months": [
                        "يناير",
                        "فبراير",
                        "مارس",
                        "أبريل",
                        "مايو",
                        "يونيو",
                        "يوليو",
                        "أغسطس",
                        "سبتمبر",
                        "أكتوبر",
                        "نوفمبر",
                        "ديسمبر"
                    ]
                },
                "editor": {
                    "close": "إغلاق",
                    "create": {
                        "button": "إضافة",
                        "title": "إضافة جديدة",
                        "submit": "إرسال"
                    },
                    "edit": {
                        "button": "تعديل",
                        "title": "تعديل السجل",
                        "submit": "تحديث"
                    },
                    "remove": {
                        "button": "حذف",
                        "title": "حذف",
                        "submit": "حذف",
                        "confirm": {
                            "_": "هل أنت متأكد من رغبتك في حذف السجلات %d المحددة؟",
                            "1": "هل أنت متأكد من رغبتك في حذف السجل؟"
                        }
                    },
                    "error": {
                        "system": "حدث خطأ ما"
                    },
                    "multi": {
                        "title": "قيم متعدية",
                        "restore": "تراجع"
                    }
                },
                "processing": "جارٍ المعالجة..."
            }
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });

</script>
@endsection
