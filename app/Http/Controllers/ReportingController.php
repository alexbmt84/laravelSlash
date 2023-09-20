<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Metier;
use App\Models\RecetteDepense;
use App\Models\Sphere;
use Illuminate\Http\Request;

class ReportingController extends Controller
{

    public function index() {

        return view('users.reporting');

    }

    public function getData() {

        $userId = auth()->id();

        $data = Evenement::query()->with('metier')->where('user_id', $userId)->get();

        $recettesDepenses = RecetteDepense::query()->where('user_id', $userId)->get();

        $totalSpherePro = Metier::query()->
            where([
                'user_id' => $userId,
                'sphere_id' => \App\Enums\Sphere::PRO->value,
            ])->count('sphere_id');

        $totalSpherePerso = Metier::query()->
            where([
                'user_id' => $userId,
                'sphere_id' => \App\Enums\Sphere::PERSO->value,
            ])->count('sphere_id');

        return response()->json([
            'data' => $data,
            'recettesDepenses' => $recettesDepenses,
            'spheres' => [
                ['label' => 'Pro', 'id_sphere' => \App\Enums\Sphere::PRO->value, 'total' => $totalSpherePro],
                ['label' => 'Perso', 'id_sphere' => \App\Enums\Sphere::PERSO->value, 'total' => $totalSpherePerso]
            ],
        ]);

    }

}
