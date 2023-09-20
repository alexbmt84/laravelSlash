<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller {

    public function index() {
        return view('users.profile');
    }

    public function update(Request $request) {

      $user = auth()->user();

      if($request->hasFile('avatar')){

        $dir = "storage/avatars/";
        $filename = $request->avatar->getClientOriginalName();
        $avatar = $dir . $filename;

        $request->avatar->storeAs('avatars',$filename,'public');

        User::query()->where('id', $user->id)->update(['avatar'=>$avatar]);

      }

      $user->pseudo = $request["newpseudo"];
      $user->email = $request["newmail"];

      $newPassword = $request["newmdp1"];
      $passwordConf = $request["newmdp2"];

      if($newPassword == $passwordConf) {

        $user->password = $newPassword;

      } else {

        return redirect()->back()->with('error', 'Passwords do not match.');

      }

      $user->save();

    return redirect()->back()->with('success', 'Informations updated successfully.');
    
    }

}
