<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\eleve;

class eleveController extends Controller
{
    public function eleveView () {
        $data['allData'] = eleve::all();
        return view('backend.partie_Ens.view_eleve', $data);
    }

    /* public function ClasseAdd() {

        return view('backend.ENS.add_Ens');
    } */

    public function eleveStore(Request $request) {

         $request->validate([
            "nom"=>"required",
            'prenom'=>'required',
            'sexe'=>'required',
            'num_inscri'=>'required',
            'date_naissance'=>'required',
        ]);
       // eleve::create($request->all());
        $data = new eleve();
        $data->nom = $request->nom;
        $data->prenom = $request->prenom;
        $data->date_naissance = $request->date_naissance;
        $data->num_inscri = $request->num_inscri;
        $data->sexe = $request->sexe;
        $data->save();


        /* enseignant::create($request->all()); */

        $notification = array(
            'message' => 'تم إضافةالتلميذ  بنجاح',
            'alert-type' => 'success'
        );


        return back()->with($notification);
    }



    public function eleveUpdate(Request $request, $id) {

        $data = eleve::find($id);
        $data->nom = $request->nom;
        $data->prenom = $request->prenom;
        $data->date_naissance = $request->date_naissance;
        $data->num_inscri = $request->num_inscri;
        $data->sexe = $request->sexe;
        


        $data->save();

        $notification = array(
            'message' => 'تم تحديث التلميذ بنجاح',
            'alert-type' => 'info'
        );

        return redirect()->route('eleve.view')->with($notification);
    }



    public function eleveDelete($id) {

        $user = eleve::find($id);
        $user->delete();

        $notification = array(
            'message' => 'تم حذف التلميذ بنجاح',
            'alert-type' => 'info'
        );

        return redirect()->route('eleve.view')->with($notification);
    }
}
