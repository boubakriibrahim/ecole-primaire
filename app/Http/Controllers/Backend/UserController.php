<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function UserView () {
        $data['allData'] = User::all();
        return view('backend.user.view_user', $data);
    }

    public function UserAdd() {

        return view('backend.user.add_user');
    }

    public function UserStore(Request $request) {

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

        return redirect()->route('user.view');
    }
}