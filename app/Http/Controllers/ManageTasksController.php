<?php

namespace App\Http\Controllers;

use App\Models\Metier;
use App\Models\Tache;
use Illuminate\Http\Request;

class ManageTasksController extends Controller
{
    public function index() {

        $user_id = auth()->id();

        $taches = Tache::query()->with('evenement.metier')->where('user_id', $user_id)->get();

        return view('users.gestion_taches', compact('taches'));

    }

}
