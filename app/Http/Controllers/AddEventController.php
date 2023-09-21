<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class AddEventController extends Controller
{

    public function index() {

        $user = auth()->user();
        $metiers = $user->metiers;

        return view('creation.evenements', compact('metiers'));

    }

    public function eventWellDone() {
        return view('welldone.eventWellDone');
    }

    public function store(Request $request) {

        $user = auth()->user();

        /** @var Evenement $evenement **/

        Evenement::create([
            'nom_evenement' => $request['nomEvenement'],
            'nom_client' =>  $request['nomClient'],
            'commentaire' => $request['commentaire'],
            'user_id' => $user->id,
            'metier_id' => $request['select-metier']
        ]);

        return redirect()->to('/event-well-done');

    }
}
