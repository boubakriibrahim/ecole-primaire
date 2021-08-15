<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\enseignant;

class EnsgController extends Controller
{
    
    public function EnsView () {
        $data['allData'] = enseignant::all();
        return view('backend.ENS.view_Ens', $data);
    }

    public function EnsAdd() {

        return view('backend.ENS.add_Ens');
    }

    public function EnsStore(Request $request) {

         $request->validate([
            "nom"=>"required",
            'prenom'=>'required',
            'sexe'=>'required',
            'password'=>'required',
            'login' => 'required',
        ]);
        enseignant::create($request->all());
       

        return back()->with('success',"enseignant ajouté avec succes");
    }
    
}
