<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\enseignant;
use App\Models\Classe;
use App\Models\eleve;
use App\Models\aff_enseignant;
use App\Models\affc_eleve;
use Illuminate\Support\Facades\Auth;

class listClassController extends Controller
{
    public function listClasses(){

        $allData=DB::table('aff_enseignants')
        ->join('enseignants', function ($join) {
            $user_id= Auth::user()->id_enseignant;
            $join->on('aff_enseignants.enseignant_id', '=', 'enseignants.id')
                 ->where('enseignants.id', $user_id);
        })
        ->join("classes",'classes.id','aff_enseignants.classe_id')
        ->select("classes.*")
        ->get();



        // pas de repetition de classes
        $noms = array();
        $data = array();

        foreach($allData as $key => $classe){
            if(!in_array($classe->nom, $noms, true)){
                array_push($noms, $classe->nom);
                array_push($data, $classe);
            }
        }

         return view('backend.partie_Ens.classeslist',compact('data'));
     }

    public function listView($id){
        $eleves=eleve::all();
        $eleves_ids=DB::table("affc_eleves")->pluck('eleve_id');
        $data1 = $eleves->diff(eleve::whereIn('id', $eleves_ids)->get());
        $classe=["classe"=>Classe::where("id",$id)->first()];

        return view('backend.partie_Ens.view_list',$classe,compact('data1'));
    }
    public function listCheck($id){
        $id_c=$id;
        $nb=affc_eleve::where('classe_id',$id)->count();

        if($nb==0){
            return redirect()->route('list.view', ['id' => $id]);
        }
        else{

            return view("backend.partie_Ens.list_exist",compact('id'));
        }



    }
    public function listStore(Request $request,$id){
        $nb=DB::table('classes')->where('id',$id)->value('nb');
        $noms=$request->noms;
        for($i=0;$i<$nb;$i++){
            if($noms[$i]==0){

                $notification = array(
                    'message' => 'يجب تعمير جميع اللأسماء',
                    'alert-type' => 'error'
                );


                return back()->with($notification);

            }
            for($j=$i+1;$j<$nb;$j++){
                if($noms[$i]==$noms[$j]){
                    $notification = array(
                        'message' => 'هناك إسم متكرر',
                        'alert-type' => 'error'
                    );


                    return back()->with($notification);

                }
            }
        }
        for ($i=0; $i <$nb ; $i++){

            $request->validate([
                'noms'=>'required',
            ]);


        $affec = new affc_eleve();
        $affec->classe_id = $id;
        $affec->eleve_id =$request->noms[$i];

        $affec->save();

    }

        $notification = array(
            'message' => 'تم إضافة قائمة القسم بنجاح',
            'alert-type' => 'success'
        );


        return redirect()->route('classes.view')->with($notification);
    }

    public function editList($id){
        $classe=["classe"=>Classe::where("id",$id)->first()];
        $eleves=eleve::all();
        $eleves_ids=DB::table("affc_eleves")->pluck('eleve_id');
        $data1 = $eleves->diff(eleve::whereIn('id', $eleves_ids)->get());

        $eleves_aff=affc_eleve::where('classe_id',$id)->get();
        //dd($eleves_aff);


        return view('backend.partie_Ens.editList',compact('classe','data1','eleves_aff'));
    }


    public function updateList(Request $request,$id){


        $id_aff=DB::table("affc_eleves")->where('classe_id',$id)->pluck('id');
        $nb=DB::table('classes')->where('id',$id)->value('nb');
        $noms=$request->noms;
        $n_noms=$request->n_noms;
        $n=$nb-count($id_aff);
        //dd($max,$n);

        for($i=0;$i<count($id_aff);$i++){

            if($noms[$i]==0){


                $notification = array(
                    'message' => 'يجب تعمير جميع اللأسماء',
                    'alert-type' => 'error'
                );


                return back()->with($notification);

            }

            for($j=$i+1;$j<count($id_aff);$j++){

                if($noms[$i]==$noms[$j]){

                    $notification = array(
                        'message' => 'هناك إسم متكرر',
                        'alert-type' => 'error'
                    );


                    return back()->with($notification);

                }
            }
        }
        for ($i=0; $i <count($id_aff) ; $i++){
            $request->validate([
                'noms'=>'required',
            ]);



       $affec = affc_eleve::find($id_aff[$i]);
        $affec->classe_id = $id;
        $affec->eleve_id =$request->noms[$i];

        $affec->save();}


        for($i=0;$i<$n;$i++){



            for($j=$i+1;$j<$n;$j++){

                if($n_noms[$i]==$n_noms[$j]){

                    $notification = array(
                        'message' => 'هناك إسم متكرر',
                        'alert-type' => 'error'
                    );


                    return back()->with($notification);

                }
            }
        }




        //
        for($i=0;$i<$n;$i++){
            if($n_noms[$i]!=0){
        $affec = new affc_eleve();
        $affec->classe_id = $id;
        $affec->eleve_id =$request->n_noms[$i];

        $affec->save();}

        }



        $notification = array(
            'message' => 'تم إضافة قائمة القسم بنجاح',
            'alert-type' => 'success'
        );


        return redirect()->route('classes.view')->with($notification);
    }



}
