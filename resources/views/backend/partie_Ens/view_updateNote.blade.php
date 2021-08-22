@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6 order-sm-2">
               <h1 class="m-0 float-right">  إسناد أعداد </h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6 order-sm-1">
               <ol class="breadcrumb float-right float-sm-left">
                  <li class="breadcrumb-item active order-sm"> إسناد أعداد  </li>
                  <li class="breadcrumb-item"><a href="#">الصفحة الرئيسية</a></li>
               </ol>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </section>
   
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <h2 class="col-md-6 offset-md-2  order-md-2 text-right">  القسم {{$classe["classe"]["nom"]}} </h1></h2>
                        
                     </div>
                     <!-- Modal -->
                  </div>
                  <!-- /.card-header -->
                  <form method="post" action='{{route('note.miseajour',$classe["classe"]["id"])}}' >
                     @csrf
                    
                     <div >
                        <table id="example1" class="table table-bordered  text-right p-3">
                           <thead>
                              <tr>
                                  @foreach($matieres as $key => $matiere)
                                 <th >{{$matiere->libelle}} </th>
                                 @endforeach
                                 <th>اللقب</th>
                                 <th>الاسم</th>
                                 <th width="5%">العدد</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($eleves_aff as $data => $aff)
                              <tr>
                              
                                     @foreach($matieres as $key =>$matiere)
                                     <td >
                                         @php $val="false" ; @endphp
                                         
                                     @foreach($notes as $key =>$note)
                                       @if($note->matiere==$matiere && $note->eleve==$aff->eleve) 
                                       @php $val=$note->note; @endphp
                                       @endif
                                        @endforeach
                                         
                                     <div class="d-flex justify-content-center  ">
                                     <div class="row" dir="rtl">
                                                        <div class="form-group align-center text-right">
                                                            
                                                            <input type="number" class="form-control" id="niveau"
                                                                name="{{$matiere->libelle}}[]" value="{{$val}}" placeholder="العدد " min="0" max="20"
                                                        >
                                                        </div>
                                    </div>
                                    </div>
                                    
                                    </td>
                                    @endforeach
                                    
                                      
                                   
                                 <td> {{ $aff->eleve->prenom }}</td>
                                 <td>{{ $aff->eleve->nom }} </td>
                                 <td>{{ $data+1 }} </td>
                                 
                                 
                              </tr>
                              @endforeach
                              
                           </tbody>
                        </table>
                     </div>
                     <center><button type="reset" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-primary">تأكيد</button>
                     </center>
                  </form>
               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection