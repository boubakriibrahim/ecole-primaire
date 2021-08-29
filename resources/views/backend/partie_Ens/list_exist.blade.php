@extends('admin.admin_master')

@section('title')
<title>{{ $ecoleCreds->nom }} | التصرف في الأقسام</title>
@endsection
@section('admin')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 order-sm-2">
                    <h1 class="m-0 float-right"> التصرف في الأقسام </h1>
                </div><!-- /.col -->


                <div class="col-sm-6 order-sm-1">
                    <ol class="breadcrumb float-right float-sm-left">
                        <li class="breadcrumb-item active order-sm">التصرف في الأقسام </li>
                        <li class="breadcrumb-item"><a href="#">الصفحة الرئيسية</a></li>
                    </ol>
                </div><!-- /.col -->



            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="d-flex justify-content-center">
                <div class="position-absolute translate-middle">
                    <div class="card text-dark bg-body rounded-pill  w-100 h-100">
                        <div class="d-flex justify-content-center  ">
                            <div class="card text-dark bg-light rounded-pill mb-3 w-50">
                                <div class="card-body">
                                    <h2 class="card-text text-center">قائمة أسماء تم تعميرها مسبقاً ! هل تريد تغييرها؟
                                    </h2>
                                    <div class="row d-flex align-items-center">
                                        <div class="offset-md-4 col-md-4">
                                            <div class="row">
                                                <a href="{{ route("list.edit", $id) }}"
                                                    class="btn btn-success rounded-pill col-md-5 p-2">نعم</a>

                                                <a href="{{route("classes.view")}}"
                                                    class="btn btn-danger rounded-pill offset-md-1 col-md-5 p-2">لا
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection
