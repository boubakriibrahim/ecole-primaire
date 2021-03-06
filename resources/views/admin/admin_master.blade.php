<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
    <style>
        body {
            background: ;
        }

        .emp-profile {
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 0.5rem;
            background: #fff;
        }

        .profile-img {
            text-align: center;
        }

        .profile-img img {
            width: 70%;
            height: 100%;
        }

        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;
        }

        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }

        .profile-head h5 {
            color: #333;
        }

        .profile-head h6 {
            color: #0062cc;
        }

        .profile-edit-btn {
            border: none;
            border-radius: 1.5rem;
            width: 70%;
            padding: 2%;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
        }

        .proile-rating {
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }

        .proile-rating span {
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }

        .profile-head .nav-tabs {
            margin-bottom: 5%;
        }

        .profile-head .nav-tabs .nav-link {
            font-weight: 600;
            border: none;
        }

        .profile-head .nav-tabs .nav-link.active {
            border: none;
            border-bottom: 2px solid #0062cc;
        }

        .profile-work {
            padding: 14%;
            margin-top: -15%;
        }

        .profile-work p {
            font-size: 12px;
            color: #818182;
            font-weight: 600;
            margin-top: 10%;
        }

        .profile-work a {
            text-decoration: none;
            color: #495057;
            font-weight: 600;
            font-size: 14px;
        }

        .profile-work ul {
            list-style: none;
        }

        .profile-tab label {
            font-weight: 600;
            color: black;
        }

        .profile-tab p {
            font-weight: 600;
            color: #0062cc;
        }

    </style>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="{{ asset('css/google-font.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/toaster.css') }}">

