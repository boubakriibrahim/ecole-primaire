@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6 order-sm-2">
                  <h1 class="m-0 float-right">تعيين مدرسين </h1>
                </div><!-- /.col -->


            <div class="col-sm-6 order-sm-1">
              <ol class="breadcrumb float-right float-sm-left">
                <li class="breadcrumb-item active order-sm">تعين مدرسين  </li>
                <li class="breadcrumb-item"><a href="#">الصفحة الرئيسية</a></li>
              </ol>
            </div><!-- /.col -->



          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <div class="row">
                    <h2 class="col-md-6 offset-md-2  order-md-2 text-right">تعيينات</h2>
                    {{-- <a href="{{ route('affEns.add') }}" class="btn btn-block bg-gradient-primary offset-md-1 col-md-2 order-md-1 mt-sm-2">إضافة تعين</a> --}}
                    <button type="button" class="btn btn-block bg-gradient-primary offset-md-1 col-md-2 order-md-1 mt-sm-2" data-toggle="modal" data-target="#exampleModal">
                        إضافة تعيين
                      </button>

                      <!-- Modal -->
                      <div class="modal fade " id="exampleModal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">إضافة تعيين</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action='{{ route('AffEns.store') }}' width=60%>
                                    @csrf

                                        <div class="row">
                                        <div class="col-xl-12 ms-auto">
                                            <div class="input-group p-3 col-md-12 " size=500px>
                                                <select class="form-select col-md-9 " id="inputGroupSelect01" name="enseignant_id" width=300 required>
                                                    <option selected>إختر</option>
                                                    @foreach ($enseignants as $key => $enseignant)
                                                    <option value="{{$enseignant->id}}">{{$enseignant->nom}} {{$enseignant->prenom}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <label class="input-group-text col-md-3" for="inputGroupSelect01"><span class="text-danger">*</span> إختر مدرس</label>

                                            </div>
                                        </div>
                                        </div>  
                                      <div class="row">
                                            <div class="input-group p-3 col-md-12  " >
                                                <select class="form-select col-md-9" id="inputGroupSelect02" name="classe_id">
                                                    <option selected>إختر</option>
                                                    @foreach ($classes as $key => $classe)
                                                    <option value="{{$classe->id}}">{{$classe->nom}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <label class="input-group-text col-md-3" for="inputGroupSelect02"><span class="text-danger">*</span> إختر قسم</label>

                                            </div>
                                       
                                      </div>
                                      <div class="row">
                                            <div class="input-group p-3 col-md-12 " size=100%>
                                                <select class="form-select col-md-9" id="inputGroupSelect03" name="matiere_id">
                                                    <option selected>إختر</option>
                                                    @foreach ($matieres as $key => $matiere)
                                                    <option value="{{$matiere->id}}">{{$matiere->libelle}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <label class="input-group-text col-md-3" for="inputGroupSelect03"><span class="text-danger">*</span> إختر مادة</label>

                                            </div>
                                       
                                      </div>
                            </div>
                            <div class="modal-footer">
                              <button type="reset" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                              <button type="submit" class="btn btn-primary">تأكيد</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>

                </div>
        </div>
            <!-- /.card-header -->
            <div class="p-3">
              <table id="example1" class="table table-bordered table-striped p-3">
                <thead>
                <tr>
                  <th width="5%">العدد</th>
                  <th>المعلم</th>
                  <th>القسم</th>
                  <th> المادة</th>
                  <th>السنة الدراسية</th>
                  <th width="25%">العملية</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($affEns as $key => $aff)
                <tr>
                <td>{{ $key+1 }}</td>
                  <td>{{ $aff->enseignant->nom }} {{ $aff->enseignant->prenom }}</td>
                  
                  <td>{{ $aff->classe->nom }}</td>
                  <td>{{ $aff->matiere->libelle }}</td>
                  <td>{{ $aff->classe->anneescolaire }}</td>
                  
                  <td>
                        {{-- <a href="" class="btn btn-info">تعديل</a> --}}

                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#model{{$aff->id}}">
                            تحديث
                          </button>



                        <a href="{{ route("AffEns.delete", $aff->id) }}" class="btn btn-danger" id="delete">حذف</a>
                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>



              @foreach ($affEns as $key => $aff)

              <!-- Modal -->
              <div class="modal fade" id="model{{$aff->id}}" tabindex="-1"  aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="examplemodel{{$aff->id}}">تحديث تعيين </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action='{{ route('AffEns.miseajour',$aff->id) }}' width=60%>
                            @csrf
                            <div class="row">
                                        
                                            <div class="input-group cl_md_12 p-3" size=100%>
                                                <select class="form-select p-3 col-md-9 " id="inputGroupSelect01" name="enseignant_id" width=300 required>
                                                    <option value="{{$aff->enseignant->id}}" selected required>{{$aff->enseignant->nom}} {{$aff->enseignant->prenom}}</option>
                                                    @foreach ($enseignants as $key => $enseignant)
                                                    <option value="{{$enseignant->id}}">{{$enseignant->nom}} {{$enseignant->prenom}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <label class="input-group-text col-md-3" for="inputGroupSelect01"> <span class="text-danger">*</span>إختر مدرس</label>

                                            </div>
                                        </div>
                                      <div class="row">
                                            <div class="input-group p-3 col-md-12 " size=100%>
                                                <select class="form-select col-md-9" id="inputGroupSelect02" name="classe_id">
                                                    <option value="{{$aff->classe->id}}" selected>{{$aff->classe->nom}}</option>
                                                    @foreach ($classes as $key => $classe)
                                                    <option value="{{$classe->id}}">{{$classe->nom}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <label class="input-group-text col-md-3" for="inputGroupSelect02"> <span class="text-danger">*</span>إختر قسم</label>

                                            </div>
                                       
                                      </div>
                                      <div class="row">
                                            <div class="input-group p-3 col-md-12 " size=100%>
                                                <select class="form-select col-md-9" id="inputGroupSelect03" name="matiere_id">
                                                    <option value="{{$aff->matiere->id}}" selected>{{$aff->matiere->libelle}}</option>
                                                    @foreach ($matieres as $key => $matiere)
                                                    <option value="{{$matiere->id}}">{{$matiere->libelle}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <label class="input-group-text col-md-3" for="inputGroupSelect03"> <span class="text-danger">*</span>إختر مادة</label>

                                            </div>
                                       
                                      </div>

                            


                    </div>
                    <div class="modal-footer">
                      <button type="reset" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                      <button type="submit" class="btn btn-primary">تأكيد</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>

              @endforeach



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
