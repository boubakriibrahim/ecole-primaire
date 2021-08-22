<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\classe;
use App\Models\eleve;
use App\Models\matiere;
use App\Models\aff_enseignant;
use App\Models\affc_eleve;
use Illuminate\Support\Facades\Auth;

use App\Models\note;
use Illuminate\Support\Facades\DB;

class noteController extends Controller
{
    public function noteView($id){
        $classe=["classe"=>classe::where("id",$id)->first()];
        $eleves_aff=affc_eleve::where('classe_id',$id)->get();
        $user_id= Auth::user()->id_enseignant;
        $matiere_ids=aff_enseignant::where('classe_id',$id)->where('enseignant_id',$user_id)->pluck('matiere_id');
        $matieres=matiere::whereIn('id',$matiere_ids)->get();
        return view('backend.partie_Ens.view_note',compact('classe','eleves_aff','matieres'));
    }


    public function noteStore(Request $request,$id){
            $id_eleves=DB::table("affc_eleves")->where("classe_id",$id)->pluck("eleve_id");
            $user_id= Auth::user()->id_enseignant;
            $matiere_ids=aff_enseignant::where('classe_id',$id)->where('enseignant_id',$user_id)->pluck('matiere_id');
            $matieres=matiere::whereIn('id',$matiere_ids)->get();


            
    
    
            $countClass = count($id_eleves);
            for ($i=0; $i <$countClass ; $i++) {
                foreach($matieres as $key => $matiere){
                    if(isset($request->{$matiere->libelle}[$i])){
    
                $data = new note();
                $data->classe_id = $id;
                $data->matiere_id=$matiere->id;
                $data->eleve_id=$id_eleves[$i];
                $data->note=$request->{$matiere->libelle}[$i];
                
                
    
                $data->save();
    
            }}
        }
        $notification = array(
            'message' => '  تم تسجيل الأعداد  بنجاح   ',
            'alert-type' => 'success'
        );    


        return redirect()->route('classes.view')->with($notification);


    }
    
}
