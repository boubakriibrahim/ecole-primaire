<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\aff_enseignant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    public function AdminData(){

        $data['user'] = Auth::user();
        $allAffs = DB::table('users')
        ->where('id_enseignant', Auth::user()->id_enseignant)
        ->join('aff_enseignants', 'users.id_enseignant', '=', 'aff_enseignants.enseignant_id')
        ->join('classes', 'classes.id', '=', 'aff_enseignants.classe_id')
        ->join('matieres', 'matieres.id', '=', 'aff_enseignants.matiere_id')
        ->select('classes.nom', 'classes.niveau', 'matieres.libelle')
        ->get();

        $liste = array();

        foreach($allAffs as $key => $affectation){
            if(!in_array($affectation->nom, $liste, true)){
                array_push($liste, $affectation->nom);
            }
        }

        $data['affEnsclasses'] = $liste;

        $matieres = array();
        $niveaus = array();

        foreach($allAffs as $key => $affectation){
            if(!in_array($affectation->libelle, $matieres, true)){
                array_push($matieres, $affectation->libelle);
                array_push($niveaus, $affectation->niveau);
            }
        }

        $data['affEnsMatieres'] = $matieres;
        $data['affEnsNiveau'] = $niveaus;

        return view('profil_card')->with($data);
    }


}
