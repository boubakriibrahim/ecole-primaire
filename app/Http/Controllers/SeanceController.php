<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seance;
use App\Models\Classe;
use App\Models\enseignant;
use App\Models\Matiere;
use App\Models\Salle;

class SeanceController extends Controller
{
    public function SeanceView () {
        $data['allData'] = Seance::orderBy('jour')->orderBy('heure_debut')->get();
        $data['classes'] = Classe::all();
        $data['enseignants'] = enseignant::all();
        $data['matieres'] = Matiere::all();
        $data['salles'] = Salle::all();

        return view('backend.view_seance', $data);
    }

    public function SeanceStore(Request $request) {

         $request->validate([
            'selectemploijour'=>'required',
            'anneescolaire'=>'required',
            'selectSeanceClasse'=>'required',
            'selectSeanceEnseignant'=>'required',
            'heure_debut'=>'required',
            'heure_fin'=>'required',
            'selectmatiere'=>'required',
            'selectsalle'=>'required',
        ]);
        $data = new Seance();
        $data->libelle = $request->libelle;
        $data->save();

        $notification = array(
            'message' => 'تم إضافة الحصة بنجاح',
            'alert-type' => 'success'
        );


        return back()->with($notification);
    }



    public function SeanceUpdate(Request $request, $id) {

        $data = Seance::find($id);
        $data->jour = $request->selectemploijour;
        $data->heure_debut = $request->selectemploijour;
        $data->heure_fin = $request->selectemploijour;
        $data->id_enseignant = $request->selectemploijour;
        $data->id_classe = $request->selectemploijour;
        $data->id_matiere = $request->selectemploijour;
        $data->id_salle = $request->selectemploijour;
        $data->anneescolaire = $request->anneescolaire;

        $data->save();

        $notification = array(
            'message' => 'تم تحديث الحصة بنجاح',
            'alert-type' => 'info'
        );

        return redirect()->route('seance.view')->with($notification);
    }



    public function SeanceDelete($id) {

        $seance = Seance::find($id);
        $seance->delete();

        $notification = array(
            'message' => 'تم حذف الحصة بنجاح',
            'alert-type' => 'info'
        );

        return redirect()->route('seance.view')->with($notification);
    }
}
