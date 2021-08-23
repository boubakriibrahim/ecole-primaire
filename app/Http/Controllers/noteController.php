<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\eleve;
use App\Models\Matiere;
use App\Models\aff_enseignant;
use App\Models\affc_eleve;
use Illuminate\Support\Facades\Auth;

use App\Models\note;
use Illuminate\Support\Facades\DB;

class noteController extends Controller
{
    public function noteView($id){
        $classe = ["classe"=>Classe::where("id",$id)->first()];
        $eleves_aff = affc_eleve::where('classe_id',$id)->get();
        $user_id = Auth::user()->id_enseignant;
        $matiere_ids = aff_enseignant::where('classe_id',$id)->where('enseignant_id',$user_id)->pluck('matiere_id');
        $matieres = Matiere::whereIn('id',$matiere_ids)->get();
        return view('backend.partie_Ens.view_note',compact('classe','eleves_aff','matieres'));
    }


    public function noteStore(Request $request,$id){

            $id_eleves = DB::table("affc_eleves")->where("classe_id",$id)->pluck("eleve_id");
            $user_id = Auth::user()->id_enseignant;
            $matiere_ids = aff_enseignant::where('classe_id',$id)->where('enseignant_id',$user_id)->pluck('matiere_id');
            $matieres = Matiere::whereIn('id',$matiere_ids)->get();




            $countClass = count($id_eleves);
            for ($i=0; $i <$countClass ; $i++) {
                foreach($matieres as $key => $matiere){

                    if($request[($i+1).'matiere'.($key+1)] != NULL){

                        $data = new note();
                        $data->classe_id = $id;
                        $data->matiere_id=$matiere->id;
                        $data->eleve_id=$id_eleves[$i];
                        $data->note = $request[($i+1).'matiere'.($key+1)];

                        $data->save();

                    }
                }
            }

        $notification = array(
            'message' => '  تم تسجيل الأعداد  بنجاح   ',
            'alert-type' => 'success'
        );


        return redirect()->route('classes.view')->with($notification);


    }

    public function editNote($id){
        $classe = ["classe"=>Classe::where("id",$id)->first()];

        $eleves_aff = affc_eleve::where('classe_id',$id)->get();
        $notes = note::where('classe_id',$id)->get();
        $user_id = Auth::user()->id_enseignant;
        $matiere_ids = aff_enseignant::where('classe_id',$id)->where('enseignant_id',$user_id)->pluck('matiere_id');
        $matieres = Matiere::whereIn('id',$matiere_ids)->get();



        return view('backend.partie_Ens.view_updateNote',compact('classe','notes','eleves_aff','matieres'));
    }

    public function noteUpdate(Request $request,$id){

            $id_eleves = DB::table("affc_eleves")->where("classe_id",$id)->pluck("eleve_id");
            $user_id = Auth::user()->id_enseignant;
            $matiere_ids = aff_enseignant::where('classe_id',$id)->where('enseignant_id',$user_id)->pluck('matiere_id');
            $matieres = Matiere::whereIn('id',$matiere_ids)->get();


            $countClass = count($id_eleves);
            for ($i=0; $i <$countClass ; $i++) {
                    foreach($matieres as $key => $matiere){
                        if($request[($i+1).'matiere'.($key+1)] != NULL){

                            $data = note::where("eleve_id",$id_eleves[$i])->where("matiere_id",$matiere->id)->get();

                            if($data->count() == 0){

                                $newData = new note();
                                $newData->classe_id = $id;
                                $newData->matiere_id = $matiere->id;
                                $newData->eleve_id = $id_eleves[$i];
                                $newData->note = $request[($i+1).'matiere'.($key+1)];

                                $newData->save();
                            } else {

                                $idNote = $data[0]->id;

                                $updateData = note::find($idNote);
                                $updateData->note = $request[($i+1).'matiere'.($key+1)];

                                $updateData->save();
                            }
                        }
                    }
            }
        $notification = array(
            'message' => '  تم تسجيل الأعداد  بنجاح   ',
            'alert-type' => 'success'
        );

        return redirect()->route('classes.view')->with($notification);

    }
    public function noteCheck($id){

        $nb = note::where('classe_id',$id)->count();

        if( $nb == 0 ){
            return redirect()->route('note.view', ['id' => $id]);
        }
        else{
            return redirect()->route('note.edit', ['id' => $id]);
        }
    }
}
