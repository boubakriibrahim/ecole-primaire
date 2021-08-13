<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salle;


class SalleController extends Controller
{
    public function SalleView () {
        $data['allData'] = Salle::all();
        return view('backend.view_salle', $data);
    }

    public function SalleStore(Request $request) {

         $request->validate([
            'libelle'=>'required',
        ]);
        $data = new Salle();
        $data->libelle = $request->libelle;
        $data->save();

        $notification = array(
            'message' => 'تم إضافة القاعة بنجاح',
            'alert-type' => 'success'
        );


        return back()->with($notification);
    }



    public function SalleUpdate(Request $request, $id) {

        $data = Salle::find($id);
        $data->libelle = $request->libelle;


        $data->save();

        $notification = array(
            'message' => 'تم تحديث القاعة بنجاح',
            'alert-type' => 'info'
        );

        return redirect()->route('salle.view')->with($notification);
    }



    public function SalleDelete($id) {

        $salle = Salle::find($id);
        $salle->delete();

        $notification = array(
            'message' => 'تم حذف القاعة بنجاح',
            'alert-type' => 'info'
        );

        return redirect()->route('salle.view')->with($notification);
    }
}
