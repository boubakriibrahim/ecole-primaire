<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seance;
use App\Models\Classe;
use App\Models\enseignant;
use App\Models\Matiere;
use App\Models\Salle;
use App\Models\aff_enseignant;

class SeanceController extends Controller
{
    public function SeanceView () {
        $data['allData'] = Seance::orderBy('jour')->orderBy('heure_debut')->get();
        $data['classes'] = Classe::all();
        $data['enseignants'] = enseignant::all();
        $data['matieres'] = Matiere::all();
        $data['salles'] = Salle::all();
        $data['aff_enseignants'] = aff_enseignant::all();

        return view('backend.view_seance', $data);
    }

    public function SeanceStore(Request $request) {

         $request->validate([
            'selectemploijour'=>'required',
            'anneescolaire'=>'required',
            'heure_debut'=>'required',
            'heure_fin'=>'required',
            'selectaffectation'=>'required',
            'selectsalle'=>'required',
        ]);


        $countClass = count($request->heure_debut);
    	for ($i=0; $i <$countClass ; $i++) {

            $data = new Seance();
            $data->jour = $request->selectemploijour[$i];
            $data->heure_debut = $request->heure_debut[$i];
            $data->heure_fin = $request->heure_fin[$i];
            $data->id_enseignant = $request->selectSeanceEnseignant[$i];
            $data->id_classe = $request->selectSeanceClasse[$i];
            $data->id_matiere = $request->selectmatiere[$i];
            $data->id_salle = $request->selectsalle[$i];
            $data->anneescolaire = $request->anneescolaire[$i];

            $data->save();

        }

        if ( $countClass == 1){
            $notification = array(
                'message' => 'تم إضافة الحصة بنجاح',
                'alert-type' => 'success'
            );
        }

        $notification = array(

            'message' => 'تم إضافة الحصص بنجاح',
            'alert-type' => 'success'
        );


        return back()->with($notification);
    }



    public function SeanceUpdate(Request $request, $id) {

        $data = Seance::find($id);
        $data->jour = $request->selectemploijour;
            $data->heure_debut = $request->heure_debut;
            $data->heure_fin = $request->heure_fin;
            $data->id_enseignant = $request->selectSeanceEnseignant;
            $data->id_classe = $request->selectSeanceClasse;
            $data->id_matiere = $request->selectmatiere;
            $data->id_salle = $request->selectsalle;
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
