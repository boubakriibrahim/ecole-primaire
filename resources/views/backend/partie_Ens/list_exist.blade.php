@extends('enseignant.enseignant_master')

@section('enseignant')
<div class="content-wrapper">
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6 order-sm-2">
                  <h1 class="m-0 float-right"> التصرف فالأقسام   </h1>
                </div><!-- /.col -->


            <div class="col-sm-6 order-sm-1">
              <ol class="breadcrumb float-right float-sm-left">
                <li class="breadcrumb-item active order-sm">التصرف فالأقسام   </li>
                <li class="breadcrumb-item"><a href="#">الصفحة الرئيسية</a></li>
              </ol>
            </div><!-- /.col -->



          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
  </section>


  <section class="content">
<div class="container-fluid">
    <div class="d-flex justify-content-center  ">
    <div class="position-absolute translate-middle">
       <div class="card text-dark bg-body rounded-pill  w-100 h-100">
       <div class="d-flex justify-content-center  ">
            <div class="card text-dark bg-light rounded-pill mb-3 w-50">
                <div class="card-body">
                    <p class="card-text text-right">قائمة موجودة مسبقاً! هل تريد تعديل ? </p>
                    <div class="row">
@php $id=$id;@endphp
                    <center>
                    <a href="{{ route("list.edit", $id) }}" class="btn btn-success rounded-pill" >نعم</a>

                        <a href="{{route("classes.view")}}" class="btn btn-danger rounded-pill " >لا </a>
                    </center>   


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