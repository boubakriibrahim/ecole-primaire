<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;

class ClasseController extends Controller
{
    public function ClasseView () {
        $data['allData'] = Classe::all();
        return view('backend.view_classe', $data);
    }

    /* public function ClasseAdd() {

        return view('backend.ENS.add_Ens');
    } */

    public function ClasseStore(Request $request) {

         $request->validate([
            "niveau"=>"required",
            'nom'=>'required',
            'nb'=>'required',
            'anneescolaire'=>'required',
        ]);
        $data = new Classe();
        $data->niveau = $request->niveau;
        $data->nom = $request->nom;
        $data->nb = $request->nb;
        $data->anneescolaire = $request->anneescolaire;
        $data->save();


        /* enseignant::create($request->all()); */

        $notification = array(
            'message' => 'تم إضافة القسم بنجاح',
            'alert-type' => 'success'
        );


        return back()->with($notification);
    }



    public function ClasseUpdate(Request $request, $id) {

        $data = Classe::find($id);
        $data->niveau = $request->niveau;
        $data->nom = $request->nom;
        $data->nb = $request->nb;
        $data->anneescolaire = $request->anneescolaire;


        $data->save();

        $notification = array(
            'message' => 'تم تحديث القسم بنجاح',
            'alert-type' => 'info'
        );

        return redirect()->route('classe.view')->with($notification);
    }



    public function ClasseDelete($id) {

        $user = Classe::find($id);
        $user->delete();

        $notification = array(
            'message' => 'تم حذف القسم بنجاح',
            'alert-type' => 'info'
        );

        return redirect()->route('classe.view')->with($notification);
    }
}
