<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function AdminData(){

        $data['user'] = Auth::user();

        return view('profil_card')->with($data);
    }


}
