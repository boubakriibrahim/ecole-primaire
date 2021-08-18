<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\classe;
use App\Models\eleve;
use App\Models\abscence;
use App\Models\aff_enseignant;
use App\Models\affc_eleve;
use App\Models\Seance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class abscenceController extends Controller
{
    public function abscenceView($id){
        $classe=["classe"=>classe::where("id",$id)->first()];
        $eleves_aff=affc_eleve::where('classe_id',$id)->get();
        $seances = DB::table('seances')->where('id_enseignant', Auth::user()->id_enseignant)->where('id_classe', $id)->join('matieres', 'matieres.id', '=', 'seances.id_matiere')->get();
        return view('backend.partie_Ens.abscenceView',compact('classe','eleves_aff','seances'));
    }


    public function abscenceStore(Request $request,$id){
            $id_eleves=DB::table("affc_eleves")->where("classe_id",$id)->pluck("eleve_id");

            /* $request->validate([
                'seance_id'=>'required',
                'eleve_id'=>'required',
                'date'=>'required',
                'etat'=>'required',
            ]); */

            $eleves_aff=affc_eleve::where('classe_id',$id)->get();

            foreach($eleves_aff as $data => $aff) {

                $data = new abscence();
                $data->seance_id = $request->seance;
                $data->eleve_id = $aff->eleve_id;
                $data->date = $request->date;
                $data->etat = $request['etat'.$aff->id][0];

                $data->save();

            }

            $notification = array(
                'message' => '  تم تسجيل الغيابات بنجاح   ',
                'alert-type' => 'success'
            );


        return redirect()->route('classes.view')->with($notification);


    }
}
