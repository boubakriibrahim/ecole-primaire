<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\enseignant;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EnsgController extends Controller
{
    
    public function EnsView () {
        $data['allData'] = enseignant::all();
        return view('backend.ENS.view_Ens', $data);
    }


    public function EnsStore(Request $request) {

         $request->validate([
            "nom"=>"required",
            'prenom'=>'required',
            'sexe'=>'required',
            'password'=>'required',
            'login' => 'required',
        ]);
        
        $ens = new enseignant();
        $ens->nom = $request->nom;
        $ens->prenom = $request->prenom;
        $ens->sexe = $request->sexe;
        $ens->login = $request->login;
        $ens->password = bcrypt($request->password);

        $ens->save();

        $user = new User();
        $user->name = $request->nom . ' ' . $request->prenom;
        $user->role = 'enseignant';
        $user->email = $request->login;
        $user->password = bcrypt($request->password);

        $user->save();

        $notification = array(
            'message' => 'تم إضافة المدرس بنجاح',
            'alert-type' => 'success'
        );
       

        return back()->with($notification);
    }


    public function EnsUpdate(Request $request, $id) {

        $ens = enseignant::find($id);
        $ens->nom = $request->nom;
        $ens->prenom = $request->prenom;
        $ens->sexe = $request->sexe;
        $ens->login = $request->login;

        $ens->save();

        $userid = DB::table('users')->where('email', $request->login)->value('id');
        $user = User::find($userid);
        $user->name = $request->nom . ' ' . $request->prenom;
        $user->email = $request->login;

        $user->save();

        $notification = array(
            'message' => 'تم تحديث المدرس بنجاح',
            'alert-type' => 'info'
        );

        return back()->with($notification);
    }

    public function EnsDelete($id) {

        $ens = enseignant::find($id);
        $ens->delete();

        $user = User::find($id);
        $user->delete();

        $notification = array(
            'message' => 'تم حذف المدرس بنجاح',
            'alert-type' => 'info'
        );

        return back()->with($notification);
    }

    
}
