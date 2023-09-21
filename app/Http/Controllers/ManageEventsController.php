<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Metier;
use App\Models\RecetteDepense;
use App\Models\Tache;
use Illuminate\Http\Request;

class ManageEventsController extends Controller
{
    public function index() {

        $user_id = auth()->id();

        $metiers = Metier::query()->with('evenements.recettes')->where('user_id', $user_id)->get();

        $evenements = Evenement::query()->where('user_id', $user_id)->get();

        $totalRecettes = [];

        foreach ($evenements as $evenement) {

            $recettes = RecetteDepense::query()->where([
                ['user_id', $user_id],
                ['evenement_id',$evenement->id ]
            ])->sum('recette');

            $totalRecettes[] = $recettes;

        }

        return view('users.gestion_evenements', compact('metiers', 'totalRecettes'));

    }

}
