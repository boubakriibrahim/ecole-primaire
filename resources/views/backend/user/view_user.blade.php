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
              <h2 class="col-sm-12 col-md-10">
                @if (url()->current() == 'http://localhost:8000/admin/view')
                Admins
                @elseif (url()->current() == 'http://localhost:8000/maitre/view')
                Maitres
                @else
                Elèves
                @endif
                </h2>

                @if (url()->current() == 'http://localhost:8000/admin/view')
                <a href="{{ route('admins.add') }}" class="btn btn-block bg-gradient-primary col-sm-12 col-md-2 mt-sm-2">
                    Ajouter Admin
                </a>
                @elseif (url()->current() == 'http://localhost:8000/maitre/view')
                <a href="{{ route('maitres.add') }}" class="btn btn-block bg-gradient-success col-sm-12 col-md-2 mt-sm-2">
                    Ajouter Maitre
                </a>
                @else
                <a href="{{ route('eleves.add') }}" class="btn btn-block bg-gradient-warning col-sm-12 col-md-2 mt-sm-2">
                    Ajouter Elève
                </a>
                @endif
            </div>
        </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%">NB</th>
                  <th>Nom</th>
                  <th>Email</th>
                  <th>Date de Création</th>
                  <th width="25%">Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach ($allData as $key => $user)
                @if ( (url()->current() == 'http://localhost:8000/admin/view' && ($user->role == 'admin' || $user->role == 'superadmin')) || (url()->current() == 'http://localhost:8000/maitre/view' && $user->role == 'maitre') || (url()->current() == 'http://localhost:8000/eleve/view' && $user->role == 'eleve') )
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->created_at->diffForHumans() }}</td>
                  <td>
                    @if (url()->current() == 'http://localhost:8000/admin/view')
                        <a href="{{ route("admin.edit", $user->id) }}" class="btn btn-info">Modifier</a>
                        <a href="{{ route("admin.delete", $user->id) }}" class="btn btn-danger" id="delete">Effacer</a>
                    @elseif (url()->current() == 'http://localhost:8000/maitre/view')
                        <a href="{{ route("maitre.edit", $user->id) }}" class="btn btn-info">Modifier</a>
                        <a href="{{ route("maitre.delete", $user->id) }}" class="btn btn-danger" id="delete">Effacer</a>
                    @else
                        <a href="{{ route("eleve.edit", $user->id) }}" class="btn btn-info">Modifier</a>
                        <a href="{{ route("eleve.delete", $user->id) }}" class="btn btn-danger" id="delete">Effacer</a>
                    @endif
                  </td>
                </tr>
                @endif
                @endforeach
                </tbody>
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
