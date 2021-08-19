<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ecole;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ecoleController extends Controller
{
    public function EcoleData() {

        $ecole = DB::table('ecoles')
        ->where('id', 1)->first();

        return view('ecole-card', compact('ecole'));
    }

    public function EcoleUpdate(Request $request) {

        $ecole = Ecole::firstWhere('id', 1);

        $ecole->nom = $request->nom;
        $ecole->genre = $request->genre;
        $ecole->adresse = $request->adresse;
        $ecole->email = $request->email;
        $ecole->phone = $request->phone;
        $ecole->description1 = $request->description1;
        $ecole->description2 = $request->description2;


        if($request->hasFile('image')){

            $destination = 'images/uploads/'.$ecole->ecole_photo_path;
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/uploads/', $filename);
            $ecole->ecole_photo_path = $filename;
        }

        $ecole->save();

        $notification = array(
            'message' => 'تم تحديث معلومات المدرسة بنجاح',
            'alert-type' => 'info'
        );

        return back()->with($notification);

    }


}
