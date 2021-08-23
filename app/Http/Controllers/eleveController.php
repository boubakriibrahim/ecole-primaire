<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\eleve;
use App\Models\Classe;
use Illuminate\Support\Facades\DB;

class eleveController extends Controller
{
    public function eleveView () {
        $data['allData'] = eleve::all();
        return view('backend.partie_Ens.view_eleve', $data);
    }


    public function eleveStore(Request $request) {

         $request->validate([
            "nom"=>"required",
            'prenom'=>'required',
            'sexe'=>'required',
            'num_inscri'=>'required',
            'date_naissance'=>'required',
        ]);

        $data = new eleve();
        $data->nom = $request->nom;
        $data->prenom = $request->prenom;
        $data->date_naissance = $request->date_naissance;
        $data->num_inscri = $request->num_inscri;
        $data->sexe = $request->sexe;
        $data->save();


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


    public function eleveNotes($id){

        $eleve = eleve::find($id);
        $classeid = DB::table('affc_eleves')->where('eleve_id', $eleve->id)->value('classe_id');

        if ($classeid == NULL){
            $notification = array(
                'message' => 'يجب التعيين أولا',
                'alert-type' => 'error'
            );

            return back()->with($notification);
        }

        $classe = Classe::find($classeid);
        $niveau = $classe->niveau;
        $matieres = DB::table('matieres')->where('niveau', $niveau)->get();

        $notes = DB::table('notes')->where('eleve_id', $eleve->id)->get();

        $table = array();
        $somme = 0;
        $nb = 0;
        foreach($matieres as $key => $matiere){

            $existe = DB::table('notes')->where('eleve_id', $eleve->id)->where('matiere_id', $matiere->id)->count();

            if($existe == 0){
                array_push($table, [$matiere->libelle, NULL]);
            } else {
                $note = DB::table('notes')->where('eleve_id', $eleve->id)->where('matiere_id', $matiere->id)->value('note');
                array_push($table, [$matiere->libelle, $note]);
                $somme += $note;
                $nb++;
            }
        }

        if ($nb != 0){
            $moyenne = $somme / $nb;
        } else {
            $moyenne = 0;
        }

        return view('backend.eleve-notes', compact('eleve', 'classe', 'table', 'moyenne', 'somme', 'nb'));
    }
}