{{--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}

    {{-- time picker --}}
    <link rel="stylesheet" href="{{ asset('css/timepicker-min.css')}}">


    <script>
        (function (global) {
            var Timetables = function (option) {
                this.el = document.querySelector(option.el);
                this.Timetables = option.timetables || [];
                this.week = option.week || [];
                this.merge = typeof option.merge === "boolean" ? option.merge : true;
                this.TimetableType = option.timetableType || [];
                this.leftHandText = [];
                this.highlightWeek = option.highlightWeek || "";
                this.gridOnClick = typeof option.gridOnClick === "function" ? option.gridOnClick : undefined;
                var styles = option.styles || {};
                this.leftHandWidth = styles.leftHandWidth || 40;
                this.Gheight = styles.Gheight || 48;
                this.defaultPalette = ["#f05261", "#48a8e4", "#ffd061", "#52db9a", "#70d3e6", "#52db9a",
                    "#3f51b5", "#f3d147", "#4adbc3", "#673ab7", "#f3db49", "#76bfcd", "#b495e1", "#ff9800",
                    "#8bc34a"
                ];
                this.palette = (typeof styles.palette === "boolean" && !styles.palett) ? false : (styles
                    .palette || []).concat(this.defaultPalette);
                this._init()
            };
            Timetables.prototype = {
                _init: function (option) {
                    var option = option || {};
                    var style = option.styles || {};
                    var gridOnClick = option.gridOnClick || this.gridOnClick;
                    var merge = typeof option.merge === "boolean" ? option.merge : this.merge;
                    var highlightWeek = option.highlightWeek || this.highlightWeek;
                    var leftHandText = this.leftHandText;
                    var leftHandWidth = style.leftHandWidth || this.leftHandWidth;
                    var Gheight = style.Gheight || this.Gheight;
                    var palette;
                    if (typeof style.palette === "boolean" && !style.palette) {
                        palette = false
                    } else {
                        palette = style.palette ? (style.palette || []).concat(this.defaultPalette) : this
                            .palette
                    }
                    var Timetables = option.timetables || this.Timetables;
                    var week = option.week || this.week;
                    var TimetableType = JSON.parse(JSON.stringify(option.timetableType || this
                        .TimetableType));
                    var deepCopyTimetableType = option.timetableType || this.TimetableType;
                    var TimetableTypeLength = TimetableType.length;
                    Timetables.forEach(function (item, index) {
                        if (item.length < TimetableTypeLength) {
                            for (var i = 0; i < TimetableTypeLength - item.length; i++) {
                                item.push("")
                            }
                        }
                    });
                    if (option.setNewOption) {
                        this.el.removeChild(this.el.childNodes[0])
                    }
                    var courseWrapper = document.createElement("div");
                    courseWrapper.id = "courseWrapper";
                    courseWrapper.style.position = "relative";
                    courseWrapper.style.paddingLeft = leftHandWidth + "px";
                    courseWrapper.style.border = "1px solid #dbdbdb";
                    TimetableType.forEach(function (item, index) {
                        item.unshift(index + 1)
                    });
                    var leftHand = document.createElement("div");
                    leftHand.className = "Courses-leftHand";
                    leftHand.style.position = "absolute";
                    leftHand.style.left = 0;
                    leftHand.style.top = 0;
                    leftHand.style.width = leftHandWidth + "px";
                    var timetable = Timetables[0].map(function (v, i) {
                        return []
                    });
                    timetable.forEach(function (item, index) {
                        Timetables.forEach(function (val, i) {
                            timetable[index].push(val[index])
                        })
                    });
                    var listMerge = [];
                    if (merge) {
                        Timetables.forEach(function (list, i) {
                            if (!listMerge[i]) {
                                listMerge[i] = []
                            }
                            list.forEach(function (item, index) {
                                if (!index) {
                                    return listMerge[i].push({
                                        name: item,
                                        length: 1
                                    })
                                }
                                if (item === (listMerge[i][index - 1] || {}).name && item) {
                                    var sameIndex = (listMerge[i][index - 1] || {})
                                        .sameIndex;
                                    if (sameIndex || sameIndex === 0) {
                                        listMerge[i][sameIndex].length++;
                                        return listMerge[i].push({
                                            name: item,
                                            length: 0,
                                            sameIndex: sameIndex
                                        })
                                    }
                                    listMerge[i][index - 1].length++;
                                    return listMerge[i].push({
                                        name: item,
                                        length: 0,
                                        sameIndex: index - 1
                                    })
                                } else {
                                    return listMerge[i].push({
                                        name: item,
                                        length: 1
                                    })
                                }
                            })
                        })
                    }
                    var head = document.createElement("div");
                    head.style.overflow = "hidden";
                    head.className = "Courses-head";
                    week.forEach(function (item, index) {
                        var weekItem = document.createElement("div");
                        var highlightClass = highlightWeek === (index + 1) ? "highlight-week " : "";
                        weekItem.className = highlightClass + "Courses-head-" + (index + 1);
                        weekItem.innerText = item;
                        weekItem.style.cssFloat = "left";
                        weekItem.style.boxSizing = "border-box";
                        weekItem.style.whiteSpace = "nowrap";
                        weekItem.style.width = 100 / week.length + "%";
                        head.appendChild(weekItem)
                    });
                    courseWrapper.appendChild(head);
                    var courseListContent = document.createElement("div");
                    courseListContent.className = "Courses-content";
                    var paletteIndex = 0;
                    timetable.forEach(function (values, index) {
                        var courseItems = document.createElement("ul");
                        courseItems.style.listStyle = "none";
                        courseItems.style.padding = "0px";
                        courseItems.style.margin = "0px";
                        courseItems.style.minHeight = Gheight + "px";
                        courseItems.className = "stage_" + ((TimetableType[0] || [])[0] || "none");
                        --(TimetableType[0] || [])[2];
                        if (!((TimetableType[0] || [])[2])) {
                            TimetableType.shift()
                        }
                        values.forEach(function (item, i) {
                            if (i > week.length - 1) {
                                return
                            }
                            var courseItem = document.createElement("li");
                            courseItem.style.cssFloat = "left";
                            courseItem.style.width = 100 / week.length + "%";
                            courseItem.style.height = Gheight + "px";
                            courseItem.style.boxSizing = "border-box";
                            courseItem.style.position = "relative";
                            if (merge && listMerge[i][index].length > 1) {
                                var mergeDom = document.createElement("span");
                                mergeDom.style.position = "absolute";
                                mergeDom.style.zIndex = 9;
                                mergeDom.style.width = "100%";
                                mergeDom.style.height = Gheight * listMerge[i][index]
                                    .length + "px";
                                mergeDom.style.left = 0;
                                mergeDom.style.top = 0;
                                if (palette) {
                                    mergeDom.style.backgroundColor = palette[paletteIndex];
                                    mergeDom.style.color = "#fff";
                                    paletteIndex++;
                                    if (paletteIndex > palette.length) {
                                        paletteIndex = 0
                                    }
                                }
                                mergeDom.innerText = listMerge[i][index].name;
                                mergeDom.className = "course-hasContent";
                                courseItem.appendChild(mergeDom)
                            } else {
                                if (merge && listMerge[i][index].length === 0) {
                                    courseItem.innerText = ""
                                } else {
                                    if (item && palette) {
                                        courseItem.style.backgroundColor = palette[
                                            paletteIndex];
                                        courseItem.style.color = "#fff";
                                        paletteIndex++;
                                        if (paletteIndex > palette.length) {
                                            paletteIndex = 0
                                        }
                                    } else {
                                        if (item) {
                                            courseItem.className = "course-hasContent"
                                        }
                                    }
                                    courseItem.innerText = item || ""
                                }
                            }
                            courseItem.onclick = function (e) {
                                var allList = document.querySelectorAll(
                                    ".Courses-content ul li").forEach(function (v,
                                    i) {
                                    v.classList.remove("grid-active")
                                });
                                this.className = "grid-active";
                                var info = {
                                    name: item,
                                    week: week[i],
                                    index: index + 1,
                                    length: merge ? listMerge[i][index].length : 1
                                };
                                gridOnClick && gridOnClick(info)
                            };
                            courseItems.appendChild(courseItem)
                        });
                        courseListContent.appendChild(courseItems)
                    });
                    courseWrapper.appendChild(courseListContent);
                    courseWrapper.appendChild(leftHand);
                    this.el.appendChild(courseWrapper);
                    var courseItemDomHeight = (document.querySelector(".stage_1 li") || document
                        .querySelector(".stage_none li")).offsetHeight;
                    var coursesHeadDomHeight = document.querySelector(".Courses-head").offsetHeight;
                    var leftHandTextDom = document.createElement("div");
                    leftHandTextDom.className = "left-hand-TextDom";
                    leftHandTextDom.style.height = coursesHeadDomHeight + "px";
                    leftHandTextDom.style.boxSizing = "border-box";
                    leftHandText.forEach(function (item) {
                        var leftHandTextItem = document.createElement("div");
                        leftHandTextItem.innerText = item;
                        leftHandTextDom.appendChild(leftHandTextItem)
                    });
                    leftHand.appendChild(leftHandTextDom);
                    deepCopyTimetableType.forEach(function (item, index) {
                        var handItem = document.createElement("div");
                        handItem.style.width = "100%";
                        handItem.style.height = courseItemDomHeight * item[1] + "px";
                        handItem.style.boxSizing = "border-box";
                        if (typeof item[0] === "object") {
                            for (var v in item[0]) {
                                var handItemInner = document.createElement("p");
                                handItemInner.innerText = item[0][v];
                                handItemInner.style.margin = "0px";
                                handItemInner.className = "left-hand-" + v;
                                handItem.appendChild(handItemInner)
                            }
                        } else {
                            handItem.innerText = item[0] || ""
                        }
                        handItem.className = "left-hand-" + (index + 1);
                        leftHand.appendChild(handItem)
                    })
                },
                setOption: function (option) {
                    (option || {}).setNewOption = true;
                    this._init(option)
                }
            };
            if (typeof module !== "undefined" && module.exports) {
                module.exports = Timetables
            }
            if (typeof define === "function") {
                define(function () {
                    return Timetables
                })
            }
            global.Timetables = Timetables
        })(this);

    </script>
    <style>
        #coursesTable {
            padding: 15px 10px;
        }

        .Courses-head {
            background-color: #edffff;
        }

        .Courses-head>div {
            text-align: center;
            font-size: 14px;
            line-height: 28px;
        }

        .left-hand-TextDom,
        .Courses-head {
            background-color: #f2f6f7;
        }

        .Courses-leftHand {
            background-color: #f2f6f7;
            font-size: 12px;
        }

        .Courses-leftHand .left-hand-index {
            color: #9c9c9c;
            margin-bottom: 4px !important;
        }

        .Courses-leftHand .left-hand-name {
            color: #666;
        }

        .Courses-leftHand p {
            text-align: center;
            font-weight: 900;
        }

        .Courses-head>div {
            border-left: none !important;
        }

        .Courses-leftHand>div {
            padding-top: 5px;
            border-bottom: 1px dashed rgb(219, 219, 219);
        }

        .Courses-leftHand>div:last-child {
            border-bottom: none !important;
        }

        .left-hand-TextDom,
        .Courses-head {
            border-bottom: 1px solid rgba(0, 0, 0, 0.1) !important;
        }

        .Courses-content>ul {
            border-bottom: 1px dashed rgb(219, 219, 219);
            box-sizing: border-box;
        }

        .Courses-content>ul:last-child {
            border-bottom: none !important;
        }

        .highlight-week {
            color: #02a9f5 !important;
        }

        .Courses-content li {
            text-align: center;
            color: #666666;
            font-size: 14px;
            line-height: 50px;
        }

        .Courses-content li span {
            padding: 6px 2px;
            box-sizing: border-box;
            line-height: 18px;
            border-radius: 4px;
            white-space: normal;
            word-break: break-all;
            cursor: pointer;
        }

        .grid-active {
            z-index: 9999;
        }

        .grid-active span {
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
        }

    </style>
    <script src="{{ asset('js/timepicker.min.js') }}"></script>


