<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function EnsView () {
        $data['allData'] = ecoleEns::all();
        return view('backend.ENS.view_Ens', $data);
    }

    public function EnsAdd() {

        return view('backend.ENS.add_Ens');
    }

    public function EnsStore(Request $request) {

        $validateDate = $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'sexe'=>'required',
            'password'=>'required',
            'login' => 'required|unique:users',
        ]);
        $data = new ecoleEns();
        $data->login = $request->login;
        $data->prenom = $request->prenom;
        $data->sexe = $request->sexe;
        $data->nom = $request->nom;
        $data->password = bcrypt($request->password);
        $data->save();

        return redirect()->route('ENS.view');
    }
}