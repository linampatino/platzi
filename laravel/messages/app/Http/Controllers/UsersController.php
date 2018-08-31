<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Conversation;
use App\PrivateMessage;

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

    public function sendPrivateMessage($username, Request $request){
        $user = $this->findByUsername($username);

        $me = $request->user();
        $message = $request->input('message');

        $conversation = Conversation::between($me, $user);
        //dd($conversation);
        //$conversation = Conversation::create();
        //$conversation->users()->attach($user);
        //$conversation->users()->attach($me);

        $privateMessage = PrivateMessage::create([
            'conversation_id' => $conversation->id,
            'user_id' => $me->id,
            'message' => $message,
        ]);

        return redirect('/conversations/'.$conversation->id);
    }


    private function findByUsername($username){
        $user = User::where('username', $username)->firstOrFail();
        return $user;
    }

}
