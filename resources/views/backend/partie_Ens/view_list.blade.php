@extends('admin.admin_master')

@section('admin')
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
                            <div class="list-group-item list-group-item-action active col-md-5 bg-light rounded-pill float-right"
                                aria-current="true">
                                قائمة القسم
                                {{$classe['nom']}}
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action rounded rounded-pill">
                            @php $nb=$classe['nb'];@endphp

                            <form method="post" action='{{ route('list.store',$classe['id']) }}' width=60%>
                                @csrf

                                @for($i=0;$i<$nb;$i++) <div class=" flex-row-reverse">
                                    <div class="list-group-item list-group-item-action rounded-pill " tabindex="-1"
                                        aria-disabled="false">
                                        <select class="form-select form-select-sm rounded-pill bg-body w-100"
                                            aria-label=".form-select-sm example" name="noms[]" required>

                                            <option value=0>تلميذ {{$i+1}}</option>
                                            @foreach($data1 as $data => $eleve)
                                            <option value="{{$eleve->id}}" required>{{$eleve->nom}} {{$eleve->prenom}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                        </div>

                        @endfor
                        <center><button type="reset" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                            <button type="submit" class="btn btn-primary">تأكيد</button></center>
                    </div>
                </div>
            </div>
        </div>
</div>


</section>
</div>

@endsection
