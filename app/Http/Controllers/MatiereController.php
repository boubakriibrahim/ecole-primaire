<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matiere;

class MatiereController extends Controller
{
    public function MatiereView () {
        $data['allData'] = Matiere::all();
        return view('backend.view_matiere', $data);
    }

    public function MatiereStore(Request $request) {

         $request->validate([
            "niveau"=>"required", 'libelle'=>'required'
        ]);
        $data = new Matiere();
        $data->niveau = $request->niveau;
        $data->libelle = $request->libelle;
        $data->save();

        $notification = array(
            'message' => 'تم إضافة المادة بنجاح',
            'alert-type' => 'success'
        );


        return back()->with($notification);
    }



    public function MatiereUpdate(Request $request, $id) {

        $data = Matiere::find($id);
        $data->niveau = $request->niveau;
        $data->libelle = $request->libelle;


        $data->save();

        $notification = array(
            'message' => 'تم تحديث المادة بنجاح',
            'alert-type' => 'info'
        );

        return redirect()->route('matiere.view')->with($notification);
    }



    public function MatiereDelete($id) {

        $user = Matiere::find($id);
        $user->delete();

        $notification = array(
            'message' => 'تم حذف المادة بنجاح',
            'alert-type' => 'info'
        );

        return redirect()->route('matiere.view')->with($notification);
    }
}
