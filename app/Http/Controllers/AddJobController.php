<?php

namespace App\Http\Controllers;

use App\Models\Metier;
use Illuminate\Http\Request;

class AddJobController extends Controller
{
    public function index() {
        return view('creation.metiers');
    }

    public function store(Request $request) {

        $user = auth()->user();

        if($request->hasFile('image_metier')) {

            $dir = "storage/jobsUploads/";
            $fileName = $request['image_metier']->getClientOriginalName();
            $avatar = $dir . $fileName;

            $request['image_metier']->storeAs('jobsUploads', $fileName, 'public');

        }

        /** @var Metier $metier **/

         Metier::create([
            'nom' => $request['nomMetier'],
            'couleur' =>  $request['radio'],
            'icone' => $avatar,
            'user_id' => $user->id,
            'sphere_id' => $request['radio_sphere']
        ]);

        return redirect()->to('/home');

    }

}
