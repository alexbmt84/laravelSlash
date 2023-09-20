<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Tache;
use Illuminate\Http\Request;

class AddTaskController extends Controller
{
    public function index() {

        $userId = auth()->id();

        $events = Evenement::query()->with('taches')->where('user_id', $userId)->get();

        return view('creation.taches', compact('events'));

    }

    public function store(Request $request) {

        $userId = auth()->id();

        if($request->hasFile('image_tache')) {

            $dir = "storage/tasksUploads/";
            $fileName = $request['image_tache']->getClientOriginalName();
            $image = $dir . $fileName;

            $request['image_tache']->storeAs('tasksUploads', $fileName, 'public');

        }

        /** @var Tache $evenement **/

        Tache::query()->create([
            'label' => $request['nom_tache'],
            'date_debut' =>  $request['dateDebut'],
            'image' => $image,
            'user_id' => $userId,
            'evenement_id' => $request['select-event']
        ]);

        return redirect()->to('/home');

    }

}
