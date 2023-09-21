<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Metier;
use App\Models\Tache;
use Illuminate\Http\Request;

class ManageTasksController extends Controller
{
    public function index() {

        $user_id = auth()->id();

        $taches = Tache::query()->with('evenement.metier')->where('user_id', $user_id)->get();

        $evenement = [];

        return view('users.gestion_taches', compact('taches', 'evenement'));

    }

    public function listByEvent(Evenement $eventId) {

        $user_id = auth()->id();

        $evenement = Evenement::query()->where([
            ['user_id', $user_id],
            ['id', $eventId->id]
        ])->get();

        $taches = Tache::query()->with('evenement.metier')->where([
            ['user_id', $user_id],
            ['evenement_id', $eventId->id]
        ])->get();

        return view('users.gestion_taches', compact('taches', 'evenement'));

    }

}
