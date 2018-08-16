<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function show($username){
        $user = User::where('username', $username)->first();
        return view('users.show', [
            'user' => $user,
            ]);
    }

    public function follows($username){
        $user = $this->findByUsername($username);
        return view('users.follows', [
            'user' => $user,
            'follows' => $user->follows,
            ]);
    }

    public function followers($username){
        $user = $this->findByUsername($username);
        return view('users.follows', [
            'user' => $user,
            'follows' => $user->followers,
            ]);
    }

    public function follow($username, Request $request){
        $user = $this->findByUsername($username);
        $me = $request->user();
        $me->follows()->attach($user);

        return redirect("/users/$username")->withSuccess("Followed!!!");
    }

    public function unfollow($username, Request $request){
        $user = $this->findByUsername($username);
        $me = $request->user();
        $me->follows()->detach($user);

        return redirect("/users/$username")->withSuccess("Unfollowed!!!");
    }

    private function findByUsername($username){
        $user = User::where('username', $username)->first();
        return $user;
    }


}
