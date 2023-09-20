<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreationController extends Controller {
    
    public function index() {
        return view('users.creation');
    }

}
