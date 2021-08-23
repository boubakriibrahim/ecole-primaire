@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 order-sm-2">
                    <h1 class="m-0 float-right">تعيين المدرسين </h1>
                </div><!-- /.col -->


                <div class="col-sm-6 order-sm-1">
                    <ol class="breadcrumb float-right float-sm-left">
                        <li class="breadcrumb-item active order-sm">تعيين المدرسين </li>
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
                                <h2 class="col-md-6 offset-md-2  order-md-2 text-right">تعيين المدرسين</h2>
                                {{-- <a href="{{ route('affEns.add') }}" class="btn btn-block bg-gradient-primary
                                offset-md-1 col-md-2 order-md-1 mt-sm-2">إضافة تعين</a> --}}
                                <button type="button"
                                    class="btn btn-block bg-gradient-primary offset-md-1 col-md-2 order-md-1 mt-sm-2"
                                    data-toggle="modal" data-target="#exampleModal">
                                    إضافة تعيين
                                </button>

                                <!-- Modal -->
                                <div class="modal fade " id="exampleModal" tabindex="1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title w-100" id="exampleModalLabel">إضافة تعيين
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action='{{ route('AffEns.store') }}' width=60%>
                                                    @csrf

                                                    <div class="row">
                                                        <div class="input-group p-3 col-md-12">
                                                            <label class="input-group-text col-md-3 order-md-2"
                                                                for="inputGroupSelect01"><span
                                                                    class="text-danger">*</span> إختر مدرس</label>
                                                            <select class="form-select col-md-9 order-md-1"
                                                                id="inputGroupSelect01" name="enseignant_id" dir="rtl"
                                                                required>
                                                                <option selected>إختر مدرس</option>
                                                                @foreach ($enseignants as $key => $enseignant)
                                                                <option value="{{$enseignant->id}}">
                                                                    {{$enseignant->nom}} {{$enseignant->prenom}}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-group p-3 col-md-12">
                                                            <label class="input-group-text col-md-3 order-md-2"
                                                                for="inputGroupSelect02"><span
                                                                    class="text-danger">*</span> إختر قسم</label>
                                                            <select class="form-select col-md-9 order-md-1"
                                                                id="inputGroupSelect02" dir="rtl" name="classe_id"
                                                                required>
                                                                <option selected>إختر قسم</option>
                                                                @foreach ($classes as $key => $classe)
                                                                <option value="{{$classe->id}}">{{$classe->nom}}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="input-group p-3 col-md-12">
                                                            <label class="input-group-text col-md-3 order-md-2"
                                                                for="inputGroupSelect03"><span
                                                                    class="text-danger">*</span> إختر مادة</label>
                                                            <select class="form-select col-md-9 order-md-1"
                                                                id="inputGroupSelect03" name="matiere_id" dir="rtl"
                                                                required>
                                                                <option selected>إختر مادة</option>
                                                                @foreach ($matieres as $key => $matiere)
                                                                <option value="{{$matiere->id}}">{{$matiere->libelle}}
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

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="p-3">
                            <table id="example1" class="table table-bordered table-striped text-right p-3" dir="rtl">
                                <thead>
                                    <tr dir="rtl">
                                        <th width="5%">العدد</th>
                                        <th>المعلم</th>
                                        <th>القسم</th>
                                        <th> المادة</th>
                                        <th>السنة الدراسية</th>
                                        <th width="25%">العملية</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($affEns as $key => $aff)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $aff->enseignant->nom }} {{ $aff->enseignant->prenom }}</td>
                                        <td>{{ $aff->classe->nom }}</td>
                                        <td>{{ $aff->matiere->libelle }}</td>
                                        <td>{{ $aff->classe->anneescolaire }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6 px-1">
                                                    <button type="button" class="btn btn-info btn-block"
                                                        data-toggle="modal" data-target="#model{{$aff->id}}">
                                                        تحديث
                                                    </button>
                                                </div>
                                                <div class="col-md-6 mt-1 mt-md-0 px-1">
                                                    <a href="{{ route("AffEns.delete", $aff->id) }}"
                                                        class="btn btn-danger btn-block" id="delete">حذف</a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    @endforeach
                                    </tfoot>
                            </table>



                            @foreach ($affEns as $key => $aff)

                            <!-- Modal -->
                            <div class="modal fade" id="model{{$aff->id}}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title w-100" id="examplemodel{{$aff->id}}">تحديث تعيين
                                                المدرس</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action='{{ route('AffEns.miseajour',$aff->id) }}'
                                                width=60%>
                                                @csrf
                                                <div class="row">
                                                    <div class="input-group p-3 col-md-12">
                                                        <label class="input-group-text col-md-3 order-md-2"
                                                            for="inputGroupSelect01"> <span
                                                                class="text-danger">*</span>إختر
                                                            مدرس</label>
                                                        <select class="form-select col-md-9 order-md-1"
                                                            id="inputGroupSelect01" name="enseignant_id" dir="rtl"
                                                            required>
                                                            <option value="{{$aff->enseignant->id}}" selected required>
                                                                {{$aff->enseignant->nom}} {{$aff->enseignant->prenom}}
                                                            </option>
                                                            @foreach ($enseignants as $key => $enseignant)
                                                            <option value="{{$enseignant->id}}">{{$enseignant->nom}}
                                                                {{$enseignant->prenom}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-group p-3 col-md-12">
                                                        <label class="input-group-text col-md-3 order-md-2"
                                                            for="inputGroupSelect02"> <span
                                                                class="text-danger">*</span>إختر قسم</label>
                                                        <select class="form-select col-md-9 order-md-1"
                                                            id="inputGroupSelect02" name="classe_id" dir="rtl" required>
                                                            <option value="{{$aff->classe->id}}" selected>
                                                                {{$aff->classe->nom}}</option>
                                                            @foreach ($classes as $key => $classe)
                                                            <option value="{{$classe->id}}">{{$classe->nom}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-group p-3 col-md-12 ">
                                                        <label class="input-group-text col-md-3 order-md-2"
                                                            for="inputGroupSelect03"> <span
                                                                class="text-danger">*</span>إختر مادة</label>
                                                        <select class="form-select col-md-9 order-md-1"
                                                            id="inputGroupSelect03" name="matiere_id" dir="rtl"
                                                            required>
                                                            <option value="{{$aff->matiere->id}}" selected>
                                                                {{$aff->matiere->libelle}}</option>
                                                            @foreach ($matieres as $key => $matiere)
                                                            <option value="{{$matiere->id}}">{{$matiere->libelle}}
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
                            '4:visIdx',
                            '3:visIdx',
                            '2:visIdx',
                            '1:visIdx',
                            '0:visIdx'
                        ]
                    }
                },
                {
                    extend: 'excel',
                    text: 'Excel',
                    exportOptions: {
                        columns: [
                            '4:visIdx',
                            '3:visIdx',
                            '2:visIdx',
                            '1:visIdx',
                            '0:visIdx'
                        ]
                    }
                }, "pdf",
                {
                    extend: 'print',
                    text: 'طباعة',
                    exportOptions: {
                        columns: [
                            '4:visIdx',
                            '3:visIdx',
                            '2:visIdx',
                            '1:visIdx',
                            '0:visIdx'
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