</head>

<body class="hold-transition layout-top-nav">
    {{-- <div class="wrapper"> --}}

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake img-circle" src="{{asset('images/uploads/'.$ecoleCreds->ecole_photo_path)}}" alt="Logo" height="60" width="60">
    </div>

    <!-- Navbar -->
    @include('admin.body.header')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    {{-- @include('admin.body.sidebar') --}}

    <!-- Content Wrapper. Contains page content -->
    @yield('admin')
    <!-- /.content-wrapper -->
    @include('admin.body.footer')

    {{-- </div> --}}
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('backend/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('backend/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('backend/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('backend/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('backend/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('backend/dist/js/demo.js') }}"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    @if (url()->current() == 'http://localhost:8000/home')
    <script src="{{ asset('backend/dist/js/pages/dashboard.js') }}"></script>
    @endif

    <script src="{{  asset('js/sweetalert.js') }}"></script>
    @yield('sweetalert')

    <script type="text/javascript" src="{{  asset('js/toastr.min.js') }}"></script>



    {{-- time picker --}}
    <script src="{{ asset('js/timepicker.min.js')}}"></script>

    <script>
        $('.timepicker').timepicker({
            timeFormat: 'HH:mm',
            interval: 30,
            minTime: '08:00',
            maxTime: '18:00',
            defaultTime: false,
            startTime: '08:00',
            dynamic: true,
            dropdown: true,
            scrollbar: false,
            zindex: 1500
        });

    </script>


    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type') }}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif

    </script>

    @yield('datatable')


    {{-- Dark Mode --}}
    <script>
        let darkMode = localStorage.getItem('darkMode');
        const darkModeToggle = document.querySelector('#dark-mode-toggle');

        const enableDarkMode = () => {
            $('body').toggleClass('dark-mode');
            localStorage.setItem("darkMode", "enabled");
        }
        const disableDarkMode = () => {
            $('body').toggleClass('dark-mode');
            localStorage.setItem("darkMode", null);
        }

        if(darkMode === "enabled") {
            enableDarkMode();
        }

        darkModeToggle.addEventListener('click', () => {

            darkMode = localStorage.getItem('darkMode');
            if (darkMode !== "enabled"){
                enableDarkMode();
            } else {
                disableDarkMode();
            }

        })
    </script>

</body>

</html>
