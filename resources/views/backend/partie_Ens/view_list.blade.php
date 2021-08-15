@extends('enseignant.enseignant_master')

@section('enseignant')
<div class="content-wrapper">
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6 order-sm-2">
                  <h1 class="m-0 float-right">التصرف في الأقسام </h1>
                </div><!-- /.col -->


            <div class="col-sm-6 order-sm-1">
              <ol class="breadcrumb float-right float-sm-left">
                <li class="breadcrumb-item active order-sm">التصرف في الأقسام</li>
                <li class="breadcrumb-item"><a href="#">الصفحة الرئيسية</a></li>
              </ol>
            </div><!-- /.col -->



          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
  </section>
  <section>
  <div class="d-flex justify-content-center  ">
        <div class="list-group shadow-lg p-3 mb-5 bg-info rounded-pill col-md-8 d-flex justify-content-center ">
           <div class="d-flex justify-content-center  ">
              <div class="col-md-6 bg-light ">
                  <div class="d-flex justify-content-center  ">
                       <div  class="list-group-item list-group-item-action active col-md-5 bg-light rounded-pill float-right" aria-current="true">
                        قائمة القسم  {{$classeInfo['nom']}}
                      </div>
                  </div>
             <div  class="list-group-item list-group-item-action rounded rounded-pill">
             <?php
            $nb= $classeInfo['nb'];?>

@for($i=0;$i<$nb;$i++)
            <div class=" flex-row-reverse">
            <div class="list-group-item list-group-item-action rounded-pill " tabindex="-1" aria-disabled="false">
            <select class="form-select form-select-sm rounded-pill bg-body w-100" aria-label=".form-select-sm example" name="nom{{$i}}">

            <option checked>تلميذ {{$i+1}}</option>
            @foreach($data1 as $data => $eleve)
                <option value="{{$eleve->id}}">{{$eleve->nom}} {{$eleve->prenom}}</option>
            @endforeach
</select>
            </div>
</div>

@endfor
</div>
    </div>
    </div>
    </div>
    </div>


</section>
</div>

@endsection