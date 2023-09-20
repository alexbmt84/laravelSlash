<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class PlanificationController extends Controller
{

    public function index() {

        $user_id = auth()->id();

        $events = Evenement::query()->where('user_id', $user_id)->get();

        return view('users.planification', compact('events'));
    }

}
