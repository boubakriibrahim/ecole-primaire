@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 order-sm-2">
                    <h1 class="m-0 float-right">التصرف في التلاميذ </h1>
                </div><!-- /.col -->


                <div class="col-sm-6 order-sm-1">
                    <ol class="breadcrumb float-right float-sm-left">
                        <li class="breadcrumb-item active order-sm">التصرف في التلاميذ</li>
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
                                <h2 class="col-md-6 offset-md-2  order-md-2 text-right">التلاميذ</h2>
                                <button type="button"
                                    class="btn btn-block bg-gradient-primary offset-md-1 col-md-2 order-md-1 mt-sm-2"
                                    data-toggle="modal" data-target="#exampleModal">
                                    إضافة تلميذ
                                </button>

                            </div>
                            <!-- /.card-header -->
                            <div class="p-3">
                                <table id="example1" class="table table-bordered table-striped text-right p-3">
                                    <thead>
                                        <tr>
                                            <th width="25%">العملية</th>

                                            <th>رمز التسجيل </th>
                                            <th> الجنس </th>
                                            <th>تاريخ الولادة</th>
                                            <th>اللقب</th>
                                            <th>الاسم</th>
                                            <th width="5%">العدد</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allData as $key => $eleve)
                                        <tr>
                                            <td>
                                                <div class="row">
                                                    <a href="{{ route("eleve.delete", $eleve->id) }}"
                                                        class="btn btn-danger offset-sm-3 mr-sm-1 col-sm-4 order-3 order-sm-1"
                                                        id="delete">حذف</a>
                                                    <button type="button" class="btn btn-info  col-sm-4 order-2"
                                                        data-toggle="modal" data-target="#model{{$eleve->id}}">
                                                        تحديث
                                                    </button>
                                                </div>
                                            </td>
                                            <td>{{ $eleve->num_inscri }}</td>
                                            <td>@if($eleve->sexe==1)
                                                مؤنث
                                                @else
                                                مذكر
                                                @endif
                                            </td>
                                            <td>{{ $eleve->date_naissance }}</td>
                                            <td>{{ $eleve->prenom }}</td>
                                            <td>{{ $eleve->nom }}</td>
                                            <td>{{ $key+1 }}</td>
                                        </tr>
                                        @endforeach
                                        </tfoot>
                                </table>



                                @foreach ($allData as $key => $eleve)

                                <!-- Modal -->
                                <div class="modal fade" id="model{{$eleve->id}}" tabindex="1"
                                    aria-labelledby="exampleModal{{$eleve->id}}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title w-100" id="exampleModalLabel">تحديث التلميذ </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action='{{ route('eleve.miseajour',$eleve->id) }}'
                                                    width=60%>
                                                    @csrf

                                                    <div class="row" dir="rtl">
                                                        <div class="form-group col-md-6 text-right">
                                                            <label for="nom"> الإسم<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="nom" name="nom"
                                                                placeholder="أدخل الإسم" value="{{ $eleve->nom }}"
                                                                required>
                                                        </div>
                                                        <div class="form-group col-md-6 text-right">
                                                            <label for="prenom"> اللقب <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="prenom"
                                                                name="prenom" placeholder="أدخل اللقب"
                                                                value="{{ $eleve->prenom }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="row" dir="rtl">
                                                        <div class="form-group col-md-6 text-right">
                                                            <label for="date_naissance"> تاريخ الولادة<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="date" class="form-control" id="date_naissance"
                                                                name="date_naissance"
                                                                value="{{ $eleve->date_naissance }}"
                                                                placeholder="أدخل تاريخ الولادة" required>
                                                        </div>
                                                        <div class="form-group col-md-6 text-right">
                                                            <label for="num_inscri"> رمز التسجيل <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="num_inscri"
                                                                name="num_inscri" placeholder="أدخل رمز التسجيل"
                                                                value="{{ $eleve->num_inscri }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-right" dir="rtl">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label for="sexe">الجنس <span
                                                                        class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="custom-control custom-radio">
                                                                    <input class="custom-control-input order-2"
                                                                        type="radio" id="inlineCheckbox1" name="sexe"
                                                                        value="0" @if ($eleve->sexe == 0) checked
                                                                    @endif>
                                                                    <label class="custom-control-label order-1"
                                                                        for="inlineCheckbox1">مذكر</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="custom-control custom-radio">
                                                                    <input class="custom-control-input" type="radio"
                                                                        id="inlineCheckbox2" name="sexe" value="1"
                                                                        @if($eleve->sexe == 1) checked @endif>
                                                                    <label class="custom-control-label"
                                                                        for="inlineCheckbox2">مؤنث</label>
                                                                </div>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة تلميذ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action='{{ route('eleve.store') }}' width=60%>
                    @csrf

                    <div class="row" dir="rtl">
                        <div class="form-group col-md-6 text-right">
                            <label for="nom"> الإسم<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="أدخل الإسم"
                                required>
                        </div>
                        <div class="form-group col-md-6 text-right">
                            <label for="prenom"> اللقب <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="أدخل اللقب"
                                required>
                        </div>
                    </div>
                    <div class="row" dir="rtl">
                        <div class="form-group col-md-6 text-right">
                            <label for="date_naissance"> تاريخ الولادة<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="date_naissance" name="date_naissance"
                                placeholder="أدخل تاريخ الولادة" required>
                        </div>
                        <div class="form-group col-md-6 text-right">
                            <label for="num_inscri"> رمز التسجيل <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="num_inscri" name="num_inscri"
                                placeholder="أدخل رمز التسجيل" required>
                        </div>
                    </div>
                    <div class="form-group text-right" dir="rtl">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="sexe">الجنس <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-2">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input order-2" type="radio" id="inlineCheckbox1"
                                        name="sexe" value="0">
                                    <label class="custom-control-label order-1" for="inlineCheckbox1">مذكر</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="inlineCheckbox2" name="sexe"
                                        value="1">
                                    <label class="custom-control-label" for="inlineCheckbox2">مؤنث</label>
                                </div>
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
                            '6:visIdx'
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
                            '6:visIdx'
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
                            '6:visIdx'
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