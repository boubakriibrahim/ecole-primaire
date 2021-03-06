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
        $data['allData'] = DB::table('users')
        ->join('enseignants', 'users.email', '=', 'enseignants.login')
        ->select('enseignants.*', 'users.date_naissance', 'users.adresse', 'users.phone', 'users.profile_photo_path')
        ->get();

        return view('backend.ENS.view_Ens', $data);
    }


    public function EnsStore(Request $request) {

        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'sexe'=>'required',
            'login'=>'required',
            'password'=>'required',
            'date_naissance'=>'required',
            'adresse'=>'required',
            'phone'=>'required',
        ]);

        $ens = new enseignant();
        $ens->nom = $request->nom;
        $ens->prenom = $request->prenom;
        $ens->sexe = $request->sexe;
        $ens->login = $request->login;

        $ens->save();

        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->role = 'enseignant';
        $user->email = $request->login;
        $user->password = bcrypt($request->password);
        $user->date_naissance = $request->date_naissance;
        $user->adresse = $request->adresse;
        $user->phone = $request->phone;

        $ens_id = DB::table('enseignants')->where('login', $request->login)->value('id');
        $user->id_enseignant = $ens_id;

        $user->save();

        $notification = array(
            'message' => 'تم إضافة المدرس بنجاح',
            'alert-type' => 'success'
        );


        return back()->with($notification);
    }


    public function EnsUpdate(Request $request, $id) {


        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'sexe'=>'required',
            'login'=>'required',
            'date_naissance'=>'required',
            'adresse'=>'required',
            'phone'=>'required',
        ]);

        $ens = enseignant::find($id);
        $ens->nom = $request->nom;
        $ens->prenom = $request->prenom;
        $ens->sexe = $request->sexe;
        $ens->login = $request->login;

        $ens->save();

        $userid = DB::table('users')->where('email', $request->login)->value('id');
        $user = User::find($userid);
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->login;
        $user->date_naissance = $request->date_naissance;
        $user->adresse = $request->adresse;
        $user->phone = $request->phone;

        $user->save();

        $notification = array(
            'message' => 'تم تحديث المدرس بنجاح',
            'alert-type' => 'info'
        );

        return back()->with($notification);
    }

    public function EnsDelete($id) {

        $ens = enseignant::find($id);


        $userid = DB::table('users')->where('email', $ens->login)->value('id');
        $user = User::find($userid);
        $user->delete();

        $ens->delete();

        $notification = array(
            'message' => 'تم حذف المدرس بنجاح',
            'alert-type' => 'info'
        );

        return back()->with($notification);
    }


}
