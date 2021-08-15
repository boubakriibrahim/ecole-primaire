@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">

  <section class="content">
    <div class="container-fluid">
      

  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">إضافة مدرس</h2>
    </div>
    <!-- /.card-header -->
    @if(session()->has("success"))
    <div class="alert alert-success">
         <h3> {{session()->get("success")}}</h3>
</div>
      @endif
<form method="post" action='{{ route('Ens.store') }}' width=60%> 
    @csrf   
    <div class="card-body">
        <div class="row">
        <div class="form-group col-md-6">
            <label for="nom"> الإسم<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="أدخل الإسم" required>
          </div>
          <div class="form-group col-md-6">
            <label for="prenom"> اللقب<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="أدخل اللقب" required>
          </div>
        </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label for="login">المعرف  <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="login" name="login" placeholder=" أدخل المعرف" required>
        </div>
        <div class="form-group col-md-6">
          <label for="password">كلمة السر <span class="text-danger">*</span></label>
          <input type="password" class="form-control" id="password" name="password" placeholder="أدخل كلمة السر" required>
        </div>
      </div>
      <div class="row">
      <div class="form-group col-md-6">
      <label for="sexe">الجنس <span class="text-danger">*</span></label>
      <div class="form-check form-check-inline" >
      
  <input class="form-check-input" type="radio" id="inlineCheckbox1" name="sexe" value="masculin" required>
  <label class="form-check-label" for="inlineCheckbox1">مذكر</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="inlineCheckbox2" name="sexe" value="feminin">
  <label class="form-check-label" for="inlineCheckbox2">مؤنث</label>
</div>
</div>
        <div class="form-group col-md-6">
          <label for="exampleInputFile">الصورة</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="image">
              <label class="custom-file-label" for="exampleInputFile">إختيار صورة</label>
            </div>
            <div class="input-group-append">
              <span class="input-group-text">تنزيل صورة</span>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
    <!-- /.card-body -->
    <div class="card-footer">
         <div class="row">
        <div class="col-6">
        <button type="reset" class="btn btn-block btn-outline-primary offset-md-2 col-md-6">إلغاء</button> 
        </div>
        <div class="col-6">         
        <button type="submit" class="btn btn-block btn-outline-success offset-md-2 col-md-6">تأكيد </button>
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