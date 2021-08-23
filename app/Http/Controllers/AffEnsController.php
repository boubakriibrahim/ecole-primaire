<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aff_enseignant;
use App\Models\Classe;
use App\Models\enseignant;
use Illuminate\Support\Facades\DB;
use App\Models\Matiere;

class AffEnsController extends Controller
{
    public function AffEnsView () {
        $affEns = aff_enseignant::all();
        $enseignants = enseignant::orderBy('nom')->get();
        $classes = Classe::all();
        $matieres = Matiere::orderBy('libelle')->get();
        return view('backend.view_affectationEns',compact('affEns','enseignants','classes','matieres'));
    }

    public function AffEnsStore(Request $request) {
        $data= new aff_enseignant(); 
        $data->classe_id = $request->classe_id;
        $data->matiere_id = $request->matiere_id;
        $data->enseignant_id = $request->enseignant_id;


        if((DB::table('aff_enseignants')->where('classe_id',$request->classe_id)->where('matiere_id',$request->matiere_id)->doesntExist())){
            $data->save();

            $notification = array(
                'message' => 'تم إضافة التعيين بنجاح',
                'alert-type' => 'success'
            );
            return back()->with($notification);




        }
        $notification = array(
            
            'message' => 'تعيين موجود مسبقا',
            'alert-type' => 'warning'
        );


        return back()->with($notification);
    }
    public function AffEnsUpdate(Request $request,$id) {
        $data=aff_enseignant::find($id); 
        $data->classe_id = $request->classe_id;
        $data->matiere_id = $request->matiere_id;
        $data->enseignant_id = $request->enseignant_id;


        if((DB::table('aff_enseignants')->where('classe_id',$request->classe_id)->where('matiere_id',$request->matiere_id)->doesntExist())){
            $data->save();

            $notification = array(
                'message' => 'تم تحديث التعيين بنجاح',
                'alert-type' => 'success'
            );
            return back()->with($notification);




        }
        $notification = array(
            
            'message' => 'تعيين موجود مسبقا',
            'alert-type' => 'warning'
        );


        return back()->with($notification);
    }

    

    public function AffEnsDelete($id) {

        $user = aff_enseignant::find($id);
        $user->delete();

        $notification = array(
            'message' => 'تم حذف التعيين بنجاح',
            'alert-type' => 'info'
        );

        return back()->with($notification);
    }
}

