<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Classe;
use App\Models\eleve;
use App\Models\Salle;
use App\Models\note;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $profs = DB::table('users')->where('role', 'enseignant')->get();
        $eleves = Eleve::get();
        $classes = Classe::get();
        $salles = Salle::get();


        $notesMatieres = DB::table('notes')->join('matieres', 'matieres.id', '=', 'notes.matiere_id')->select('notes.note', 'matieres.niveau', 'matieres.libelle')->get();

        $notesClasses = DB::table('notes')->join('classes', 'classes.id', '=', 'notes.classe_id')->select('notes.note', 'classes.nom', 'classes.nb', 'classes.anneescolaire')->get();

        $notesEleves = DB::table('notes')->join('eleves', 'eleves.id', '=', 'notes.eleve_id')->select('notes.note', 'eleves.nom', 'eleves.prenom', 'eleves.sexe', 'eleves.date_naissance')->get();

        /* $matieres = array();
        $niveaus = array();

        foreach($allAffs as $key => $affectation){
            if(!in_array($affectation->libelle, $matieres, true)){
                array_push($matieres, $affectation->libelle);
                array_push($niveaus, $affectation->niveau);
            }
        } */
        /* dd($notesMatieres, $notesClasses, $notesEleves); */
        return view('admin.index', compact('profs', 'eleves', 'classes', 'salles', 'notesMatieres', 'notesClasses', 'notesEleves'));
    }
}
