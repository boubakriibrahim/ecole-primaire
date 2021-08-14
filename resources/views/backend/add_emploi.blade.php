@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6 order-sm-2">
                  <h1 class="m-0 float-right">
                    @if ($type == "classes")
                    إضافة جدول أوقات قسم
                    @else
                    إضافة جدول أوقات مدرس
                    @endif
                </h1>
                </div><!-- /.col -->


            <div class="col-sm-6 order-sm-1 mt-sm-2">
              <ol class="breadcrumb float-right float-sm-left">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">الصفحة الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('emploi.view.enseignants') }}">التصرف في جداول الأوقات</a></li>
                <li class="breadcrumb-item active order-sm">
                    @if ($type == "classes")
                    إضافة جدول أوقات قسم
                    @else
                    إضافة جدول أوقات مدرس
                    @endif
                </li>
              </ol>
            </div><!-- /.col -->



          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
  </section>


  <section class="content">
    <div class="container-fluid">


  <div class="card card-info text-right" dir="rtl">
    <div class="card-header">
    @if ($type == "classes")
      <h2 class="card-title w-100">إضافة جدول أوقات قسم</h2>
    @else
    <h2 class="card-title w-100">إضافة جدول أوقات مدرس</h2>
    @endif
    </div>
    <!-- /.card-header -->
    @if(session()->has("success"))
    <div class="alert alert-success">
         <h3> {{session()->get("success")}}</h3>
    </div>
    @endif
<form method="post" action='@if ($type == 'enseignants')
{{ route('emploi.store.enseignant') }}
@else
{{ route('emploi.store.classe') }}
@endif' width=60%>
    @csrf
    <div class="card-body container">
        <div class="row mb-2">
            <div class="form-group col-md-6">
            @if ($type == "classes")
            <label for="selectemploiClasse">إختر قسم  <span class="text-danger">*</span></label>
            <select class="custom-select" id="selectemploiClasse" name="selectemploiClasse" required>
                <option selected>إختر قسم</option>
                @foreach ($allData as $key => $data)
                <option value="{{$data->id}}">{{$data->nom}}</option>
                @endforeach
            </select>
            @else
            <label for="selectemploiEns">إختر مدرس  <span class="text-danger">*</span></label>
            <select class="custom-select text-center" dir="rtl" id="selectemploiEns" name="selectemploiEns" required>
                <option selected>إختر مدرس</option>
                @foreach ($allData as $key => $data)
                <option value="{{$data->id}}">{{$data->nom}} {{$data->prenom}}</option>
                @endforeach
            </select>
            @endif
            </div>
            <div class="form-group col-md-6">
                <label for="anneescolaire">السنة الدراسية  <span class="text-danger">*</span></label>
                <input type="text" placeholder="السنة الدراسية" id="anneescolaire" name="anneescolaire" class="form-control" required>
            </div>

        </div>

        <div class="dropdown-divider"></div>
        <div class="row w-100 text-center mb-2">
            <div class="col-12">
                <h4>
                إضافة حصة
                </h4>
            </div>
        </div>


        <div class="row">
        <div class="form-group col-md-6">
            <label for="selectemploijour"> اليوم<span class="text-danger">*</span></label>
            <select class="custom-select text-center" dir="rtl" id="selectemploijour" name="selectemploijour" required>
                <option selected>إختر يوم</option>
                <option value="0">
                    الإثنين
                </option>
                <option value="1">
                    الثلاثاء
                </option>
                <option value="2">
                    الأربعاء
                </option>
                <option value="3">
                    الخميس
                </option>
                <option value="4">
                    الجمعة
                </option>
                <option value="5">
                    السبت
                </option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="selectemploiClasse">
                @if ($type == "enseignants")
                 القسم
                @else
                 المدرس
                @endif
                 <span class="text-danger">*</span></label>

                 @if ($type == "enseignants")
            <select class="custom-select" id="selectemploi" name="selectemploi" required>
                <option selected>إختر قسم</option>
                @foreach ($allData2 as $key => $data)
                <option value="{{$data->id}}">{{$data->nom}}</option>
                @endforeach
            </select>
            @else
            <select class="custom-select text-center" dir="rtl" id="selectemploi" name="selectemploi" required>
                <option selected>إختر مدرس</option>
                @foreach ($allData2 as $key => $data)
                <option value="{{$data->id}}">{{$data->nom}} {{$data->prenom}}</option>
                @endforeach
            </select>
            @endif
          </div>
        </div>
      <div class="row" dir="rtl">
        <div class="form-group col-md-6">
          <label for="heure_debut">ساعة البداية  <span class="text-danger">*</span></label>
          <input placeholder="Selected time" type="text" id="heure_debut" name="heure_debut" class="form-control timepicker" required>
        </div>
        <div class="form-group col-md-6">
          <label for="heure_fin">ساعة النهاية <span class="text-danger">*</span></label>
          <input placeholder="Selected time" type="text" id="heure_fin" name="heure_fin" class="form-control timepicker" required>
        </div>
      </div>
      <div class="row" dir="rtl">
        <div class="form-group col-md-6">
            <label for="selectmatiere">
                 المادة
                 <span class="text-danger">*</span></label>
            <select class="custom-select" id="selectmatiere" name="selectmatiere" required>
                <option selected>إختر مادة</option>
                @foreach ($matieres as $key => $matiere)
                <option value="{{$matiere->id}}">{{$matiere->libelle}} | مستوى ({{$matiere->niveau}})</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="selectsalle">
                القاعة
                <span class="text-danger">*</span></label>
           <select class="custom-select" id="selectsalle" name="selectsalle" required>
               <option selected>إختر قاعة</option>
               @foreach ($salles as $key => $salle)
               <option value="{{$salle->id}}">{{$salle->libelle}}</option>
               @endforeach
           </select>
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
