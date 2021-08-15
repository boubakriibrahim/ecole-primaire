@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>التصرف في المدرسين</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
            <li class="breadcrumb-item" active>التصرف في المدرسين</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <div class="row">
              <h2 class="col-sm-12 col-md-10">المدرسين</h2>
              <a href="{{ route('Ens.add') }}" class="btn btn-block bg-gradient-primary col-sm-12 col-md-2 mt-sm-2">إضافة مدرس</a>
            </div>
        </div>
            <!-- /.card-header -->
            <div >
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%">العدد</th>
                  <th>الاسم</th>
                  <th>اللقب</th>
                  <th>الجنس</th>
                  <th width="25%">العملية</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($allData as $key => $user)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $user->nom }}</td>
                  <td>{{ $user->prenom }}</td>
                  <td>{{ $user->sexe }}</td>
                  <td>
                        <a href="" class="btn btn-info">تعديل</a>
                        <a href="" class="btn btn-danger">حذف</a>
                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
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