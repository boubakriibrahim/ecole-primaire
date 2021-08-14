<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emploi;
use App\Models\Seance;
use App\Models\Classe;
use App\Models\enseignant;
use App\Models\Matiere;
use App\Models\Salle;

class EmploiController extends Controller
{
    public function EmploiClassesView () {
        $type = "classes";
        $emplois = Emploi::all();
        $seances = Seance::all();
        $data = Classe::orderBy('nom')->get();
        return view('backend.view_emploi',compact('emplois','seances','data','type'));
    }


    public function EmploiEnseignantsView () {
        $type = "enseignants";
        $emplois = Emploi::all();
        $seances = Seance::all();
        $data = enseignant::orderBy('nom')->get();
        return view('backend.view_emploi',compact('emplois','seances','data','type'));
    }

    public function EmploiSelect(Request $request) {
        $type = $request->selectemploi;

        if ($type == "classes") {
            return Redirect("/Emplois/view/classes");
        } else {
            return Redirect("/Emplois/view/enseignants");
        }
    }

    public function EmploiClassesAdd() {

        $type = "classes";
        $allData = Classe::orderBy('nom')->get();
        $allData2 = enseignant::orderBy('nom')->get();
        $matieres = Matiere::all();
        $salles = Salle::all();

        return view('backend.add_emploi',compact('allData', 'allData2', 'type', 'matieres', 'salles'));
    }

    public function EmploiEnseignantsAdd() {

        $type = "enseignants";
        $allData = enseignant::orderBy('nom')->get();
        $allData2 = Classe::orderBy('nom')->get();
        $matieres = Matiere::all();
        $salles = Salle::all();

        return view('backend.add_emploi',compact('allData', 'allData2', 'type', 'matieres', 'salles'));
    }


    /* public function EmploiStore(Request $request) {

         $request->validate([
            "id_classe"=>"required",
            'id_enseignant'=>'required',
            'anneescolaire'=>'required',
        ]);
        $data = new aff_enseignant();
        $data->classe_id = $request->classe_id;
        $data->matiere_id = $request->matiere_id;
        $data->enseignant_id = $request->enseignant_id;
        $data->save();


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
    } */
}
