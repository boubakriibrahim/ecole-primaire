<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Classe;
use App\Models\eleve;
use App\Models\Salle;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $profs = DB::table('users')->where('role', 'enseignant')->get();
        $eleves = Eleve::get();
        $classes = Classe::get();
        $salles = Salle::get();

        return view('admin.index', compact('profs', 'eleves', 'classes', 'salles'));
    }
}
