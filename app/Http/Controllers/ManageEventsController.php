<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Metier;
use App\Models\Tache;
use Illuminate\Http\Request;

class ManageEventsController extends Controller
{
    public function index() {

        $user_id = auth()->id();

        $metiers = Metier::query()->with('evenements.recettes')->where('user_id', $user_id)->get();

        return view('users.gestion_evenements', compact('metiers'));

    }

}
