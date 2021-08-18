<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\aff_enseignant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    public function AdminData(){

        $data['user'] = Auth::user();
        $allAffs = DB::table('users')
        ->where('id_enseignant', Auth::user()->id_enseignant)
        ->join('aff_enseignants', 'users.id_enseignant', '=', 'aff_enseignants.enseignant_id')
        ->join('classes', 'classes.id', '=', 'aff_enseignants.classe_id')
        ->join('matieres', 'matieres.id', '=', 'aff_enseignants.matiere_id')
        ->select('classes.nom', 'classes.niveau', 'matieres.libelle')
        ->get();

        $liste = array();

        foreach($allAffs as $key => $affectation){
            if(!in_array($affectation->nom, $liste, true)){
                array_push($liste, $affectation->nom);
            }
        }

        $data['affEnsclasses'] = $liste;

        $matieres = array();
        $niveaus = array();

        foreach($allAffs as $key => $affectation){
            if(!in_array($affectation->libelle, $matieres, true)){
                array_push($matieres, $affectation->libelle);
                array_push($niveaus, $affectation->niveau);
            }
        }

        $data['affEnsMatieres'] = $matieres;
        $data['affEnsNiveau'] = $niveaus;

        return view('profil_card')->with($data);
    }


    public function ProfileUpdate(Request $request, $id) {

        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'sexe'=>'required',
            'login'=>'required',
            'date_naissance'=>'required',
            'adresse'=>'required',
            'phone'=>'required',
        ]);

        $user = User::find($id);

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->login;
        $user->date_naissance = $request->date_naissance;
        $user->adresse = $request->adresse;
        $user->phone = $request->phone;

        $user->save();

        $notification = array(
            'message' => 'تم تحديث المعلومات الشخصية بنجاح',
            'alert-type' => 'info'
        );

        return back()->with($notification);
    }

    public function ProfileUpdatePassword(Request $request, $id) {

        $request->validate([
            'oldpassword'=>'required',
            'newpassword'=>'required|min:8|different:oldpassword',
            'newpassword2'=>'required|same:newpassword',
        ]);


        if (Hash::check($request->oldpassword , Auth::user()->password)) {
            $user = User::find($id);

            $user->password = bcrypt($request->newpassword);
            $user->save();

            $notification = array(
                'message' => 'تم تحديث كلمة العبور بنجاح',
                'alert-type' => 'info'
            );

        } else {
            $notification = array(
                'message' => 'كلمة العبور الحالية خاطئة',
                'alert-type' => 'error'
            );
        }

        return back()->with($notification);
    }


}
