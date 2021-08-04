<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function UserView () {
        $data['allData'] = User::latest()->get();
        return view('backend.user.view_user', $data);
    }

    public function UserAdd() {

        return view('backend.user.add_user');
    }

    public function AdminStore(Request $request) {

        $validateDate = $request->validate([
            'nom' => 'required',
            'email' => 'required|unique:users',
        ]);
        $data = new User();
        $data->role = 'admin';
        $data->email = $request->email;
        $data->name = $request->nom;
        $data->password = bcrypt($request->password);
        $data->save();

        $notification = array(
            'message' => 'Ajout de l\'admin réussie',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.view')->with($notification);
    }

    public function MaitreStore(Request $request) {

        $validateDate = $request->validate([
            'nom' => 'required',
            'email' => 'required|unique:users',
        ]);
        $data = new User();
        $data->role = 'maitre';
        $data->email = $request->email;
        $data->name = $request->nom;
        $data->password = bcrypt($request->password);
        $data->save();

        $notification = array(
            'message' => 'Ajout de l\'maitre réussie',
            'alert-type' => 'success'
        );

        return redirect()->route('maitre.view')->with($notification);
    }

    public function EleveStore(Request $request) {

        $validateDate = $request->validate([
            'nom' => 'required',
            'email' => 'required|unique:users',
        ]);
        $data = new User();
        $data->role = 'eleve';
        $data->email = $request->email;
        $data->name = $request->nom;
        $data->password = bcrypt($request->password);
        $data->save();

        $notification = array(
            'message' => 'Ajout de l\'élève réussie',
            'alert-type' => 'success'
        );

        return redirect()->route('eleve.view')->with($notification);
    }

    public function UserEdit($id) {
        $editData = User::find($id);
        return view('backend.user.edit_user', compact('editData'));
    }

    public function AdminUpdate(Request $request, $id) {

        $data = User::find($id);
        /* $data->role = 'admin'; */
        $data->email = $request->email;
        $data->name = $request->nom;

        $data->save();

        $notification = array(
            'message' => 'Mise à jour de l\'admin réussie',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.view')->with($notification);
    }

    public function MaitreUpdate(Request $request, $id) {

        $data = User::find($id);
        /* $data->role = 'admin'; */
        $data->email = $request->email;
        $data->name = $request->nom;

        $data->save();

        $notification = array(
            'message' => 'Mise à jour du maitre réussie',
            'alert-type' => 'info'
        );

        return redirect()->route('maitre.view')->with($notification);
    }

    public function EleveUpdate(Request $request, $id) {

        $data = User::find($id);
        /* $data->role = 'admin'; */
        $data->email = $request->email;
        $data->name = $request->nom;

        $data->save();

        $notification = array(
            'message' => 'Mise à jour de l\'élève réussie',
            'alert-type' => 'info'
        );

        return redirect()->route('eleve.view')->with($notification);
    }

    public function AdminDelete($id) {

        $user = User::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Effacement de l\'admin réussie',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.view')->with($notification);
    }

    public function MaitreDelete($id) {

        $user = User::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Effacement du maitre réussie',
            'alert-type' => 'info'
        );

        return redirect()->route('maitre.view')->with($notification);
    }

    public function EleveDelete($id) {

        $user = User::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Effacement de l\'élève réussie',
            'alert-type' => 'info'
        );

        return redirect()->route('eleve.view')->with($notification);
    }
}