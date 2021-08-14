@extends('admin.admin_master')

@section('admin')


 





<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container emp-profile info-mode">
                <div class="col-md-2 float-right">
                    <button type="button" class=" profile-edit-btn   " data-toggle="modal" data-target="#Modal">
                    تحديث المعطيات 
                    </button>
                </div>  
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                <input type="file" name="file"/>
                                تغيير الصورة
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                    {{$AdminInfo['name']}}
                                    </h5>
                                    <h6>
                                    مدير المدرسة     
                                    </h6>
                                    
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">المعلومات الشخصية</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>{{$AdminInfo['id']}}</p>
                                            </div> 
                                            <div class="col-md-6" color=black>
                                                <label>المعرف</label>
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                             <div class="col-md-6">
                                                <p>{{$AdminInfo['name']}}</p>
                                            </div>                                        
                                            <div class="col-md-6">
                                                <label>الإسم</label>
                                            </div>

                                                                                   
                                            
                                            
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6">
                                                <p>{{$AdminInfo['email']}}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label>البريد الإلكتروني</label>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="row">
                                        <div class="col-md-6">
                                                <p>مدير</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label>المهنة</label>
                                            </div>
                                            
                                        </div>
                            </div>
                            
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
 
<div class="modal fade" id="Modal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="false">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">إضافة قسم</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <form method="POST" action='{{ route('admin.miseajour',$AdminInfo["id"]) }}'>
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="nom" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="name" class="col-md-3 col-form-label text-md-right float-right"><span class="text-danger">*</span>{{ __('الإسم الكامل') }}</label>

                        </div>

                        <div class="form-group row">

                            <div class="col-md-9">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('name') }}" required  autofocus>



                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="email" class="col-md-3 col-form-label text-md-right float-right"><span class="text-danger">*</span>{{ __('البريد الإلكتروني') }}</label>

                        </div>

                        <div class="form-group row">

                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="password" class="col-md-2 col-form-label text-md-right float-right"><span class="text-danger">*</span>{{ __('الرمز السري') }}</label>

                        </div>

                        <div class="form-group row">

                            <div class="col-md-9">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirm" required autocomplete="new-password">
                            </div>
                            <label for="password_confirm" class="col-md-3 col-form-label text-md-right float-right"><span class="text-danger">*</span>{{ __(' تأكيد الرمز السري ') }}</label>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('تحديث') }}
                                </button>
                            </div>
                        </div>
                    </form>
                          </div>
                        </div>
                      </div>

                </div> 
</div>         
@endsection 