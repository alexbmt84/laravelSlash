<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\RecetteDepense;
use Illuminate\Http\Request;

class AddRevenueController extends Controller
{
    public function index() {

        $userId = auth()->id();

        $events = Evenement::query()->with('taches')->where('user_id', $userId)->get();

        return view('creation.recette', compact('events'));

    }

    public function store(Request $request) {

        $userId = auth()->id();

        /** @var RecetteDepense $evenement **/

        RecetteDepense::create([
            'recette' => $request['recette'],
            'depense' =>  $request['depense'],
            'evenement_id' => $request['select-event'],
            'user_id' => $userId,
        ]);

        return redirect()->to('/gestion_evenements');

    }

}
