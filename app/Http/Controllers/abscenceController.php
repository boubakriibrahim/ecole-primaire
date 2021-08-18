<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\classe;
use App\Models\eleve;
use App\Models\abscence;
use App\Models\aff_enseignant;
use App\Models\affc_eleve;
use Illuminate\Support\Facades\DB;

class abscenceController extends Controller
{
    public function abscenceView($id){
        $classe=["classe"=>classe::where("id",$id)->first()];
        $eleves_aff=affc_eleve::where('classe_id',$id)->get();
        return view('backend.partie_Ens.abscenceView',compact('classe','eleves_aff'));
    }


    public function abscenceStore(Request $request,$id){
            $id_eleves=DB::table("affc_eleves")->where("classe_id",$id)->pluck("eleve_id");

            $request->validate([
                'jour'=>'required',
                'date'=>'required',
                'anneescolaire'=>'required',
                'heure_debut'=>'required',
                'heure_fin'=>'required',
            ]);
    
    
            $countClass = count($id_eleves);
            for ($i=0; $i <10 ; $i++) {
                if(isset($request->heure_debut[$i])){
    
                $data = new abscence();
                $data->jour = $request->jour;
                
                $data->heure_debut = $request->heure_debut[$i];
                $data->heure_fin = $request->heure_fin[$i];
                $data->eleve_id = $id_eleves[$i];
                $data->anneescolaire = $request->anneescolaire;
                $data->date = $request->date;
    
                $data->save();
    
            }
            else continue;
        }
        $notification = array(
            'message' => '  تم تسجيل الغيابات بنجاح   ',
            'alert-type' => 'success'
        );    


        return redirect()->route('classes.view')->with($notification);


    }
}
