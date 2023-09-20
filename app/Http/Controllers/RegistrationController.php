<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistrationController extends Controller {

    public function create() {

        return view('registration.create');

    }

    public function store() {

        $this->validate(request(), [

            'pseudo' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'

        ]);

        /** @var User $user **/

        $user = User::query()->create(request(['pseudo', 'email', 'password']));

        auth()->login($user);

        return redirect()->to('/home');

    }

}
