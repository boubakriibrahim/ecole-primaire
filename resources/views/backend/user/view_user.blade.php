@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Espace Utilisateurs</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Espace Utilisateurs</li>
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
              <h2 class="col-sm-12 col-md-10">Admins</h2>
              <a href="{{ route('users.add') }}" class="btn btn-block bg-gradient-primary col-sm-12 col-md-2 mt-sm-2">Ajouter Admin</a>
            </div>
        </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%">NB</th>
                  <th>Role</th>
                  <th>Nom</th>
                  <th>Email</th>
                  <th width="25%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($allData as $key => $user)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $user->role }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                        <a href="" class="btn btn-info">Modifier</a>
                        <a href="" class="btn btn-danger">Effacer</a>
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