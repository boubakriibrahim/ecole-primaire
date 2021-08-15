<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\enseignant;

class ensgController extends Controller
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
        $data = new enseignant();
        $data->nom = $request->nom;
        $data->prenom = $request->prenom;
        $data->sexe = $request->sexe;
        $data->password = bcrypt($request->password);
        $data->login = $request->login;
        $data->save();


        /* enseignant::create($request->all()); */

        $notification = array(
            'message' => 'تم إضافة المدرس بنجاح',
            'alert-type' => 'success'
        );


        return back()->with($notification);
    }



    public function EnsUpdate(Request $request, $id) {

        $data = enseignant::find($id);
        $data->nom = $request->nom;
        $data->prenom = $request->prenom;
        $data->login = $request->login;
        $data->sexe = $request->sexe;


        $data->save();

        $notification = array(
            'message' => 'تم تحديث المدرس بنجاح',
            'alert-type' => 'info'
        );

        return redirect()->route('Ens.view')->with($notification);
    }



    public function EnsDelete($id) {

        $user = enseignant::find($id);
        $user->delete();

        $notification = array(
            'message' => 'تم حذف المدرس بنجاح',
            'alert-type' => 'info'
        );

        return redirect()->route('Ens.view')->with($notification);
    }
}
