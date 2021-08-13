<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emploi;
use App\Models\Classe;
use App\Models\enseignant;

class EmploiController extends Controller
{
    public function EmploiView () {
        $emplois = Emploi::all();
        $enseignants = enseignant::orderBy('nom')->get();
        $classes = Classe::orderBy('nom')->get();
        return view('backend.view_emploi',compact('emplois','enseignants','classes'));
    }


    public function AffEnsStore(Request $request) {

         $request->validate([
            "classe_id"=>"required",
            'enseignant_id'=>'required',
            'matiere_id'=>'required',
        ]);
        $data = new aff_enseignant();
        $data->classe_id = $request->classe_id;
        $data->matiere_id = $request->matiere_id;
        $data->enseignant_id = $request->enseignant_id;
        $data->save();


        /* enseignant::create($request->all()); */

        $notification = array(
            'message' => 'تم إضافة التعيين بنجاح',
            'alert-type' => 'success'
        );


        return back()->with($notification);
    }



    public function AffEnsUpdate(Request $request, $id) {

        $data = aff_enseignant::find($id);
        $data->classe_id = $request->classe_id;
        $data->matiere_id = $request->matiere_id;
        $data->enseignant_id = $request->enseignant_id;


        $data->save();

        $notification = array(
            'message' => 'تم تحديث التعيين بنجاح',
            'alert-type' => 'info'
        );

        return back()->with($notification);
    }



    public function AffEnsDelete($id) {

        $user = aff_enseignant::find($id);
        $user->delete();

        $notification = array(
            'message' => 'تم حذف التعيين بنجاح',
            'alert-type' => 'info'
        );

        return back()->with($notification);
    }
}
