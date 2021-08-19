<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ecole;
use Illuminate\Support\Facades\DB;

class ecoleController extends Controller
{
    public function EcoleData() {

        $ecole = DB::table('ecoles')
        ->where('id', 1)->first();

        return view('ecole-card', compact('ecole'));
    }
}
