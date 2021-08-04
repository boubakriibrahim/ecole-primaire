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
  <div class="
  @if (strpos(url()->current(), 'http://localhost:8000/admin/edit/') !== false)
  card card-primary
  @elseif (strpos(url()->current(), 'http://localhost:8000/maitre/edit/') !== false)
  card card-success
  @else
  card card-warning
  @endif
  ">
    <div class="card-header">
      <h2 class="card-title">
        @if (strpos(url()->current(), 'http://localhost:8000/admin/edit/') !== false)
        Modifier un Admin
        @elseif (strpos(url()->current(), 'http://localhost:8000/maitre/edit/') !== false)
        Modifier un Maitre
        @else
        Modifier un Elève
        @endif
      </h2>
    </div>
    <!-- /.card-header -->
<form method="post"
@if (strpos(url()->current(), 'http://localhost:8000/admin/edit/') !== false)
action='{{ route('admin.miseajour', $editData->id) }}'
@elseif (strpos(url()->current(), 'http://localhost:8000/maitre/edit/') !== false)
action='{{ route('maitre.miseajour', $editData->id) }}'
@else
action='{{ route('eleve.miseajour', $editData->id) }}'
@endif
>
    @csrf
    <div class="card-body">
        <div class="row">
        <div class="form-group col-md-6">
            <label for="exampleInputNom1">Nom <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrer le nom" value="{{ $editData->name }}">
          </div>
        <div class="form-group col-md-6">
          <label for="exampleInputEmail1">Email adresse <span class="text-danger">*</span></label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Entrer l'email" value="{{ $editData->email }}">
        </div>
        </div>
        <div class="row">
        <div class="form-group col-md-6">
          <label for="exampleInputFile">Image</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="image">
              <label class="custom-file-label" for="exampleInputFile">Sélectionner une image</label>
            </div>
            <div class="input-group-append">
              <span class="input-group-text">Télécharger</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
         <div class="row">
        <div class="col-6">
        <button type="reset" class="btn btn-block btn-outline-primary offset-md-2 col-md-6">Reinitialiser</button>
        </div>
        <div class="col-6">
        <button type="update" class="btn btn-block btn-outline-success offset-md-2 col-md-6">
            @if (strpos(url()->current(), 'http://localhost:8000/admin/edit/') !== false)
                Modifier Admin
                @elseif (strpos(url()->current(), 'http://localhost:8000/maitre/edit/') !== false)
                Modifier Maitre
                @else
                Modifier Elève
                @endif
        </button>
      </div>
        </div>
    </div>
</form>
  </div>
</div>
</div>
</section>
<!-- /.content-wrapper -->

@endsection
