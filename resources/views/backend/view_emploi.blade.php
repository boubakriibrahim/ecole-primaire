@extends('admin.admin_master')

@section('admin')
<div id="coursesTable"></div>
<button onclick="onChange()"
        style="background-color: #00a2ae; color: #fff; padding: 5px 10px; border-radius: 4px;border: none">
        تبديل الجدول الزمني
</button>
<script>
  var courseList = [
    ['Anglais universitaire (Ⅳ)@10203', 'Anglais universitaire (Ⅳ)@10203', '', '', '', '', 'Anglais universitaire (Ⅳ)@10203', 'Anglais universitaire (Ⅳ)@10203', '', '', '', 'Anglais universitaire (Ⅳ)@10203'],
    ['', '', 'Signal et système@11302', 'Signal et système@11302', 'Signal et système@11302', 'Signal et système@11302', '', '', '', '', '', ''],
    ['francais', 'francais', 'francais', 'francais', '', '', 'francais', 'francais', '', '', '', ''],
    ['', '', '', '', 'arabe', 'arabe', '', '', '', 'arabe', 'arabe', ''],
    ['', '', 'eng', 'eng', '', '', '', '', 'eng', 'eng', '', ''],
  ];
  var week = window.innerWidth > 360 ? ['الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة'] :
    ['一', '二', '三', '四', '五'];
  var day = new Date().getDay();
  var courseType = [
    [{index: '1', name: '8:30'}, 1],
    [{index: '2', name: '9:30'}, 1],
    [{index: '3', name: '10:30'}, 1],
    [{index: '4', name: '11:30'}, 1],
    [{index: '5', name: '12:30'}, 1],
    [{index: '6', name: '14:30'}, 1],
    [{index: '7', name: '15:30'}, 1],
    [{index: '8', name: '16:30'}, 1],
    [{index: '9', name: '17:30'}, 1],
    [{index: '10', name: '18:30'}, 1],
    [{index: '11', name: '19:30'}, 1],
    [{index: '12', name: '20:30'}, 1]
  ];
  // 实例化(初始化课表)
  var Timetable = new Timetables({
    el: '#coursesTable',
    timetables: courseList,
    week: week,
    timetableType: courseType,
    highlightWeek: day,
    gridOnClick: function (e) {
      alert(e.name + '  ' + e.week + ', NS' + e.index + 'درس, رئيس القسم' + e.length + 'مهرجان');
      console.log(e);
    },
    styles: {
      Gheight: 50
    }
  });

  //تبديل الجدول الزمني
  function onChange() {
    var courseListOther = [
      ['', '', '', '', 'الاجمالي @ 14208', 'الاجمالي @ 14208', '', '', '', 'الاجمالي @ 14208', '', ''],
      ['كلية اللغة الإنجليزية (Ⅳ) @ 10203', 'كلية اللغة الإنجليزية (Ⅳ) @ 10203', '', '', 'كلية اللغة الإنجليزية (Ⅳ) @ 10203', 'كلية اللغة الإنجليزية (Ⅳ) @ 10203', '', '', '', '', '', ''],
      ['', '', 'الإشارة والنظام @ 11302', 'الإشارة والنظام @ 11302', '', '', 'الإشارة والنظام @ 11302', 'الإشارة والنظام @ 11302', '', '', '', ''],
      ['الموقف والسياسة (Ⅳ) @ 15208', 'الموقف والسياسة (Ⅳ) @ 15208', '', '', 'الموقف والسياسة (Ⅳ) @ 15208', 'الموقف والسياسة (Ⅳ) @ 15208', '', '', '', 'الموقف والسياسة (Ⅳ) @ 15208', 'الموقف والسياسة (Ⅳ) @ 15208', ''],
      ['التربية البدنية الجامعية (IV)', 'التربية البدنية الجامعية (IV)', '', '', 'التربية البدنية الجامعية (IV)', 'التربية البدنية الجامعية (IV)', '', '', 'التربية البدنية الجامعية (IV)', 'التربية البدنية الجامعية (IV)', '', ''],
    ];

    Timetable.setOption({
      timetables: courseListOther,
      week: ['واحد', 'اثنين', 'ثلاثة', 'أربعة', 'الخمسات', 'ستة', 'يوم'],
      styles: {
        palette: ['#dedcda', '#ff4081']
      },
      timetableType: courseType,
      gridOnClick: function (e) {
        console.log(e);
      }
    });
  };

</script>

@endsection
