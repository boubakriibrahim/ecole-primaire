<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\session;

class ProfilController extends Controller
{
    public function AdminData(){
       // $data=['AdminInfo'=>user::where('id',1)->first()];
        //dd(session()->all());
        $session_id = session()->getId();
        $data=['session'=>session::where('id',$session_id)->first()];
       // $d=$data->fetch();
       foreach($data as $key => $sess){
        $user_id=$sess["user_id"];
       // dd($user_id);
        //dd($session_id);
        $data=['AdminInfo'=>user::where('id',$user_id)->first()];
    }
        return view('profil_card',$data);
    }

    
}
