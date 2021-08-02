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
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">Ajouter un Admin</h2>
    </div>
    <!-- /.card-header -->
<form method="post" action='{{ route('users.store') }}'> 
    @csrf   
    <div class="card-body">
        <div class="row">
        <div class="form-group col-md-6">
            <label for="exampleInputNom1">Nom <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrer le nom">
          </div>
        <div class="form-group col-md-6">
          <label for="exampleInputEmail1">Email adresse <span class="text-danger">*</span></label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Entrer l'email">
        </div>
        </div>
        <div class="row">
        <div class="form-group col-md-6">
          <label for="exampleInputPassword1">Mot de Passe <span class="text-danger">*</span></label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
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
        <button type="submit" class="btn btn-block btn-outline-success offset-md-2 col-md-6">Ajouter Admin</button>
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