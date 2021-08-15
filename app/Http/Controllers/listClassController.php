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
            $user_id=18;
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
        //dd($eleves_ids[0]);
        $data1 = $eleves->diff(eleve::whereIn('id', $eleves_ids)->get());
        $data=['classeInfo'=>classe::where('id',$id)->first()];
        //dd($data1);
        
        
        return view('backend.partie_Ens.view_list',$data,compact('data1'));
    }
    
}
