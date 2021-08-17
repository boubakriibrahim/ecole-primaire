<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\enseignant;
use App\Models\classe;
use App\Models\eleve;
use App\Models\aff_enseignant;
use App\Models\affc_eleve;

class listClassController extends Controller
{
    public function listClasses(){
        // $data=['AdminInfo'=>user::where('id',1)->first()];
         //dd(session()->all());
        // $session_id = session()->getId();
         //$data=['session'=>session::where('id',$session_id)->first()];
        // $d=$data->fetch();
        //foreach($data as $key => $sess){
        // dd($user_id);
         //dd($session_id);
        // $data=aff_enseignant::where('enseignant_id',$user_id)->get();
        $data=DB::table('aff_enseignants')
        ->join('enseignants', function ($join) {
            $user_id=3;
            $join->on('aff_enseignants.enseignant_id', '=', 'enseignants.id')
                 ->where('enseignants.id', $user_id);
        })
        ->join("classes",'classes.id','aff_enseignants.classe_id')
        ->select("classes.*")
        ->get();

         return view('backend.partie_Ens.classeslist',compact('data'));
     }

    public function listView($id){
        $eleves=eleve::all();
        $eleves_ids=DB::table("affc_eleves")->pluck('eleve_id');
        $data1 = $eleves->diff(eleve::whereIn('id', $eleves_ids)->get());
        $classe=["classe"=>classe::where("id",$id)->first()];        
        
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
                    'message' => '  يجب تعمير جميع اللأسماء   ',
                    'alert-type' => 'error'
                );
        
        
                return back()->with($notification);

            }
            for($j=$i+1;$j<$nb;$j++){
                if($noms[$i]==$noms[$j]){
                    $notification = array(
                        'message' => 'هناك إسم متكرر   ',
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
            'message' => 'تم إضافة قائمة  القسم بنجاح',
            'alert-type' => 'success'
        );


        return redirect()->route('classes.view')->with($notification);
    }

    public function editList($id){
        $classe=["classe"=>classe::where("id",$id)->first()];
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

        for($i=0;$i<$nb;$i++){

            if($noms[$i]==0){


                $notification = array(
                    'message' => '  يجب تعمير جميع اللأسماء   ',
                    'alert-type' => 'error'
                );
        
        
                return back()->with($notification);

            }

            for($j=$i+1;$j<$nb;$j++){

                if($noms[$i]==$noms[$j]){

                    $notification = array(
                        'message' => 'هناك إسم متكرر   ',
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

            

        $affec = affc_eleve::find($id_aff[$i]);
        $affec->classe_id = $id;
        $affec->eleve_id =$request->noms[$i];

        $affec->save();

    }

        $notification = array(
            'message' => 'تم إضافة قائمة  القسم بنجاح',
            'alert-type' => 'success'
        );


        return redirect()->route('classes.view')->with($notification);
    }



    }





    

