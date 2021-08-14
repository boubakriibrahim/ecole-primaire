<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class ProfilController extends Controller
{
    public function AdminData(){
        $data=['AdminInfo'=>user::where('id',session('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d'))->first()];
        //dd(session()->all());
        //dd($data);
        return view('profil_card',$data);
    }

    
}
