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
                        <li class="breadcrumb-item active">عرض جدول أوقات</li>
                        <li class="breadcrumb-item"><a href="{{ route('emploi.view.enseignants') }}">التصرف في جداول
                                الأوقات</a></li>
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
                                <div class="col-md-4 h-100 order-md-3 text-center my-auto">
                                    <h2>
                                        عرض جدول أوقات {{ $type }}
                                    </h2>
                                </div>

                                <div class="col-md-4 order-md-2">
                                    <div class="row">
                                        <h2 class="text-success w-100 text-center">{{ $nom }} {{ $prenom }}</h2>
                                    </div>
                                    <div class="row">
                                        <h3 class="w-100 text-center">السنة الدراسية: {{ $anneescolaire }}</h3>
                                    </div>
                                </div>


                                <a href="{{ route('seance.view') }}" class="btn btn-block bg-gradient-primary offset-md-1 col-md-3 order-md-1
                                    h-100 m-auto">
                                    تغيير الحصص
                                </a>

                            </div>
                        </div>
                        <!-- /.card-header -->

                        <div class="p-3">
                            <div id="coursesTable"></div>
                            {{-- <button onclick="onChange()"
                                class="btn btn-primary w-75 mx-3">
                                تبديل الجدول الزمني
                            </button> --}}
                        </div>

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





<script>
    var courseList = [
        ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''],
        ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''],
        ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''],
        ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''],
        ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''],
        ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''],
    ];
    var week = window.innerWidth > 360 ? ['الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'] : ['واحد',
        'إثنان', 'ثلاثة', 'أربعة', 'خمسة', 'ستة'
    ];
    var day = new Date().getDay();
    var courseType = [
        [{
            index: '8:00',
            name: '8:30'
        }, 1],
        [{
            index: '8:30',
            name: '9:00'
        }, 1],
        [{
            index: '9:00',
            name: '9:30'
        }, 1],
        [{
            index: '9:30',
            name: '10:00'
        }, 1],
        [{
            index: '10:00',
            name: '10:30'
        }, 1],
        [{
            index: '10:30',
            name: '11:00'
        }, 1],
        [{
            index: '11:00',
            name: '11:30'
        }, 1],
        [{
            index: '11:30',
            name: '12:00'
        }, 1],
        [{
            index: '11:30',
            name: '12:00'
        }, 1],
        [{
            index: '12:00',
            name: '12:30'
        }, 1],
        [{
            index: '12:30',
            name: '13:00'
        }, 1],
        [{
            index: '13:00',
            name: '13:30'
        }, 1],
        [{
            index: '13:30',
            name: '14:00'
        }, 1],
        [{
            index: '14:00',
            name: '14:30'
        }, 1],
        [{
            index: '14:30',
            name: '15:00'
        }, 1],
        [{
            index: '15:00',
            name: '15:30'
        }, 1],
        [{
            index: '15:30',
            name: '16:00'
        }, 1],
        [{
            index: '16:30',
            name: '17:00'
        }, 1],
        [{
            index: '17:00',
            name: '17:30'
        }, 1],
        [{
            index: '17:30',
            name: '18:00'
        }, 1]
    ];
    // تجسيد (تهيئة جدول الحصص)
    var Timetable = new Timetables({
        el: '#coursesTable',
        timetables: courseList,
        week: week,
        timetableType: courseType,
        highlightWeek: day,
        /* gridOnClick: function (e) {
            alert(e.name + '  ' + e.week + ', NS' + e.index + 'درس, رئيس القسم' + e.length + 'مهرجان');
            console.log(e);
        }, */
        styles: {
            Gheight: 50
        }
    });

</script>

@endsection
